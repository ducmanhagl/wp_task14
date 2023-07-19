<?php get_header();?>

	<main class="p-news">
		<div class="c-breadcrumb">
			<div class="l-container">
				<a href="<?php echo home_url("/");?>">Home</a>
				<a href="<?php echo home_url("/news");?>">ニュース・お知らせ</a>
				<span><?php echo get_the_title(); ?></span>
			</div>
		</div>
		
		<div class="p-news__content">
			<div class="l-container">
				<div class="feature_img">
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>">
				<?php else :?>
					<img src="<?php echo get_template_directory_uri() ?>/assets/img/img_news.png" alt="<?php the_title();?>">
				<?php endif; ?>
				</div>

				<div class="c-ttlpostpage">
					<h2><?php echo get_the_title(); ?></h2>
					<span><?php echo get_the_date("Y年m月d日"); ?></span>
					<?php $categories = get_categories(); ?>
					<span class="c-listpost__cat">
						<?php $categories_list = get_the_category( $post->ID ); ?>
						<?php foreach ($categories_list as $cat) :?> 
						<?php $color_list = get_field('colors', 'category_'.$cat->term_id);?>
						<?php $category_link_2 = get_category_link($cat->cat_ID);?>
						<i class="c-dotcat" style="background-color:  <?php echo $color_list?>"></i>
						<a href="<?php echo $category_link_2; ?>"><?php echo $cat->name;?></a>
                        <?php endforeach; ?>
					</span>
				</div>

				<div class="single__content">
				<?php
					the_content();
				?>

				<div class="l-btn">
					<div class="c-btn c-btn--small2">
						<a href="<?php echo home_url("/news");?>">ニュース一覧を見る</a>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php get_footer();?>
