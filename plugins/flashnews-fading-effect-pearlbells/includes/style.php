<?php
namespace flashnewspearlbells;
class styleData {
    
    public function __construct() {

        add_action( 'wp_enqueue_scripts', array($this,'safely_add_stylesheet') );
        add_action('wp_head', array($this,'pearl_script'));

    }

    public function safely_add_stylesheet() {

             wp_enqueue_style( 'flash-news', plugins_url('../css/style.css', __FILE__) );
                 
             $custom_css = '
                .pearl_flash_news_fade_in_out {
                     background-color: '.get_option('pearl_flash_news_fade_in_out_bg_color').';
                     border-color: '.get_option('pearl_flash_news_fade_in_out_border_color').';
                     border-style: solid;
                     border-width: '.get_option('pearl_flash_news_fade_in_out_border_width').';
                     padding: '.get_option('pearl_flash_news_fade_in_out_padding').';
                     min-height: '.get_option('pearl_flash_news_fade_in_out_height').';
                }
                
                .pearl_flash_news_fade_in_out  {
                     font-color: '.get_option('pearl_flash_news_fade_in_out_font_color').';
                     font-size: '.get_option('pearl_flash_news_fade_in_out_font_size').';
                     letter-spacing: '.get_option('pearl_flash_news_fade_in_out_letter_spacing').';
                   
                }
                .pearl_flash_news_fade_in_out .pearl-link  {
                    font-size: '.get_option('pearl_flash_news_fade_in_out_font_size').';
                }
                ';
                wp_add_inline_style( 'flash-news', $custom_css );
         }

    public function pearl_script()
    {            
         // create array of all scripts
        $scripts = array( 'jquery' => 'js/jquery.js',
                          'mainfade' => 'js/mainfade.js' );
        $pluginOptions = array(
                'news_delay' => get_option( 'pearl_flash_news_fade_in_out_delay' ),
            );
        foreach($scripts as $key => $sc)
        {
           wp_deregister_script( $key );
           wp_register_script( $key, plugin_dir_url(dirname(__FILE__)).$sc , array('jquery') );
           wp_enqueue_script( $key );  
        }
        wp_localize_script( 'mainfade', 'pluginOptionsFade', $pluginOptions ); 
    }

}
?>
