function initPage(){
    $("#add_tournament_btn").click(validate_input);
}

function validate_input(){

    var contents = [];
    var elements = [];
    var not_empty = [];
    var valid = [];

    var name = tournament_form.name.value;
    contents.push(name);
    elements.push(tournament_form.name);

    var date = tournament_form.date.value;
    contents.push(date);
    elements.push(horse_form.date);

    var description = tournament_form.description.value;
    contents.push(description);
    elements.push(horse_form.description);

    var location = tournament_form.location.value;
    contents.push(location);
    elements.push(horse_form.location);

    var tournament_photo = tournament_form.tournament_photo.value;
    contents.push(tournament_photo);
    elements.push(horse_form.tournament_photo);

    removeMessages();

    valid.push(validate_name(name,tournament_form.name));
    valid.push(validate_date(date,tournament_form.date));
    valid.push(validate_description(description, tournament_form.description));
    valid.push(validate_location(location, tournament_form.location));
    valid.push(validate_tournament_photo(tournament_photo, tournament_form.tournament_photo));

    console.log(contents);
    for(var i = 0; i < contents.length; i++){
        not_empty.push(validate_empty(contents[i],elements[i]));
    }

    if(valid.reduce(and) && not_empty.reduce(and)){
        console.log("postEvent");
        postEvent(name, date, gender, description, location, tournament_photo);
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

function validate_date(content, element){
    if(!content.match(/^\d{4}-\d{2}-\d{2}$/) && content != ""){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A date has the following format DD-MM-YYYY</p>");
        return false;
    }
    
    else if(new Date() > new Date(content)){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* The Date must be before todays date</p>");
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
    $("#horse_form").children().css("background-color","#FFFFFF");
    $("#horse_form").children().filter('p').remove();
}

function postEvent(name, date, description, location, tournament_photo){
    var content = "_token="+$("#token").val() + "&name="+name+"&date="+date+"&description="+description+"&location="+location+"&tournament_photo="+tournament_photo;

    console.log(content);
    $.post("http://localhost:8000/add_tournaments", content, 
    function(responseTxt,statuTxt,xhr){
        
        alert("posted");

    }
    );
}

//página carregou
$(document).ready(initPage);