function initPage(){
    add_race_field();
}

function add_race_field(){
    $.get("http://localhost:8000/api/add_tournaments", function(data){

        console.log(data);

        /*var div = document.getElementById(div_id);

        var field = document.createElement("div");
        field.id = field_id;
        div.appendChild(field);

        var field_name = field_id.charAt(0).toUpperCase() + field_id.slice(1,-1) + " " + field_id.charAt(field_id.length-1);
        field.appendChild(document.createTextNode(field_name));
        field.appendChild(document.createElement("br"));

        //Create and append select list
        field.appendChild(document.createTextNode("Horse"));

        var selectList = document.createElement("select");
        selectList.id = 'horse_' + field_id;
        selectList.name = 'horse_' + field_id;
        selectList.className = "form-control";
        selectList.setAttribute("onchange", function(){validate_input();});
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
        selectList.setAttribute("onchange", function(){validate_input();});
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
        field.appendChild(document.createElement("br"));*/
    });
}



//página carregou
$(document).ready(initPage);