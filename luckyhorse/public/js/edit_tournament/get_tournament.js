function initPage(){
    get_tournament();
}

//fetches the tournament information  
function get_tournament(){
    var id_tournament = document.getElementById("id_tournament");
    var id = id_tournament.value;
    if(id != ''){
        $.get("http://localhost:8000/api/edit_tournament=" + id, function(data){
            document.getElementById('name').value = data[0]['name'];
            document.getElementById('initial_date').value = data[0]['date'].substring(0,10);
            document.getElementById('initial_time').value = data[0]['date'].substring(11,16);
            document.getElementById('description').innerHTML = data[0]['description'];
            document.getElementById('location').value = data[0]['location'];
            document.getElementById('tournament_photo').value = '';

        });
    }
}

//Page loaded
$(document).ready(initPage);