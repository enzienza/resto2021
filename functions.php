<?php
/**
 * Name file:   functions
 * Description: file contains all the functions of the theme
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */

/**
 * INDEX
 *
 * 1 - Customize
 * 2 - Metaboxes
 * 3 - Options-Theme
 * 4 - Post-Type
 * 5 - Taxonomies
 */

/** =====================================================
 *  1 - CUSTOMIZE
 */
/* customize theme */
require_once('inc/customize/config-theme.php');

/* customize back-end */
require_once ('inc/customize/config-admin.php');
require_once ('inc/customize/custom-dashboard.php');

/* customize columns */



/* customize front-end */


/** =====================================================
 *  2 - METABOXES
 */


/** =====================================================
 *  3 - OPTIONS-THEME
 */
require_once ('inc/options-theme/generality.php');
require_once ('inc/options-theme/horaire.php');
require_once ('inc/options-theme/customtheme.php');

// customTheme
require_once ('inc/options-theme/customtheme/homepage.php');
require_once ('inc/options-theme/customtheme/cartepage.php');
require_once ('inc/options-theme/customtheme/takeawaypage.php');
require_once ('inc/options-theme/customtheme/eventpage.php');
require_once ('inc/options-theme/customtheme/errorpage.php');




/** =====================================================
 *  4 - POST-TYPE
 */



/** =====================================================
 *  5 - TAXONOMIES
 */
