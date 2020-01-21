var likeBtn = document.getElementsByClassName('likeBtn');

for (var i = 0; i < likeBtn.length; i++) {
    likeBtn[i].addEventListener('click', addLike);
}
    /**
    * When user click like button, load live number of likes
    */
    function liveLoadLikes(postId)
{
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'http://localhost/socialbook/posts/loadLikeForPost?postId='
        +postId, true);

    xhr.onload = function() {
        if (this.status == 200) {
            var obj = JSON.parse(this.responseText);

            document.getElementById('likeTxt' + postId).innerHTML = obj.likes;
        }
    }

    xhr.send();
}
    /**
    * User like post, call method likePost
    */
    function addLike(e)
    {
        e.preventDefault();

        var postId = this.value;

        var params = "postId="+postId;

        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'http://localhost/socialbook/posts/likePost', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.status == 200) {
                liveLoadLikes(postId);
            } 
        }

        xhr.send(params);
    }