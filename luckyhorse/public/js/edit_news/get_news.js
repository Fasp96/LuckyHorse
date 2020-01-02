function initPage(){
    get_news();
}

function get_news(){
    var id_news = document.getElementById("id_news");
    var id = id_news.value;
    $.get("http://localhost:8000/api/edit_news=" + id, function(data){
        console.log(data);

        document.getElementById('title').value = data['title'];
        document.getElementById('abstract').value = data['minute_info'];
        document.getElementById('description').value = data['description'];
        document.getElementById('news_photo').value = '';        

    });
}

//página carregou
$(document).ready(initPage);