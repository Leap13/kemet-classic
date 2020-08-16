<?php
/**
*
* @package     Kemet
* @author      Kemet
* @copyright   Copyright ( c ) 2019, Kemet
* @link        https://kemet.io/
* @since       1.0.9
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
* Group
*/

class Kemet_Generate_Control_Group {
            
    /**
    * sanitize array.
    *
    * @access public
    * @var array
    */
    public $sanitize = array(
        'kmt-responsive-slider' => array('Kemet_Customizer_Sanitizes' , 'sanitize_responsive_slider'),
        'kmt-font-family' => 'sanitize_text_field',
        'kmt-font-weight' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
        'kmt-select' => 'sanitize_text_field',
    );

    /**
     * Constructor
     */    
    function __construct( $wp_customize, $group_settings , $fields ) {

        $this->create_group($wp_customize , $group_settings);
        $this->create_hidden_controls($wp_customize , $fields);
    }
    function create_hidden_controls($wp_customize , $fields){
        
        $options = $fields;
        
        foreach($options as $option){

            $setting = array(
                'default' => $option['default'],
                'type' => $option['type'],
                'sanitize_callback' => $this->sanitize[$option['control_type']],
            ); 
            
            if(isset($option['transport'])){
                $setting['transport'] = $option['transport'];
            }   
            $wp_customize->add_setting( KEMET_THEME_SETTINGS . $option['id'], $setting);
            $wp_customize->add_control(
                new Kemet_Control_Hidden($wp_customize , KEMET_THEME_SETTINGS . $option['id'] ,array(
                        'type'           => 'kmt-hidden',
                        'section'        => $option['section'],
                        'priority'       => $option['priority'],
                    )
                )
            );
        }
    }

    function create_group($wp_customize , $group_settings){
        
        $wp_customize->add_control(
            new Kemet_Control_Group(
                $wp_customize, $group_settings['parent_id'], $group_settings
            )
        );
    }
}
