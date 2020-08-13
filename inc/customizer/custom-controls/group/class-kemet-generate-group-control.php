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
     * Instance
     *
     * @access private
     * @var object
     */
    private static $instance;
        
    /**
    * The control Id.
    *
    * @access public
    * @var string
    */
    public $group_settings = array();

    /**
    * The control childern.
    *
    * @access public
    * @var array
    */
    public $fields = array();
    
    /**
    * wp_customize.
    *
    * @access public
    * @var array
    */
    public $wp_customize = array();

    /**
    * sanitize array.
    *
    * @access public
    * @var array
    */
    public $sanitize = array(
        'kmt-responsive-slider' => 'sanitize_responsive_slider',
    );

    /**
     * Initiator
     */
    public static function get_instance($wp_customize, $group_settings , $fields) {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self($wp_customize, $group_settings , $fields);
        }
        return self::$instance;
    }

    /**
     * Constructor
     */    
    function __construct( $wp_customize, $group_settings , $fields ) {
		$this->group_settings = $group_settings;
        $this->fields = $fields;
        $this->wp_customize = $wp_customize;

        $this->create_group($wp_customize);
        $this->create_hidden_controls($wp_customize);
    }
    function create_hidden_controls($wp_customize){
        
        $options = $this->fields;
        
        foreach($options as $option){
                
            $wp_customize->add_setting( KEMET_THEME_SETTINGS . $option['id'], 
                array(
                    'default' => $option['default'],
                    'type' => $option['type'],
                    'transport' => $option['transport'],
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', $this->sanitize[$option['control_type']] ),
                )
            );
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

    function create_group($wp_customize){
        
        $wp_customize->add_control(
            new Kemet_Control_Group(
                $wp_customize, $this->group_settings['parent_id'], $this->group_settings
            )
        );
    }
}
