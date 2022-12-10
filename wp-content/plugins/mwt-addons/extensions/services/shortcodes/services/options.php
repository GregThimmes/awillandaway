<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy = $ext_services_settings['taxonomy_name'];
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
unset( $button_options['target'] );
unset( $button_options['class'] );;

$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 120,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__( 'Items number', 'mwt' ),
		'desc'       => esc_html__( 'Number of posts to display', 'mwt' ),
	),
	'gutter_margins'        => array(
		'label'   => esc_html__( 'Gutter (padding)', 'mwt' ),
		'desc'    => esc_html__( 'Select padding between item', 'mwt' ),
		'value'   => '30',
		'type'    => 'select',
		'choices' => array(
			'0'  => esc_html__( '0', 'mwt' ),
			'10' => esc_html__( '10px', 'mwt' ),
			'20' => esc_html__( '20px', 'mwt' ),
			'30' => esc_html__( '30px', 'mwt' ),
			'45' => esc_html__( '45px', 'mwt' ),
			'50' => esc_html__( '50px', 'mwt' ),
			'60' => esc_html__( '60px', 'mwt' ),
		)
	),
	'vertical_margins'  => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Vertical margins', 'mwt' ),
		'value'   => 'c-mb-30',
		'desc'    => esc_html__( 'Select vertical margins between item', 'mwt' ),
		'choices' => array(
			'c-mb-0'  => esc_html__( '0', 'mwt' ),
			'c-mb-1'  => esc_html__( '1px', 'mwt' ),
			'c-mb-2'  => esc_html__( '2px', 'mwt' ),
			'c-mb-10' => esc_html__( '10px', 'mwt' ),
			'c-mb-30' => esc_html__( '30px', 'mwt' ),
			'c-mb-45' => esc_html__( '45px', 'mwt' ),
			'c-mb-50' => esc_html__( '50px', 'mwt' ),
			'c-mb-60' => esc_html__( '60px', 'mwt' ),
		),
	),
	'layout'        => array(
		'label'   => esc_html__( 'Layout', 'mwt' ),
		'desc'    => esc_html__( 'Choose layout', 'mwt' ),
		'value'   => 'carousel',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__( 'Carousel', 'mwt' ),
			'isotope'  => esc_html__( 'Masonry Grid', 'mwt' ),
		)
	),
	'layout_item' => array(
		'label'   => esc_html__('Choose layout content', 'mwt' ),
		'type'    => 'select', // or 'short-select'
		'value'   => '',
		'choices' => array(
			''  => esc_html__('Service Image', 'mwt' ),
			'2' => esc_html__('Service Icons', 'mwt' ),
			'3' => esc_html__('Service Icons 2', 'mwt' ),
		),
	),

	'responsive_lg' => array(
		'label'   => esc_html__( 'Columns on large screens', 'mwt' ),
		'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'mwt' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'mwt' ),
			'2' => esc_html__( '2', 'mwt' ),
			'3' => esc_html__( '3', 'mwt' ),
			'4' => esc_html__( '4', 'mwt' ),
			'6' => esc_html__( '6', 'mwt' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Columns on middle screens', 'mwt' ),
		'desc'    => esc_html__( 'Select items number on middle screens (>992px)', 'mwt' ),
		'value'   => '3',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'mwt' ),
			'2' => esc_html__( '2', 'mwt' ),
			'3' => esc_html__( '3', 'mwt' ),
			'4' => esc_html__( '4', 'mwt' ),
			'6' => esc_html__( '6', 'mwt' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Columns on small screens', 'mwt' ),
		'desc'    => esc_html__( 'Select items number on small screens (>768px)', 'mwt' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'mwt' ),
			'2' => esc_html__( '2', 'mwt' ),
			'3' => esc_html__( '3', 'mwt' ),
			'4' => esc_html__( '4', 'mwt' ),
			'6' => esc_html__( '6', 'mwt' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Columns on extra small screens', 'mwt' ),
		'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'mwt' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'mwt' ),
			'2' => esc_html__( '2', 'mwt' ),
			'3' => esc_html__( '3', 'mwt' ),
			'4' => esc_html__( '4', 'mwt' ),
			'6' => esc_html__( '6', 'mwt' ),
		)
	),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show filters', 'mwt' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'mwt' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'mwt' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'mwt' ),
		),
	),
	'loop'          => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Loop carousel', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),

	'dots'          => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show Dots', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'autoplay'      => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Autoplay', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'mwt'),
		'desc'  => esc_html__('You can select one or more categories', 'mwt'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 10,
		'limit' => 100,
	),
	'custom_class'   => array(
		'label' => esc_html__( 'Custom Class', 'psycheco' ),
		'type'  => 'text',
		'value' => ''
	),
);