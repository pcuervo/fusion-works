var $jquery = jQuery.noConflict(); 
$jquery(document).ready(function(){
  StyleNewsFlashFadeInOut();
  PlayFlashPost();
  PlayFlashNews();
});
					
function PlayFlashPost()
{    
    $jquery(".pearl_flash_news_fade_in_out div:gt(0)").hide();
        setInterval(function(){
            $jquery(".pearl_flash_news_fade_in_out div:first")
                .fadeOut(500)
                .next()
                .fadeIn(1000)
                .end()
                .appendTo('.pearl_flash_news_fade_in_out');
        },pluginOptions.news_delay);
}
function PlayFlashNews()
{    
    $jquery(".pearl_flash_news_fade_in_out_box div:gt(0)").hide();
        setInterval(function(){
            $jquery(".pearl_flash_news_fade_in_out_box div:first")
                .fadeOut(500)
                .next()
                .fadeIn(1000)
                .end()
                .appendTo('.pearl_flash_news_fade_in_out_box');
        },pluginOptions.news_delay);
}		
function StyleNewsFlashFadeInOut()
{
    $jquery('.pearl_flash_news_fade_in_out,.pearl_flash_news_fade_in_out_box').css({
            "height":pluginOptions.news_flash_height,
            "width":pluginOptions.news_flash_width,
            "background-color":pluginOptions.news_flash_bg_color,		  
            "padding":pluginOptions.news_flash_padding,
            "border-width":pluginOptions.news_flash_border_width,
            "border-style":"solid",
            "border-color":pluginOptions.news_flash_border_color
      });

    $jquery('p.pearl_flash_news_fade_in_out,.pearl_flash_news_fade_in_out_box').css({
            "color":pluginOptions.news_flash_font_color,		  
            "font-size":pluginOptions.news_flash_font_size,
            "letter-spacing":pluginOptions.news_flash_letter_spacing
      });


}
	 


