function initPage(){
    //when the button is pressed
    $("#update_jockey_btn").click( function(){
        //it will validate the inputs and pass the parameter clicked true
        validate_input(true);
    });
}

//function to validate inputs receives the parameter clicked that is by default to false
function validate_input(clicked=false){

    var contents = [];
    var elements = [];
    var not_empty = [];
    var valid = [];

    var name = jockey_form.name.value;
    contents.push(name);
    elements.push(jockey_form.name);

    var birth_date = jockey_form.birth_date.value;
    contents.push(birth_date);
    elements.push(jockey_form.birth_date);

    var gender = jockey_form.gender.value;
    contents.push(gender);
    elements.push(jockey_form.gender.value);

    var num_races = jockey_form.num_races.value;
    contents.push(num_races);
    elements.push(jockey_form.num_races);

    var num_victories = jockey_form.num_victories.value;
    contents.push(num_victories);
    elements.push(jockey_form.num_victories);

    var jockey_photo = jockey_form.jockey_photo.value;
    contents.push(jockey_photo);
    elements.push(jockey_form.jockey_photo);

    removeMessages();

    //makes the validation of all the inputs
    valid.push(validate_name(name,jockey_form.name));
    valid.push(validate_birth_date(birth_date,jockey_form.birth_date));
    valid.push(validate_gender(gender, jockey_form.gender, contents[contents.length-1] != '' || clicked == true));
    valid.push(validate_num_races(num_races, jockey_form.num_races));
    valid.push(validate_num_victories(num_victories, num_races, jockey_form.num_victories));
    valid.push(validate_jockey_photo(jockey_photo, jockey_form.jockey_photo));

    //this condition is just to allow to verify if there are empty fields, only if the use has filled the last field or clicked the submit button 
    if(contents[contents.length-1] != '' || clicked == true){

        for(var i = 0; i < contents.length - 1; i++){
            not_empty.push(validate_empty(contents[i],elements[i]));
        }
    }

    //if everything is filled and validated it will remove the existing button and add a button inside the <form> to use the post method
    if(valid.reduce(and) && not_empty.reduce(and)){
        $("#update_jockey_btn").remove();
        $("#form_end").after("<button id='update_jockey_btn' type=\"submit\" class=\"btn btn-primary\">Update Jockey</button>");   
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

function validate_name(content, element){
    if(!content.match((/^([A-Z][A-Za-zÀ-ÿ]* *)*$/))){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A name has one or more words that always start with an uppercase followed by lowercases letters</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_birth_date(content, element){
    //gets the date the date 18 years ago
    var min_birth_date = new Date(
        new Date().getFullYear()-18,
        new Date().getMonth(),
        new Date().getDate());
    
    if(!content.match(/^\d{4}-\d{2}-\d{2}$/) && content != ""){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A date has the following format DD-MM-YYYY</p>");
        return false;
    }
    
    //needs to be before todays date
    else if(new Date(content) > new Date()){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* The birth date must be before todays date</p>");
        return false;
    }

    //needs to be older that 18
    else if(new Date(content) > min_birth_date){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* The birth date must be older that 18 years</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_gender(content, element, show_message){
    if(content != 'male' && content != 'female' && content != 'other'&& show_message ){
        $('#gender_radio').after("<p style=\"color:#ff5555\">* Please choose on of these fields before submitting again</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_num_races(content, element){
    if(!content.match(/^([+]?[1-9]\d*|0)$/) && content != ''){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* Please insert a number equal or greater that 0</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_num_victories(content, content_races, element){
    if(!content.match(/^([+]?[1-9]\d*|0)$/) && content != ''){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* Please insert a number equal or greater that 0</p>");
        return false;
    }
    //number of victories needs to be less or equal to the number of races
    else if (content > content_races){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* Please insert a number lower or equal than " + content_races + "</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_jockey_photo(content, element){
    //fecthes the type of file from the file name by getting the part after the last '.'
    var file_type = content.substring(content.lastIndexOf('.') + 1).toLowerCase();
    if(file_type != "png" && file_type != "jpeg" && file_type != "jpg" && file_type != ''){
        $(element).after("<p style=\"color:#c2b100\">*Invalide file type. Please insert a .png, .jpeg or .jpg file</p>");
        return false;
    }
    else{
        return true;
    }
}

function removeMessages(){
    $("#jockey_form").children().css("background-color","#FFFFFF");
    $("#jockey_form").children().filter('p').remove();
}

//página carregou
$(document).ready(initPage);