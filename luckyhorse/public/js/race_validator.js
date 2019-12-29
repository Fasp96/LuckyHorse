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

    var num_fields = race_form.num_fields.value;
    contents.push(num_fields);
    elements.push(race_form.num_fields);

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
    valid.push(validate_num_fields(num_fields, race_form.num_fields));
    valid.push(validate_description(description, race_form.description));
    valid.push(validate_location(location, race_form.location));
    valid.push(validate_race_photo(race_photo, race_form.race_photo));
    valid.push(validate_fields_not_equals(race_form.num_fields.value));

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

function validate_num_fields(content, element){
    if(!content.match(/^([+]?[1-9]\d*|0)$/) && content != ''){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* Please insert a number equal or greater that 0</p>");
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

function validate_fields_not_equals(num_fields){

    var not_equals = true;

    if(num_fields > 0){
        for( var i = 1; i<= num_fields; i++){
            $("#" + i).children().css("background-color","#FFFFFF");
            $("#"+ i).children().filter('p').remove();

            horse_i = document.getElementById("horse_" + i);
            jockey_i = document.getElementById("jockey_" + i);

            if(horse_i.value == ""){
                $(horse_i).css("background", "#ffcccc");
                $(horse_i).after("<p style=\"color:#ff5555\">*This field can't be empty choose a horse</p>");
                not_equals = false;
            }

            if(jockey_i.value == ""){
                $(jockey_i).css("background", "#ffcccc");
                $(jockey_i).after("<p style=\"color:#ff5555\">*This field can't be empty choose a jockey</p>");
                not_equals = false;
            }
        }

        for (var i = 1; i <= num_fields; i++){
            for (var j = i + 1; j <= num_fields; j++){

                horse_i = document.getElementById("horse_" + i);
                horse_j = document.getElementById("horse_" + j);

                if(horse_i.value == horse_j.value && horse_i.value != "" && horse_j.value != ""){
                    $(horse_i).css("background", "#ffcccc");
                    $(horse_i).after("<p style=\"color:#ff5555\">*Invalid horse. Can't be the same horse as in Team " + j + "</p>");
                    $(horse_j).css("background", "#ffcccc");
                    $(horse_j).after("<p style=\"color:#ff5555\">*Invalid horse. Can't be the same horse as in Team " + i + "</p>");
                    not_equals = false;
                }
                
                jockey_i = document.getElementById("jockey_" + i);
                jockey_j = document.getElementById("jockey_" + j);

                if(jockey_i.value == jockey_j.value && jockey_i.value != "" && jockey_j.value != ""){
                    $(jockey_i).css("background", "#ffcccc");
                    $(jockey_i).after("<p style=\"color:#ff5555\">*Invalid jockey. Can't be the same jockey as in Team " + j + "</p>");
                    $(jockey_j).css("background", "#ffcccc");
                    $(jockey_j).after("<p style=\"color:#ff5555\">*Invalid jockey. Can't be the same jockey as in Team " + i + "</p>");
                    not_equals = false;
                }
            }
        }   
    }
    return not_equals;
}


//página carregou
$(document).ready(initPage);