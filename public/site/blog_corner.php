<?php
require_once '../db_conn.php';
/** @var $pdo \PDO */

$errors = [];
$title = $category = $content = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../validate.php';

    if (empty($errors)) {

        $statment = $pdo->prepare('INSERT INTO post (title, content, img, post_date, user_id, cat_id) 
                                            VALUES (:title, :content, :img, :post_date, :user_id, :cat_id)');

        $statment->bindValue(':title', $title);
        $statment->bindValue(':content', $content);
        $statment->bindValue(':img', 'test');
        $statment->bindValue(':post_date', date('Y/m/d h:i:sa'));
        $statment->bindValue(':cat_id', $category);
        $statment->bindValue(':user_id', 1);
        $statment->execute();
        $title = $category = $content = '';

        header('Location: index.php');

    }

}





function randomString($n)
{
    $characters = '0123456789QWERTYUIOPLKJHGFDSAZXCVBNMqwertyuioplkjhgfdsazxcvbnm';
    $str = '';

    for ($i = 0; $i <= $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }

    return $str;
}

?>




<?php include_once '../../views/partials/header.php' ?>

<div class="container-2">
    <div class="blog-corner-l">
        <form METHOD="POST" enctype="multipart/form-data">
            <div class="blog-title">
                <input type="text" name="title" class="blog-title-input" placeholder="Blog title here..." id="blog_title" required>
            </div>

            <div class="blog-img" id="blog-img">
                <img src="" alt="Image Preview" class="img-preview-uploaded">
                <span class="img-preview-text">Image preview</span>
            </div>
            <label for="upload-img" class="upload-img-label">
                Choose image
            </label>
            <input type="file" class="img-input" id="upload-img">


            <div class="blog-category">
                <select name="category" id="blog_category" class="blog-category-select">

                </select>
            </div>
            <div class="blog-text">
                <textarea class="textarea-blog-text" placeholder="Blog text here..." required name="content"></textarea>
                <input type="submit"  value="Post blog" class="post-blog-btn float-right">
            </div>
        </form>

    </div>
    <div class="blog-corner-r">
    </div>


</div>


<?php include_once '../../views/partials/footer.php' ?>
<script>
    //preview img
    const uploadImg = document.getElementById('upload-img');
    const preview = document.getElementById('blog-img');
    //odje selektujemo element sa klasom 'img-preview-uploaded' koji se nalazi u preview(blog-img) divu
    const previewImg = preview.querySelector('.img-preview-uploaded');
    const previewText = preview.querySelector('.img-preview-text');

    uploadImg.addEventListener('change', function () {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewText.style.display = 'none';
            previewImg.style.display = 'block';

            reader.addEventListener('load', function () {
                previewImg.setAttribute('src', this.result);
            });

            reader.readAsDataURL(file);

        } else {
            previewText.style.display = null;
            previewImg.style.display = null;
            previewImg.setAttribute('src', '');
        }
    });
</script>
</body>
</html>
