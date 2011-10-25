<?php
/*
Plugin Name: RubyConf Uruguay Ribbon
Plugin URI: http://rubyconfuruguay.org
Description: A simple WordPress plugin to add a RubyConf Uruguay ribbon to your blog. Visit http://rubyconfuruguay.org/ to know more about Ruby Conf Uruguay.
Version: 0.1
Author: Fernando Briano
Author URI: http://picandocodigo.net/
*/

/* Copyright 2011  Fernando Briano  (email : fernando@picandocodigo.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
add_action('wp_footer ', 'rubyconfuy_ribbon');

new RubyConfUy_Ribbon;

class RubyConfUy_Ribbon{

  function __construct() {
    add_action( 'wp_print_styles' , array( &$this, 'enqueue_style' ) );
    add_action( 'wp_footer', array( &$this, 'enqueue_ribbon' ) );
  }

  function enqueue_ribbon() {
    $rcuy_img = plugins_url( 'img/rubyconfuy.png' , __FILE__ );
    $rubyconfuy_ribbon = '';
    $rubyconfuy_ribbon .= '<img id="rubyconfuy_ribbon"  src=' . $rcuy_img . ' alt="RubyConf Uruguay ' . date("Y") . '" ';
    $rubyconfuy_ribbon .= ' usemap="#rcuymap"/></a>';
    $rubyconfuy_ribbon .= '<map name="rcuymap">';
    $rubyconfuy_ribbon .= '<area shape="polygon" coords="0,0,200,0,200,200" href="http://rubyconfuruguay.org" alt="RubyConf Uruguay ' . date("Y") . '"/>';
    $rubyconfuy_ribbon .= '</map>';
    echo $rubyconfuy_ribbon;
  }

  function enqueue_style() {
    $rcuy_src = plugins_url( 'rubyconfuy-style.css' , __FILE__ );
    wp_register_style( 'rubyconfuy-style', $rcuy_src );
    wp_enqueue_style( 'rubyconfuy-style' );
  }
}

?>