<?php
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set("Europe/Riga");
function refValues($arr){
    if (strnatcmp(phpversion(),'5.3') >= 0)
    {
        $refs = array();
        foreach($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }
    return $arr;
}
class DB{
    const DBNAME="booking";
    const HOST="localhost";
    const USER="Agris";
    const PASS="agris123";
    
    private $connection = null;
    protected $table="";

    // this function is called everytime this class is instantiated		
   public function __construct($dbhost = self::HOST, $dbname = self::DBNAME, $username = self::USER, $password = self::PASS){

        try{
	
            $this->connection = new mysqli($dbhost, $username, $password, $dbname);
		    $this->connection->set_charset("utf8");
            
            if( mysqli_connect_errno() ){
                throw new Exception("Could not connect to database.");   
            }
		
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }			
	
    }

    // Insert a row/s in a Database Table
    public function Insert( $query = "" , $params = [] ){
        try{
		
        $stmt = $this->executeStatement( $query , $params );
        
            $stmt->close();
		
            return $this->connection->insert_id;
		
        }catch(Exception $e){
            //print "Exception ".$e->getMessage();
            throw New Exception( $e->getMessage() );
        }
	
        return false;
	
    }

    public function Delete( $query = "" , $params = [] ){
        try{
		
        $stmt = $this->executeStatement( $query , $params );
        
            $stmt->close();
		
            return true;
		
        }catch(Exception $e){
            //print "Exception ".$e->getMessage();
            throw New Exception( $e->getMessage() );
        }
	
        return false;
	
    }
    public function Update( $query = "" , $params = [] ){
        try{
		
        $stmt = $this->executeStatement( $query , $params );
        
            $stmt->close();
		
            return true;
		
        }catch(Exception $e){
            //print "Exception ".$e->getMessage();
            throw New Exception( $e->getMessage() );
        }
	
        return false;
	
    }


    // Select a row/s in a Database Table
    public function Select( $query = "" , $params = [] ){
        //print $query."<br/>";
            try{
            
                $stmt = $this->executeStatement( $query , $params );
            
                $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
                $stmt->close();
            
                return $result;
            
            }catch(Exception $e){
                throw New Exception( $e->getMessage() );
            }
        
            return false;
    }

    public function CheckSelect($in, $out){
        try{
            
            $exists = $this->Select("SELECT * FROM reserve WHERE (checkIn < ? AND checkOut > ?) OR (checkIn < ? AND checkOut > ?)
                OR (checkIn BETWEEN ? AND ?) OR (checkOut BETWEEN ? AND ?)" , ["iiiiiiii", $in, $in, $out, $out, $in, $out, $in, $out]);
            
            foreach($exists as $yes){
                return "no <b>".date('d/m/Y', $yes[checkIn])."</b> līdz <b>".date('d/m/Y', $yes[checkOut])."</b>";
            }

        
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
    
        return false;
    }

    // execute statement
    
    private function executeStatement( $query = "" , $params = [] ){
	
        try{
		
            $stmt = $this->connection->prepare( $query );
		
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
		
            if( $params ){
                call_user_func_array(array($stmt, 'bind_param'), refValues($params) );				
            }
		
            $stmt->execute();
		
            return $stmt;
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
    }
}

class display extends DB{
    //Parāda visas galerijas
    public function displayBookings(){
        $done = $this->Select("SELECT * FROM reserve WHERE accepted = ? AND checkIn > ? ORDER BY checkIn ASC", ["ii", 1, time()]);

        foreach($done as $book){

            echo '<div class="card border-dark mb-3">';
            echo '<div class="card-header collapsible" id="myTable">'.$book[name].' No '.date("d/m/Y", $book[checkIn]).' līz '.date("d/m/Y", $book[checkOut]).' </div>';
                echo '<div class="card-body content" style="display:none;">';
                    echo '<p class="card-text">';
                        $admin = true;
                        $in = new display();
                        $in->displayBooking($book[id]);
                    echo'</p>';
                echo '</div>';
            echo '</div>';

        }
        
    }
    //Parāda visas galerijas
    public function displayGallery($id){
        $done = $this->Select("SELECT * FROM gallery WHERE category = ?", ["i", $id]);
        echo '<div class="rows" id="rows">';
        foreach($done as $pic){
            echo 
            '<img id="first" class="column" src="'.$pic[url].'" alt="'.$pic[txt].'" onclick="myFunction(this);">';
        }
        echo '</div>';
    }
    //parāda visas izvēles
    public function displayMenu(){
        $done = $this->Select("SELECT * FROM menu", []);
        echo '<div class="row">';
        foreach($done as $menu){
            echo '<div class="col-sm-3 tm-article">';
            echo '<img width="100%" id="'.$menu[id].'" onclick="popupImg('.$menu[id].');" src="'.$menu[image].'" alt="">';
            echo '<div class="form-row clearfix pl-2 pr-2 tm-fx-col-xs">';
            echo '<p class="tm-margin-b-0 tm-font-semibold"><label> 
            <input type="checkbox" name="'.$menu[title].' - '.$menu[price].'EUR" value="'.$menu[price].'"> '.$menu[title].
            '</label></p>';
            echo '<p class="ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary">'.$menu[price].'EUR</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }

    public function displayBooking($id){

        $done = $this->Select("SELECT * FROM reserve WHERE id = ?", ["i", $id]);
        echo '<table class="table table-hover">';
        echo '<tbody>';
        echo '<tr class="table-dark">';
        echo '<td scope="row"  width="80%">Dati</td>';
        echo '<td width="20%">Informācija</td>';
        echo '</tr>';
        foreach($done as $res){
            echo '<tr class="table-active">';
                echo '<th scope="row">Vārds Uzvārds:</th>';
                echo '<td>'.$res[name].'</td>';
            echo '</tr>';
            echo '<tr class="table-active">';
                echo '<th scope="row">Ierašanās:</th>';
                echo '<td>'.date('d/m/Y', $res[checkIn]).'</td>';
            echo '</tr>';
            echo '<tr class="table-active">';
                echo '<th scope="row">Došanās prom:</th>';
                echo '<td>'.date('d/m/Y', $res[checkOut]).'</td>';
            echo '</tr>';
            echo '<tr class="table-active">';
                echo '<th scope="row">Pieaugušo skaits:</th>';
                echo '<td>'.$res[adult].'</td>';
            echo '</tr>';
            echo '<tr class="table-active">';
                echo '<th scope="row">Bērnu skaits:</th>';
                echo '<td>'.$res[children].'</td>';
            echo '</tr>';
            echo '<tr class="table-active">';
                echo '<th scope="row">Telefona numurs:</th>';
                echo '<td>'.$res[number].'</td>';
            echo '</tr>';
            echo '<tr class="table-active">';
                echo '<th scope="row">Epasta adrese:</th>';
                echo '<td>'.$res[email].'</td>';
            echo '</tr>';
            echo '<tr class="table-info">';
                echo '<th scope="row">Papildus gultas zīdaiņiem:</th>';
                echo '<td>'.$res[kidsBed].' x 10EUR</td>';
            echo '</tr>';
            echo '<tr class="table-info"><th scope="row">';
                echo str_replace(',','</td></tr><tr class="table-info"><th scope="row">',str_replace('-','</th><td>',$res[totalBooking]));
            echo '</td></tr>';
            echo '<tr class="table-success">';
                echo '<th scope="row">Cena par vienu dienu:</th>';
                echo '<td>'.$res[price].'EUR</td>';
            echo '</tr>';
            echo '<tr class="table-info">';
                echo '<th scope="row">Plānoto dienu daudzums:</th>';
                echo '<td>'.$res[days].'</td>';
            echo '</tr>';
            echo '<tr class="table-success">';
                echo '<th scope="row">Kopā:</th>';
                echo '<td>'.$res[totalPrice].'EUR</td>';
            echo '</tr>';
            if($_GET[page] == "admin"){
                echo '<tr class="table-active">';
                    echo '<th scope="row">Pieteicās:</th>';
                    echo '<td>'.$res[timeWhen].'</td>';
                echo '</tr>';
                echo '<tr class="table-active">';
                    echo '<th scope="row">Apstiprināts?:</th>';
                    echo '<td>'; if($res[accepted] == 1){echo "Jā";}else{echo "Nē!";} echo '</td>';
                echo '</tr>';
                echo '<tr class="table-active">';
                    echo '<th scope="row">IP adrese:</th>';
                    echo '<td>'.$res[ip].'</td>';
                echo '</tr>';

            }
        echo '</tbody>';
        }
        echo '</table>';

    }
    public $id;
    public $name;
    public $checkIn;
    public $checkOut;
    public $days;
    public $adult;
    public $children;
    public $kidsBed;
    public $number;
    public $email;
    public $price;
    public $totalBooking;
    public $totalPrice;

    public function invoice($id){

        $done = $this->Select("SELECT * FROM reserve WHERE id = ?", ["i", $id]);
        
        foreach($done as $row){
            $this->id = $row[id];
            $this->name = $row[name];
            $this->checkIn = $row[checkIn];
            $this->checkOut = $row[checkOut];
            $this->days = $row[days];
            $this->adult = $row[adult];
            $this->children = $row[children];
            $this->kidsBed = $row[kidsBed];
            $this->number = $row[number];
            $this->email = $row[email];
            $this->price = $row[price];
            $this->totalBooking = $row[totalBooking];
            $this->totalPrice = $row[totalPrice];
        }

    }

    public function SendInvoice($email, $name, $id, $topic, $message){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // 1 vai 2 Enable verbose debug output, 0 bez Debuga
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'mail.digitalais-asistents.lv';         // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'studenti@digitalais-asistents.lv';     // SMTP username
            $mail->Password   = 'TestaPasts1';                          // SMTP password
            $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('studenti@digitalais-asistents.lv', 'studenti@digitalais-asistents.lv');
            //$mail->addAddress('regnars.senbergs@gmail.com', 'Regnars Senbergs');     // Add a recipient
            $mail->addAddress($email,'Digitalais Asistents');               // Name is optional
            
            $mail->addReplyTo('studenti@digitalais-asistents.lv', 'Webkursi');
            if(!empty($id)){
                $mail->addAttachment("../pdf/invoice".$id.".pdf");         // Add attachments
            }
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $topic;
            $mail->Body    = $message;
            $mail->AltBody = $message;

            $mail->CharSet = 'UTF-8'; //Pievienoju kodejumu
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}
