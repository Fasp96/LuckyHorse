function initPage(){
    get_race();
}

function get_race(){
    var id_race = document.getElementById("id_race");
    var id = id_race.value;
    $.get("http://localhost:8000/api/edit_race=" + id, function(data){
        console.log(data);

        document.getElementById('name').value = data[0]['name'];
        document.getElementById('date').value = data[0]['date'].substring(0,10);
        document.getElementById('add_tournament').value = data[0]['tournament_id'];
        document.getElementById('num_fields').value = data[1].length;
        document.getElementById('horse_1').value = data[1][0]['horse_id'];
        document.getElementById('jockey_1').value = data[1][0]['jockey_id'];
        document.getElementById('horse_2').value = data[1][1]['horse_id'];
        document.getElementById('jockey_2').value = data[1][1]['jockey_id'];

        document.getElementById('description').innerHTML = data[0]['description'];
        document.getElementById('location').value = data[0]['location'];
        document.getElementById('race_photo').value = '';        

    });
}

//página carregou
$(document).ready(initPage);