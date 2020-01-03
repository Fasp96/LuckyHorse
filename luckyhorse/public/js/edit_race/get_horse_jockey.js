function initPage(){
    get_horse_jockey();
}

function get_horse_jockey(){
    var id_race = document.getElementById("id_race");
    var id = id_race.value;
    $.get("http://localhost:8000/api/edit_race=" + id, function(data){
        if(data[0]['tournament_id']!= null)
            document.getElementById('add_tournament').value = data[0]['tournament_id'];
        for(var i = 0; i < data[1].length; i++){
            var horse = 'horse_' + (i+1);
            var jockey = 'jockey_' + (i+1);
            document.getElementById(horse).value = data[1][i]['horse_id'];
            document.getElementById(jockey).value = data[1][i]['jockey_id'];
        }      
    });
}

//página carregou
$(document).ready(initPage);