<?php
$gallery = new DB();
$category = $_GET[category];
if(!isset($category)){
    $category=1;
}
?>
<div class="container tm-pt-5 tm-pb-4">
                <div class="container">
                    <div class="row">

                        
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-recommended-container">
                            <div class="tm-bg-white">
                                <div class="tm-bg-primary tm-sidebar-pad">
                                    <h3 class="tm-color-white tm-sidebar-title">Izvēlieties galeriju</h3>
                                </div>
                                <div class="tm-sidebar-pad-2">
                                    <a href="?page=gallery&category=1" class="media tm-media tm-recommended-item">
                                        <img src="http://www.kosisi.lv/images/galerija/r_viesunams/01_viesu-nams.jpg" width="90px" height="85px" alt="Image">
                                        <div class="media-body tm-media-body tm-bg-gray">
                                            <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Viesu nams</h4>
                                        </div>                                        
                                    </a>
                                    <a href="?page=gallery&category=2" class="media tm-media tm-recommended-item">
                                    <img src="http://www.kosisi.lv/images/galerija/r_brivdienumaja/01_brivdienu-maja.jpg" width="90px" height="85px" alt="Image">
                                        <div class="media-body tm-media-body tm-bg-gray">
                                            <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Brīvdienu māja</h4>
                                        </div>
                                    </a>
                                    <a href="?page=gallery&category=3" class="media tm-media tm-recommended-item">
                                    <img src="http://www.kosisi.lv/images/galerija/r_lapene/1_lapene.jpg" width="90px" height="85px" alt="Image">
                                        <div class="media-body tm-media-body tm-bg-gray">
                                            <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Lapene</h4>
                                        </div>
                                    </a>
                                    <a href="?page=gallery&category=4" class="media tm-media tm-recommended-item">
                                    <img src="http://www.kosisi.lv/images/galerija/r_jura/1_OBD2505_hdr.jpg" width="90px" height="85px" alt="Image">
                                        <div class="media-body tm-media-body tm-bg-gray">
                                            <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Jūra</h4>
                                        </div>
                                    </a>
                                    <a href="?page=gallery&category=5" class="media tm-media tm-recommended-item">
                                    <img src="http://www.kosisi.lv/images/galerija/r_darzs/DSCN6856.jpg" width="90px" height="85px" alt="Image">
                                        <div class="media-body tm-media-body tm-bg-gray">
                                            <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Dārzs</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                            <div class="tm-article-carousel">                            
                                <article class="tm-bg-white mr-2 tm-carousel-item">
                                    <div class="tm-article-pad">
                                    <div class="top-bar">
                                        <div class="top-bars" onclick="scrollDiv('l');">
                                            <img height="90px" src="img/left.png" alt="">
                                        </div>
                                        <div class="top-bars"style="width:80%;">
                                        <?php
                                            $ob = new display();
                                            $dis = $ob->displayGallery($category);
                                        ?>
                                        </div>
                                            <div class="top-bars" onclick="scrollDiv('r');">
                                                <img height="90px" src="img/right.png" alt="">
                                            </div>
                                        </div>
                                        <div class="containers">
                                            <img id="expandedImg" style="width:100%">
                                                <div id="imgtext"></div>
                                        </div>
                                    </div>                                
                                </article>                    
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
<script>
    let thisOne = document.getElementById("first");
    myFunction(thisOne);
    function myFunction(imgs) {
        let expandImg = document.getElementById("expandedImg");
        let imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
        expandImg.parentElement.style.display = "block";
    }
    //Gallery bildes pa labi un pa kreisi tin
    
    function scrollDiv(dir) {
        var scroller = document.getElementById('rows');
        if (dir == 'l') {
            scroller.scrollLeft -= 100;
        }
        else if (dir == 'r') {
            scroller.scrollLeft += 100;
        }
    }
</script>