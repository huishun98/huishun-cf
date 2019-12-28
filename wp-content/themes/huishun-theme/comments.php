<span class="subheader-one">Comments (<?php echo get_comments_number(); ?>)</span>
<?php

$args = array(
    'max-depth' => 2,
    'reply_text' => 'reply',
    'reverse_top_level' => true,
    'avatar_size' => 0,
    'callback' => 'custom_comments',
);
?>

<ul class="no-padding">

<?php
wp_list_comments($args);
?>

</ul>

<?php
if(comments_open()) {
?>
    <?php 
    $fields = array(
        'author' => 
            '<div class="row"><div class="col-12 col-lg-6">
            <input class="comment-input" type="text" placeholder="Name*" name="author" required>
            </div>',
        'email' => 
            '<div class="col-12 col-lg-6">
            <input class="comment-input" type="email" placeholder="Email*" name="email" required>
            </div></div>',
    );
    
    $args = array(
        'class_submit' => 'default-button commentform-button',
        'label_submit' => __('ADD COMMENT'),
        'fields' => apply_filters('comment_form_default_fields', $fields),
        'comment_field' => '<textarea class="comment-textarea" placeholder="Leave a message...*" name="comment" required></textarea>'
    );
    
    comment_form($args);
    
    
    ?>
    
<?php    
} else  {
    _e( 'Comments are closed', 'huishun-theme');
}










?>