function cooking_master_class_openNav() {
  jQuery(".sidenav").addClass('show');
}
function cooking_master_class_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function cooking_master_class_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const cooking_master_class_nav = document.querySelector( '.sidenav' );

      if ( ! cooking_master_class_nav || ! cooking_master_class_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...cooking_master_class_nav.querySelectorAll( 'input, a, button' )],
        cooking_master_class_lastEl = elements[ elements.length - 1 ],
        cooking_master_class_firstEl = elements[0],
        cooking_master_class_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && cooking_master_class_lastEl === cooking_master_class_activeEl ) {
        e.preventDefault();
        cooking_master_class_firstEl.focus();
      }

      if ( shiftKey && tabKey && cooking_master_class_firstEl === cooking_master_class_activeEl ) {
        e.preventDefault();
        cooking_master_class_lastEl.focus();
      }
    } );
  }
  cooking_master_class_keepFocusInMenu();
} )( window, document );

var cooking_master_class_btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    cooking_master_class_btn.addClass('show');
  } else {
    cooking_master_class_btn.removeClass('show');
  }
});

cooking_master_class_btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
    var owl = jQuery('#top-slider .owl-carousel');
      owl.owlCarousel({
      margin: 0,
      nav:false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 5000,
      loop: false,
      dots: true,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 1
        },
        768: {
          items: 1
        },
        1000: {
          items: 1
        },
        1200: {
          items: 1
        }
      },
      autoplayHoverPause : false,
      mouseDrag: true,
    });

    var owl = jQuery('#product .owl-carousel');
      owl.owlCarousel({
      margin: 25,
      nav:false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 5000,
      loop: false,
      dots: false,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        768: {
          items: 3
        },
        1000: {
          items: 4
        },
        1200: {
          items: 4
        }
      },
      autoplayHoverPause : false,
      mouseDrag: true,
    });
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
  jQuery(".loading2").delay(2000).fadeOut("slow");
});

if(document.getElementById("openModalButton")) {
  if(document.getElementById("openModalButton").getAttribute('data-modal-src')) {
    var modal=document.getElementById("myModal")
    var openModalButton=document.getElementById("openModalButton")
    var closeModalButton=document.getElementById("closeModalButton");
    openModalButton.addEventListener("click",function(){
      let e=jQuery(this).attr("data-modal-src");
      document.getElementById("videoPlayer").src=e
      modal.style.display="block"
    })
    closeModalButton.addEventListener("click",function(){
      document.getElementById("videoPlayer").src=""
      modal.style.display="none"
    })
  }
}

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.main-header').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.main-header').addClass("stick_header");
    } else {
      jQuery('.main-header').removeClass("stick_header");
    }
  }
});