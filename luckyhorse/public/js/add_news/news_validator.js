function initPage(){
    //when the button is pressed
    $("#add_news_btn").click( function(){
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

    var title = news_form.title.value;
    contents.push(title);
    elements.push(news_form.title);

    var abstract = news_form.abstract.value;
    contents.push(abstract);
    elements.push(news_form.abstract);

    var description = news_form.description.value;
    contents.push(description);
    elements.push(news_form.description);

    var news_photo = news_form.news_photo.value;
    contents.push(news_photo);
    elements.push(news_form.news_photo);

    removeMessages();

    //makes the validation of all the inputs
    valid.push(validate_title(title,news_form.title));
    valid.push(validate_abstract(abstract, news_form.abstract));
    valid.push(validate_description(description, news_form.description));
    valid.push(validate_news_photo(news_photo, news_form.news_photo));

    //this condition is just to allow to verify if there are empty fields, only if the use has filled the last field or clicked the submit button 
    if(contents[contents.length-1] != '' || clicked == true){

        for(var i = 0; i < contents.length; i++){
            not_empty.push(validate_empty(contents[i],elements[i]));
        }
    }

    //if everything is filled and validated it will remove the existing button and add a button inside the <form> to use the post method
    if(valid.reduce(and) && not_empty.reduce(and)){
        $("#add_news_btn").remove();
        $("#news_photo").after("<br><br><button type=\"submit\" class=\"btn btn-primary\">Add News</button>");
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

function validate_title(content, element){
    if(!content.match((/^([A-Z][A-Za-zÀ-ÿ]* *)*$/))){
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* A title has one or more words that always start with an uppercase followed by lowercases letters</p>");
        return false;
    }
    else{
        return true;
    }
}

function validate_abstract(content, element){
    return true;
}

function validate_description(content, element){
    return true;
}

function validate_news_photo(content, element){
    //fecthes the type of file from the file name by getting the part after the last '.'
    var file_type = content.substring(content.lastIndexOf('.') + 1).toLowerCase();
    console.log(file_type);
    console.log(content);
    if(file_type != "png" && file_type != "jpeg" && file_type != "jpg" && file_type != ''){
        $(element).after("<p style=\"color:#c2b100\">*Invalide file type. Please insert a .png, .jpeg or .jpg file</p>");
        return false;
    }
    else{
        return true;
    }
}

function removeMessages(){
    $("#news_form").children().css("background-color","#FFFFFF");
    $("#news_form").children().filter('p').remove();
}

//Page loaded
$(document).ready(initPage);