<?php add_action('resource_type_edit_form_fields', 'yanaf_resource_type_edit_form_fields', 10, 2);
function yanaf_resource_type_edit_form_fields($term, $taxonomy) {
    $singular_name = get_term_meta($term->term_id, 'singular_name', true);
    print($singular_name);

    if (!$singular_name) {
        $singular_name = strtolower($term->name);
    } ?>

    <tr class="form-field term-image-wrap">
        <th scope="row"><label for="singular_name"><?php _e('Singular Name', 'yanaf'); ?></label></th>
        <td>
            <input type="text" name="singular_name" id="singular_name" value="<?php esc_attr_e($singular_name); ?>">
        </td>
    </tr>
<?php }