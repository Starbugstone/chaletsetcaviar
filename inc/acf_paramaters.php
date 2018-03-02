<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_extenstion-des-articles',
		'title' => 'Extenstion des articles',
		'fields' => array (
			array (
				'key' => 'field_5a9918cc6319e',
				'label' => 'Coup de coeur',
				'name' => 'coup_de_coeur',
				'type' => 'true_false',
				'instructions' => 'Ajouter un coup de coeur sur l\'article',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5a992118c37a9',
				'label' => 'Vendu',
				'name' => 'vendu',
				'type' => 'true_false',
				'instructions' => 'Es que le bien etait vendu',
				'message' => '',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
