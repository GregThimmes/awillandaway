<?php
if ( ! defined( 'FW' ) &&  !function_exists('_uws_fw_extensions_locations') ) {
	return;
}

$options = array(
	'unique_id' => array(
		'type' => 'unique'
	),
	'type'      => array(
		'label'   => esc_html__( 'Type', 'psycheco' ),
		'desc'    => esc_html__( 'Select the type', 'psycheco' ),
		'type'    => 'short-select',
		'value'   => 'default',
		'choices' => array(
			'default'      => 'Default',
			'on_sale'      => 'On Sale',
			'best_selling' => 'Best Selling',
			'top_rated'    => 'Top Rated',
			'featured_products'    => 'Featured',
		)
	),
	'limit'     => array(
		'label' => esc_html__( 'Limit', 'psycheco' ),
		'desc'  => esc_html__( 'Enter the limit', 'psycheco' ),
		'type'  => 'short-text',
		'value' => '12',
	),
    'layout' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'layout_type' => array(
                'type' => 'select',
                'value' => 'default',
                'label' => esc_html__('Products Layout', 'psycheco'),
                'choices' => array(
                    'default' => esc_html__('Grid (default)', 'psycheco'),
                    'carousel-layout' => esc_html__('Carousel', 'psycheco'),
                    'cat-default' => esc_html__('Categories Grid', 'psycheco'),
                    'cat-layout' => esc_html__('Carousel Of Categories', 'psycheco'),
                ),
            ),
        ),
        'choices' => array(
            'default' => array(
                'columns'   => array(
                    'label'   => esc_html__( 'Columns', 'psycheco' ),
                    'desc'    => esc_html__( 'Enter the columns', 'psycheco' ),
                    'type'    => 'short-select',
                    'value'   => '4',
                    'choices' => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                    )
                ),
            ),
            'cat-default' => array(
                'cat-columns'   => array(
                    'label'   => esc_html__( 'Columns', 'psycheco' ),
                    'desc'    => esc_html__( 'Enter the columns', 'psycheco' ),
                    'type'    => 'short-select',
                    'value'   => '4',
                    'choices' => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                    )
                ),
            ),
            'carousel-layout' => array(
                'nav'           => array(
                    'type'         => 'switch',
                    'value'        => '',
                    'label'        => esc_html__( 'Show Navigation', 'psycheco' ),
                    'right-choice'  => array(
                        'value' => 'navigation',
                        'label' => esc_html__( 'Yes', 'psycheco' ),
                    ),
                    'left-choice' => array(
                        'value' => '',
                        'label' => esc_html__( 'No', 'psycheco' ),
                    ),
                ),
                'center'        => array(
                    'type'         => 'switch',
                    'value'        => 'false',
                    'label'        => esc_html__( 'Center carousel', 'psycheco' ),
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
                'responsive_lg' => array(
                    'label'   => esc_html__( 'Columns on large screens', 'psycheco' ),
                    'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'psycheco' ),
                    'value'   => '4',
                    'type'    => 'select',
                    'choices' => array(
                        '1' => esc_html__( '1', 'psycheco' ),
                        '2' => esc_html__( '2', 'psycheco' ),
                        '3' => esc_html__( '3', 'psycheco' ),
                        '4' => esc_html__( '4', 'psycheco' ),
                        '5' => esc_html__( '5', 'psycheco' ),
                    )
                ),
                'responsive_md' => array(
                    'label'   => esc_html__( 'Columns on middle screens', 'psycheco' ),
                    'desc'    => esc_html__( 'Select items number on middle screens (>992px)', 'psycheco' ),
                    'value'   => '3',
                    'type'    => 'select',
                    'choices' => array(
                        '1' => esc_html__( '1', 'psycheco' ),
                        '2' => esc_html__( '2', 'psycheco' ),
                        '3' => esc_html__( '3', 'psycheco' ),
                        '4' => esc_html__( '4', 'psycheco' ),
                        '5' => esc_html__( '5', 'psycheco' ),
                    )
                ),
                'responsive_sm' => array(
                    'label'   => esc_html__( 'Columns on small screens', 'psycheco' ),
                    'desc'    => esc_html__( 'Select items number on small screens (>768px)', 'psycheco' ),
                    'value'   => '2',
                    'type'    => 'select',
                    'choices' => array(
                        '1' => esc_html__( '1', 'psycheco' ),
                        '2' => esc_html__( '2', 'psycheco' ),
                        '3' => esc_html__( '3', 'psycheco' ),
                        '4' => esc_html__( '4', 'psycheco' ),
                        '5' => esc_html__( '5', 'psycheco' ),
                    )
                ),
                'responsive_xs' => array(
                    'label'   => esc_html__( 'Columns on extra small screens', 'psycheco' ),
                    'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'psycheco' ),
                    'value'   => '1',
                    'type'    => 'select',
                    'choices' => array(
                        '1' => esc_html__( '1', 'psycheco' ),
                        '2' => esc_html__( '2', 'psycheco' ),
                        '3' => esc_html__( '3', 'psycheco' ),
                        '4' => esc_html__( '4', 'psycheco' ),
                        '5' => esc_html__( '5', 'psycheco' ),
                    )
                ),
                'show_filters' => array(
                    'type' => 'switch',
                    'label' => esc_html__('Show Filters', 'psycheco'),
                ),
            ),
            'cat-layout' => array(
                'nav'           => array(
                    'type'         => 'switch',
                    'value'        => '',
                    'label'        => esc_html__( 'Show Navigation', 'psycheco' ),
                    'right-choice'  => array(
                        'value' => 'navigation',
                        'label' => esc_html__( 'Yes', 'psycheco' ),
                    ),
                    'left-choice' => array(
                        'value' => '',
                        'label' => esc_html__( 'No', 'psycheco' ),
                    ),
                ),
                'center'        => array(
                    'type'         => 'switch',
                    'value'        => 'false',
                    'label'        => esc_html__( 'Center carousel', 'psycheco' ),
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
                'responsive_lg' => array(
                    'label'   => esc_html__( 'Columns on large screens', 'psycheco' ),
                    'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'psycheco' ),
                    'value'   => '4',
                    'type'    => 'select',
                    'choices' => array(
                        '1' => esc_html__( '1', 'psycheco' ),
                        '2' => esc_html__( '2', 'psycheco' ),
                        '3' => esc_html__( '3', 'psycheco' ),
                        '4' => esc_html__( '4', 'psycheco' ),
                        '5' => esc_html__( '5', 'psycheco' ),
                    )
                ),
                'responsive_md' => array(
                    'label'   => esc_html__( 'Columns on middle screens', 'psycheco' ),
                    'desc'    => esc_html__( 'Select items number on middle screens (>992px)', 'psycheco' ),
                    'value'   => '3',
                    'type'    => 'select',
                    'choices' => array(
                        '1' => esc_html__( '1', 'psycheco' ),
                        '2' => esc_html__( '2', 'psycheco' ),
                        '3' => esc_html__( '3', 'psycheco' ),
                        '4' => esc_html__( '4', 'psycheco' ),
                        '5' => esc_html__( '5', 'psycheco' ),
                    )
                ),
                'responsive_sm' => array(
                    'label'   => esc_html__( 'Columns on small screens', 'psycheco' ),
                    'desc'    => esc_html__( 'Select items number on small screens (>768px)', 'psycheco' ),
                    'value'   => '2',
                    'type'    => 'select',
                    'choices' => array(
                        '1' => esc_html__( '1', 'psycheco' ),
                        '2' => esc_html__( '2', 'psycheco' ),
                        '3' => esc_html__( '3', 'psycheco' ),
                        '4' => esc_html__( '4', 'psycheco' ),
                        '5' => esc_html__( '5', 'psycheco' ),
                    )
                ),
                'responsive_xs' => array(
                    'label'   => esc_html__( 'Columns on extra small screens', 'psycheco' ),
                    'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'psycheco' ),
                    'value'   => '1',
                    'type'    => 'select',
                    'choices' => array(
                        '1' => esc_html__( '1', 'psycheco' ),
                        '2' => esc_html__( '2', 'psycheco' ),
                        '3' => esc_html__( '3', 'psycheco' ),
                        '4' => esc_html__( '4', 'psycheco' ),
                        '5' => esc_html__( '5', 'psycheco' ),
                    )
                ),
                'margin'        => array(
                    'type'        => 'select',
                    'value'       => '30',
                    'label'       => esc_html__( 'Margin between items', 'psycheco' ),
                    'choices'     => array(
                        '30' => '30px',
                        '0'  => '0px',
                        '5'  => '5px',
                        '10' => '10px',
                        '15' => '15px',
                        '40' => '40px',
                        '50' => '50px',
                        '60' => '60px',
                    ),
                    'no-validate' => false,
                ),
            ),
        ),
    ),

    'category' => array(
        'label' => esc_html__('Categories', 'psycheco'),
        'desc' => esc_html__('Select the categories', 'psycheco'),
        'type' => 'multi-select',
        'value' => '',
        'population' => 'taxonomy',
        'source' => 'product_cat',
    ),
	'orderby'   => array(
		'label'   => esc_html__( 'Order by', 'psycheco' ),
		'desc'    => esc_html__( 'Select the order by', 'psycheco' ),
		'type'    => 'short-select',
		'value'   => 'title',
		'choices' => array(
			'title'      => esc_html__( 'Title', 'psycheco' ),
			'date'       => esc_html__( 'Date', 'psycheco' ),
			'id'         => esc_html__( 'Id', 'psycheco' ),
			'menu_order' => esc_html__( 'Menu Order', 'psycheco' ),
			'popularity' => esc_html__( 'Popularity', 'psycheco' ),
			'rand'       => esc_html__( 'Randomly', 'psycheco' ),
			'rating'     => esc_html__( 'Rating', 'psycheco' ),
		)
	),
	'order'     => array(
		'label'   => esc_html__( 'Order', 'psycheco' ),
		'desc'    => esc_html__( 'Select the order type', 'psycheco' ),
		'type'    => 'short-select',
		'value'   => 'title',
		'choices' => array(
			'ASC'  => esc_html__( 'ASC', 'psycheco' ),
			'DESC' => esc_html__( 'DESC', 'psycheco' ),
		)
	),
	'class'     => array(
		'label' => esc_html__( 'Custom Class', 'psycheco' ),
		'desc'  => esc_html__( 'Enter custom CSS class', 'psycheco' ),
		'type'  => 'text',
		'value' => '',
	),
);