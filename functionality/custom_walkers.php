<?php

// Main

class Nav_Main_Walker extends Walker_Nav_Menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' '
            ,   apply_filters(
                'nav_menu_css_class'
                ,   array_filter( $classes ), $item
            )
        );

        ! empty ( $class_names )
        and $class_names = ' class="'. esc_attr( $class_names ) . ' nav__item"';

        $output .= "<li $class_names>";

        $attributes  = '';

        ! empty( $item->attr_title )
        and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
        and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
        and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
        and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        $attributes .= ' class=nav__link';

        $description = ( ! empty ( $item->description ) and 0 == $depth ) ? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small>' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
            . $description
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
            ,   $item_output
            ,   $item
            ,   $depth
            ,   $args
        );
    }
}


// Mobile

class Nav_Mobile01_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat( "\t", $depth );
      $output .= "\n$indent<ul role=\"menu\" class=\" nobullets mobile_menu__list\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

  if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
    $output .= $indent . '<li role="presentation" class="divider">';
  } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
    $output .= $indent . '<li role="presentation" class="divider">';
  } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
    $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
  } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
    $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
  } else {

    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $classes[] = 'mobile_menu__item';

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    if ( $args->has_children )
      $class_names .= ' dropdown';
    if ( in_array( 'current-menu-item', $classes ) )
    $class_names .= ' active';
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $output .= $indent . '<li' . $value . $class_names .'>';
    $atts = array();
    $atts['title']  = ! empty( $item->title )	? $item->title	: '';
    $atts['target'] = ! empty( $item->target )	? $item->target	: '';
    $atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
    $atts['class'] = 'mobile_menu__link';

    $atts['href'] = ! empty( $item->url ) ? $item->url : '';
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

    $attributes = '';

    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }
    $item_output = $args->before;

    if ( ! empty( $item->attr_title ) )
      $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
    else
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= ( $args->has_children && 0 === $depth ) ? '</a><span class="j-sub-trigger"><svg enable-background="new 0 0 100 100" id="Layer_1" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon stroke-width="2px" points="23.1,34.1 51.5,61.7 80,34.1 81.5,35 51.5,64.1 21.5,35 23.1,34.1 "/></svg>
    </span>' : '</a>';
    $item_output .= $args->after;
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}

    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
          if ( ! $element )
              return;
          $id_field = $this->db_fields['id'];
          // Display this element.
          if ( is_object( $args[0] ) )
             $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
          parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    public static function fallback( $args ) {
        if ( current_user_can( 'manage_options' ) ) {
            extract( $args );
            $fb_output = null;
            if ( $container ) {
                $fb_output = '<' . $container;
                if ( $container_id )
                $fb_output .= ' id="' . $container_id . '"';
                if ( $container_class )
                $fb_output .= ' class="' . $container_class . '"';
                $fb_output .= '>';
            }
            $fb_output .= '<ul';
            if ( $menu_id )
                $fb_output .= ' id="' . $menu_id . '"';
            if ( $menu_class )
                $fb_output .= ' class="' . $menu_class . '"';
                $fb_output .= '>';
                $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
                $fb_output .= '</ul>';
            if ( $container )
                $fb_output .= '</' . $container . '>';
            echo $fb_output;
        }
    }
}
