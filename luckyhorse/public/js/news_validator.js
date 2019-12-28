function initPage(){
    $("#add_news_btn").click( function(){
        validate_input(true);
    });
}

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

    valid.push(validate_title(title,news_form.title));
    valid.push(validate_abstract(abstract, news_form.abstract));
    valid.push(validate_description(description, news_form.description));
    valid.push(validate_news_photo(news_photo, news_form.news_photo));

    if(contents[contents.length-1] != '' || clicked == true){

        for(var i = 0; i < contents.length; i++){
            not_empty.push(validate_empty(contents[i],elements[i]));
        }
    }

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

//página carregou
$(document).ready(initPage);