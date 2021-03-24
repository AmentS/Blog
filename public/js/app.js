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
    var connditionMet = false;

    if (name === '') {
        document.getElementById('name').classList.add('error-border');

        connditionMet = false;
        return connditionMet;
    } else {
        document.getElementById('name').classList.remove('error-border');
        connditionMet = true;
    }

    if (email === '') {
        document.getElementById('email').classList.add('error-border');
        return connditionMet;
    } else {
        document.getElementById('email').classList.remove('error-border');
        connditionMet = true;
    }

    if (text === '') {
        document.getElementById('text').classList.add('error-border');
        return connditionMet;
    } else {
        document.getElementById('text').classList.remove('error-border');
        connditionMet = true;
    }


    if (connditionMet) {
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

    }


})


