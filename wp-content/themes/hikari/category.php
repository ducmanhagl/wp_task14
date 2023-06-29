<?php get_header();?>
    <main class="p-news">
        <div class="c-breadcrumb">
            <div class="l-container">
                <a href="<?php echo home_url("/");?>">Home</a>
                <a href="<?php echo home_url("/news");?>">ニュース・お知らせ</a>
                <span><?php single_cat_title();?></span>
            </div>
        </div>
        <div class="c-headpage">
            <h2 class="c-title"><?php single_cat_title();?></h2>
        </div>
        <div class="p-news__content">
            <div class="l-container">
                <ul class="c-listpost">
                    <?php $category = get_categories(); ?>
                    <?php 
                        $term = get_queried_object();
                        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                        $args  = array(
                            'post_type' => 'post',
                            'cat' =>  $term->term_id,
                            'posts_per_page' => 10,
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
                            <span class="cat">
                            <?php $categories_list_2 = get_the_category( $post->ID ); ?>
                            <?php foreach ($categories_list_2 as $cat) :?> 
                                
                                <?php if($cat->name == $term->name):?>
                                    <div class="cat__item">
                                    <?php $color_list_2 = get_field('colors', 'category_'.$cat->term_id);?>
                                <i class="c-dotcat" style="background-color: <?php echo $color_list_2?>"></i>
                                    <?php $category_link_2 = get_category_link($cat->cat_ID);?>
                                <a href=" <?php echo $category_link_2; ?>">
                                    <?php echo $cat->name;?>
                                </a>
                                </div>
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
    </main>
<?php get_footer();?>