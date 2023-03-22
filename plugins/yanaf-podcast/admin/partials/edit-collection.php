<tr class="form-field term-image-wrap">
    <th scope="row"><label for="featured_image"><?php _e('Thumbnail', 'yanaf'); ?></label></th>
    <td>
        <input type="hidden" name="featured_image" id="featured_image" value="<?php esc_attr_e($image_id); ?>">
        <div id="featured_image_preview">
            <?php if ($image_url) { ?>
                <img src="<?php esc_attr_e($image_url); ?>" style="max-width:100%;">
            <?php } ?>
        </div>
        <button class="button" id="upload_featured_image_button" type="button"><?php _e('Upload Image', 'yanaf'); ?></button>
        <button class="button" id="clear_featured_image_button" type="button" style="color: #b32d2e;"><?php _e('Remove Image', 'yanaf'); ?></button>
    </td>
</tr>

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

            $('#clear_featured_image_button').on('click',
                function (e) {
                    e.preventDefault();
                    
                    $('#featured_image').val('');
                    $('#featured_image_preview').html('');
                }
            );
        }
    );
</script>