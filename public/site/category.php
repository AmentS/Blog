<?php

require_once '../db_conn.php';
/** @var $pdo \PDO */

$id = $_GET['id'];

$statment = $pdo->prepare('select * from post WHERE cat_id LIKE :id ORDER BY post_date desc');
$statment->bindValue(':id', $id);
$statment->execute();
$post = $statment->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include_once '../../views/partials/header.php' ?>
<div class="container-2">
    <div class="wrap">
        <div class="container-2">
            
            <?php  foreach ($post as $p) : ?>
            <div class="list-post" id="list-post">
                <div class="art-container margin-b-3">
                    <div class="art-container-box-l" style="background-image: url('../img/whatisblog.png')"></div>
                    <div class="art-container-box-r">
                        <p class="color-gray font-1 margin-t-1">Datum: <?php echo $p['post_date']?></p>
                        <h3 class="heading-3 color-org margin-t-1"><?php echo $p['title']?></h3>
                        <p class="color-gray heading-1 margin-t-2"><?php echo $p['content']?></p>
                        <p class="color-gray heading-1 margin-t-2"><a href="blog_page.php?id=<?php echo$p['id']?>" class="procitaj">Procitaj vise...</a></p>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>

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
