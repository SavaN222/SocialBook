/**
* Load comment
*/
function loadMessages(e)
{
    e.preventDefault();

    var postId = this.value;

    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'http://localhost/socialbook/posts/get?postId='
        +postId, true);

    xhr.onload = function() {
        if (this.status == 200) {
            var users = JSON.parse(this.responseText);

            var output = '';

            for (let i in users) {
                output += 
                '<div class="media mt-3">' +
                '<img src="http://localhost/socialbook/' + users[i].profile_pic + '" class="mr-3 rounded-circle border border-info comment-profile-pic">' +
                '<div class="media-body"><strong class="text-info mt-o">' + 
                '<a href="http://localhost/socialbook/pages/profile/' + users[i].user_id+'">'+
                users[i].fname + ' ' + users[i].lname + '</a></strong>' + ' ' + 
                '<small class="text-gray-dark font-italic">' + users[i].date_added + '</small>' +
                '<p class="commentText">' + users[i].description + '</p><hr></div> </div>'; 
                
            }
            document.getElementById('commentsOutput' + postId).innerHTML = output;
        }
    }

    xhr.send();
}