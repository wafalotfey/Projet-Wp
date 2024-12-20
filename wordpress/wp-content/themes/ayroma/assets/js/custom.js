jQuery(function($) {
	if( $('.testimonial-slider').length ){
        var testimonial = tns({
            "container": ".testimonial-slider",
            "rewind": true,
            "mouseDrag": true,
            "mode": "gallery",
            "nav": false,
            "controls": false,
            "autoplayButtonOutput": false,
            "autoplay": true,
            "controlsContainer": "#testimonial1-nav-wrapper"
        });

        $(function () {
            $(".next1").click(function () {
                testimonial.goTo("next");
            });
            $(".prev1").click(function () {
                testimonial.goTo("prev");
            });
        });
	}	
});