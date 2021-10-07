<?php
/**
 * Name file:   horaire
 * Description: display the template part for informations hours opening
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */
?>


<table class="table-horaire">

    <tr class="item-days">
        <td class="day">Lundi</td>
        <td>
            <?php if(checked(1, get_option('lundi_midi_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('lundi_midi_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('lundi_midi_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('lundi_soir_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('lundi_soir_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('lundi_soir_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('lundi_closed'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item">Fermé</li>
                </ul>
            <?php endif; ?>
        </td>
    </tr><!--//item-days-->

    <tr class="item-days">
        <td class="day">Mardi</td>
        <td>
            <?php if(checked(1, get_option('mardi_midi_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('mardi_midi_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('mardi_midi_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('mardi_soir_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('mardi_soir_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('mardi_soir_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('mardi_closed'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item">Fermé</li>
                </ul>
            <?php endif; ?>
        </td>
    </tr><!--//item-days-->

    <tr class="item-days">
        <td class="day">Mercredi</td>
        <td>
            <?php if(checked(1, get_option('mercredi_midi_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('mercredi_midi_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('mercredi_midi_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('mercredi_soir_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('mercredi_soir_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('mercredi_soir_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('mercredi_closed'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item">Fermé</li>
                </ul>
            <?php endif; ?>

        </td>
    </tr><!--//item-days-->

    <tr class="item-days">
        <td class="day">Jeudi</td>
        <td>
            <?php if(checked(1, get_option('jeudi_midi_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('jeudi_midi_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('jeudi_midi_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('jeudi_soir_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('jeudi_soir_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('jeudi_soir_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('jeudi_closed'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item">Fermé</li>
                </ul>
            <?php endif; ?>
        </td>
    </tr><!--//item-days-->

    <tr class="item-days">
        <td class="day">Vendredi</td>
        <td>
            <?php if(checked(1, get_option('vendredi_midi_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('vendredi_midi_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('vendredi_midi_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('vendredi_soir_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('vendredi_soir_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('vendredi_soir_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('vendredi_closed'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item">Fermé</li>
                </ul>
            <?php endif; ?>
        </td>
    </tr><!--//item-days-->

    <tr class="item-days">
        <td class="day">Samedi</td>
        <td>
            <?php if(checked(1, get_option('samedi_midi_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('samedi_midi_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('samedi_midi_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('samedi_soir_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('samedi_soir_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('samedi_soir_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('samedi_closed'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item">Fermé</li>
                </ul>
            <?php endif; ?>
        </td>
    </tr><!--//item-days-->

    <tr class="item-days">
        <td class="day">Dimanche</td>
        <td>
            <?php if(checked(1, get_option('dimanche_midi_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('dimanche_midi_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('dimanche_midi_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('dimanche_soir_open'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item"><?php echo get_option('dimanche_soir_de') ?></li>
                    <li class="hour-item">-</li>
                    <li class="hour-item"><?php echo get_option('dimanche_soir_a') ?></li>
                </ul>
            <?php endif; ?>
            <?php if(checked(1, get_option('dimanche_closed'), false)): ?>
                <ul class="hour-list">
                    <li class="hour-item">Fermé</li>
                </ul>
            <?php endif; ?>
        </td>
    </tr><!--//item-days-->

</table>
