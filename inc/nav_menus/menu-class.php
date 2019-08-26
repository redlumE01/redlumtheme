<?php

// Menu Class

class Menu
{

    public static function renderWPmenu() {

        $mobileBeforeWrap = '
            <div class="mobile_menu">
                <div class="mobile_menu__button">
                <svg class="mobile_menu__hamburger" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">><g><g id="Navicon" transform="translate(330.000000, 232.000000)"><polygon class="hamburger" id="Fill-19" points="-321.8,-219 -274.3,-219 -274.3,-212.7 -321.8,-212.7 "/><polygon class="hamburger" id="Fill-20" points="-321.8,-203.2 -274.3,-203.2 -274.3,-196.8 -321.8,-196.8 "/><polygon class="hamburger" id="Fill-21" points="-321.8,-187.3 -274.3,-187.3 -274.3,-181 -321.8,-181 "/></g></g></svg>
                <svg class="mobile_menu__close-button" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><g><line fill="none" x1="2.929" y1="17.071" x2="17.071" y2="2.929"/></g><g><line fill="none" x1="2.929" y1="2.929" x2="17.071" y2="17.071"/></g></svg>
                <span>Menu</span>
            </div>
        ';

        $mobileAfterWrap = '</div>';

        if (has_nav_menu('header-menu')) {
            wp_nav_menu(
                array(
                    'walker' => new Nav_Main_Walker(),
                    'theme_location' => 'header-menu',
                    'container' => 'nav',
                    'container_class' => 'nav',
                    'menu_class' => 'nobullets nav__list',
                    'list_item_class'  => 'nav-item',
                    'link_class'   => 'nav-link m-2 menu-item nav-active'
                )
            );
        }

        if ( has_nav_menu('mobile-menu') ) {

            $html = '';
            $html .= $mobileBeforeWrap;

            $html .=
                wp_nav_menu(array(
                    'walker' => new Nav_Mobile01_Walker(),
                    'container' => 'nav',
                    'menu_class' => 'nobullets mobile_menu__list',
                    'theme_location' => 'mobile-menu',
                    'echo' => false,
                    'fallback_cb' => false
                )
            );

            $html .= $mobileAfterWrap;


            return $html;

        }


    }

}