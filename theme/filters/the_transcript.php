<?php add_filter('the_transcript', 'yanaf_the_transcript');
function yanaf_the_transcript($transcript) {
    if ($transcript == '') {
        return esc_html('...');
    }

    $transcript = str_replace("\n", "\n\n", $transcript);
    while (strpos($transcript, "\n\n\n") > -1) {
        $transcript = str_replace("\n\n\n", "\n\n", $transcript);
    }

    return $transcript;
}