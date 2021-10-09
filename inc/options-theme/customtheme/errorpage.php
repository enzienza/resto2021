<?php
/**
 * Name file:   errorpage
 *
 * Description: This file used to manage the display
 *               all sections of the errorpage
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

class pekinparis_errorpage{
    /**
     * 1 - DEFINIR LES ELEMENTS (repeter)
     *     afin d'evite les fautes de frappe
     */
    // page info - level 2
    const SUB5_TITLE   = 'Page erreur';
    const SUB5_MENU    = 'Page erreur';
    const PERMITION    = 'manage_options';
    const SUB5_GROUP   = 'custom_errorpage';
    const NONCE        = '_custom_errorpage';

    // definir les section
    const SECTION_ERROR = 'section_errorpage';


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
            self::SUB5_TITLE,                    // page_title
            self::SUB5_MENU,                     // menu_title
            self::PERMITION,                     // capability
            self::SUB5_GROUP,                    // slug_menu
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
                Gestion de la page d'erreur
            </h1>
            <p class="description">
                Sur cette page vous pouvez gérer l'affichage de la page d'erreur
            </p>
        </div>

        <form class="form-customtheme" action="options.php" method="post" enctype="multipart/form-data">
            <?php
                wp_nonce_field(self::NONCE, self::NONCE);
                settings_fields(self::SUB5_GROUP);
                do_settings_sections(self::SUB5_GROUP);
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
            self::SECTION_ERROR,                      // SLUG_SECTION
            'Section erreur',                          // TITLE
            [self::class, 'display_section_error'],   // CALLBACK
            self::SUB5_GROUP                         // SLUG_PAGE
        );
        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'type_error',                           // SLUG_FIELD
            'Type d\'erreur',                       // LABEL
            [self::class,'field_type_error'],       // CALLBACK
            self::SUB5_GROUP,                       // SLUG_PAGE
            self::SECTION_ERROR                     // SLUG_SECTION
        );
        add_settings_field(
            'maintext_error',                           // SLUG_FIELD
            'Texte principal',                       // LABEL
            [self::class,'field_maintext_error'],       // CALLBACK
            self::SUB5_GROUP,                       // SLUG_PAGE
            self::SECTION_ERROR                     // SLUG_SECTION
        );
        add_settings_field(
            'message_error',                           // SLUG_FIELD
            'Message d\'erreur',                       // LABEL
            [self::class,'field_message_error'],       // CALLBACK
            self::SUB5_GROUP,                       // SLUG_PAGE
            self::SECTION_ERROR                     // SLUG_SECTION
        );

        // -> Sauvegarder les champs
        register_setting(self::SUB5_GROUP, 'maintext_error');
        register_setting(self::SUB5_GROUP, 'message_error');

    }


    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */
    public static function display_section_error(){
        ?>
            <p class="section-description">
                Dans cette section, vous pouvez définir les différents message d'erreur
            </p>
        <?php
    }

    /**
     * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
     *     le fichier sera stocké dans le dossier upload
     */


    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */
    public static function field_type_error(){
        ?>
            <p class="">
                Erreur 404
            </p>
        <?php
    }
    public static function field_maintext_error(){
        $maintext_error = esc_attr(get_option('maintext_error'));
        ?>
            <input type="text"
                   id="maintext_error"
                   name="maintext_error"
                   value="<?php echo $maintext_error ?>"
                   class="large-text"
            />
        <?php
    }
    public static function field_message_error(){
        $message_error = esc_attr(get_option('message_error'));
        ?>
            <textarea id="message_error" name="message_error" class="large-text code"><?php echo $message_error ?></textarea>
        <?php
    }


    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */

}

if (class_exists('pekinparis_errorpage')) {
    pekinparis_errorpage::register();
}
