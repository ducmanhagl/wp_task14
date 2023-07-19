<?php
  add_theme_support( 'post-thumbnails', array( 'post' ));
  add_theme_support( 'post-thumbnails', array( 'publish' ));
  add_theme_support( 'post-thumbnails', array( 'service_post' ));

  // Set no title for post
  add_action('edit_form_advanced', 'force_post_title');
  function force_post_title($post)
  {

      // List of post types that we want to require post titles for.
      $post_types = array(
          'post',
          'publish',
          'service_post'
          // 'event', 
          // 'project' 
      );

      // If the current post is not one of the chosen post types, exit this function.
      if (!in_array($post->post_type, $post_types)) {
          return;
      }

  ?>
      <script type='text/javascript'>
          (function($) {
              $(document).ready(function() {
                  //Require post title when adding/editing Project Summaries
                  $('body').on('submit.edit-post', '#post', function() {
                      // If the title isn't set
                      if ($("#title").val().replace(/ /g, '').length === 0) {
                          // Show the alert
                          if (!$("#title-required-msj").length) {
                              $("#titlewrap")
                                  .append('<div id="title-required-msj"><em>タイトルが必要です。</em></div>')
                                  .css({
                                      "padding": "5px",
                                      "margin": "5px 0",
                                      "background": "#ffebe8",
                                      "border": "1px solid #c00"
                                  });
                          }
                          // Hide the spinner
                          $('#major-publishing-actions .spinner').hide();
                          // The buttons get "disabled" added to them on submit. Remove that class.
                          $('#major-publishing-actions').find(':button, :submit, a.submitdelete, #post-preview').removeClass('disabled');
                          // Focus on the title field.
                          $("#title").focus();
                          return false;
                      }
                  });
              });
          }(jQuery));
      </script>
  <?php
  }
  // AJAX 
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

// VALIDATE MESSAGE 
function validation_rule($validation, $data, $Data) {
	$validation->set_rule('firstname', 'noempty', array('message' => 'お名前を入力してください'));
  $validation->set_rule('lastname', 'noempty', array('message' => 'お名前を入力してください'));
  $validation->set_rule('emailconfirm', 'noempty', array('message' => 'お名前を入力してください'));
  $validation->set_rule('email', 'noempty', array('message' => 'お名前を入力してください'));
  $validation->set_rule('message', 'noempty', array('message' => 'お名前を入力してください'));
  $validation->set_rule('tel', 'numeric', array('message' => '電話番号を入力してください'));
  $validation->set_rule('tel', 'between', array('min' => 10,'max' => 11,'message' => '10～11文字を入力してください'));
  return $validation;
}
add_filter('mwform_validation_mw-wp-form-182', 'validation_rule', 10, 3);