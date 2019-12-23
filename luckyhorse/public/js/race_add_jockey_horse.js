function initPage(){
    
}

//function to add the fields for the teams (horse, jokey) participating in the race
function add_fields(){

    //clears everythong inside the div
    document.getElementById("fields").innerHTML = "";

    var num_fields = race_form.num_fields.value;

    for(var i = 1; i <= num_fields; i++){
        add_race_field("fields", i);
    }
}
//function that creates a field for a team given the div id to add the new field and  the field id
function add_race_field(div_id, field_id){
    $.get("http://localhost:8000/api/add_races", function(data){

        var div = document.getElementById(div_id);

        var field = document.createElement("div");
        field.id = field_id;
        div.appendChild(field);

        var field_name = "Team " + field_id;
        field.appendChild(document.createTextNode(field_name));
        field.appendChild(document.createElement("br"));

        //Create and append select list
        field.appendChild(document.createTextNode("Horse"));

        var selectList = document.createElement("select");
        selectList.id = 'horse_' + field_id;
        selectList.name = 'horse_' + field_id;
        selectList.className = "form-control";
        selectList.setAttribute("onchange", function validate(){validate_input();});
        field.appendChild(selectList);

        var option = document.createElement("option");
        option.value = "";
        option.text = "";
        selectList.appendChild(option);
        //Create and append the options
        for (var j = 0; j < data[0].length; j++) {
            option = document.createElement("option");
            option.value = data[0][j].id;
            option.text = data[0][j].name;
            selectList.appendChild(option);
        }

        field.appendChild(document.createElement("br"));
        
        //Create and append select list
        field.appendChild(document.createTextNode("Jockey"));

        var selectList = document.createElement("select");
        selectList.id = 'jockey_' + field_id;
        selectList.name = 'jockey_' + field_id;
        selectList.className = "form-control";
        selectList.setAttribute("onchange", function validate(){validate_input();});
        field.appendChild(selectList);
        
        var option = document.createElement("option");
        option.value = "";
        option.text = "";
        selectList.appendChild(option);

        //Create and append the options
        for (var j = 0; j < data[1].length; j++) {
            option = document.createElement("option");
            option.value = data[1][j].id;
            option.text = data[1][j].name;
            selectList.appendChild(option);
        }

        field.appendChild(document.createElement("br"));
        field.appendChild(document.createElement("br"));
    });
}

//página carregou
$(document).ready(initPage);