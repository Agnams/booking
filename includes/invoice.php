<?php
include_once "../includes/class.php";
require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$document = new Dompdf();

$html = '
<!DOCTYPE html>
<html lang="lv">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>Rēķins NR '.$in->id.'</title>
    <link rel="stylesheet" href="../css/invoice.css">
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="../img/logo.png">
      </div>
      <h1>Rēķins Numur '.$in->id.'</h1>
      <div id="project left">
        <div>Pakalpojumu sniedzējs:</div>
        <div><span>Reģistrcijas nr</span> 44103065105</div>
        <div><span>Banka</span> Luminor Bank AS</div>
        <div><span>Bankas kods</span> RIKOLV2X</div>
        <div><span>Konts</span> LV38RIKO0000083054701</div>
      </div>
      <div id="project right">
      <div>Pakalpojumu saņēmējs:</div>
      <div><span>Vārds Uzvārds</span> '.$in->name.'</div>
      <div><span>Epasts</span> '.$in->email.'</div>
      <div><span>Telefons</span> '.$in->number.'</div>
      <div><span>Ierašanās</span> '.date("d/m/Y", $in->checkIn).'</div>
      <div><span>Pamešana</span> '.date("d/m/Y", $in->checkOut).'</div>
    </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="desc">Nosaukums</th>
            <th>Cena</th>
            <th>Daudzums</th>
            <th>Kopā</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="desc">Plānotais pieaugušo skaits </td>
            <td class="unit"></td>
            <td class="qty">'.$in->adult.'</td>
            <td class="total"></td>
          </tr>
          <tr>
          <td class="desc">Plānotais bērnu skaits </td>
            <td class="unit"></td>
            <td class="qty">'.$in->children.'</td>
            <td class="total"></td>
          </tr>
          <tr>
            <td class="desc">Nepieciešamās zīdaiņu gultiņas </td>
            <td class="unit">10 EUR</td>
            <td class="qty">'.$in->kidsBed.'</td>
            <td class="total">'.($in->kidsBed * 10).' EUR</td>
          </tr>
          <tr>
            <td class="desc">';
            $html .= str_replace(',','</td></tr><tr><td class="desc">',str_replace('-','<td class="unit"></td><td class="qty">1</td><td class="total">',$in->totalBooking));
            $html .='</td>
          </tr>
          <tr>
            <td class="desc">Summa par dienu</td>
            <td class="unit">'.$in->price.' EUR</td>
            <td class="qty">'.$in->days.'</td>
            <td class="total"><b>'.$in->totalPrice.' EUR</b></td>
          </tr>
          </tbody>
      </table>
      <div id="notices">
        <div>Brīdinājums:</div>
        <div class="notice">Lūgums rēķinu apmaksāt dienas laikā.</div>
      </div>
    </main>
    <footer>
      Rēķinu sastādīja dators un derīgs bez paraksta
    </footer>
  </body>
</html>';

$document->loadHtml($html);

$document->setPaper('A4', 'potrate');

$document->render();

$output = $document->output();
file_put_contents("../pdf/invoice$in->id.pdf", $output);
//$document->stream("Webslesson", array("Attachment"=>0));


?>