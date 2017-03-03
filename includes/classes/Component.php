<?php namespace Wordpress\Avada_Fusion_Builder_Add_On;

/**
 * Base Component
 *
 * @package Wordpress\Avada_Fusion_Builder_Add_On
 */
class Component extends Singular
{
	/**
	 * Plugin Main Component
	 *
	 * @var Plugin
	 */
	protected $plugin;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	protected function init()
	{
		// vars
		$this->plugin = Plugin::get_instance();
	}
}
