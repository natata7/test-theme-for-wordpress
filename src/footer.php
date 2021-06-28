</main>
    <footer>
        <div class="container">
            <div class="row">
        
        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
 
 <div class="sidebar col-md-3">

     <?php dynamic_sidebar( 'footer-1' ); ?>

 </div>

<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
 
 <div class="sidebar col-md-3">

     <?php dynamic_sidebar( 'footer-2' ); ?>

 </div>

<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
 
 <div class="sidebar col-md-3">

     <?php dynamic_sidebar( 'footer-3' ); ?>

 </div>

<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
 
 <div class="sidebar col-md-3">

     <?php dynamic_sidebar( 'footer-4' ); ?>

 </div>

<?php endif; ?>
    </div>
    <div class="row">

            <div class="copyright col-md-8">
                <p>
                    <?php echo get_theme_mod('footer_copyright'); ?>
                </p>
            </div>
            <?php if ( is_active_sidebar( 'social-links' ) ) : ?>
 
 <div id="social-links" class="sidebar col-md-4">

     <?php dynamic_sidebar( 'social-links' ); ?>

 </div>

<?php endif; ?>
        </div>

    </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <?php wp_footer(); ?>
</body>
</html>