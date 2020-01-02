function initPage(){
    get_jockey();
}

function get_jockey(){
    var id_jockey = document.getElementById("id_jockey");
    var id = id_jockey.value;
    $.get("http://localhost:8000/api/edit_horse=" + id, function(data){
        console.log(data);

        document.getElementById('name').value = data[0]['name'];
        document.getElementById('birth_date').value = data[0]['birth_date'];
        document.getElementById('gender').value = data[0]['gender'];
        document.getElementById('num_races').value = data[0]['num_races'];
        document.getElementById('num_victories').value = data[0]['num_victories'];
        document.getElementById('jockey_photo').value = '';
               

    });
}

//página carregou
$(document).ready(initPage);