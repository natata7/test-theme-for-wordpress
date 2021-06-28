<?php
get_header();
?>
<div class="hero_block">
            <div class="container">
                <div class="row">
                    <div class="text_wrap col-md-6">
                        <h1>Friendly App</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio in et, lectus sit lorem id integer.</p>
                        <div class="btn btn-primary">Get Started</div>
                    </div>
                    <div class="img_wrap d-flex flex-column col-md-6">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/mockup.png" alt="Mobile mockup" id='mockup'>
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/card-1.png" alt="Card 1" id='card-1'>
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/card-2.png" alt="Card 2" id='card-2'>
                    </div>
                </div>
                
            </div>
            
        </div>
        <div class="block-1">
            <div class="container">
            <h2>Our approach to reach your business goals</h2>
            <div class="steps row">
                <div class="first_step col-md-3 col-sm-6">
                    <div class="step-icon">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/1step-icon.svg" alt="Ideate">
                    </div>
                    <h4>Ideate</h4>
                    <p>Turn your idea from concept to MVP</p>
                </div>
                <div class="second_step col-md-3 col-sm-6">
                    <div class="step-icon">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/2step-icon.svg" alt="Design">
                    </div>
                    <h4>Design</h4>
                    <p>Sketch out the product to align the user needs</p>
                </div>
                <div class="third_step col-md-3 col-sm-6">
                    <div class="step-icon">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/3step-icon.svg" alt="Develop">
                    </div>
                    <h4>Develop</h4>
                    <p>Convert the designs into a live application</p>
                </div>
                <div class="fourth_step col-md-3 col-sm-6">
                    <div class="step-icon">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/4step-icon.svg" alt="Deploy">
                    </div>
                    <h4>Deploy</h4>
                    <p>Launching the application to the market</p>
                </div>
            </div>
            </div>
        </div>
        <div class="block-2">
            <div class="container">
                <h2>All app screens</h2>
                <div class="row">
            
            <div class="slider mySwiper swiper-container col-10">
                <div class="swiper-wrapper">
                    <div class="slide-1 swiper-slide">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/slide-1.png" alt="">
                    </div>
                    <div class="slide-2 swiper-slide">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/slide-1.png" alt="">
                    </div>
                    <div class="slide-3 swiper-slide">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/slide-1.png" alt="">
                    </div>
                </div>
                
                <div class="swiper-pagination"></div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            </div>
        </div>
        </div>
        <div class="block-3">
            <div class="container">
                <div class="row">
                <div class="img-wrap col-md-6">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/Creative.png" alt="">
                </div>
                <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
 
 <div class="contact-form col-md-5 ml-auto">

     <?php dynamic_sidebar( 'sidebar' ); ?>
 </div>
 <?php endif; ?>

            </div>
            </div>
        </div>
        <?php
get_footer();