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

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_champs-suplementaires',
		'title' => 'Champs suplementaires',
		'fields' => array (
			array (
				'key' => 'field_5a9a956239d1f',
				'label' => 'Type de bien',
				'name' => 'type_de_bien',
				'type' => 'radio',
				'instructions' => 'Choisir le type de categorie pour debloquer des options suplementaires',
				'required' => 1,
				'choices' => array (
					'Location' => 'Location',
					'Vente' => 'Vente',
					'Autres' => 'Autres',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'Autres',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5a9aa96c523df',
				'label' => 'Surface',
				'name' => 'surface',
				'type' => 'number',
				'instructions' => 'Indiquez la surface habitable',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a9a956239d1f',
							'operator' => '==',
							'value' => 'Location',
						),
						array (
							'field' => 'field_5a9a956239d1f',
							'operator' => '==',
							'value' => 'Vente',
						),
					),
					'allorany' => 'any',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_5a9a989bd5fd6',
				'label' => 'Prix de vente',
				'name' => 'prix_de_vente',
				'type' => 'number',
				'instructions' => 'Indiquez le prix de vente',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a9a956239d1f',
							'operator' => '==',
							'value' => 'Vente',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'Prix :',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_5a9aa994523e1',
				'label' => 'GES',
				'name' => 'ges',
				'type' => 'select',
				'instructions' => 'émissions de Gaz à Effet de Serre',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a9a956239d1f',
							'operator' => '==',
							'value' => 'Vente',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'Classe A' => 'moins de 5 kgeqCO2/m2.an.',
					'Classe B' => '6 à 10 kgeqCO2/m2.an.',
					'Classe C' => '11 à 20 kgeqCO2/m2.an.',
					'Classe D' => '21 à 35 kgeqCO2/m2.an.',
					'Classe E' => '36 à 55 kgeqCO2/m2.an.',
					'Classe F' => '56 à 80 kgeqCO2/m2.an.',
					'Classe G' => 'plus de 80 kgeqCO2/m2.an.',
				),
				'default_value' => '',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5a9aaa5ef13d2',
				'label' => 'Classe Energetique',
				'name' => 'classe_energetique',
				'type' => 'select',
				'instructions' => 'La classe energetique du bien',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a9a956239d1f',
							'operator' => '==',
							'value' => 'Vente',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'Catégorie A: moins de 50 kWh/m². an' => 'Catégorie A: moins de 50 kWh/m². an',
					'Catégorie B: entre 51 et 90 kWh/m². an' => 'Catégorie B: entre 51 et 90 kWh/m². an',
					'Catégorie C: entre 91 et 150 kWh/m². an' => 'Catégorie C: entre 91 et 150 kWh/m². an',
					'Catégorie D: entre 151 et 230 kWh/m². an' => 'Catégorie D: entre 151 et 230 kWh/m². an',
					'Catégorie E: entre 231 et 330 kWh/m². an' => 'Catégorie E: entre 231 et 330 kWh/m². an',
					'Catégorie F: entre 331 et 450 kWh/m². an' => 'Catégorie F: entre 331 et 450 kWh/m². an',
					'Catégorie G: plus de 450 kWh/m². an' => 'Catégorie G: plus de 450 kWh/m². an',
				),
				'default_value' => '',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5a9aaaf7d90bb',
				'label' => 'Nombre de pieces',
				'name' => 'nombre_de_pieces',
				'type' => 'number',
				'instructions' => 'Le nombre de pieces du bien',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a9a956239d1f',
							'operator' => '==',
							'value' => 'Vente',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_5a9aab16d90bc',
				'label' => 'Type de bien',
				'name' => 'type_de_bien',
				'type' => 'radio',
				'instructions' => 'Specifiez le type de bien',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a9a956239d1f',
							'operator' => '==',
							'value' => 'Vente',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'Maison' => 'Maison',
					'Appartement' => 'Appartement',
					'Chalet' => 'Chalet',
					'Autres' => 'Autres',
				),
				'other_choice' => 1,
				'save_other_choice' => 1,
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5a9a9830059b4',
				'label' => 'Prix par semaine',
				'name' => 'prix_par_semaine',
				'type' => 'number',
				'instructions' => 'Indiquez le prix par semaine',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a9a956239d1f',
							'operator' => '==',
							'value' => 'Location',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_5a9aab7076ba5',
				'label' => 'Nombre de personnes',
				'name' => 'nombre_de_personnes',
				'type' => 'number',
				'instructions' => 'Indiquez le nombre de personnes',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a9a956239d1f',
							'operator' => '==',
							'value' => 'Location',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_5a9aab8c76ba6',
				'label' => 'Icones',
				'name' => 'icones',
				'type' => 'checkbox',
				'instructions' => 'Indiquez les accomodations du bien en location',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a9a956239d1f',
							'operator' => '==',
							'value' => 'Location',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'Wifi' => 'Wifi',
					'PMR' => 'Acces PMR',
					'Animaux' => 'Animaux Admis',
					'Television' => 'Television',
					'Parking' => 'Parking',
					'Restaurant' => 'Restaurant à proximité',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5a9b0c063e311',
				'label' => 'Vendu',
				'name' => 'vendu',
				'type' => 'true_false',
				'instructions' => 'Es que le bien a été vendu',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a9a956239d1f',
							'operator' => '==',
							'value' => 'Vente',
						),
					),
					'allorany' => 'all',
				),
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

//Hide the ACF Menu, not needed by client. We just use the functionality.
function remove_acf_menu() {
	remove_menu_page('edit.php?post_type=acf');
}
//add_action( 'admin_menu', 'remove_acf_menu', 999);;
