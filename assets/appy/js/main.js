(function ($) {
  "use strict";


  var $client_slider = $('.client_slider'),
    $popup_video = $('.popup_video');

  // ==========================================
  //      Start Document Ready function
  // ==========================================
  $(document).ready(function () {

    // ============== Header Hide Click On Body Js Start ========
    $('.header-button').on('click', function () {
      $('.body-overlay').toggleClass('show')
    });
    $('.body-overlay').on('click', function () {
      $('.header-button').trigger('click')
      $(this).removeClass('show');
    });
    // =============== Header Hide Click On Body Js End =========

    // ========================== Header Hide Scroll Bar Js Start =====================
    $('.navbar-toggler.header-button').on('click', function () {
      $('body').toggleClass('scroll-hide-sm')
    });
    $('.body-overlay').on('click', function () {
      $('body').removeClass('scroll-hide-sm')
    });
    // ========================== Header Hide Scroll Bar Js End =====================

    // ========================== Small Device Header Menu On Click Dropdown menu collapse Stop Js Start =====================
    $('.dropdown-item').on('click', function () {
      $(this).closest('.dropdown-menu').addClass('d-block')
    });
    // ========================== Small Device Header Menu On Click Dropdown menu collapse Stop Js End =====================

    // ========================== Add Attribute For Bg Image Js Start =====================
    $(".bg-img").css('background', function () {
      var bg = ('url(' + $(this).data("background-image") + ')');
      return bg;
    });
    // ========================== Add Attribute For Bg Image Js End =====================

    // ========================== add active class to ul>li top Active current page Js Start =====================
    // function dynamicActiveMenuClass(selector) {
    // 	let FileName = window.location.pathname.split("/").reverse()[0];

    // 	selector.find("li").each(function () {
    // 		let anchor = $(this).find("a");
    // 		if ($(anchor).attr("href") == FileName) {
    // 			$(this).addClass("active");
    // 		}
    // 	});
    // 	// if any li has active element add class
    // 	selector.children("li").each(function () {
    // 		if ($(this).find(".active").length) {
    // 			$(this).addClass("active");
    // 		}
    // 	});
    // 	// if no file name return
    // 	if ("" == FileName) {
    // 		selector.find("li").eq(0).addClass("active");
    // 	}
    // }
    // if ($('ul').length) {
    // 	dynamicActiveMenuClass($('ul'));
    // }
    // ========================== add active class to ul>li top Active current page Js End =====================

    // ================== Password Show Hide Js Start ==========
    $(".toggle-password").on('click', function () {
      $(this).toggleClass(" fa-eye-slash");
      var input = $($(this).attr("id"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
    // =============== Password Show Hide Js End =================

    // ========================= Owl Carousel Slider Js Start ==============

    // Owl Carousel For Clients
    if ($client_slider.length > 0) {
      var $client_slider_obj = $client_slider.owlCarousel({
        autoplay: false,
        margin: 40,
        loop: false,
        nav: false,
        dots: false,
        items: 6,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            margin: 0
          },
          375: {
            items: 2,
            margin: 15
          },
          425: {
            items: 3,
            margin: 20
          },
          576: {
            items: 4,
          },
          768: {
            items: 4,
            margin: 30
          },
          992: {
            items: 5,
            margin: 30
          },
          1200: {
            items: 6,
            margin: 35
          },
          1400: {
            margin: 40
          }
        }
      });
    };
    // ========================= Owl Carousel Slider Js End ===================

    // ========================= Video Pupup Js End ===================
    if ($popup_video.length > 0) {
      $popup_video.lightcase({
        transition: 'elastic',
        controls: true,
      });
    }
    // ========================= Video Pupup Js End ===================

    // ================== Sidebar Menu Js Start ===============
    // Sidebar Dropdown Menu Start
    $(".has-dropdown > a").click(function () {
      $(".sidebar-submenu").slideUp(200);
      if (
        $(this)
          .parent()
          .hasClass("active")
      ) {
        $(".has-dropdown").removeClass("active");
        $(this)
          .parent()
          .removeClass("active");
      } else {
        $(".has-dropdown").removeClass("active");
        $(this)
          .next(".sidebar-submenu")
          .slideDown(200);
        $(this)
          .parent()
          .addClass("active");
      }
    });
    // Sidebar Dropdown Menu End
    // Sidebar Icon & Overlay js 
    $(".dashboard-body__bar-icon").on("click", function () {
      $(".sidebar-menu").addClass('show-sidebar');
      $(".sidebar-overlay").addClass('show');
    });
    $(".sidebar-menu__close, .sidebar-overlay").on("click", function () {
      $(".sidebar-menu").removeClass('show-sidebar');
      $(".sidebar-overlay").removeClass('show');
    });
    // Sidebar Icon & Overlay js 
    // ===================== Sidebar Menu Js End =================

    // ==================== Dashboard User Profile Dropdown Start ==================

    // User Dropdown
    $('.user-info__button').on('click', function () {
      $('.user-info-dropdown').toggleClass('show');
    });

    $(document).on('click', function (event) {
      var target = $(event.target);

      if (!target.closest('.user-info__button').length && !target.closest('.user-info-dropdown').length) {
        $('.user-info-dropdown').removeClass('show');
      }
    });

    // Notification Dropdown
    $('.notification__button').on('click', function () {
      $('.notification__dropdown').toggleClass('show');
    });

    $(document).on('click', function (event) {
      var target = $(event.target);

      if (!target.closest('.notification__button').length && !target.closest('.notification__dropdown').length) {
        $('.notification__dropdown').removeClass('show');
      }
    });

    // Dashboard Search
    $('.dashboard-search__button').on('click', function () {
      $(this).toggleClass('change-icon');
      $('.dashboard-search__form').toggleClass('show');
    });

    // $(document).on('click', function (event) {
    //   var target = $(event.target);

    //   if (!target.closest('.dashboard-search__button').length && !target.closest('.dashboard-search__form').length) {
    //     $('.dashboard-search__button').removeClass('change-icon');
    //     $('.dashboard-search__form').removeClass('show');
    //   }
    // });


    // ==================== Dashboard User Profile Dropdown End ==================

    // ========================= Date Picker Js Start ==============
    $(".datepicker-here").datepicker();
    // ========================= Date Picker Js End ==============

    // ========================= Calendar Js End ==============
    $('#appointment_calendar').jsRapCalendar({
      week: 6,
      enabled: true,
      showCaption: true,
      showArrows: true,
      showYear: true,
      daysName: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
      monthsNames: ['January', 'February', 'March', 'April', 'May', 'Jun', 'July', 'August', 'September', 'October', 'November', 'December'],
      onClick: function (y, m, d) {
        alert(y + '-' + m + '-' + d);
      }

    });
    // ========================= Calendar Js End ==============


    // ==================== Custom Sidebar Dropdown Menu Js Start ==================
    $('.has-submenu').on('click', function (event) {
      event.preventDefault(); // Prevent the default anchor link behavior

      // Check if this submenu is currently visible
      var isOpen = $(this).find('.sidebar-submenu').is(':visible');

      // Hide all submenus initially
      $('.sidebar-submenu').slideUp();

      // Remove the "active" class from all li elements
      $('.sidebar-menu__item').removeClass('active');

      // If this submenu was not open, toggle its visibility and add the "active" class to the clicked li
      if (!isOpen) {
        $(this).find('.sidebar-submenu').slideToggle(500);
        $(this).addClass('active');
      }
    });
    // ==================== Custom Sidebar Dropdown Menu Js End ==================

    // ========================= Odometer Counter Up Js End ==========
    $(".counterup-item").each(function () {
      $(this).isInViewport(function (status) {
        if (status === "entered") {
          for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
            var el = document.querySelectorAll('.odometer')[i];
            el.innerHTML = el.getAttribute("data-odometer-final");
          }
        }
      });
    });
    // ========================= Odometer Up Counter Js End =====================

  });
  // ==========================================
  //      End Document Ready function
  // ==========================================

  // ========================= Preloader Js Start =====================
  $(window).on("load", function () {
    $('.preloader').fadeOut();
  })
  // ========================= Preloader Js End=====================

  // ========================= Header Sticky Js Start ==============
  $(window).on('scroll', function () {
    if ($(window).scrollTop() >= 300) {
      $('.header').addClass('fixed-header');
    }
    else {
      $('.header').removeClass('fixed-header');
    }
  });
  // ========================= Header Sticky Js End===================

  //============================ Scroll To Top Icon Js Start =========
  var btn = $('.scroll-top');

  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
  });
  //========================= Scroll To Top Icon Js End ======================

})(jQuery);
