<?php

class SAW_HelloWorld extends ET_Builder_Module {

	public $slug       = 'saw_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://friday-next.com',
		'author'     => 'Friday Next',
		'author_uri' => 'https://friday-next.com',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'saw-fn-saw' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'saw-fn-saw' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'saw-fn-saw' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new SAW_HelloWorld;
