<?php get_header() ?>

<?php 
while(have_posts()) {
    the_post();
    ?>

    <div class="single-container">
        
        <h1 class="single-title">
            <?php the_title() ?>
        </h1>
        
        <div class="single-description">
            <p>
            <?php the_weekday() ?>, <?php echo get_the_date('j F Y'); ?>
            </p>
        </div>
        
        <div class="single-body rich-text">
            <?php the_content() ?>
        </div>
       
        <!-- buttons from simplesharebuttons.com -->
        <div id="share-buttons">
            
            <!-- Facebook -->
            <a href="http://www.facebook.com/sharer.php?u=<?php echo get_page_link()?>" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
            </a>

            <!-- Twitter -->
            <a href="https://twitter.com/share?url=<?php echo get_page_link()?>" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
            </a>
            
            <!-- LinkedIn -->
            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_page_link()?>" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
            </a>
            
            <!-- Google+ -->
            <a href="https://plus.google.com/share?url=<?php echo get_page_link()?>" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
            </a>

            <!-- Reddit -->
            <a href="http://reddit.com/submit?url=<?php echo get_page_link()?>&amp;title=<?php echo the_title() ?>" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
            </a>
            
            <!-- Print -->
            <a href="javascript:;" onclick="window.print()">
                <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
            </a>

        </div>

        <div class="single-tag">
            Categories: 
            <?php 
            the_category(' || ') 
            ?>
        </div>


        <div class="single-pagination row">
            <span class="col-12 col-md-6"><?php previous_post_link(); ?></span>
            <span class="right col-12 col-md-6"><?php next_post_link(); ?></span>
        </div>

        <?php comments_template(); ?>

    </div>

<?php } ?>

<?php get_footer() ?>