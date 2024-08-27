$('.news-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
});

$('.hero-carousel').owlCarousel({
    loop:true,
    margin:0,
    items:1,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:false,
    dots:false,
    animateOut: 'fadeOut',
    nav:false,
});

$('.news-page-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    dotsContainer: '.news-page-dots',
    autoWidth: true,
    lazyLoad:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});

var brandHero = $('.brand-hero-carousel');
brandHero.owlCarousel({
    loop:true,
    margin:0,
    items:1,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:false,
    dots:false,
});
$('.next-brand-hero').click(function() {
    brandHero.trigger('next.owl.carousel');
})
$('.prev-brand-hero').click(function() {
    brandHero.trigger('prev.owl.carousel', [300]);
})

var brandMap = $('.brand-map-carousel');
brandMap.owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    dots:false,
    responsive:{
        0:{
            items:1,
            margin: 0,
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});
$('.next-brand-map').click(function() {
    brandMap.trigger('next.owl.carousel');
})
$('.prev-brand-map').click(function() {
    brandMap.trigger('prev.owl.carousel', [300]);
})