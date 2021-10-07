<?php
/**
 * Name file:   horaire
 *
 * Description: File for managing restaurant hours and closing days
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
class pekinparis_timetable{
    /**
     * 1 - DEFINIR LES ELEMENTS (repeter)
     *     afin d'evite les fautes de frappe
     */
    const SUB_TITLE  = 'Horaire';
    const SUB_MENU   = 'Horaire';
    const PERMITION  = 'manage_options';
    const SUB_GROUP  = 'timetable_pekinparis';
    const NONCE      = '_timetable_pekinparis';

    // definit les section
    const SECTION_TIMETABLE = 'section_horaire';


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
            pekinparis_generality::GROUP,        // slug parent
            self::SUB_TITLE,                    // page_title
            self::SUB_MENU,                     // menu_title
            self::PERMITION,                    // capability
            self::SUB_GROUP,                    // slug_menu
            [self::class, 'render']             // CALLBACK
        );
    }

    /**
     * 4 - TEMPLATE DES PAGES
     */
    public static function render(){
        ?>
            <div class="wrap">
                <h1 class="wp-heagin-inline">Horaires</h1>
                <p class="description">
                    Sur cette page vous pouvez gérer les heures d'ouverture du restaurant
                </p><!--./description-->
            </div><!--./wrap-->

        <form class="form-timetable" action="options.php" method="post" enctype="multipart/form-data">
            <?php
                wp_nonce_field(self::NONCE, self::NONCE);
                settings_fields(self::SUB_GROUP);
                do_settings_sections(self::SUB_GROUP);
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
         * SECTION  : SECTION_IMG ===================================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_TIMETABLE,                     // SLUG_SECTION
            'Les heures d\'ouverture',                   // TITLE
            [self::class, 'display_section_timetable'],  // CALLBACK
            self::SUB_GROUP                              // SLUG_PAGE
        );

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'heure_lundi',                               // SLUG_FIELD
            'Lundi',                                     // LABEL
            [self::class,'field_heure_lundi'],           // CALLBACK
            self::SUB_GROUP ,                            // SLUG_PAGE
            self::SECTION_TIMETABLE                      // SLUG_SECTION
        );
        add_settings_field(
            'heure_mardi',                               // SLUG_FIELD
            'Mardi',                                     // LABEL
            [self::class,'field_heure_mardi'],           // CALLBACK
            self::SUB_GROUP ,                            // SLUG_PAGE
            self::SECTION_TIMETABLE                      // SLUG_SECTION
        );
        add_settings_field(
            'heure_mercredi',                            // SLUG_FIELD
            'Mercredi',                                  // LABEL
            [self::class,'field_heure_mercredi'],        // CALLBACK
            self::SUB_GROUP ,                            // SLUG_PAGE
            self::SECTION_TIMETABLE                      // SLUG_SECTION
        );
        add_settings_field(
            'heure_jeudi',                               // SLUG_FIELD
            'Jeudi',                                     // LABEL
            [self::class,'field_heure_jeudi'],           // CALLBACK
            self::SUB_GROUP ,                            // SLUG_PAGE
            self::SECTION_TIMETABLE                      // SLUG_SECTION
        );
        add_settings_field(
            'heure_vendredi',                            // SLUG_FIELD
            'Vendredi',                                  // LABEL
            [self::class,'field_heure_vendredi'],        // CALLBACK
            self::SUB_GROUP ,                            // SLUG_PAGE
            self::SECTION_TIMETABLE                      // SLUG_SECTION
        );
        add_settings_field(
            'heure_samedi',                              // SLUG_FIELD
            'Samedi',                                    // LABEL
            [self::class,'field_heure_samedi'],          // CALLBACK
            self::SUB_GROUP ,                            // SLUG_PAGE
            self::SECTION_TIMETABLE                      // SLUG_SECTION
        );
        add_settings_field(
            'heure_dimanche',                            // SLUG_FIELD
            'Dimanche',                                  // LABEL
            [self::class,'field_heure_dimanche'],        // CALLBACK
            self::SUB_GROUP ,                            // SLUG_PAGE
            self::SECTION_TIMETABLE                      // SLUG_SECTION
        );




        // -> Sauvegarder les champs
        /* LUNDI */
        register_setting(self::SUB_GROUP, 'lundi_midi_open');
        register_setting(self::SUB_GROUP, 'lundi_midi_de');
        register_setting(self::SUB_GROUP, 'lundi_midi_a');
        register_setting(self::SUB_GROUP, 'lundi_soir_open');
        register_setting(self::SUB_GROUP, 'lundi_soir_de');
        register_setting(self::SUB_GROUP, 'lundi_soir_a');
        register_setting(self::SUB_GROUP, 'lundi_closed');

        /* MARDI */
        register_setting(self::SUB_GROUP, 'mardi_midi_open');
        register_setting(self::SUB_GROUP, 'mardi_midi_de');
        register_setting(self::SUB_GROUP, 'mardi_midi_a');
        register_setting(self::SUB_GROUP, 'mardi_soir_open');
        register_setting(self::SUB_GROUP, 'mardi_soir_de');
        register_setting(self::SUB_GROUP, 'mardi_soir_a');
        register_setting(self::SUB_GROUP, 'mardi_closed');

        /* MERCREDI */
        register_setting(self::SUB_GROUP, 'mercredi_midi_open');
        register_setting(self::SUB_GROUP, 'mercredi_midi_de');
        register_setting(self::SUB_GROUP, 'mercredi_midi_a');
        register_setting(self::SUB_GROUP, 'mercredi_soir_open');
        register_setting(self::SUB_GROUP, 'mercredi_soir_de');
        register_setting(self::SUB_GROUP, 'mercredi_soir_a');
        register_setting(self::SUB_GROUP, 'mercredi_closed');

        /* JEUDI */
        register_setting(self::SUB_GROUP, 'jeudi_midi_open');
        register_setting(self::SUB_GROUP, 'jeudi_midi_de');
        register_setting(self::SUB_GROUP, 'jeudi_midi_a');
        register_setting(self::SUB_GROUP, 'jeudi_soir_open');
        register_setting(self::SUB_GROUP, 'jeudi_soir_de');
        register_setting(self::SUB_GROUP, 'jeudi_soir_a');
        register_setting(self::SUB_GROUP, 'jeudi_closed');

        /* VENDREDI */
        register_setting(self::SUB_GROUP, 'vendredi_midi_open');
        register_setting(self::SUB_GROUP, 'vendredi_midi_de');
        register_setting(self::SUB_GROUP, 'vendredi_midi_a');
        register_setting(self::SUB_GROUP, 'vendredi_soir_open');
        register_setting(self::SUB_GROUP, 'vendredi_soir_de');
        register_setting(self::SUB_GROUP, 'vendredi_soir_a');
        register_setting(self::SUB_GROUP, 'vendredi_closed');

        /* SAMEDI */
        register_setting(self::SUB_GROUP, 'samedi_midi_open');
        register_setting(self::SUB_GROUP, 'samedi_midi_de');
        register_setting(self::SUB_GROUP, 'samedi_midi_a');
        register_setting(self::SUB_GROUP, 'samedi_soir_open');
        register_setting(self::SUB_GROUP, 'samedi_soir_de');
        register_setting(self::SUB_GROUP, 'samedi_soir_a');
        register_setting(self::SUB_GROUP, 'samedi_closed');

        /* DIMANCHE */
        register_setting(self::SUB_GROUP, 'dimanche_midi_open');
        register_setting(self::SUB_GROUP, 'dimanche_midi_de');
        register_setting(self::SUB_GROUP, 'dimanche_midi_a');
        register_setting(self::SUB_GROUP, 'dimanche_soir_open');
        register_setting(self::SUB_GROUP, 'dimanche_soir_de');
        register_setting(self::SUB_GROUP, 'dimanche_soir_a');
        register_setting(self::SUB_GROUP, 'dimanche_closed');

    }


    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */
    public static function display_section_timetable(){
        ?>
            <p class="section-description">Section dédiée uniquement aux horaires d'ouverture</p>
        <?php
    }

    /**
     * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
     *     le fichier sera stocké dans le dossier upload
     */


    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */
    public static function field_heure_lundi(){
        $lundi_midi_open = esc_attr(get_option('lundi_midi_open'));
        $lundi_midi_de   = esc_attr(get_option('lundi_midi_de'));
        $lundi_midi_a    = esc_attr(get_option('lundi_midi_a'));
        $lundi_soir_open = esc_attr(get_option('lundi_soir_open'));
        $lundi_soir_de   = esc_attr(get_option('lundi_soir_de'));
        $lundi_soir_a    = esc_attr(get_option('lundi_soir_a'));
        $lundi_closed    = esc_attr(get_option('lundi_closed'));
        ?>
            <div class="service">
                <span class="service-ok">
                    <input type="checkbox"
                           id="lundi_midi_open"
                           name="lundi_midi_open"
                           value="1"
                           <?php checked(1, $lundi_midi_open, true); ?>
                    />
                    <label for="">Service du midi</label>
                </span><!--./service-->

                <span class="service-de">
                    <label for="">de</label>
                    <input type="time"
                           id="lundi_midi_de"
                           name="lundi_midi_de"
                           value="<?php echo $lundi_midi_de ?>"
                    />
                </span><!--service-a-->
                <span class="service-a">
                        <label for="">à</label>
                        <input type="time"
                               id="lundi_midi_a"
                               name="lundi_midi_a"
                               value="<?php echo $lundi_midi_a ?>"
                        />
                </span><!--service-a-->
            </div>
            <div class="service">
                    <span class="service-ok">
                        <input type="checkbox"
                               id="lundi_soir_open"
                               name="lundi_soir_open"
                               value="1"
                               <?php checked(1, $lundi_soir_open, true); ?>
                        />
                        <label for="">Service du soir</label>
                    </span><!--./service-->

                <span class="service-de">
                        <label for="">de</label>
                        <input type="time"
                               id="lundi_soir_de"
                               name="lundi_soir_de"
                               value="<?php echo $lundi_soir_de ?>"
                        />
                    </span><!--service-a-->
                <span class="service-a">
                            <label for="">à</label>
                            <input type="time"
                                   id="lundi_soir_a"
                                   name="lundi_soir_a"
                                   value="<?php echo $lundi_soir_a ?>"
                            />
                    </span><!--service-a-->
            </div>
            <div class="service-close">
                <span class="">
                    <input type="checkbox"
                           id="lundi_closed"
                           name="lundi_closed"
                           value="1"
                           <?php checked(1, $lundi_closed, true) ?>
                    />
                    <label for="">Jour de fermeture</label>
                </span>
            </div>
        <?php
    }
    public static function field_heure_mardi(){
        $mardi_midi_open = esc_attr(get_option('mardi_midi_open'));
        $mardi_midi_de   = esc_attr(get_option('mardi_midi_de'));
        $mardi_midi_a    = esc_attr(get_option('mardi_midi_a'));
        $mardi_soir_open = esc_attr(get_option('mardi_soir_open'));
        $mardi_soir_de   = esc_attr(get_option('mardi_soir_de'));
        $mardi_soir_a    = esc_attr(get_option('mardi_soir_a'));
        $mardi_closed    = esc_attr(get_option('mardi_closed'));
        ?>
        <div class="service">
                <span class="service-ok">
                    <input type="checkbox"
                           id="mardi_midi_open"
                           name="mardi_midi_open"
                           value="1"
                           <?php checked(1, $mardi_midi_open, true); ?>
                    />
                    <label for="">Service du midi</label>
                </span><!--./service-->

            <span class="service-de">
                    <label for="">de</label>
                    <input type="time"
                           id="mardi_midi_de"
                           name="mardi_midi_de"
                           value="<?php echo $mardi_midi_de ?>"
                    />
                </span><!--service-a-->
            <span class="service-a">
                        <label for="">à</label>
                        <input type="time"
                               id="mardi_midi_a"
                               name="mardi_midi_a"
                               value="<?php echo $mardi_midi_a ?>"
                        />
                </span><!--service-a-->
        </div>
        <div class="service">
                    <span class="service-ok">
                        <input type="checkbox"
                               id="mardi_soir_open"
                               name="mardi_soir_open"
                               value="1"
                               <?php checked(1, $mardi_soir_open, true); ?>
                        />
                        <label for="">Service du soir</label>
                    </span><!--./service-->

            <span class="service-de">
                        <label for="">de</label>
                        <input type="time"
                               id="mardi_soir_de"
                               name="mardi_soir_de"
                               value="<?php echo $mardi_soir_de ?>"
                        />
                    </span><!--service-a-->
            <span class="service-a">
                            <label for="">à</label>
                            <input type="time"
                                   id="mardi_soir_a"
                                   name="mardi_soir_a"
                                   value="<?php echo $mardi_soir_a ?>"
                            />
                    </span><!--service-a-->
        </div>
        <div class="service-close">
                <span class="">
                    <input type="checkbox"
                           id="mardi_closed"
                           name="mardi_closed"
                           value="1"
                           <?php checked(1, $mardi_closed, true) ?>
                    />
                    <label for="">Jour de fermeture</label>
                </span>
        </div>
        <?php
    }

    public static function field_heure_mercredi(){
        $mercredi_midi_open = esc_attr(get_option('mercredi_midi_open'));
        $mercredi_midi_de   = esc_attr(get_option('mercredi_midi_de'));
        $mercredi_midi_a    = esc_attr(get_option('mercredi_midi_a'));
        $mercredi_soir_open = esc_attr(get_option('mercredi_soir_open'));
        $mercredi_soir_de   = esc_attr(get_option('mercredi_soir_de'));
        $mercredi_soir_a    = esc_attr(get_option('mercredi_soir_a'));
        $mercredi_closed    = esc_attr(get_option('mercredi_closed'));
        ?>
        <div class="service">
                <span class="service-ok">
                    <input type="checkbox"
                           id="mercredi_midi_open"
                           name="mercredi_midi_open"
                           value="1"
                           <?php checked(1, $mercredi_midi_open, true); ?>
                    />
                    <label for="">Service du midi</label>
                </span><!--./service-->

            <span class="service-de">
                    <label for="">de</label>
                    <input type="time"
                           id="mercredi_midi_de"
                           name="mercredi_midi_de"
                           value="<?php echo $mercredi_midi_de ?>"
                    />
                </span><!--service-a-->
            <span class="service-a">
                        <label for="">à</label>
                        <input type="time"
                               id="mercredi_midi_a"
                               name="mercredi_midi_a"
                               value="<?php echo $mercredi_midi_a ?>"
                        />
                </span><!--service-a-->
        </div>
        <div class="service">
                    <span class="service-ok">
                        <input type="checkbox"
                               id="mercredi_soir_open"
                               name="mercredi_soir_open"
                               value="1"
                               <?php checked(1, $mercredi_soir_open, true); ?>
                        />
                        <label for="">Service du soir</label>
                    </span><!--./service-->

            <span class="service-de">
                        <label for="">de</label>
                        <input type="time"
                               id="mercredi_soir_de"
                               name="mercredi_soir_de"
                               value="<?php echo $mercredi_soir_de ?>"
                        />
                    </span><!--service-a-->
            <span class="service-a">
                            <label for="">à</label>
                            <input type="time"
                                   id="mercredi_soir_a"
                                   name="mercredi_soir_a"
                                   value="<?php echo $mercredi_soir_a ?>"
                            />
                    </span><!--service-a-->
        </div>
        <div class="service-close">
                <span class="">
                    <input type="checkbox"
                           id="mercredi_closed"
                           name="mercredi_closed"
                           value="1"
                           <?php checked(1, $mercredi_closed, true) ?>
                    />
                    <label for="">Jour de fermeture</label>
                </span>
        </div>
        <?php
    }

    public static function field_heure_jeudi(){
        $jeudi_midi_open = esc_attr(get_option('jeudi_midi_open'));
        $jeudi_midi_de   = esc_attr(get_option('jeudi_midi_de'));
        $jeudi_midi_a    = esc_attr(get_option('jeudi_midi_a'));
        $jeudi_soir_open = esc_attr(get_option('jeudi_soir_open'));
        $jeudi_soir_de   = esc_attr(get_option('jeudi_soir_de'));
        $jeudi_soir_a    = esc_attr(get_option('jeudi_soir_a'));
        $jeudi_closed    = esc_attr(get_option('jeudi_closed'));
        ?>
        <div class="service">
                <span class="service-ok">
                    <input type="checkbox"
                           id="jeudi_midi_open"
                           name="jeudi_midi_open"
                           value="1"
                           <?php checked(1, $jeudi_midi_open, true); ?>
                    />
                    <label for="">Service du midi</label>
                </span><!--./service-->

            <span class="service-de">
                    <label for="">de</label>
                    <input type="time"
                           id="jeudi_midi_de"
                           name="jeudi_midi_de"
                           value="<?php echo $jeudi_midi_de ?>"
                    />
                </span><!--service-a-->
            <span class="service-a">
                        <label for="">à</label>
                        <input type="time"
                               id="jeudi_midi_a"
                               name="jeudi_midi_a"
                               value="<?php echo $jeudi_midi_a ?>"
                        />
                </span><!--service-a-->
        </div>
        <div class="service">
                    <span class="service-ok">
                        <input type="checkbox"
                               id="jeudi_soir_open"
                               name="jeudi_soir_open"
                               value="1"
                               <?php checked(1, $jeudi_soir_open, true); ?>
                        />
                        <label for="">Service du soir</label>
                    </span><!--./service-->

            <span class="service-de">
                        <label for="">de</label>
                        <input type="time"
                               id="jeudi_soir_de"
                               name="jeudi_soir_de"
                               value="<?php echo $jeudi_soir_de ?>"
                        />
                    </span><!--service-a-->
            <span class="service-a">
                    <label for="">à</label>
                    <input type="time"
                           id="jeudi_soir_a"
                           name="jeudi_soir_a"
                           value="<?php echo $jeudi_soir_a ?>"
                    />
            </span><!--service-a-->
        </div>
        <div class="service-close">
                <span class="">
                    <input type="checkbox"
                           id="jeudi_closed"
                           name="jeudi_closed"
                           value="1"
                           <?php checked(1, $jeudi_closed, true) ?>
                    />
                    <label for="">Jour de fermeture</label>
                </span>
        </div>
        <?php
    }

    public static function field_heure_vendredi(){
        $vendredi_midi_open = esc_attr(get_option('vendredi_midi_open'));
        $vendredi_midi_de   = esc_attr(get_option('vendredi_midi_de'));
        $vendredi_midi_a    = esc_attr(get_option('vendredi_midi_a'));
        $vendredi_soir_open = esc_attr(get_option('vendredi_soir_open'));
        $vendredi_soir_de   = esc_attr(get_option('vendredi_soir_de'));
        $vendredi_soir_a    = esc_attr(get_option('vendredi_soir_a'));
        $vendredi_closed    = esc_attr(get_option('vendredi_closed'));
        ?>
        <div class="service">
                <span class="service-ok">
                    <input type="checkbox"
                           id="vendredi_midi_open"
                           name="vendredi_midi_open"
                           value="1"
                           <?php checked(1, $vendredi_midi_open, true); ?>
                    />
                    <label for="">Service du midi</label>
                </span><!--./service-->

            <span class="service-de">
                    <label for="">de</label>
                    <input type="time"
                           id="vendredi_midi_de"
                           name="vendredi_midi_de"
                           value="<?php echo $vendredi_midi_de ?>"
                    />
                </span><!--service-a-->
            <span class="service-a">
                        <label for="">à</label>
                        <input type="time"
                               id="vendredi_midi_a"
                               name="vendredi_midi_a"
                               value="<?php echo $vendredi_midi_a ?>"
                        />
                </span><!--service-a-->
        </div>
        <div class="service">
                    <span class="service-ok">
                        <input type="checkbox"
                               id="vendredi_soir_open"
                               name="vendredi_soir_open"
                               value="1"
                               <?php checked(1, $vendredi_soir_open, true); ?>
                        />
                        <label for="">Service du soir</label>
                    </span><!--./service-->

            <span class="service-de">
                        <label for="">de</label>
                        <input type="time"
                               id="vendredi_soir_de"
                               name="vendredi_soir_de"
                               value="<?php echo $vendredi_soir_de ?>"
                        />
                    </span><!--service-a-->
            <span class="service-a">
                    <label for="">à</label>
                    <input type="time"
                           id="vendredi_soir_a"
                           name="vendredi_soir_a"
                           value="<?php echo $vendredi_soir_a ?>"
                    />
            </span><!--service-a-->
        </div>
        <div class="service-close">
                <span class="">
                    <input type="checkbox"
                           id="vendredi_closed"
                           name="vendredi_closed"
                           value="1"
                           <?php checked(1, $vendredi_closed, true) ?>
                    />
                    <label for="">Jour de fermeture</label>
                </span>
        </div>
        <?php
    }

    public static function field_heure_samedi(){
        $samedi_midi_open = esc_attr(get_option('samedi_midi_open'));
        $samedi_midi_de   = esc_attr(get_option('samedi_midi_de'));
        $samedi_midi_a    = esc_attr(get_option('samedi_midi_a'));
        $samedi_soir_open = esc_attr(get_option('samedi_soir_open'));
        $samedi_soir_de   = esc_attr(get_option('samedi_soir_de'));
        $samedi_soir_a    = esc_attr(get_option('samedi_soir_a'));
        $samedi_closed    = esc_attr(get_option('samedi_closed'));
        ?>
        <div class="service">
                <span class="service-ok">
                    <input type="checkbox"
                           id="samedi_midi_open"
                           name="samedi_midi_open"
                           value="1"
                           <?php checked(1, $samedi_midi_open, true); ?>
                    />
                    <label for="">Service du midi</label>
                </span><!--./service-->

            <span class="service-de">
                    <label for="">de</label>
                    <input type="time"
                           id="samedi_midi_de"
                           name="samedi_midi_de"
                           value="<?php echo $samedi_midi_de ?>"
                    />
                </span><!--service-a-->
            <span class="service-a">
                        <label for="">à</label>
                        <input type="time"
                               id="samedi_midi_a"
                               name="samedi_midi_a"
                               value="<?php echo $samedi_midi_a ?>"
                        />
                </span><!--service-a-->
        </div>
        <div class="service">
                    <span class="service-ok">
                        <input type="checkbox"
                               id="samedi_soir_open"
                               name="samedi_soir_open"
                               value="1"
                               <?php checked(1, $samedi_soir_open, true); ?>
                        />
                        <label for="">Service du soir</label>
                    </span><!--./service-->

            <span class="service-de">
                        <label for="">de</label>
                        <input type="time"
                               id="samedi_soir_de"
                               name="samedi_soir_de"
                               value="<?php echo $samedi_soir_de ?>"
                        />
                    </span><!--service-a-->
            <span class="service-a">
                    <label for="">à</label>
                    <input type="time"
                           id="samedi_soir_a"
                           name="samedi_soir_a"
                           value="<?php echo $samedi_soir_a ?>"
                    />
            </span><!--service-a-->
        </div>
        <div class="service-close">
                <span class="">
                    <input type="checkbox"
                           id="samedi_closed"
                           name="samedi_closed"
                           value="1"
                           <?php checked(1, $samedi_closed, true) ?>
                    />
                    <label for="">Jour de fermeture</label>
                </span>
        </div>
        <?php
    }

    public static function field_heure_dimanche(){
        $dimanche_midi_open = esc_attr(get_option('dimanche_midi_open'));
        $dimanche_midi_de   = esc_attr(get_option('dimanche_midi_de'));
        $dimanche_midi_a    = esc_attr(get_option('dimanche_midi_a'));
        $dimanche_soir_open = esc_attr(get_option('dimanche_soir_open'));
        $dimanche_soir_de   = esc_attr(get_option('dimanche_soir_de'));
        $dimanche_soir_a    = esc_attr(get_option('dimanche_soir_a'));
        $dimanche_closed    = esc_attr(get_option('dimanche_closed'));
        ?>
        <div class="service">
                <span class="service-ok">
                    <input type="checkbox"
                           id="dimanche_midi_open"
                           name="dimanche_midi_open"
                           value="1"
                           <?php checked(1, $dimanche_midi_open, true); ?>
                    />
                    <label for="">Service du midi</label>
                </span><!--./service-->

            <span class="service-de">
                    <label for="">de</label>
                    <input type="time"
                           id="dimanche_midi_de"
                           name="dimanche_midi_de"
                           value="<?php echo $dimanche_midi_de ?>"
                    />
                </span><!--service-a-->
            <span class="service-a">
                        <label for="">à</label>
                        <input type="time"
                               id="dimanche_midi_a"
                               name="dimanche_midi_a"
                               value="<?php echo $dimanche_midi_a ?>"
                        />
                </span><!--service-a-->
        </div>
        <div class="service">
                    <span class="service-ok">
                        <input type="checkbox"
                               id="dimanche_soir_open"
                               name="dimanche_soir_open"
                               value="1"
                               <?php checked(1, $dimanche_soir_open, true); ?>
                        />
                        <label for="">Service du soir</label>
                    </span><!--./service-->

            <span class="service-de">
                        <label for="">de</label>
                        <input type="time"
                               id="dimanche_soir_de"
                               name="dimanche_soir_de"
                               value="<?php echo $dimanche_soir_de ?>"
                        />
                    </span><!--service-a-->
            <span class="service-a">
                    <label for="">à</label>
                    <input type="time"
                           id="dimanche_soir_a"
                           name="dimanche_soir_a"
                           value="<?php echo $dimanche_soir_a ?>"
                    />
            </span><!--service-a-->
        </div>
        <div class="service-close">
                <span class="">
                    <input type="checkbox"
                           id="dimanche_closed"
                           name="dimanche_closed"
                           value="1"
                           <?php checked(1, $dimanche_closed, true) ?>
                    />
                    <label for="">Jour de fermeture</label>
                </span>
        </div>
        <?php
    }


    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */
}

if (class_exists('pekinparis_timetable')) {
    pekinparis_timetable::register();
}
