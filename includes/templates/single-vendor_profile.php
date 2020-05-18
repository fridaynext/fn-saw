<?php

// ******** Copied from wp-content/themes/Divi/single.php ******** //

get_header();

$show_default_title = get_post_meta(get_the_ID(), '_et_pb_show_title', true);

$is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());

?>

    <div id="main-content">
        <div class="container">
            <div id="content-area" class="clearfix">
                <div class="et_post_meta_wrapper">
                    <h1 class="entry-title"><?php the_title(); ?></h1>

                    <?php

                    // Display the address, 'Visit our Website', Phone (call), Phone ('text us now')

                    // address
                    ?>
                    <!-- Generator: Adobe Illustrator 24.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <div class="vendor-meta">

                        <div class="vendor-address">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 21 28" style="enable-background:new 0 0 21 28;"
                                 xml:space="preserve">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: #8CBCBF;
                                                        }
                                                    </style>
                                <path class="st0" d="M10.64,0.38c-5.5,0-9.96,4.55-9.96,10.17c0,5.61,9.96,16.92,9.96,16.92s9.96-11.31,9.96-16.92
            C20.6,4.93,16.14,0.38,10.64,0.38z M10.63,13.69c-2.06,0-3.73-1.7-3.73-3.8c0-2.1,1.67-3.8,3.73-3.8c2.06,0,3.73,1.7,3.73,3.8
            C14.36,11.99,12.69,13.69,10.63,13.69z"/>
                                                </svg>
                            <div class="vendor-address-text"><?php the_field("address", get_the_ID()); ?></div>
                        </div>

                        <?php // website
                        ?>
                        <div class="vendor-meta-second-line">

                            <div class="vendor-website meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                    <path d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z"/>
                                </svg>
                                <div class="vendor-website-text"><a
                                            href="<?php the_field("website", get_the_ID()); ?>"
                                            target="_blank">Visit our Website</a></div>
                            </div>

                            <?php // phone (call)
                            ?>
                            <div class="vendor-phone-call meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"/>
                                </svg>
                                <?php
                                $phone_call = get_field("business_phone_number", get_the_ID());
                                if (preg_match('/(\d{3})(\d{3})(\d{4})/', $phone_call, $matches)) {
                                    $phone_call = $matches[1] . '-' . $matches[2] . '-' . $matches[3];
                                }
                                ?>
                                <div class="vendor-phone-call-text"><a
                                            href="tel:<?php echo $phone_call; ?>"><?php echo $phone_call; ?></a>
                                </div>
                            </div>
                            <?php // phone (text)
                            ?>
                            <div class="vendor-phone-text meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M144 208c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zM256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"/>
                                </svg>
                                <?php
                                $phone_text = get_field("text_phone_number", get_the_ID());
                                if (preg_match('/(\d{3})(\d{3})(\d{4})/', $phone_text, $matches)) {
                                    $phone_text = $matches[1] . '-' . $matches[2] . '-' . $matches[3];
                                }
                                ?>
                                <div class="vendor-phone-text-text"><?php echo $phone_text; ?></div>
                            </div>

                        </div>
                    </div>


                    <?php
                    $thumb = '';

                    $width = (int)apply_filters('et_pb_index_blog_image_width', 1080);

                    $height = (int)apply_filters('et_pb_index_blog_image_height', 675);
                    $classtext = 'et_featured_image';
                    $titletext = get_the_title();
                    $alttext = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                    $thumbnail = get_thumbnail($width, $height, $classtext, $alttext, $titletext, false, 'Blogimage');
                    $thumb = $thumbnail["thumb"];

                    //                                        $post_format = et_pb_post_format();

                    $text_color_class = et_divi_get_post_text_color();

                    $inline_style = et_divi_get_post_bg_inline_style();


                    ?>
                </div> <!-- .et_post_meta_wrapper -->

                <?php // **** Add a sticky nav bar that will work all the way down the page ***** // ?>

                <div class="vendor-sticky-nav">
                    <ul class="vendor-page-nav">
                        <li class="nav-item">Gallery</li>
                        <li class="nav-item">About</li>
                        <li class="nav-item">Offers/Events</li>
                        <li class="nav-item">Reviews</li>
                        <li class="nav-item">In the Press</li>
                        <li class="nav-item">Comparison Guide</li>
                        <li class="nav-item">360° Tour</li>
                    </ul>

                </div>


                <div id="left-area">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        /**
                         * Fires before the title and post meta on single posts.
                         *
                         * @since 3.18.8
                         */
                        do_action('et_before_post');
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('et_pb_post'); ?>>


                            <div class="entry-content">
                                <?php
                                do_action('et_before_content');

                                // Insert the photo gallery, and video gallery
                                $photo_gallery = get_field("photo_gallery", get_the_ID());
                                $size = "full";
                                if( $photo_gallery ) :
                                $total = sizeof($photo_gallery); ?>
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($photo_gallery as $image_id): ?>
                                            <div class="swiper-slide">
                                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="swiper-pagination"></div>

                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                                <?php endif; ?>
                                <script type="text/javascript">
                                    var swiper = new Swiper('.swiper-container', {
                                        slidesPerView: 'auto',
                                        centeredSlides: true,
                                        loop: true,
                                        loopedSlides: <?php echo $total; ?>,
                                        spaceBetween: 5,
                                        pagination: {
                                            el: '.swiper-pagination',
                                            clickable: true,
                                        },
                                        navigation: {
                                            nextEl: '.swiper-button-next',
                                            prevEl: '.swiper-button-prev'
                                        },
                                        on: {
                                            init: function() {
                                                // find width of image and dynamically assign width of parent div (.swiper-slide)
                                                var $img_width = jQuery('.swiper-slide-active img').width();
                                                var $container_width = jQuery('.swiper-container').width();
                                                if($img_width < $container_width*.8) {
                                                    jQuery('.swiper-slide-active').width($img_width);
                                                }
                                            },
                                        },
                                    });
                                </script>

                                <?php
                                the_field("about_this_vendor", get_the_ID());

                                wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'Divi'), 'after' => '</div>'));
                                ?>
                            </div> <!-- .entry-content -->
                            <div class="et_post_meta_wrapper">
                                <?php
                                if (et_get_option('divi_468_enable') === 'on') {
                                    echo '<div class="et-single-post-ad">';
                                    if (et_get_option('divi_468_adsense') !== '') echo et_core_intentionally_unescaped(et_core_fix_unclosed_html_tags(et_get_option('divi_468_adsense')), 'html');
                                    else { ?>
                                        <a href="<?php echo esc_url(et_get_option('divi_468_url')); ?>"><img
                                                    src="<?php echo esc_attr(et_get_option('divi_468_image')); ?>"
                                                    alt="468" class="foursixeight"/></a>
                                    <?php }
                                    echo '</div> <!-- .et-single-post-ad -->';
                                }

                                /**
                                 * Fires after the post content on single posts.
                                 *
                                 * @since 3.18.8
                                 */
                                do_action('et_after_post');

                                if ((comments_open() || get_comments_number()) && 'on' === et_get_option('divi_show_postcomments', 'on')) {
                                    comments_template('', true);
                                }
                                ?>
                            </div> <!-- .et_post_meta_wrapper -->
                        </article> <!-- .et_pb_post -->

                    <?php endwhile; ?>
                </div> <!-- #left-area -->

                <?php get_sidebar(); ?>
            </div> <!-- #content-area -->
        </div> <!-- .container -->
    </div> <!-- #main-content -->

<?php

get_footer();
