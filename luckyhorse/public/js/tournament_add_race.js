function initPage(){
    add_race_field(initial_date, finish_date);
}

function add_race_field(initial_date, finish_date){
    initial_date = initial_date.value;
    finish_date = finish_date.value;
    
    $.get("http://localhost:8000/api/add_tournaments", function(data){
        
        if(data == ""){
            
            //clears everything inside the div
            document.getElementById("race_fields").innerHTML = "";

            document.getElementById("race_fields").appendChild(document.createElement("br"));
            var p = document.createElement("P");
            var t = document.createTextNode("No races to add");
            p.appendChild(t);
            document.getElementById("race_fields").appendChild(p);
        }
        else if(initial_date != "" && finish_date == ""){
            
            //clears everythong inside the div
            document.getElementById("race_fields").innerHTML = "";

            var has_races = false;

            //Create and append the checkbox
            for (var i = 0; i < data.length; i++) {
                console.log(data[i].tournament_id); 
                if(data[i].date >= initial_date && data[i].tournament_id == null){
                    has_races = true;
                    var input = document.createElement("input");
                    input.type = "checkbox";
                    input.name = "races[]";
                    input.value = data[i].id;
                    input.className = "form-control";
                    var race_field = document.getElementById("race_fields");
                    race_field.appendChild(input);
                    race_field.appendChild(document.createTextNode(" " + data[i].name + " " + data[i].date));
                    race_field.appendChild(document.createElement("br"));
                }
            }

            if(has_races == false){

                //clears everythong inside the div
                document.getElementById("race_fields").innerHTML = "";
        
                document.getElementById("race_fields").appendChild(document.createElement("br"));
                var p = document.createElement("P");
                var t = document.createTextNode("No races to add after " + initial_date);
                p.appendChild(t);
                document.getElementById("race_fields").appendChild(p);
            }
        }
        else if(initial_date == "" && finish_date != ""){
            
            //clears everythong inside the div
            document.getElementById("race_fields").innerHTML = "";

            var has_races = false;
            
            //Create and append the checkbox
            for (var i = 0; i < data.length; i++) {

                if(data[i].date <= finish_date && data[i].tournament_id == null){
                    has_races = true;
                    var input = document.createElement("input");
                    input.type = "checkbox";
                    input.name = "races[]";
                    input.value = data[i].id;
                    input.className = "form-control";
                    var race_field = document.getElementById("race_fields");
                    race_field.appendChild(input);
                    race_field.appendChild(document.createTextNode(" " + data[i].name + " " + data[i].date));
                    race_field.appendChild(document.createElement("br"));
                }
            }
            if(has_races == false){
                
                //clears everythong inside the div
                document.getElementById("race_fields").innerHTML = "";
        
                document.getElementById("race_fields").appendChild(document.createElement("br"));
                var p = document.createElement("P");
                var t = document.createTextNode("No races to add before " + finish_date);
                p.appendChild(t);
                document.getElementById("race_fields").appendChild(p);
            }
        }
        else if(initial_date != "" && finish_date != ""){
            
            //clears everythong inside the div
            document.getElementById("race_fields").innerHTML = "";
            
            var has_races = false;

            //Create and append the checkbox
            for (var i = 0; i < data.length; i++) {
                if(data[i].date >= initial_date && data[i].date <= finish_date && data[i].tournament_id == null){
                    has_races = true;
                    var input = document.createElement("input");
                    input.type = "checkbox";
                    input.name = "races[]";
                    input.value = data[i].id;
                    input.className = "form-control";
                    var race_field = document.getElementById("race_fields");
                    race_field.appendChild(input);
                    race_field.appendChild(document.createTextNode(" " + data[i].name + " " + data[i].date));
                    race_field.appendChild(document.createElement("br"));
                }
            }
            if(has_races == false){
                
                //clears everythong inside the div
                document.getElementById("race_fields").innerHTML = "";
        
                document.getElementById("race_fields").appendChild(document.createElement("br"));
                var p = document.createElement("P");
                var t = document.createTextNode("No races to add between " + initial_date + " - " + finish_date);
                p.appendChild(t);
                document.getElementById("race_fields").appendChild(p);
            }
        }
    });
}

//página carregou
$(document).ready(initPage);