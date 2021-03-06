<?php
/**
 * Name file:   takeawaypage
 *
 * Description: This file used to manage the display
 *               all sections of the takeawaypage
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */

/**
 * --- INDEX ---
 *
 * 1 - DEFINIR LES ELEMENTS (repeter)
 * 2 - DEFINIR LES HOOKS ACTIONS
 * 3 - CONSTRUCTION DE LA PAGE
 * 4 - TEMPLATE DES PAGES
 * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
 * 6 - DEFINIR LES SECTIONS DE LA PAGE
 * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
 * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
 * 9 - AJOUT STYLE & SCRIPT
 */

class pekinparis_takeawaypage{
    /**
     * 1 - DEFINIR LES ELEMENTS (repeter)
     *     afin d'evite les fautes de frappe
     */
    // page info - level 2
    const SUB3_TITLE   = 'Page emportés';
    const SUB3_MENU    = 'Page emportés';
    const PERMITION    = 'manage_options';
    const SUB3_GROUP   = 'custom_takeawaypage';
    const NONCE        = '_custom_takeawaypage';

    // definir les section
    const SECTION_HERO    = 'section_hero_takeawaypage';
	const SECTION_TITLE    = 'section_title_takeawaypage';
	const SECTION_RESERVATION = 'section_booking_takeawaypage';

    /**
     * 2 - DEFINIR LES HOOKS ACTIONS
     */
    public static function register(){
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
        //add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
    }

    /**
     * 3 - CONSTRUCTION DE LA PAGE
     */
    public static function addMenu(){
        add_submenu_page(
            pekinparis_customtheme::GROUP,        // slug parent
            self::SUB3_TITLE,                    // page_title
            self::SUB3_MENU,                     // menu_title
            self::PERMITION,                     // capability
            self::SUB3_GROUP,                    // slug_menu
            [self::class, 'render']              // CALLBACK
        );
    }

    /**
     * 4 - TEMPLATE DES PAGES
     */
    public static function render(){
        ?>
        <div class="wrap">
            <h1 class="wp-heagin-inline">
                Gestion de la page des emportés
            </h1>
            <p class="description">
                Sur cette page vous pouvez gérer l'affichage général de la page des emportés
            </p>
        </div>

        <form class="form-customtheme" action="options.php" method="post" enctype="multipart/form-data">
            <?php
                wp_nonce_field(self::NONCE, self::NONCE);
                settings_fields(self::SUB3_GROUP);
                do_settings_sections(self::SUB3_GROUP);
            ?>
            <?php submit_button(); ?>
        </form>
        <?php
    }

    /**
     * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
     */
    public static function registerSettings(){
	    /**
	     * SECTION 1 : SECTION_HERO ==================================
	     *             -> Créer la section
	     *             -> Ajouter les éléments du formulaire
	     *             -> Sauvegarder les champs
	     *
	     */

	    // -> créer la section
	    add_settings_section(
		    self::SECTION_HERO,                      // SLUG_SECTION
		    'Section bannière',                       // TITLE
		    [self::class, 'display_section_hero'],   // CALLBACK
		    self::SUB3_GROUP                         // SLUG_PAGE
	    );

	    // -> Ajouter les éléments du formulaire
	    add_settings_field(
		    'takeawaypage_image_hero',                  // SLUG_FIELD
		    'Image d\'arrière plan',                // LABEL
		    [self::class,'field_image_hero'],       // CALLBACK
		    self::SUB3_GROUP,                       // SLUG_PAGE
		    self::SECTION_HERO                      // SLUG_SECTION
	    );
	    add_settings_field(
		    'takeawaypage_element_hero',                // SLUG_FIELD
		    'Ce qui doit être présent',             // LABEL
		    [self::class,'field_element_hero'],     // CALLBACK
		    self::SUB3_GROUP,                       // SLUG_PAGE
		    self::SECTION_HERO                      // SLUG_SECTION
	    );
	    add_settings_field(
		    'takeawaypage_message_hero',                // SLUG_FIELD
		    'Gestion d\'un message',                // LABEL
		    [self::class,'field_message_hero'],     // CALLBACK
		    self::SUB3_GROUP,                       // SLUG_PAGE
		    self::SECTION_HERO                      // SLUG_SECTION
	    );
	    
	    // -> Sauvegarder les champs
	    register_setting(self::SUB3_GROUP, 'add_image_hero_takeawaypage');
	    register_setting(self::SUB3_GROUP,
		    'image_hero_takeawaypage',
		    [self::class, 'handle_file_image_hero']
	    );
	    register_setting(self::SUB3_GROUP, 'add_logo_hero_takeawaypage');
	    register_setting(self::SUB3_GROUP, 'add_message_hero_takeawaypage');
	    register_setting(self::SUB3_GROUP, 'message_hero_takeawaypage');


	    /**
	     * SECTION 2 : SECTION_TITLE =============================
	     *             -> Créer la section
	     *             -> Ajouter les éléments du formulaire
	     *             -> Sauvegarder les champs
	     *
	     */
	    // -> créer la section
	    add_settings_section(
		    self::SECTION_TITLE,                     // SLUG_SECTION
		    'Section titre',                         // TITLE
		    [self::class, 'display_section_title'],  // CALLBACK
		    self::SUB3_GROUP                              // SLUG_PAGE
	    );

	    // -> ajouter les éléments du formulaire
	    add_settings_field(
		    'title_takeawaypage',                       // SLUG_FIELD
		    'Ajouter un titre',                     // LABEL
		    [self::class,'field_title_takeawaypage'],   // CALLBACK
		    self::SUB3_GROUP,                       // SLUG_PAGE
		    self::SECTION_TITLE                     // SLUG_SECTION
	    );
	    add_settings_field(
		    'msg_page_takeawaypage',                        // SLUG_FIELD
		    'Gestion d\'un message d\'introduction',    // LABEL
		    [self::class,'field_msg_page_takeawaypage'],    // CALLBACK
		    self::SUB3_GROUP,                           // SLUG_PAGE
		    self::SECTION_TITLE                         // SLUG_SECTION
	    );
	    add_settings_field(
		    'main_msg_takeawaypage',                       // SLUG_FIELD
		    'Message principal',                     // LABEL
		    [self::class,'field_main_msg_takeawaypage'],   // CALLBACK
		    self::SUB3_GROUP,                       // SLUG_PAGE
		    self::SECTION_TITLE                     // SLUG_SECTION
	    );

	    // -> Sauvegarder les champs
	    register_setting(self::SUB3_GROUP, 'title_takeawaypage');
	    register_setting(self::SUB3_GROUP, 'add_msg_page_takeawaypage');
	    register_setting(self::SUB3_GROUP, 'msg_page_takeawaypage');
	    register_setting(self::SUB3_GROUP, 'main_msg_takeawaypage');

	    /**
	     * SECTION 3 : SECTION_RESERVATION ============================
	     *             -> Créer la section
	     *             -> Ajouter les éléments du formulaire
	     *             -> Sauvegarder les champs
	     *
	     */
	    // -> créer la section
	    add_settings_section(
		    self::SECTION_RESERVATION,                      // SLUG_SECTION
		    'Section revervation',                          // TITLE
		    [self::class, 'display_section_revervation'],   // CALLBACK
		    self::SUB3_GROUP                                // SLUG_PAGE
	    );

	    // -> ajouter les éléments du formulaire
	    add_settings_field(
		    'hidden_reservation_takeawaypage',                      // SLUG_FIELD
		    'Cacher la section',                                // LABEL
		    [self::class,'field_hidden_reservation_takeawaypage'],  // CALLBACK
		    self::SUB3_GROUP,                                   // SLUG_PAGE
		    self::SECTION_RESERVATION                           // SLUG_SECTION
	    );
	    add_settings_field(
		    'element_reservation_takeawaypage',                     // SLUG_FIELD
		    'Ce qui doit être présent',                         // LABEL
		    [self::class,'field_element_reservation_takeawaypage'], // CALLBACK
		    self::SUB3_GROUP,                                   // SLUG_PAGE
		    self::SECTION_RESERVATION                           // SLUG_SECTION
	    );
	    add_settings_field(
		    'message_reservation_takeawaypage',                     // SLUG_FIELD
		    'Gestion d\'un message',                            // LABEL
		    [self::class,'field_message_reservation_takeawaypage'], // CALLBACK
		    self::SUB3_GROUP,                                   // SLUG_PAGE
		    self::SECTION_RESERVATION                           // SLUG_SECTION
	    );

	    // -> Sauvegarder les champs
	    register_setting(self::SUB3_GROUP, 'hidden_reservation_takeawaypage');
	    register_setting(self::SUB3_GROUP, 'add_icon_reservation_takeawaypage');
	    register_setting(self::SUB3_GROUP, 'add_phone_reservation_takeawaypage');
	    register_setting(self::SUB3_GROUP, 'message_reservation_takeawaypage');
	    
    }

    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */
	// DISPLAY SECTION 1 : SECTION_HERO ===================================
	public static function display_section_hero(){
		?>
        <p class="section-description">
            Cetter partie est dédié à la gestion de la bannière de la page
        </p>
		<?php
	}

	// DISPLAY SECTION 2 : SECTION 2 : SECTION_TITLE ======================
	public static function display_section_title(){
		?>
        <p class="section-description">
            Cetter partie est dédié à la gestion du titre de la page
        </p>
		<?php
	}

	// DISPLAY SECTION 3 : SECTION_RESERVATION ============================
	public static function display_section_revervation(){
		?>
        <p class="section-description">
            Cetter partie est dédié à la gestion de la section réservation
        </p>
		<?php
	}

    /**
     * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
     *     le fichier sera stocké dans le dossier upload
     */
	public static function handle_file_image_hero(){
		if(!empty($_FILES['image_hero_takeawaypage']['tmp_name'])){
			$urls = wp_handle_upload($_FILES['image_hero_takeawaypage'], array('test_form' => FALSE));
			$temp = $urls['url'];
			return $temp;
		} // end -> if(!empty($_FILES['image_hero']['tmp_name']))

		//no upload. old file url is the new value.
		return get_option('image_hero_takeawaypage');
	}

    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */
	// DISPLAY SECTION 1 : SECTION_HERO ===================================
	public static function field_image_hero(){
		$add_image_hero_takeawaypage = esc_attr(get_option('add_image_hero_takeawaypage'));
		?>
        <div>
            <input type="checkbox"
                   id="add_image_hero_takeawaypage"
                   name="add_image_hero_takeawaypage"
                   value="1"
				<?php checked(1, $add_image_hero_takeawaypage, true); ?>
            />
            <label class="info" for="">Ajouter l'image comme arrière plan</label>
        </div>
        <div class="height-space">
            <input type="file"
                   id="image_hero_takeawaypage"
                   name="image_hero_takeawaypage"
                   value="<?php echo get_option('image_hero_takeawaypage'); ?>"
            />
        </div>
        <div>
            <img src="<?php echo get_option('image_hero_takeawaypage'); ?>"
                 class="img-hero"
                 alt=""
            />
        </div>
		<?php
	}
	public static function field_element_hero(){
		$add_logo_hero_takeawaypage = esc_attr(get_option('add_logo_hero_takeawaypage'));
		?>
        <p class="description">
            Cocher ce qui doit être présent sur l'image (par-dessus)
        </p>
        <p>
            <input type="checkbox"
                   id="add_logo_hero_takeawaypage"
                   name="add_logo_hero_takeawaypage"
                   value="1"
				<?php checked(1, $add_logo_hero_takeawaypage, true); ?>
            />
            <label for="">Ajouter le logo</label>
        </p>
		<?php
	}
	public static function field_message_hero(){
		$add_message_hero_takeawaypage = esc_attr(get_option('add_message_hero_takeawaypage'));
		$message_hero_takeawaypage = esc_attr(get_option('message_hero_takeawaypage'));
		?>
        <p class="description">
            Ajouter un message par-dessus l'image d'arrière plan
        </p>
        <div class="height-space">
            <input type="checkbox"
                   id="add_message_hero_takeawaypage"
                   name="add_message_hero_takeawaypage"
                   value="1"
				<?php checked(1, $add_message_hero_takeawaypage, true); ?>
            />
            <label for="">Ajouter le texte souhaiter</label>
            <textarea name="message_hero_takeawaypage" id="message_hero_takeawaypage" class="large-text code"><?php echo $message_hero_takeawaypage ?></textarea>
        </div>
		<?php
	}

	// DISPLAY SECTION 2 : SECTION 2 : SECTION_TITLE ======================
	public static function field_title_takeawaypage(){
		$title_takeawaypage = esc_attr(get_option('title_takeawaypage'));
		?>
        <input type="text"
               id="title_takeawaypage"
               name="title_takeawaypage"
               value="<?php echo $title_takeawaypage ?>"
               class="large-text"
        />
		<?php
	}
	public static function field_msg_page_takeawaypage(){
		$add_msg_page_takeawaypage = esc_attr(get_option('add_msg_page_takeawaypage'));
		$msg_page_takeawaypage = esc_attr(get_option('msg_page_takeawaypage'));
		?>
        <p class="description">
            Ajouter un description à la section
        </p>
        <div class="height-space">
            <input type="checkbox"
                   id="add_msg_page_takeawaypage"
                   name="add_msg_page_takeawaypage"
                   value="1"
				<?php checked(1, $add_msg_page_takeawaypage, true) ?>
            />
            <label for="">Ajouter le texte souhaiter</label>
            <textarea name="msg_page_takeawaypage" id="msg_page_takeawaypage" class="large-text code"><?php echo $msg_page_takeawaypage ?></textarea>
        </div>
		<?php
	}
	public static function field_main_msg_takeawaypage(){
		$main_msg_takeawaypage = esc_attr(get_option('main_msg_takeawaypage'));
		?>
        <p class="description">
            Ajouter un message pour inciter la clientèle cliquer sur le menu
        </p>
        <input type="text"
               id="main_msg_takeawaypage"
               name="main_msg_takeawaypage"
               value="<?php echo $main_msg_takeawaypage ?>"
               class="large-text"
        />
		<?php
	}

	// DISPLAY SECTION 3 : SECTION_RESERVATION ============================
	public static function field_hidden_reservation_takeawaypage(){
		$hidden_reservation_takeawaypage = esc_attr(get_option('hidden_reservation_takeawaypage'));
		?>
        <input type="checkbox"
               id="hidden_reservation_takeawaypage"
               name="hidden_reservation_takeawaypage"
               value="1"
			<?php checked(1, $hidden_reservation_takeawaypage, true) ?>
        />
        <label for="">Masquer cette section de la page dédier aux cartes</label>
		<?php
	}
	public static function field_element_reservation_takeawaypage(){
		$add_icon_reservation_takeawaypage = esc_attr(get_option('add_icon_reservation_takeawaypage'));
		$add_phone_reservation_takeawaypage = esc_attr(get_option('add_phone_reservation_takeawaypage'));
		?>
        <p class="description">Cocher ce qui doit être présent dans la section</p>
        <p class="">
            <input type="checkbox"
                   id="add_icon_reservation_takeawaypage"
                   name="add_icon_reservation_takeawaypage"
                   value="1"
				<?php checked(1, $add_icon_reservation_takeawaypage, true) ?>
            />
            <label for="">Ajouter une icon</label>
        </p>
        <p class="">
            <input type="checkbox"
                   id="add_phone_reservation_takeawaypage"
                   name="add_phone_reservation_takeawaypage"
                   value="1"
				<?php checked(1, $add_phone_reservation_takeawaypage, true) ?>
            />
            <label for="">Ajouter le numéro de téléphone</label>
        </p>

		<?php
	}
	public static function field_message_reservation_takeawaypage(){
		$message_reservation_takeawaypage = esc_attr(get_option('message_reservation_takeawaypage'));
		?>
        <p>Ajouter le texte souhaiter</p>
        <p class="height-space">
            <input type="text"
                   id="message_reservation_takeawaypage"
                   name="message_reservation_takeawaypage"
                   value="<?php echo $message_reservation_takeawaypage ?>"
                   class="large-text"
            />
        </p>
		<?php
	}

	
    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */

}

if (class_exists('pekinparis_takeawaypage')) {
    pekinparis_takeawaypage::register();
}
