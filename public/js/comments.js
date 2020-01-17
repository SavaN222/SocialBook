var commentShow = document.getElementsByClassName('commentShow'); // button

for (let i = 0; i < commentShow.length; i++) {
    commentShow[i].addEventListener('click', loadComments);
}

function loadComments(e)
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

function liveLoadComments(postId)
{
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

var commentForm = document.getElementsByClassName('sendcom'); // send btn
var description = document.getElementsByClassName('description'); // textarea

for (let i = 0; i < commentForm.length; i++) {
    commentForm[i].addEventListener('click', addComment);
}

function addComment(e)
{
    e.preventDefault();

    var postId = this.value;

    var commentText = document.getElementById('commentText' + postId).value;

    var params = "description="+commentText+"&postId="+postId;

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'http://localhost/socialbook/posts/add', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.status == 200) {
            document.getElementById('commentText' + postId).value = '';
            liveLoadComments(postId);
        } 
    }

    xhr.send(params);

}











// var dots = document.getElementsByClassName('dots');
// var moreText = document.getElementsByClassName('more');
// var viewMoreBtn = document.getElementsByClassName('viewMore');
// var btnText = document.getElementsByClassName('btnText');

// for (var i = 0; i < viewMoreBtn.length; i++) {
//     viewMoreBtn[i].addEventListener('click', function(index) {
//         if (dots[index].style.display === "none") {
//         dots[index].style.display = 'inline';
//         btnText[index].innerHTML = 'Read More';
//         moreText[index].style.display = 'none';
//     } else {
//         dots[index].style.display = 'none';
//         btnText[index].innerHTML = 'Read less';
//         moreText[index].style.display = 'inline';
//     }
//     }.bind(this,i));
// }