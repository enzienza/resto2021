<?php
/**
 * Name file:   homepage
 *
 * Description: This file used to manage the display
 *               all sections of the homepage
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

class pekinparis_homepage{
    /**
     * 1 - DEFINIR LES ELEMENTS (repeter)
     *     afin d'evite les fautes de frappe
     */
    // page info - level 2
    const SUB1_TITLE   = 'Homepage';
    const SUB1_MENU    = 'Homepage';
    const PERMITION    = 'manage_options';
    const SUB1_GROUP   = 'custom_homepage';
    const NONCE        = '_custom_homepage';

    // definir les section
      const SECTION_HERO    = 'section_hero_homepage';
      const SECTION_TITLE    = 'section_title_homepage';
      const SECTION_RESERVATION = 'section_booking_homepage';

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
            self::SUB1_TITLE,                    // page_title
            self::SUB1_MENU,                     // menu_title
            self::PERMITION,                     // capability
            self::SUB1_GROUP,                    // slug_menu
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
                Gestion de la page d'accueil
            </h1>
            <p class="description">
                Sur cette page vous pouvez gérer l'affichage
                toutes les sections de la page d'accueil
            </p>
        </div>

        <form class="form-customtheme" action="options.php" method="post" enctype="multipart/form-data">
            <?php
                wp_nonce_field(self::NONCE, self::NONCE);
                settings_fields(self::SUB1_GROUP);
                do_settings_sections(self::SUB1_GROUP);
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
        self::SUB1_GROUP                         // SLUG_PAGE
      );

      // -> Ajouter les éléments du formulaire
      add_settings_field(
          'homepage_image_hero',                  // SLUG_FIELD
          'Image d\'arrière plan',                // LABEL
          [self::class,'field_image_hero'],       // CALLBACK
          self::SUB1_GROUP,                       // SLUG_PAGE
          self::SECTION_HERO                      // SLUG_SECTION
      );
      add_settings_field(
          'homepage_element_hero',                // SLUG_FIELD
          'Ce qui doit être présent',             // LABEL
          [self::class,'field_element_hero'],     // CALLBACK
          self::SUB1_GROUP,                       // SLUG_PAGE
          self::SECTION_HERO                      // SLUG_SECTION
      );
      add_settings_field(
          'homepage_message_hero',                // SLUG_FIELD
          'Gestion d\'un message',                // LABEL
          [self::class,'field_message_hero'],     // CALLBACK
          self::SUB1_GROUP,                       // SLUG_PAGE
          self::SECTION_HERO                      // SLUG_SECTION
      );


      // -> Sauvegarder les champs
      // register_setting(self::SUB1_GROUP, 'homepage_add_image_hero');
      // register_setting(self::SUB1_GROUP,
      //     'homepage_image_hero',
      //     [self::class, 'handleFileImage_hero_homepage']
      // );
      // register_setting(self::SUB1_GROUP, 'homepage_add_logo_hero');
      // register_setting(self::SUB1_GROUP, 'homepage_add_message_hero');
      // register_setting(self::SUB1_GROUP, 'homepage_message_hero');




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
          self::SUB1_GROUP                              // SLUG_PAGE
      );

      // -> ajouter les éléments du formulaire

      // -> Sauvegarder les champs

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
          self::SUB1_GROUP                                // SLUG_PAGE
      );

      // -> ajouter les éléments du formulaire

      // -> Sauvegarder les champs


    }

    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */
     // DISPLAY SECTION 1 : SECTION_HERO ==================================
    public static function display_section_hero(){
        ?>
            <p class="section-description">
                Cetter partie est dédié à la gestion de la bannière
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
     // public static function handleFileImage_hero_homepage(){
     //   if(!empty($_FILES['homepage_image_hero']['tmp_name'])){
     //       $urls = wp_handle_upload($_FILES['homepage_image_hero'], array('test_form' => FALSE));
     //       $temp = $urls['url'];
     //       return $temp;
     //   } // end -> if(!empty($_FILES['image_hero']['tmp_name']))
     //
     //   //no upload. old file url is the new value.
     //   return get_option('homepage_image_hero');
     // }


    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */

     public static function field_image_hero(){}
     public static function field_element_hero(){}
     public static function field_message_hero(){}

    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */

}

if (class_exists('pekinparis_homepage')) {
    pekinparis_homepage::register();
}
