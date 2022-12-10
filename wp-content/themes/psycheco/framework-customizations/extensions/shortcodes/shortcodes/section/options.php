<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$main_options = psycheco_get_section_options_array();
$main_options['overflow_visible'] = array(
	'type'  => 'switch',
	'value' => false,
	'label' => esc_html__('Overflow visible', 'psycheco'),
	'desc'  => esc_html__('Show content that do not fit in section', 'psycheco'),
	'left-choice' => array(
		'value' => false,
		'label' => esc_html__('No', 'psycheco'),
	),
	'right-choice' => array(
		'value' => true,
		'label' => esc_html__('Yes', 'psycheco'),
	)
);
//adding section name for builder backend view
$main_options['section_name'] = array(
	'type'  => 'text',
	'value' => '',
	'label' => esc_html__('Optional section name', 'psycheco'),
);

$options = array(
	'unique_id' => array(
		'type' => 'unique',
		'length' => 7
	),
	'tab_main_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Main Options', 'psycheco'),
		'options' => $main_options,
	),
	'tab_padding_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Section Padding', 'psycheco'),
		'options' => psycheco_unyson_option_get_section_padding_array(),
	),
	'tab_onehalf_media_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Side Media', 'psycheco'),
		'options' => array(
			'side_media_image' => array(
				'type'  => 'upload',
				'value' => array(),
				'label' => esc_html__('Side media image', 'psycheco'),
				'desc'  => esc_html__('Select image that you want to appear as one half side image', 'psycheco'),
				'images_only' => true,
			),
			'side_media_link' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Link to your side media', 'psycheco'),
				'desc'  => esc_html__('You can add a link to your side media. If YouTube link will be provided, video will play in LightBox', 'psycheco'),
			),
			'side_media_video' => array(
				'type'    => 'oembed',
				'value'   => '',
				'label'   => esc_html__( 'Video', 'psycheco' ),
				'desc'    => esc_html__( 'Adds video player. Works only when side media image is set', 'psycheco' ),
				'help'    => esc_html__( 'Leave blank if no needed', 'psycheco' ),
				'preview' => array(
					'width'      => 278, // optional, if you want to set the fixed width to iframe
					'height'     => 185, // optional, if you want to set the fixed height to iframe
					/**
					 * if is set to false it will force to fit the dimensions,
					 * because some widgets return iframe with aspect ratio and ignore applied dimensions
					 */
					'keep_ratio' => true
				),
			),
			'side_media_position'  => array(
				'type'  => 'switch',
				'value' => 'left',
				'label' => esc_html__('Media position', 'psycheco'),
				'desc'  => esc_html__('Left or right media position', 'psycheco'),
				'left-choice' => array(
					'value' => 'left',
					'label' => esc_html__('Left', 'psycheco'),
				),
				'right-choice' => array(
					'value' => 'right',
					'label' => esc_html__('Right', 'psycheco'),
				),
			),
		),
	),
	'tab_responsive' => array(
		'type' => 'tab',
		'title' => esc_html__('Responsive', 'psycheco'),
		'options' => array(
			'responsive_visibility' => array(
				'type' => 'tab',
				'title' => esc_html__('Visibility', 'psycheco'),
				'options' => psycheco_unyson_option_responsive_options_array(),
			),
		),
	),
	'tab_background_extended' => array(
		'type' => 'tab',
		'title' => esc_html__('Background Video', 'psycheco'),
		'options' => array(
			'background_video' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'type' => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Background Type', 'psycheco' ),
						'desc'    => esc_html__( 'Here you can choose section background type', 'psycheco' ),
						'value'   => '',
						'choices' => array(
							'' => esc_html__( 'None', 'psycheco' ),
							'video_oembed'    => esc_html__( 'Video OEmbed', 'psycheco' ),
							'video_upload'    => esc_html__( 'Video Upload', 'psycheco' ),
						)
					)
				),
				'choices' => array(
					'video_oembed'    => array(
						'video' => array(
							'desc'  => esc_html__( 'Insert your video URL', 'psycheco' ),
							'type'  => 'text',
						),
						'poster' => array(
							'label'   => esc_html__( 'Replacement Image', 'psycheco' ),
							'type'    => 'background-image',
							'help'    => esc_html__('This image will replace the video on mobile devices that disable background videos', 'psycheco'),
						),
						'loop_video'      => array(
							'label'        => esc_html__( 'Loop Video', 'psycheco' ),
							'desc'         => esc_html__( 'Enable loop video?', 'psycheco' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'psycheco' )
							),
							'left-choice'  => array(
								'value' => 'no',
								'label' => esc_html__( 'No', 'psycheco' )
							),
							'value'        => 'yes',
						),
					),
					'video_upload' => array(
						'video'  => array(
							'desc'        => esc_html__( 'Upload a video', 'psycheco' ),
							'images_only' => false,
							'type'        => 'upload',
						),
						'poster' => array(
							'label'   => esc_html__( 'Replacement Image', 'psycheco' ),
							'type'    => 'background-image',
							'help'    => esc_html__('This image will replace the video on mobile devices that disable background videos', 'psycheco'),
						),
						'loop_video'      => array(
							'label'        => esc_html__( 'Loop Video', 'psycheco' ),
							'desc'         => esc_html__( 'Enable loop video?', 'psycheco' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'psycheco' )
							),
							'left-choice'  => array(
								'value' => 'no',
								'label' => esc_html__( 'No', 'psycheco' )
							),
							'value'        => 'yes',
						),
					),
				)
			),
		),

	),
);
