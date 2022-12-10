<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'           => array(
				'type' => 'unique',
			),
			'builder'      => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'psycheco' ),
				'options' => array(
					'form' => array(
						'label'        => false,
						'type'         => 'form-builder',
						'value'        => array(
							'json' => apply_filters( 'fw:ext:forms:builder:load-item:form-header-title', true )
								? json_encode( array(
									array(
										'type'      => 'form-header-title',
										'shortcode' => 'form_header_title',
										'width'     => '',
										'options'   => array(
											'title'    => '',
											'subtitle' => '',
										)
									)
								) )
								: '[]'
						),
						'fixed_header' => true,
					),
				),
			),
			'settings'     => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'psycheco' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Contact Form Options', 'psycheco' ),
						'type'    => 'tab',
						'options' => array(
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'psycheco' ),
										'help'  => esc_html__( 'We recommend you to use an email that you verify often', 'psycheco' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'psycheco' ),
									),
								),
							),
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group'       => array(
										'type'    => 'group',
										'options' => array(
											'subject_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message', 'psycheco' ),
												'desc'  => esc_html__( 'This text will be used as subject message for the email', 'psycheco' ),
												'value' => esc_html__( 'Contact Form', 'psycheco' ),
											),
										)
									),
									'submit-button-group' => array(
										'type'    => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'psycheco' ),
												'desc'  => esc_html__( 'This text will appear in submit button', 'psycheco' ),
												'value' => esc_html__( 'Send', 'psycheco' ),
											),
											'reset_button_text'  => array(
												'type'  => 'text',
												'label' => esc_html__( 'Reset Button', 'psycheco' ),
												'desc'  => esc_html__( 'This text will appear in reset button. Leave blank if reset button not needed', 'psycheco' ),
												'value' => esc_html__( 'Clear', 'psycheco' ),
											),
										)
									),
									'success-group'       => array(
										'type'    => 'group',
										'options' => array(
											'success_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'psycheco' ),
												'desc'  => esc_html__( 'This text will be displayed when the form will successfully send', 'psycheco' ),
												'value' => esc_html__( 'Message sent!', 'psycheco' ),
											),
										)
									),
									'failure_message'     => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'psycheco' ),
										'desc'  => esc_html__( 'This text will be displayed when the form will fail to be sent', 'psycheco' ),
										'value' => esc_html__( 'Oops something went wrong.', 'psycheco' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer Options', 'psycheco' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					),
				),
			),
			'form_styling' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Styles', 'psycheco' ),
				'options' => array(
					'background_color'         => array(
						'type'    => 'select',
						'value'   => 'ls',
						'label'   => esc_html__( 'Form Background color', 'psycheco' ),
						'desc'    => esc_html__( 'Select background color', 'psycheco' ),
						'help'    => esc_html__( 'Select one of predefined background colors', 'psycheco' ),
						'choices' => array(
							''              => esc_html__( 'No background', 'psycheco' ),
							'p-40 muted-bg' => esc_html__( 'Muted', 'psycheco' ),
							'p-40 bordered' => esc_html__( 'With Border', 'psycheco' ),
							'p-40 ls'       => esc_html__( 'Light', 'psycheco' ),
							'p-40 ls ms'    => esc_html__( 'Light Grey', 'psycheco' ),
							'p-40 ds'       => esc_html__( 'Dark Grey', 'psycheco' ),
							'p-40 ds ms'    => esc_html__( 'Dark', 'psycheco' ),
							'p-40 cs'       => esc_html__( 'Main color', 'psycheco' ),
							'p-40 cs cs2'   => esc_html__( 'Second Main color', 'psycheco' ),
						),
					),
					'columns_padding'          => array(
						'type'    => 'select',
						'value'   => 'c-gutter-30',
						'label'   => esc_html__( 'Columns gutter', 'psycheco' ),
						'desc'    => esc_html__( 'Choose columns horizontal padding (gutter) value inside form', 'psycheco' ),
						'choices' => array(
							'c-gutter-30' => esc_html__( '30px - default', 'psycheco' ),
							'c-gutter-10' => esc_html__( '10px', 'psycheco' ),
							'c-gutter-15' => esc_html__( '15px', 'psycheco' ),
							'c-gutter-20' => esc_html__( '20px', 'psycheco' ),
							'c-gutter-40' => esc_html__( '40px', 'psycheco' ),
							'c-gutter-50' => esc_html__( '50px', 'psycheco' ),
							'c-gutter-60' => esc_html__( '60px', 'psycheco' ),
						),
					),
					'columns_margin_bottom'    => array(
						'type'    => 'select',
						'value'   => 'c-mb-15',
						'label'   => esc_html__( 'Columns bottom margins', 'psycheco' ),
						'desc'    => esc_html__( 'Choose columns bottom margin value inside form', 'psycheco' ),
						'choices' => array(
							'c-mb-15' => esc_html__( '15px - default', 'psycheco' ),
							'c-mb-5'  => esc_html__( '5px', 'psycheco' ),
							'c-mb-10' => esc_html__( '10px', 'psycheco' ),
							'c-mb-20' => esc_html__( '20px', 'psycheco' ),
							'c-mb-25' => esc_html__( '25px', 'psycheco' ),
							'c-mb-30' => esc_html__( '30px', 'psycheco' ),
						),
					),
					'submit_color'             => array(
						'label'   => esc_html__( 'Submit Button Color', 'psycheco' ),
						'desc'    => esc_html__( 'Choose a type for your button', 'psycheco' ),
						'value'   => 'btn btn-maincolor',
						'type'    => 'select',
						'choices' => array(
							'btn btn-maincolor'          => esc_html__( 'Main Color', 'psycheco' ),
							'btn btn-maincolor2'         => esc_html__( 'Main Color2 ', 'psycheco' ),
							'btn btn-maincolor3'         => esc_html__( 'Main Color3 ', 'psycheco' ),
							'btn btn-dark'               => esc_html__( 'Dark Color', 'psycheco' ),
							'btn btn-outline-maincolor'  => esc_html__( 'Outline Main Color', 'psycheco' ),
							'btn btn-outline-maincolor2' => esc_html__( 'Outline Main Color 2', 'psycheco' ),
							'btn btn-outline-maincolor3' => esc_html__( 'Outline Main Color 3', 'psycheco' ),
							'btn btn-outline-dark'       => esc_html__( 'Dark Outline Color', 'psycheco' ),
						)
					),
					'submit_size'        => array(
						'label'   => esc_html__( 'Submit Button Size', 'psycheco' ),
						'desc'    => esc_html__( 'Choose a size for your button', 'psycheco' ),
						'value'   => 'btn-medium',
						'type'    => 'select',
						'choices' => array(
							'btn-small'  => esc_html__( 'Button Small', 'psycheco' ),
							'btn-medium' => esc_html__( 'Button Medium', 'psycheco' ),
							'btn-big'    => esc_html__( 'Button Big', 'psycheco' ),
						)
					),
					'submit_button_position'   => array(
						'type'    => 'select',
						'value'   => 'text-center',
						'label'   => esc_html__( 'Submit Button Position', 'psycheco' ),
						'choices' => array(
							'text-center' => esc_html__( 'Center', 'psycheco' ),
							'text-left'   => esc_html__( 'Left', 'psycheco' ),
							'text-right'  => esc_html__( 'Right', 'psycheco' ),
						),
					),
					'submit_button_top_margin' => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Submit Button Vertical Margins', 'psycheco' ),
						'desc'    => esc_html__( 'Choose button vertical margins value', 'psycheco' ),
						'value'   => 'mt-lg-45',
						'choices' => array(
							''         => esc_html__( 'Top and bottom: 0 - default ', 'psycheco' ),
							'mt-lg-5'  => esc_html__( '5px', 'psycheco' ),
							'mt-lg-10' => esc_html__( '10px', 'psycheco' ),
							'mt-lg-15' => esc_html__( '15px', 'psycheco' ),
							'mt-lg-20' => esc_html__( '20px', 'psycheco' ),
							'mt-lg-30' => esc_html__( '30px', 'psycheco' ),
							'mt-lg-35' => esc_html__( '35px', 'psycheco' ),
							'mt-lg-40' => esc_html__( '40px', 'psycheco' ),
							'mt-lg-45' => esc_html__( '45px', 'psycheco' ),
							'mt-lg-50' => esc_html__( '50px', 'psycheco' ),
						),
					),
					'submit_wide_button' => array(
						'type'         => 'switch',
						'label'        => esc_html__( 'Submit Wide Button', 'psycheco' ),
						'desc'         => esc_html__( 'Switch to create wider button', 'psycheco' ),
						'value'       => '',
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__( 'No', 'psycheco' ),
						),
						'right-choice' => array(
							'value' => 'btn-wide',
							'label' => esc_html__( 'Yes', 'psycheco' ),
						),
					),
					'fields_size' => array(
						'type'         => 'switch',
						'label'        => esc_html__( 'Fields Big', 'psycheco' ),
						'left-choice'  => array(
							'value' => false,
							'label' => esc_html__( 'No', 'psycheco' ),
						),
						'right-choice' => array(
							'value' => 'input-big',
							'label' => esc_html__( 'Yes', 'psycheco' ),
						),
					),
					'fields_bg'                => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Fields Background color', 'psycheco' ),
						'choices' => array(
							'transparent-bg' => esc_html__( 'Transparent Background', 'psycheco' ),
							'white-bg'       => esc_html__( 'White Background', 'psycheco' ),
							'grey-bg'        => esc_html__( 'Light Grey Background', 'psycheco' ),
							'color-bg'       => esc_html__( 'Main Color Background', 'psycheco' ),
							'color2-bg'      => esc_html__( 'Second Color Background', 'psycheco' ),
						),
					),
					'fields_border'            => array(
						'type'    => 'select',
						'value'   => 'ls',
						'label'   => esc_html__( 'Fields Border color', 'psycheco' ),
						'choices' => array(
							'transparent-border' => esc_html__( 'Transparent Border', 'psycheco' ),
							'white-border'       => esc_html__( 'White Border', 'psycheco' ),
							'grey-border'        => esc_html__( 'Grey Border', 'psycheco' ),
							'color-border'       => esc_html__( 'Main Color Border', 'psycheco' ),
							'color2-border'      => esc_html__( 'Second Color Border', 'psycheco' ),
						),
					),
				
				),
			),
		),
	)
);