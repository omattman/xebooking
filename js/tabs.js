	// Artist profile tabs
	jQuery(document).ready(function($) {
		// window width variable for dynamic tabs according to device
		var MqL = 1025;

		// on resize change between layouts
		dynamicTabsDevice();
    jQuery(window).on('resize', function() {
			(!window.requestAnimationFrame)
					? setTimeout(dynamicTabsDevice, 300)
					: window.requestAnimationFrame(dynamicTabsDevice);
    });

		function checkWindowWidth() {
			//check window width (scrollbar included)
			var e = window,
					a = 'inner';
			if (!('innerWidth' in window)) {
					a = 'client';
					e = document.documentElement || document.body;
			}
			if (e[a + 'Width'] >= MqL) {
					return true;
			} else {
					return false;
			}
    }

    function dynamicTabsDevice() {
			var desktop = checkWindowWidth();
			if (desktop) {
				jQuery(".tabs__item:first").addClass("active");
				jQuery(".tab_content").hide();
				jQuery(".tab_content:first").show();

				// if in tab mode
				jQuery(".tabs__item").hover(function() {
				
					jQuery(".tab_content").hide();
					var activeTab = $(this).attr("rel");
					jQuery("#"+activeTab).show();
				
					jQuery(".tabs__item").removeClass("active");
					jQuery(this).addClass("active");

				jQuery(".tab_drawer_heading").removeClass("d_active");
				jQuery(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
				
				});
			} else {
				// in if accordion mode
				jQuery(".tab_drawer_heading").click(function() {
					
					var d_activeTab = $(this).attr("rel"); 
					jQuery("#"+d_activeTab).toggle();
					
					jQuery(".tab_drawer_heading[rel^='"+d_activeTab+"']").toggleClass("d_active");
					
					jQuery(".tabs__item[rel^='"+d_activeTab+"']").toggleClass("active");
				});
			}
    }
	});