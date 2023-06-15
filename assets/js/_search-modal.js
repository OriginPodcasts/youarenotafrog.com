$(document).ready(
    function () {
        $('body').on('open.zf.reveal', '.reveal',
            function() {
                $(this).find(':input').first().focus()
            }
        )
    }
)
