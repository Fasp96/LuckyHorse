function initPage(){
    //when the button is pressed
    $("#add_bet_btn").click(function(){
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

    var id = bet_form.id.value;
    contents.push(id);
    elements.push(bet_form.id);

    var name = bet_form.name.value;
    contents.push(name);
    elements.push(bet_form.name);

    var date = bet_form.date.value;
    contents.push(date);
    elements.push(bet_form.date);

    var horse = bet_form.horse.value;
    contents.push(horse);
    elements.push(bet_form.horse);

    var jockey = bet_form.jockey.value;
    contents.push(jockey);
    elements.push(bet_form.jockey);

    removeMessages();   

    //makes the validation of all the inputs
    valid.push(validate_value(value,bet_form.value));

    //this condition is just to allow to verify if there are empty fields, only if the use has filled the last field or clicked the submit button 
    if(contents[contents.length-1] != '' || clicked == true){
        for(var i = 0; i < contents.length; i++){
            not_empty.push(validate_empty(contents[i],elements[i]));
        }
    }

    //if everything is filled and validated it will remove the existing button and add a button inside the <form> to use the post method
    if(valid.reduce(and) && not_empty.reduce(and)){
        $("#add_bet_btn").remove();
        $("#value").after("<br><br><button type=\"submit\" class=\"btn btn-primary\">Bet</button>");
    }
}

function and(a,b){
    return a && b;
}

function validate_empty(content, element){
    if(content == ''){
        $(element).css("background", "#ffcccc");
        $(element).after("<p style=\"color:#ff5555\">* Please fill this field before submitting again</p>");
        return false;
    }else{
        return true;
    }
}

function validate_value(content, element){
    if(!isNaN(content) && content < 0 && content != ''){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* Please insert a value equal or greater that 0</p>");
        return false;
    }
    else{
        return true;
    }
}

function removeMessages(){
    $("#bet_form").children().css("background-color","#FFFFFF");
    $("#bet_form").children().filter('p').remove();
}

//Page loaded
$(document).ready(initPage);