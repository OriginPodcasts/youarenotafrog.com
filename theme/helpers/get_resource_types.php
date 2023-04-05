<?php function yanaf_get_resource_types() {
    return get_terms(
        array('taxonomy' => 'resource_type')
    );
}