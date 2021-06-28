<?php
get_header();
?>
<div class="hero_block">
            <div class="text_wrap">
                <h1>Friendly App</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc odio in et, lectus sit lorem id integer.</p>
                <div class="btn">Get Started</div>
            </div>
            <div class="img_wrap">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/card-1.png" alt="Card 1">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/card-2.png" alt="Card 2">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/mockup.png" alt="Mobile mockup">
            </div>
        </div>
        <div class="block-1">
            <h2>Our approach to reach your business goals</h2>
            <div class="steps">
                <div class="first_step">
                    <div class="step-icon">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/1step-icon.svg" alt="Ideate">
                    </div>
                    <h4>Ideate</h4>
                    <p>Turn your idea from concept to MVP</p>
                </div>
                <div class="second_step">
                    <div class="step-icon">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/2step-icon.svg" alt="Design">
                    </div>
                    <h4>Design</h4>
                    <p>Sketch out the product to align the user needs</p>
                </div>
                <div class="third_step">
                    <div class="step-icon">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/3step-icon.svg" alt="Develop">
                    </div>
                    <h4>Develop</h4>
                    <p>Convert the designs into a live application</p>
                </div>
                <div class="fourth _step">
                    <div class="step-icon">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/4step-icon.svg" alt="Deploy">
                    </div>
                    <h4>Deploy</h4>
                    <p>Launching the application to the market</p>
                </div>
                
            </div>
        </div>
        <div class="block-2">
            <h2>All app screens</h2>
            <div class="slider">
                <div class="slide-1">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/slide-1.png" alt="">
                </div>
                <div class="slider-arrows">
                    <div class="left-arrow">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/Left Arrow.svg" alt="">
                    </div>
                    <div class="right-arrow">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/Right Arrow.svg" alt="">
                    </div>
                </div>
                <div class="slider-controls">

                </div>
            </div>
        </div>
        <div class="block-3">
            <div class="img-wrap">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/Creative.png" alt="">
            </div>
            <div class="contact-form">
                <h3>Contact Form</h3>
                <input type="text" name="name" id="name" placeholder="Name">
                <input type="tel" name="tel" id="tel" placeholder="Number">
                <input type="email" name="email" id="email" placeholder="Email">
                <div class="btn btn_wide">Send</div>
            </div>
        </div>
        <?php
get_footer();