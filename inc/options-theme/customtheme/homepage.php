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
      register_setting(self::SUB1_GROUP, 'add_image_hero_homepage');
        register_setting(self::SUB1_GROUP,
            'image_hero_homepage',
            [self::class, 'handle_file_image_hero']
        );
        register_setting(self::SUB1_GROUP, 'add_logo_homepage');
        register_setting(self::SUB1_GROUP, 'add_message_hero_homepage');
        register_setting(self::SUB1_GROUP, 'message_hero_homepage');




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
        add_settings_field(
            'title_homepage',                       // SLUG_FIELD
            'Ajouter un titre',                     // LABEL
            [self::class,'field_title_homepage'],   // CALLBACK
            self::SUB1_GROUP,                       // SLUG_PAGE
            self::SECTION_TITLE                     // SLUG_SECTION
        );

        add_settings_field(
            'msg_page_homepage',                        // SLUG_FIELD
            'Gestion d\'un message d\'introduction',    // LABEL
            [self::class,'field_msg_page_homepage'],    // CALLBACK
            self::SUB1_GROUP,                           // SLUG_PAGE
            self::SECTION_TITLE                         // SLUG_SECTION
        );

        add_settings_field(
            'main_msg_homepage',                       // SLUG_FIELD
            'Message principal',                     // LABEL
            [self::class,'field_main_msg_homepage'],   // CALLBACK
            self::SUB1_GROUP,                       // SLUG_PAGE
            self::SECTION_TITLE                     // SLUG_SECTION
        );

      // -> Sauvegarder les champs
        register_setting(self::SUB1_GROUP, 'title_homepage');
        register_setting(self::SUB1_GROUP, 'add_msg_page_homepage');
        register_setting(self::SUB1_GROUP, 'msg_page_homepage');
        register_setting(self::SUB1_GROUP, 'main_msg_homepage');


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
        if(!empty($_FILES['image_hero_homepage']['tmp_name'])){
            $urls = wp_handle_upload($_FILES['image_hero_homepage'], array('test_form' => FALSE));
            $temp = $urls['url'];
            return $temp;
        } // end -> if(!empty($_FILES['image_hero']['tmp_name']))

        //no upload. old file url is the new value.
        return get_option('image_hero_homepage');
    }


    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */
    // DISPLAY SECTION 1 : SECTION_HERO ===================================
     public static function field_image_hero(){
       $add_image_hero_homepage = esc_attr(get_option('add_image_hero_homepage'));
        ?>
        <div>
            <input type="checkbox"
                   id="add_image_hero_homepage"
                   name="add_image_hero_homepage"
                   value="1"
                   <?php checked(1, $add_image_hero_homepage, true); ?>
            />
            <label class="info" for="">Ajouter l'image comme arrière plan</label>
        </div>
        <div class="height-space">
            <input type="file"
                   id="image_hero_homepage"
                   name="image_hero_homepage"
                   value="<?php echo get_option('image_hero_homepage'); ?>"
            />
        </div>
        <div>
            <img src="<?php echo get_option('image_hero_homepage'); ?>"
                 class="img-hero"
                 alt=""
            />
        </div>
        <?php
     }
     public static function field_element_hero(){
         $add_logo_homepage = esc_attr(get_option('add_logo_homepage'));
         ?>
         <p class="description">
             Cocher ce qui doit être présent sur l'image (par-dessus)
         </p>
         <p>
             <input type="checkbox"
                    id="add_logo_homepage"
                    name="add_logo_homepage"
                    value="1"
                 <?php checked(1, $add_logo_homepage, true); ?>
             />
             <label for="">Ajouter le logo</label>
         </p>
         <?php
     }
     public static function field_message_hero(){
         $add_message_hero_homepage = esc_attr(get_option('add_message_hero_homepage'));
         $message_hero_homepage = esc_attr(get_option('message_hero_homepage'));
         ?>
         <p class="description">
             Ajouter un message par-dessus l'image d'arrière plan
         </p>
         <div class="height-space">
             <input type="checkbox"
                    id="add_message_hero_homepage"
                    name="add_message_hero_homepage"
                    value="1"
                 <?php checked(1, $add_message_hero_homepage, true); ?>
             />
             <label for="">Ajouter le texte souhaiter</label>
             <textarea name="message_hero_homepage" id="message_hero_homepage" class="large-text code"><?php echo $message_hero_homepage ?></textarea>
         </div>
         <?php
     }

    // DISPLAY SECTION 2 : SECTION 2 : SECTION_TITLE ======================
     public static function field_title_homepage(){
         $title_homepage = esc_attr(get_option('title_homepage'));
         ?>
         <input type="text"
                id="title_homepage"
                name="title_homepage"
                value="<?php echo $title_homepage ?>"
                class="large-text"
         />
         <?php
     }
     public static function field_msg_page_homepage(){
         $add_msg_page_homepage = esc_attr(get_option('add_msg_page_homepage'));
         $msg_page_homepage = esc_attr(get_option('msg_page_homepage'));
         ?>
         <p class="description">
             Ajouter un description à la section
         </p>
         <div class="height-space">
             <input type="checkbox"
                    id="add_msg_page_homepage"
                    name="add_msg_page_homepage"
                    value="1"
                    <?php checked(1, $add_msg_page_homepage, true) ?>
             />
             <label for="">Ajouter le texte souhaiter</label>
             <textarea name="msg_page_homepage" id="msg_page_homepage" class="large-text code"><?php echo $msg_page_homepage ?></textarea>
         </div>
         <?php
     }
     public static function field_main_msg_homepage(){
         $main_msg_homepage = esc_attr(get_option('main_msg_homepage'));
         ?>
         <p class="description">
             Ajouter un message pour inciter la clientèle cliquer sur le menu
         </p>
         <input type="text"
                id="main_msg_homepage"
                name="main_msg_homepage"
                value="<?php echo $main_msg_homepage ?>"
                class="large-text"
         />
         <?php
     }

    // DISPLAY SECTION 3 : SECTION_RESERVATION ============================


     /**
     * 9 - AJOUT STYLE ET SCRIPT
     */

}

if (class_exists('pekinparis_homepage')) {
    pekinparis_homepage::register();
}
