document.addEventListener('DOMContentLoaded', loadCategorys(), loadReasons());

//categories show frontend
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

//reasons show frontend
function loadReasons() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../reason_extract.php', true);
    var select = document.getElementById('reasons_select');
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
        }
    }

    xhr.send();

}

//Save contact message to db
document.getElementById('send').addEventListener('click', () => {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var text = document.getElementById('text').value;
    var select = document.getElementById('reasons_select').value;
    if (name === '') {
       document.getElementById('name').classList.add('error-border');
       return;
    } else if (email === '') {
        document.getElementById('email').classList.add('error-border');
        return;
    } else if (text === '') {
        document.getElementById('text').classList.add('error-border');
        return;
    }

    var pram = `name=${name}&email=${email}&text=${text}&select=${select}`;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../save_contact_msg.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {

        if (this.responseText === 'saved') {
            swal("Uspjeh!", "Poruka uspješno poslata!", "success");
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('text').value = '';
        } else if (this.responseText === 'not_saved') {
            swal("Greska", "Poruka je neuspješno poslata!", "error");
        }

    }
    xhr.send(pram);


})

function error(msg) {
    const p = document.createElement('p');
    if (msg === 'error') {
        p.appendChild(document.createTextNode('Molimo popunite sva polja!'));
    }

    const div = document.getElementById('error-div');
    div.appendChild(p);
    /*    const container = document.querySelector('.container-2-box');
        const label = document.querySelector('#label');
        container.insertBefore(div, label);//da ubacimo div prije lable-a*/
    setTimeout(() => document.querySelector('.container-error').remove(), 2000)
}



