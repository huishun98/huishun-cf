		<div class="timeline-item">
			<div class="row no-wrap">
				<div class="col-1 col-sm-2 timeline-line">
					<span class="pink-circle"></span>
					<div class="timeline-date-outer d-none d-sm-flex">
						<span class="timeline-date"><?php echo get_the_date('M j, Y') ?></span>
						<span class="timeline-day"><?php the_weekday() ?></span>
					</div>
				</div>
				<div class="col-11 col-sm-10">
					<div class="timeline-date-outer d-block d-sm-none">
						<span class="timeline-date"><?php echo get_the_date('M j, Y') ?></span>
						<span class="timeline-day"><?php the_weekday() ?></span>
					</div>
					<div class="timeline-content">
						<a href="<?php echo the_permalink() ?>" class="timeline-content-title">
							<?php the_title() ?>
						</a>

						<a href="<?php echo the_permalink() ?>" class="timeline-content-description">
							<?php the_excerpt();?>
						</a>

						<div class="read-more d-none d-lg-block">
							<a href="<?php echo the_permalink() ?>">Read more</a>
						</div>

					</div>
				</div>
			</div>
		</div>
