<?php get_header();?>
    <main class="p-publish">
        <div class="c-breadcrumb">
            <div class="l-container">
                <a href="index.html">Home</a>
                <span>出版物</span>
            </div>
        </div>
        <div class="c-headpage">
            <h2 class="c-title">出版物</h2>
            <p>ひかり税理士法人では、税務・会計・経営・相続などに関する書籍の執筆を行っています。</p>
        </div>
        <div class="l-container">
            <div class="p-publish__content">
                <ul class="c-gridpost">
                <?php 
                $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                    $args  = array(
                        'post_type' => 'publish',
                        'posts_per_page' => 10,
                        'paged' => $paged
                    );
                    $publish_query = new WP_Query($args);
                ?>
                <?php if ( $publish_query->have_posts() ) : ?>
                    <?php while ( $publish_query->have_posts() ) : 
                        $publish_query->the_post(); 
                    ?>
                    <li class="c-gridpost__item">
                        <div class="c-gridpost__thumb">
                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>">
                        <?php endif; ?>
                        </div>
                        <div class="c-gridpost__info">
                            <?php $unixtimestamp = strtotime( get_field( 'publication-date' ) );?>
                            <p class="datepost"><?php echo date_i18n( "Y年m月d日", $unixtimestamp );?></p>
                            <h3><?php the_title();?></h3>
                            <p class="price"><?php echo get_field('price'); ?></p>
                            <a href="<?php the_permalink(); ?>" class="c-btnview">詳しく見る</a>
                        </div>
                    </li>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata();?>
                </ul>
            </div>
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
                        'total'   => $publish_query->max_num_pages
                    ) );
                ?>
            </div>
        </div>
    </main>
<?php get_footer();?>