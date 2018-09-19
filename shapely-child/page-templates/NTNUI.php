<?php
/*
Template Name: NTNUI - Page Builder
Template Post Type: post, page
*/

get_header();
$layout_class = shapely_get_layout_class(); ?>
	<div class="row">
		<div id="primary" class="<?php echo esc_attr( $layout_class ); ?>">
	</div>
		<!--START HER-->
		<?php 
  $sid = "";
  $pref = "sidebar-";
 
  if (is_single()){
    // sidebar explicitly defined for single blog post
    $sid = "sidebar-single"; 
  } elseif (is_page()){
    if ($post->post_parent == 0 || is_active_sidebar('sidebar-'.$post->ID)){
      // no parent to inherit, or not necessary because the sidebar has been set
      $sid = $pref.$post->ID;
    } else {
      if (is_active_sidebar('sidebar-'.$post->post_parent)){
        // parent exists and has a sidebar
        $sid = $pref.$post->post_parent;
      } else {
        // parent doesn't exist, check all for sidebars
        foreach (get_post_ancestors($post) as $ancestor => $id){
          if (is_active_sidebar($pref.$id)){
            $sid = $pref.$id;
            break;
          }
        }
      }
    }
  } elseif (is_home()){
     // sidebar for blog list page
    $sid = $pref.get_option('page_for_posts');
  }
?>
 
  <?php if (!empty($sid) && function_exists('is_dynamic_sidebar') && is_active_sidebar($sid)){ ?>
    <div id="sidebar">  
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($sid)): ?><?php endif; ?>
    </div>
  <?php } ?>
<?php
get_footer();
