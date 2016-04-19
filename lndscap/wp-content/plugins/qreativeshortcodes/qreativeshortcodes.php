<?php
/*
Plugin Name: QreativeShortcodes
Plugin URI: http://www.qreativethemes.com
Description: Shortcodes for QreativeThemes WP Themes
Version: 1.0.1
Author: QreativeThemes
Author URI: http://www.qreativethemes.com
License: GPL2 or later
Text domain: qreativeshortcodes
*/

class QreativeShortcodes {
	
    /**
     * CSS Styles for the shortcodes are included with the WP Theme
     * because they are based on the style of the theme
     */
	public function __construct() {
    	add_action( 'init', array( $this, 'add_shortcodes' ) );
    	add_filter( 'widget_text', 'do_shortcode' );
	}
    
	/*--------------------------------------------------------------------------------------
     * add_shortcode
     *-------------------------------------------------------------------------------------*/
	public function add_shortcodes() {
		$shortcodes = array(
			'fa',
			'button',
			'table',
			'toggle',
            'dropcap',
            'seperator',
            'collapsibles',
            'collapse'
		);
		
		foreach ( $shortcodes as $shortcode ) {
			$function = 'qt_' . str_replace( '-', '_', $shortcode );
			add_shortcode( $shortcode, array( $this, $function ) );
    	}
	}

	/*--------------------------------------------------------------------------------------
     * Icon Shortcode
     *-------------------------------------------------------------------------------------*/
    function qt_fa( $atts, $content = null ) {
    	extract(shortcode_atts( array(
			'icon'   => 'fa-home',
			'href'   => '',
			'target' => '_self',
		), $atts ) );

    	if ( empty( $href ) ) {
    		return '<span class="icon-wrap"><i class="fa ' . strtolower( $icon ) . '"></i></span>';
        } else {
    		return '<a class="icon-wrap" href="' . $href . '" target="' . $target . '"><i class="fa ' . strtolower( $icon ) . '"></i></a>';
        }
    }

    /*--------------------------------------------------------------------------------------
     * Button Shortcode
     *-------------------------------------------------------------------------------------*/
    function qt_button( $atts , $content = null ) {
    	extract( shortcode_atts( array(
			'style' => 'primary', 'outline',
			'icon' => '',
			'href' => '',
			'target' => '_self',
            'fullwidth' => '',
            'edges' => '',
		), $atts ) );


        // Check Rounded Attribute
        if( $edges === 'rounded' ) {
            $edges = ' rounded';
        } else {
            $edges = '';
        }

        // Check Fullwidth Attribute
        if( $fullwidth === 'true' ) {
            $fullwidth = ' fullwidth'; 
        } else {
            $fullwidth = '';
        }

        if ( ! empty( $icon ) ) {
            return '<a href="' . $href . '" class="btn btn-' . strtolower( $style ) . strtolower( $edges ) . strtolower( $fullwidth ) . '" target="' . $target . '"><i class="fa ' . strtolower( $icon ) .'"></i>' . $content . '</a>';
        } else {
            return '<a href="' . $href . '" class="btn btn-' . strtolower( $style ) . strtolower( $edges ) . strtolower( $fullwidth ) . '" target="' . $target . '">' . $content . '</a>';
        }
    }

    /*--------------------------------------------------------------------------------------
     * Table Shortcode
     *-------------------------------------------------------------------------------------*/
    function qt_table( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'cols' => 'none',
            'data' => 'none',
            'style' => 'default'
        ), $atts ) );

        $cols  = explode(',',$cols);
        $data  = explode(',',$data);
        $total = count($cols);
        
        $output = '<table class="qt-table ' . strtolower( $style ) . '"><thead>';
        
        foreach( $cols as $col ) {
            $output .= '<td>'.$col.'</td>';
        }
       
        $output .= '</thead><tr>';
        $counter = 1;
       
        foreach( $data as $datum ) {
            $output .= '<td>'.$datum.'</td>';
            if($counter%$total==0) {
                $output .= '</tr>';
            }
            $counter++;
        }

        $output .= '</table>';
        return $output;
    }

    /*--------------------------------------------------------------------------------------
     * Collapse (Accordion) Shortcode
     * @author Filip Stefansson
     * @see https://goo.gl/wTWkA4
     *-------------------------------------------------------------------------------------*/
    function qt_collapsibles( $atts, $content = null ) {
        if( isset($GLOBALS['collapsibles_count']) ) {
            $GLOBALS['collapsibles_count']++;
        } else {
            $GLOBALS['collapsibles_count'] = 0;
        }

        $defaults = array();
        extract( shortcode_atts( $defaults, $atts ) );
        // Extract the tab titles for use in the tab widget.
        preg_match_all( '/collapse title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
        $tab_titles = array();
        
        if( isset( $matches[1] ) ){
            $tab_titles = $matches[1];
        }
        $output = '';
        
        if( count( $tab_titles ) ){
            $output .= '<div class="panel-group" id="accordion-' . $GLOBALS['collapsibles_count'] . '" data-panel="accordion-' . $GLOBALS['collapsibles_count'] . '">';
            $output .= do_shortcode( $content );
            $output .= '</div>';
        } else {
            $output .= do_shortcode( $content );
        }

        return $output;
    }
     
    function qt_collapse( $atts, $content = null ) {
        if( !isset($GLOBALS['current_collapse']) ){
            $GLOBALS['current_collapse'] = 0;
        } else {
            $GLOBALS['current_collapse']++;
        }

        extract( shortcode_atts( array(
            "title"  => '',
            "active" => '',
            "state" => false
        ), $atts ) );

        if ( $state == "active" ) {
            $state = 'in';
            $active = 'active';
        }

        return '<div class="panel"><div class="panel-heading"><h3 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-' . $GLOBALS['collapsibles_count'] . '" href="#collapse_' . $GLOBALS['current_collapse'] . '" ' . ( ! empty( $active ) ? 'aria-expanded="true"' : '' ) . '>' . $title . '</a></h3></div><div id="collapse_' . $GLOBALS['current_collapse'] . '" class="panel-collapse collapse ' . $state . '"><div class="panel-body">' . do_shortcode($content) . ' </div></div></div>';
    }

    /*--------------------------------------------------------------------------------------
     * Dropcap Shortcode
     *-------------------------------------------------------------------------------------*/
    function qt_dropcap( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'style'  => 'style1',
            'title'  => ''
        ), $atts ) );

        $outpout = '';

        if ( ! empty( $title ) ) :
            $output = '<div class="dropcap-wrap"><div class="dropcap-pull"><span class="dropcap ' . $style .'">' . $content . '</span></div><span class="dropcap-title"> ' . $title .'</span></div>';
        else :
            $output = '<span class="dropcap ' . $style .'">' . $content . '</span>';
        endif;

        return $output;
    }

    /*--------------------------------------------------------------------------------------
     * Seperator Shortcode
     *-------------------------------------------------------------------------------------*/
    function qt_seperator( $atts = null, $content = null ) {
        return '<span class="seperator"></span>';
    }
}

new QreativeShortcodes();