var searchForm = document.getElementById('searchForm');
var search = document.getElementById('search');

searchForm.addEventListener('keyup', searchUsers);

function searchUsers(e)
{

    e.preventDefault();

    var keywords = search.value;
    var splitKeywords = keywords.split(" ", 2);

    var fname = splitKeywords[0]; 
    var lname = splitKeywords[1]; 

    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'http://localhost/socialbook/users/getUsers?fname='
        +fname+'&lname='+lname, true);

    xhr.onload = function() {
        if (this.status == 200) {
            var users = JSON.parse(this.responseText);

            var output = '';

            for (var i in users) {
                output += 
                '<li class="list-group-item">' +
                '<a href="http://localhost/socialbook/pages/profile/'+users[i].id+'">'+
                '<img class="img-thumbnail search-img" src="http://localhost/socialbook/'
                +users[i].profile_pic+'"> Name: '+users[i].fname+ 
                ' ' +users[i].lname + '</a></li>';
            }
            document.getElementById('searchResults').innerHTML = output;
        }
    }

    xhr.send();

}
