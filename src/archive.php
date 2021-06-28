
<?php

get_header();
?>

		<div class="container-bg mr-auto">
        	
				<div class="title col">
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );

							
						?>
					</header>

				</div>
			
			<div class="row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
                ?>

				<div id="<?php the_ID(); ?>" post_class('one-third'); ?>>
	<header class="entry-header">

			<div class="col-sm card wow slideInUp">
        <div class="news-card wrap">

          <div class="news-text">
            <div class="date">

					    <?php if ( 'post' === get_post_type() ) :	?>
						<div class="entry-meta">
							<?php
							the_date();
							?>
						</div>
					<?php endif; ?>

                    </div>

					          <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

                    <div class="news-exception">
                      <a class="link-more" href="<?php the_permalink() ?>">more</a>
                    </div>
                  </div>
                </div>
              </div>

</div>
<?php
			endwhile;

			the_posts_pagination( array(
				'mid_size' => 2,
			) ); 

		else :

?>

<article id="col-xs-7 col-md-4 post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
			<div class="date">

			<?php if ( 'post' === get_post_type() ) :
							?>
			<div class="entry-meta">
				<?php the_date();	?>
			</div>
			<?php endif; ?>

			</div>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mytheme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mytheme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer d-flex justify-content-between">
		<?php mytheme_wp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article>
<?php

		endif;
		?>
			</div>
		</div>

<?php
get_footer();