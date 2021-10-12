<?php
/**
 * Name file:   eventpage
 *
 * Description: This file used to manage the display
 *               all sections of the eventpage
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

class pekinparis_eventpage{
    /**
     * 1 - DEFINIR LES ELEMENTS (repeter)
     *     afin d'evite les fautes de frappe
     */
    // page info - level 2
    const SUB4_TITLE   = 'Page événements';
    const SUB4_MENU    = 'Page événements';
    const PERMITION    = 'manage_options';
    const SUB4_GROUP   = 'custom_eventpage';
    const NONCE        = '_custom_eventpage';

    // definir les section
	const SECTION_HERO    = 'section_hero_eventpage';
	const SECTION_TITLE    = 'section_title_eventpage';
	const SECTION_RESERVATION = 'section_booking_eventpage';

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
            self::SUB4_TITLE,                    // page_title
            self::SUB4_MENU,                     // menu_title
            self::PERMITION,                     // capability
            self::SUB4_GROUP,                    // slug_menu
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
        Gestion de la page des événements
      </h1>
      <p class="description">
        Sur cette page vous pouvez gérer l'affichage
        général de la page des événements
      </p>
    </div>

        <form class="form-customtheme" action="options.php" method="post" enctype="multipart/form-data">
            <?php
                wp_nonce_field(self::NONCE, self::NONCE);
                settings_fields(self::SUB4_GROUP);
                do_settings_sections(self::SUB4_GROUP);
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
			'Section banière',                       // TITLE
			[self::class, 'display_section_hero'],   // CALLBACK
			self::SUB4_GROUP                         // SLUG_PAGE
		);

		// -> Ajouter les éléments du formulaire
		add_settings_field(
			'eventpage_image_hero',                  // SLUG_FIELD
			'Image d\'arrière plan',                // LABEL
			[self::class,'field_image_hero'],       // CALLBACK
			self::SUB4_GROUP,                       // SLUG_PAGE
			self::SECTION_HERO                      // SLUG_SECTION
		);
		add_settings_field(
			'eventpage_element_hero',                // SLUG_FIELD
			'Ce qui doit être présent',             // LABEL
			[self::class,'field_element_hero'],     // CALLBACK
			self::SUB4_GROUP,                       // SLUG_PAGE
			self::SECTION_HERO                      // SLUG_SECTION
		);
		add_settings_field(
			'eventpage_message_hero',                // SLUG_FIELD
			'Gestion d\'un message',                // LABEL
			[self::class,'field_message_hero'],     // CALLBACK
			self::SUB4_GROUP,                       // SLUG_PAGE
			self::SECTION_HERO                      // SLUG_SECTION
		);

		// -> Sauvegarder les champs
		register_setting(self::SUB4_GROUP, 'add_image_hero_eventpage');
		register_setting(self::SUB4_GROUP,
			'image_hero_eventpage',
			[self::class, 'handle_file_image_hero']
		);
		register_setting(self::SUB4_GROUP, 'add_logo_hero_eventpage');
		register_setting(self::SUB4_GROUP, 'add_message_hero_eventpage');
		register_setting(self::SUB4_GROUP, 'message_hero_eventpage');


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
			self::SUB4_GROUP                              // SLUG_PAGE
		);

		// -> ajouter les éléments du formulaire
		add_settings_field(
			'title_eventpage',                       // SLUG_FIELD
			'Ajouter un titre',                     // LABEL
			[self::class,'field_title_eventpage'],   // CALLBACK
			self::SUB4_GROUP,                       // SLUG_PAGE
			self::SECTION_TITLE                     // SLUG_SECTION
		);
		add_settings_field(
			'msg_page_eventpage',                        // SLUG_FIELD
			'Gestion d\'un message d\'introduction',    // LABEL
			[self::class,'field_msg_page_eventpage'],    // CALLBACK
			self::SUB4_GROUP,                           // SLUG_PAGE
			self::SECTION_TITLE                         // SLUG_SECTION
		);


		// -> Sauvegarder les champs
		register_setting(self::SUB4_GROUP, 'title_eventpage');
		register_setting(self::SUB4_GROUP, 'add_msg_page_eventpage');
		register_setting(self::SUB4_GROUP, 'msg_page_eventpage');

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
			self::SUB4_GROUP                                // SLUG_PAGE
		);

		// -> ajouter les éléments du formulaire
		add_settings_field(
			'hidden_reservation_eventpage',                      // SLUG_FIELD
			'Cacher la section',                                // LABEL
			[self::class,'field_hidden_reservation_eventpage'],  // CALLBACK
			self::SUB4_GROUP,                                   // SLUG_PAGE
			self::SECTION_RESERVATION                           // SLUG_SECTION
		);
		add_settings_field(
			'element_reservation_eventpage',                     // SLUG_FIELD
			'Ce qui doit être présent',                         // LABEL
			[self::class,'field_element_reservation_eventpage'], // CALLBACK
			self::SUB4_GROUP,                                   // SLUG_PAGE
			self::SECTION_RESERVATION                           // SLUG_SECTION
		);
		add_settings_field(
			'message_reservation_eventpage',                     // SLUG_FIELD
			'Gestion d\'un message',                            // LABEL
			[self::class,'field_message_reservation_eventpage'], // CALLBACK
			self::SUB4_GROUP,                                   // SLUG_PAGE
			self::SECTION_RESERVATION                           // SLUG_SECTION
		);

		// -> Sauvegarder les champs
		register_setting(self::SUB4_GROUP, 'hidden_reservation_eventpage');
		register_setting(self::SUB4_GROUP, 'add_icon_reservation_eventpage');
		register_setting(self::SUB4_GROUP, 'add_phone_reservation_eventpage');
		register_setting(self::SUB4_GROUP, 'message_reservation_eventpage');

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
		if(!empty($_FILES['image_hero_eventpage']['tmp_name'])){
			$urls = wp_handle_upload($_FILES['image_hero_eventpage'], array('test_form' => FALSE));
			$temp = $urls['url'];
			return $temp;
		} // end -> if(!empty($_FILES['image_hero']['tmp_name']))

		//no upload. old file url is the new value.
		return get_option('image_hero_eventpage');
	}

    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */
    // DISPLAY SECTION 1 : SECTION_HERO ===================================
	public static function field_image_hero(){
		$add_image_hero_eventpage = esc_attr(get_option('add_image_hero_eventpage'));
		?>
        <div>
            <input type="checkbox"
                   id="add_image_hero_eventpage"
                   name="add_image_hero_eventpage"
                   value="1"
				<?php checked(1, $add_image_hero_eventpage, true); ?>
            />
            <label class="info" for="">Ajouter l'image comme arrière plan</label>
        </div>
        <div class="height-space">
            <input type="file"
                   id="image_hero_eventpage"
                   name="image_hero_eventpage"
                   value="<?php echo get_option('image_hero_eventpage'); ?>"
            />
        </div>
        <div>
            <img src="<?php echo get_option('image_hero_eventpage'); ?>"
                 class="img-hero"
                 alt=""
            />
        </div>
		<?php
	}
	public static function field_element_hero(){
		$add_logo_hero_eventpage = esc_attr(get_option('add_logo_hero_eventpage'));
		?>
        <p class="description">
            Cocher ce qui doit être présent sur l'image (par-dessus)
        </p>
        <p>
            <input type="checkbox"
                   id="add_logo_hero_eventpage"
                   name="add_logo_hero_eventpage"
                   value="1"
				<?php checked(1, $add_logo_hero_eventpage, true); ?>
            />
            <label for="">Ajouter le logo</label>
        </p>
		<?php
	}
	public static function field_message_hero(){
		$add_message_hero_eventpage = esc_attr(get_option('add_message_hero_eventpage'));
		$message_hero_eventpage = esc_attr(get_option('message_hero_eventpage'));
		?>
        <p class="description">
            Ajouter un message par-dessus l'image d'arrière plan
        </p>
        <div class="height-space">
            <input type="checkbox"
                   id="add_message_hero_eventpage"
                   name="add_message_hero_eventpage"
                   value="1"
				<?php checked(1, $add_message_hero_eventpage, true); ?>
            />
            <label for="">Ajouter le texte souhaiter</label>
            <textarea name="message_hero_eventpage" id="message_hero_eventpage" class="large-text code"><?php echo $message_hero_eventpage ?></textarea>
        </div>
		<?php
	}

	// DISPLAY SECTION 2 : SECTION 2 : SECTION_TITLE ======================
	public static function field_title_eventpage(){
		$title_eventpage = esc_attr(get_option('title_eventpage'));
		?>
        <input type="text"
               id="title_eventpage"
               name="title_eventpage"
               value="<?php echo $title_eventpage ?>"
               class="large-text"
        />
		<?php
	}
	public static function field_msg_page_eventpage(){
		$add_msg_page_eventpage = esc_attr(get_option('add_msg_page_eventpage'));
		$msg_page_eventpage = esc_attr(get_option('msg_page_eventpage'));
		?>
        <p class="description">
            Ajouter un description à la section
        </p>
        <div class="height-space">
            <input type="checkbox"
                   id="add_msg_page_eventpage"
                   name="add_msg_page_eventpage"
                   value="1"
				<?php checked(1, $add_msg_page_eventpage, true) ?>
            />
            <label for="">Ajouter le texte souhaiter</label>
            <textarea name="msg_page_eventpage" id="msg_page_eventpage" class="large-text code"><?php echo $msg_page_eventpage ?></textarea>
        </div>
		<?php
	}

	// DISPLAY SECTION 3 : SECTION_RESERVATION ============================
	public static function field_hidden_reservation_eventpage(){
		$hidden_reservation_eventpage = esc_attr(get_option('hidden_reservation_eventpage'));
		?>
        <input type="checkbox"
               id="hidden_reservation_eventpage"
               name="hidden_reservation_eventpage"
               value="1"
			<?php checked(1, $hidden_reservation_eventpage, true) ?>
        />
        <label for="">Masquer cette section de la page dédier aux cartes</label>
		<?php
	}
	public static function field_element_reservation_eventpage(){
		$add_icon_reservation_eventpage = esc_attr(get_option('add_icon_reservation_eventpage'));
		$add_phone_reservation_eventpage = esc_attr(get_option('add_phone_reservation_eventpage'));
		?>
        <p class="description">Cocher ce qui doit être présent dans la section</p>
        <p class="">
            <input type="checkbox"
                   id="add_icon_reservation_eventpage"
                   name="add_icon_reservation_eventpage"
                   value="1"
				<?php checked(1, $add_icon_reservation_eventpage, true) ?>
            />
            <label for="">Ajouter une icon</label>
        </p>
        <p class="">
            <input type="checkbox"
                   id="add_phone_reservation_eventpage"
                   name="add_phone_reservation_eventpage"
                   value="1"
				<?php checked(1, $add_phone_reservation_eventpage, true) ?>
            />
            <label for="">Ajouter le numéro de téléphone</label>
        </p>

		<?php
	}
	public static function field_message_reservation_eventpage(){
		$message_reservation_eventpage = esc_attr(get_option('message_reservation_eventpage'));
		?>
        <p>Ajouter le texte souhaiter</p>
        <p class="height-space">
            <input type="text"
                   id="message_reservation_eventpage"
                   name="message_reservation_eventpage"
                   value="<?php echo $message_reservation_eventpage ?>"
                   class="large-text"
            />
        </p>
		<?php
	}


    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */

}

if (class_exists('pekinparis_eventpage')) {
    pekinparis_eventpage::register();
}
