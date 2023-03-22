jQuery('.tags-carousel').each(
    function () {
        jQuery(this).owlCarousel(
            {
                autoHeight: true,
                responsiveClass: true,
                items: 1,
                nav: true
            }
        )
    }
)