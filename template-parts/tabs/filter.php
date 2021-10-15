<?php
/**
 * Name file :   nav-tabs
 * Description : Loads 'nav-tabs' template-part on pages
 *               ==> Each tabs is present for pages : buffet, cartes, emporters
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<li class="nav-item">
    <a
        class="nav-link"
        id="tab-<?php $title = sanitize_title(get_the_title()); echo $title;?>"
        data-toggle="tab"
        href="#<?php $title = sanitize_title(get_the_title()); echo $title;?>"
        role="tab"
        aria-controls="<?php $title = sanitize_title(get_the_title()); echo $title;?>"
        aria-selected="true"
    >
        <p class="item-name"><?php the_title(); ?></p>
    </a>
</li>
