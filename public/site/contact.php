<?php include_once '../../views/partials/header.php' ?>

<div class="heading-2">
    <div class="wrap">
        <div class="container-1 jc-center margin-t-3">
            <h1 class="heading-4 color-gray f-w-b">Možete me kontaktirati putem forme</h1>
        </div>
        <div class="container-2 margin-t-9 jc-center">
            <input type="text" placeholder="Ime i prezime" class="input-text">
        </div>
        <div class="container-2 jc-center">
            <input type="text" placeholder="Email dresa" class="input-text">
        </div>
        <div class="container-2 jc-center">
            <input type="text" placeholder="Razlog kontaktiranja" class="input-text">
        </div>
        <div class="container-2 jc-center">
            <textarea class="textarea-contact" placeholder="Poruka..."></textarea>
        </div>
        <div class="container-2 jc-center">
           <button class="comment-post-btn">Posalji</button>
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
