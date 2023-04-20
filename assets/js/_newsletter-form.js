jQuery(document).ready(
    function($) {
        $('form.newsletter-form').on('submit',
            function (e) {
                var self = $(this)
                var reset = function () {
                    self.find(':input, button').removeAttr('disabled')
                }

                var data = self.serialize()

                e.preventDefault()
                self.find(':input, button').attr('disabled', 'disabled')

                $.ajax(
                    {
                        type: 'POST',
                        url: window.ajaxurl,
                        data: {
                            action: 'yanaf_newsletter_subscribe',
                            data: data
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                var div = $('<div>').html(response.data.message)

                                self.find(':input').val('')
                                self.replaceWith(div)
                            } else {
                                alert(response.data)
                            }

                            reset()
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error(errorThrown)
                            reset()
                        }
                    }
                )
            }
        )
    }
)