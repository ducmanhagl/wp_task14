<?php get_header();?>

	<main class="p-service">
		<div class="c-breadcrumb">
			<div class="l-container">
				<a href="<?php echo home_url('/')?>">Home</a>
				<span>ご提供サービス</span>
			</div>
		</div>
		<div class="c-headpage">
			<div class="l-container2">
				<h2 class="c-title">ご提供サービス</h2>
			</div>
		</div>

		<div class="feature_img">
			<img src="assets/img/img_services01.png" alt="">
		</div>
		<div class="p-service__content">
			<div class="l-container">
				<p class="notice">ひかり税理士法人がご提供するすべてのサービスを目的別に検索していただけます</p>
				<!-- =======checkArea====== -->
				<div class=" p-service__checkArea">
				<form id="serviceSearch" method="post" action="filter_service">
					<div class="checkArea__form">
						<legend class="servicesList-heading">サービスの対象で選ぶ</legend>
						<div class="checkArea__inner">
						<?php
							$terms2 = get_terms(array( 
								'taxonomy' => 'service_cat',
								'orderby'    => 'ID'
							));
						?>
						<?php if ($terms2):?>
						<?php foreach ($terms2 as $term) : ?>
							<div class="c-w240">
								<label>
									<input class="chkbutton" type="checkbox" name="my_checkbox[]" onchange="sendQuery()" value="<?php echo ( $term->slug)?>" ><?php echo ( $term->name)?></label>
							</div>
							<?php endforeach;?>	
						<?php endif;?>	
						</div>
					</div>

					<div class="checkArea__form form2">
						<legend class="servicesList-heading">サービスの内容で選ぶ</legend>
						<div class="checkArea__inner">
						<?php
							$terms2 = get_terms(array( 
								'taxonomy' => 'service_content',
								'orderby'    => 'ID'
							));
						?>
						<?php if ($terms2):?>
						<?php foreach ($terms2 as $term) : ?>
							<div class="<?php echo (mb_strlen($term->name) > 3) ? 'c-w240' : 'c-w156' ?>">
								<label>
									<input class="chkbutton" type="checkbox" name="my_checkbox[]" onchange="sendQuery()" value="<?php echo ( $term->slug)?>"><?php echo ( $term->name)?></label>
							</div>
						<?php endforeach;?>	
						<?php endif;?>	
						</div>
					</div>
				</form>
				</div>
				<?php $args  = array(
					'post_type' => 'service_post',
					'order' => 'ASC',
					'posts_per_page' => 40
				);?>
				<?php $service_query = new WP_Query($args);?>
				<p class="p-service__result"><?php echo wp_count_posts('service_post')->publish ;?>件が該当しました</p>

				<ul class="c-column">
					
					<?php if ( $service_query->have_posts() ) : ?>
						<?php while ( $service_query->have_posts() ) : 
							$service_query->the_post(); 
							
						?>
						<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail'); ?>
					<li class="c-column__item"><a href="<?php the_permalink(); ?>">
						<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>">
						<p><?php the_title();?></p></a>
					</li>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata();?>
				</ul>

				<div class="endcontent">
					<img src="<?php echo get_template_directory_uri() ?>/assets/img/img_more05.png" alt="<?php echo get_the_title();?>">
					<img src="<?php echo get_template_directory_uri() ?>/assets/img/img_more06.png" alt="<?php echo get_the_title();?>">
				</div>
			</div>
		</div>
	</main>

<?php get_footer();?>
<script>
	function sendQuery() {
		var selectedTaxonomies = [];
		$("input[name='my_checkbox[]']:checked").each(function() {
			selectedTaxonomies.push($(this).val());
		});

		console.log(selectedTaxonomies)
		$.ajax({
			type: 'POST',
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			dataType: 'html',
			data: {
				action: 'filter_service',
				taxonomies: selectedTaxonomies
			},
			success: function(response) {
				var res = JSON.parse(response);
				if (res[0] != undefined && res[0].html != undefined) {
					$('.c-column').html(res[0].html);
				} else {
					$('.c-column').html(' ');
				}

				if (res[0] != undefined && res[0].counter != undefined) {
					$('.p-service__result').html(res[0].counter + '件が該当しました');
				} else {
					$('.p-service__result').html('0件が該当しました');
				}
			},
			error: function(xhr, status, error) {
				console.log(error);
			}
		})
	}
</script>