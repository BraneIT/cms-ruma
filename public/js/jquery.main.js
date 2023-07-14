(function ($) {
  "use strict";

  /********************************
   ********** plugins**************
   *******************************/

  /**
   * Bootstrap Datepicker plugin
   */

  $("#datepicker")
    .datepicker({
      autoclose: true,
      todayHighlight: true,
      orientation: "auto left",
    })
    .datepicker("update", new Date());

  $("#datepicker5")
    .datepicker({
      autoclose: true,
      todayHighlight: true,
      orientation: "auto left",
    })
    .datepicker("update", new Date());

  $("#datepicker1")
    .datepicker({
      autoclose: true,
      todayHighlight: true,
      orientation: "auto left",
    })
    .datepicker("update", new Date());

  $("#datepicker11")
    .datepicker({
      autoclose: true,
      todayHighlight: true,
      orientation: "auto left",
    })
    .datepicker("update", new Date());

  $("#datepicker111")
    .datepicker({
      autoclose: true,
      todayHighlight: true,
      orientation: "auto left",
    })
    .datepicker("update", new Date());

  $("#datepicker12")
    .datepicker({
      autoclose: true,
      todayHighlight: true,
      orientation: "auto left",
    })
    .datepicker("update", new Date());

  $("#datepicker123")
    .datepicker({
      autoclose: true,
      todayHighlight: true,
      orientation: "auto left",
    })
    .datepicker("update", new Date());

  $("#datepicker22")
    .datepicker({
      autoclose: true,
      todayHighlight: true,
      orientation: "auto left",
    })
    .datepicker("update", new Date());

  $("#datepicker222")
    .datepicker({
      autoclose: true,
      todayHighlight: true,
      orientation: "auto left",
    })
    .datepicker("update", new Date());

  $("#datepicker3")
    .datepicker({
      autoclose: true,
      todayHighlight: true,
      orientation: "bottom left",
    })
    .datepicker("update", new Date());

  /**
   * search screen plugin
   * @param {object} options
   */
  function Search(options) {
    this.options = $.extend(
      {
        container: null,
        hideOnClickOutside: false,
        menuActiveClass: "nav-active",
        menuOpener: ".nav-opener",
        menuDrop: ".nav-drop",
        toggleEvent: "click.search",
        outsideClickEvent:
          "click.search touchstart.search pointerdown.search MSPointerDown.search",
      },
      options
    );
    this.initStructure();
    this.attachEvents();
  }

  Search.prototype = {
    initStructure: function () {
      this.page = $("html");
      this.container = $(this.options.container);
      this.opener = this.container.find(this.options.menuOpener);
      this.drop = this.container.find(this.options.menuDrop);
    },
    attachEvents: function () {
      var self = this;
      if (activateResizeHandler) {
        activateResizeHandler();
        activateResizeHandler = null;
      }
      this.outsideClickHandler = function (e) {
        if (self.isOpened()) {
          var target = $(e.target);
          if (
            !target.closest(self.opener).length &&
            !target.closest(self.drop).length
          ) {
            self.hide();
          }
        }
      };
      this.openerClickHandler = function (e) {
        e.preventDefault();
        self.toggle();
      };
      this.opener.on(this.options.toggleEvent, this.openerClickHandler);
    },
    isOpened: function () {
      return this.container.hasClass(this.options.menuActiveClass);
    },
    show: function () {
      this.container.addClass(this.options.menuActiveClass);
      if (this.options.hideOnClickOutside) {
        this.page.on(this.options.outsideClickEvent, this.outsideClickHandler);
      }
    },
    hide: function () {
      this.container.removeClass(this.options.menuActiveClass);
      if (this.options.hideOnClickOutside) {
        this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
      }
    },
    toggle: function () {
      if (this.isOpened()) {
        this.hide();
      } else {
        this.show();
      }
    },
    destroy: function () {
      this.container.removeClass(this.options.menuActiveClass);
      this.opener.off(this.options.toggleEvent, this.clickHandler);
      this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
    },
  };

  var activateResizeHandler = function () {
    var win = $win,
      doc = $("html"),
      resizeClass = "resize-active",
      flag,
      timer;
    var removeClassHandler = function () {
      flag = false;
      doc.removeClass(resizeClass);
    };
    var resizeHandler = function () {
      if (!flag) {
        flag = true;
        doc.addClass(resizeClass);
      }
      clearTimeout(timer);
      timer = setTimeout(removeClassHandler, 500);
    };
    win.on("resize orientationchange", resizeHandler);
  };

  $.fn.search = function (options) {
    return this.each(function () {
      var params = $.extend({}, options, {
          container: this,
        }),
        instance = new Search(params);
      $.data(this, "Search", instance);
    });
  };

  /**
   * image adjustment plugin
   */
  var ImageStretcher = {
    getDimensions: function (data) {
      // calculate element coords to fit in mask
      var ratio = data.imageRatio || data.imageWidth / data.imageHeight,
        slideWidth = data.maskWidth,
        slideHeight = slideWidth / ratio;

      if (slideHeight < data.maskHeight) {
        slideHeight = data.maskHeight;
        slideWidth = slideHeight * ratio;
      }
      return {
        width: slideWidth,
        height: slideHeight,
        top: (data.maskHeight - slideHeight) / 2,
        left: (data.maskWidth - slideWidth) / 2,
      };
    },
    getRatio: function (image) {
      if (image.prop("naturalWidth")) {
        return image.prop("naturalWidth") / image.prop("naturalHeight");
      } else {
        var img = new Image();
        img.src = image.prop("src");
        return img.width / img.height;
      }
    },
    imageLoaded: function (image, callback) {
      var self = this;
      var loadHandler = function () {
        callback.call(self);
      };
      if (image.prop("complete")) {
        loadHandler();
      } else {
        image.one("load", loadHandler);
      }
    },
    resizeHandler: function () {
      var self = this;
      $.each(this.imgList, function (index, item) {
        if (item.image.prop("complete")) {
          self.resizeImage(item.image, item.container);
        }
      });
    },
    resizeImage: function (image, container) {
      this.imageLoaded(image, function () {
        var styles = this.getDimensions({
          imageRatio: this.getRatio(image),
          maskWidth: container.width(),
          maskHeight: container.height(),
        });
        image.css({
          width: styles.width,
          height: styles.height,
          marginTop: styles.top,
          marginLeft: styles.left,
        });
      });
    },
    add: function (options) {
      var container = $(options.container ? options.container : window),
        image =
          typeof options.image === "string"
            ? container.find(options.image)
            : $(options.image);
      // resize image
      this.resizeImage(image, container);
      // add resize handler once if needed
      if (!this.win) {
        this.resizeHandler = $.proxy(this.resizeHandler, this);
        this.imgList = [];
        this.win = $win;
        this.win.on("resize orientationchange", this.resizeHandler);
      }
      // store item in collection
      this.imgList.push({
        container: container,
        image: image,
      });
    },
  };

  /**
   * open close plugin
   * @param {object} options
   */
  function OpenClose(options) {
    this.options = $.extend(
      {
        addClassBeforeAnimation: true,
        hideOnClickOutside: false,
        activeClass: "active",
        opener: ".opener",
        slider: ".slide",
        animSpeed: 400,
        effect: "fade",
        event: "click",
      },
      options
    );
    this.init();
  }
  OpenClose.prototype = {
    init: function () {
      if (this.options.holder) {
        this.findElements();
        this.attachEvents();
        this.makeCallback("onInit", this);
      }
    },
    findElements: function () {
      this.holder = $(this.options.holder);
      this.opener = this.holder.find(this.options.opener);
      this.slider = this.holder.find(this.options.slider);
    },
    attachEvents: function () {
      // add handler
      var self = this;
      this.eventHandler = function (e) {
        e.preventDefault();
        if (self.slider.hasClass(slideHiddenClass)) {
          self.showSlide();
        } else {
          self.hideSlide();
        }
      };
      self.opener.bind(self.options.event, this.eventHandler);
      // hover mode handler
      if (self.options.event === "over") {
        self.opener.bind("mouseenter", function () {
          if (!self.holder.hasClass(self.options.activeClass)) {
            self.showSlide();
          }
        });
        self.holder.bind("mouseleave", function () {
          self.hideSlide();
        });
      }
      // outside click handler
      self.outsideClickHandler = function (e) {
        if (self.options.hideOnClickOutside) {
          var target = $(e.target);
          if (!target.is(self.holder) && !target.closest(self.holder).length) {
            self.hideSlide();
          }
        }
      };
      // set initial styles
      if (this.holder.hasClass(this.options.activeClass)) {
        $doc.bind("click touchstart", self.outsideClickHandler);
      } else {
        this.slider.addClass(slideHiddenClass);
      }
    },
    showSlide: function () {
      var self = this;
      if (self.options.addClassBeforeAnimation) {
        self.holder.addClass(self.options.activeClass);
      }
      self.slider.removeClass(slideHiddenClass);
      $doc.bind("click touchstart", self.outsideClickHandler);
      self.makeCallback("animStart", true);
      toggleEffects[self.options.effect].show({
        box: self.slider,
        speed: self.options.animSpeed,
        complete: function () {
          if (!self.options.addClassBeforeAnimation) {
            self.holder.addClass(self.options.activeClass);
          }
          self.makeCallback("animEnd", true);
        },
      });
    },
    hideSlide: function () {
      var self = this;
      if (self.options.addClassBeforeAnimation) {
        self.holder.removeClass(self.options.activeClass);
      }
      $doc.unbind("click touchstart", self.outsideClickHandler);
      self.makeCallback("animStart", false);
      toggleEffects[self.options.effect].hide({
        box: self.slider,
        speed: self.options.animSpeed,
        complete: function () {
          if (!self.options.addClassBeforeAnimation) {
            self.holder.removeClass(self.options.activeClass);
          }
          self.slider.addClass(slideHiddenClass);
          self.makeCallback("animEnd", false);
        },
      });
    },
    destroy: function () {
      this.slider.removeClass(slideHiddenClass).css({
        display: "",
      });
      this.opener.unbind(this.options.event, this.eventHandler);
      this.holder.removeClass(this.options.activeClass).removeData("OpenClose");
      $doc.unbind("click touchstart", this.outsideClickHandler);
    },
    makeCallback: function (name) {
      if (typeof this.options[name] === "function") {
        var args = Array.prototype.slice.call(arguments);
        args.shift();
        this.options[name].apply(this, args);
      }
    },
  };
  // add stylesheet for slide on DOMReady
  var slideHiddenClass = "js-slide-hidden";
  (function () {
    var tabStyleSheet = $('<style type="text/css">')[0];
    var tabStyleRule = "." + slideHiddenClass;
    tabStyleRule +=
      "{position:absolute !important;left:-9999px !important;top:-9999px !important;display:block !important}";
    if (tabStyleSheet.styleSheet) {
      tabStyleSheet.styleSheet.cssText = tabStyleRule;
    } else {
      tabStyleSheet.appendChild(document.createTextNode(tabStyleRule));
    }
    $("head").append(tabStyleSheet);
  })();
  // animation effects
  var toggleEffects = {
    slide: {
      show: function (o) {
        o.box.stop(true).hide().slideDown(o.speed, o.complete);
      },
      hide: function (o) {
        o.box.stop(true).slideUp(o.speed, o.complete);
      },
    },
    fade: {
      show: function (o) {
        o.box.stop(true).hide().fadeIn(o.speed, o.complete);
      },
      hide: function (o) {
        o.box.stop(true).fadeOut(o.speed, o.complete);
      },
    },
    none: {
      show: function (o) {
        o.box.hide().show(0, o.complete);
      },
      hide: function (o) {
        o.box.hide(0, o.complete);
      },
    },
  };
  // jQuery plugin interface
  $.fn.openClose = function (opt) {
    return this.each(function () {
      $(this).data(
        "OpenClose",
        new OpenClose(
          $.extend(opt, {
            holder: this,
          })
        )
      );
    });
  };

  /**
   * Accordion plugin
   * @param {object} opt
   */
  $.fn.slideAccordion = function (opt) {
    // default options
    var options = $.extend(
      {
        addClassBeforeAnimation: false,
        allowClickWhenExpanded: false,
        activeClass: "active",
        opener: ".opener",
        slider: ".slide",
        animSpeed: 300,
        collapsible: true,
        event: "click",
      },
      opt
    );
    return this.each(function () {
      // options
      var accordion = $(this);
      var items = accordion.find(":has(" + options.slider + ")");
      items.each(function () {
        var item = $(this);
        var opener = item.find(options.opener);
        var slider = item.find(options.slider);
        opener.bind(options.event, function (e) {
          if (item.hasClass(options.activeClass)) {
            if (options.allowClickWhenExpanded) {
              return;
            } else if (options.collapsible) {
              slider.slideUp(options.animSpeed, function () {
                hideSlide(slider);
                item.removeClass(options.activeClass);
              });
            }
          } else {
            // show active
            var levelItems = item.siblings("." + options.activeClass);
            var sliderElements = levelItems.find(options.slider);
            item.addClass(options.activeClass);
            showSlide(slider).hide().slideDown(options.animSpeed);
            // collapse others
            sliderElements.slideUp(options.animSpeed, function () {
              levelItems.removeClass(options.activeClass);
              hideSlide(sliderElements);
            });
          }
          e.preventDefault();
        });
        if (item.hasClass(options.activeClass)) showSlide(slider);
        else hideSlide(slider);
      });
    });
  };
  // accordion slide visibility
  var showSlide = function (slide) {
    return slide.css({
      position: "",
      top: "",
      left: "",
      width: "",
    });
  };
  var hideSlide = function (slide) {
    return slide.show().css({
      position: "absolute",
      top: -9999,
      left: -9999,
      width: slide.width(),
    });
  };

  // main elements
  var $body = $("body");
  var $win = $(window);
  var $doc = $(document);

  // remove page load screen on load
  $win.on("load", function () {
    $("#pageLoad").remove();
  });

  // apply placehoder for old browsers
  $("input, textarea").placeholder();

  // manage same height for sibling elements
  $body.addClass("js-ready");
  $(".same-height, .table tr").each(function (i, el) {
    var $this = $(el);
    $this.find(".height, td .cell").matchHeight({
      byRow: true,
    });
  });

  // counter sectiion
  var $counter = $(".counter");
  if ($counter.length) {
    $counter.counterUp({
      delay: 10,
      time: 2000,
    });
  }

  // apply fancybox
  var $fancybox = $(".fancybox");
  if ($fancybox.length) {
    $fancybox.fancybox({
      padding: 0,
      margin: 0,
    });
  }

  // Owl Carousel Carousels
  $("#partner-slide") // Partner Block Carousel
    .owlCarousel({
      items: 6,
      slideSpeed: 300,
      itemsTablet: [768, 3],
      itemsMobile: [480, 1],
      autoPlay: 3000,
      touchDrag: false,
      pagination: false,
      mouseDrag: false,
    });
  $("#testimonial-home-slide") // Testimonial Home Carousel
    .owlCarousel({
      slideSpeed: 300,
      paginationSpeed: 400,
      singleItem: true,
      touchDrag: false,
      mouseDrag: false,
    });
  $("#tour-slide") // Tour Detail Carousel
    .owlCarousel({
      navigation: true,
      slideSpeed: 300,
      paginationSpeed: 400,
      singleItem: true,
      touchDrag: false,
      pagination: false,
      mouseDrag: false,
    });

  $("#common-slide") // Common Carousel
    .owlCarousel({
      navigation: true,
      slideSpeed: 300,
      paginationSpeed: 400,
      singleItem: true,
      touchDrag: false,
      pagination: false,
      mouseDrag: false,
    });
  $("#common-multiple-slide") // Common Carousel Multiple
    .owlCarousel({
      items: 3,
      slideSpeed: 300,
      itemsTablet: [768, 2],
      itemsMobile: [480, 1],
      autoPlay: 3000,
      touchDrag: false,
      pagination: true,
      mouseDrag: false,
    });

  $("#common-multiple-slide-v1") // Common Carousel Multiple
    .owlCarousel({
      items: 3,
      slideSpeed: 300,
      itemsTablet: [768, 2],
      itemsMobile: [480, 1],
      autoPlay: false,
      touchDrag: false,
      pagination: false,
      navigation: true,
      mouseDrag: false,
    });

  //JCF - $ Custom Form
  jcf.setOptions("Select", {
    wrapNative: false,
    wrapNativeOnMobile: false,
  });

  jcf.replaceAll();

  // scroll to element
  $(".smooth-scroll").click(function () {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      if (target.length) {
        $("html, body").animate(
          {
            scrollTop: target.offset().top,
          },
          1000
        );
        return false;
      }
    }
  });

  // scroll to top
  $win.scroll(function () {
    if ($(this).scrollTop() >= 100) {
      $("#scroll-to-top").fadeIn(200);
    } else {
      $("#scroll-to-top").fadeOut(200);
    }
  });
  $("#scroll-to-top").click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      1000
    );
  });

  //Progress Bar Animation
  function isScrolledIntoView(elem) {
    var docViewTop = $win.scrollTop();
    var docViewBottom = docViewTop + $win.height();
    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();
    return elemBottom <= docViewBottom && elemTop >= docViewTop;
  }
  var $progressBar = $(".progress-bar");
  if ($progressBar.length) {
    $win.scroll(function () {
      $progressBar.each(function () {
        var $this = $(this);
        if (isScrolledIntoView(this) === true) {
          var bar_value = $this.attr("aria-valuenow") + "%";
          $this.width(bar_value);
        }
      });
    });
  }

  // Search form Auto Complete
  var availableTags = window.availableTags;
  availableTags = [
    "Bungee Jumping",
    "Hiking and Camping",
    "Trekking",
    "Wildlife",
    "Polar",
    "Peak Climbing",
    "Mountaineering",
    "Mountain Biking",
    "Extreme Biking",
    "Scuba Diving",
    "Diving",
    "Hunting",
    "Fishing",
    "Boating",
    "Sailing",
    "Extreme",
  ];

  $("#search-input").autocomplete({
    source: availableTags,
    appendTo: ".search-wrap .form-group",
  });

  //	Overwrite Bootstrap Dropdown Feature
  $doc.on("click", ".dropdown", function (e) {
    e.stopPropagation();
  });

  // tab open on hover
  $(".nav-hover > li > a").hover(function () {
    $(this).tab("show");
  });

  // Convert Select Menu to Tab
  $("#tabSelect").on("change", function (e) {
    var id = $(this).val();
    $('a[href="' + id + '"]').tab("show");
  });

  //Image resize on Window Resize
  var doImageStretch = function () {
    $win.trigger("fontresize");
    $(".bg-stretch").each(function () {
      var container = $(this),
        img = container.find("img");
      ImageStretcher.resizeImage(img, container);
    });
  };
  $win.on("load", doImageStretch);
  $win.on("resize orientationchange", function () {
    setTimeout(doImageStretch, 200);
  });

  // on document ready
  $doc.ready(function () {
    var $sliderRange = $("#slider-range");
    var $amount = $("#amount");
    if ($sliderRange.length) {
      // apply range slider
      $sliderRange.slider({
        range: true,
        min: 0,
        max: 3000,
        values: [400, 2600],
        slide: function (event, ui) {
          $amount.val("$" + ui.values[0] + " - $" + ui.values[1]);
        },
      });
      $amount.val(
        "$" +
          $sliderRange.slider("values", 0) +
          " - $" +
          $sliderRange.slider("values", 1)
      );
    }
  });

  // Slider Swipe on Mobile
  $(".ui-slider-handle").draggable();

  // Apply Stellar Parallax
  $doc.ready(function () {
    $.stellar({
      horizontalScrolling: false,
      verticalOffset: 0,
    });
    // Initialize WOW Animation
    new WOW().init();
  });

  //Sticky Header
  var onSCroll = function () {
    var sticky = $("#header"),
      scroll = $win.scrollTop();
    sticky.toggleClass("fixed-position", scroll >= 120);
    $(".pre-header").toggleClass("display-none", scroll >= 120);
  };
  $win.scroll(onSCroll);
  onSCroll();

  // apply open close plugin
  var $openClose = $(".open-close");
  if ($openClose.length) {
    $openClose.openClose({
      activeClass: "active",
      opener: ".cart",
      slider: ".drop-down",
      hideOnClickOutside: true,
      animSpeed: 0,
      effect: "slide",
    });
  }

  var $langHolder = $(".language-holder");
  if ($langHolder.length) {
    $langHolder.openClose({
      activeClass: "active",
      opener: ".lang-opener",
      slider: ".lang-slide",
      hideOnClickOutside: true,
      animSpeed: 0,
      effect: "slide",
    });
  }

  // apply accordion
  var $footerHolder = $(".footer-holder");
  if ($footerHolder.length) {
    $footerHolder.slideAccordion({
      opener: "h3",
      slider: ".slide",
      collapsible: false,
      animSpeed: 300,
    });
  }

  var $detailAcc = $(".detail-accordion");
  if ($detailAcc.length) {
    $detailAcc.slideAccordion({
      opener: "> a",
      slider: ".slide",
      collapsible: true,
      animSpeed: 300,
    });
  }

  var $fiveColl = $(".has-mega-dropdown .five-col");
  if ($fiveColl.length) {
    $fiveColl.slideAccordion({
      opener: ".title",
      slider: "ul",
      collapsible: false,
      animSpeed: 300,
    });
  }

  // apply search plugin
  $body.search({
    hideOnClickOutside: false,
    menuActiveClass: "search-active",
    menuOpener: ".search-opener",
    menuDrop: ".form-group",
  });

  $body.search({
    hideOnClickOutside: false,
    menuActiveClass: "filter-active",
    menuOpener: ".btn-filter",
  });
})(jQuery);

//podešava footer i header
const mainHeader = document.querySelector("#header");
mainHeader.innerHTML = `<div class="pre-header">
            <div class="pre-header-containter">
              <ul>
                <li>
                  <a href="">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="currentColor"
                      class="bi bi-geo-alt"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"
                      />
                      <path
                        d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"
                      />
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="currentColor"
                      class="bi bi-telephone-inbound"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"
                      />
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="">
                    <svg
                      id="Layer_1"
                      data-name="Layer 1"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="currentColor"
                      viewBox="0 0 800 800"
                    >
                      <path
                        d="M145.68,345.26H415.16a12.63,12.63,0,0,0,0-25.26H145.68a12.63,12.63,0,0,0,0,25.26Z"
                      />
                      <path
                        d="M145.68,277.9H297.26a12.64,12.64,0,0,0,0-25.27H145.68a12.64,12.64,0,0,0,0,25.27Z"
                      />
                      <path
                        d="M179.37,622.32H617.26A46.37,46.37,0,0,0,663.58,576V433.68a46.25,46.25,0,0,0-6.2-23.15,12.63,12.63,0,1,0-21.87,12.64,21,21,0,0,1,2.81,10.52V576a21.08,21.08,0,0,1-21.06,21H179.37a21.07,21.07,0,0,1-21.05-21V433.69a21.08,21.08,0,0,1,21.05-21.06H415.16a12.63,12.63,0,1,0,0-25.26H179.37a46.37,46.37,0,0,0-46.32,46.32V576A46.37,46.37,0,0,0,179.37,622.32Z"
                      />
                      <path
                        d="M745.42,644.12A79.72,79.72,0,0,0,749.48,619V248.42a80.1,80.1,0,0,0-80-80H597.9V46.32A46.37,46.37,0,0,0,551.58,0H517.89a46.37,46.37,0,0,0-46.31,46.32v122.1h-341a80.09,80.09,0,0,0-80,80V619a79.72,79.72,0,0,0,4,25.17A80,80,0,0,0,80,800H720a80,80,0,0,0,25.42-155.88ZM496.84,46.32A21.09,21.09,0,0,1,517.9,25.26h33.68a21.08,21.08,0,0,1,21,21.06V67.37H496.84V46.32Zm75.79,46.31V387.37H547.37V92.63Zm-75.79,0H522.1V387.37H496.84Zm0,320h75.79v32.28a4.27,4.27,0,0,1-.84,2.53L538.1,492.35a4.21,4.21,0,0,1-6.73,0l-33.69-44.91a4.27,4.27,0,0,1-.84-2.53V412.63Zm-421-164.21a54.8,54.8,0,0,1,54.74-54.74h341v58.95h-90.1a12.63,12.63,0,1,0,0,25.26h90.1v167a29.66,29.66,0,0,0,5.9,17.69l33.68,44.91a29.48,29.48,0,0,0,47.16,0L592,462.59a29.61,29.61,0,0,0,5.9-17.68V345.26H651A12.63,12.63,0,1,0,651,320H597.9V277.89H651a12.63,12.63,0,0,0,0-25.26H597.9V193.68h71.58a54.8,54.8,0,0,1,54.73,54.74V619a54.8,54.8,0,0,1-54.73,54.74H130.53A54.8,54.8,0,0,1,75.79,619ZM720,774.74H80A54.74,54.74,0,0,1,66.55,666.93a79.93,79.93,0,0,0,64,32H669.47a79.93,79.93,0,0,0,64-32A54.74,54.74,0,0,1,720,774.74Z"
                      />
                      <path
                        d="M368,724.21h-1.68a12.63,12.63,0,1,0,0,25.26H368a12.63,12.63,0,1,0,0-25.26Z"
                      />
                      <path
                        d="M677.9,724.21H425.26a12.63,12.63,0,1,0,0,25.26H677.89a12.63,12.63,0,0,0,0-25.26Z"
                      />
                      <path
                        d="M315.79,724.21H314.1a12.63,12.63,0,0,0,0,25.26h1.69a12.63,12.63,0,1,0,0-25.26Z"
                      />
                      <path
                        d="M256.84,724.21H122.1a12.63,12.63,0,1,0,0,25.26H256.84a12.63,12.63,0,1,0,0-25.26Z"
                      />
                    </svg>
                  </a>
                </li>
              </ul>
              <div class="info">
                <ul>
                  <li class="dropdown">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="white"
                      class="bi bi-info-circle"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                      />
                      <path
                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
                      />
                    </svg>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >O NAMA <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu z-index">
                      <ul>
                        <li>
                          <a href="#">OTOO Ruma</a>
                        </li>
                        <li>
                          <a href="contact.html">Kontakti</a>
                        </li>
                        <li>
                          <a href="">Javne nabavke</a>
                        </li>
                        <li>
                          <a href="">Dokumentacija</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <!-- logo -->
            <div class="logo">
              <a href="index.html">
                <img class="normal" src="img/logos/logo.svg" alt="Entrada" />
                <img
                  class="gray-logo"
                  src="img/logos/logo-gray.svg"
                  alt="Entrada"
                />
              </a>
            </div>
            <!-- main navigation -->
            <nav class="navbar navbar-default">
              <div class="navbar-header">
                <button
                  type="button"
                  class="navbar-toggle nav-opener"
                  data-toggle="collapse"
                  data-target="#nav"
                >
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <!-- main menu items and drop for mobile -->
              <div class="collapse navbar-collapse" id="nav">
                <!-- main navbar -->
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Početna</a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Upoznaj Rumu <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <ul>
                        <li>
                          <a href="istorijat.html">Istorijat</a>
                        </li>
                        <li>
                          <a href="aegeologija.html">Arheologija</a>
                        </li>
                        <li>
                          <a href="sela.html">Sela</a>
                        </li>
                        <li>
                          <a href="znameniti-rumljani.html"
                            >Znameniti Rumljani</a
                          >
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="dropdown has-mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Šta raditi <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <div class="drop-wrap">
                        <div class="five-col">
                          <div class="column">
                            <strong class="title sub-link-opener"
                              >Šetnja</strong
                            >
                            <ul class="header-link">
                              <li>
                                <a href="tematske-setnje.html"
                                  >Tematske šetnje</a
                                >
                              </li>
                            </ul>
                          </div>
                          <div class="column">
                            <strong class="title sub-link-opener"
                              >Odmor u prirodi</strong
                            >
                            <ul class="header-link">
                              <li>
                                <a href="odmori-u-prirodi.html"
                                  >Odmori u prirodi</a
                                >
                              </li>
                              <li>
                                <a href="izletiste-borkovac.html"
                                  >Izletište Borkovac</a
                                >
                              </li>
                              <li>
                                <a href="bara-traskovaca.html"
                                  >ZS "Bara Trskovača"</a
                                >
                              </li>
                            </ul>
                          </div>
                          <div class="column">
                            <strong class="title sub-link-opener"
                              >Sport i rekreacija</strong
                            >
                            <ul class="header-link">
                              <li>
                                <a href="sport-i-rekreacija.html"
                                  >Sport i rekreacija"</a
                                >
                              </li>
                              <li>
                                <a href="bazen-borkovac.html"
                                  >Bazen "Borkovac"</a
                                >
                              </li>
                              <li>
                                <a href="sportski-centri.html"
                                  >Sportski centri</a
                                >
                              </li>
                              <li>
                                <a href="fitnes-centri.html">Fitnes centri</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column">
                            <strong class="title sub-link-opener"
                              >Velnes</strong
                            >
                            <ul class="header-link">
                              <li>
                                <a href="velnes.html">Velnes</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column">
                            <strong class="title sub-link-opener"
                              >Šta raditi</strong
                            >
                            <ul class="header-link">
                              <li>
                                <a href="lov-i-ribolov.html">lov i ribolov</a>
                              </li>
                              <li>
                                <a href="terapijsko-jahanje.html"
                                  >terapijsko jahanje</a
                                >
                              </li>
                              <li><a href="restorani.html">Restorani</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown has-mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Šta videti <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <div class="drop-wrap">
                        <div class="drop-holder">
                          <div class="row">
                            <div class="col-sm-6 col-md-3">
                              <div class="col">
                                <div class="img-wrap">
                                  <a href="sta-videti.html"
                                    ><img
                                      src="img/generic/img-01.jpg"
                                      height="228"
                                      width="350"
                                      alt="image description"
                                  /></a>
                                </div>
                                <div class="des">
                                  <strong class="title"
                                    ><a href="hiking-camping.html"
                                      >Ustanove kulture</a
                                    ></strong
                                  >
                                  <p>
                                    A good backpacker minimizes their impact on
                                    the environment, including staying on
                                    established trails, not disturbing
                                    vegetation, and carrying garbage out.
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="col">
                                <div class="img-wrap">
                                  <a href="jungle-safari.html"
                                    ><img
                                      src="img/generic/img-02.jpg"
                                      height="215"
                                      width="370"
                                      alt="image description"
                                  /></a>
                                </div>
                                <div class="des">
                                  <strong class="title"
                                    ><a href="jungle-safari.html"
                                      >Sakrana baština</a
                                    ></strong
                                  >
                                  <p>
                                    In the past, the trip was often a big-game
                                    hunt, but today, safari often refers to
                                    trips to observe and photograph wildlife—or
                                    hiking and sight-seeing as well.
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="col">
                                <div class="img-wrap">
                                  <a href="city-tour.html"
                                    ><img
                                      src="img/generic/img-03.jpg"
                                      height="215"
                                      width="370"
                                      alt="image description"
                                  /></a>
                                </div>
                                <div class="des">
                                  <strong class="title"
                                    ><a href="city-tour.html"
                                      >Spomenici</a
                                    ></strong
                                  >
                                  <p>
                                    The type of urban city tour considered here
                                    is a full, partial-day, or longer tour of a
                                    historical, or cultural or artistic site in
                                    one or more tourist destinations.
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="col">
                                <div class="img-wrap">
                                  <a href="family-fun.html"
                                    ><img
                                      src="img/generic/img-04.jpg"
                                      height="215"
                                      width="370"
                                      alt="image description"
                                  /></a>
                                </div>
                                <div class="des">
                                  <strong class="title"
                                    ><a href="family-fun.html"
                                      >Graditeljko nasljeđe</a
                                    ></strong
                                  >
                                  <p>
                                    A community area is available on Trafalgar’s
                                    website offering members the opportunity to
                                    interact with fellow travelers by joining
                                    groups, contributing to forums.
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Gde prespavati <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <ul>
                        <li>
                          <a href="hoteli.html">Hoteli</a>
                        </li>
                        <li>
                          <a href="moteli.html">Moteli</a>
                        </li>
                        <li>
                          <a href="prenocista.html">Prenoćišta</a>
                        </li>
                        <li>
                          <a href="apartmani.html">Apartmani</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="dropdown has-mega-dropdown mega-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Enjoy lokal <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <div class="drop-wrap">
                        <div class="row">
                          <div class="col-sm-6">
                            <ul
                              class="header-link"
                            >
                              <li>
                                <a href="elements-animations.html"></a>
                                  Zanastvo i trgovina</a
                                >
                              </li>
                              <li>
                                <a
                                  href="elements-blockquotes.html"
                                  style="margin-left: 15px"
                                  >- Cehovska povelja</a
                                >
                              </li>
                              <li>
                                <a href="elements-buttons.html" style="margin-left: 15px"
                                  >- Zanatski proizvodi</a
                                >
                              </li>
                              <li>
                                <a href="elements-carousel.html" style="margin-left: 15px"
                                  >- Gastronomski proizvodi</a
                                >
                              </li>
                              <li>
                                <a href="elements-counters.html" style="margin-left: 15px">- Rukotvorine</a> 
                              </li>
                            </ul>
                          </div>
                          <div class="col-sm-6">
                            <ul class="header-link">
                              <li>
                                <a href="elements-columns.html">Rumski vašar</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown has-mega-dropdown mega-md">
                    <a href="eee.html"
                      >Manifestacije <b></b
                    ></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >INFO<b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <ul>
                        <li>
                          <a href="kako-stici.html">Lokacija kako stići</a>
                        </li>
                        <li>
                          <a href="korisne-informacije.html"
                            >Kroisne informacije</a
                          >
                        </li>
                        <li>
                          <a href="turisticki-info-centar.html"
                            >Turistički infocentar</a
                          >
                        </li>
                        <li><a href="vesti.html">Vesti</a></li>
                      </ul>
                    </div>
                  </li>
                  <li
                    class="dropdown hidden-xs hidden-sm last-dropdown v-divider"
                  >
                    <a class="current-language-large" href="#">
                      <img class="lang-img" src="img/serbian-flag.jpg" alt="" />
                      <span class="text">SRP</span>
                      <span class="icon-angle-down"></span
                    ></a>
                    <div class="dropdown-menu dropdown-sm">
                      <div class="drop-wrap lang-wrap">
                        <div class="lang-row">
                          <div class="lang-col">
                            <a href="#">
                              <img
                                class="lang-img"
                                src="img/serbian-flag.jpg"
                                alt=""
                              />
                              <span class="text">Srpski</span>
                            </a>
                          </div>
                        </div>
                        <div class="lang-row">
                          <div class="lang-col">
                            <a href="#">
                              <img
                                class="lang-img"
                                src="img/serbian-flag.jpg"
                                alt=""
                              />
                              <span class="text">Српски</span>
                            </a>
                          </div>
                        </div>
                        <div class="lang-row">
                          <div class="lang-col">
                            <a href="#">
                              <img
                                class="lang-img"
                                src="img/english-flag.jpg"
                                alt=""
                              />
                              <span class="text">English</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <!-- <li class="visible-md visible-lg nav-visible v-divider">
                    <a href="#" class="search-opener"
                      ><span class="icon icon-search"></span
                    ></a>
                  </li> -->
                </ul>
              </div>
            </nav>
            <div class="lang-mobile">
            <div class="language">
              <div class="current-language">
                <img src="img/serbian-flag.jpg" alt="Serbian Flag" />
                <span>српски</span>
              </div>
              <ul class="language-dropdown">
                <li>
                  <img
                    src="img/serbian-flag.jpg"
                    width="12px"
                    alt="English Flag"
                  />Српски
                </li>
                <li>
                  <img src="img/serbian-flag.jpg" alt="German Flag" />Srpski
                </li>
                <li>
                  <img src="img/english-flag.jpg" alt="Spanish Flag" />English
                </li>
                <!-- Dodajte druge jezike po potrebi -->
              </ul>
            </div>
          </div>
          </div>
          <!-- search form -->`;

const mainFooter = document.querySelector("#footer");
mainFooter.innerHTML = `<div class="container">
          <!-- newsletter form -->
          <!-- footer links -->
          <div class="row footer-holder">
            <nav class="col-sm-4 col-lg-2 footer-nav active">
              <h3>Upoznaj Rumu</h3>
              <ul class="slide">
                <li><a href="#">Istorijat</a></li>
                <li><a href="#">Arheologija</a></li>
                <li><a href="#">Sela</a></li>
                <li><a href="#">Znameniti Rumljani</a></li>
              </ul>
            </nav>
            <nav class="col-sm-4 col-lg-2 footer-nav">
              <h3>Šta raditi</h3>
              <ul class="slide">
                <li><a href="#">Tematske šetnje</a></li>
                <li><a href="#">Odmori u prirodi</a></li>
                <li><a href="#">Sport i rekreacija</a></li>
                <li><a href="#">Velnes</a></li>
                <li><a href="#">Lov i ribolov</a></li>
                <li><a href="#">Terapijsko jahanje</a></li>
                <li><a href="#">restorani</a></li>
                <li><a href="#">Kafe i poslastičarnice</a></li>
              </ul>
            </nav>
            <nav class="col-sm-4 col-lg-2 footer-nav">
              <h3>Šta videti</h3>
              <ul class="slide">
                <li><a href="#">ustanove i kulture</a></li>
                <li><a href="#">sakrana baština</a></li>
                <li><a href="#">spomenici</a></li>
                <li><a href="#">gradsko nasleđe</a></li>
              </ul>
            </nav>
            <nav class="col-sm-4 col-lg-2 footer-nav">
              <h3>gde prespavati</h3>
              <ul class="slide">
                <li><a href="#">hoteli</a></li>
                <li><a href="#">moteli</a></li>
                <li><a href="#">prenoćišta</a></li>
                <li><a href="#">apartmani</a></li>
              </ul>
            </nav>
            <nav class="col-sm-4 col-lg-2 footer-nav">
              <h3>info</h3>
              <ul class="slide">
                <li><a href="#">lokacija kako stići</a></li>
                <li><a href="#">korisne informacije</a></li>
                <li><a href="#">turistički info centar</a></li>
                <li><a href="#">vesti</a></li>
              </ul>
            </nav>
            <nav class="col-sm-4 col-lg-2 footer-nav last">
              <h3>Kontakt</h3>
              <ul class="slide address-block">
                <li class="wrap-text">
                  <span class="icon-tel"></span>
                  <a href="tel:02072077878">+381 000 000</a>
                </li>
                <li class="wrap-text">
                  <span class="icon-fax"></span>
                  <a href="tel:02088828282">+381 000 000</a>
                </li>
                <li class="wrap-text">
                  <span class="icon-email"></span>
                  <a href="mailto:info@entrada.com">info@ruma.rs</a>
                </li>
                <li>
                  <span class="icon-home"></span>
                  <address>Glavna 155</address>
                </li>
              </ul>
            </nav>
          </div>
          <!-- social wrap -->
          <ul class="social-wrap">
            <li class="facebook">
              <a href="#">
                <span class="icon-facebook"></span>
                <strong class="txt">Like Us</strong>
              </a>
            </li>
            <li class="twitter">
              <a href="#">
                <span class="icon-twitter"></span>
                <strong class="txt">Follow On</strong>
              </a>
            </li>
          </ul>
        </div>
        <div class="footer-bottom">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <!-- copyright -->
                <strong class="copyright"
                  ><i class="fa fa-copyright"></i> Copyright 2023 Turistička
                  organizacija opština Ruma Created - by
                  <a href="https://www.qwpmedia.com/">QWP Media</a></strong
                >
              </div>
            </div>
          </div>
        </div>`;
