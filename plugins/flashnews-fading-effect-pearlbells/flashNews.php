<?php
/*
Plugin Name: Flash News / Post (Responsive)
Plugin URI: http://pearlbells.co.uk/
Description:  Custom Post Slideshow ( based on category optional) Pearlbells
Version:  4.0
Author:Pearlbells
Author URI: http://pearlbells.co.uk/contact-page
License: GPL2
*/
/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version. 

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details. 

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.

*/
namespace flashnewspearlbells;
include_once 'includes/form.php';
include_once 'includes/data.php';
include_once 'includes/optionsValues.php';
include_once 'includes/style.php';
//extends \WP_Widget
class flashNews extends \WP_Widget {
    
     private $objFlashDisplayForms;
     private $objOptions;
     private $objStyle;
     private $objData;
     
     public function __construct() {
         add_action( 'admin_menu', array( $this, 'menu' ) );
         $this->objOptions = new optionsValues;
         $this->objFlashDisplayForms = new flashDisplayForm;
         $this->objOptions->add_options();
         $this->objData = new dataFlashPearl;
         $this->objStyle = new styleData;
         register_deactivation_hook(__FILE__, array( $this, 'pearl_uninstall' ));
         $params = array( 
                    'description' => 'Display post as fade in / out slideshow',
                    'name' => 'Flash News Fade in/out');
        parent::__construct('flashNews','',$params);
     }
   
     public function pearl_uninstall() {
         $this->objOptions->delete_options();
     }
     public function menu() {
       
        add_menu_page( 'Flash News', 'Flash News', 'manage_options','pearl-flash-news' );
        add_submenu_page( 'pearl-flash-news', 'Settings', 'Settings', 'manage_options', 'pearl-flash-news', array( $this, 'opt_page' ) );
        add_submenu_page( 'pearl-flash-news', 'News', 'News', 'manage_options', 'pearl-flash-post', array( $this, 'display_news' ) );  
        
     }
  
     public function opt_page() {
        
         $this->postData();
     }
     
     public function display_news() {
         if($_REQUEST['save']) 
             $this->objOptions->update_options();
       $this->objFlashDisplayForms->postForm();
     }
     
     public function postData() {
    
        if($_REQUEST['submit']) 
            $this->objOptions->update_options();       
         $this->objFlashDisplayForms->optionsForm();
       
    }
    
    public function form($instance)
    {
        extract($instance);
        $default_post_types = array('post' => 'post');
        $post_types =  get_post_types(array('_builtin' => false));
        $post_types = array_merge( $default_post_types , $post_types);
        ?>
         <p>
            <label for="<?php echo $this->get_field_id('title')?>"> Title : </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title');?>"
                   name="<?php echo $this->get_field_name('title');?>"
                   value="<?php if(isset($title)) echo esc_attr($title);?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_type')?>"> Post Type : </label>
            <select id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>" class="widefat" style="width:100%;">
                <option value="">Select</option>
                <?php foreach( $post_types as $post_type ) { ?>
                <option <?php selected( $instance['post_type'], $post_type ); ?> value="<?php echo $post_type; ?>"><?php echo ucfirst($post_type); ?></option>
                <?php } ?>      
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('category')?>"> Category : </label>
            <select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="width:100%;">
                <option value="">Select</option>
                <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
                <option <?php selected( $instance['category'], $term->name ); ?> value="<?php echo $term->name; ?>"><?php echo $term->name; ?></option>
                <?php } ?>      
            </select>
        </p>
         <p>
            <label for="<?php echo $this->get_field_id('posts_per_page')?>"> No of Posts : </label>
            <input class="widefat" type="number" id="<?php echo $this->get_field_id('posts_per_page');?>"
                   name="<?php echo $this->get_field_name('posts_per_page');?>"
                   value="<?php if(isset($posts_per_page)) echo esc_attr($posts_per_page); else echo '5';?>"/>
        </p>
       
        <?php
      
               
        
    }
    
    public function widget($args , $instance)
    {
        extract($args);
        extract($instance);
        echo $before_title . $title . $after_title;  
       
        $pearl_flash_news_fade_in_out = $this->objData->pearl_flash_news_fade_in_out($instance);
        echo $pearl_flash_news_fade_in_out;
    }
     
}

add_action('widgets_init',function ()
{
    register_widget('flashnewspearlbells\flashNews');
});
?>
