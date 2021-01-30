<div class="container tm-pt-5 tm-pb-4" >

    <div class="container" id="bookingFormDone" style="display:none;">
        <h4 class="ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary">
            Pārbaudiet vai visi dati atbilst Jūsu vēlmēm un ir patiesi!
        </h4>
        <div id="bookingInfo"></div>
        <input type="hidden" name="reserveId" id="reserveId" value="">
        <p style="text-align:center;"><button type="button" id="edit" class="btn btn-primary">Labot</button>
        <button type="button" id="accepted" class="btn btn-primary">Apstiprināt</button></p>
    </div>
    <div class="container" id="bookingForm">
    
    <form class="tm-search-form tm-section-pad-2">
        <h5 class="ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary" id="error"></h5>
                        <div class="form-row tm-search-form-row">
                            <div class="form-group tm-form-element tm-form-element-100">
                                <input name="name" type="text" class="form-control required" id="inputCity" placeholder="Vārds Uzvārds" required>
                            </div>
                            <div class="form-group tm-form-element tm-form-element-50">
                                <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                <input name="check-in" type="text" class="form-control required" onfocus="(this.type='date')" id="inputCheckIn" placeholder="Plānots ierasties">
                            </div>
                            <div class="form-group tm-form-element tm-form-element-50">
                                <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                <input name="check-out" type="text" class="form-control required" onfocus="(this.type='date')" id="inputCheckOut" placeholder="Plānots doties prom">
                            </div>
                        </div>
                        <div class="form-row tm-search-form-row">
                            <div class="form-group tm-form-element tm-form-element-100">
                                <i class="fa fa-2x fa-user tm-form-element-icon"></i>
                                <input name="adult" type="number" class="form-control required" id="adult" placeholder="Pieaugušo skaits">
                            </div>
                            <div class="form-group tm-form-element tm-form-element-50">                                            
                                <select name="children" class="form-control tm-select" id="children">
                                    <option value="0">Bērnu skaits</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <i class="fa fa-user tm-form-element-icon tm-form-element-icon-small"></i>
                            </div>
                            <div class="form-group tm-form-element tm-form-element-50">
                                <select name="kids_bed" class="form-control tm-select" id="kids_bed">
                                    <option value="0">Nepieciešamās zīdaiņu gultiņas</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <i class="fa fa-2x fa-bed tm-form-element-icon"></i>
                            </div>
                            </div>

                            <div class="form-row tm-search-form-row">
                            <div class="form-group tm-form-element tm-form-element-100">
                                <i class="fa fa-phone fa-2x tm-form-element-icon"></i>
                                <input name="number" type="number" class="form-control required" id="number" placeholder="Telefona Numurs">
                            </div>
                            <div class="form-group tm-form-element tm-form-element-100">
                                <i class="fa fa-envelope fa-2x tm-form-element-icon"></i>
                                <input name="email" type="text" class="form-control required" id="mail" placeholder="Epasts">
                            </div>
                            <div class="form-group tm-form-element tm-form-element-2">
                                <button type="button" id="submitForm" class="btn btn-primary tm-btn-search">Izveidot pieteikumu</button>
                            </div>
                        </div>
                            
                            <div class="form-row clearfix pl-2 pr-2 tm-fx-col-xs">
                                <p class="tm-margin-b-0">Zīdaiņu gultiņas cena ir 10EUR</p>
                                <h4 class="ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary">
                                    Vienas dienas cena: <span id="price">0.00</span> EUR
                                    <input id="totalPrice" type="hidden" name="totalPrice" value="">
                                    <input id="totalBooking" type="hidden" name="totalBooking" value="">
                                </h4>
                            </div>
                        <?php
                            $ob = new display();
                            $ob->displayMenu();
                        ?>     
                  </form>

    </div>
</div>
<div id="myModal" class="modal">
  <img class="modal-content" id="img01">
</div>

<script>
$("#edit").click(function(){

    let reserveId = $("#reserveId").val();
    $.post("post/booking.add.php", {
        reserveId: reserveId,
        delete: true
    });
    $("#bookingForm").css("display", "block");
    $("#bookingFormDone").css("display", "none");
    window.scrollTo(0, 0);

});
$("#accepted").click(function(){ //https://i.stack.imgur.com/FhHRx.gif accepted
    $("#accepted").html('<img src="https://i.stack.imgur.com/FhHRx.gif" width="20px" height="20px">');
    let reserveId = $("#reserveId").val();
    $.post("post/booking.add.php", {
        acceptedId: reserveId,
        accepted: true
    }).done(function(data){
        $("#bookingFormDone").html("Paldies par rezervāciju! Uz Epastu tika nosūtīts rēķins. Pēc tā apmeksāšanas ar Jums sazināsimies!");
    });

});
$("#submitForm").click(function(){
    const name = $("input[name='name']").val();
    const checkIn = $("input[name='check-in']").val();
    const checkOut = $("input[name='check-out']").val();
    const adult = $("input[name='adult']").val();
    const children = $("#children option:selected").val();
    const kidsBed = $("#kids_bed option:selected").val();
    const number = $("input[name='number']").val();
    const email = $("input[name='email']").val();
    const price = $("input[name='totalPrice']").val();
    const totalBooking = $("input[name='totalBooking']").val();
    $.post("post/booking.add.php",{
        name: name,
        checkIn: checkIn,
        checkOut: checkOut,
        adult: adult,
        children: children,
        kidsBed: kidsBed,
        number: number,
        email: email,
        price: price,
        totalBooking: totalBooking
    }).done(function(data){
        if($.isNumeric(data) === true && data > 0){
            $("#error").html("");
            $("#bookingForm").css("display", "none");
            $("#bookingFormDone").css("display", "block");
            $("#reserveId").val(data);
                $.post("post/displayBooking.php", {
                    id: data
                }).done(function(info){
                    $("#bookingInfo").html(info);
                    window.scrollTo(xCoord, yCoord);
                });
        }else{
            $("#error").html(data);
            $('input.required').each(function () {
                if($(this).val() == ""){
                    $(this).css('border','1px solid #dc3545');
                }else{
                    $(this).css('border','1px solid #ced4da');
                }
                window.scrollTo(0, 0);
            });

        }
    });
});
</script>
