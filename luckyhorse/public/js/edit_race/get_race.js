function initPage(){
    get_race();
}

//fetches in the beginning all information about the race except tournament_id and the tema sin the race
function get_race(){
    var id_race = document.getElementById("id_race");
    var id = id_race.value;
    $.get("http://localhost:8000/api/edit_race=" + id, function(data){
        console.log(data);

        document.getElementById('name').value = data[0]['name'];
        document.getElementById('date').value = data[0]['date'].substring(0,10);
        document.getElementById('race_time').value = data[0]['date'].substring(11,16);
        document.getElementById('num_fields').value = data[1].length;
        document.getElementById('description').innerHTML = data[0]['description'];
        document.getElementById('location').value = data[0]['location'];
        document.getElementById('race_photo').value = '';        

    });
}

//Page loaded
$(document).ready(initPage);