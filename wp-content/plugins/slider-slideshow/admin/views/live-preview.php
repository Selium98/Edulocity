<!-- Modal -->
<div id="live-preview" class="modal fade modal-wide" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php _e( 'Live Preview', 'wprls') ?></h4>
        <p class="description"><?php _e( 'Save all slider data before preview', 'wprls') ?></p>
      </div>
      <div class="modal-body">
        <?php echo do_shortcode( $shortcode ) ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>