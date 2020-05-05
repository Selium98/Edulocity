<?php
class LP_Certificate_Student_Name_Layer extends LP_Certificate_Layer {
	public function apply( $data ) {
		$user = learn_press_get_user($data['user_id']);
		$this->options['text'] = ( $user->get_display_name() ) ? $user->get_display_name() : $this->options['text'];
	}
}