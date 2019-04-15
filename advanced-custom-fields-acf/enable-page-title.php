<?php
if( function_exists('the_field') ):
	$enablePageTitle = get_field('enable_page_title');
	$customPageTitle = get_field('custom_page_title');
	if( $enablePageTitle ):
?>
<div class="bluelion-breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><?php if( $customPageTitle ){echo esc_html( $customPageTitle );}else{ the_title(); } ?></h1>
				<?php if(function_exists('bcn_display')) bcn_display(); ?>
			</div>
		</div>
	</div>
</div>
<?php endif; endif; ?>
