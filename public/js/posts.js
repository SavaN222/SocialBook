// /** Ajax call for create post without reloading, but is un necessary

var postForm = document.getElementById('postForm');
var description = document.getElementById('desc');

postForm.addEventListener('submit', addPost);

function addPost(e)
{

    e.preventDefault();

    var desc = description.value;
    var params = "description="+desc;

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'http://localhost/socialbook/posts/create', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.status == 200) {
            alert('Post added successfuly');
            description.value = '';
            getPost();
        } 
    }

    xhr.send(params);

}
