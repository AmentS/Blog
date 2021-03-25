<?php include_once '../../views/partials/header.php' ?>

<div class="container-2">
    <div class="blog-corner-l">
        <div class="blog-title">
            <input type="text" class="blog-title-input" placeholder="Blog title here..." id="blog_title" required>
        </div>
        <div class="blog-img border-b"></div>

        <div class="blog-category">
            <select name="" id="blog_category" class="blog-category-select">

            </select>
        </div>
        <div class="blog-text">
            <textarea class="textarea-blog-text" placeholder="Blog text here..." required></textarea>
            <button class="post-blog-btn float-right">Post blog</button>
        </div>
    </div>
    <div class="blog-corner-r">
    </div>
    <label for="meter">Long:</label>
    <meter value=".8" id="meter" style="width: 100%"> 100%</meter>


</div>



<?php include_once '../../views/partials/footer.php' ?>
</body>
</html>
