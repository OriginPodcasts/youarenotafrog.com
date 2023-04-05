<?php add_filter('document_title_separator', 'yanaf_document_title_separator');
function yanaf_document_title_separator($sep) {
    $sep = esc_html('|');
    return $sep;
}