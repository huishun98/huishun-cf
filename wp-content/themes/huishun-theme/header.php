<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- <title>Document</title> -->
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="fixed-header">
            <div class="fixed-header-inner">
                    <div class="fixed-header-inner-container">
                        <a href="<?php echo site_url() ?>" class="logo">
                            <span class="hs">HS</span>
                            <span class="logo-description">Code Factory</span>
                        </a>
                    </div>

                    <div class="fixed-header-inner-container">
                        
                        <?php
                        $args = array(
                            'post_type' => 'page',
                        );
                        $pages = new WP_Query($args);
                        $pages->posts = array_reverse($pages->posts);
                        ?>

                        <?php while ($pages->have_posts()) { $pages->the_post(); ?>
                            <div class="fixed-header-item-wrapper">
                                <a href="<?php echo the_permalink() ?>" class="header-label"><?php the_title() ?></a>
                            </div>
                        <?php } ?>
    
                        <?php wp_reset_query(); ?>
                    </div>
            </div>
        </div>

        <div class="archive-dropdown">
            <div class="">
				<span class="archive-sidebar-title">Categories</span>
				<?php 
					$categories = get_categories();
					foreach($categories as $category) {
					   	echo '<div class="sidebar-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>' ;
					}
				?>
				</div>
        </div>

        <div class="mobile-navi d-flex d-lg-none">
        <div class="mobile-navi-container">
                <div class="mobile-navi-item">
                    <a href="<?php echo site_url() ?>" class="logo">
                        <span class="hs">HS</span>
                        <span class="logo-description">Code Factory</span>
                    </a>
                </div>
                <div class="mobile-navi-item">
                    <a class="d-inline-block d-lg-none mobile-navi-trigger" target="#mobile-navi-main" href="javascript:void(0)">
                            <div class="hamburger">
                                <span class="hamburger-line line-one"></span>
                                <span class="hamburger-line line-two"></span>
                                <span class="hamburger-line line-three"></span>
                            </div>
                    </a>
                </div>
        </div>
        </div>    
        
    </header>



    <div class="mobile-navi-target-outer" id="#mobile-navi-main">
        <div class="mobile-navi-target-inner">

            <div class="mobile-navi-item-wrapper">
                <a href="<?php echo site_url() ?>" class="header-label">Home</a>
            </div>

            <?php
            $args = array(
                'post_type' => 'page',
            );
            $pages = new WP_Query($args);
            $pages->posts = array_reverse($pages->posts);
            ?>

            <?php while ($pages->have_posts()) { $pages->the_post(); ?>
                <div class="mobile-navi-item-wrapper">
                    <a href="<?php echo the_permalink() ?>" class="header-label"><?php the_title() ?></a>
                </div>
            <?php } ?>

            <?php wp_reset_query(); ?>
        </div>
    </div>