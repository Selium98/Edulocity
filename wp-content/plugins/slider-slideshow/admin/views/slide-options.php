<form class="form-horizontal sub-slide-options">
  <div class="form-group">
    <label class="col-sm-2" for=""><?php _e( 'Background Image', 'wprls' ) ?></label>
    <div class="col-sm-10">
      <a  data-slide="<?php echo $index+1 ?>" class="btn btn-info upload_image_button">CLICK TO SET</a>
      <input class="media_attach_url" name="slide_bg" type="hidden" value="<?php echo $slide['bgimage'] ?>" />
      <input class="media_attach_id" name="attach_id" type="hidden" value="<?php echo $slide['attachid'] ?>" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2" for=""><?php _e( 'Animation duration', 'wprls' ) ?></label>
    <div class="col-sm-10">
      <input type="number" class="slide_duration" name="slide_duration" value="<?php echo $slide['slideduration'] ?>" />
      <small class="text-muted"> (ms)</small>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2" for=""><?php _e( 'Slide Animation', 'wprls' ) ?></label>
    <div class="col-sm-10">
      <select disabled name="custom_slide_animation" class="custom_slide_animation">
	        <option value="" <?php selected( '', $slide['animation'] ) ?> >  </option>
	        <option value="fade" <?php selected( 'fade', $slide['animation'] ) ?> >Fade</option>
	        <option value="slide" <?php selected( 'slide', $slide['animation'] ) ?> >Slide</option>
	        <option value="rotate" <?php selected( 'rotate', $slide['animation'] ) ?> >Rotate</option>
	        <option value="antirotate" <?php selected( 'antirotate', $slide['animation'] ) ?> >Opposite Rotate</option>
	        <option value="cube" <?php selected( 'cube', $slide['animation'] ) ?> >CubeX</option>
	        <option value="cubey" <?php selected( 'cubey', $slide['animation'] ) ?> >CubeY</option>
	        <option value="cube3x" <?php selected( 'cube3x', $slide['animation'] ) ?> >Cube3</option>
	        <option value="cube3y" <?php selected( 'cube3y', $slide['animation'] ) ?> >Bars3</option>
	        <option value="cube5x" <?php selected( 'cube5x', $slide['animation'] ) ?> >Cube5</option>
	        <option value="cube5y" <?php selected( 'cube5y', $slide['animation'] ) ?> >Bars5</option>
	        <option value="zoom" <?php selected( 'zoom', $slide['animation'] ) ?> >Zoom</option>
	        <option value="zoomout" <?php selected( 'zoomout', $slide['animation'] ) ?> >Zoom Out</option>
	        <option value="slicewave" <?php selected( 'slicewave', $slide['animation'] ) ?> >Wave</option>

	        <option value="slice" <?php selected( 'slice', $slide['animation'] ) ?> >Slice</option>

	        <option value="puzzle" <?php selected( 'puzzle', $slide['animation'] ) ?> >Puzzle</option>

	        <option value="assemble" <?php selected( 'assemble', $slide['animation'] ) ?> >Assemble</option>

	        <option value="ripple" <?php selected( 'ripple', $slide['animation'] ) ?> >Ripple</option>
        
		</select>
		<small class="text-muted">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a>.</small>

        </div>
  </div>
  
</form>