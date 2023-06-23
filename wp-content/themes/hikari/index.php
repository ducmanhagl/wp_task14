<?php get_header();?>
    <div class="c-mainvisual">
        <div class="js-slider">
        <?php if( have_rows('mainvisual') ): ?>
            <?php while( have_rows('mainvisual') ): 
                the_row(); 
                $mv_image = get_sub_field('image');
            ?>
            <div><img src="<?php echo $mv_image['url']?>" alt="<?php echo $mv_image['alt']?>"></div>
            <?php endwhile;?>
        <?php endif;?>    
        </div>
    </div>
    <main class="p-home">
        <section class="service">
            <div class="l-container">
                <h2 class="c-title"><span>幅広い案件に対応できるひかりのワンストップサービス</span>目的に応じて、最適な方法をご提案できます</h2>
                <div class="service__inner">
                    <?php if( have_rows('services') ): ?>
                        <?php while( have_rows('services') ): 
                            the_row();
                            $service_image = get_sub_field('image');
                        ?>
                            <div class="service__item">
                                <img src="<?php echo $service_image['url']?>" alt="<?php echo $mv_image['alt']?>">
                            </div>
                        <?php endwhile;?>
                    <?php endif;?>
                </div>
                <div class="l-btn l-btn--2btn">
                    <div class="c-btn">
                        <a href="service.html">ひかり税理士法人のサービス一覧を見る</a>
                    </div>
                    <div class="c-btn">
                        <a href="cases.html">ひかり税理士法人の成功事例を見る</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="news">
            <div class="l-container">
                <h2 class="c-title1">
                    <span class="ja">ニュース</span>
                    <span class="en">News</span>
                </h2>
                <div class="news__inner">
                    <ul class="c-tabs">
                        <li data-content="all" data-color="#0078d2" class="active">すべて</li>
                        <?php $categories = get_categories(); ?>
                        <?php foreach ($categories as $key => $category) :?> 
                        <?php $color = get_field('colors', 'category_'.$category->term_id);?>
                        <li data-content="cat_<?php echo $key ;?>" data-color="<?php echo $color?>"><?php echo $category->name;?></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="c-tabs__content">
                        <!-- All Posts - Display 5 Posts-->
                        <ul class="c-listpost active" id="all">
                            <?php 
                                $args  = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 5
                                );
                                $new_query = new WP_Query($args);
                            ?>
                            <?php if ( $new_query->have_posts() ) : ?>
                                <?php while ( $new_query->have_posts() ) : 
                                    $new_query->the_post(); 
                                ?>
                                <li class="c-listpost__item">
                                    <div class="c-listpost__info">
                                        <span class="datepost"><?php echo get_the_date('Y年m月d日')?></span>
                                        <span class="cat">
                                        <?php $categories_list = get_the_category( $post->ID ); ?>
                                        <?php foreach ($categories_list as $cat) :?> 
                                            <?php $color_list = get_field('colors', 'category_'.$cat->term_id);?>
                                            <i class="c-dotcat" style="background-color: <?php echo $color_list?>"></i>
                                            <a href="news-cat.html"><?php echo $cat->name;?></a>
                                        <?php endforeach; ?>
                                        </span>
                                    </div>
                                    <h3 class="titlepost"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                                </li>
                                <?php endwhile; ?>
			                <?php endif; ?>
                            <?php wp_reset_postdata();?>
                        </ul>
                        <!-- Posts of cat1 item - Display 5 Posts-->
                        <?php foreach ($categories as $key => $category) :?> 
                        <ul class="c-listpost" id="cat_<?php echo $key ;?>">
                            <?php 
                                $args  = array(
                                    'post_type' => 'post',
                                    'cat' =>  $category->term_id,
                                    'posts_per_page' => 5
                                );
                                $new_query = new WP_Query($args);
                            ?>
                            <?php if ( $new_query->have_posts() ) : ?>
                                <?php while ( $new_query->have_posts() ) : 
                                    $new_query->the_post(); 
                                ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日')?></span>
                                    <span class="cat">
                                    <?php $categories_list_2 = get_the_category( $post->ID ); ?>
                                    <?php foreach ($categories_list_2 as $cat) :?> 
                                        <?php if($cat->name == $category->name):?>
                                            <?php $color_list_2 = get_field('colors', 'category_'.$cat->term_id);?>
                                        <i class="c-dotcat" style="background-color: <?php echo $color_list_2?>"></i>

                                        <a href="">
                                            <?php echo $cat->name;?>
                                        </a>
                                        <?php endif;?>
                                        <?php endforeach; ?>
                                    </span>
                                </div>
                                <h3 class="titlepost"><a href="<?php the_permalink(); ?>"><?php echo get_the_title();?></a></h3>
                            </li>
                                <?php endwhile; ?>
			                <?php endif; ?>
                            <?php wp_reset_postdata();?>
                        </ul>
                        <?php endforeach; ?>
                    </div>
                    <div class="l-btn">
                        <div class="c-btn c-btn--small">
                            <a href="<?php echo home_url('/news')?>">ニュース一覧を見る</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="publish">
            <div class="l-container">
                <h2 class="c-title1">
                    <span class="ja">出版物</span>
                    <span class="en">Publish</span>
                </h2>
                <div class="publish__inner">
                    <ul class="c-gridpost">
                        <?php 
                            $args  = array(
                                'post_type' => 'publish',
                                'posts_per_page' => 4
                            );
                            $publish_query = new WP_Query($args);
                        ?>
                        <?php if ( $publish_query->have_posts() ) : ?>
                            <?php while ( $publish_query->have_posts() ) : 
                                $publish_query->the_post(); 
                            ?>
                            <li class="c-gridpost__item">
                                <a href="">
                                    <div class="c-gridpost__thumb">
                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                        <img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>">
                                    <?php endif; ?>
                                    </div>
                                    <p class="datepost"><?php echo get_the_date('Y年m月d日')?></p>
                                    <h3><?php the_title();?></h3>
                                </a>
                            </li>
                            <?php endwhile; ?>
			            <?php endif; ?>
                        <?php wp_reset_postdata();?>
                    </ul>
                </div>
                <div class="l-btn">
                    <div class="c-btn c-btn--small">
                        <a href="publish.html">出版物一覧を見る</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer();?>