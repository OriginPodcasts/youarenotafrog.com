<div class="wrap">
    <h2>Import Podcast</h2>
    <div class="narrow">
        <p>Hi there! This importer allows you to extract episodes from the podcast RSS feed into your WordPress site. If all goes well, you&rsquo;ll only need to do this once. Paste in your podcast&rsquo;s RSS feed URL and click Import.</p>
        <form method="post" action="?import=<?php esc_attr_e($importer); ?>">
            <p>
                <label for="url">Paste your RSS feed URL here:</label>
                <input type="url" name="url" size="32" value="<?php esc_attr_e($url); ?>" required>
            </p>
            <p class="submit"><input type="submit" class="button button-primary" value="Upload file and import"></p>
        </form>
    </div>
</div>