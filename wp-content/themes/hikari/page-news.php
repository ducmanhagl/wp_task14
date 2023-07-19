
<?php get_header();?>
    <main class="p-news">
        <div class="c-breadcrumb">
            <div class="l-container">
                <a href="<?php echo home_url('/')?>">Home</a>
                <span>ニュース・お知らせ</span>
            </div>
        </div>
        <div class="c-headpage">
            <h2 class="c-title">ニュース・お知らせ</h2>
        </div>
        <div class="p-news__content">
            <div class="l-container">
                <ul class="c-tabs__1">
                    <li data-content="all" data-color="#0078d2" class="active">すべて</li>
                    
                    <?php $categories = get_categories(); ?>
                    <?php foreach ($categories as $key => $category) :?> 
                    <?php $color = get_field('colors', 'category_'.$category->term_id);?>
                    <?php $category_link = get_category_link($category->cat_ID); ?>
                    <li><a href="<?php echo $category_link;?>" class="c-tabs__list"><?php echo $category->name;?></a></li>
                    <?php endforeach; ?>
                </ul>
                <div class="c-tabs__content">
                    <ul class="c-listpost active" id="all">
                        <?php 
                            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                            $args  = array(
                                'post_type' => 'post',
                                'posts_per_page' => 10,
                                'orderby' => 'date', 
                                'paged' => $paged
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
                                <div class="cat">
                                <?php $categories_list = get_the_category( $post->ID ); ?>
                                <?php foreach ($categories_list as $cat) :?>
                                    <div class="cat__item">
                                    <?php $color_list = get_field('colors', 'category_'.$cat->term_id);?>
                                    <?php $category_link_2 = get_category_link($cat->cat_ID);?>
                                    <i class="c-dotcat" style="background-color: <?php echo $color_list?>"></i>
                                    <a href="<?php echo $category_link_2; ?>"><?php echo $cat->name;?></a>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                            <h3 class="titlepost"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                        </li>
                            <?php endwhile; ?>
			            <?php endif; ?>
                    </ul>
                        <?php wp_reset_postdata();?>
                        <div class="c-pagination">
                            <?php 
                                $big = 999999999; // need an unlikely integer
                                echo paginate_links( array(
                                    'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format'  => '?paged=%#%',
                                    'posts_per_page' => 5, 
                                    'prev_text'    => __(''),
                                    'next_text'    => __(''),
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total'   => $new_query->max_num_pages
                                ) );
                            ?>
                        </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer();?>