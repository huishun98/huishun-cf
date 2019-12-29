<?php get_header() ?>
<div class="banner-wrapper">
    <div class="section-container">
        <!-- <div class="logo bigger">
                <span class="hs">HS</span>
                <span class="logo-description">Code Factory</span>
            </div> -->
        <!-- <span class="banner-description"><?php bloginfo('description') ?></span> -->
        <!-- <div class="scroll-down-container-outer">
                <div class="scroll-down-container">
                    <a class="link scroll-down" href="javascript:void(0)">View Posts 
                        <svg
                        xmlns="http://www.w3.org/2000/svg" 
                        width="24" height="24" 
                        viewBox="0 0 24 24">
                            <path class="svg-link" d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                        </svg>
                    </a>
                </div>
            </div>     -->
    </div>
</div>

<div class="timeline-section">
    <div class="section-container">
        <h2 class="section-header">Newest posts</h2>
        <div class="newest-posts-inner">
            <?php
            $default_posts_per_page = get_option('posts_per_page');
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array('post_type' => 'post', 'posts_per_page' =>  3, 'paged' => $paged);
            $wp_query = new WP_Query($args);
            while (have_posts()) {
                the_post();
                get_template_part('content', 'archive');
            } ?>
        </div>
        <div class="scroll-down-container-outer">
            <a class="link" href=<? get_page_link(get_page_by_title('All posts')) ?>>More Posts</a>
        </div>
        <!-- then the pagination links -->
        <!-- <div class="pagination">
            <span class="pagination-item"><?php next_posts_link('&larr; Older posts', $wp_query->max_num_pages); ?></span>
            <span class="pagination-item"><?php previous_posts_link('Newer posts &rarr;'); ?></span>
        </div> -->
    </div>
</div>

<div class="cards-container">
    <div class="row">
        <div class="col-md-4">
            <a href="<?php echo get_category_link(get_cat_ID('getting started')) ?>" class="card getting-started-clicked">
                <div class="card-head pastel-peach">
                    <div class="card-head-content">
                        Get started
                    </div>
                </div>
                <div class="d-none d-md-block card-body">
                    <p class="card-text">
                        New to coding? Click here for the information you need to get started.
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?php echo get_category_link(get_cat_ID('building things')) ?>" class="card">
                <div class="card-head sky-blue">
                    <div class="card-head-content">
                        Build things
                    </div>
                </div>
                <div class="d-none d-md-block card-body">
                    <p class="card-text">
                        Let's build some cool stuff with code!
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?php echo get_category_link(get_cat_ID('hs coding logs')) ?>" class="card">
                <div class="card-head">
                    <div class="card-head-content pastel-pink">
                        HS Coding Logs
                    </div>
                </div>
                <div class="d-none d-md-block card-body">
                    <p class="card-text">
                        Learning in progress... find out how I learn coding!
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="subscribe">
    <div class="subscribe-outer">
        <h2 class="section-header">JOIN ME ON THIS JOURNEY!</h2>
        <form id="subscribe-form">

            <input class="default-input" type="text" placeholder="Name" value="" name="FNAME">
            <input class="default-input" type="email" placeholder="Email" value="" name="EMAIL">
            <input class="default-button" type="submit" value="Subscribe" name="subscribe">

        </form>

        <div id="subscribe-result" class="subscribe-result"></div>
    </div>
</div>

<?php get_footer() ?>