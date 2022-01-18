/**
* Template Name: Bethany - v4.7.0
* Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Announcement slider
   */
  new Swiper('.announcement-slider', 
  {
    
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
          renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (menu[index]) + '</span>';
          },
      },
	
    

      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    
  });
   
})()