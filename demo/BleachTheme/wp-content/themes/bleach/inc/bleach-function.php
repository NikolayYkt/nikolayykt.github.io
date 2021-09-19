<?php

class trueSliderPage{
   
	public $page_slug;
	public $option_group;

	function __construct(){

		$this->page_slug = 'true_slider';
		$this->option_group = 'true_slider_setting';

		add_action('admin_menu', array($this,'add') );
		add_action('admin_init', array($this,'settings') );
		add_action('admin_notices', array($this,'notices') );
	}

	function add(){

	add_menu_page(
	   'Настройки слайдер',
	   'Слайдер',
	   'manage_options',
	   $this->page_slug,
	   array($this,'display'),
	   'dashicons-images-alt',
	   20
	);


	}

	function display(){
	  ?>
	  <div class="wrap">
	  	<h1><?php echo get_admin_page_title();?></h1>
	  	<form method="post" action="options.php"><?php

	  	settings_fields($this->option_group);
	  	do_settings_sections($this->page_slug);
	  	submit_button();
	  	?></form></div><?php
	}

function settings(){

	// регистрируем опцию
	register_setting(
		$this->option_group, // название настроек из предыдущего шага
		'number_of_slider_slides', // ярлык опции
		'absint' // функция очистки
	);
 
	// добавляем секцию без заголовка
	add_settings_section(
		'slider_settings_section_id', // ID секции, пригодится ниже
		'', // заголовок (не обязательно)
		'', // функция для вывода HTML секции (необязательно)
		$this->page_slug // ярлык страницы
	);
 
	// добавление поля
	add_settings_field(
		'number_of_slider_slides',
		'Количество слайдов в слайдере',
		array($this,'field'), // название функции для вывода
		$this->page_slug, // ярлык страницы
		'slider_settings_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'number_of_slider_slides',
			'name' => 'number_of_slider_slides', // любые доп параметры в колбэк функцию
		)
	);
}


function field($args){
   
$value = get_option( $args[ 'name' ] );
 
	printf(
		'<input type="number" min="1" id="%s" name="%s" value="%d" />',
		esc_attr( $args[ 'name' ] ),
		esc_attr( $args[ 'name' ] ),
		absint( $value )
	);
}

function notices(){
		if(
		isset( $_GET[ 'page' ] )
		&& $this->page_slug == $_GET[ 'page' ]
		&& isset( $_GET[ 'settings-updated' ] )
		&& true == $_GET[ 'settings-updated' ]
	) {
		echo '<div class="notice notice-success is-dismissible"><p>Слайдер сохранён!</p></div>';
	}
}


}

new trueSliderPage();