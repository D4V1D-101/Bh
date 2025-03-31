$(document).ready(function () {
    $(".preloader").fadeOut(0);

    $(".post-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4500,
        dots: false,
        arrows: true,
        prevArrow:
            '<button type="button" class="prevArrow"><i class="fas fa-angle-left"></i></button>',
        nextArrow:
            '<button type="button" class="nextArrow"><i class="fas fa-angle-right"></i></button>',
    });

    $(".tab-content").find(".tab-pane").each(function (idx, item) {
      var navTabs = $(this).closest(".code-tabs").find(".nav-tabs"),
          title = $(this).attr("title");
      navTabs.append('<li class="nav-item"><a class="nav-link" href="#">' + title + "</a></li>");
    });

    $(".code-tabs ul.nav-tabs").each(function () {
      $(this).find("li:first").addClass("active");
    });

    $(".code-tabs .tab-content").each(function () {
      $(this).find("div:first").addClass("active");
    });

    $(".nav-tabs a").click(function (e) {
      e.preventDefault();
      var tab = $(this).parent(),
          tabIndex = tab.index(),
          tabPanel = $(this).closest(".code-tabs"),
          tabPane = tabPanel.find(".tab-pane").eq(tabIndex);
      tabPanel.find(".active").removeClass("active");
      tab.addClass("active");
      tabPane.addClass("active");
    });

    $(".accordion-collapse").on("show.bs.collapse", function () {
      $(this).siblings(".accordion-header").addClass("active");
    });
    $(".accordion-collapse").on("hide.bs.collapse", function () {
      $(this).siblings(".accordion-header").removeClass("active");
    });
  });
