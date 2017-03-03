<?php
/**
 * Created by Nabeel
 * Date: 2016-01-22
 * Time: 2:38 AM
 *
 * @package Wordpress\Avada_Fusion_Builder_Add_On
 */

use Wordpress\Avada_Fusion_Builder_Add_On\Plugin;

if ( !function_exists( 'fusion_builder_banner_add_on' ) ):
	/**
	 * Get plugin instance
	 *
	 * @return Plugin
	 */
	function fusion_builder_banner_add_on()
	{
		return Plugin::get_instance();
	}
endif;

if ( !function_exists( 'AFBBA_view' ) ):
	/**
	 * Load view
	 *
	 * @param string  $view_name
	 * @param array   $args
	 * @param boolean $return
	 *
	 * @return void
	 */
	function AFBBA_view( $view_name, $args = null, $return = false )
	{
		if ( $return )
		{
			// start buffer
			ob_start();
		}

		fusion_builder_banner_add_on()->load_view( $view_name, $args );

		if ( $return )
		{
			// get buffer flush
			return ob_get_clean();
		}
	}
endif;

if ( !function_exists( 'AFBBA_version' ) ):
	/**
	 * Get plugin version
	 *
	 * @return string
	 */
	function AFBBA_version()
	{
		return fusion_builder_banner_add_on()->version;
	}
endif;