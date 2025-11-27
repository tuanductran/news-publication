<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Dark_news
 * @since Dark News 1.0
 */

get_header(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(
    'container pbody px-0 px-sm-2 px-md-2 px-lg-0'
); ?>>

<div class="middle">
<div class="container">
	<div class="post-metadata npub-extra-big-title">
		<h1><?php echo esc_html(get_the_title()); ?></h1>
		<span class="pe-2 npub-link"><?php echo wp_kses_post(the_category(', ')); ?></span>
		<p class="d-inline pe-2 npub-secondary-color npub-secondary-title"><?php echo wp_kses_post(
      the_author()
  ); ?></p>
		<p class="d-inline p-0 npub-secondary-color npub-secondary-title"><?php echo wp_kses_post(
      get_the_date('D, M j')
  ); ?></p>
	</div>
</div>	
	<div class="container">
			<?php if (has_post_thumbnail()): ?>
				<div class="img-div">
					<span class="size-npub-grande img-stylized">
						<?php echo get_the_post_thumbnail(get_the_ID(), '', [
          'class' => 'img-stylized',
      ]); ?>	
					</span>
				</div>
			<?php endif; ?>
	</div>
</div>	
<div class="container">
	<div class="row">
		<div class="article-body col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<?php if (have_posts()):
       while (have_posts()):
           the_post();
           the_content();
       endwhile;
   endif; ?>
			<?php // If comments are open or we have at least one comment, load up the comment template.

if (comments_open() || get_comments_number()):
       comments_template();
   endif; ?>
			</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sticky-side-disabled sidebar-cont pe-lg-0">
			<?php if (is_active_sidebar('single_article_side_widget_area')) {
       dynamic_sidebar('single_article_side_widget_area');
   } ?>
		</div>
	</div>
	<div class="related_posts">
		<?php
  $related_post_cats = get_the_category();
  $rel_cats = [];
  foreach ($related_post_cats as $related_post_cat) {
      $rel_cats[] = '"' . $related_post_cat->name . '"';
  }
  if (!empty($rel_cats) && is_array($rel_cats)) {
      echo '<h3>Related</h3>';
      echo wp_kses_post(
          do_blocks(
              '<!-- wp:nblock/post-filter {"categories":[' .
                  implode(',', $rel_cats) .
                  '],"ppp":4,"layout":"4col-masonry"} --><!-- /wp:nblock/post-filter -->'
          )
      );
  }
  ?>
	</div>
</div>
	</div>
<?php get_footer(); ?>
