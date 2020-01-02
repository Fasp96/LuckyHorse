function initPage(){
    get_horse();
}

function get_horse(){
    var id_horse = document.getElementById("id_horse");
    var id = id_horse.value;
    $.get("http://localhost:8000/api/edit_horse=" + id, function(data){
        document.getElementById('name').value = data['name'];
        document.getElementById('breed').value = data['breed'];
        document.getElementById('birth_date').value = data['birth_date'].substring(0,10);
        document.getElementById(data['gender']).checked = true;
        document.getElementById('num_races').value = data['num_races'];
        document.getElementById('num_victories').value = data['num_victories'];
        document.getElementById('horse_photo').value = '';        
    });
}

//página carregou
$(document).ready(initPage);