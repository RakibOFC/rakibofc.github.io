<div class="main_wrap slider_bg">
    <div class="wrap">
        <section>
            <div id="slider_wrapper">

                <div class="slider-wrapper theme-dark">
                    <div id="slider" class="nivoSlider">

                        <?php

                            $custom_slider = new WP_Query(

                            array(
                                'post_type' => 'customslider',
                            ),
                        );
                        while($custom_slider->have_posts()):
                            $custom_slider->the_post(); ?>

                            <?php the_post_thumbnail(); ?>
                        <?php endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>