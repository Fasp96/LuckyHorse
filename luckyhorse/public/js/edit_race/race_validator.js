function initPage(){
    //when the button is pressed
    $("#update_race_btn").click(function(){
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

    //makes the validation of all the inputs
    valid.push(validate_name(name,race_form.name));
    valid.push(validate_date(date, race_form.date));
    valid.push(validate_num_fields(num_fields, race_form.num_fields));
    valid.push(validate_description(description, race_form.description));
    valid.push(validate_location(location, race_form.location));
    valid.push(validate_race_photo(race_photo, race_form.race_photo));
    valid.push(validate_fields_not_equals(race_form.num_fields.value));

    //this condition is just to allow to verify if there are empty fields, only if the use has filled the last field or clicked the submit button 
    if(contents[contents.length-1] != '' || clicked == true){
        for(var i = 0; i < contents.length - 1; i++){
            not_empty.push(validate_empty(contents[i],elements[i]));
        }
    }

    //if everything is filled and validated it will remove the existing button and add a button inside the <form> to use the post method
    if(valid.reduce(and) && not_empty.reduce(and)){
        $("#update_race_btn").remove();
        $("#form_end").after("<button id='update_race_btn' type=\"submit\" class=\"btn btn-primary\">Update Race</button>"); 
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
    //needs to be before todays date
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
    //fecthes the type of file from the file name by getting the part after the last '.'
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

//function to verify if there isn't the same horse or jockey in more that one field
function validate_fields_not_equals(num_fields){

    //variable that is initialize at true if there aren't equal elements or empty and change to false if is found two equal elements or an empty one
    var not_equals = true;

    //only makes the verification if the number of fields is higher than 0
    if(num_fields > 0){

        //first verifies if the elements are empty
        for( var i = 1; i<= num_fields; i++){
            //removes all the 'p' and red bakgound-color of the fields if there is
            $("#" + i).children().css("background-color","#FFFFFF");
            $("#"+ i).children().filter('p').remove();

            //gets the two elements from each field
            horse_i = document.getElementById("horse_" + i);
            jockey_i = document.getElementById("jockey_" + i);

            //if the value is empty it will add a 'p' element and change the background to red
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

        //compares each elements with the rest of the fields 
        for (var i = 1; i <= num_fields; i++){
            
            //gets the two elements from i field
            horse_i = document.getElementById("horse_" + i);
            jockey_i = document.getElementById("jockey_" + i);

            for (var j = i + 1; j <= num_fields; j++){

                //gets the two elements from j field
                horse_j = document.getElementById("horse_" + j);
                jockey_j = document.getElementById("jockey_" + j);

                //compares there value if they are equal
                if(horse_i.value == horse_j.value && horse_i.value != "" && horse_j.value != ""){
                    $(horse_i).css("background", "#ffcccc");
                    $(horse_i).after("<p style=\"color:#ff5555\">*Invalid horse. Can't be the same horse as in Team " + j + "</p>");
                    $(horse_j).css("background", "#ffcccc");
                    $(horse_j).after("<p style=\"color:#ff5555\">*Invalid horse. Can't be the same horse as in Team " + i + "</p>");
                    not_equals = false;
                }
                 
                //compares there value if they are equal
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


//Page loaded
$(document).ready(initPage);