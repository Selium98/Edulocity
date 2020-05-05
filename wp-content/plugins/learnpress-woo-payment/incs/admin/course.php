<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class LP_Woo_Payment_Admin_Course {

	/**
	 * Constructor
	 */
	public function __construct() {
		# Add the Memberships tab to Course settings in edit Course page
		$this->init_hooks();
		
	}

	public function init_hooks() {
		# add tab
		add_filter( 'learn-press/admin-course-tabs', array( $this, 'admin_course_tabs' ) );
	}

	public function admin_course_tabs( $tabs ) {
		$this->_meta_box		= new RW_Meta_Box( $this->meta_box() );
		$tabs['woo-payment-tax'] 	= $this->_meta_box;
		
		return $tabs;
	}

	/**
	 * build content of settings tab for Paid Memberships Pro in edit course page
	 * @return mixed
	 */
	function meta_box() {
		$prefix		 = '_lp_woo_payment_';
		$options = array();
		$options['global'] = __( 'Global', 'learnpress-woo-payment' );
		$options['yes'] = __( 'Yes', 'learnpress-woo-payment' );
		$options['no'] = __( 'No', 'learnpress-woo-payment' );
		
		$meta_box = array(
				'id'	 => 'woo-payment',
				'title'  => __( 'Tax', 'learnpress-woo-payment' ),
				'icon'   => 'dashicons-chart-pie',
				'pages'  => array( LP_COURSE_CPT ),
				'fields' => array(
						array(
								'name'		=> __( 'Enable taxes', 'learnpress-woo-payment' ),
								'id'		  => "{$prefix}enable_tax",
								'type'		=> 'radio',
								'options'	 => $options,
								'multiple'	=> false,
// 								'placeholder' => __( 'Select membership levels', 'learnpress-pmpro' ),
						),
						)
				);
		
		return apply_filters( 'learn_press_woo_payment_meta_box_args', $meta_box );
	}
}

return new LP_Woo_Payment_Admin_Course();