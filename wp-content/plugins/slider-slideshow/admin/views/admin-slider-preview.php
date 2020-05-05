<?php if ( ! WPRLS_PREMIUM_ENABLED ): ?>
<p id="wprls-layer-warning" class="alert alert-warning">Please note <b>Layers</b> will only work with the premium version. Layers could be Previewed in admin for demo but will not appear on frontend.
<a class="open-live-preview btn btn-info" data-target="#live-preview" data-toggle="modal"><?php _e( 'Open Preview', 'wprls' ) ?></a>
</p>
<?php else: ?>
	<p style="text-align: center">
		<button class="open-live-preview btn btn-info" data-target="#live-preview" data-toggle="modal"><?php _e( 'Open Slider Preview', 'wprls' ) ?></button>
	</p>
<?php endif; ?>
<?php $this->live_slider_preview( intval($_GET['post_id']) ) ?>