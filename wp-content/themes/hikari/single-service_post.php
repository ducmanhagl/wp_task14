<?php get_header();?>

	<main class="p-service">
		<div class="c-breadcrumb">
			<div class="l-container">
				<a href="<?php echo home_url("/");?>">Home</a>
				<a href="<?php echo home_url("/publish");?>">ご提供サービス</a>
				<span><?php echo get_the_title(); ?></span>
			</div>
		</div>
		<div class="c-headpage">
			<div class="l-container2">
				<h2 class="c-title"><?php echo get_the_title(); ?></h2>
			</div>
			<?php if (get_field('description')):?>
			<p>
				<?php echo get_field('description'); ?>
			</p>
			<?php endif;?>
		</div>
		<?php $image = get_field('image');?>	
		<?php if (!empty($image)):?>		
		<div class="feature_img">
			<img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title(); ?>">
		</div>
		<?php endif;?>	
		<div class="p-service__consultation">
			<dl class="l-container2">
				<dt>このような方はご相談ください</dt>
				<?php $ckempty_taget = get_field('target');?>
				<?php if (!empty($ckempty_taget)):?>
				<?php if( have_rows('target') ): ?>
					<?php while( have_rows('target') ): the_row(); ?>
						<?php $target_content = get_sub_field('target_content');?>
						<?php if( !empty($target_content)): ?>
							<dd class="c-checkMark"><?php echo $target_content;?></dd>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php endif; ?>
			</dl>
		</div>

		<div class="p-service__merit">
			<div class="l-container2">
			<h3 class="p-service__title">ひかり税理士法人を選ぶメリット</h3>
			<dl>
				<?php if( !empty(get_field('advantage'))): ?>
					<?php while( have_rows('advantage') ): the_row(); ?>
						<?php 
							$advantage_title = get_sub_field('advantage-title');
							$advantage_description = get_sub_field('advantage-description');
						?>
						<dt class="c-checkMark"><?php echo $advantage_title;?></dt>
						<dd><?php echo $advantage_description;?></dd>
					<?php endwhile; ?>
				<?php endif; ?>		
			</dl>
			</div>
		</div>

		<div class="p-service__flow">
			<div class="l-container2">
				<h3 class="p-service__title">サービスの流れ</h3>
				<?php $loop_step = 1;?>
				<?php if( !empty(get_field('steps'))): ?>
					<?php while( have_rows('steps') ): the_row(); 
						$step_title = get_sub_field('step-title');
					?>
					<table>
					<tbody>
						<tr>
						<th>STEP<?php echo $loop_step;?></th>
						<td>
							<h4 class="flow-title"><?php echo $step_title;?></h4>
							<?php if( have_rows('step-contents')): ?>
								<?php while( have_rows('step-contents') ): the_row(); 
									$step_subtitle = get_sub_field('step-subtitle');
								?>
									<?php if ($step_subtitle):?>
										<h5 class="flow-subtitle"><?php echo $step_subtitle;?></h5>
									<?php endif; ?>	
										<?php if( have_rows('step-descriptions')): ?>
											<?php while( have_rows('step-descriptions') ): the_row(); 
												$step_descriptions = get_sub_field('step-description');
											?>
												<p class="c-checkMark"><?php echo $step_descriptions;?></p>
											<?php endwhile; ?>
										<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>		
						</td>
						</tr>
					</tbody>
					</table>
					<?php $loop_step++;?>
					<?php endwhile; ?>
				<?php endif; ?>	
			</div>
		</div>

		<div class="p-service__division">
			<div class="l-container">
				<h3 class="p-service__subtitle">関連サービス</h3>
			<ul class="division-list c-flex">
				<?php if( get_field('related_services')): ?>
					<?php while( have_rows('related_services') ): the_row(); 
						$post_object = get_sub_field('related_service');
					?>
					<?php if ($post_object->post_title) :?>
						<li class="small-12 medium-4">
							<a href="<?php echo get_post_permalink($post_object->ID) ?>">
							<?php if (has_post_thumbnail($post_object->ID)) : ?>
							<p class="img">
								<?php $image_post = wp_get_attachment_image_src(get_post_thumbnail_id($post_object->ID), 'single-post-thumbnail'); ?>
								<img src="<?php echo $image_post[0]; ?>')" alt="<?php echo $post_object->post_title;?>">
							</p>
							<p class="text"><span class="arrow"><?php echo $post_object->post_title;?></span></p>
							<?php endif; ?>
					</a>
				</li>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>	
			</ul>
				</div>

				<div class="l-btn">
					<div class="c-btn c-btn--small">
						<a href="<?php echo home_url("/service_post");?>">ご提供サービス一覧へ</a>
					</div>
				</div>
			</div>

		
	</main>

	<?php get_footer();?>
