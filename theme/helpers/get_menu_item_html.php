<?php function yanaf_get_menu_item_html($item) {
    $html = '<li';
    $classes = array();
    $children = isset($item['children']) ? $item['children'] : array();

    if (count($children)) {
        $classes[] = 'has-children';
        $href = 'javascript:;';
    } else {
        $href = $item['url'];
    }

    $active = yanaf_menu_item_is_active($item);

    if (count($children)) {
        $children_html = '<ul class="sub menu">';

        foreach ($children as $child) {
            $children_html .= yanaf_get_menu_item_html($child);
            
            if (yanaf_menu_item_is_active($child)) {
                $active = true;
            }
        }

        $children_html .= '</ul>';
    } else {
        $children_html = '';
    }

    if ($active) {
        $classes[] = 'active';
    }

    if (count($classes)) {
        $html .= ' class="' . implode(' ', $classes) . '"';
    }

    $html .= '>';
    $html .= '<a href="' . esc_attr($href) . '">' . esc_html($item['title']) . '</a>';
    $html .= $children_html;
    $html .= '</li>';
    return $html;
}