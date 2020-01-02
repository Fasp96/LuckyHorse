function initPage(){
    //when the button is pressed
    $("#add_tournament_btn").click(function(){
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

    var name = tournament_form.name.value;
    contents.push(name);
    elements.push(tournament_form.name);

    var initial_date = tournament_form.initial_date.value;
    contents.push(initial_date);
    elements.push(tournament_form.initial_date);

    var description = tournament_form.description.value;
    contents.push(description);
    elements.push(tournament_form.description);

    var location = tournament_form.location.value;
    contents.push(location);
    elements.push(tournament_form.location);

    var tournament_photo = tournament_form.tournament_photo.value;
    contents.push(tournament_photo);
    elements.push(tournament_form.tournament_photo);

    var finish_date = tournament_form.finish_date.value;
    contents.push(finish_date);
    elements.push(tournament_form.finish_date);

    removeMessages();

    //makes the validation of all the inputs
    valid.push(validate_name(name,tournament_form.name));
    valid.push(validate_initial_date(initial_date, tournament_form.initial_date));
    valid.push(validate_finish_date(initial_date, finish_date, tournament_form.finish_date));
    valid.push(validate_description(description, tournament_form.description));
    valid.push(validate_location(location, tournament_form.location));
    valid.push(validate_tournament_photo(tournament_photo, tournament_form.tournament_photo));  

    //this condition is just to allow to verify if there are empty fields, only if the use has filled the last field or clicked the submit button 
    if(contents[contents.length - 1] != '' || clicked == true){
        //just doesn't validate empty finish_date and is the last element in the on both contents and elements array
        for(var i = 0; i < contents.length - 1; i++){
            not_empty.push(validate_empty(contents[i],elements[i]));
        }
    }

    //if everything is filled and validated it will remove the existing button and add a button inside the <form> to use the post method
    if(valid.reduce(and) && not_empty.reduce(and)){
        $("#add_tournament_btn").remove();
        $("#form_end").after("<button id='add_tournament_btn' type=\"submit\" class=\"btn btn-primary\">Add Tournament</button>");   
    }
}

function and(a,b){
    return a && b;
}

function validate_empty(content, element){
    if(content == ''){
        $(element).css("backgroud", "#ffcccc");
        $(element).after("<p style=\"color:#ff5555\">* Please fill this field before submitting again</p>");
        return false;
    }else{
        return true;
    }
}

function validate_name(content, element){
    if(!content.match((/^([A-ZÀ-Ÿ][a-zà-ÿ]* *)*$/))){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A name has one or more words that always start with an uppercase followed by lowercases letters</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_initial_date(content, element){
    if(!content.match(/^\d{4}-\d{2}-\d{2}$/) && content != ""){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A date has the following format DD-MM-YYYY</p>");
        return false;
    }
    
    //needs to be after todays date
    else if(new Date() > new Date(content)){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* The Date must be after todays date</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_finish_date(init_date,content, element){
    if(!content.match(/^\d{4}-\d{2}-\d{2}$/) && content != ""){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A date has the following format DD-MM-YYYY</p>");
        return false;
    }
    
    //needs to be before todays date
    else if(new Date() > new Date(content)){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* The Date must be before todays date</p>");
        return false;
    }

    //needs to be before inital date
    else if(new Date(init_date) >= new Date(content)){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* The Date must be before the date " + init_date + "</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_description(content, element){
    return true;
}

function validate_location(content, element){
    return true;
}

function validate_tournament_photo(content, element){
    //fecthes the type of file from the file name by getting the part after the last '.'
    var file_type = content.substring(content.lastIndexOf('.') + 1).toLowerCase();
    if(file_type != "png" && file_type != "jpeg" && file_type != "jpg" && file_type != '' ){
        $(element).after("<p style=\"color:#c2b100\">*Invalide file type. Please insert a .png, .jpeg or .jpg file</p>");
        return false;
    }
    else{
        return true;
    }
}

function removeMessages(){
    $("#tournament_form").children().css("background-color","#FFFFFF");
    $("#tournament_form").children().filter('p').remove();
}

//página carregou
$(document).ready(initPage);