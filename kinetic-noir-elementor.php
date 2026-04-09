<?php
/**
 * Plugin Name: Kinetic Noir Elementor Template
 * Description: Fournit le widget complet pour la maquette Kinetic Noir dans Elementor.
 * Plugin URI:  https://elementor.com/
 * Version:     1.1.0
 * Author:      Geo Agency Candidate
 * Author URI:  https://elementor.com/
 * Text Domain: kinetic-noir
 */

if (!defined('ABSPATH')) {
	exit;
}

final class Kinetic_Noir_Elementor_Extension
{

	const VERSION = '1.1.0';
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
	const MINIMUM_PHP_VERSION = '7.3';

	private static $_instance = null;

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct()
	{
		add_action('plugins_loaded', [$this, 'init']);
	}

	public function init()
	{
		if (!did_action('elementor/loaded')) {
			add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
			return;
		}

		add_action('elementor/widgets/register', [$this, 'register_widgets']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_assets']);
		add_action('elementor/preview/enqueue_scripts', [$this, 'enqueue_frontend_assets']);
		add_action('elementor/editor/before_enqueue_scripts', [$this, 'enqueue_frontend_assets']);
	}

	public function enqueue_frontend_assets()
	{
		// Google Fonts
		wp_enqueue_style(
			'kinetic-noir-fonts',
			'https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Space+Grotesk:wght@300;400;700;900&display=swap',
			[],
			null
		);
		wp_enqueue_style(
			'kinetic-noir-material-icons',
			'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
			[],
			null
		);

		// Tailwind via CDN — charger AVANT la page
		wp_enqueue_script(
			'tailwindcss',
			'https://cdn.tailwindcss.com',
			[],
			null,
			false // Dans le HEAD, pas en footer
		);
	}

	public function register_widgets($widgets_manager)
	{
		require_once(__DIR__ . '/widgets/kinetic-noir-widget.php');
		$widgets_manager->register(new \Kinetic_Noir_Widget());
	}

	public function admin_notice_missing_main_plugin()
	{
		if (isset($_GET['activate']))
			unset($_GET['activate']);
		$message = sprintf(
			esc_html__('"%1$s" nécessite que "%2$s" soit installé et activé.', 'kinetic-noir'),
			'<strong>' . esc_html__('Kinetic Noir Elementor Template', 'kinetic-noir') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'kinetic-noir') . '</strong>'
		);
		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}
}

Kinetic_Noir_Elementor_Extension::instance();
