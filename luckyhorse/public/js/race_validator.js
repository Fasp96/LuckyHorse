function initPage(){
    $("#add_race_btn").click(function(){
        validate_input(true);
    });
}

function validate_input(clicked = false){

    var contents = [];
    var elements = [];
    var not_empty = [];
    var valid = [];

    var name = race_form.name.value;
    contents.push(name);
    elements.push(race_form.name);

    var date = race_form.date.value;
    contents.push(date);
    elements.push(race_form.date);

    var description = race_form.description.value;
    contents.push(description);
    elements.push(race_form.description);

    var location = race_form.location.value;
    contents.push(location);
    elements.push(race_form.location);

    var race_photo = race_form.race_photo.value;
    contents.push(race_photo);
    elements.push(race_form.race_photo);

    removeMessages();
    console.log(contents);

    valid.push(validate_name(name,race_form.name));
    valid.push(validate_date(date, race_form.date));
    valid.push(validate_description(description, race_form.description));
    valid.push(validate_location(location, race_form.location));
    valid.push(validate_race_photo(race_photo, race_form.race_photo));

    if(contents[contents.length-1] != '' || clicked == true){
        for(var i = 0; i < contents.length; i++){
            not_empty.push(validate_empty(contents[i],elements[i]));
        }
    }

    if(valid.reduce(and) && not_empty.reduce(and)){
        $("#add_race_btn").remove();
        $("#race_photo").after("<br><br><button type=\"submit\" class=\"btn btn-primary\">Add Race</button>");
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

function validate_date(content, element){
    if(!content.match(/^\d{4}-\d{2}-\d{2}$/) && content != ""){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A date has the following format DD-MM-YYYY</p>");
        return false;
    }
    
    else if(new Date() > new Date(content)){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* The Date must be after todays date</p>");
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

function validate_race_photo(content, element){
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
    $("#race_form").children().css("background-color","#FFFFFF");
    $("#race_form").children().filter('p').remove();
}

//página carregou
$(document).ready(initPage);