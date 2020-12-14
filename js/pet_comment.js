
var replies = document.getElementsByClassName("comment-reply");


for (let i = 0; i < replies.length; ++i)
    replies[i].addEventListener("click", replyHandler);


function replyHandler() {
    reset_selected();
    var textInput = document.getElementById("comment_message");
    textInput.focus();
    var id = this.getAttribute("comment_id");
    console.log(this.parentElement);
    this.parentElement.classList.remove("comment-div");
    this.parentElement.classList.add("comment-div-selected");
    var parent = document.getElementById("comment_parent");
    parent.value = id;
}

function reset_selected() {
    for (let i = 0; i < replies.length; ++i) {
        replies[i].parentElement.classList.remove("comment-div-selected");
        replies[i].parentElement.classList.add("comment-div");
    }
}
