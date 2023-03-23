jQuery(document).ready(
    function ($) {
        $('body').on(
            'click',
            '.menu li a',
            function () {
                var li = $(this).closest('li')
                var menu = li.closest('ul.menu')

                menu.find('li.active').not(li).removeClass('active')
                li.addClass('active')
            }
        )
    }
)