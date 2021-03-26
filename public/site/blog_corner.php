<?php include_once '../../views/partials/header.php' ?>

<div class="container-2">
    <div class="blog-corner-l">
        <div class="blog-title">
            <input type="text" class="blog-title-input" placeholder="Blog title here..." id="blog_title" required>
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


</div>


<?php include_once '../../views/partials/footer.php' ?>
<script>
    const uploadImg = document.getElementById('upload-img');
    const preview = document.getElementById('blog-img');
    //odje selektujemo element sa klasom 'img-preview-uploaded' koji se nalazi u preview(blog-img) divu
    const previewImg = preview.querySelector('.img-preview-uploaded');
    const previewText = preview.querySelector('.img-preview-text');

    uploadImg.addEventListener('change', function () {
        const file = this.files[0];

            if(file){
                const  reader = new FileReader();

                previewText.style.display = 'none';
                previewImg.style.display = 'block';

                reader.addEventListener('load', function (){
                    previewImg.setAttribute('src', this.result);
                });

                reader.readAsDataURL(file);

            }else{
                previewText.style.display = null;
                previewImg.style.display = null;
                previewImg.setAttribute('src', '');
            }
    });
</script>
</body>
</html>
