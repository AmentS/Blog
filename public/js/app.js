
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
/*    if (name === '' && pass !== '') {
        error('webName');
        return;
    } else if (pass === '' && webName !== '') {
        error('pass');
        return;
    } else if (webName === '' && pass === '') {
        error();
        return;
    }*/

    var pram = `name=${name}&email=${email}&text=${text}&select=${select}`;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../save_contact_msg.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {

        if (this.responseText === 'saved') {
            //swal("Successs", "Password successfully added!", "success");
            alert('Msg sent');
           document.getElementById('name').value = '';
           document.getElementById('email').value = '';
           document.getElementById('text').value = '';
        } else if (this.responseText === 'not_ok') {
            //swal("Error", "Website is already saved", "error");
            alert('error')
        }

    }
    xhr.send(pram);


})

/*function error(msg) {
    const p = document.createElement('p');
    if (msg === 'webName') {
        p.appendChild(document.createTextNode('Please enter website name'));
    } else if (msg === 'pass') {
        p.appendChild(document.createTextNode('Please generate password'));
    } else {
        p.appendChild(document.createTextNode('Please enter website name and generate password'));
    }

    const div = document.getElementById('error-div');
    div.appendChild(p);
/!*    const container = document.querySelector('.container-2-box');
    const label = document.querySelector('#label');
    container.insertBefore(div, label);//da ubacimo div prije lable-a*!/
    setTimeout(() => document.querySelector('.container-error').remove(), 2000)
}*/



