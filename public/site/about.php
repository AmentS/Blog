
<?php include_once '../../views/partials/header.php' ?>
<div class="container-2">
    <div class="wrap">
        <div class="container-1 jc-center">
            <div class="about-pic" style="background-image: url('../img/about.jpg')">
            </div>
        </div>
        <div class="container-2">
            <div class="container-1">
                <h1 class="heading-4 color-gray f-w-b">About me</h1>

            </div>
            <div class="container-2-box border-r">
                <h2 class="heading-2 color-org margin-t-3">In general</h2>
                <p class="heading-1 color-gray margin-t-2"><strong>Name:</strong> Spasoje Djurovic</p>
                <p class="heading-1 color-gray margin-t-1"><strong>Date of birth:</strong> 23.12.1990</p>
                <p class="heading-1 color-gray margin-t-1"><strong>Born in: </strong> Kotor, Montenegro</p>
                <p class="heading-1 color-gray margin-t-1"><strong>Hometown: </strong> Herceg Novi, Srbina 43, Montenegro</p>
                <p class="heading-1 color-gray margin-t-1"><strong>E-mail:</strong> spasoje.djurovic90@gmail.com</p>
                <p class="heading-1 color-gray margin-t-1"><strong>Phone: </strong> 069/453-711</p>
                <h2 class="heading-2 color-org margin-t-3">Education</h2>
            </div>
            <div class="container-2-box border-r">

            </div>

        </div>
    </div>

</div>



<?php include '../../views/partials/footer.php' ?>
<script src="../js/jquery.min.js"></script>
<script>
    $('.icon').click(function () {
        $('span').toggleClass("cancel");
    });
</script>