function initPage(){
    add_tournaments(date, race_time);
}

//function that creates a field to add race to a tournament depending on the date
function add_tournaments(date, race_time){
    var id_race = document.getElementById("id_race");
    var id = id_race.value;
    //get method to get all tournaments from the database
    $.get("http://localhost:8000/api/add_races_tournaments", function(data){
        
        //gets the element to append the tournaments
        var div = document.getElementById("add");

        //if the date doesn't match the right format or the date inseted is before todays date 
        if(!date.value.match(/^\d{4}-\d{2}-\d{2}$/) || new Date() > new Date(date.value)){
            
            //deletes everything inside the div
            div.innerHTML = "";
            //adds a h6 with the text saying that doesn't no tournaments
            var h = document.createElement("H6");
            var t = document.createTextNode("***No Tournaments***");
            h.appendChild(t);
            div.appendChild(h);
        }
        else
        {
            //gets all the tournaments that that are before the date inserted and adds it to the array
            var tournament = [];
            for (var j = 0; j < data.length; j++) {

                race_time = document.getElementById("race_time").value;
                date = date.value;
                date = date + ' ' + race_time;

                if(data[j].date <= date){
                    tournament.push(data[j]);
                }   
            }

            //executes this part only if thre array isn't empty
            if(!tournament == [])
            {
                //deletes everthing inside the div
                div.innerHTML = "";

                //creates the select elemet
                var selectList = document.createElement("select");
                selectList.id = "add_tournament";
                selectList.name = "add_tournament";
                selectList.className = "form-control";
                div.appendChild(selectList);

                //Create and append the options
                var option = document.createElement("option");
                option.value = "";
                option.text = "";
                selectList.appendChild(option);
                for (var j = 0; j < tournament.length; j++) {
                    option = document.createElement("option");
                    option.value = tournament[j].id;
                    option.text = tournament[j].name + " - " + tournament[j].date;
                    if(tournament[j].id == id){
                        console.log('tem');    
                    }
                    selectList.appendChild(option);
                }   
            }
        }
    });
}

//Page loaded
$(document).ready(initPage);