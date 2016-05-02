<?php
namespace flashnewspearlbells;
class flashDisplayForm {
   
    public function postForm() {
     
        $default_pearl_flash_news_fade_in_out_content = get_option('pearl_flash_news_fade_in_out_content');
        $default_pearl_flash_news_fade_in_out_links = get_option('pearl_flash_news_fade_in_out_links');
        $default_pearl_news_flash_font_color_read_more = get_option('pearl_news_flash_font_color_read_more');
        $yesStatus = ( ( get_option('pearl_flash_news_fade_in_out_read_more') == 'yes' )  ) ? 'checked' : 'unchecked';
        $noStatus = ( get_option('pearl_flash_news_fade_in_out_read_more') == 'no'  ) ? 'checked' : 'unchecked';
        $yesNewWindow = ( ( get_option('pearl_news_flash_read_more_new_window') == 'yes' )  ) ? 'checked' : 'unchecked';
        $noNewWindow = ( get_option('pearl_news_flash_read_more_new_window') == 'no'  ) ? 'checked' : 'unchecked';
        
        $displayPostForm = '<div class = "wrap">
                            <form method="post" action="'.$PHP_SELF.'">
                            <h1>Display News</h1> 
                            <label for="pearl_flash_news_fade_in_out_content">Enter Flashing News :(Enter flash news here and use -- as separator)</label><br/>
                            <textarea rows="8" cols="50" name="pearl_flash_news_fade_in_out_content" >'.$default_pearl_flash_news_fade_in_out_content.'</textarea><br/>
                            <label for="pearl_flash_news_fade_in_out_links">Enter Read More links as the same order as news :(Enter flash news links here and use -- as separator)</label><br/>
                            <textarea rows="8" cols="50" name="pearl_flash_news_fade_in_out_links" >'.$default_pearl_flash_news_fade_in_out_links.'</textarea><br/>  ';
                            $displayPostForm .= '<h3>Read More Settings</h3>
                            <label for="pearl_flash_news_fade_in_out_read_more">Show Read More :</label>
                            <input type="radio" name="pearl_flash_news_fade_in_out_read_more" value="yes" '.$yesStatus.' /> Yes 
                            <input type="radio" name="pearl_flash_news_fade_in_out_read_more" value="no" '.$noStatus.' /> No<br/>
                            <label for="pearl_news_flash_font_color_read_more">Read More Color :</label>
                            <input type="text" name="pearl_news_flash_font_color_read_more" value="'.$default_pearl_news_flash_font_color_read_more.'"/><br/>
           
                            <label for="pearl_news_flash_read_more_new_window">Show Read More (New Window) :</label>
                            <input type="radio" name="pearl_news_flash_read_more_new_window" value="yes"'.$yesNewWindow.' /> Yes 
                            <input type="radio" name="pearl_news_flash_read_more_new_window" value="no"'.$noNewWindow.' /> No<br/>';
        $displayPostForm .= '<p class="submit"><input type="submit" value="Save Changes" class="button button-primary" id="submit" name="save"></p></form>
                            </div>';
      echo $displayPostForm;
      $this->authorDetails();
    }
    public function optionsForm() {
                
          $displayOptionsForm = '
                
           <form method="post" action="'.$PHP_SELF.'">
           <h3>Settings</h3>          
           <label for="pearl_flash_news_fade_in_out_bg_color">Bg Color :</label>
           <input type="text" name="pearl_flash_news_fade_in_out_bg_color" value="'.get_option('pearl_flash_news_fade_in_out_bg_color').'"/>       
           <label for="pearl_flash_news_fade_in_out_padding">Padding :</label>
           <input type="text" name="pearl_flash_news_fade_in_out_padding" value="'.get_option('pearl_flash_news_fade_in_out_padding').'"/>
           <label for="pearl_flash_news_fade_in_out_border_width">Border Width :</label>
           <input type="text" name="pearl_flash_news_fade_in_out_border_width" value="'.get_option('pearl_flash_news_fade_in_out_border_width').'"/><br/>
           <label for="pearl_flash_news_fade_in_out_border_color">Border Color :</label>
           <input type="text" name="pearl_flash_news_fade_in_out_border_color" value="'.get_option('pearl_flash_news_fade_in_out_border_color').'"/>      
           <label for="pearl_flash_news_fade_in_out_font_color">Font Color :</label>
           <input type="text" name="pearl_flash_news_fade_in_out_font_color" value="'.get_option('pearl_flash_news_fade_in_out_font_color').'"/>
           <label for="pearl_flash_news_fade_in_out_font_size">Font Size :</label>
           <input type="text" name="pearl_flash_news_fade_in_out_font_size" value="'.get_option('pearl_flash_news_fade_in_out_font_size').'"/><br/>
           <label for="pearl_flash_news_fade_in_out_letter_spacing">Letter Spacing :</label>
           <input type="text" name="pearl_flash_news_fade_in_out_letter_spacing" value="'.get_option('pearl_flash_news_fade_in_out_letter_spacing').'"/>
           <label for="pearl_flash_news_fade_in_out_delay">Delay :</label>
           <input type="text" name="pearl_flash_news_fade_in_out_delay" value="'.get_option('pearl_flash_news_fade_in_out_delay').'"/><br/>
           <label for="pearl_flash_news_fade_in_out_height">Min height :</label>
           <input type="text" name="pearl_flash_news_fade_in_out_height" value="'.get_option('pearl_flash_news_fade_in_out_height').'"/>
           <label for="pearl_news_flash_characters">No of characters :</label>
           <input type="text" name="pearl_news_flash_characters" value="'.get_option('pearl_news_flash_characters').'"/>
           <input type="submit" name="submit" value="Submit"/>
        </form>';
          
          echo $displayOptionsForm;
          $this->authorDetails();
        
    }
    
    private function authorDetails() {
        
        $details = ' <p>Created by <a href="http://pearlbells.co.uk/" target="_blank">Pearlbells</a><br/> Follow me : <a href="http://twitter.com/#!/pearlbells" target="_blank">Twitter</a><br/>Please Donate : <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=W884YAWEDPA9U" target="_blank">Click Here</a></p>
         <p>Feel free to email me lizeipe@gmail.com for any advice or suggestion.</p>';
        echo $details;
        
    }
    
}

?>
