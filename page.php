<?php get_header(); ?>

<div class="container pbody">
	<div class="row">
		<div class="col">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<?php 
					the_content(); 

					wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'news-publication' ),
								'after'  => '</div>',
							)
					);

				endwhile;
			endif;
			?>
			</div>
	</div>
</div>
<?php get_footer(); ?>
