function initPage(){
    get_horse();
}

function get_horse(){
    var id_horse = document.getElementById("id_horse");
    var id = id_horse.value;
    $.get("http://localhost:8000/api/edit_horse=" + id, function(data){
        console.log(data);

        document.getElementById('name').value = data[0]['name'];
        document.getElementById('breed').value = data[0]['breed'];
        document.getElementById('birth_date').value = data[0]['birth_date'];
        document.getElementById('gender').value = data[0]['gender'];
        document.getElementById('num_races').value = data[0]['num_races'];
        document.getElementById('num_victories').value = data[0]['num_victories'];
        document.getElementById('horse_photo').value = '';
               

    });
}

//página carregou
$(document).ready(initPage);