document.addEventListener('DOMContentLoaded', loadPosts());
//load blog posts INDEX
function loadPosts() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../post_extract.php');
    xhr.onload = function () {
        if (this.status === 200) {
            var post = JSON.parse(this.responseText);
            var output = '';
            for (var i in post) {
                output += `<div class="art-container margin-b-3">
                <div class="art-container-box-l" style="background-image: url('../img/whatisblog.png')"></div>
                <div class="art-container-box-r">
                    <p class="color-gray font-1 margin-t-1">Datum: ${post[i].post_date}</p>
                    <h3 class="heading-3 color-org margin-t-1">${post[i].title}</h3>
                    <p class="color-gray heading-1 margin-t-2">${post[i].content}</p>
                    <p class="color-gray heading-1 margin-t-2"><a href="blog_page.php?id=${post[i].id}" class="procitaj">Procitaj vise...</a></p>
                </div>
            </div>`;
            }
            document.getElementById('list-post').innerHTML = output;
        }
    }
    xhr.send();
}

//sort posts index

document.getElementById('select-sort').addEventListener('change', () => {
    var name = document.getElementById('select-sort').value;
    var pram = `sort=${name}`
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../post_extract.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status === 200) {
            //ne znam zasto ovo treba, ali treba
            var post = JSON.parse(this.responseText);
            var output = '';
            for (var i in post) {
                output += `<div class="art-container margin-b-3">
                <div class="art-container-box-l" style="background-image: url('../img/whatisblog.png')"></div>
                <div class="art-container-box-r">
                    <p class="color-gray font-1 margin-t-1">Datum: ${post[i].post_date}</p>
                    <h3 class="heading-3 color-org margin-t-1">${post[i].title}</h3>
                    <p class="color-gray heading-1 margin-t-2">${post[i].content}</p>
                    <p class="color-gray heading-1 margin-t-2"><a href="blog_page.php?id=${post[i].id}" class="procitaj">Procitaj vise...</a></p>
                </div>
            </div>`;
            }
            document.getElementById('list-post').innerHTML = output;

        }

    }
    xhr.send(pram);

})