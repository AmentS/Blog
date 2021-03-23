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
            <select name="" id="reasons_select" class="select-reasons-contact">
            </select>
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

/*    document.addEventListener('DOMContentLoaded', loadReasons());

    function loadReasons() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../reason_extract.php', true);
        xhr.onload = function () {
            if (this.status === 200) {
                var rea = JSON.parse(this.responseText);

                for (var i in rea) {
                    var option = document.createElement("option");
                    option.text = rea[i].reason;
                    option.value = rea[i].id;
                    var select = document.getElementById("reasons_select");
                    select.appendChild(option);
                }

                /!* document.getElementById('show_cat').innerHTML = output;*!/
            }
        }

        xhr.send();

    }*/
</script>
