<?php

require_once '../db_conn.php';
/** @var $pdo \PDO */

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


$statment = $pdo->prepare('select * from post WHERE id LIKE :id');
$statment->bindValue(':id', $id);
$statment->execute();
$post = $statment->fetch(PDO::FETCH_ASSOC);

$catId = $post['cat_id'];

$statment = $pdo->prepare('select * from category WHERE id LIKE :id');
$statment->bindValue(':id', $catId);
$statment->execute();
$cat = $statment->fetch(PDO::FETCH_ASSOC);


?>

<?php include_once '../../views/partials/header.php' ?>


<div class="container-2">
    <div class="wrap">
        <div class="container-2">
            <div class="blog-page-img" style="background-image: url('../img/blog-winter-img-2.jpg')"></div>
        </div>
        <div class="container-2">
            <div class="container-1">
                <h1 class="heading-5 color-org"><?php echo $post['title'] ?></h1>
            </div>
            <div class="content-blog-page">
                <p class="font-1 color-gray margin-t-1">Datum: <?php echo $post['post_date'] ?></p>
                <p class="heading-1 color-gray margin-t-1">Kategorija: <strong
                            class="color-org"><?php echo $cat['cat'] ?></strong></p>
                <p class="heading-1 color-gray margin-t-3">
                    <?php echo $post['content'] ?>
                </p>
            </div>


        </div>
        <div class="container-2 margin-t-5 border-bottom-gr">
            <p class="heading-1 color-gray">Comments:</p>
        </div>

        <div class="container-2" id="comments">

        </div>
        <div class="comment-write margin-t-5">
            <textarea class="textarea-comment" placeholder="Enter your comment here..."></textarea>
            <button class="float-right margin-t-1 comment-post-btn">Submit</button>
        </div>

    </div>


</div>
<p id="test" hidden><?php echo $id ?></p>

<?php include '../../views/partials/footer.php' ?>

<script>
    document.addEventListener('DOMContentLoaded', loadComments());

    function loadComments() {
        var test = document.getElementById('test').innerText;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../extract_comments.php?id=' + test);
        xhr.onload = function () {
            if (this.status === 200) {
                var post = JSON.parse(this.responseText);
                var output = '';
                for (var i in post) {
                    output += `   <div class="coomment-read margin-t-3">
                <p class="font-2 f-w-b color-gray">${post[i].username}:</p>
                <p class="heading-1 color-gray f-w-l margin-t-1">${post[i].comm}</p>
            </div>`;
                }
                document.getElementById('comments').innerHTML = output;
            }
        }
        xhr.send();
    }

</script>