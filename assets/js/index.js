const $simpleCarousel = document.querySelector('.carousel--simple')

new Glider($simpleCarousel, {

    slidesToShow: 'auto',
    slidesToScroll: 4,


    scrollLock: true,
    draggable: true,
    dots: ".carousel--simple-dots",
    arrows: {
        prev: ".carousel--simple-prev",
        next: ".carousel--simple-next"
    },
    responsive: [
        {
            breakpoint: 200,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 'auto',
                slidesToScroll: 1,
                itemWidth: 300,

            }
        },
        {
            breakpoint: 500,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 'auto',
                slidesToScroll: 1,
                itemWidth: 300,

            }
        }, {
            // screens greater than >= 1024px
            breakpoint: 775,
            settings: {
                slidesToShow: 'auto',
                slidesToScroll: 1,
                itemWidth: 300,

            }
        }
    ]

})