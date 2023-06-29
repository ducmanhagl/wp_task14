<?php
 /* Template Name:  404 */
get_header();
?>
<main>
    <div class="l-container">
    <h1 class="c-title404 page-title">404</h1>
    <div class="c-main">
        <div class="c-main__content">
            <p><?php esc_html_e('この場所では何も見つからなかったようです。', 'task14' ); ?></p>
        </div>
        <div class="c-btn c-btn--small">
        <a href="<?php echo get_site_url(); ?>">家に帰る</a>
        </div>
        
        <!-- .page-content -->
    </div><!-- .error-404 -->
</div>
</main>
<?php
get_footer();?>