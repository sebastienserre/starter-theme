<?php
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5ef592ec1afa7',
		'title' => 'Menu',
		'fields' => array(
			array(
				'key' => 'field_5ef5930644777',
				'label' => 'Icone',
				'name' => 'footer_menu_icon',
				'type' => 'font-awesome',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'acfe_permissions' => '',
				'icon_sets' => array(
					0 => 'fas',
					1 => 'far',
					2 => 'fab',
				),
				'custom_icon_set' => '',
				'default_label' => '',
				'default_value' => '',
				'save_format' => 'element',
				'allow_null' => 1,
				'show_preview' => 1,
				'enqueue_fa' => 0,
				'fa_live_preview' => '',
				'choices' => array(
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'nav_menu_item',
					'operator' => '==',
					'value' => 'location/vertical',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'left',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

endif;