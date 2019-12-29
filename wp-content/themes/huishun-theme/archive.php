<? /*
Template Name: Archive
*/ ?>

<?php get_header() ?>
<div class="timeline-section">
	<div class="section-container">
		<? if (have_posts()) { ?>
			<h2 class="section-header">All Posts</h2>
		<? } ?>
		<div class="newest-posts-inner">
			<?php

			$queried_object = get_queried_object();
			// following line is problematic
			if ($queried_object->post_title === 'All posts') { ?>
				<div class="row">
					<ul class="d-none d-lg-block col-lg-2 archive-sidebar">
						<span class="archive-sidebar-title">Months</span>
						<div class="sidebar-item">
							<?php
							$archive_args = array(
								'type' => 'monthly',
								'show_post_count' => true,
							);
							wp_get_archives($archive_args);
							?>
						</div>
						<div class="categories-list">
							<span class="archive-sidebar-title">Categories</span>
							<?php
							$categories = get_categories();
							foreach ($categories as $category) {
								$catcount_args = array(
									'cat' => $category->term_id,
								);
								$the_query = new WP_Query($catcount_args);
								$catcount = $the_query->found_posts;
								echo '<div class="sidebar-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> (' . $catcount . ') </div>';
							}
							?>
						</div>
					</ul>

					<div class="col-lg-10">
						
						<?php
						$args = array('post_type' => 'post');
						$wp_query = new WP_Query($args);

						$archive_results_array = [];
						while (have_posts()) {
							the_post();
							array_push($archive_results_array, load_template_part('content', 'archive'));
						}
						?>

						<div class="archive-results">
							<?php
							foreach ($archive_results_array as $array_post) {
								echo $array_post;
							}
							?>
						</div>
						
						<!-- then the pagination links -->
						<div class="pagination">
							<span class="pagination-item"><?php next_posts_link('&larr; Older posts', $wp_query->max_num_pages); ?></span>
							<span class="pagination-item"><?php previous_posts_link('Newer posts &rarr;'); ?></span>
						</div>
					</div>
				</div>

			<?
			} else if ($queried_object->name == 'Getting Started') {
			?>


				<div class="row">
					<ul class="d-none d-lg-block col-lg-2 archive-sidebar">
						<span class="archive-sidebar-title">Months</span>
						<div class="sidebar-item">
							<?php
							$archive_args = array(
								'type' => 'monthly',
								'show_post_count' => true,
							);
							wp_get_archives($archive_args);
							?>
						</div>
						<div class="categories-list">
							<span class="archive-sidebar-title">Categories</span>
							<?php
							$categories = get_categories();
							foreach ($categories as $category) {
								$catcount_args = array(
									'cat' => $category->term_id,
								);
								$the_query = new WP_Query($catcount_args);
								$catcount = $the_query->found_posts;
								echo '<div class="sidebar-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> (' . $catcount . ') </div>';
							}
							?>
						</div>
					</ul>
					<div class="col-lg-10">
						<div class="toggle-order-container">
							<a href="javascript:void(0);" id="toggle-order" class="toggle-order">Newest to Oldest</a>
						</div>
						<?php
						$archive_results_array = [];
						while (have_posts()) {
							the_post();
							array_push($archive_results_array, load_template_part('content', 'archive'));
						}
						?>

						<?php
						// Enqueue this js file, so that WordPress knows that we will be using this js file in this page
						// wp_enqueue_script('audio-demo-player', get_template_directory_uri() . '/script.js');
						// now we need to set the array name to be audio_array, so that later in the js file we can call them with that name
						// we also pass in the array that we have in the require_once
						$archive_results_array = array_reverse($archive_results_array);
						wp_localize_script('archive_script', 'archive_results_array', $archive_results_array);
						$reverse = [1];
						wp_localize_script('archive_script', 'reverse', $reverse);
						// this trigger the &lt;head&gt;&lt;/head&gt; section, which will enqueue the js file. Without this, the js file will not be
						// included in this specific page
						// wp_head();
						?>

						<div class="archive-results">
							<?php
							foreach ($archive_results_array as $array_post) {
								echo $array_post;
							}
							?>
						</div>
						<!-- then the pagination links -->
						<div class="pagination">
							<span class="pagination-item"><?php next_posts_link('&larr; Older posts', $wp_query->max_num_pages); ?></span>
							<span class="pagination-item"><?php previous_posts_link('Newer posts &rarr;'); ?></span>
						</div>
					</div>
				</div>

			<?
			} else {
			?>
				<div class="row">
					<ul class="d-none d-lg-block col-lg-2 archive-sidebar">
						<span class="archive-sidebar-title">Months</span>
						<div class="sidebar-item">
							<?php
							$archive_args = array(
								'type' => 'monthly',
								'show_post_count' => true,
							);
							wp_get_archives($archive_args);
							?>
						</div>
						<div class="categories-list">
							<span class="archive-sidebar-title">Categories</span>
							<?php
							$categories = get_categories();
							foreach ($categories as $category) {
								$catcount_args = array(
									'cat' => $category->term_id,
								);
								$the_query = new WP_Query($catcount_args);
								$catcount = $the_query->found_posts;
								echo '<div class="sidebar-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> (' . $catcount . ') </div>';
							}
							?>
						</div>
					</ul>
					<div class="col-lg-10">
						<div class="toggle-order-container">
							<a href="javascript:void(0);" id="toggle-order" class="toggle-order">Oldest to Newest</a>
						</div>
						<?php
						$archive_results_array = [];
						while (have_posts()) {
							the_post();
							array_push($archive_results_array, load_template_part('content', 'archive'));
						}
						?>

						<?php
						// Enqueue this js file, so that WordPress knows that we will be using this js file in this page
						// wp_enqueue_script('audio-demo-player', get_template_directory_uri() . '/script.js');
						// now we need to set the array name to be audio_array, so that later in the js file we can call them with that name
						// we also pass in the array that we have in the require_once
						wp_localize_script('archive_script', 'archive_results_array', $archive_results_array);
						$reverse = [0];
						wp_localize_script('archive_script', 'reverse', $reverse);

						// this trigger the &lt;head&gt;&lt;/head&gt; section, which will enqueue the js file. Without this, the js file will not be
						// included in this specific page
						// wp_head();
						?>

						<div class="archive-results">
							<?php
							foreach ($archive_results_array as $array_post) {
								echo $array_post;
							}
							?>
						</div>
						<!-- then the pagination links -->
						<div class="pagination">
							<span class="pagination-item"><?php next_posts_link('&larr; Older posts', $wp_query->max_num_pages); ?></span>
							<span class="pagination-item"><?php previous_posts_link('Newer posts &rarr;'); ?></span>
						</div>
					</div>
				</div>
			<? } ?>

		</div>
	</div>
</div>

<?php get_footer() ?>