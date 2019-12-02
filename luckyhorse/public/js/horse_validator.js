function initPage(){
    $("#add_horse_btn").click(function(){
        validate_input(true);
    });
}

function validate_input(clicked = false){

    var contents = [];
    var elements = [];
    var not_empty = [];
    var valid = [];

    var name = horse_form.name.value;
    contents.push(name);
    elements.push(horse_form.name);

    var breed = horse_form.breed.value;
    contents.push(breed);
    elements.push(horse_form.breed);

    var birth_date = horse_form.birth_date.value;
    contents.push(birth_date);
    elements.push(horse_form.birth_date);

    var gender = horse_form.gender.value;
    contents.push(gender);
    elements.push(horse_form.gender.value);

    var num_races = horse_form.num_races.value;
    contents.push(num_races);
    elements.push(horse_form.num_races);

    var num_victories = horse_form.num_victories.value;
    contents.push(num_victories);
    elements.push(horse_form.num_victories);

    var horse_photo = horse_form.horse_photo.value;
    contents.push(horse_photo);
    elements.push(horse_form.horse_photo);

    removeMessages();

    valid.push(validate_name(name,horse_form.name));
    valid.push(validate_breed(breed, horse_form.breed));
    valid.push(validate_birth_date(birth_date,horse_form.birth_date));
    valid.push(validate_gender(gender, horse_form.gender, contents[contents.length-1] != '' || clicked == true));
    valid.push(validate_num_races(num_races, horse_form.num_races));
    valid.push(validate_num_victories(num_victories, horse_form.num_victories));
    valid.push(validate_horse_photo(horse_photo, horse_form.horse_photo));

    if(contents[contents.length-1] != '' || clicked == true){
        for(var i = 0; i < contents.length; i++){
            not_empty.push(validate_empty(contents[i],elements[i]));
        }
    }

    if(valid.reduce(and) && not_empty.reduce(and)){
        $("#add_horse_btn").remove();
        $("#horse_photo").after("<br><br><button type=\"submit\" class=\"btn btn-primary\">Add Horse</button>");
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
    if(!content.match((/^([A-ZÀ-Ÿ][a-zà-ÿ]* *)*$/))){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A name has one or more words that always start with an uppercase followed by lowercases letters</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_breed(content, element){
    if(!content.match((/^([A-Z][A-Za-zÀ-ÿ]* *)*$/))){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A breed name has one or more words that always start with an uppercase followed by lowercases letters</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_birth_date(content, element){
    if(!content.match(/^\d{4}-\d{2}-\d{2}$/) && content != ""){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A date has the following format DD-MM-YYYY</p>");
        return false;
    }
    
    else if(new Date(content) > new Date()){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* The birth date must be before todays date</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_gender(content, element, show_message){
    if(content != 'male' && content != 'female' && content != 'other' && show_message){
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

function validate_num_victories(content, element){
    if(!content.match(/^([+]?[1-9]\d*|0)$/) && content != ''){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* Please insert a number equal or greater that 0</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_horse_photo(content, element){
    var file_type = content.substring(content.lastIndexOf('.') + 1).toLowerCase();
    if(file_type != "png" && file_type != "jpeg" && file_type != "jpg" && file_type != '' ){
        $(element).after("<p style=\"color:#c2b100\">*Invalid file type. Please insert a .png, .jpeg or .jpg file</p>");
        return false;
    }
    else{
        return true;
    }
}

function removeMessages(){
    $("#horse_form").children().css("background-color","#FFFFFF");
    $("#horse_form").children().filter('p').remove();
}


//página carregou
$(document).ready(initPage);