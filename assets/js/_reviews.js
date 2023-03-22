jQuery('.review-wrapper').each(
    function () {
        jQuery(this).find('.review-list').owlCarousel(
            {
                items: 1,
                autoHeight: true,
                dots: true,
                nav: true
            }
        )
    }
)