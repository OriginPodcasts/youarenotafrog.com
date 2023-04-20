<?php add_action('wp_ajax_yanaf_newsletter_subscribe', 'yanaf_ajax_newsletter_subscribe');
add_action('wp_ajax_nopriv_yanaf_newsletter_subscribe', 'yanaf_ajax_newsletter_subscribe');

function yanaf_ajax_newsletter_subscribe() {
    $webhook_url = get_field('newsletter_webhook', 'option');
    $success_message = get_field('newsletter_success_message', 'option');

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_send_json_error('This form was not interacted with correctly (this isn\'t your fault).');
    }

    if (!isset($_POST['data'])) {
        wp_send_json_error('No data was submitted to this form (this isn\'t your fault).');
    }

    parse_str($_POST['data'], $form_data);
    if (!is_array($form_data)) {
        wp_send_json_error('Invalid data was submitted to this form (this isn\'t your fault).');
    }

    if (!isset($form_data['email'])) {
        wp_send_json_error('Please enter your email address.');
    }

    $email = $form_data['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        wp_send_json_error('Please enter a valid email address.');
    }

    $response = wp_remote_post(
        $webhook_url,
        array(
            'body' => array(
                'email' => $email
            )
        )
    );

    if (is_wp_error($response)) {
        wp_send_json_error($response->get_error_message());
    }

    $body = json_decode($response['body'], true);

    if ($body === null) {
        wp_send_json_error('An error occurred with our email partner. Please try again.');
    }

    $body['message'] = $success_message;
    wp_send_json_success($body, 200, JSON_FORCE_OBJECT);
}
