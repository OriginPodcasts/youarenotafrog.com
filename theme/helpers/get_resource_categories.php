<?php function yanaf_get_resource_categories() {
    return get_terms(
        array('taxonomy' => 'resource_category')
    );
}