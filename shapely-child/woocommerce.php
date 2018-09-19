<?php

get_header(); ?>
<div class="container">
	<div class="row">
		<div id="primary" class="col-md-12">
			<?php woocommerce_content(); ?>
		</div><!-- #primary -->
		<aside id="secondary" class="widget-area col-md-4" role="complementary">
			<?php dynamic_sidebar( 'shop-sidebar' ); ?>
		</aside><!-- #secondary -->
	</div>
</div>
<?php
get_footer();

