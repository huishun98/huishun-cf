<?php get_header() ?>

<?php 
while(have_posts()) {
    the_post();
    ?>
    <div class="background">
        <div class="page-thumbnail-wrapper">
                <div class="page-thumbnail">
                    <div class="thumbnail-content">
                        <span class="thumbnail-header"><?php the_title() ?></span>
                        <div class="thumbnail-description rich-text">
                            <p>
                                <?php the_content() ?>
                            </p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php } ?>



<?php get_footer() ?>