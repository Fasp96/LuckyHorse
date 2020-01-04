function initPage(){
    //when the button is pressed
    $("#update_time_btn").click(function(){
        //it will validate the inputs and pass the parameter clicked true
        validate_input(true);
    });
}

//function to validate inputs receives the parameter clicked that is by default to false
function validate_input(clicked = false){

    var contents = [];
    var elements = [];
    var not_empty = [];
    var valid = [];

    var time = result_form.time.value;
    contents.push(time);
    elements.push(result_form.time);

    removeMessages();

    //this condition is just to allow to verify if there are empty fields, only if the use has filled the last field or clicked the submit button 
    if(contents[contents.length-1] != '' || clicked == true){
        for(var i = 0; i < contents.length - 1; i++){
            not_empty.push(validate_empty(contents[i],elements[i]));
        }
    }

    //if everything is filled and validated it will remove the existing button and add a button inside the <form> to use the post method
    if(not_empty.reduce){
        $("#update_time_btn").remove();
        $("#form_end").after("<button id='update_time_btn' type=\"submit\" class=\"btn btn-primary\">Update Result</button>"); 
    }
}

function removeMessages(){
    $("#result_form").children().css("background-color","#FFFFFF");
    $("#result_form").children().filter('p').remove();
}

//Page loaded
$(document).ready(initPage);