<?php
namespace flashnewspearlbells;
class dataFlashPearl {
    
        public function __construct() {
         
            add_shortcode('pearl_flash_news_fade_in_out_display', array($this,'pearl_flash_news_fade_in_out'));
        }
    
	public function pearl_flash_news_fade_in_out($atts, $content = null)
	{
            if(is_array($atts)){
            extract( shortcode_atts( array(
				'post_type' => 'post',
				'category' => '',
                                'posts_per_page' => 5
			), $atts ) );
 
                $pearl_flash_news_fade_in_out = '<div class="pearl_flash_news_fade_in_out">';
                $args = array( 'posts_per_page' => $posts_per_page, 'post_type' => $post_type, 'category_name' => $category );
                $rand_posts = get_posts( $args );
                foreach ( $rand_posts as $post ) : 
                    setup_postdata( $post ); 
                    $pearl_flash_news_fade_in_out .= '<div><a href="'.get_permalink($post->ID).'" class = "pearl-title">'.get_the_title($post->ID).'</a>';
                    $content = trim(substr(strip_tags(get_the_content()),0,get_option('pearl_news_flash_characters')));
                    $pearl_flash_news_fade_in_out .= $content;
                    $pearl_flash_news_fade_in_out .= ( strlen(get_the_content()) > get_option('pearl_news_flash_characters')) ? '...' : '';
                    if(get_option('pearl_flash_news_fade_in_out_read_more') == 'yes')
                    {
                        $target = (get_option('pearl_news_flash_read_more_new_window') == 'yes') ? "_blank" : "";
                        $pearl_flash_news_fade_in_out .= '<a href="'.get_permalink($post->ID).'" target = '.$target.' class="pearl-link" style="color:'.get_option('pearl_news_flash_font_color_read_more').'">( read more )</a>';	
                    }
                    $pearl_flash_news_fade_in_out .= '</div>';
                endforeach; 
                wp_reset_postdata(); 
                $pearl_flash_news_fade_in_out .= '</div>';
                return $pearl_flash_news_fade_in_out;
            }
            if( get_option('pearl_flash_news_fade_in_out_content') ) {
                $contents = explode( '--', get_option('pearl_flash_news_fade_in_out_content'));
                $links = explode( '--', get_option('pearl_flash_news_fade_in_out_links'));
                $pearl_flash_news_fade_in_out = '<div class="pearl_flash_news_fade_in_out rectangle-box"> ';	
                for( $i=0 ; $i<sizeof($contents); $i++)
                {
                    $pearl_flash_news_fade_in_out .= '<div class="rectangle-content"><div><span>';
                    $pearl_flash_news_fade_in_out .= $contents[$i];
                    if( isset($links[$i]) && get_option('pearl_flash_news_fade_in_out_read_more') == 'yes' )
                    {
                         $target = (get_option('pearl_news_flash_read_more_new_window') == 'yes') ? "_blank" : "";
                         $pearl_flash_news_fade_in_out .= '<a href="'.$links[$i].'" target = '.$target.' style="color:'.get_option('pearl_news_flash_font_color_read_more').'">Read More</a>';	
                    }
                    $pearl_flash_news_fade_in_out .= '</span></div></div>';
                }
                
                
                $pearl_flash_news_fade_in_out .='</div>';
                return $pearl_flash_news_fade_in_out;
            }
	}
}
?>
