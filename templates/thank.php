<?php
/*
Template Name: стр. Благодарности
Template Post Type: page
*/
get_header();
?>


    <!-- main screen -->
    <section class="main_screen">
        <div class="wrapper">
            <div class="main_screen__layer-1">
                <div class="main_screen__video_filter"></div>
                <div class="main_screen__video_holder">

                </div>
            </div>

            <div class="main_screen__layer-2">
                <div class="table">
                    <div class="table-cell">
                        <div class="main_screen__title__holder">
                            <h1 class="target__title">Спасибо за обращение</h1>
                        </div>
                    </div>
                </div>
                <div class="btn_below"></div>
            </div>

        </div>
    </section>
    <!-- main screen -->


    <section class="contact">
        <div class="wrapper_m">
            <div class="contact__wrap">
               <?php echo $post->post_content ?>
            </div>
        </div>
    </section>


<?php get_footer(); ?>