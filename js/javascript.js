    
    let bg = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg"];
    let number = Math.floor(Math.random() * 5);
    let locations = "img/" + bg[number];
    let bgSelect = document.getElementById("tm-section-6");
    if(bgSelect){
        bgSelect.style.backgroundImage="url("+locations+")";
    }

    // Saskaita visas telpu izvēles
    function sum( obj ) {
        var sum = 0;
        for( var el in obj ) {
            if( obj.hasOwnProperty( el ) ) {
            sum += parseFloat( obj[el] );
            }
        }
        return sum;
        }
        //Sarēķina bērnu gultu skaitu
        let price = 0;
        document.getElementById("kids_bed").addEventListener("change", kidsbed);
        function kidsbed(){
            let count = document.getElementById("kids_bed");
            price = count.value * 10;
            showPrice();
        }
    
        //Atlasa izvēlētos datus par telpām
        var checkboxes = document.querySelectorAll("input[type=checkbox]");
        let enabledSettings = [];
        let allBooking = [];
    
        checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            enabledSettings = Array.from(checkboxes).filter(i => i.checked).map(i => i.value);
            allBooking = Array.from(checkboxes).filter(i => i.checked).map(i => i.name);
            document.getElementById("totalBooking").value = allBooking;
            showPrice();
            
        })
        });
        //Parāda gala summu 
        function showPrice(){
            var summed = sum(enabledSettings) + price;
            document.getElementById("price").innerHTML = summed;
            document.getElementById("totalPrice").value = summed;
        }
    
        //Bildes popUp
        let modal = document.getElementById("myModal");
        let modalImg = document.getElementById("img01");
        let captionText = document.getElementById("caption");
        function popupImg(id){
            let img = document.getElementById(id);
            modal.style.display = "block";
            modalImg.src = img.src;
            captionText.innerHTML = img.alt;
        }
        let span = document.getElementById("myModal");
        span.onclick = function() { 
            modal.style.display = "none";
        }