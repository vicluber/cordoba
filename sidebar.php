<aside id="main-widget-area">
<?php if ( is_active_sidebar( 'main-widget-area' ) ) : ?>
	<ul class="widgets">
		<?php dynamic_sidebar( 'main-widget-area' ); ?>
	</ul>
<?php endif; ?>
</aside>