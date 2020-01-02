function initPage(){
    get_jockey();
}

function get_jockey(){
    var id_jockey = document.getElementById("id_jockey");
    var id = id_jockey.value;
    $.get("http://localhost:8000/api/edit_jockey=" + id, function(data){
        console.log(data);

        document.getElementById('name').value = data['name'];
        document.getElementById('birth_date').value = data['birth_date'].substring(0,10);
        document.getElementById(data['gender']).checked = true;
        document.getElementById('num_races').value = data['num_races'];
        document.getElementById('num_victories').value = data['num_victories'];
        document.getElementById('jockey_photo').value = '';      

    });
}

//página carregou
$(document).ready(initPage);