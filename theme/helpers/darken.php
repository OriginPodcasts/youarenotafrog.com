<?php function yanaf_darken($colour) {
    $amount = .75;
    $colour = str_replace('#', '', $colour);

    $r = hexdec(substr($colour, 0, 2));
    $g = hexdec(substr($colour, 2, 2));
    $b = hexdec(substr($colour, 4, 2));

    $r = round($r * $amount);
    $g = round($g * $amount);
    $b = round($b * $amount);

    $colour = sprintf('#%02x%02x%02x', $r, $g, $b);
    return $colour;
}