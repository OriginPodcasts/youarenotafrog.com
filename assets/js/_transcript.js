jQuery(document).ready(
    function ($) {
        $('body').on(
            'click',
            '.episode-transcript-excerpt a[href].episode-transcript-loader',
            function (e) {
                var self = $(this)
                var href = self.attr('href')
                var excerpt = self.closest('.episode-transcript-excerpt')

                if (self.attr('disabled')) {
                    return
                }

                self.attr('disabled', 'disabled')
                $.ajax(
                    {
                        url: href,
                        dataType: 'html',
                        success: function (html) {
                            var dom = $(html)
                            var full = dom.find('.episode-transcript-text')

                            excerpt.removeClass(
                                'episode-transcript-excerpt'
                            ).addClass(
                                'episode-transcript-full'
                            ).html('')

                            excerpt.append(full)
                            self.remove()
                        }
                    }
                )

                e.preventDefault()
            }
        )
    }
)