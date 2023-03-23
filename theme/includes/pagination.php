<div class="pagination-container">
    <?php $pagination = paginate_links(
        array(
            'prev_text' => __('&larr;'),
            'next_text' => __('&rarr;'),
            'type' => 'array'
        )
    );

    if ($pagination) {
        echo '<ul class="pagination">';
        
        foreach ($pagination as $link) {
            echo '<li>' . $link . '</li>';
        }
        
        echo '</ul>';
    } ?>
</div>