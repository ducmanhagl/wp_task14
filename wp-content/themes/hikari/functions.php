<?php
  add_theme_support( 'post-thumbnails', array( 'publish' ));
  add_theme_support( 'post-thumbnails', array( 'service_post' ));
  function filter_service(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $selectedTaxonomies = isset($_POST['taxonomies']) ? $_POST['taxonomies'] : array();

        if (!empty($selectedTaxonomies)) {
          $args = array(
              'post_type' => 'service_post',
              'tax_query' => array(
              'relation' => 'OR', 
                  array(
                      'taxonomy' => 'service_cat','service_content',
                      'field'    => 'slug',
                      'terms'    => $selectedTaxonomies,
                  ),
                  array(
                    'taxonomy' => 'service_content',
                    'field'    => 'slug',
                    'terms'    => $selectedTaxonomies,
                )
              
              ),

          );
      } else {
          $args = array(
              'post_type' => 'service_post',
              'posts_per_page' => 20
          );
      }

      $query = new WP_Query($args);
        $html = '';
        $loop_counter = 0;
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $loop_counter++;
                $query->the_post();
                $html .= '<li class="c-column__item"><a href="' . get_post_permalink(get_the_ID()) . '">';
                if (has_post_thumbnail(get_the_ID())) :
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
                    $html .= '<img src="' . $image[0] . '" alt="Service result item">';
                endif;
                $html .= '<p>' . get_the_title() . '</p></a></li>';
            }
            wp_reset_postdata();
        }

        $results[] = array(
            'html' => $html,
            'counter' => $loop_counter,
        );

        echo json_encode($results);
        wp_die(); 
    } 
  }

add_action('wp_ajax_filter_service', 'filter_service');
add_action('wp_ajax_nopriv_filter_service', 'filter_service');