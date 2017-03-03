<?php namespace Wordpress\Avada_Fusion_Builder_Add_On;

/**
 * Frontend logic
 *
 * @package Wordpress\Avada_Fusion_Builder_Add_On
 */
class Frontend extends Component
{
	/**
	 * Constructor
	 *
	 * @return void
	 */
	protected function init()
	{
		parent::init();

		add_action( 'wp_loaded', [ &$this, 'load' ] );

		add_action( 'wp_enqueue_scripts', [ &$this, 'load_scripts' ] );

	}

	/**
	 * Load.
	 *
	 * @return void
	 */
	public function load()
	{
		add_shortcode( 'afbba_banner', [ &$this, 'banner_view' ] );

		add_shortcode( 'afbba_links_item', [ &$this, 'bar_links_view' ] );
	}

	/**
	 * Load banner view.
	 *
	 * @param $attr array
	 * @param $content string
	 *
	 * @return mixed
	 */
	public function banner_view( $attr, $content )
	{
		$item_cont = do_shortcode( $content );

		wp_enqueue_style( 'afbba-banner-style' );
		wp_enqueue_style( 'afbba_open_sans' );

		if ( !isset( $attr ) || !is_array( $attr ) )
		{
			$attr = [];
		}

		//validating image link.
		if ( isset( $attr[ 'afbba_image' ] ) )
		{
			if ( !filter_var( $attr[ 'afbba_image' ], FILTER_VALIDATE_URL ) )
			{
				$attr[ 'afbba_image' ] = null;
			}
		}

		// validate button link.
		if ( isset( $attr[ 'afbba_button_link' ] ) )
		{
			if ( !filter_var( $attr[ 'afbba_button_link' ], FILTER_VALIDATE_URL ) )
			{
				$attr[ 'afbba_button_link' ] = null;
			}
		}

		// sanitize color.
		if ( isset( $attr[ 'afbba_links_bar_color' ] ) )
		{
			$attr[ 'afbba_links_bar_color' ] = Helpers::sanitize_hex_color( $attr[ 'afbba_links_bar_color' ] );
		}

		// sanitize color.
		if ( isset( $attr [ 'afbba_button_color' ] ) )
		{
			$attr[ 'afbba_button_color' ] = Helpers::sanitize_hex_color( $attr[ 'afbba_button_color' ] );
		}
		// sanitize color.
		if ( isset( $attr [ 'afbba_button_hover_color' ] ) )
		{
			$attr[ 'afbba_button_hover_color' ] = Helpers::sanitize_hex_color( $attr[ 'afbba_button_hover_color' ] );
		}

		foreach ( $attr as $key => $value )
		{
			// check for links.
			if ( $key == 'afbba_button_link'
			     || $key == 'afbba_image'
			     || $key == 'afbba_links_bar_color'
			     || $key == 'afbba_button_color'
			)
			{
				continue;
			}

			// sanitize text for each input.
			$attr[ $key ] = sanitize_text_field( $value );
		}

		// setting default values.
		if ( !isset( $attr[ 'afbba_title' ] ) )
		{
			$attr[ 'afbba_title' ] = 'Title';
		}

		if ( !isset( $attr[ 'afbba_button_text' ] ) )
		{
			$attr[ 'afbba_button_text' ] = 'Apply Now';
		}

		return AFBBA_view( 'banner', [ 'attr' => $attr, 'item_cont' => $item_cont ], true );
	}

	/**
	 * load links bar view.
	 *
	 * @param $attr array
	 *
	 * @param $content string
	 *
	 * @return mixed
	 */
	public function bar_links_view( $attr, $content )
	{
		// validating link label.
		if ( !isset( $content ) || empty( $content ) )
		{
			$content = __( 'Link', AFBBA_DOMAIN );
		}

		// validating link.
		if ( !isset( $attr[ 'afbba_link_item_link' ] )
		     || empty( $attr[ 'afbba_link_item_link' ] )
		     || !Helpers::is_valid_url( $attr[ 'afbba_link_item_link' ] )
		)
		{
			$attr[ 'afbba_link_item_link' ] = '';
		}

		return AFBBA_view( 'links-item', [ 'attr' => $attr, 'content' => $content ], true );
	}

	/**
	 * Load scripts and styles
	 *
	 * @return void
	 */
	public function load_scripts()
	{
		$load_path = AFBBA_URI . ( Helpers::is_script_debugging() ? 'assets/src/' : 'assets/dist/' );

		// register banner style
		wp_register_style( 'afbba-banner-style', $load_path . 'css/banner.css', [], AFBBA_version() );

		// register font open sans
		wp_register_style( 'afbba_open_sans', 'https://fonts.googleapis.com/css?family=PT+Sans%3A400%7CLora%3A400%7COpen+Sans%3A400%2C600%7CAntic+Slab%3A400&#038;subset=latin' );
	}
}
