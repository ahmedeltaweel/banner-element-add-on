<?php namespace Wordpress\Avada_Fusion_Builder_Add_On;

/**
 * Backend logic
 *
 * @package Wordpress\Avada_Fusion_Builder_Add_On
 */
class Backend extends Component
{
	/**
	 * Constructor
	 *
	 * @return void
	 */
	protected function init()
	{
		parent::init();

		add_action( 'fusion_builder_before_init', [ &$this, 'map_banner_addon_with_fb' ], 100 );
	}

	/**
	 * Map banner add on to fucsion builder.
	 *
	 * @return void
	 */
	public function map_banner_addon_with_fb()
	{
		// parent element (banner)
		fusion_builder_map(
			[
				'name' => esc_attr__( 'Banner', AFBBA_DOMAIN ),
				'shortcode' => 'afbba_banner',
				'icon' => 'fa fa-picture-o',
				'multi' => 'multi_element_parent',
				'element_child' => 'afbba_links_item',
				'allow_generator' => true,
				'params' => [
					[
						'type' => 'tinymce',
						'heading' => esc_attr__( 'Content', AFBBA_DOMAIN ),
						'description' => esc_attr__( 'Enter some content for this item.', AFBBA_DOMAIN ),
						'param_name' => 'element_content',
						'value' => '[afbba_links_item afbba_title=""]Your Content Goes Here[/afbba_links_item]',
					],
					[
						'heading' => __( 'Background', AFBBA_DOMAIN ),
						'description' => __( 'Upload the image you would like to use as background.', AFBBA_DOMAIN ),
						'value' => '',
						'type' => 'upload',
						'param_name' => 'afbba_image',
					],
					[
						'heading' => __( 'Pre Title', AFBBA_DOMAIN ),
						'description' => __( 'Pre title will be displayed only if set.', AFBBA_DOMAIN ),
						'value' => '',
						'type' => 'textfield',
						'param_name' => 'afbba_pre_title',
					],
					[
						'heading' => __( 'Title', AFBBA_DOMAIN ),
						'value' => 'Title',
						'description' => __( 'Title will be displayed with default value of "Title" is not set.', AFBBA_DOMAIN ),
						'type' => 'textfield',
						'param_name' => 'afbba_title',
					],
					[
						'heading' => __( 'Sub Title', AFBBA_DOMAIN ),
						'description' => __( 'Sub title will be displayed only if set.', AFBBA_DOMAIN ),
						'value' => '',
						'type' => 'textfield',
						'param_name' => 'afbba_sub_title',
					],
					[
						'heading' => __( 'Button Link', AFBBA_DOMAIN ),
						'description' => __( 'Button will be displayed only if link set correctly (ex: http://example.com) .', AFBBA_DOMAIN ),
						'value' => '',
						'type' => 'textfield',
						'param_name' => 'afbba_button_link',
					],
					[
						'heading' => __( 'Button Text', AFBBA_DOMAIN ),
						'value' => 'Button',
						'description' => __( 'Button Text will be displayed with default value "Button" if not set.', AFBBA_DOMAIN ),
						'type' => 'textfield',
						'param_name' => 'afbba_button_text',
					],
					[
						'heading' => __( 'Button Color ', AFBBA_DOMAIN ),
						'value' => '#b46357',
						'description' => __( 'Button color will be displayed with default color "Red" if not set.', AFBBA_DOMAIN ),
						'type' => 'colorpicker',
						'param_name' => 'afbba_button_color',
					],
					[
						'heading' => __( 'Button Hover Color ', AFBBA_DOMAIN ),
						'value' => '#9c4c40',
						'description' => __( 'Button hover color will be displayed with default color "Red" if not set.', AFBBA_DOMAIN ),
						'type' => 'colorpicker',
						'param_name' => 'afbba_button_hover_color',
					],
					[
						'heading' => __( 'Links Bar Color ', AFBBA_DOMAIN ),
						'value' => '#19262d',
						'description' => __( 'Bottom links bar color will be displayed with default color "Turquoise" if not set.', AFBBA_DOMAIN ),
						'type' => 'colorpicker',
						'param_name' => 'afbba_links_bar_color',
					],
				],
			]
		);


		// child element ( links ).
		fusion_builder_map(
			[
				'name' => esc_attr__( 'Link Item', AFBBA_DOMAIN ),
				'description' => esc_attr__( 'Enter Links and labels.', AFBBA_DOMAIN ),
				'shortcode' => 'afbba_links_item',
				'hide_from_builder' => true,
				'params' => [
					[
						'type' => 'textfield',
						'heading' => esc_attr__( 'Link Item Label', AFBBA_DOMAIN ),
						'description' => esc_attr__( 'Add Link item label.', AFBBA_DOMAIN ),
						'param_name' => 'element_content',
						'value' => 'Your Content Goes Here',
						'placeholder' => true,
					],
					[
						'type' => 'textfield',
						'heading' => esc_attr__( 'Link Item Link', AFBBA_DOMAIN ),
						'description' => esc_attr__( 'Add Link item Link, ex: http://example.com', AFBBA_DOMAIN ),
						'param_name' => 'afbba_link_item_link',
						'value' => '',
					]
				],
			]
		);


	}
}
