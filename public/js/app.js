
document.addEventListener('DOMContentLoaded', loadCategorys());
function loadCategorys() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../category_extract.php', true);
    xhr.onload = function () {
        if (this.status === 200) {
            var cat = JSON.parse(this.responseText);

            var output = '';
            for (var i in cat) {
                output += `<li><a>${cat[i].cat}</a></li>`;
            }

            document.getElementById('show_cat').innerHTML = output;
        }
    }

    xhr.send();

}

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

