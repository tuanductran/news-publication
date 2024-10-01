<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

<div class="container px-2">
<div class="row">
<div class="col">
<?php $query = apply_filters('get_search_query', get_query_var('s')); ?>
<blockquote class="wp-block-quote block-heading"><p>Search Results</p><cite>For: <?php echo wp_kses_post(
    $query
); ?></cite></blockquote>
<div class="container px-2 latest-nbolck npub-big-title category-section npub-full-row">
	<?php if (have_posts()):
     while (have_posts()):

         the_post();
         $post_image = get_the_post_thumbnail(get_the_ID(), '', [
             'loading' => 'lazy',
             'class' => 'one-col-article-img wp-post-image',
         ]);
         $post_cats = get_the_category_list('<span>,</span>', '', get_the_ID());
         $post_title = get_the_title();
         $author_id = get_post_field('post_author', get_the_ID());
         ?>
			<div class="row one-col-article p-2 my-1 px-sm-2 py-sm-2 my-sm-1 py-md-3 px-lg-2 px-md-3 my-md-1 py-lg-2 px-xl-2 py-xl-2 my-lg-3 d-flex align-items-lg-center align-items-md-top align-items-sm-start align-items-start">
				<div class="col-lg-4 col-md-5 col-sm-4 col-5 m-0 px-sm-2 px-md-1 pt-lg-2 px-lg-2 p-2 pt-md-0  ps-1">
					<a href="<?php echo esc_url(get_permalink()); ?>"> 
						<span class="size-npub-medium"><?php echo $post_image; ?></span>
					</a>	
				</div>
				<div class="col-lg-7 col-md-7 col-sm-8 col-7 p-0 ps-lg-2 ps-md-3 ps-2 ps-sm-2 pt-xs-2 pt-sm-0">
					<?php
     if (!empty($post_cats)) { ?>
						<span class="npub-link pe-2"><?php echo wp_kses_post($post_cats); ?></span>
						<p class="d-inline pe-2 npub-secondary-color npub-secondary-title"><?php echo esc_html(
          get_the_author_meta('display_name', $author_id)
      ); ?></p>
						<p class="d-inline p-0 npub-secondary-color npub-secondary-title"> <?php echo esc_html(
          npub_time_ago()
      ); ?></p>
						<?php }
     if (!empty($post_title)) { ?>
						<a href="<?php echo esc_url(get_permalink()); ?>">
							<h4><?php echo esc_html($post_title); ?></h4>
						</a>
						<?php }
     ?>
					<p class="full-width-1col-exerpt my-0 my-md-2 npub-text-color npub-blog-detail"><?php echo wp_kses_post(
         substr(get_the_excerpt(), 0, 150)
     ); ?></p>
				</div>
			</div>
			<?php
     endwhile;
     echo wp_kses_post(paginate_links());
 else:
      ?>
	<div class="nblocks-notfound">No posts are found..!</div>
	<?php
 endif; ?>
	</div>
	</div>
</div>                  
</div>             

<?php get_footer(); ?>
