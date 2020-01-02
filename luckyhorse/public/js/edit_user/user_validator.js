function initPage(){
    //when the button is pressed
    $("#update_user_btn").click(function(){
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

    var name = user_form.name.value;
    contents.push(name);
    elements.push(user_form.name);

    var role = user_form.role.value;
    contents.push(role);
    elements.push(user_form.role);

    var email = user_form.email.value;
    contents.push(email);
    elements.push(user_form.email);

    var birth_date = user_form.birth_date.value;
    contents.push(birth_date);
    elements.push(user_form.birth_date);

    var gender = user_form.gender.value;
    contents.push(gender);
    elements.push(user_form.gender.value);

    var phone_number = user_form.phone_number.value;
    contents.push(phone_number);
    elements.push(user_form.phone_number);

    var balance = user_form.balance.value;
    contents.push(balance);
    elements.push(user_form.balance);

    var iban = user_form.iban.value;
    contents.push(iban);
    elements.push(user_form.iban);

    removeMessages();

    //makes the validation of all the inputs
    valid.push(validate_name(name,user_form.name));
    valid.push(validate_role(role, user_form.role));
    valid.push(validate_email(email, user_form.email));
    valid.push(validate_birth_date(birth_date,user_form.birth_date));
    valid.push(validate_gender(gender, user_form.gender, contents[contents.length-1] != '' || clicked == true));
    valid.push(validate_phone_number(phone_number, user_form.phone_number));
    valid.push(validate_balance(balance, num_races, user_form.balance));
    valid.push(validate_iban(iban, user_form.iban));

    //this condition is just to allow to verify if there are empty fields, only if the use has filled the last field or clicked the submit button
    if(contents[contents.length-1] != '' || clicked == true){
        for(var i = 0; i < contents.length - 1; i++){
            not_empty.push(validate_empty(contents[i],elements[i]));
        }
    }

    //if everything is filled and validated it will remove the existing button and add a button inside the <form> to use the post method
    if(valid.reduce(and) && not_empty.reduce(and)){
        $("#update_user_btn").remove();
        $("#form_end").after("<button id='update_user_btn' type=\"submit\" class=\"btn btn-primary\">Update user</button>"); 
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

function validate_role(content, element){
    if(!content.match((/^([A-Za-zÀ-ÿ]*)$/))){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A role name is only one word</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_email(content, element){
    if(!content.match((/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/))){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* The email isn\'t valid</p>");
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
    //needs to be before todays date
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

function validate_phone_number(content, element){
    if(!content.match(/^(\d{9})$/) && content != ''){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* Please insert a 9 digit phone number</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_balance(content, element){
    if(!content.match(/^([+]?[1-9]\d*|0)$/) && content != ''){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* Please insert a number equal or greater that 0</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_iban(content, element){
    if(!content.match(/^([a-zA-Z]{2}[0-9]{23})$/) && content != ''){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* Please insert a valid IBAN number</p>");
        return false;
    }
    else{
        return true;
    }
}

function removeMessages(){
    $("#user_form").children().css("background-color","#FFFFFF");
    $("#user_form").children().filter('p').remove();
}


//Page loaded
$(document).ready(initPage);
