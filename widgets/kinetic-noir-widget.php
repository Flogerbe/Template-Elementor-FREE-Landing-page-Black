<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Kinetic_Noir_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'kinetic_noir_layout';
	}

	public function get_title() {
		return esc_html__( 'Kinetic Noir Full Page', 'kinetic-noir' );
	}

	public function get_icon() {
		return 'eicon-layout-1';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
        // --- NAV BAR SECTION ---
		$this->start_controls_section(
			'section_nav',
			[
				'label' => esc_html__( 'Navigation Bar', 'kinetic-noir' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'nav_logo',
			[
				'label' => esc_html__( 'Text Logo', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'AGENCE SEO',
			]
		);
		$this->add_control(
			'nav_btn_text',
			[
				'label' => esc_html__( 'Action Button', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'DEMANDER UN DEVIS',
			]
		);
		$nav_repeater = new \Elementor\Repeater();
		$nav_repeater->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Text', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'PROGRAMS',
			]
		);
		$nav_repeater->add_control(
			'link_url',
			[
				'label' => esc_html__( 'URL', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '#' ],
			]
		);
		$this->add_control(
			'nav_links_list',
			[
				'label' => esc_html__( 'Navigation Links', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $nav_repeater->get_controls(),
				'default' => [
					[ 'link_text' => 'EXPERTISES', 'link_url' => [ 'url' => '#expertises' ] ],
					[ 'link_text' => 'L\'ÉQUIPE', 'link_url' => [ 'url' => '#equipe' ] ],
					[ 'link_text' => 'TÉMOIGNAGES', 'link_url' => [ 'url' => '#temoignages' ] ],
					[ 'link_text' => 'CONTACTEZ-NOUS', 'link_url' => [ 'url' => '#contact' ] ],
				],
				'title_field' => '{{{ link_text }}}',
			]
		);
		$this->end_controls_section();

		// --- HERO SECTION ---
		$this->start_controls_section(
			'section_hero',
			[
				'label' => esc_html__( 'Hero Section', 'kinetic-noir' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'hero_image',
			[
				'label' => esc_html__( 'Image de fond Hero', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Choisir une photo de fond pour le Hero', 'kinetic-noir' ),
				'default' => [],
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'hero_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'VOTRE PARTENAIRE SEO STRATÉGIQUE',
			]
		);

		$this->add_control(
			'hero_title',
			[
				'label' => esc_html__( 'Title', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'DOMINEZ LES MOTEURS<br>DE <span class="text-[#9cff93]">RECHERCHE.</span>',
			]
		);

		$this->add_control(
			'hero_description',
			[
				'label' => esc_html__( 'Description', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Une approche brutale et mathématique de votre visibilité web. Nous propulsons votre marque en première page de Google avec des stratégies de référencement chirurgicales.', 'kinetic-noir' ),
			]
		);
		$this->add_control(
			'hero_btn1_text',
			[
				'label' => esc_html__( 'Primary Button Text', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'DÉMARRER LE PROJET',
			]
		);
		$this->add_control(
			'hero_btn1_url',
			[
				'label' => esc_html__( 'Primary Button URL', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '#contact' ],
			]
		);
		$this->add_control(
			'hero_btn2_text',
			[
				'label' => esc_html__( 'Secondary Button Text', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'NOS EXPERTISES',
			]
		);
		$this->add_control(
			'hero_btn2_url',
			[
				'label' => esc_html__( 'Secondary Button URL', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '#expertises' ],
			]
		);
		$this->end_controls_section();

		// --- CURRICULUM SECTION ---
		$this->start_controls_section(
			'section_curriculum',
			[
				'label' => esc_html__( 'Curriculum Modules', 'kinetic-noir' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'module_icon',
			[
				'label' => esc_html__( 'Icon (Google Material Icons)', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'brand_awareness',
			]
		);
		$repeater->add_control(
			'module_title',
			[
				'label' => esc_html__( 'Title', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Brand Strategy',
			]
		);
		$repeater->add_control(
			'module_desc',
			[
				'label' => esc_html__( 'Description', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Architecting brand identities that cut through the noise of the modern digital landscape.',
			]
		);

		$this->add_control(
			'modules_list',
			[
				'label' => esc_html__( 'Modules List', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'module_icon' => 'search', 'module_title' => 'AUDIT TECHNIQUE', 'module_desc' => 'Analyse en profondeur de la structure de votre site web pour éliminer tous les freins algorithmiques.' ],
					[ 'module_icon' => 'edit_document', 'module_title' => 'STRATÉGIE SÉMANTIQUE', 'module_desc' => 'Création de cocons sémantiques puissants pour vous imposer comme l\'autorité incontournable de votre marché.' ],
					[ 'module_icon' => 'link', 'module_title' => 'NETLINKING PREMIUM', 'module_desc' => 'Acquisition de backlinks de haute autorité pour booster votre indice de confiance aux yeux de Google.' ],
				],
				'title_field' => '{{{ module_title }}}',
			]
		);
		$this->end_controls_section();

		// --- TRAINERS SECTION ---
		$this->start_controls_section(
			'section_trainers',
			[
				'label' => esc_html__( 'Trainers', 'kinetic-noir' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$trainer_repeater = new \Elementor\Repeater();
		$trainer_repeater->add_control(
			'trainer_image',
			[
				'label' => esc_html__( 'Image', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$trainer_repeater->add_control(
			'trainer_name',
			[
				'label' => esc_html__( 'Name', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'MARCUS VANCE',
			]
		);
		$trainer_repeater->add_control(
			'trainer_role',
			[
				'label' => esc_html__( 'Role', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'HEAD OF DESIGN',
			]
		);

		$this->add_control(
			'trainers_list',
			[
				'label' => esc_html__( 'Trainers List', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $trainer_repeater->get_controls(),
				'default' => [
					[ 'trainer_name' => 'MARCUS VANCE', 'trainer_role' => 'HEAD OF DESIGN', 'trainer_image' => ['url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCI7NIXh7ococgpZwHi9PcXFLYhdPwTcUZyCMQxqotpFXSW1iAeXsZt4x6w0sAVKTSKlin7HqupQ7z8InSlr2WoJ-Gub0BZGHOHBODcicBHWEke0ZO-LmD_JNI__gWyA0CcF1dY2ZHe7FWjHuxeAYoUbehCYxYcwG6rtY-UrBBZB5UuXB2TyQMGcsX7jSuqcQof4zQEAiMWAQXJUAWj9F4NyYR9eIXiZvciFE2twYTGUBBXF5ifLw9jQM7sV_63lcKfItG01KHbJiY'] ],
					[ 'trainer_name' => 'SARAH CHEN', 'trainer_role' => 'STRATEGY LEAD', 'trainer_image' => ['url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDWwiuvHRQ9n0yE50wgNLD133wKLIifc0EpeqD4W71LbyihGmSDBQLBNwKKhHci0emWj1NGA13ModVKBflIYtY0ckPtriwl129bl9QN_viGn1MMfXR2r5vNowwUaFmyNqBEnKCRARecl-6qW5EolfmsF0I4KJyhOSe8fwDpb24iDq54cMT6hOo7DCUn2pm4daJOWWJcQ-a9CmL-1ZZ5MkyAtrpREzb8Pud9jK9co0wKWGS_up4cevV5CsWO0TJAnicn6uq1KFAAzwI'] ],
					[ 'trainer_name' => 'ELIAS THORNE', 'trainer_role' => 'CTO / ARCHITECT', 'trainer_image' => ['url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC7XGCWNfxYrJkysHwwr5wl3o1oWww_EzkVedwflVOcWqy-wAkSIwpnqjxdnp3-2Br3km550OMOq4y88FYH5s7SXy-alYFffUNGRyseMk9KAIavli5zmkZvzbRgh0A7QdLpkXySt14S3ccDl5H19xydENI_Xq5dLPUN9em6zsGbHWnhurhtlnbb2itn45kw2l1OxOsLPiYcB0zUGsazxWPfdprx5QE6coBdqJKXzStQnF3BMNvilnRksVfhKdyBmJ24EpNuag2Unc8'] ],
					[ 'trainer_name' => 'JUNO REYES', 'trainer_role' => 'ART DIRECTOR', 'trainer_image' => ['url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB1Ckh4tBjavTf5EJkPT_Zxf_fPDIWamDxfqNeKojWsLbEwyojX522-ztfRE000rfy-zswPFSGhxrU0LEYdGr4ZgOHL3HnjMmLEEsfsuD338uKmGFY234jfula4-mn4tf7sBSVVdCklR4TnoYK8OIJq0D8_uSd4Nwaho8kGw3laLRlyJzByDZc7TFCi-9t_jljA666yAZMbI-PdSCCj4IekldiKHtJMHO-1kBCt7jmed3gkqeReL0536spaqaYDv44w_YnMM_JPYPM'] ],
				],
				'title_field' => '{{{ trainer_name }}}',
			]
		);
		$this->end_controls_section();

        // --- TESTIMONIAL & CTA ---
		$this->start_controls_section(
			'section_cta',
			[
				'label' => esc_html__( 'Testimonial & CTA', 'kinetic-noir' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'testimonial_text',
			[
				'label' => esc_html__( 'Testimonial', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '"DEPUIS NOTRE COLLABORATION, NOTRE TRAFIC ORGANIQUE A ÉTÉ MULTIPLIÉ PAR 4 EN SEULEMENT SIX MOIS. DES RÉSULTATS <span class="text-primary">EXCEPTIONNELS</span>."',
			]
		);
		$this->add_control(
			'testimonial_initials',
			[
				'label' => esc_html__( 'Author Initials', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'JD',
			]
		);
		$this->add_control(
			'testimonial_author',
			[
				'label' => esc_html__( 'Author Name', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Jean Dubois',
			]
		);
		$this->add_control(
			'testimonial_role',
			[
				'label' => esc_html__( 'Author Role', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'CEO @ E-COMMERCE PRO',
			]
		);
		$this->add_control(
			'cta_title',
			[
				'label' => esc_html__( 'CTA Title', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'PRÊT À PRENDRE LA PREMIÈRE PLACE ?',
			]
		);
		$this->add_control(
			'cta_btn_text',
			[
				'label' => esc_html__( 'CTA Button Text', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'CONTACTEZ-NOUS',
			]
		);
		$this->add_control(
			'cta_btn_url',
			[
				'label' => esc_html__( 'CTA Button URL', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '#contact' ],
			]
		);
		$this->end_controls_section();

		// --- FOOTER SECTION ---
		$this->start_controls_section(
			'section_footer',
			[
				'label' => esc_html__( 'Footer', 'kinetic-noir' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$footer_repeater = new \Elementor\Repeater();
		$footer_repeater->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Text', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'PRIVACY POLICY',
			]
		);
		$footer_repeater->add_control(
			'link_url',
			[
				'label' => esc_html__( 'URL', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '#' ],
			]
		);
		$this->add_control(
			'footer_links_list',
			[
				'label' => esc_html__( 'Footer Links', 'kinetic-noir' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $footer_repeater->get_controls(),
				'default' => [
					[ 'link_text' => 'MENTIONS LÉGALES', 'link_url' => ['url' => '#'] ],
					[ 'link_text' => 'POLITIQUE DE CONFIDENTIALITÉ', 'link_url' => ['url' => '#'] ],
				],
				'title_field' => '{{{ link_text }}}',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        
        $get_url = function($setting_path) {
            if (isset($setting_path) && is_array($setting_path) && isset($setting_path['url'])) {
                return $setting_path['url'];
            }
            return "#";
        };

		?>
		<style>
			/* ===== KINETIC NOIR — GLOBAL FORCE COLORS ===== */
			/* Force toutes les couleurs de texte indépendamment du reset Tailwind */
			.kn-widget-container,
			.kn-widget-container * {
				box-sizing: border-box;
			}
			.kn-widget-container h1,
			.kn-widget-container h2,
			.kn-widget-container h3,
			.kn-widget-container h4,
			.kn-widget-container h5,
			.kn-widget-container h6 {
				color: #ffffff !important;
				font-family: 'Space Grotesk', sans-serif !important;
			}
			.kn-widget-container p,
			.kn-widget-container span:not(.material-symbols-outlined),
			.kn-widget-container li,
			.kn-widget-container a {
				color: inherit;
			}
			.kn-widget-container {
				color: #ffffff;
				background-color: #0e0e0e;
			}
			/* Sections sombres : texte blanc par défaut */
			.kn-widget-container section {
				color: #ffffff;
			}
			/* Textes secondaires (gris) */
			.kn-text-muted { color: #ababab !important; }
			/* Section CTA verte : texte vert foncé */
			.kn-widget-container .kn-cta-section,
			.kn-widget-container .kn-cta-section h2,
			.kn-widget-container .kn-cta-section p {
				color: #006413 !important;
			}
			/* Nav */
			.kn-widget-container nav a { color: #ffffff !important; }
			.kn-widget-container nav a:hover { color: #9cff93 !important; }
			/* Badges verts */
			.kn-text-green { color: #9cff93 !important; }
			/* Glass card */
			.kn-widget-container .glass-card {
				background: rgba(0, 0, 0, 0.85) !important;
				backdrop-filter: blur(24px);
				border: 1px solid rgba(255,255,255,0.1);
			}
			.kn-widget-container .glass-card h4 { color: #ffffff !important; }
			.kn-widget-container .glass-card p { color: #9cff93 !important; }
			/* Hero overlay */
			.kn-widget-container .hero-bg-overlay {
				background: linear-gradient(to bottom, rgba(14,14,14,0.3) 0%, rgba(14,14,14,0.95) 100%);
			}
			/* Material icons */
			.kn-widget-container .material-symbols-outlined {
				font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
				color: #9cff93 !important;
			}
			/* Font headline */
			.kn-widget-container .font-headline { font-family: 'Space Grotesk', sans-serif; }
			/* Full bleed container */
			.kn-widget-container {
				width: 100vw !important;
				position: relative !important;
				left: 50% !important;
				right: 50% !important;
				margin-left: -50vw !important;
				margin-right: -50vw !important;
				max-width: 100vw !important;
			}
			body, html { margin: 0 !important; padding: 0 !important; overflow-x: hidden; }
		</style>
		<script>
			if ( typeof tailwind !== 'undefined' && tailwind.config ) {
				tailwind.config = {
					darkMode: 'class',
					theme: { extend: { colors: { 'primary': '#9cff93', 'on-primary': '#006413', 'primary-dim': '#00ec3b' }, fontFamily: { 'headline': ['Space Grotesk'], 'body': ['Inter'] } } }
				};
			}
		</script>
		<div class="kn-widget-container w-full" style="background-color: #0e0e0e; color: #ffffff; font-family: 'Inter', sans-serif;">
			
			<div class="dark w-full selection:bg-[#9cff93] selection:text-[#006413]">
                <nav class="fixed top-0 w-full z-50 bg-neutral-950/70 backdrop-blur-xl shadow-[0_0_60px_rgba(156,255,147,0.05)]">
                    <div class="flex justify-between items-center px-6 md:px-12 py-6 max-w-[1920px] mx-auto">
                        <div class="text-2xl font-black text-white tracking-tighter uppercase font-headline"><?php echo esc_html((isset($settings['nav_logo']) && !is_array($settings['nav_logo'])) ? $settings['nav_logo'] : 'AGENCE SEO'); ?></div>
                        <div class="hidden md:flex gap-12 items-center">
                            <?php if ( ! empty( $settings['nav_links_list'] ) && is_array( $settings['nav_links_list'] ) ) : ?>
                                <?php foreach ( $settings['nav_links_list'] as $nav_link ) : ?>
                                    <a class="font-['Space_Grotesk'] uppercase tracking-[0.1em] font-bold text-white hover:text-[#9cff93] transition-colors duration-300" href="<?php echo esc_url( (isset($nav_link['link_url']) && is_array($nav_link['link_url']) && isset($nav_link['link_url']['url'])) ? $nav_link['link_url']['url'] : "#" ); ?>"><?php echo esc_html( $nav_link['link_text'] ?? '' ); ?></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <button class="bg-[#9cff93] text-[#006413] px-6 py-3 font-headline font-bold text-sm tracking-widest uppercase hover:bg-[#00ec3b] transition-all scale-95 active:duration-100">
                            <?php echo esc_html((isset($settings['nav_btn_text']) && !is_array($settings['nav_btn_text'])) ? $settings['nav_btn_text'] : 'DEMANDER UN DEVIS'); ?>
                        </button>
                    </div>
                </nav>

                <main class="w-full">
                    <?php
                    $hero_img_url = '';
                    if ( ! empty( $settings['hero_image'] ) && is_array( $settings['hero_image'] ) && ! empty( $settings['hero_image']['url'] ) ) {
                        $hero_img_url = $settings['hero_image']['url'];
                    }
                    $hero_style = $hero_img_url ? 'background: linear-gradient(to bottom, rgba(14,14,14,0.3) 0%, rgba(14,14,14,0.95) 100%), url(' . esc_url($hero_img_url) . ') center/cover no-repeat;' : 'background-color: #0e0e0e;';
                    ?>
                    <section class="relative min-h-[1024px] pt-40 pb-24 md:pt-64 md:pb-40 px-6 md:px-12 overflow-hidden flex flex-col justify-center" style="<?php echo esc_attr($hero_style); ?>">
                        <div style="position:absolute;top:0;right:0;width:66%;height:100%;background:rgba(156,255,147,0.05);filter:blur(100px);z-index:1;pointer-events:none;"></div>
                        <div class="max-w-[1400px] mx-auto w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-end">
                            <div class="lg:col-span-8">
                                <span class="font-headline text-[#9cff93] tracking-[0.3em] font-bold uppercase mb-6 block"><?php echo esc_html( (isset($settings['hero_subtitle']) && !is_array($settings['hero_subtitle'])) ? $settings['hero_subtitle'] : "" ); ?></span>
                                <h1 class="text-6xl md:text-[10rem] font-black leading-[0.85] tracking-tighter font-headline mb-12">
                                    <?php echo wp_kses_post( (isset($settings['hero_title']) && !is_array($settings['hero_title'])) ? $settings['hero_title'] : "" ); ?>
                                </h1>
                            </div>
                            <div class="lg:col-span-4 glass-card p-10 border-l-4 border-[#9cff93]">
                                <p class="text-[#ababab] text-lg mb-8 leading-relaxed">
                                    <?php echo esc_html( (isset($settings['hero_description']) && !is_array($settings['hero_description'])) ? $settings['hero_description'] : "" ); ?>
                                </p>
                                <div class="flex flex-col gap-4">
                                    <a href="<?php echo esc_url($get_url($settings['hero_btn1_url'] ?? null)); ?>" class="w-full bg-[#9cff93] block text-center text-[#006413] py-5 font-headline font-bold tracking-widest uppercase hover:bg-[#00ec3b] transition-all">
                                        <?php echo esc_html( (isset($settings['hero_btn1_text']) && !is_array($settings['hero_btn1_text'])) ? $settings['hero_btn1_text'] : "" ); ?>
                                    </a>
                                    <a href="<?php echo esc_url($get_url($settings['hero_btn2_url'] ?? null)); ?>" class="w-full border block text-center border-white/20 text-white py-5 font-headline font-bold tracking-widest uppercase hover:bg-white/5 transition-all">
                                        <?php echo esc_html( (isset($settings['hero_btn2_text']) && !is_array($settings['hero_btn2_text'])) ? $settings['hero_btn2_text'] : "" ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="expertises" class="py-32 px-6 md:px-12 bg-[#131313]">
                        <div class="max-w-[1400px] mx-auto">
                            <div class="flex flex-col md:flex-row justify-between items-end mb-24 gap-8">
                                <div class="max-w-2xl">
                                    <h2 class="text-4xl md:text-6xl font-headline font-black tracking-tighter mb-6 uppercase text-white">NOS EXPERTISES</h2>
                                    <div class="h-1 w-24 bg-[#9cff93] mb-6"></div>
                                    <p class="text-[#ababab] text-xl">Des stratégies SEO sur-mesure pour propulser votre activité en première page de Google et devancer vos concurrents.</p>
                                </div>
                                <div class="text-[#9cff93] font-headline text-8xl font-black opacity-10 leading-none hidden md:block">SEO</div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0">
                                <?php if ( ! empty( $settings['modules_list'] ) && is_array( $settings['modules_list'] ) ) : ?>
                                    <?php foreach ( $settings['modules_list'] as $item ) : ?>
                                        <div class="group p-12 bg-[#0e0e0e] hover:bg-[#1a1a1a] transition-all border-b md:border-b-0 md:border-r border-[#484848]/30 flex flex-col justify-between aspect-square">
                                            <span class="material-symbols-outlined text-[#9cff93] text-5xl" data-icon="<?php echo esc_attr($item['module_icon'] ?? ''); ?>"><?php echo esc_html($item['module_icon'] ?? ''); ?></span>
                                            <div>
                                                <h3 class="text-2xl font-headline font-bold mb-4 uppercase text-white"><?php echo esc_html($item['module_title'] ?? ''); ?></h3>
                                                <p class="text-[#ababab] mb-8 text-sm leading-relaxed"><?php echo esc_html($item['module_desc'] ?? ''); ?></p>
                                                <a class="text-[#9cff93] font-headline font-bold tracking-widest text-sm flex items-center gap-2 group-hover:translate-x-2 transition-transform" href="#contact">
                                                    EN SAVOIR PLUS <span class="material-symbols-outlined text-sm" data-icon="arrow_forward">arrow_forward</span>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>

                    <section id="equipe" class="py-32 px-6 md:px-12 bg-[#0e0e0e]">
                        <div class="max-w-[1400px] mx-auto">
                            <div class="mb-24">
                                <h2 class="text-4xl md:text-6xl font-headline font-black tracking-tighter uppercase text-white">L'ÉQUIPE</h2>
                                <div class="h-1 w-24 bg-[#9cff93] mt-6"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                                <?php if ( ! empty( $settings['trainers_list'] ) && is_array( $settings['trainers_list'] ) ) : ?>
                                    <?php foreach ( $settings['trainers_list'] as $trainer ) : ?>
                                        <div class="group relative overflow-hidden aspect-[3/4]">
                                            <img alt="<?php echo esc_attr( $trainer['trainer_name'] ?? "" ); ?>" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" src="<?php echo esc_attr( (isset($trainer['trainer_image']) && is_array($trainer['trainer_image']) && isset($trainer['trainer_image']['url'])) ? $trainer['trainer_image']['url'] : "" ); ?>" />
                                            <div class="absolute bottom-0 left-0 w-full p-8 glass-card">
                                                <h4 class="font-headline font-bold text-xl uppercase text-white shadow-sm"><?php echo esc_html($trainer['trainer_name'] ?? ''); ?></h4>
                                                <p class="text-[#9cff93] font-headline text-xs tracking-widest uppercase font-bold"><?php echo esc_html($trainer['trainer_role'] ?? ''); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>

                    <section id="temoignages" class="py-32 px-6 md:px-12 bg-[#1f1f1f] relative">
                        <div class="max-w-[1400px] mx-auto text-center">
                            <p class="text-[#9cff93] font-headline font-bold tracking-[0.3em] text-sm uppercase mb-8">CE QUE DISENT NOS CLIENTS</p>
                            <span class="material-symbols-outlined text-[#9cff93] text-6xl mb-8" data-icon="format_quote">format_quote</span>
                            <blockquote class="text-2xl md:text-5xl font-headline font-black leading-tight tracking-tighter max-w-5xl mx-auto mb-12 text-white">
                                <?php echo wp_kses_post( (isset($settings['testimonial_text']) && !is_array($settings['testimonial_text'])) ? $settings['testimonial_text'] : "" ); ?>
                            </blockquote>
                            <div class="flex items-center justify-center gap-4">
                                <div class="w-12 h-12 bg-[#9cff93] rounded-full flex items-center justify-center text-[#006413] font-headline font-bold"><?php echo esc_html( (isset($settings['testimonial_initials']) && !is_array($settings['testimonial_initials'])) ? $settings['testimonial_initials'] : "" ); ?></div>
                                <div class="text-left">
                                    <p class="font-headline font-bold uppercase text-white"><?php echo esc_html( (isset($settings['testimonial_author']) && !is_array($settings['testimonial_author'])) ? $settings['testimonial_author'] : "" ); ?></p>
                                    <p class="text-[#ababab] text-xs tracking-widest uppercase"><?php echo esc_html( (isset($settings['testimonial_role']) && !is_array($settings['testimonial_role'])) ? $settings['testimonial_role'] : "" ); ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="contact" class="kn-cta-section py-32 px-6 md:px-12 bg-[#9cff93] text-center">
                        <div class="max-w-[1400px] mx-auto">
                            <h2 class="text-6xl md:text-9xl font-headline font-black tracking-tighter mb-12 uppercase leading-none">
                                <?php echo wp_kses_post( (isset($settings['cta_title']) && !is_array($settings['cta_title'])) ? $settings['cta_title'] : "" ); ?>
                            </h2>
                            <a href="<?php echo esc_url($get_url($settings['cta_btn_url'] ?? null)); ?>" class="bg-black inline-block text-white px-16 py-8 font-headline font-black text-2xl tracking-widest uppercase hover:bg-neutral-900 transition-all scale-95 active:scale-90">
                                <?php echo esc_html( (isset($settings['cta_btn_text']) && !is_array($settings['cta_btn_text'])) ? $settings['cta_btn_text'] : "" ); ?>
                            </a>
                            <p class="mt-8 font-headline font-bold tracking-[0.2em] text-sm uppercase opacity-60">LA RÉVOLUTION COMMENCE MAINTENANT</p>
                        </div>
                    </section>
                </main>

                <footer class="w-full block py-20 px-6 md:px-12 bg-[#171717] m-0 border-0" style="margin:0; padding-bottom: 5rem;">
                    <div class="flex flex-col md:flex-row justify-between items-end w-full max-w-[1920px] mx-auto">
                        <div class="mb-12 md:mb-0">
                            <div class="text-lg font-black text-white uppercase font-headline mb-4"><?php echo esc_html($settings['nav_logo'] ?? 'AGENCE SEO'); ?></div>
                            <div class="flex gap-8 mb-8">
                                <?php if ( ! empty( $settings['footer_links_list'] ) && is_array( $settings['footer_links_list'] ) ) : ?>
                                    <?php foreach ( $settings['footer_links_list'] as $footer_link ) : ?>
                                        <a class="font-['Space_Grotesk'] text-xs tracking-widest text-[#a3a3a3] hover:text-[#9cff93] transition-all" href="<?php echo esc_url( (isset($footer_link['link_url']) && is_array($footer_link['link_url']) && isset($footer_link['link_url']['url'])) ? $footer_link['link_url']['url'] : "#" ); ?>"><?php echo esc_html( $footer_link['link_text'] ?? '' ); ?></a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <p class="font-['Space_Grotesk'] text-xs tracking-widest text-neutral-500">©2024 AGENCE SEO. TOUS DROITS RÉSERVÉS.</p>
                        </div>
                    </div>
                </footer>
            </div>
		</div>
		<?php
	}

    protected function _content_template() {
        ?>
        <div class="kn-widget-container w-full" style="background-color: #0e0e0e; color: #ffffff; font-family: 'Inter', sans-serif;">
            <style>
                .kn-widget-container .font-headline { font-family: 'Space Grotesk', sans-serif; }
                .kn-widget-container .glass-card { background: rgba(0, 0, 0, 0.85); backdrop-filter: blur(24px); border: 1px solid rgba(255,255,255,0.1); }
                .kn-widget-container .hero-bg-overlay { background: linear-gradient(to bottom, rgba(14,14,14,0.4) 0%, rgba(14,14,14,1) 100%); }
            </style>
            
            <div class="dark w-full selection:bg-[#9cff93] selection:text-[#006413]">
                <nav class="fixed top-0 w-full z-50 bg-neutral-950/70 backdrop-blur-xl">
                    <div class="flex justify-between items-center px-6 md:px-12 py-6 max-w-[1920px] mx-auto">
                        <div class="text-2xl font-black text-white uppercase font-headline">{{ settings.nav_logo }}</div>
                        <div class="hidden md:flex gap-12 items-center">
                            <# _.each( settings.nav_links_list, function( item ) { #>
                                <span class="font-['Space_Grotesk'] uppercase tracking-[0.1em] font-bold text-white hover:text-[#9cff93]">{{{ item.link_text }}}</span>
                            <# }); #>
                        </div>
                        <button class="bg-[#9cff93] text-[#006413] px-6 py-3 font-headline font-bold text-sm tracking-widest uppercase">
                            {{ settings.nav_btn_text }}
                        </button>
                    </div>
                </nav>

                <main class="w-full">
                    <# 
                    var heroStyle = 'background-color: #0e0e0e;';
                    if ( settings.hero_image.url ) {
                        heroStyle = 'background: linear-gradient(to bottom, rgba(14,14,14,0.3) 0%, rgba(14,14,14,0.95) 100%), url(' + settings.hero_image.url + ') center/cover no-repeat;';
                    }
                    #>
                    <section class="relative min-h-[900px] pt-40 pb-24 px-6 overflow-hidden flex flex-col justify-center" style="{{ heroStyle }}">
                        <div style="position:absolute;top:0;right:0;width:66%;height:100%;background:rgba(156,255,147,0.05);filter:blur(100px);z-index:1;pointer-events:none;"></div>
                        <div class="max-w-[1400px] mx-auto w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-end">
                            <div class="lg:col-span-8">
                                <span class="font-headline text-[#9cff93] tracking-[0.3em] font-bold uppercase mb-6 block">{{ settings.hero_subtitle }}</span>
                                <h1 class="text-6xl md:text-[8rem] font-black leading-[0.85] tracking-tighter font-headline mb-12">
                                    {{{ settings.hero_title }}}
                                </h1>
                            </div>
                            <div class="lg:col-span-4 glass-card p-10 border-l-4 border-[#9cff93]">
                                <p class="text-[#ababab] text-lg mb-8 leading-relaxed">
                                    {{ settings.hero_description }}
                                </p>
                                <div class="flex flex-col gap-4">
                                    <div class="w-full bg-[#9cff93] text-center text-[#006413] py-5 font-headline font-bold uppercase">{{ settings.hero_btn1_text }}</div>
                                    <div class="w-full border text-center border-white/20 text-white py-5 font-headline font-bold uppercase">{{ settings.hero_btn2_text }}</div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="py-32 px-6 bg-[#131313]">
                        <div class="max-w-[1400px] mx-auto">
                            <h2 class="text-4xl md:text-6xl font-headline font-black tracking-tighter mb-6 uppercase">NOS EXPERTISES</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
                                <# _.each( settings.modules_list, function( item ) { #>
                                    <div class="p-12 bg-[#0e0e0e] border border-[#484848]/30 flex flex-col aspect-square">
                                        <# if ( item.module_icon ) { #>
                                        <span class="material-symbols-outlined text-[#9cff93] text-5xl mb-6">{{ item.module_icon }}</span>
                                        <# } #>
                                        <h3 class="text-2xl font-headline font-bold mb-4 uppercase">{{{ item.module_title }}}</h3>
                                        <p class="text-[#ababab]">{{ item.module_desc }}</p>
                                    </div>
                                <# }); #>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
        <?php
    }
}
