<?php function yanaf_get_collections() {
    return get_terms(
        array(
            'taxonomy' => 'collection'
        )
    );
}