function initPage(){
    get_user();
}

function get_user(){
    var id_user = document.getElementById("id_user");
    var id = id_user.value;
    $.get("http://localhost:8000/api/edit_user=" + id, function(data){
        document.getElementById('name').value = data['name'];
        document.getElementById('role').value = data['role'];
        document.getElementById('email').value = data['email'];
        document.getElementById('birth_date').value = data['birth_date'].substring(0,10);
        document.getElementById(data['gender']).checked = true;
        document.getElementById('phone_number').value = data['phone_number'];
        document.getElementById('balance').value = data['balance'];
        document.getElementById('iban').value = data['iban'];
    });
}

//página carregou
$(document).ready(initPage);