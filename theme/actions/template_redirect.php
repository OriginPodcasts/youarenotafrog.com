<?php add_action('template_redirect', 'yanaf_template_redirect');
function yanaf_template_redirect() {
    if ($resource_id = get_query_var('download_resource_id')) {
        if (($resource = get_post($resource_id))) {
            if ($resource->post_type === 'resource') {
                foreach (get_post_meta($resource->ID, 'media') as $attachment_id) {
                    if ($attachment = get_post($attachment_id)) {
                        $file = get_attached_file($attachment_id);
                        $filename = basename($file);
                        header('Content-Type: ' . $attachment->post_mime_type);
                        header('Content-Disposition: attachment; filename="' . $filename . '"');
                        readfile($file);
                        exit;
                    }
                }
            }
        }

        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        get_template_part('404');
        exit;
    }
}
