var dots = document.getElementsByClassName('dots');
var moreText = document.getElementsByClassName('more');
var viewMoreBtn = document.getElementsByClassName('viewMore');
var btnText = document.getElementsByClassName('btnText');

for (var i = 0; i < viewMoreBtn.length; i++) {
    viewMoreBtn[i].addEventListener('click', function(index) {
        if (dots[index].style.display === "none") {
        dots[index].style.display = 'inline';
        btnText[index].innerHTML = 'Read More';
        moreText[index].style.display = 'none';
    } else {
        dots[index].style.display = 'none';
        btnText[index].innerHTML = 'Read less';
        moreText[index].style.display = 'inline';
    }
    }.bind(this,i));
}