<?php
/**
 * Name file:   generality
 *
 * Description: File for the manage general restaurant information.
 *              For example: the location, the social networks, etc.
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

class pekinparis_generality{

    /**
     * 1 - DEFINIR LES ELEMENTS (repeter)
     *     afin d'evite les fautes de frappe
     */
    // page info - level 1
    const INFO_TITLE = 'Généralité';
    const INFO_MENU  = 'Pékin Paris';
    const PERMITION  = 'manage_options';
    const DASHICON   = 'dashicons-admin-generic';
    const GROUP      = 'generality';
    const NONCE      = '_generality';

    //definir les sections de la page d'option
    const SECTION_IMG    = 'section_image';
    const SECTION_INFO   = 'section_info';
    const SECTION_URL    = 'section_url';

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
        add_menu_page(
            self::INFO_TITLE,                   // TITLE_PAGE
            self::INFO_MENU,                    // TITLE_MENU
            self::PERMITION,                    // CAPABILITY
            self::GROUP,                        // SLUG_PAGE
            [self::class, 'render'],            // CALLBACK
            self::DASHICON,                     // icon
            2                                   // POSITION
        );
    }

    /**
     * 4 - TEMPLATE DES PAGES
     */
    public static function render(){
        ?>
            <div class="wrap">
                <h1 class="wp-heagin-inline">Pékin Paris</h1>
                <p class="description">
                    Sur cette page vous pouvez gérer les informations générales du restaurant
                </p><!--./description-->
            </div><!--./wrap-->

            <form class="form-generality" action="options.php" method="post" enctype="multipart/form-data">
                <?php
                    wp_nonce_field(self::NONCE, self::NONCE);
                    settings_fields(self::GROUP);
                    do_settings_sections(self::GROUP);
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
         * SECTION 1 : SECTION_IMG ===================================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_IMG,                       // SLUG_SECTION
            'Les médias',                            // TITLE
            [self::class, 'display_section_image'],  // CALLBACK
            self::GROUP                              // SLUG_PAGE
        ); // Section 1

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'logo_pekinparis',                           // SLUG_FIELD
            'Image du logo',                            // LABEL
            [self::class,'field_logo_pekinparis'],       // CALLBACK
            self::GROUP ,                               // SLUG_PAGE
            self::SECTION_IMG                           // SLUG_SECTION
        );

        // -> Sauvegarder les champs
        register_setting(
            self::GROUP, 'img_logo',
            [self::class, 'handle_file_logo']
        );



        /**
         * SECTION 2 : SECTION_INFO ==================================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_INFO,                       // SLUG_SECTION
            'Les informations de contact',            // TITLE
            [self::class, 'display_section_info'],    // CALLBACK
            self::GROUP                               // SLUG_PAGE
        ); // Section 2

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'location_pekinparis',                     // SLUG_FIELD
            'Adresse complète',                       // LABEL
            [self::class,'field_location_pekinparis'], // CALLBACK
            self::GROUP ,                             // SLUG_PAGE
            self::SECTION_INFO                        // SLUG_SECTION
        );
        add_settings_field(
            'phone_pekinparis',                        // SLUG_FIELD
            'Téléhone',                               // LABEL
            [self::class,'field_phone_pekinparis'],    // CALLBACK
            self::GROUP ,                             // SLUG_PAGE
            self::SECTION_INFO                        // SLUG_SECTION
        );
        add_settings_field(
            'mail_pekinparis',                         // SLUG_FIELD
            'E-mail',                                 // LABEL
            [self::class,'field_mail_pekinparis'],     // CALLBACK
            self::GROUP ,                             // SLUG_PAGE
            self::SECTION_INFO                        // SLUG_SECTION
        );

        // -> Sauvegarder les champs
        register_setting(self::GROUP, 'add_location');
        register_setting(self::GROUP, 'location');
        register_setting(self::GROUP, 'add_phone');
        register_setting(self::GROUP, 'phone');
        register_setting(self::GROUP, 'add_mail');
        register_setting(self::GROUP, 'mail');

        /**
         * SECTION 3 : SECTION_URL ===================================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_URL,                       // SLUG_SECTION
            'Les réseaux sociaux',                   // TITLE
            [self::class, 'display_section_url'],    // CALLBACK
            self::GROUP                              // SLUG_PAGE
        ); // Section 3

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'facebook_pekinparis',                          // SLUG_FIELD
            'Facebook (url)',                              // LABEL
            [self::class,'field_facebook_pekinparis'],      // CALLBACK
            self::GROUP ,                                  // SLUG_PAGE
            self::SECTION_URL                              // SLUG_SECTION
        );

        add_settings_field(
            'instagram_pekinparis',                         // SLUG_FIELD
            'Instagram (url)',                             // LABEL
            [self::class,'field_instagram_pekinparis'],     // CALLBACK
            self::GROUP ,                                  // SLUG_PAGE
            self::SECTION_URL                              // SLUG_SECTION
        );

        add_settings_field(
            'twitter_pekinparis',                           // SLUG_FIELD
            'Twitter (url)',                               // LABEL
            [self::class,'field_twitter_pekinparis'],       // CALLBACK
            self::GROUP ,                                  // SLUG_PAGE
            self::SECTION_URL                              // SLUG_SECTION
        );

        // -> Sauvegarder les champs
        register_setting(self::GROUP, 'add_facebook');
        register_setting(self::GROUP, 'url_facebook');
        register_setting(self::GROUP, 'add_instagram');
        register_setting(self::GROUP, 'url_instagram');
        register_setting(self::GROUP, 'add_twitter');
        register_setting(self::GROUP, 'url_twitter');
    }

    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */
    // DISPLAY SECTION 1 : SECTION_IMG ===================================
    public static function display_section_image(){
        ?>
            <p class="section-description">Section dédier aux médias</p>
        <?php
    }

    // DICPLAY SECTION 2 : SECTION_INFO ==================================
    public static function display_section_info(){
        ?>
            <p class="section-description">Section dédiée aux inforamations de contact</p>
        <?php
    }

    // DICPLAY SECTION 3 : SECTION_URL ===================================
    public static function display_section_url(){
        ?>
            <p class="section-description">Section dédiée aux réseaux sociaux</p>
        <?php
    }

    /**
     * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
     *     le fichier sera stocké dans le dossier upload
     */
    public static function handle_file_logo(){
        if(!empty($_FILES['img_logo']['tmp_name'])){
            $urls = wp_handle_upload($_FILES['img_logo'], array('test_form' => FALSE));
            $temp = $urls['url'];
            return $temp;
        } // end -> if(!empty($_FILES['img_logo']['tmp_name']))

        //no upload. old file url is the new value.
        return get_option('img_logo');
    }

    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */


    // FIELD SECTION 1 : SECTION_IMG ===================================
    public static function field_logo_pekinparis(){
        ?>
        <img src="<?php echo get_option('img_logo'); ?>" class="img-logo" alt="" /><br />
        <input type="file"
               id="img_logo"
               name="img_logo"
               value="<?php echo get_option('img_logo'); ?>"
        />
        <?php
    }

    // FIELD SECTION 2 : SECTION_INFO ==================================
    public static function field_location_pekinparis(){
        $add_location = esc_attr(get_option('add_location'));
        $location = esc_attr(get_option('location'));
        ?>
            <input type="checkbox"
                   id="add_location"
                   name="add_location"
                   value="1"
                   <?php checked(1, $add_location, true); ?>
            />
            <input type="text"
                   id="location"
                   name="location"
                   value="<?php echo $location ?>"
                   class="regular-text"
            />
        <?php
    }
    public static function field_phone_pekinparis(){
        $add_phone = esc_attr(get_option('add_phone'));
        $phone = esc_attr(get_option('phone'));
        ?>
          <input type="checkbox"
                 id="add_phone"
                 name="add_phone"
                 value="1"
                 <?php checked(1, $add_phone, true); ?>
          />
            <input type="text"
                   id="phone"
                   name="phone"
                   value="<?php echo $phone ?>"
                   class="regular-text"
            />
        <?php
    }
    public static function field_mail_pekinparis(){
        $add_mail = esc_attr(get_option('add_mail'));
        $mail = esc_attr(get_option('mail'));
        ?>
        <input type="checkbox"
               id="add_mail"
               name="add_mail"
               value="1"
               <?php checked(1, $add_mail, true); ?>
        />
        <input type="text"
               id="mail"
               name="mail"
               value="<?php echo $mail ?>"
               class="regular-text"
        />
        <?php
    }

    // FIELD SECTION 3 : SECTION_URL ===================================
    public static function field_facebook_pekinparis(){
        $add_facebook = esc_attr(get_option('add_facebook'));
        $url_facebook = esc_attr(get_option('url_facebook'));
        ?>
            <input type="checkbox"
                   id="add_facebook"
                   name="add_facebook"
                   value="1"
                   <?php checked(1, $add_facebook, true); ?>
            />
            <input type="text"
                   id="url_facebook"
                   name="url_facebook"
                   value="<?php echo $url_facebook ?>"
                   class="regular-text"
            />
        <?php
    }
    public static function field_instagram_pekinparis(){
        $add_instagram = esc_attr(get_option('add_instagram'));
        $url_instagram = esc_attr(get_option('url_instagram'));
        ?>
            <input type="checkbox"
                   id="add_instagram"
                   name="add_instagram"
                   value="1"
                   <?php checked(1, $add_instagram, true); ?>
            />
            <input type="text"
                   id="url_instagram"
                   name="url_instagram"
                   value="<?php echo $url_instagram ?>"
                   class="regular-text"
            />
        <?php
    }
    public static function field_twitter_pekinparis(){
        $add_twitter = esc_attr(get_option('add_twitter'));
        $url_twitter = esc_attr(get_option('url_twitter'));
        ?>
            <input type="checkbox"
                   id="add_twitter"
                   name="add_twitter"
                   value="1"
                   <?php checked(1, $add_twitter, true);?>
            />
            <input type="text"
                   id="url_twitter"
                   name="url_twitter"
                   value="<?php echo $url_twitter ?>"
                   class="regular-text"
            />
        <?php
    }

    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */
}

if(class_exists('pekinparis_generality')){
    pekinparis_generality::register();
}
