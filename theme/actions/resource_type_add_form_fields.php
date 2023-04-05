<?php add_action('resource_type_add_form_fields', 'yanaf_resource_type_add_form_fields', 10);
function yanaf_resource_type_add_form_fields() { ?>
    <div class="form-field form-singular_name-wrap">
        <label for="singular_name"><?php _e('Singular Name', 'yanaf'); ?></label>
        <input type="text" id="singular_name" name="singular_name">
    </div>
<?php }