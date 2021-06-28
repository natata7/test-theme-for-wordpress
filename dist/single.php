<?php
get_header();
?>
        <main id="main" class="site-main">

	        <?php
	        while(have_posts()) : the_post();
		        ?>

                <section>
			        <?php the_title('<h1>', '</h1>'); ?>

			        <?php
			        the_content();
			        ?>
                </section>

		        <?php
	        endwhile; 
	        ?>

        </main>

<?php
get_footer();