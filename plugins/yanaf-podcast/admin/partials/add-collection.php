<div class="form-field term-image-wrap">
    <label for="featured_image"><?php _e('Thumbnail', 'yanaf'); ?></label>
    <input type="hidden" id="featured_image" name="featured_image" class="custom_media_url">
    <div id="featured_image_preview"></div>
    <button id="upload_featured_image_button" class="button"><?php _e('Upload Image', 'yanaf'); ?></button>
</div>
<script>
    jQuery(document).ready(
        function ($) {
            var file_frame;
            
            $('#upload_featured_image_button').on('click',
                function (e) {
                    e.preventDefault();
                    
                    if (file_frame) {
                        file_frame.open();
                        return;
                    }

                    file_frame = wp.media.frames.file_frame = wp.media(
                        {
                            title: '<?php _e('Choose an image', 'yanaf'); ?>',
                            button: {
                                text: '<?php _e('Use this image', 'yanaf'); ?>',
                            },
                            multiple: false
                        }
                    );
                    
                    file_frame.on('select',
                        function () {
                            var attachment = file_frame.state().get('selection').first().toJSON();
                            $('#featured_image').val(attachment.id);
                            $('#featured_image_preview').html('<img src="' + attachment.url + '" style="max-width:100%;">');
                        }
                    );

                    file_frame.open();
                }
            );
        }
    );
</script>