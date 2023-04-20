<?php add_shortcode('newsletter_form', 'yanaf_newsletter_form');
function yanaf_newsletter_form() {
    $html =  '<form class="newsletter-form" method="post">';
    $html .= '  <label for="id_email">Email address</label>';
    $html .= '  <input type="email" id="id_email" name="email" placeholder="Enter your email address" required>';
    $html .= '  <p>By submitting, I am agreeing to the Terms of Use and Privacy Policy..</p>';
    $html .= '  <label class="checkbox-label">';
    $html .= '    <input type="checkbox" id="id_terms" name="terms" value="1" required>';
    $html .= '    <span class="message">Yes! I want to receive communications about educational resources, product news, upcoming events, and services from You Are Not a Frog and affiliates. I understand that I can unsubscribe at any time. By submitting this form, I agree to the processing of your personal information by You Are Not a Frog and affiliates as detailed in our privacy policy.</span>';
    $html .= '  </label>';
    $html .= '  <button type="submit" class="button">Subscribe</button>';
    $html .= '</form>';

    return $html;
}