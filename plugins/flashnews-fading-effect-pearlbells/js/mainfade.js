var $jquery = jQuery.noConflict(); 
$jquery(document).ready(function(){
  setHeight();
  PlayFlashPost();
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
                setHeight();
        },pluginOptionsFade.news_delay);
}

function setHeight()
{
     var biggestHeight = "0";
     $jquery(".pearl_flash_news_fade_in_out div").each(function(){
        if ($jquery(this).height() > biggestHeight ) {
          biggestHeight = $jquery(this).height()
        }
    });
    $jquery(".pearl_flash_news_fade_in_out").height(biggestHeight);
}




