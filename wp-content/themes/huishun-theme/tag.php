<?php get_header() ?>  

    <div class="timeline-section viewheight">
        <div class="section-container">
            <div class="section-header">
                <h2>TAG: 
                    <?php 
                    $tagObject = get_queried_object();
                    echo $tagObject -> name;                    
                    ?>
                </h2>
            <!-- var_dump $term ;  -->
            </div>
            <div class="newest-posts-outer">
                <div class="newest-posts-inner">
                    <?php
                    while(have_posts()) {
                        the_post();
                        ?>
                        <div class="timeline-item">
                            <div class="row no-wrap">
                                <div class="col-1 col-sm-2 timeline-line">
                                    <span class="pink-circle"></span>
                                    <div class="timeline-date-outer d-none d-sm-flex">
                                        <span class="timeline-date"><?php echo get_the_date('F j, Y') ?></span>
                                        <span class="timeline-day"><?php the_weekday() ?></span>
                                    </div>
                                </div>
                                <div class="col-11 col-sm-10">
                                    <div class="timeline-date-outer d-block d-sm-none">
                                        <span class="timeline-date"><?php echo get_the_date('F j, Y') ?></span>
                                        <span class="timeline-day"><?php the_weekday() ?></span>
                                    </div>
                                    <div class="timeline-content">
                                        <a href="<?php echo the_permalink() ?>" class="timeline-content-title">
                                            <?php the_title() ?>
                                        </a>

                                        <div class="timeline-content-description">
                                            <?php 
                                            $content = get_the_content(); echo mb_strimwidth($content, 0, 400, '...');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <a href="javascript:void(0)" class="link view-more">VIEW MORE</a>
        </div>
    </div>

<?php get_footer() ?>
