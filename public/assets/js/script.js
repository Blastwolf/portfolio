var competences = document.getElementById('two');


$('.level').css('background', function () {
    var percentage = parseInt($(this).data('size'), 10);
    if (percentage > 0 && percentage < 33) {
        return 'linear-gradient(to right, #e22d00 0%,#da6d00 100%,#e5da00 100%)';
    }
    else if (percentage > 32 && percentage < 66) {
        return 'linear-gradient(to right, #e22d00 0%,#da6d00 35%,#e5da00 86%)';
    }
    else if (percentage > 65 && percentage <= 100) {
        // return 'linear-gradient(to right, #e22d00 0%,#da6d00 35%,#23d200 86%)';
        return 'linear-gradient(to right, rgba(226,45,0,1) 3%,rgba(239,239,0,1) 40%,rgba(239,239,0,1) 64%,rgba(59,209,0,1) 97%)';
    }

});


window.onscroll = function () {
    var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
    var treshold = 0;
    if (scrollPosition >= (competences.offsetTop - (window.innerHeight / 2)) && treshold == 0) {
        treshold = 1;
        var competence = document.getElementsByClassName('level');
        for (var i = 0; i < competence.length; i++) {
            competence[i].classList.add('animate');
        }
    }
}
