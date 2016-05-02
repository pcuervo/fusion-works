<?php
namespace flashnewspearlbells;
class optionsValues {
    
    public function add_options()
    {
        add_option('pearl_flash_news_fade_in_out_content','Do you want to display flash news concisely in your webpage and link it to the main page? This plugin helps to display 
            flash news in your WordPress website. You can link your news to the different webpages using the read more link button. -- Do you want to display flash news in your webpage or post ? 
            This plugin help to display flash news in your webpage /post as a loop with typewriter effect.
            ','','yes');
        add_option('pearl_flash_news_fade_in_out_links','http://pearlbells.co.uk/flash-news-fade-inout-pearlbells/ -- http://pearlbells.co.uk/news-typewriter/','','yes');
        add_option('pearl_flash_news_fade_in_out_font_color','#000000','','yes');
        add_option('pearl_flash_news_fade_in_out_font_size','14px','','yes');
        add_option('pearl_flash_news_fade_in_out_delay','3000','','yes');
        add_option('pearl_flash_news_fade_in_out_letter_spacing','2px','','yes');
        add_option('pearl_flash_news_fade_in_out_padding','10px','','yes');
        add_option('pearl_flash_news_fade_in_out_border_width','1px','','yes');
        add_option('pearl_flash_news_fade_in_out_border_color','#cccccc','','yes');
        add_option('pearl_flash_news_fade_in_out_height','180px','','yes');
        //add_option('pearl_flash_news_fade_in_out_width','700px','','yes');
        add_option('pearl_flash_news_fade_in_out_bg_color','#f0f0f0','','yes');	
        add_option('pearl_flash_news_fade_in_out_read_more','yes','','yes');
        add_option('pearl_news_flash_font_color_read_more','#cc4a00','','yes');
        add_option('pearl_news_flash_read_more_new_window','yes','','yes');
        add_option('pearl_news_flash_characters','250','','yes');
    }
    
    public function update_options() {
        
        $ok = false;
        $message = '';
        $optionValues = $_POST;
   
        foreach($optionValues as $key => $value){
            
          if ( get_option( $key ) !== false ) {
            update_option($key,$value);
			$ok = true;
          }
            
        }
        
        if($ok)
        {
            $message = '<div id="message" class="updated fade"><p>Options Saved</p></div>';
        }
        else
        {
            $message = '<div id="message" class="error fade"><p>Failed to save options</p></div> ';

        }
       
        echo $message;
       
        
    }
    
    public function delete_options()
    {
        delete_option('pearl_news_flash_read_more_new_window');
        delete_option('pearl_news_flash_font_color_read_more');
        delete_option('pearl_flash_news_fade_in_out_read_more');
        delete_option('pearl_flash_news_fade_in_out_links');
        delete_option('pearl_flash_news_fade_in_out_height');	  
        delete_option('pearl_news_flash_characters');
        delete_option('pearl_flash_news_fade_in_out_bg_color');		
        delete_option('pearl_flash_news_fade_in_out_padding');	  
        delete_option('pearl_flash_news_fade_in_out_border_width');
        delete_option('pearl_flash_news_fade_in_out_border_color');		
        delete_option('pearl_flash_news_fade_in_out_letter_spacing');	  
        delete_option('pearl_flash_news_fade_in_out_content');
        delete_option('pearl_flash_news_fade_in_out_font_color');
        delete_option('pearl_flash_news_fade_in_out_font_size');		
        delete_option('pearl_flash_news_fade_in_out_delay');
    }
    
   
    
}
?>
