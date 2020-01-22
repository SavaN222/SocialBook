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
            if (obj.likes == undefined) {
                var likes = document.getElementById('likeTxt' + postId).innerHTML;
                document.getElementById('likeTxt' + postId).innerHTML = likes - 1;
            } else {
                document.getElementById('likeTxt' + postId).innerHTML = obj.likes;
            }
        }
    }

    xhr.send();
}
    /**
    * LIKE/DISLIKE post
    */
    function addLike(e)
    {
        e.preventDefault();

        var postId = this.value;

        var spanLike = document.getElementById('likeTxt' + postId);
        var checkLike = spanLike.dataset.liked;

        var params = "postId="+postId;

        var xhr = new XMLHttpRequest();

        if (checkLike == 'false') {
            xhr.open('POST', 'http://localhost/socialbook/posts/likePost', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            spanLike.dataset.liked = 'true';
        } else {
            xhr.open('POST', 'http://localhost/socialbook/posts/dislikePost', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            spanLike.dataset.liked = 'false';
        }
        
        xhr.onload = function() {
            if (this.status == 200) {
                liveLoadLikes(postId);
            } 
        }

        xhr.send(params);
    }