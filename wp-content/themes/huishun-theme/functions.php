<?php


if (get_option('threaded_comments')) {
    wp_enqueue_script('comment-reply');
}

function load_files() {
    wp_enqueue_style('bootstrap_styles', '//maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css');
    wp_enqueue_style('montserrat', '//fonts.googleapis.com/css?family=Montserrat');
    wp_enqueue_style('mukta', '//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800');
    wp_enqueue_style('huishun_styles', get_stylesheet_uri());
    wp_enqueue_script('jQuery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', NULL, '1.0', true);
    wp_enqueue_script('pooper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js', NULL, '1.0', true);
    wp_enqueue_script('bootstrap_script', '//maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', NULL, '1.0', true);
    wp_enqueue_script('all_script', get_template_directory_uri() . '/script.js', array('jquery'), time(), true);
    if ( is_archive() || is_page('archive') ) {
        wp_enqueue_script('archive_script', get_template_directory_uri() . '/archive.js', array('jquery'), time(), true);
    }
}
add_action('wp_enqueue_scripts', 'load_files');

//
function features() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'features');

//load template part
function load_template_part($template_name, $part_name=null) {
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}

//comments
function custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID() ?>">
            <div class="comment-author vcard">
                <?php printf('<cite class="fn">%s</cite>', get_comment_author_link());?>
            </div>
            
            <div class="comment-meta commentmetadata comment-date">
                <?php echo get_comment_date() ?>
            </div>
            
            <?php comment_text() ?>

            <div class="reply">
                <?php comment_reply_link(array_merge($args, array(
                    'depth' => $depth,
                    'max_depth' => $args['max_depth']
                ))) ?>
            </div>

        </div>
    </li>
<?php
}
?>