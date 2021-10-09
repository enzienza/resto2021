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
    public static function registerSettings(){}

    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */



    /**
     * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
     *     le fichier sera stocké dans le dossier upload
     */


    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */



    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */

}

if (class_exists('pekinparis_takeawaypage')) {
    pekinparis_takeawaypage::register();
}
