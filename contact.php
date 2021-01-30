<div class="tm-section tm-section-pad tm-bg-img tm-position-relative" id="tm-section-6">
    <div class="container ie-h-align-center-fix">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8529.149550744543!2d24.350002529650467!3d57.694587105095415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46ec3d1d7dd5aa7d%3A0x34e91c914cf2bade!2zSG9saWRheSBob3VzZSAiS29zxKvFoWki!5e0!3m2!1slv!2slv!4v1611761239847!5m2!1slv!2slv" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>   
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0">
                <div class="tm-bg-white tm-p-4" id="form">
                    <div class="container">
                      <div class="list-group-item list-group-item-action " style="background-color:#ee5057; color:#fff;" data-toggle="collapse" data-target="#demo">
                          <b>Informācija par Mani</b>
                      </div>
                      <div id="demo" class="collapse in" style="border:1px solid #ced4da; padding:5px;">
                        Vārds: <b>Agris Namsons</b><br/>
                        Epasts: <b><a href="mailto:agris.namsons@gmail.com">agris.namsons@gmail.com</a></b><br/>
                        Grupa: <b>GR-57</b>
                      </div>
                    </div>
                    <br/>
                    <div id="msg"></div>
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control required" placeholder="Jūsu vārds"  />
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control required" placeholder="Epasts"  />
                        </div>
                        <div class="form-group">
                            <input type="text" id="subject" name="subject" class="form-control required" placeholder="Tēma"  />
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control required" rows="9" placeholder="Ziņa" ></textarea>
                        </div>
                        <button type="sumbit" id="sumbit" class="btn btn-primary tm-btn-primary">Sazināties ar mums</button>
                </div>                         
            </div>
        </div>        
    </div>
</div>
<script>
    $("#sumbit").click(function(){
        const name = $("#name").val();
        const email = $("#email").val();
        const subject = $("#subject").val();
        const message = $("#message").val();
        $.post("post/contact.add.php", {
            name: name,
            email: email,
            subject: subject,
            message: message
        }).done(function(data){
            if(data == "done"){
                $("#form").html("Paldies, ziņa tika nosūtīta!");
            }else{
                $("#msg").html(data);

                $('.required').each(function () {
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
