<div class="header">
    <section id="slider">
        <div class="aspect-ratio-169">
            <img src="images/banner1.jpg" >
            <img src="images/banner2.jpg" >
            <img src="images/banner3.jpg" >
            <img src="images/banner4.jpg" >
            <img src="images/banner5.jpg" >
            <img src="images/banner6.jpg" >
        </div>
        <!-- <div class="dot-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div> -->
    </section>
    <script> 
        const imgPosition = document.querySelectorAll(".aspect-ratio-169 img");
        const imgcontainer = document.querySelector(".aspect-ratio-169");
        let imgNumber = imgPosition.length;
        let index = 0;
        // console.log(img);

        imgPosition.forEach(function (image, index) {
            image.style.left = index * 100 + "%";
        });
        function imgSlider() {
            index++;
            if (index >= imgNumber) {
                index = 0;
            }
            imgcontainer.style.left = "-" + (index * 100) + "%";
        }       
        setInterval(imgSlider, 3000);
    </script>
</div>