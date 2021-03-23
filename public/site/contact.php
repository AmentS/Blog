<?php include_once '../../views/partials/header.php' ?>

<div class="heading-2">
    <div class="wrap">

        <div class="container-1 jc-center margin-t-3">
            <h1 class="heading-4 color-gray f-w-b">Možete me kontaktirati putem forme</h1>
        </div>
        <div class="container-error margin-t-9" id="error-div">
        </div>
        <div class="container-2 jc-center">

            <input type="text" placeholder="Ime i prezime" class="input-text" id="name">
        </div>
        <div class="container-2 jc-center">
            <input type="email" placeholder="Email dresa" class="input-text" id="email">
        </div>
        <div class="container-2 jc-center">
            <select name="" id="reasons_select" class="select-reasons-contact">
            </select>
        </div>
        <div class="container-2 jc-center">
            <textarea class="textarea-contact" placeholder="Poruka..." id="text"></textarea>
        </div>
        <div class="container-2 jc-center">
            <button class="comment-post-btn" id="send" >Posalji</button>
        </div>

    </div>
</div>


<?php include '../../views/partials/footer.php' ?>
<script src="../js/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.icon').click(function () {
        $('span').toggleClass("cancel");
    });

</script>
