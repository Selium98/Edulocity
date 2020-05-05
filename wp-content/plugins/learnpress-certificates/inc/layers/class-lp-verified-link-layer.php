<?php

class LP_Certificate_Verified_Link_Layer extends LP_Certificate_Layer {
	protected $_added_field = false;

	public function __construct( $options ) {
		parent::__construct( $options );

		add_filter( 'learn-press/certificates/fields', array( $this, 'add_field' ), 10, 2 );
	}

	public function apply( $data ) {
		$certificate = new LP_Certificate( $data['cert_id'] );
		if ( $data['user_id'] ) {
			$key       = $certificate->get_cert_key( $data['user_id'], $data['course_id'], $data['cert_id'], false );
			$permalink = trailingslashit( site_url() ) . 'certificates/' . $key;
			$permalink = apply_filters( 'learn-press/certificates/permalink', trailingslashit( $permalink ), $data['user_id'], $data['course_id'], $data['cert_id'], '' );
			if ( (int) $this->options['qr_size'] > 0 ) {
				$qr_size               = (int) $this->options['qr_size'];
				$this->options['text'] = 'https://chart.googleapis.com/chart?chs=' . $qr_size . 'x' . $qr_size . '&cht=qr&chld=L|0&chl=' . urlencode( $permalink ) . '&choe=UTF-8';
			} else {
				$this->options['text'] = $permalink;
			}
		}
	}

	public function add_field( $_options, $layer ) {

		if ( ! $this->_added_field && ( $layer->get_name() === $this->get_name() ) ) {
			$options    = array( $_options[0] );
			$options[1] = array(
				'name'  => 'qr_size',
				'type'  => 'number',
				'title' => __( 'QR Size', 'learnpress-certificates' ),
				'std'   => ''
			);

			for ( $i = 1, $n = sizeof( $_options ); $i < $n; $i ++ ) {
				$options[] = $_options[ $i ];
			}
			$_options           = $options;
			$this->_added_field = true;
		}

		return $_options;
	}
}