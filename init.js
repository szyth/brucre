jQuery(document).ready(function ($) {
  var $lateral_menu_trigger = $("#cd-menu-trigger"),
    $content_wrapper = $(".cd-main-content"),
    $navigation = $("header");

  //open-close lateral menu clicking on the menu icon
  $lateral_menu_trigger.on("click", function (event) {
    event.preventDefault();

    $lateral_menu_trigger.toggleClass("is-clicked");
    $navigation.toggleClass("lateral-menu-is-open");
    $content_wrapper
      .toggleClass("lateral-menu-is-open")
      .one(
        "webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
        function () {
          // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
          $("body").toggleClass("overflow-hidden");
        }
      );
    $("#cd-lateral-nav").toggleClass("lateral-menu-is-open");

    //check if transitions are not supported - i.e. in IE9
    if ($("html").hasClass("no-csstransitions")) {
      $("body").toggleClass("overflow-hidden");
    }
  });

  //close lateral menu clicking outside the menu itself
  $content_wrapper.on("click", function (event) {
    if (!$(event.target).is("#cd-menu-trigger, #cd-menu-trigger span")) {
      $lateral_menu_trigger.removeClass("is-clicked");
      $navigation.removeClass("lateral-menu-is-open");
      $content_wrapper
        .removeClass("lateral-menu-is-open")
        .one(
          "webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
          function () {
            $("body").removeClass("overflow-hidden");
          }
        );
      $("#cd-lateral-nav").removeClass("lateral-menu-is-open");
      //check if transitions are not supported
      if ($("html").hasClass("no-csstransitions")) {
        $("body").removeClass("overflow-hidden");
      }
    }
  });

  //open (or close) submenu items in the lateral menu. Close all the other open submenu items.
  $(".item-has-children")
    .children("a")
    .on("click", function (event) {
      event.preventDefault();
      $(this)
        .toggleClass("submenu-open")
        .next(".sub-menu")
        .slideToggle(200)
        .end()
        .parent(".item-has-children")
        .siblings(".item-has-children")
        .children("a")
        .removeClass("submenu-open")
        .next(".sub-menu")
        .slideUp(200);
    });
});

// PROJECTS
/* Demo purposes only */
var snippet = [].slice.call(document.querySelectorAll(".hover"));
if (snippet.length) {
  snippet.forEach(function (snippet) {
    snippet.addEventListener("mouseout", function (event) {
      if (event.target.parentNode.tagName === "figure") {
        event.target.parentNode.classList.remove("hover");
      } else {
        event.target.parentNode.classList.remove("hover");
      }
    });
  });
}

var logoElement = $("footer .logo");

$(window).scroll(function () {
  if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
    $(logoElement).addClass("show");
  } else if (
    $(logoElement).hasClass("show") &&
    $(window).scrollTop() + $(window).height() > $(document).height() - 150
  ) {
    $(logoElement).removeClass("show");
  }
});

//contact

//parallax
$(document).ready(function () {
  $(".parallax").parallax();
});

//carousel
$(".carousel.carousel-slider").carousel({
  fullWidth: true,
});
autoplay();
function autoplay() {
  $(".carousel").carousel("next");
  setTimeout(autoplay, 3000);
}

$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    items: 1.2,
    loop: true,
    margin: 10,
    responsiveClass: true,
    autoHeight: true,
    autoplay: true,
    autoplayTimeout: 2500,
    autoplayHoverPause: true,
  });
});
