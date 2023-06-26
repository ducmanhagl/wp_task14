<?php get_header();?>

	<main class="p-publish">
		<div class="c-breadcrumb">
			<div class="l-container">
				<a href="index.html">Home</a>
				<a href="publish.html">出版物</a>
				<span>社長に“もしものこと”があったときの手続きすべて</span>
			</div>
		</div>
	
		<div class="l-container">
			<div class="p-publish__single">
				<div class="feature_img">
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>">
				<?php endif; ?>
				</div>
				<div class="p-publish__info">
					<h2><?php the_title();?></h2>
					<?php $unixtimestamp = strtotime( get_field( 'publication-date' ) );?>
					<p class="datepost"><?php echo date_i18n( "Y年m月d日", $unixtimestamp );?> 発行</p>
					<p class="author">
					著者  : <?php echo get_field('author'); ?><br>
					出版社 : <?php echo get_field('publisher'); ?>
					</p>
					<p class="price"><?php echo get_field('price'); ?></p>
					
					<div class="desc">
						<p><?php echo get_field('description'); ?></p>

						<h4>目次</h4>
						<?php echo get_field('contents'); ?>
					</div>
				</div>
			</div>
			<div class="l-btn">
				<div class="c-btn c-btn--small2">
					<a href="<?php echo home_url('/publish')?>">出版物一覧へ</a>
				</div>
			</div>
		</div>
	</main>

<?php get_footer();?>
