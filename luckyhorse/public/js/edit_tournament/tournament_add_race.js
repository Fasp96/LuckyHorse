function initPage(){
    add_race_field(initial_date, finish_date);
}

//function that creates a field to add race to a tournament depending on the initial date and finish date 
function add_race_field(initial_date, finish_date){
    //gets the initial and finish date value
    initial_date = initial_date.value;
    finish_date = finish_date.value;
    
    var id_tournament = document.getElementById("id_tournament");
    var id = id_tournament.value;
    console.log(id);
    //get method to get all races from the database
    $.get("http://localhost:8000/api/add_tournaments=" + id, function(data){
        console.log(data);
        //if there are no races to add
        if(data == ""){
            
            //clears everything inside the div
            document.getElementById("race_fields").innerHTML = "";

            //adds a 'p' element saying no races to add 
            document.getElementById("race_fields").appendChild(document.createElement("br"));
            var p = document.createElement("P");
            var t = document.createTextNode("No races to add");
            p.appendChild(t);
            document.getElementById("race_fields").appendChild(p);
        }

        //if it only has initial date
        else if(initial_date != "" && finish_date == ""){
            
            //clears everything inside the div
            document.getElementById("race_fields").innerHTML = "";

            //variable initalize at false and changes to true if there are races that can be added
            var has_races = false;

            //Create and append the checkbox
            for (var i = 0; i < data.length; i++) { 
                
                //if the race date is after that initial tournament date
                if(data[i].date >= initial_date){
                    
                    //changes the variable to true 
                    has_races = true;
                    
                    //creates a check box with that race
                    var input = document.createElement("input");
                    input.type = "checkbox";
                    input.name = "races[]";
                    input.value = data[i].id;
                    input.className = "form-control";
                    var race_field = document.getElementById("race_fields");
                    if(data[i].tournament_id == id)
                        input.checked = true;
                    race_field.appendChild(input);
                    //adds a text node with the information
                    race_field.appendChild(document.createTextNode(" " + data[i].name + " " + data[i].date));
                    race_field.appendChild(document.createElement("br"));
                }
            }

            //if has_race variable is false
            if(has_races == false){
                
                //adds a 'p' element saying no races to add after that initial date
                document.getElementById("race_fields").appendChild(document.createElement("br"));
                var p = document.createElement("P");
                var t = document.createTextNode("No races to add after " + initial_date);
                p.appendChild(t);
                document.getElementById("race_fields").appendChild(p);
            }
        }

        //if initial date is empty but finish date isn't
        else if(initial_date == "" && finish_date != ""){
            
            //clears everything inside the div
            document.getElementById("race_fields").innerHTML = "";

            //variable initalize at false and changes to true if there are races that can be added
            var has_races = false;
            
            //Create and append the checkbox
            for (var i = 0; i < data.length; i++) {
                //if the race date is before that finish tournament date
                if(data[i].date <= finish_date){
                    //changes the variable to true 
                    has_races = true;

                    //creates a check box with that race
                    var input = document.createElement("input");
                    input.type = "checkbox";
                    input.name = "races[]";
                    input.value = data[i].id;
                    input.className = "form-control";
                    var race_field = document.getElementById("race_fields");
                    race_field.appendChild(input);
                    //adds a text node with the information
                    race_field.appendChild(document.createTextNode(" " + data[i].name + " " + data[i].date));
                    race_field.appendChild(document.createElement("br"));
                }
            }

            //if has_race variable is false
            if(has_races == false){
        
                //adds a 'p' element saying no races to add before that  finish date
                document.getElementById("race_fields").appendChild(document.createElement("br"));
                var p = document.createElement("P");
                var t = document.createTextNode("No races to add before " + finish_date);
                p.appendChild(t);
                document.getElementById("race_fields").appendChild(p);
            }
        }

        //if it has initial date and finish date
        else if(initial_date != "" && finish_date != ""){
            
            //clears everything inside the div
            document.getElementById("race_fields").innerHTML = "";
            
            //variable initalize at false and changes to true if there are races that can be added
            var has_races = false;

            //Create and append the checkbox
            for (var i = 0; i < data.length; i++) {
                //if the race date is after that initial date and before that finish tournament date
                if(data[i].date >= initial_date && data[i].date <= finish_date){
                    
                    //changes the variable to true
                    has_races = true;
                    
                    //creates a check box with that race
                    var input = document.createElement("input");
                    input.type = "checkbox";
                    input.name = "races[]";
                    input.value = data[i].id;
                    input.className = "form-control";
                    var race_field = document.getElementById("race_fields");
                    race_field.appendChild(input);
                    //adds a text node with the information
                    race_field.appendChild(document.createTextNode(" " + data[i].name + " " + data[i].date));
                    race_field.appendChild(document.createElement("br"));
                }
            }

            //if has_race variable is false
            if(has_races == false){

                //adds a 'p' element saying no races to add before that  finish date
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