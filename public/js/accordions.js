// Opening animation

$.Velocity.RegisterEffect('fadeInPanels', {
    defaultDuration: 500,
    calls: [
        [{
            opacity: [1, 0.3],
            scale: [1, 0.5]
        }]
    ]
});

$('.panel').velocity('fadeInPanels', {
    stagger: 250,
})

// Accordions

$('.accordion-link').click(function(e) {

    e.preventDefault();

    var accordionWrapper = $(this).closest('.accordion'),
        accordionActivePanel = $(this).closest('.panel'),
        accordionActiveLink = accordionWrapper.find('.active');

    if ($(this).closest('.panel').find('.content-collapse').hasClass('velocity-animating')) {
        return false;
    } else if (e.handled !== true) {
        accordionActiveLink.closest('.panel').find('.content-collapse').attr('aria-expanded', false).velocity('slideUp', {
            easing: 'easeOutQuad'
        });
        if ($(this).hasClass('active')) {
            $(this).attr('aria-expanded', false).removeClass('active');
        } else {
            accordionActivePanel.find('.content-collapse').attr('aria-expanded', true).velocity('slideDown', {
                easing: 'easeOutQuad'
            });
            accordionWrapper.find('.accordion-link').removeClass('active').attr('aria-expanded', false);
            $(this).attr('aria-expanded', true).addClass('active');
        }
        e.handled = true;
    } else {
        return false;
    }
});

