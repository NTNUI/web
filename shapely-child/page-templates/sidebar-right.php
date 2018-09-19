<?php
/*
Template Name: Sidebar Right
Template Post Type: post, page
*/

get_header();
$layout_class = shapely_get_layout_class(); ?>
	<div class="row">
		<div id="primary" class="<?php echo esc_attr( $layout_class ); ?>">
		<?php
		get_sidebar();
		?>
	</div>
<?php
get_footer();
