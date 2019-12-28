function initPage(){
    add_tournaments(date);
}

//function that creates a field to add race to a tournament depending on the date
function add_tournaments(date){

    $.get("http://localhost:8000/api/add_races_tournaments", function(data){

        var div = document.getElementById("add");
        if(!date.value.match(/^\d{4}-\d{2}-\d{2}$/) || new Date() > new Date(date.value)){
            
            div.innerHTML = "";
            var h = document.createElement("H6");
            var t = document.createTextNode("***No Tournaments***");
            h.appendChild(t);
            div.appendChild(h);
        }
        else
        {
            var tournament = [];
            for (var j = 0; j < data.length; j++) {
                console.log("data of " + j + " " + data[j].date);
                console.log("inserted date " + date.value);
                console.log(data[j].date <= date.value);
                
                if(data[j].date <= date.value){
                    tournament.push(data[j]);
                }   
            }

            if(!tournament == [])
            {
                div.innerHTML = "";
                var selectList = document.createElement("select");
                selectList.id = "add_tournament";
                selectList.name = "add_tournament";
                selectList.className = "form-control";
                div.appendChild(selectList);

                var option = document.createElement("option");
                option.value = "";
                option.text = "";
                selectList.appendChild(option);

                //Create and append the options
                for (var j = 0; j < tournament.length; j++) {
                    option = document.createElement("option");
                    option.value = tournament[j].id;
                    option.text = tournament[j].name + " - " + tournament[j].date;
                    selectList.appendChild(option);
                }   
            }
        }
    });
}

//página carregou
$(document).ready(initPage);