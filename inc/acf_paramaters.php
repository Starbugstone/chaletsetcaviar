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

  	register_field_group(array (
  		'id' => 'acf_options-des-categories',
  		'title' => 'Options des categories',
  		'fields' => array (
  			array (
  				'key' => 'field_5a99357eed63f',
  				'label' => 'Image d\'entete',
  				'name' => 'image_dentete',
  				'type' => 'image',
  				'instructions' => 'Choisir l\'image pour l\'entete de la page.',
  				'required' => 1,
  				'save_format' => 'url',
  				'preview_size' => 'full',
  				'library' => 'all',
  			),
  		),
  		'location' => array (
  			array (
  				array (
  					'param' => 'ef_taxonomy',
  					'operator' => '==',
  					'value' => 'category',
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


//Hide the ACF Menu, not needed by client. We just use the functionality.
function remove_acf_menu() {
	remove_menu_page('edit.php?post_type=acf');
}
//add_action( 'admin_menu', 'remove_acf_menu', 999);;
