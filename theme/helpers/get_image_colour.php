<?php function yanaf_get_image_colour($image_id) {
    if (!($file_path = get_attached_file($image_id))) {
        return;
    }

    if (!($mime_type = mime_content_type($file_path))) {
        return;
    }

    switch ($mime_type) {
        case 'image/jpeg':
        case 'image/pjpeg':
            $image = imagecreatefromjpeg($file_path);
            break;
        case 'image/png':
            $image = imagecreatefrompng($file_path);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($file_path);
            break;
        default:
            return;
    }

    $resized_image = imagescale($image, 50);

    // Iterate over each pixel in the image
    $colour_count = array();
    for ($x = 0; $x < imagesx($resized_image); $x++) {
        for ($y = 0; $y < imagesy($resized_image); $y++) {
            $colour_index = imagecolorat($resized_image, $x, $y);
            $colour = imagecolorsforindex($resized_image, $colour_index);

            // Calculate the brightness of the colour
            $brightness = .299 * $colour['red'] + .587 * $colour['green'] + .114 * $colour['blue'];

            // Add the brightness value to the array with the colour value as the key
            $colour_hex = sprintf('%02x%02x%02x', $colour['red'], $colour['green'], $colour['blue']);
            
            if (!isset($colour_count[$colour_hex])) {
                $colour_count[$colour_hex] = 0;
            }
            
            $colour_count[$colour_hex] += $brightness;
        }
    }

    // Sort the array in descending order based on the brightness value
    arsort($colour_count);

    // Get the hex value of the most prominent colour
    $colour_hex = key($colour_count);
    $colour_rgb = sscanf($colour_hex, "%02x%02x%02x");
    
    return sprintf("#%02x%02x%02x", $colour_rgb[0], $colour_rgb[1], $colour_rgb[2]);
}