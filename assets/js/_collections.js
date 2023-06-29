jQuery('.collection-carousel').each(
    function () {
        jQuery(this).owlCarousel(
            {
                autoHeight: true,
                responsiveClass: true,
                items: 6,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    641: {
                        items: 3,
                        loop: true
                    },
                    1025: {
                        items: 6,
                        loop: true
                    }
                }
            }
        )
    }
)