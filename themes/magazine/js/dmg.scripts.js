jQuery(document).ready(function ($) {
    
        //Check exist slider container
    if($('#slider1_container').length > 0){
        //Define an array of slideshow transition code
        var options = { 
            $FillMode: 2,
            $AutoPlay: true,
            $SlideDuration: 1000,  
            $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                $SpacingY: 10                                    //[Optional] Vertical space between each item in pixel, default value is 0
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $ChanceToShow: 2,
                $AutoCenter: 2,
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $ActionMode: 0,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                $DisableDrag: true                              //[Optional] Disable drag or not, default value is false
            }
        };
    
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales
        //while window resizes
        
        function ScaleSlider() {
            var parentWidth = $('#slider1_container').parent().width();
            if (parentWidth) {
                jssor_slider1.$ScaleWidth(parentWidth);
            }
            else
                window.setTimeout(ScaleSlider, 30);
        }
        //Scale slider after document ready
        ScaleSlider();
                                        
        //Scale slider while window load/resize/orientationchange.
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);

        //responsive code end

        //after setup slider Show slider in home
        $("#slider1_container").show();
    }
});