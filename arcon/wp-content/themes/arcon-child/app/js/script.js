!function ($) {
  "use strict";
  $(document).ready(function () {
    // mobile menu
    var winWd = $(window).width();
    $(".menu-btn").click(function () {
      console.log('hey');
      $(".menu-btn").toggleClass("menu-btn-active");
      $("header").toggleClass("header-nav-active");
      $("main").toggleClass("header-open");
      $("header").removeClass("keepopen");
    });



    $('.header-menus a').click(function(){
      $("header").removeClass("header-nav-active");
      $(".menu-btn").removeClass("menu-btn-active");
      // $("header").removeClass("keepopen");

    })

    // page scroll progress
    function updateProgressBar() {
      var totalScrollHeight = $(document).height() - $(window).height();
      var scrollTop = $(window).scrollTop();
      var scrollPercentage = (scrollTop / totalScrollHeight) * 100;

      $(".scroll-fixed").css("width", scrollPercentage + "%");
    }

    $(window).on("scroll", updateProgressBar);

    // expand and collapse
    /* $(".expand-cta").click(function () {
      var $this = $(this);
      var $content = $(".description-all p:last-child");
      // console.log($(this));
      if ($content.is(":visible")) {
        $content.slideUp();
        $this.text("Expand");
      } else {
        $content.slideDown();
        $this.text("Collapse");
      }
    }); */
    $(".expand-cta").click(function () {
      // alert('innn');
      var $this = $(this);
      var $content = $(".description p:not(:first-child):not(:nth-child(2))");
      // console.log($(this));
      if ($content.is(":visible")) {
        $content.slideUp();
        $this.text("Expand");
      } else {
        $content.slideDown();
        $this.text("Collapse");
      }
    });

    // mega menu
    if ($(window).width() > 600) {
      $(".nav-links").hover(function () {
        $("header").addClass("keepopen");

        var $this = $(this);
        var $navLink = $this.closest(".nav-links");
        $(".nav-links").not($navLink).removeClass("megamenu-open");

        $navLink.addClass("megamenu-open");

        $("header, .header-menus").mouseleave(function () {
          $("header").removeClass("keepopen");
        });
      });
    }

    if ($(window).width() < 600) {
      $(".dropdown-div svg").click(function () {
        var $this = $(this);
        var $navLink = $this.closest(".nav-links");
        $("header").addClass("keepopen");

        $(".nav-links").not($navLink).removeClass("megamenu-open");

        $navLink.toggleClass("megamenu-open");
      });
    }

    // sliders
    $(".life-slider-one, .life-slider-two").slick({
      slidesToShow: 4,
      arrows: false,
      dots: false,
      centerMode: false,
      autoplay: true,
      autoplaySpeed: 0,
      speed: 8000,
      infinite: true,
      cssEase: "linear",
      touchMove: true,
      swipeToSlide: true,
      responsive: [
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            centerMode: true,
          },
        },
      ],
    });

    $(".banner-slider").slick({
      slidesToShow: 1,
      arrows: false,
      dots: true,
      centerMode: false,
      autoplay: true,
      autoplaySpeed: 4000,
      infinite: true,
      cssEase: "linear",
      touchMove: true,
      swipeToSlide: true,
      pauseOnHover: false,
      responsive: [
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });

    $('.sliders-imges-ini').slick({
      slidesToShow: 1,
      arrows: false,
      dots: true,
      centerMode: false,
      autoplay: false,
      // autoplaySpeed: 4000,
      infinite: false,
      cssEase: "linear",
      touchMove: true,
      swipeToSlide: true,
      pauseOnHover: false,
        // responsive: [
        //   {
        //     breakpoint: 600,
        //     settings: {
        //       slidesToShow: 1,
        //     },
        //   },
        // ],
    })

    // Porduct page slider
    $('.product-slider-main').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      dots: true,
      arrows: false,
      fade: true,
      asNavFor: '.product-slider-thumbnail'
    });
    $('.product-slider-thumbnail').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      infinite: true,
      asNavFor: '.product-slider-main',
      dots: false,
      arrows: false,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3
          },
        },
      ],
    });


    // form validation
    const alphaOnly = document.querySelectorAll(".alpha-only");
    alphaOnly.forEach(function (element) {
      element.addEventListener("beforeinput", function (event) {
        if (event.inputType === "deleteContentBackward") {
          return;
        }
        var value = this.value;
        if (
          !/^[a-zA-Z ]+$/.test(event.data) ||
          (event.data === " " && value.length === 0)
        ) {
          event.preventDefault();
        }
      });
    });

    // const mobileInputs = document.querySelectorAll(".mobile-input");
    // mobileInputs.forEach(function (input) {
    //   input.addEventListener("beforeinput", function (event) {
    //     if (event.inputType === "deleteContentBackward") {
    //       return;
    //     }
    //     var value = this.value;
    //     if (
    //       !/^[0-9]+$/.test(event.data) ||
    //       (parseInt(event.data) < 6 && value.length === 0) ||
    //       value.length >= 17
    //     ) {
    //       event.preventDefault();
    //     }
    //   });
    // });

    const mobileInputs = document.querySelectorAll(".mobile-input");
        mobileInputs.forEach(function (input) {
          input.addEventListener("beforeinput", function (event) {
            if (event.inputType === "deleteContentBackward") {
              return;
            }
            
            const value = this.value;
            const inputChar = event.data;
            
            // Allow only digits, spaces, + and -
            if (!/^[0-9 \-]+$/.test(inputChar) && (inputChar !== '+' || value.length !== 0)) {
              event.preventDefault();
              return;
            }
            
            // Prevent multiple + signs and + sign in positions other than the first
            if (inputChar === '+' && value.includes('+')) {
              event.preventDefault();
              return;
            }
            
            // Prevent the first character from being a space
            if (inputChar === ' ' && value.length === 0) {
              event.preventDefault();
              return;
            }

            // Prevent more than two spaces
            const spaceCount = (value.match(/ /g) || []).length;
            if (inputChar === ' ' && spaceCount >= 2) {
              event.preventDefault();
              return;
            }

            // Prevent more than two dashes
            const dashCount = (value.match(/\-/g) || []).length;
            if (inputChar === '-' && dashCount >= 2) {
              event.preventDefault();
              return;
            }
            
            // Prevent length from exceeding 17 characters
            if (value.length >= 17) {
              event.preventDefault();
              return;
            }
          });

          input.addEventListener("input", function () {
            const value = this.value;
            const digitsOnly = value.replace(/[^0-9]/g, '');
            const plusCount = (value.match(/\+/g) || []).length;
            const dashCount = (value.match(/\-/g) || []).length;
            const spaceCount = (value.match(/ /g) || []).length;
            
            // Ensure minimum 10 digits including the +
            if (digitsOnly.length < 10 || plusCount > 1 || (plusCount === 1 && value.indexOf('+') !== 0) || dashCount > 2 || spaceCount > 2) {
              this.setCustomValidity("Invalid phone number");
            } else {
              this.setCustomValidity("");
            }
          });
        });


    $(".form-group").on("keypress", function (event) {
      var inputValue = $(this).val();

      if (event.which === 32 && inputValue.length === 0) {
        event.preventDefault();
      }
    });

    function clearErrorMessage($input) {
      $input.siblings(".wpcf7-not-valid-tip").text("");
    }

    $(".form-group").on("input", function () {
      clearErrorMessage($(this));
    });

    // $(".contact-form input, #feedback input").attr("autocomplete", "one-time-code");
    // $(".contact-form input, #feedback input").on("copy paste", function (e) {
    //   e.preventDefault();
    // });

    $("#con-topic option:first").val("");

    // services section

    const sections = [
      { triggerClass: ".sticky-one-way-sec", sectionClass: ".one-way-sec" },
      {
        triggerClass: ".sticky-click-to-trade",
        sectionClass: ".click-to-trade",
      },
      {
        triggerClass: ".sticky-lease-with-ease",
        sectionClass: ".lease-with-ease",
      },
    ];

    if ($(".sticky-point").length) {
      $(".sticky-point").first().addClass("active");
    }

    $(".scroll-sec").click(function () {
      var scoll_sec = $(this).attr("rel");
      var id_present = $("#" + scoll_sec).length;
      if (id_present == 0) {
        var sec_top = $("." + scoll_sec).offset().top - 80;
      } else {
        var sec_top = $("#" + scoll_sec).offset().top - 80;
      }
      $("html, body").animate({ scrollTop: sec_top }, 100);
    });

    $(window).on("scroll", function () {
      var viewportTop = $(window).scrollTop();

      var stickyPoint = $(".sticky-point");
      if (stickyPoint.length > 0) {
        stickyPoint.each(function (index, element) {
          var current = index + 1;
          var $section = $(".sticky-sec-" + current);
          var $trigger = $(".sticky-" + current);

          if ($section.length) {
            var sectionTop = $section.offset().top - 300;

            if (sectionTop < viewportTop) {
              $(".sticky-point").removeClass("active");
              $trigger.addClass("active");
            } else if (index === 0) {
              $trigger.addClass("active");
            } else {
              $trigger.removeClass("active");
            }
          }
        });
      }
    });

    $(window).on("scroll", function () {
      var services_pointers = $(".arcons-services .services-pointers");
      if (services_pointers.length > 0) {
        if (winWd < 640) {
          var services_pointers_left = services_pointers.offset().top + 300;
        } else {
          var services_pointers_left = services_pointers.offset().top - 20;
        }
        var viewportLeft = $(window).scrollTop();
        if (services_pointers_left < viewportLeft) {
          $("#arcons-services").addClass("active");
        } else {
          $("#arcons-services").removeClass("active");
        }
      }
    });



    $('.contact-form form').on('submit', function(event) {
      event.preventDefault();

      // $(this).prop('disabled', true).css('opacity', '0.5');
      var form_val = validate_form();
      if (!form_val) {
          // alert("Please fill in all required fields.");
          $('.error').css('border','1px solid #f05f25');
      } else {
        $('.wpcf7-form-control').removeClass('error').css('border', '');
        var $submitButton = $(this).find('input[type="submit"], button[type="submit"]');
            $submitButton.prop('disabled', true).css('opacity', '0.5');
        $(this).submit();
          $('.error').css('border','');

      }
  });

  function validate_form(){
    let allValid = true;
    $('.contact-form .wpcf7-form-control').each(function() {
      const $input = $(this);
      // console.log($input)
      const isRequired = $input.attr('aria-required') === 'true' || $input.prop('required');

      if (isRequired && !$input.val().trim()) {
          $input.addClass('error');
          allValid = false;
      } else {
          $input.removeClass('error');
      }
    });
    return allValid;
  }


  document.addEventListener("wpcf7mailsent", function(event) {
    // Form successfully submitted
    const $submitButton = $('.contact-form form').find('input[type="submit"], button[type="submit"]');
    $submitButton.prop('disabled', false).css('opacity', '1');
    // Handle your custom actions here
}, false);

document.addEventListener("wpcf7invalid", function(event) {
    // Form validation failed
    const $submitButton = $('.contact-form form').find('input[type="submit"], button[type="submit"]');
    $submitButton.prop('disabled', false).css('opacity', '1');
}, false);

document.addEventListener("wpcf7mailfailed", function(event) {
    // Form submission failed
    const $submitButton = $('.contact-form form').find('input[type="submit"], button[type="submit"]');
    $submitButton.prop('disabled', false).css('opacity', '1');
}, false);

document.addEventListener("wpcf7spam", function(event) {
    // Form detected as spam
    const $submitButton = $('.contact-form form').find('input[type="submit"], button[type="submit"]');
    $submitButton.prop('disabled', false).css('opacity', '1');
}, false);


  // Remove error styling on user input
  $('#contact-form').on('input', '.wpcf7-form-control', function() {
    $(this).removeClass('error');
    $(this).css('border', ''); // Reset border to default
});

  // Prevent Contact Form 7 validation messages
  document.addEventListener('wpcf7invalid', function(event) {
      event.preventDefault();
  }, true);








    // Contact From API Integration
    document.addEventListener(
      "wpcf7mailsent",
      function (event) {
        const formId = event.detail.contactFormId;
        if (formId == 7) {
          const formData = event.detail.inputs;
          const name = formData.find((input) => input.name === "name").value;
          const email = formData.find((input) => input.name === "email").value;
          const phone = formData.find((input) => input.name === "phone").value;
          const message = formData.find(
            (input) => input.name === "message"
          ).value;
          const topic = formData.find((input) => input.name === "topics").value;
          const data = {
            name,
            email,
            phone,
            message,
            topic,
          };

          $.ajax({
            url: "https://core.arconcontainer.com/api/core/contact_us/",
            type: "POST",
            data: data,
            success: function (data) {
              if (data.id) {
                console.log("success");
              } else {
                console.log("error");
              }
            },
          });

        }
      },
      false
    );
  });
}.call(window, window.jQuery);
