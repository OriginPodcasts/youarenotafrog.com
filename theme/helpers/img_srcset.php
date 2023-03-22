<?php function yanaf_img_srcset($image_id, $alt='', $sizes=array(), $responsive=false) {
    if (is_object($image_id) && $image_id instanceof WP_Post) {
        $image_id = $image_id->ID;
    }

    if (!($image = wp_get_attachment_image_src($image_id, 'full'))) {
        return;
    }

    $full_width = $image[1];
    $breakpoints = array(
        'small' => 640,
        'medium' => 1024,
        'large' => 1200,
        'xlarge' => 1440
    );

    $html = sprintf(
        '<img alt="%s" src="%s"',
        esc_attr($alt),
        $image[0]
    );

    $srcset = array();
    $widths = array();

    foreach ($sizes as $size_class => $size) {
        if (!isset($breakpoints[$size_class])) {
            continue;
        }

        $breakpoint = $breakpoints[$size_class];
        if ($resized = wp_get_attachment_image_src($image_id, $size)) {
            $srcset[] = sprintf('%s %dw',  $resized[0],  $resized[1]);
            $widths[] = sprintf('(max-width: %dpx) %dpx', $breakpoint, $resized[1]);
        }
    }

    $widths[] = sprintf('%dpx', $full_width);

    if (count($srcset)) {
        $srcset = implode(', ', $srcset);
        $html .= sprintf(' srcset="%s"', esc_attr($srcset));

        if (count($widths)) {
            $widths = implode(', ', $widths);
            $html .= sprintf(' sizes="%s"', esc_attr($widths));
        }
    }

    if ($responsive) {
        $html .= ' class="responsive-img"';
    }

    $html .= '>';
    echo $html;
}