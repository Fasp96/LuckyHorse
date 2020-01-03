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
        document.getElementById('race_time').value = data[0]['date'].substring(11,16);
        if(data[0]['tournament_id']!= null)
            document.getElementById('add_tournament').value = data[0]['tournament_id'];
        document.getElementById('num_fields').value = data[1].length;
        for(var i = 0; i < data[1].length; i++){
            var horse = 'horse_' + (i+1);
            var jockey = 'jockey_' + (i+1);
            document.getElementById(horse).value = data[1][i]['horse_id'];
            document.getElementById(jockey).value = data[1][i]['jockey_id'];
        }
        document.getElementById('description').innerHTML = data[0]['description'];
        document.getElementById('location').value = data[0]['location'];
        document.getElementById('race_photo').value = '';        

    });
}

//página carregou
$(document).ready(initPage);