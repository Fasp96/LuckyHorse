function initPage(){
    add_race_field();
}

function add_race_field(){
    $.get("http://localhost:8000/api/add_tournaments", function(data){
        
        //Create and append the checkbox
        for (var i = 0; i < data.length; i++) {
            var input = document.createElement("input");
            input.type = "checkbox";
            input.value = data[i].id;
            input.name = data[i].name;
            var race_field = document.getElementById("race_fields");
            race_field.appendChild(input);
            race_field.appendChild(document.createTextNode(" " + data[i].name + " " + data[i].date));
            race_field.appendChild(document.createElement("br"));

        }
    });
}



//página carregou
$(document).ready(initPage);