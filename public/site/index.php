<?php


?>

<?php include_once '../../views/partials/header.php' ?>
<div class="container-2">
    <div class="wrap">
        <div class="container-2">
            <div class="container-1" style="justify-content: flex-end">
                <div class="container-2-box jc-end">
                    <select name="" id="select-sort" class="sort-blog">
                        <option value="desc" id="all">Sortiraj po:</option>
                        <option value="desc" id="latest">Najnoviji</option>
                        <option value="asc" id="first">Prvi ikad</option>
                    </select>
                </div>
            </div>
            <div class="list-post" id="list-post">

            </div>

        </div>
    </div>
    <div class="scroll-arrow">
        <div class="scroll-arrow-box">
            <svg viewBox="0 0 320 512" class="scroll-svg">
                <path
                        d="M177 159.7l136 136c9.4 9.4 9.4 24.6 0 33.9l-22.6 22.6c-9.4 9.4-24.6 9.4-33.9 0L160 255.9l-96.4 96.4c-9.4 9.4-24.6 9.4-33.9 0L7 329.7c-9.4-9.4-9.4-24.6 0-33.9l136-136c9.4-9.5 24.6-9.5 34-.1z"></path>
            </svg>
        </div>

    </div>
</div>


<?php include '../../views/partials/footer.php' ?>
<script src="../js/jquery.min.js"></script>
<script>
    $('.icon').click(function () {
        $('span').toggleClass("cancel");
    });
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 250) {
                $('.scroll-arrow').fadeIn();
            } else {
                $('.scroll-arrow').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('.scroll-arrow').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 10);
            return false;
        });
    });


</script>