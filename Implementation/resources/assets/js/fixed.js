import $ from 'jquery';

$(document).on('click', '#discover', function (e) {
    e.preventDefault();


    $('html, body').animate({
        scrollTop: $("#filters").offset().top - 116
    }, 700);
});

$(window).on('scroll', () => {
    const elements = document.querySelectorAll('[data-fixed="true"]');

    elements.forEach(e => {
        let y = e.getBoundingClientRect().y;
        let top = parseInt(e.getAttribute('data-top'), 10) || 0;

        if (y <= top && !e.classList.contains('sticky')) {
            e.classList.add('sticky');
            e.style.top = `${top}px`;
        }

        if (y > top && e.classList.contains('sticky')) {
            e.classList.remove('sticky');
            e.style.removeProperty('top');
        }
    });
});