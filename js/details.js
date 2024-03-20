document.addEventListener("DOMContentLoaded", function () {
    document.querySelector('.read-more').addEventListener('click', function () {
        document.querySelector('.description-short').style.display = 'none';
        document.querySelector('.description-full').style.display = 'inline';
        document.querySelector('.read-more').style.display = 'none';
        document.querySelector('.read-less').style.display = 'inline';
    });

    document.querySelector('.read-less').addEventListener('click', function () {
        document.querySelector('.description-short').style.display = 'inline';
        document.querySelector('.description-full').style.display = 'none';
        document.querySelector('.read-more').style.display = 'inline';
        document.querySelector('.read-less').style.display = 'none';
    });
});



