<?php

/**
 * Latest Posts
 *
 * @return void
 */
function npub_latest_posts()
{
    $recent_posts = wp_get_recent_posts([
        'numberposts' => 6,
        'post_status' => 'publish',
    ]);
    if ($recent_posts) {
        foreach ($recent_posts as $post_item): ?>
			<li>
				<a href="<?php echo esc_url(get_the_permalink($post_item['ID'])); ?>">
					<?php echo esc_html(get_the_title($post_item['ID'])); ?>
				</a> 
			</li>
			<?php endforeach;
        wp_reset_postdata();
    } else {
        echo esc_html__('<h1>Not Found</h1>', 'news-publication');
    }
    $latest_posts = ob_get_clean();
    echo $latest_posts;
}

/**
 * Archive details.
 *
 * @return array
 */
function npub_current_archive_details()
{
    $queried_data = [];

    if (is_category()) {
        $queried_data['title'] = single_cat_title('', false);
        $queried_data['description'] = category_description();
    }

    if (is_author()) {
        $queried_data['title'] = get_the_author_meta('display_name');
    }

    return apply_filters('npub_filter_current_archive_details', $queried_data);
}

/**
 * NBlock Post Read Time.
 *
 * @return string
 */
function npub_time_ago()
{
    return human_time_diff(get_the_time('U'), current_time('timestamp')) .
        ' ' .
        __('ago', 'news-publication');
}
