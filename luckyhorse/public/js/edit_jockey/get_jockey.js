function initPage(){
    get_jockey();
}

//fetches jockey information and adds to the edit jockey form
function get_jockey(){
    var id_jockey = document.getElementById("id_jockey");
    var id = id_jockey.value;
    $.get("http://localhost:8000/api/edit_jockey=" + id, function(data){

        document.getElementById('name').value = data['name'];
        document.getElementById('birth_date').value = data['birth_date'].substring(0,10);
        document.getElementById(data['gender']).checked = true;
        document.getElementById('num_races').value = data['num_races'];
        document.getElementById('num_victories').value = data['num_victories'];
        document.getElementById('jockey_photo').value = '';      

    });
}

//Page loaded
$(document).ready(initPage);