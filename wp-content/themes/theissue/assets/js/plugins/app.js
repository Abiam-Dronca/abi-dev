window.onpageshow = function(event) {
  if (event.persisted) {
    window.location.reload();
  }
};

(function($, window) {
  'use strict';

  var $doc = $(document),
    win = $(window),
    body = $('body'),
    adminbar = $('#wpadminbar'),
    cc = $('.click-capture'),
    header = $('.header'),
    wrapper = $('#wrapper'),
    mobile_menu = $('#mobile-menu'),
    mobile_toggle = $('.mobile-toggle-holder'),
    thb_css_ease = 'cubic-bezier(0.35, 0.3, 0.2, 0.85)',
    thb_ease = new BezierEasing(0.35, 0.3, 0.2, 0.85),
    thb_md = new MobileDetect(window.navigator.userAgent);

  var SITE = SITE || {};

  gsap.defaults({
    ease: thb_ease
  });
  gsap.config({
    nullTargetWarn: false
  });

  window.lazySizesConfig = window.lazySizesConfig || {};
  window.lazySizesConfig.expand = 1000;
  window.lazySizesConfig.loadMode = 1;
  window.lazySizesConfig.loadHidden = false;

  SITE = {
    activeSlider: false,
    menuscroll: $('#menu-scroll'),
    h_offset: 0,
    init: function() {
      var self = this,
        obj;

      function initFunctions() {
        for (obj in self) {
          if (self.hasOwnProperty(obj)) {
            var _method = self[obj];
            if (_method.selector !== undefined && _method.init !== undefined) {
              if ($(_method.selector).length > 0) {
                _method.init();
              }
            }
          }
        }
      }
      if (themeajax.settings.page_transition === 'on' && !body.hasClass('compose-mode') && !body.hasClass('elementor-editor-active')) {
        var overlay = $.inArray(themeajax.settings.page_transition_style, ['thb-swipe-left']) > -1 ? true : false;

        $('.thb-page-transition-on')
          .animsition({
            inClass: themeajax.settings.page_transition_style + '-in',
            outClass: themeajax.settings.page_transition_style + '-out',
            inDuration: parseInt(themeajax.settings.page_transition_in_speed, 10),
            outDuration: parseInt(themeajax.settings.page_transition_out_speed, 10),
            touchSupport: false,
            overlay: overlay,
            overlayClass: 'thb-page-transition-overlay',
            linkElement: '.animsition-link,a[href]:not([target=" _blank"]):not([target="_blank"]):not([href^="' + themeajax.settings.current_url + '#"]):not([href^="#"]):not([href*="javascript"]):not([href*=".rar"]):not([href*=".zip"]):not([href*=".jpg"]):not([href*=".jpeg"]):not([href*=".gif"]):not([href*=".png"]):not([href*=".mov"]):not([href*=".swf"]):not([href*=".mp4"]):not([href*=".flv"]):not([href*=".avi"]):not([href*=".mp3"]):not([href^="tel:"]):not([href^="mailto:"]):not([class="no-animation"]):not(.ajax_add_to_cart):not([class*="ftg-lightbox"]):not(.wpcf7-submit):not(.comment-reply-link):not(.mfp-image):not(.mfp-video):not(.add_to_wishlist):not(.remove_from_cart_button):not([id*="cancel-comment-reply-link"]):not(.do-not-animate):not(.mfp-inline):not(.remove):not([href^="' + location.protocol + '//' + location.host + location.pathname + '#"])'
          })
          .on('animsition-instart', function() {
            _.delay(function() {
              initFunctions();
            }, (parseInt(themeajax.settings.page_transition_in_speed, 10) / 0.8));

          });
      } else {
        initFunctions();
      }
    },
    beforeHeader: {
      selector: '.thb_before_header',
      init: function() {
        var base = this,
          container = $(base.selector),
          inner = $('.thb_before_header_inner', container),
          parallax = container.data('parallax');

        if (thb_md.mobile() || parallax === 'off') {
          return;
        }
        win.on('scroll', function() {
          if (win.scrollTop() > (win.outerHeight() / 2)) {
            return;
          }
          gsap.set(inner, {
            y: win.scrollTop() / 2
          });
        });
      }
    },
    newsletterPopup: {
      selector: '.newsletter-popup',
      init: function() {
        var base = this,
          container = $(base.selector);

        if (Cookies.get('newsletter_popup') !== '1') {

          if (themeajax.settings.newsletter === 'off') {
            return;
          }
          _.delay(function() {
            $.magnificPopup.open({
              type: 'inline',
              items: {
                src: '#newsletter-popup',
                type: 'inline'
              },
              mainClass: 'mfp newsletter-popup mfp-zoom-in',
              tLoading: themeajax.l10n.lightbox_loading,
              removalDelay: 400,
              fixedBgPos: true,
              fixedContentPos: true,
              closeBtnInside: true,
              closeMarkup: '<button title="%title%" class="mfp-close"><span>' + themeajax.svg.close_arrow + '</span></button>',
              callbacks: {
                close: function() {
                  Cookies.set('newsletter_popup', '1', {
                    expires: parseInt(themeajax.settings.newsletter_length, 10)
                  });
                }
              }
            });
          }, (parseInt(themeajax.settings.newsletter_delay, 10) * 1000));

        }
      }
    },
    cookieBar: {
      selector: '.thb-cookie-bar',
      init: function() {
        var base = this,
          container = $(base.selector),
          button = $('.button-accept', container),
          close = $('.thb-mobile-close', container);

        if (Cookies.get('thb-theissue-cookiebar') !== 'hide') {
          gsap.to(container, {
            duration: 0.5,
            opacity: '1',
            y: '0%'
          });
        }
        button.on('click', function() {
          Cookies.set('thb-theissue-cookiebar', 'hide', {
            expires: 30
          });
          gsap.to(container, {
            duration: 0.5,
            opacity: '0',
            y: '100%'
          });
          return false;
        });
        close.on('click', function() {
          gsap.to(container, {
            duration: 0.5,
            opacity: '0',
            y: '100%'
          });
          return false;
        });
      }
    },
    header: {
      selector: '.header',
      light: false,
      init: function() {
        var base = this,
          offset = 150;

        function thb_set_mobile_header() {
          $('.mobile-header-holder').css({
            'height': function() {
              return $('.header.header-mobile').outerHeight() + 'px';
            }
          });
        }
        if ($('.thb_before_header').length) {
          win.on('resize.before-header', function() {
            offset = 150 + $('.thb_before_header').outerHeight();
          }).trigger('resize.before-header');
        }
        if (themeajax.settings.fixed_header_scroll === 'on') {
          $('.header.fixed:not(.header-mobile)').headroom({
            offset: offset
          });
        }
        win.on('resize.mobile-header', function() {
          if (thb_md.mobile() || win.width() < 1024) {
            thb_set_mobile_header();

            if (themeajax.settings.fixed_header_scroll === 'on' && !$('.header.header-mobile').hasClass('headroom')) {
              $('.header.header-mobile').headroom({
                offset: 50
              });
            }
          }
        }).trigger('resize.mobile-header');
        win.on('scroll.mobile-header', function() {
          if (win.scrollTop() > offset) {
            $('.header.header-mobile').addClass('fixed');
          } else {
            $('.header.header-mobile').removeClass('fixed');
          }
        }).trigger('scroll.mobile-header');
        win.on('scroll.fixed-header', function() {
          base.scroll(offset);
        }).trigger('scroll.fixed-header');

      },
      scroll: function(offset) {
        var wOffset = win.scrollTop(),
          stick = 'fixed-enabled';

        if (wOffset > offset) {
          $('.header.fixed').addClass(stick);
        } else {
          $('.header.fixed').removeClass(stick);
        }
      }
    },
    fullMenu: {
      selector: '.thb-full-menu',
      init: function() {
        var base = this,
          container = $(base.selector),
          li_org = container.find('a'),
          children = container.find('li.menu-item-has-children'),
          mega_menu = container.find('li.menu-item-has-children.menu-item-mega-parent');

        var resizeMegaMenu = function(_this, menu_container) {
          if (!_this.find('.thb_mega_menu_holder').length) {
            return;
          }
          _this.find('.thb_mega_menu_holder').css({
            'width': function() {
              return parseInt(menu_container.outerWidth(), 10);
            },
            'left': function() {
              if (_this.parents('.header').hasClass('style6') || _this.parents('.header').hasClass('style9')) {
                return 0;
              }
              if (_this.parents('.header').hasClass('style3') || _this.parents('.header').hasClass('style10') || _this.parents('.header').hasClass('main-header-style3') || _this.parents('.header').hasClass('main-header-style10')) {
                return -1 * ((_this.find('.thb_mega_menu_holder').outerWidth() - menu_container.find('.full-menu').outerWidth()) / 2);
              }
              return -1 * (_this.parents('.header').find('.full-menu').offset().left - menu_container.offset().left);
            }
          });
        };

        /* Sub-Menus */
        children.each(function() {
          var _this = $(this),
            menu = _this.find('>.sub-menu, .sub-menu.thb_mega_menu'),
            li = menu.find('>li>a'),
            tabs = _this.find('.thb_mega_menu li'),
            tl = gsap.timeline({
              paused: true
            });

          tl
            .to(menu, {
              duration: 0.5,
              autoAlpha: 1,
              display: 'block'
            }, "start");

          if (li.length) {
            tl.to(li, {
              duration: 0.1,
              opacity: 1,
              stagger: 0.03
            }, "start");
          }


          _this.hoverIntent(
            function() {
              _this.addClass('sfHover');
              tl.timeScale(1).restart();
            },
            function() {
              _this.removeClass('sfHover');
              tl.timeScale(1.5).reverse();
            }
          );
        });

        /* Mega Menu Width */
        container.each(function() {
          var _this = $(this),
            menu_container = $('.header.thb-main-header').find('.thb-navbar');
          win.on('resize.resizeMegaMenu', _.debounce(function() {
            resizeMegaMenu(_this, menu_container);
          }, 30)).trigger('resize.resizeMegaMenu');
        });

        mega_menu.each(function() {
          var _this = $(this),
            tabs = _this.find('.thb_mega_menu>li'),
            contents = _this.find('.category-children>.tab-holder');

          tabs.first().addClass('active');
          tabs.on('mouseenter', function() {
            var _li = $(this),
              n = _li.index(),
              active_content = contents.filter(':nth-child(' + (n + 1) + ')');
            tabs.removeClass('active');

            _li.addClass('active');
            gsap.set(contents, {
              display: 'none'
            });
            gsap.set(active_content, {
              display: 'flex'
            });
            if (active_content.find('.thb-carousel').length) {
              active_content.find('.thb-carousel').slick('setPosition');
            }
          });
        });

      }
    },
    mobileMenu: {
      selector: '#mobile-menu',
      init: function() {
        var base = this,
          container = $(base.selector),
          behaviour = container.data('behaviour'),
          arrow = behaviour === 'thb-submenu' ? container.find('li.menu-item-has-children>a') : container.find('li.menu-item-has-children>a .thb-arrow');

        arrow.on('click', function(e) {
          var that = $(this),
            parent = that.parents('a').length ? that.parents('a') : that,
            menu = parent.next('.sub-menu');

          if (parent.hasClass('active')) {
            parent.removeClass('active');
            menu.slideUp('200');
          } else {
            parent.addClass('active');
            menu.slideDown('200');
          }
          e.stopPropagation();
          e.preventDefault();
        });
      }
    },
    hashLinks: {
      selector: 'a[href*="#"]',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.on('click', function(e) {
          var _this = $(this),
            url = _this.attr('href'),
            hash,
            pos;

          if (_this.parents('ul.commentlist').length) {
            return;
          }
          if (_this.parents('.woocommerce-tabs').length) {
            return;
          }
          if (_this.hasClass('comment-reply-link') || _this.attr('id') === 'cancel-comment-reply-link' || _this.hasClass('page-numbers')) {
            return;
          }
          if (url) {
            hash = url.indexOf("#") !== -1 ? url.substring(url.indexOf("#") + 1) : '';
            pos = hash && $('#' + hash).length ? ($('#' + hash).offset().top - ($('#wpadminbar').outerHeight() || 0)) : 0;
          }
          if ($('.fixed-header-on').length && themeajax.settings.fixed_header_scroll !== 'on' && pos) {
            var fixed_height = $('.header>.row').outerHeight() + (parseInt(themeajax.settings.fixed_header_padding.top, 10) || 0) + (parseInt(themeajax.settings.fixed_header_padding.bottom, 10) || 0);
            if (fixed_height) {
              pos -= fixed_height;
            }
          }
          if (hash && pos) {
            pos = (hash === 'footer') ? "max" : pos;


            if (_this.parents('.thb-mobile-menu').length) {
              SITE.mobile_toggle.mobileTl.reverse();
            }
            if (!$('#' + hash).hasClass('vc_tta-panel')) {
              gsap.to(win, {
                duration: 0.5,
                scrollTo: {
                  y: pos,
                  autoKill: false
                }
              });
            }
            e.preventDefault();
          }
        });
      }
    },
    custom_scroll: {
      selector: '.custom_scroll',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.each(function() {
          var _this = $(this),
            args = {
              suppressScrollX: true
            };

          var ps = new PerfectScrollbar(_this[0], args);

          if (_this.attr('id') === 'menu-scroll') {
            SITE.menuscroll = ps;
          }

        });

      }
    },
    shop_toggle: {
      selector: '#thb-shop-filters',
      init: function() {
        var base = this,
          container = $(base.selector),
          filters = $('#side-filters'),
          tl = gsap.timeline({
            paused: true,
            reversed: true,
            onStart: function() {
              wrapper.addClass('open-filters');
            },
            onReverseComplete: function() {
              wrapper.removeClass('open-filters');
            }
          }),
          items = $('.widgets', filters),
          close = $('.thb-mobile-close', filters);

        tl
          .to(filters, {
            duration: 0.3,
            x: '0'
          }, "start")
          .to(close, {
            duration: 0.3,
            scale: 1
          }, "start+=0.2")
          .from(items, {
            duration: 0.4,
            autoAlpha: 0,
            stagger: 0.1
          }, 0.1, "start+=0.2");

        container.on('click', function() {
          if (tl.reversed()) {
            tl.timeScale(1).play();
          } else {
            tl.timeScale(1.2).reverse();
          }
          return false;
        });

        $doc.keyup(function(e) {
          if (e.keyCode === 27) {
            if (tl.progress() > 0) {
              tl.reverse();
            }
          }
        });
        cc.add(close).on('click', function() {
          if (tl.progress() > 0) {
            tl.reverse();
          }
          return false;
        });
      }
    },
    mobile_toggle: {
      selector: '.mobile-toggle-holder',
      init: function() {
        var base = this,
          container = $(base.selector),
          tl = gsap.timeline({
            paused: true,
            reversed: true,
            onStart: function() {
              wrapper.addClass('open-menu');
            },
            onComplete: function() {
              SITE.menuscroll.update();
            },
            onReverseComplete: function() {
              wrapper.removeClass('open-menu');
              gsap.set(mobile_menu, {
                clearProps: 'all'
              });
            }
          }),
          items = $('.thb-mobile-menu>li', mobile_menu),
          secondary_items = $('.thb-secondary-menu>li', mobile_menu),
          mobile_footer = $('.menu-footer>*', mobile_menu),
          icons = $('.socials>a', mobile_menu),
          close = $('.thb-mobile-close', mobile_menu),
          speed = themeajax.settings.mobile_menu_animation_speed,
          offset = "start+=" + ((speed / 3) * 2);


        speed = speed === 0 ? 0.005 : speed;
        tl
          .to(mobile_menu, {
            duration: speed,
            x: '0'
          }, "start")
          .to(close, {
            duration: speed,
            scale: 1
          }, offset)
          .from(items, {
            duration: ((speed / 3) * 4),
            autoAlpha: 0,
            stagger: (speed / 3)
          }, offset)
          .from(secondary_items.add(mobile_footer).add(icons), {
            duration: speed,
            autoAlpha: 0,
            stagger: (speed / 3)
          }, offset);


        container.on('click', function() {
          if (tl.reversed()) {
            tl.timeScale(1).play();
          } else {
            tl.timeScale(1.2).reverse();
          }
          return false;
        });

        $doc.keyup(function(e) {
          if (e.keyCode === 27) {
            if (tl.progress() > 0) {
              tl.reverse();
            }
          }
        });
        cc.add(close).on('click', function() {
          if (tl.progress() > 0) {
            tl.reverse();
          }
          return false;
        });
      }
    },
    search: {
      selector: '.thb-search-holder',
      init: function() {
        var base = this,
          container = $(base.selector),
          search_window = $('.thb-search-popup'),
          close_btn = $('.thb-mobile-close', search_window),
          close = $('.thb-close-text', search_window),
          tl = gsap.timeline({
            paused: true
          });

        tl
          .to(search_window, {
            duration: 0.5,
            autoAlpha: 1
          }, "start")
          .to(close_btn, {
            duration: 0.3,
            scale: 1
          }, "start+=0.2");

        container.on('click', function() {
          tl.play();
          return false;
        });
        close.add(close_btn).on('click', function() {
          if (tl.progress() > 0) {
            tl.reverse();
          }
          return false;
        });
        $doc.on('keyup', function(e) {
          if (e.keyCode === 27) {
            if (tl.progress() > 0) {
              tl.reverse();
            }
          }
        });
      }
    },
    autoComplete: {
      selector: '.thb-search-popup',
      init: function() {
        var base = this,
          container = $(base.selector),
          field = $('.search-field', container),
          security = container.data('security');

        if (themeajax.settings.general_search_ajax !== 'on') {
          return;
        }
        field.autocomplete({
          minChars: 3,
          appendTo: $('.thb-autocomplete-wrapper', container),
          containerClass: 'thb-results-container',
          triggerSelectOnValidInput: false,
          serviceUrl: themeajax.url + '?action=thb_ajax_search',
          tabDisabled: true,
          showNoSuggestionNotice: false,
          params: {
            security: security
          },
          onSearchStart: function() {
            $('.thb-autocomplete-wrapper', container).addClass('thb-loading');
          },
          formatResult: function(suggestion, currentValue) {
            return '<div class="small-12 columns"><a href="' + suggestion.url + '"><figure class="post-gallery">' + suggestion.thumbnail + '</figure><div class="post-title"><h6>' + suggestion.value + '</h6></div></a></div>';
          },
          onSelect: function(suggestion) {
            if (suggestion.id !== -1) {
              window.location.href = suggestion.url;
            }
          },
          onSearchComplete: function(query, suggestions) {
            $('.thb-autocomplete-wrapper', container).removeClass('thb-loading');

            if (suggestions.length) {
              $('.thb-results-container').append($('<div class="thb-search-btn"><a href="' + themeajax.settings.site_url + '?s=' + query + '" class="btn style2 small">' + themeajax.l10n.results_all + '</a></div>'));
            }
          }
        });
      }
    },
    pinIt: {
      selector: '.thb-pinit-on',
      init: function(el) {
        var base = this,
          container = $(base.selector);

        if (!container.length) {
          return;
        }
        $('#wrapper').imagesLoaded(function() {
          base.check($('.post-detail .post-content-container img:not(.attachment-woocommerce_thumbnail):not(.thb-pinned)'));
        });
        $('.post-detail .post-content-container img:not(.attachment-woocommerce_thumbnail):not(.thb-pinned)').on('lazyloaded', function() {
          base.check($(this));
        });
      },
      check: function(el) {
        el.each(function() {
          var _this = $(this),
            pinned_class = 'thb-pinned';

          if (_this.hasClass(pinned_class) || _this.hasClass('attachment-woocommerce_thumbnail')) {
            return;
          }

          if (!(_this.width() > 100 && _this.height() > 100)) {
            return;
          }

          var container = _this.parent(),
            postURL = _this.parents('.post[data-url]').data('url'),
            pinURL;

          if (postURL === undefined) {
            postURL = _this.parents('.post-gallery-content').data('url');
          }
          // If parent is link
          if (container.is('a')) {

            var image_link = container.attr('href');

            if (typeof image_link !== 'undefined' && image_link.match(/\.(gif|jpeg|jpg|png)/)) {
              pinURL = image_link;
            }

            if (!container.closest('figure').length) {
              container.wrap('<figure class="thb-pin-it-container"></figure>');
            }

            container = container.parent();

          } else {
            if (!(container.is('figure') || container.closest('figure').length)) {
              _this.wrap('<figure class="thb-pin-it-container"></figure>');
            }
            container = _this.parent();
          }
          // Add .thb-pin-it-container to already existing figure
          if (!_this.closest('figure').hasClass('thb-pin-it-container')) {
            _this.closest('figure').addClass('thb-pin-it-container');
          }

          if (!pinURL) {
            if (_this.is('img')) {
              pinURL = (typeof _this.data('src') !== 'undefined') ? _this.data('src') : _this.attr('src');
            } else {
              pinURL = (typeof container.find('img').data('src') !== 'undefined') ? container.find('img').data('src') : container.find('img').attr('src');
            }
          }

          var figure = container;

          if (!container.is('figure')) {
            figure = container.closest('figure');
          }

          // Description for the image
          var description = figure.find('.wp-caption-text').text() ? figure.find('.wp-caption-text').text() : figure.find('img').attr('alt'),
            encoded_desc = '';

          if (description) {
            encoded_desc = '&amp;description=' + encodeURIComponent(description);
          }

          // Img classes.
          var imgClasses = ['alignnone', 'aligncenter', 'alignleft', 'alignright'];

          imgClasses.forEach(function(img_class) {
            if (container.find('img').hasClass(img_class)) {
              container.find('img').removeClass(img_class);
              container.find('img').closest('figure').addClass(img_class);

              var image_width = container.find('img').attr('width');

              if (parseInt(image_width) !== 'NaN') {
                container.find('img').closest('figure').width(image_width);
              }
            }
          });

          $('<a class="thb-pin-it" href="https://pinterest.com/pin/create/bookmarklet/?url=' + encodeURIComponent(postURL) + '&amp;media=' + encodeURIComponent(pinURL) + encoded_desc + '&is_video=false" target="_blank"><i class="thb-icon-pinterest"></i>' + themeajax.l10n.pinit + '</a>')
            .appendTo(container)
            .addClass('thb-pin-it-ready')
            .on('click', function() {
              var left = (screen.width / 2) - (640 / 2),
                top = (screen.height / 2) - (440 / 2) - 100;
              window.open($(this).attr('href'), 'mywin', 'left=' + left + ',top=' + top + ',width=640,height=440,toolbar=0');
              return false;
            });
          _this.addClass(pinned_class);
        });
      }
    },
    slick: {
      selector: '.thb-carousel',
      init: function(el) {
        var base = this,
          container = el ? el : $(base.selector);

        container.each(function() {
          var _this = $(this),
            data_columns = _this.data('columns') ? _this.data('columns') : 3,
            thb_columns = data_columns.length > 2 ? parseInt(data_columns.substr(data_columns.length - 1)) : data_columns,
            children = _this.find('.columns'),
            columns = data_columns.length > 2 ? (thb_columns === 5 ? 5 : (12 / thb_columns)) : data_columns,
            fade = (_this.data('fade') ? true : false),
            navigation = (_this.data('navigation') === true ? true : false),
            autoplay = (_this.data('autoplay') === true ? true : false),
            pagination = (_this.data('pagination') === true ? true : false),
            center = (_this.data('center') ? (((children.length > columns) && (columns % 2)) ? _this.data('center') : false) : false),
            infinite = (_this.data('infinite') === false ? false : true),
            autoplay_speed = _this.data('autoplay-speed') ? _this.data('autoplay-speed') : 4000,
            disablepadding = (_this.data('disablepadding') ? _this.data('disablepadding') : false),
            vertical = (_this.data('vertical') === true ? true : false),
            asNavFor = _this.data('asnavfor'),
            adaptiveHeight = _this.data('adaptive') === true ? true : false,
            rtl = body.hasClass('rtl'),
            prev_text = '',
            next_text = '';

          if (!_this.hasClass('slick-initialized')) {
            if (_this.hasClass('bottom-arrows')) {
              _this.append('<div class="slick-bottom-arrows"><div class="slick-dots-wrapper"></div></div>');
            }
          }
          if (_this.hasClass('overflow-visible-only') || _this.hasClass('overflow-visible')) {
            _this.parents('.wpb_row:not(.vc_inner)').css('overflow', 'hidden');
          }
          var args = {
            dots: pagination,
            arrows: navigation,
            infinite: infinite,
            speed: 1000,
            rows: 0,
            fade: fade,
            centerPadding: '10%',
            centerMode: center,
            slidesToShow: columns,
            adaptiveHeight: adaptiveHeight,
            slidesToScroll: 1,
            rtl: rtl,
            slide: ':not(.slick-dots-wrapper):not(.slick-bottom-arrows):not(.post-gallery):not(.btn)',
            cssEase: thb_css_ease,
            autoplay: autoplay,
            autoplaySpeed: autoplay_speed,
            touchThreshold: themeajax.settings.touch_threshold,
            pauseOnHover: true,
            accessibility: false,
            focusOnSelect: true,
            customPaging: function(slider, i) {
              if (_this.hasClass('text-pagination')) {
                return (i + 1) + ' <span class="slick-of">' + themeajax.l10n.just_of + ' ' + slider.$slides.length + '</span>';
              } else {
                return $('<button type="button">' + (i + 1) + themeajax.svg.pagination + '</button>');
              }
            },
            prevArrow: '<button type="button" class="slick-nav slick-prev">' + themeajax.svg.prev_arrow + '</button>',
            nextArrow: '<button type="button" class="slick-nav slick-next">' + themeajax.svg.next_arrow + '</button>',
            responsive: [{
                breakpoint: 1441,
                settings: {
                  slidesToShow: (columns < 6 ? columns : (vertical ? columns - 1 : 6)),
                  centerPadding: (disablepadding ? 0 : '40px')
                }
              },
              {
                breakpoint: 1201,
                settings: {
                  slidesToShow: (columns < 4 ? columns : (vertical ? columns - 1 : 4)),
                  centerPadding: (disablepadding ? 0 : '40px')
                }
              },
              {
                breakpoint: 1025,
                settings: {
                  slidesToShow: (columns < 3 ? columns : (vertical ? columns - 1 : 3)),
                  centerPadding: (disablepadding ? 0 : '40px')
                }
              },
              {
                breakpoint: 641,
                settings: {
                  slidesToShow: 1,
                }
              }
            ]
          };
          if (_this.hasClass('thb-post-carousel-style3')) {
            args.variableWidth = true;
            args.responsive = false;
          }
          if (_this.hasClass('bottom-arrows')) {
            args.appendArrows = _this.find('.slick-bottom-arrows');
            args.appendDots = _this.find('.slick-bottom-arrows>.slick-dots-wrapper');
          }
          if (asNavFor && $(asNavFor).is(':visible')) {
            args.asNavFor = asNavFor;
          }
          if (_this.data('fade')) {
            args.fade = true;
          }
          if (_this.hasClass('thb-background-hover')) {
            _this.on('init', function(e, slick) {
              var post_images = _this.parents('.thb-post-background').find('.post-background-gallery .wp-post-image');

              slick.$slides.on('mouseenter', function() {
                var i = $(this).data('slick-index'),
                  active_img = post_images.eq(i);
                gsap.to(post_images.not(active_img), {
                  duration: 0.5,
                  autoAlpha: 0
                });
                if (active_img) {
                  gsap.to(active_img, {
                    duration: 0.5,
                    autoAlpha: 0.8
                  });
                }
              });
            });
            _this.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
              var post_images = _this.parents('.thb-post-background').find('.post-background-gallery .wp-post-image'),
                active_img = post_images.eq(nextSlide);
              gsap.to(post_images.not(active_img), {
                duration: 0.5,
                autoAlpha: 0
              });
              if (active_img) {
                gsap.to(active_img, {
                  duration: 0.5,
                  autoAlpha: 0.8
                });
              }
            });
          }
          if (_this.hasClass('product-images')) {

            // Zoom Support
            if (typeof wc_single_product_params !== 'undefined') {
              if (window.wc_single_product_params.zoom_enabled && $.fn.zoom) {
                _this.on('afterChange', function(event, slick, currentSlide) {
                  var zoomTarget = slick.$slides.eq(currentSlide),
                    galleryWidth = zoomTarget.width(),
                    zoomEnabled = false,
                    image = zoomTarget.find('img');

                  if (image.data('large_image_width') > galleryWidth) {
                    zoomEnabled = true;
                  }
                  if (zoomEnabled) {
                    var zoom_options = $.extend({
                      touch: false
                    }, window.wc_single_product_params.zoom_options);

                    if ('ontouchstart' in window) {
                      zoom_options.on = 'click';
                    }

                    zoomTarget.trigger('zoom.destroy');
                    zoomTarget.zoom(zoom_options);
                    zoomTarget.trigger('mouseenter.zoom');
                  }

                });
              }
            }
          }
          if (_this.hasClass('product-thumbnails')) {

            args.vertical = true;
            args.responsive[2].settings.vertical = false;
            args.responsive[2].settings.slidesToShow = 4;
            args.responsive[3].settings.vertical = false;
            args.responsive[3].settings.slidesToShow = 4;
          }
          if (_this.hasClass('products')) {
            args.responsive[3].settings.slidesToShow = 2;
          }

          if (center) {
            _this.on('init', function() {
              _this.addClass('centered');
            });
          }

          _this.on('init breakpoint', function(e, slick) {
            if (_this.hasClass('bottom-arrows') && _this.hasClass('has-carousel-button')) {
              _this.find('.btn').appendTo(_this.find('.slick-dots-wrapper'));
            }
            if (lazySizes) {
              lazySizes.loader.checkElems();
            }
            win.trigger('scroll.thb-animation');
          });
          _this.on('breakpoint', function(event, slick, breakpoint) {
            slick.$slides.data('thb-animated', false);
            win.trigger('scroll.thb-animation');
          });
          _this.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            var next = slick.$slides.eq(nextSlide);
            if (next.find('.post-gallery.thb-parallax') && body.hasClass('thb-parallax-on')) {
              if (next.find('.has-post-thumbnail .post-gallery.thb-parallax .wp-post-image').length) {
                next.find('.has-post-thumbnail .post-gallery.thb-parallax').jarallax('onScroll');
              }
            }
          });
          _this.on('afterChange', function(event, slick, currentSlide) {
            if (slick.$slides) {
              win.trigger('scroll.thb-animation');
            }
            if (lazySizes) {
              lazySizes.loader.checkElems();
            }
          });
          _this.slick(args);
        });
      }
    },
    fixedMe: {
      selector: '.thb-sticky-separator',
      init: function(el) {
        var base = this,
          container = el ? el : $(base.selector),
          header_offset = header.outerHeight(),
          offset = adminbar.outerHeight() + header_offset;

        container.each(function() {
          var _this = $(this),
            parent = _this.parents();

          if (_this.hasClass('thb-sticky-separator') && !_this.data('fixed-enabled')) {
            var new_fixed = _this.nextAll().wrapAll('<div class="thb-fixed" />').parents('.thb-fixed:not(.thb-sticky-separator)');
            _this.remove();

            _this.data('fixed-enabled', true);
          }
        });

      }
    },
    trendingTabs: {
      selector: '.thb-trending',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.each(function() {
          var _this = $(this),
            security = _this.data('security'),
            content = $('.thb-trending-content', _this),
            content_inner = $('.thb-trending-content-inner', _this),
            links = $('.thb-trending-tabs a', _this);

          if (_this.hasClass('disabled')) {
            return false;
          }
          links.on('click', function() {
            var _this = $(this),
              time = _this.data('time');

            if (_this.hasClass('active')) {
              return false;
            }

            $.ajax(themeajax.url, {
              method: 'POST',
              data: {
                action: 'thb_trending',
                security: security,
                time: time
              },
              beforeSend: function() {
                content.addClass('thb-loading');
                links.removeClass('active');
                _this.addClass('active');
              },
              success: function(data) {
                content.removeClass('thb-loading');
                var posts = $.parseHTML($.trim(data)),
                  posts_l = posts.length,
                  to_animate = $(posts).filter(function() {
                    return this.nodeType === 1;
                  });
                content_inner.empty().append(posts);

                gsap.set(to_animate, {
                  autoAlpha: 0
                });
                gsap.to(to_animate, {
                  duration: 0.25,
                  autoAlpha: 1,
                  stagger: 0.1
                });
              }
            });
          }); // links
        }); // each
      }
    },
    searchFields: {
      selector: '.search-fields select',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.on('change', function() {
          var url = $(this).val(); // get selected value

          if (url) { // require a URL
            window.location = url; // redirect
          }
          return false;
        });
      }
    },
    accordion: {
      selector: '.thb-accordion',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.each(function() {
          var _this = $(this),
            accordion = _this.hasClass('has-accordion'),
            index = 0,
            sections = _this.find('.vc_tta-panel'),
            active = sections.eq(index);

          if (accordion) {
            active.addClass('active').find('.vc_tta-panel-body').show();
          }
          _this.on('click', '.vc_tta-panel-heading a', function() {
            var that = $(this),
              parent = that.parents('.vc_tta-panel');

            if (accordion) {
              sections.removeClass('active');
              sections.not(parent).find('.vc_tta-panel-body').slideUp('400');
            }
            $(this).parents('.vc_tta-panel').toggleClass('active');

            parent.find('.vc_tta-panel-body').slideToggle('400', function() {
              if (accordion) {
                var offset = that.parents('.vc_tta-panel-heading').offset().top - ($('#wpadminbar').outerHeight() || 0);
                gsap.to(win, {
                  duration: 0.5,
                  scrollTo: {
                    y: offset,
                    autoKill: false
                  }
                });
              }
              _.delay(function() {
                win.trigger('scroll.thb-animation');
              }, 400);
            });

            return false;
          });

        });
      }
    },
    freeScroll: {
      selector: '.thb-freescroll',
      init: function() {
        var base = this,
          container = $(base.selector);


        container.each(function() {
          var _this = $(this),
            direction = _this.data('direction'),
            pause_on_hover = _this.data('pause'),
            args = {
              prevNextButtons: false,
              wrapAround: true,
              pageDots: false,
              freeScroll: true,
              adaptiveHeight: true,
              imagesLoaded: true
            };
          _this.flickity(args);

          var flkty = _this.data('flickity');

          flkty.paused = true;

          function loop() {
            if (direction === 'thb-left-to-right') {
              flkty.x++;
            } else {
              flkty.x--;
            }


            flkty.integratePhysics();
            flkty.settle(flkty.x);

            if (!flkty.paused) {
              flkty.raf = window.requestAnimationFrame(loop);
            }
          }

          function pause() {
            if (!thb_md.mobile() && !thb_md.tablet()) {
              flkty.paused = true;
            }
          }

          function play() {
            if (!thb_md.mobile() && !thb_md.tablet()) {
              flkty.paused = false;
              loop();
            }
          }
          if (pause_on_hover) {
            _this.on('mouseenter', function() {
              pause();
            }).on('mouseleave', function() {
              play();
            });
          }

          win.on('scroll.flkty', function(e) {
            if (_this.is(':in-viewport')) {
              if (flkty.paused) {
                flkty.paused = false;
                loop(flkty);
              }
            } else {
              flkty.paused = true;
            }
          }).trigger('scroll.flkty');
          _this.find('img').on('lazyloaded', function() {
            _this.flickity('resize');
          });
          _this.find('img').on('imagesLoaded', function() {
            _this.flickity('resize');
          });
        });

      }
    },
    countdown: {
      selector: '.thb-countdown',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.each(function() {
          var _this = $(this),
            date = _this.data('date'),
            offset = _this.attr('offset');

          _this.downCount({
            date: date,
            offset: offset
          });

        });
      }
    },
    tabs: {
      selector: '.thb-tabs',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.each(function() {
          var _this = $(this),
            accordion = _this.hasClass('has-accordion'),
            animation = _this.data('animation'),
            active_section = _this.data('active-section') ? _this.data('active-section') : 1,
            index = 0,
            sections = _this.find('.vc_tta-panel'),
            active = sections.eq(index),
            menu = $('<div class="thb-tab-menu" />').prependTo(_this);

          sections.each(function() {
            $(this).find('.vc_tta-panel-heading').appendTo(menu);
          });
          $('.vc_tta-panel-heading', menu).eq(0).find('a').addClass('active');
          sections.eq(0).addClass('visible');


          function resizeTabHeight() {
            var h = sections.filter(':visible').height() + menu.outerHeight(true);

            if (h > 30) {
              _this.css('height', h);
            }
          }

          function checkLazyLoad() {
            sections.filter(':visible').find('img').on('lazyloaded', function() {
              win.trigger('resize.tabs');
            });
          }

          win.on('resize.tabs', resizeTabHeight).trigger('resize.tabs');

          $(this).on('click', '.vc_tta-panel-heading a', function(e) {
            var that = $(this),
              set_speed = animation ? '300' : 0,
              speed_delay = parseInt(set_speed) > 0 ? set_speed : '0',
              index = that.parents('.vc_tta-panel-heading').index(),
              this_active = sections.eq(index);

            sections.not(this_active).fadeOut(set_speed, function() {
              var curListHeight = _this.height(),
                newHeight = this_active.height() + menu.outerHeight(true);

              this_active.fadeIn(set_speed, function() {
                win.trigger('scroll.thb-animation');

                if (this_active.find('.thb-carousel')) {
                  this_active.find('.thb-carousel').slick('setPosition');
                }
                if (this_active.find('.thb-masonry')) {
                  this_active.find('.thb-masonry').isotope('layout');
                  win.trigger('resize');
                }
                if (this_active.find('.thb-post-grid')) {
                  this_active.find('.thb-post-grid').imagesLoaded(function() {
                    win.trigger('resize.tabs');
                  });
                }
                checkLazyLoad();
              });

              _this.css({
                height: newHeight
              });
            });


            _this.find('.vc_tta-panel-heading a').removeClass('active');

            that.addClass('active');

            return false;
          });
          if (active_section > 1) {
            _this.find('.vc_tta-panel-heading a').removeClass('active');
            _this.find('.vc_tta-panel-heading').eq(active_section - 1).find('a').addClass('active');
            _this.find('.vc_tta-panel').removeClass('visible');
            _this.find('.vc_tta-panel').eq(active_section - 1).addClass('visible');

            checkLazyLoad();
          }
        });
      }
    },
    shareArticleDetail: {
      selector: '.social-button-holder, .thb-tweet-actions, .thb-post-bottom',
      init: function() {
        var base = this,
          container = $(base.selector),
          social = container.find('.social:not(.whatsapp), .post-social-share:not(.whatsapp)');

        social.on('click', function() {
          var left = (screen.width / 2) - (640 / 2),
            top = (screen.height / 2) - (440 / 2) - 100;
          window.open($(this).attr('href'), 'mywin', 'left=' + left + ',top=' + top + ',width=640,height=440,toolbar=0');
          return false;
        });
      }
    },
    isotope: {
      selector: '.thb-masonry',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.each(function(index) {
          var _this = $(this),
            el = _this.find('.columns'),
            animation = _this.data('thb-animation'),
            animationspeed = 0.5,
            page = 2,
            args = {
              layoutMode: 'packery',
              percentPosition: true,
              itemSelector: '.columns',
              transitionDuration: 0,
              originLeft: !body.hasClass('rtl'),
              hiddenStyle: {},
              visibleStyle: {},
            },
            org,
            items,
            args_in,
            in_speed = animationspeed,
            out_speed = in_speed / 2,
            stagger_speed = in_speed / 5,
            grid_type = _this.data('grid_type'),
            thb_loading = false;

          /* Animation Args */
          if (animation === 'thb-fade') {
            args_in = {
              opacity: 1
            };
          } else if (animation === 'thb-scale') {
            args_in = {
              opacity: 1,
              scale: 1
            };
          } else if (animation === 'thb-none') {
            in_speed = 0;
            stagger_speed = 0;
            args_in = {
              opacity: 1
            };
          } else if (animation === 'thb-vertical-flip') {
            args_in = {
              opacity: 1,
              y: 0,
              rotationX: '0deg'
            };
          } else if (animation === 'thb-reveal-left') {
            in_speed = 1;
            out_speed = 0.5;
            stagger_speed = 0.3;
            args_in = {
              opacity: 1,
            };
          } else {
            args_in = {
              y: 0,
              opacity: 1
            };
          }

          args_in.duration = in_speed;
          args_in.stagger = stagger_speed;

          /* Images Loaded */
          _this.addClass('thb-loaded');

          _this.on('layoutComplete', function(e, addeditems) {
            var elms = _.map(addeditems, 'element');

            /* Scroll Animation */
            win.on('scroll.masonry-animation', _.debounce(function() {
              items = $(elms).filter(':in-viewport').filter(function() {
                return $(this).data('thb-in-viewport') === undefined;
              });
              if (items) {
                var added = items;
                items.data('thb-in-viewport', true);
                if (items.find('.post').length) {
                  gsap.to(items.find('.post'), args_in, function() {
                    added.addClass('thb-added');
                    added.data('thb-in-viewport', true);
                    thb_loading = false;
                  });
                }

              }
            }, 20)).trigger('scroll.masonry-animation');
          }).isotope(args).isotope('layout'); // end layoutComplete

          /* Images Loaded */
          _this.imagesLoaded(function() {
            _this.isotope('layout');
          });
        });
      }
    },
    comments: {
      selector: '#comment-toggle',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.on('click', function() {

          $(this).parents('#comments').find('.comments-container').slideToggle('400', function() {
            win.trigger('resize.sticky-resize');
          });
          return false;
        });
      }
    },
    plyr: {
      selector: '.flex-video, .wp-video video',
      init: function() {
        var base = this,
          container = $(base.selector),
          custom_player = themeajax.settings.thb_custom_video_player,
          publisher_id = themeajax.settings.viai_publisher_id,
          options = {
            playsinline: true,
            clickToPlay: true,
          };

        if (publisher_id && publisher_id !== '') {
          options.ads = {
            enabled: true,
            publisherId: publisher_id
          };
        }
        if (custom_player === 'on') {
          if (thb_md.mobile() || thb_md.tablet()) {
            return;
          }
          container.each(function() {
            var player = new Plyr($(this), options);
          });
        }
      }
    },
    videoPlaylist: {
      selector: '.thb-video-playlist',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.each(function() {
          var _this = $(this),
            video_area = _this.find('.thb-video-holder'),
            links = _this.find('.thumbnail-style6'),
            security = _this.data('security');

          links.eq(0).addClass('video-active');
          container.on('click', '.thumbnail-style6', function() {
            var _that = $(this),
              id = _that.data('id');

            if (_that.hasClass('video-active')) {
              return false;
            }
            links.removeClass('video-active');
            _that.addClass('video-active');
            video_area.addClass('thb-loading');

            $.post(themeajax.url, {
              security: security,
              action: 'thb-parse-embed',
              post_ID: id
            }, function(d) {
              if (d.success) {
                video_area.find('.thb-video-element').html(d.data.body);
                if (window.FB) {
                  FB.XFBML.parse();
                }
                SITE.plyr.init();
              }
              video_area.removeClass('thb-loading');
            });
            return false;
          });
        });
      }
    },
    jarallax: {
      selector: '.thb-parallax-on .thb-parallax',
      init: function(el) {
        var base = this,
          container = el ? el : $(base.selector);

        container.each(function() {
          var _this = $(this),
            is_video = _this.parents('.post').hasClass('format-video'),
            args = {
              speed: 0.8,
              imgElement: '.wp-post-image'
            };
          if (is_video) {
            args.videoSrc = _this.data('video');
          }
          _this.jarallax(args);
        });
      }
    },
    magnificInline: {
      selector: '.mfp-inline',
      init: function() {
        var base = this,
          container = $(base.selector);


        container.magnificPopup({
          type: 'inline',
          tLoading: themeajax.l10n.lightbox_loading,
          mainClass: 'mfp-zoom-in',
          fixedBgPos: true,
          fixedContentPos: true,
          removalDelay: 400,
          closeBtnInside: true,
          closeMarkup: '<button title="%title%" class="mfp-close"><span>' + themeajax.svg.close_arrow + '</span></button>',
          callbacks: {
            close: function() {
              if (container.hasClass('newsletter-popup')) {
                Cookies.set('newsletter_popup', '1', {
                  expires: parseInt(themeajax.settings.newsletter_length, 10)
                });
              }
            }
          }
        });

      }
    },
    vcMediaGrid: {
      selector: '.vc_grid-container',
      init: function() {
        var base = this,
          container = $(base.selector);

        win.on('grid:items:added', function(e, el) {
          var settings = $(el).data('vc-grid-settings');

          if ($(el).find('.mfp-image').length) {
            $(el).addClass('mfp-gallery');
          }

          SITE.magnificGallery.init($(el));
        });
      }
    },
    magnificGallery: {
      selector: '.mfp-gallery, .post-content .gallery, .post-content .wp-block-gallery',
      init: function(el) {
        var base = this,
          container = el ? el : $(base.selector);


        container.each(function() {
          var _this = $(this),
            link_selector = 'a:not(.thb-pin-it)[href$=".png"],a:not(.thb-pin-it)[href$=".jpg"],a:not(.thb-pin-it)[href$=".jpeg"],a:not(.thb-pin-it)[href$=".gif"]';

          if (_this.hasClass('vc_grid-container')) {
            link_selector = 'a.mfp-image';
          }
          _this.magnificPopup({
            delegate: link_selector,
            type: 'image',
            tLoading: themeajax.l10n.lightbox_loading,
            mainClass: 'mfp-zoom-in',
            removalDelay: 400,
            fixedContentPos: true,
            closeBtnInside: false,
            closeMarkup: '<button title="%title%" class="mfp-close"><span>' + themeajax.svg.close_arrow + '</span></button>',
            gallery: {
              enabled: true,
              arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir% mfp-prevent-close">' + themeajax.svg.prev_arrow + '</button>',
              tCounter: '<span class="mfp-counter">' + themeajax.l10n.of + '</span>'
            },
            image: {
              verticalFit: true,
              titleSrc: function(item) {
                return item.img.attr('alt');
              }
            },
            callbacks: {
              imageLoadComplete: function() {
                var _this = this;
                _.delay(function() {
                  _this.wrap.addClass('mfp-image-loaded');
                }, 10);
              },
              beforeOpen: function() {
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
              },
              open: function() {
                $.magnificPopup.instance.next = function() {
                  var _this = this;
                  _this.wrap.removeClass('mfp-image-loaded');

                  setTimeout(function() {
                    $.magnificPopup.proto.next.call(_this);
                  }, 125);
                };

                $.magnificPopup.instance.prev = function() {
                  var _this = this;
                  this.wrap.removeClass('mfp-image-loaded');

                  setTimeout(function() {
                    $.magnificPopup.proto.prev.call(_this);
                  }, 125);
                };
              }
            }
          });
        });

      }
    },
    magnificImage: {
      selector: '.mfp-image',
      init: function() {
        var base = this,
          container = $(base.selector),
          groups = [],
          groupNames = [],
          args = {
            type: 'image',
            mainClass: 'mfp-zoom-in',
            tLoading: themeajax.l10n.lightbox_loading,
            removalDelay: 400,
            fixedContentPos: true,
            closeBtnInside: false,
            closeMarkup: '<button title="%title%" class="mfp-close"><span>' + themeajax.svg.close_arrow + '</span></button>',
            callbacks: {
              imageLoadComplete: function() {
                var _this = this;
                _.delay(function() {
                  _this.wrap.addClass('mfp-image-loaded');
                }, 10);
              },
              beforeOpen: function() {
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
              }
            }
          },
          gallery_args = {
            type: 'image',
            tLoading: themeajax.l10n.lightbox_loading,
            mainClass: 'mfp-zoom-in',
            removalDelay: 400,
            fixedContentPos: true,
            gallery: {
              enabled: true,
              arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir% mfp-prevent-close">' + themeajax.svg.prev_arrow + '</button>',
              tCounter: '<span class="mfp-counter">' + themeajax.l10n.of + '</span>'
            },
            image: {
              verticalFit: true,
              titleSrc: function(item) {
                return item.img.attr('alt');
              }
            },
            callbacks: {
              imageLoadComplete: function() {
                var _this = this;
                _.delay(function() {
                  _this.wrap.addClass('mfp-image-loaded');
                }, 10);
              },
              beforeOpen: function() {
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
              },
              open: function() {
                $.magnificPopup.instance.next = function() {
                  var _this = this;
                  _this.wrap.removeClass('mfp-image-loaded');

                  setTimeout(function() {
                    $.magnificPopup.proto.next.call(_this);
                  }, 125);
                };

                $.magnificPopup.instance.prev = function() {
                  var _this = this;
                  this.wrap.removeClass('mfp-image-loaded');

                  setTimeout(function() {
                    $.magnificPopup.proto.prev.call(_this);
                  }, 125);
                };
              }
            }
          };

        container.each(function() {
          var _this = $(this),
            groupID = _this.data('thb-group');


          if (_this.parents('.blocks-gallery-item').length) {
            return;
          }

          if (groupID && groupID !== '') {
            groupNames.push(groupID);
          } else {
            _this.magnificPopup(args);
          }
        });
        var uniq_groups = _.uniq(groupNames);
        $.each(uniq_groups, function(key, value) {
          groups.push($('.mfp-image[data-thb-group="' + value + '"]'));
        });
        if (uniq_groups.length) {
          $.each(groups, function(key, value) {
            var _gallery = value;
            _gallery.magnificPopup(gallery_args);
          });
        }

      }
    },
    magnificVideo: {
      selector: '.mfp-video',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.magnificPopup({
          type: 'iframe',
          tLoading: themeajax.l10n.lightbox_loading,
          closeBtnInside: false,
          closeMarkup: '<button title="%title%" class="mfp-close"><span>' + themeajax.svg.close_arrow + '</span></button>',
          mainClass: 'mfp-zoom-in',
          removalDelay: 400,
          fixedContentPos: false
        });

      }
    },
    lightboxGallery: {
      selector: '.thb-lightbox-button',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.each(function() {
          var _this = $(this),
            items = [],
            target = $(_this.data('href')),
            galleries = $('.post-gallery-content', target),
            grid = galleries.eq(0).find('.thb-gallery-grid');

          if (_this.data('click-attached')) {
            return;
          }
          _this.data('click-attached', true);
          galleries.each(function(index) {
            var _this = $(this),
              grid_btn = $('.lightbox-grid', _this);

            if (index > 0) {
              grid.clone().appendTo(_this.find('.image'));
            }
            items.push({
              src: $(this)
            });

            grid_btn.on('click', function() {
              _this.find('.image').toggleClass('gridActive');
            });

          });
          _this.on('click', function() {
            $.magnificPopup.open({
              mainClass: 'mfp-zoom-in post-gallery-lightbox',
              //alignTop: true,
              closeBtnInside: true,
              items: items,
              removalDelay: 400,
              overflowY: 'hidden',
              tLoading: themeajax.l10n.lightbox_loading,
              gallery: {
                enabled: true,
                arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir% mfp-prevent-close">' + themeajax.svg.prev_arrow + '</button>',
                tCounter: '<span class="mfp-counter">' + themeajax.l10n.of + '</span>'
              },
              closeMarkup: '<button title="%title%" class="mfp-close">' + themeajax.svg.close_arrow + '</button>',
              callbacks: {
                imageLoadComplete: function() {
                  var _this = this;
                  _.delay(function() {
                    _this.wrap.addClass('mfp-image-loaded');
                  }, 10);
                },
                beforeOpen: function() {
                  this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                },
                open: function() {
                  var instance = $.magnificPopup.instance;
                  $(".lightbox-close").on('click', function() {
                    instance.close();
                    return false;
                  });
                  $(".thb-gallery-arrow.prev").on('click', function() {
                    instance.prev();
                    return false;
                  });

                  $(".thb-gallery-arrow.next").on('click', function() {
                    instance.next();
                    return false;
                  });


                  instance.next = function() {
                    var _this = this;
                    _this.wrap.removeClass('mfp-image-loaded');
                    $.magnificPopup.proto.next.call(_this);
                  };

                  instance.prev = function() {
                    var _this = this;
                    _this.wrap.removeClass('mfp-image-loaded');
                    $.magnificPopup.proto.prev.call(_this);
                  };
                },
                close: function() {
                  galleries.find('.image').removeClass('gridActive');
                  $(".thb-gallery-arrow.prev").off('click');

                  $(".thb-gallery-arrow.next").off('click');
                },
                change: function() {
                  var instance = $.magnificPopup.instance;

                  this.content.find('.thb-grid-image').filter(function() {
                    return $(this).data('thb-assigned') === undefined;
                  }).on('click', function() {
                    var _this = $(this),
                      index = _this.parent().index();
                    instance.goTo(index);
                    _this.data('thb-assigned', true);
                    return false;
                  });
                  setTimeout(function() {
                    galleries.find('.image').removeClass('gridActive');
                  }, 125);
                },
              }
            });
            return false;
          });

        });

      }
    },
    verticalGalleries: {
      selector: '.smart-list-v3',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.each(function() {
          var _this = $(this),
            items = $('.smart-list-item', _this),
            total = items.length;

          items.each(function() {
            var gallery_item = $(this),
              arrow_top = $('.arrow.to_top:not(.disabled)', gallery_item),
              arrow_bottom = $('.arrow.to_bottom:not(.disabled)', gallery_item),
              i = items.index(gallery_item);

            arrow_top.on('click', function() {
              if (i > 0) {
                var pos = items.eq(i - 1).offset().top - ($('#wpadminbar').outerHeight() || 0) - $('.header.fixed').outerHeight() - 20;
                gsap.to(win, {
                  duration: 0.5,
                  scrollTo: {
                    y: pos,
                    autoKill: false
                  }
                });
              }
              return false;
            });
            arrow_bottom.on('click', function() {
              if (i < total) {
                var pos = items.eq(i + 1).offset().top - ($('#wpadminbar').outerHeight() || 0) - $('.header.fixed').outerHeight() - 20;
                gsap.to(win, {
                  duration: 0.5,
                  scrollTo: {
                    y: pos,
                    autoKill: false
                  }
                });
              }
              return false;
            });

          });
          $doc.keyup(function(e) {
            if (e.keyCode === 40) { // Down Arrow
              $('.smart-list-item:in-viewport', _this).last().find('.arrow.to_bottom').trigger('click');
            } else if (e.keyCode === 38) { // Up Arrow
              $('.smart-list-item:in-viewport', _this).last().find('.arrow.to_top').trigger('click');
            }
          });
        });
      }
    },
    reactions: {
      selector: '.thb-article-reactions',
      init: function() {
        var base = this,
          container = $(base.selector);
        container.each(function() {
          var reactions = $(this),
            links = $('.thb-reaction', reactions),
            post_id = reactions.data('post-id'),
            cookie_name = 'thb-reactions-' + post_id;

          if (reactions.data('thb-initialized')) {
            return;
          } else {
            reactions.data('thb-initialized', true);
          }
          links.on('click', function() {
            var _this = $(this),
              is_active = _this.hasClass('active'),
              slug = _this.data('slug');

            if (_this.hasClass('thb-reaction-loading')) {
              return false;
            }
            $.ajax(themeajax.url, {
              method: 'POST',
              data: {
                action: 'thb_save_post_reactions',
                post_id: post_id,
                reaction: slug,
                is_active: is_active
              },
              beforeSend: function() {
                _this.addClass('thb-reaction-loading');
              },
              success: function(data) {
                _this.toggleClass('active');
                _this.removeClass('thb-reaction-loading');

                var json_data = JSON.parse(data);
                _this.find('.thb-reaction-count').html(json_data[slug]);
                Cookies.set(cookie_name, json_data, {
                  expires: 30
                });
              }
            });
            return false;
          });
        });

      }
    },
    articleScroll: {
      selector: '#infinite-article',
      pagetitle: $('#page-title'),
      org_post_url: window.location.href,
      org_post_title: document.title,
      org_shares: false,
      top: 0,
      init: function() {
        var base = this,
          container = $(base.selector),
          security = container.data('security'),
          on = container.data('infinite'),
          org = container.find('.post-detail:first-child'),
          org_shares = org.find('.thb-social-fixed'),
          id = org.data('id'),
          tempid = id,
          thb_loading = false,
          footer = ($('.footer').outerHeight() || 0) + ($('.subfooter').outerHeight() || 0),
          count = themeajax.settings.infinite_count,
          preloader = $('<div class="thb-preloader">' + themeajax.svg.preloader + '</div>'),
          i = 0;

        var scrollLocation = _.debounce(function() {
          base.location_change();
        }, 10);

        var scrollAjax = _.debounce(function() {
          if (!count || i < parseInt(count, 10)) {
            if (win.scrollTop() >= ($doc.height() - win.height() - footer - 400) && thb_loading === false) {
              if (id === tempid) {
                container.addClass('thb-loading');
                $.ajax(themeajax.url, {
                  method: 'POST',
                  data: {
                    security: security,
                    action: 'thb_infinite_ajax',
                    post_id: tempid
                  },
                  beforeSend: function() {
                    id = null;
                    thb_loading = true;
                    preloader.appendTo(container);
                  },
                  success: function(data) {
                    i++;
                    thb_loading = false;
                    var d = $.parseHTML(data),
                      ads = $(d).find('.adsbygoogle'),
                      tweets = $(d).find('.twitter-tweet, .twitter-timeline'),
                      instagram = $(d).find('.instagram-media');

                    container.removeClass('thb-loading');
                    container.find('.thb-preloader').remove();
                    if (d) {
                      id = $(d).find('.post-detail').data('id');
                      tempid = id;

                      $(d).appendTo(container);
                      SITE.shareArticleDetail.init();
                      SITE.fixedMe.init();
                      SITE.jarallax.init();
                      SITE.slick.init();
                      SITE.magnificImage.init();
                      SITE.magnificGallery.init();
                      SITE.magnificVideo.init();
                      SITE.lightboxGallery.init();
                      SITE.verticalGalleries.init();
                      SITE.newsletter.init();
                      SITE.reactions.init();
                      SITE.animation.init();
                      SITE.pinIt.init();
                      SITE.retinaJS.init();
                      SITE.plyr.init();


                      if (typeof window.instgrm !== 'undefined') {
                        window.instgrm.Embeds.process();
                      } else if (instagram.length && (typeof window.instgrm === 'undefined')) {
                        var ins = document.createElement('script');
                        ins.src = "//platform.instagram.com/en_US/embeds.js";
                        ins.onload = function() {
                          window.instgrm.Embeds.process();
                        };
                        body.append(ins);
                      }
                      if (typeof window.twttr !== 'undefined') {
                        twttr.widgets.load(
                          document.getElementById("infinite-article")
                        );
                      } else if (tweets.length && (typeof window.twttr === 'undefined')) {
                        window.twttr = (function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0],
                            t = window.twttr || {};
                          if (d.getElementById(id)) {
                            return t;
                          }
                          js = d.createElement(s);
                          js.id = id;
                          js.src = "https://platform.twitter.com/widgets.js";
                          fjs.parentNode.insertBefore(js, fjs);

                          t._e = [];
                          t.ready = function(f) {
                            t._e.push(f);
                          };
                          return t;
                        }(document, "script", "twitter-wjs"));
                      }
                      if (typeof window.addthis !== 'undefined') {
                        addthis.toolbox();
                      }
                      if (typeof window.atnt !== 'undefined') {
                        window.atnt();
                      }
                      if (typeof window.googletag !== 'undefined') {
                        googletag.pubads().refresh();
                      }
                      if (typeof window.adsbygoogle !== 'undefined' && ads.length) {
                        ads.each(function() {
                          (adsbygoogle = window.adsbygoogle || []).push({});
                        });
                      }
                      if (typeof window.FB !== 'undefined') {
                        FB.init({
                          status: true,
                          cookie: true,
                          xfbml: true,
                          version: 'v2.8'
                        });
                      }
                      if (typeof window.vc_js !== 'undefined') {
                        window.vc_js();
                      }
                      $(document.body).trigger('thb_after_infinite_load');
                    } else {
                      id = null;
                    }
                    win.trigger('resize.sticky-resize');
                  }
                });
              }
            }
          }
        }, 50);

        if (on === 'on') {
          win.on('scroll.infinite', scrollLocation);
          win.on('scroll.infinite', scrollAjax);
          gsap.set($('.indicator-fill', '.header.fixed'), {
            drawSVG: "0% 0%"
          });

          $('.thb-reading-indicator', '.header.fixed').on('click', function() {
            if ($('.fixed-header-on').length && themeajax.settings.fixed_header_scroll !== 'on') {
              var fixed_height = $('.header.fixed-article>.row').outerHeight() + (parseInt(themeajax.settings.fixed_header_padding.top, 10) || 0) + (parseInt(themeajax.settings.fixed_header_padding.bottom, 10) || 0);
              if (fixed_height) {
                base.top -= fixed_height;
              }
            }
            gsap.to(win, 2, {
              duration: 2,
              scrollTo: {
                y: base.top,
                autoKill: false
              }
            });
            return false;
          });
        } else {
          gsap.set($('.indicator-fill', '.header.fixed'), {
            drawSVG: "0% 0%"
          });
          win.on('scroll.infinite', function() {
            base.borderWidth($('.post-detail-row').offset().top, $('.post-detail-row').outerHeight(true));
          });
        }
      },
      location_change: function() {
        var base = this,
          container = $(base.selector);

        var windowTop = win.scrollTop(),
          windowBottom = windowTop + win.height(),
          windowSize = windowBottom - windowTop,
          setsInView = [],
          pageChangeThreshold = 0.5,
          post_title,
          post_url,
          shares;

        $('.post-detail-row').each(function() {
          var _row = $(this),
            post = _row.find('.post-detail'),
            id = post.data('id'),
            setTop = _row.offset().top,
            setHeight = _row.outerHeight(true),
            setBottom = 0,
            tmp_post_url = post.data('url'),
            tmp_post_title = post.find('.post-title h1').text(),
            shares = _row.find('.thb-social-fixed');

          // Determine position of bottom of set by adding its height to the scroll position of its top.
          setBottom = setTop + setHeight;

          if (setTop < windowTop && setBottom > windowBottom) { // top of set is above window, bottom is below
            setsInView.push({
              'id': id,
              'top': setTop,
              'bottom': setBottom,
              'post_url': tmp_post_url,
              'post_title': tmp_post_title,
              'alength': setHeight,
              'shares': shares
            });
          } else if (setTop > windowTop && setTop < windowBottom) { // top of set is between top (gt) and bottom (lt)
            setsInView.push({
              'id': id,
              'top': setTop,
              'bottom': setBottom,
              'post_url': tmp_post_url,
              'post_title': tmp_post_title,
              'alength': setHeight,
              'shares': shares
            });
          } else if (setBottom > windowTop && setBottom < windowBottom) { // bottom of set is between top (gt) and bottom (lt)
            setsInView.push({
              'id': id,
              'top': setTop,
              'bottom': setBottom,
              'post_url': tmp_post_url,
              'post_title': tmp_post_title,
              'alength': setHeight,
              'shares': shares
            });
          }
        });

        // Parse number of sets found in view in an attempt to update the URL to match the set that comprises the majority of the window
        if (0 === setsInView.length) {
          post_url = base.org_post_url;
          post_title = base.org_post_title;
          shares = base.org_shares;

        } else if (1 === setsInView.length) {
          var setData = setsInView.pop();

          post_url = setData.post_url;
          post_title = setData.post_title;
          shares = setData.shares;

          base.borderWidth(setData.top, setData.alength);
        } else {
          post_url = setsInView[0].post_url;
          post_title = setsInView[0].post_title;
          shares = setsInView[0].shares;
          base.borderWidth(setsInView[0].top, setsInView[0].alength);
        }
        base.updateURL(post_url, post_title, shares);
      },
      updateURL: function(post_url, post_title, shares) {
        if (window.location.href !== post_url) {
          if (post_url !== '') {
            history.replaceState(null, null, post_url);
            document.title = post_title;
            this.pagetitle.html(post_title);

            if (shares) {
              $('.header.fixed').find('.fixed-article-shares').empty().append(shares.clone());
              SITE.shareArticleDetail.init();
            }
          }
          $(document.body).trigger('thb_after_location_change');
          this.updateGA(post_url, post_title);
        }
      },
      updateGA: function(post_url, post_title) {
        if (typeof _gaq !== 'undefined') {
          _gaq.push(['_trackPageview', post_url]);
        } else if (typeof ga !== 'undefined') {
          var reg = /.+?\:\/\/.+?(\/.+?)(?:#|\?|$)/,
            pathname = reg.exec(post_url)[1];

          ga('send', 'pageview', pathname);
        }
        if (typeof gtag !== 'undefined') {
          var args = {
            page_title: post_title,
            page_location: location.href,
            page_path: location.pathname
          };
          gtag('event', 'page_view', args);
        }
        if (typeof window.reinvigorate !== 'undefined' && typeof window.reinvigorate.ajax_track !== 'undefined') {
          reinvigorate.ajax_track(post_url);
        }
        if (typeof googletag !== 'undefined') {
          googletag.pubads().refresh();
        }
      },
      borderWidth: function(top, setHeight) {
        var base = this,
          windowTop = win.scrollTop(),
          footer = ($('.footer').outerHeight() || 0) + ($('.subfooter').outerHeight() || 0),
          perc = (windowTop - top + ($('#wpadminbar').outerHeight() || 0)) / setHeight;

        base.top = top + setHeight;


        gsap.set($('.indicator-fill', '.header.fixed'), {
          drawSVG: '0% ' + perc * 100 + '%'
        });
      }
    },
    retinaJS: {
      selector: 'img.retina_size:not(.retina_active)',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.each(function() {
          $(this).attr('width', function() {
            var w = $(this).attr('width') / 2;
            return w;
          }).addClass('retina_active');
        });
      }
    },
    paginationStyle2: {
      selector: '.pagination-style2',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.each(function() {
          var _this = $(this),
            security = _this.data('security'),
            loadmore = $(_this.data('loadmore')),
            rand = _this.data('rand'),
            text = loadmore.text(),
            thb_endpoint = ('thb_postajax_' + rand),
            loop = window[thb_endpoint].loop,
            style = window[thb_endpoint].style,
            columns = window[thb_endpoint].columns,
            excerpts = window[thb_endpoint].excerpts,
            count = window[thb_endpoint].count,
            featured_index = window[thb_endpoint].featured_index,
            thb_i = window[thb_endpoint].thb_i,
            page = 2,
            thb_loading = false,
            action = _this.hasClass('thb-masonry') ? 'thb_masonry_posts' : 'thb_posts';

          loadmore.on('click', function() {
            var _loadmore = $(this),
              text = _loadmore.text();

            if (thb_loading === false) {
              _loadmore.html(themeajax.l10n.loading).addClass('loading');

              $.ajax(themeajax.url, {
                method: 'POST',
                data: {
                  action: action,
                  security: security,
                  count: count,
                  loop: loop,
                  columns: columns,
                  style: style,
                  excerpts: excerpts,
                  featured_index: featured_index,
                  thb_i: thb_i,
                  page: page++
                },
                beforeSend: function() {
                  thb_loading = true;
                },
                success: function(data) {
                  var d = $.parseHTML($.trim(data)),
                    l = d ? d.length : 0;
                  if (data === '' || data === 'undefined' || data === 'No More Posts' || data === 'No $args array created') {
                    _loadmore.html(themeajax.l10n.nomore).removeClass('loading').off('click');
                  } else {
                    var to_add = $(d).filter(function() {
                      return this.nodeType === 1;
                    });
                    if (_this.data('isotope')) {
                      to_add.appendTo(_this).hide();
                      _this.isotope('appended', $(d));
                      to_add.imagesLoaded(function() {
                        _this.isotope('layout');
                        gsap.fromTo(to_add, {
                          autoAlpha: 0,
                          y: 20
                        }, {
                          duration: 0.5,
                          autoAlpha: 1,
                          y: 0,
                          stagger: 0.15,
                          onComplete: function() {
                            thb_loading = false;
                          }
                        });
                      });
                    } else {
                      to_add.insertBefore(_loadmore.parents('.masonry_loader'));
                      gsap.fromTo(to_add, {
                        autoAlpha: 0,
                        y: 20
                      }, {
                        duration: 0.5,
                        autoAlpha: 1,
                        y: 0,
                        stagger: 0.15,
                        onComplete: function() {
                          thb_loading = false;
                        }
                      });
                    }
                    SITE.jarallax.init();
                    win.trigger('resize.sticky-resize');
                    to_add.imagesLoaded(function() {
                      win.trigger('resize.sticky-resize');
                    });
                    if (_this.parents('.vc_tta-panel-body')) {
                      win.trigger('resize.tabs');
                    }
                    if (l < count) {
                      _loadmore.html(themeajax.l10n.nomore).removeClass('loading');
                    } else {
                      _loadmore.html(text).removeClass('loading');
                    }
                  }
                }
              });
            }
            return false;
          });
        });

      }
    },
    paginationStyle3: {
      selector: '.pagination-style3',
      init: function() {
        var base = this,
          container = $(base.selector);
        container.each(function() {
          var _this = $(this),
            security = _this.data('security'),
            loadmore = $(_this.data('loadmore')),
            rand = _this.data('rand'),
            text = loadmore.text(),
            thb_endpoint = ('thb_postajax_' + rand),
            loop = window[thb_endpoint].loop,
            style = window[thb_endpoint].style,
            columns = window[thb_endpoint].columns,
            excerpts = window[thb_endpoint].excerpts,
            count = window[thb_endpoint].count,
            featured_index = window[thb_endpoint].featured_index,
            thb_i = window[thb_endpoint].thb_i,
            page = 2,
            thb_loading = false,
            action = _this.hasClass('thb-masonry') ? 'thb_masonry_posts' : 'thb_posts',
            preloader = $('<div class="thb-preloader">' + themeajax.svg.preloader + '</div>');

          var scrollFunction = _.debounce(function() {
            if ((thb_loading === false) && ((win.scrollTop() + win.height() + 150) >= (container.offset().top + container.outerHeight()))) {
              $.ajax(themeajax.url, {
                method: 'POST',
                data: {
                  action: action,
                  security: security,
                  count: count,
                  loop: loop,
                  columns: columns,
                  style: style,
                  excerpts: excerpts,
                  featured_index: featured_index,
                  thb_i: thb_i,
                  page: page++
                },
                beforeSend: function() {
                  thb_loading = true;
                  preloader.appendTo(container);
                },
                success: function(data) {
                  var d = $.parseHTML($.trim(data)),
                    l = d ? d.length : 0;

                  if (data === '' || data === 'undefined' || data === 'No More Posts' || data === 'No $args array created') {
                    win.off('scroll', scrollFunction);
                  } else {
                    _this.find('.thb-preloader').remove();
                    if (_this.data('isotope')) {
                      $(d).appendTo(_this).hide();
                      _this.isotope('appended', $(d));
                      $(d).imagesLoaded(function() {
                        _this.isotope('layout');
                        gsap.fromTo($(d), {
                          autoAlpha: 0,
                          y: 20
                        }, {
                          duration: 0.5,
                          autoAlpha: 1,
                          y: 0,
                          stagger: 0.15,
                          onComplete: function() {
                            thb_loading = false;
                          }
                        });
                      });
                    } else {
                      $(d).appendTo(_this);
                      gsap.fromTo($(d), {
                        autoAlpha: 0,
                        y: 20
                      }, {
                        duration: 0.5,
                        autoAlpha: 1,
                        y: 0,
                        stagger: 0.15,
                        onComplete: function() {
                          thb_loading = false;
                        }
                      });
                    }
                    SITE.jarallax.init();
                    win.trigger('resize.sticky-resize');
                    $(d).imagesLoaded(function() {
                      win.trigger('resize.sticky-resize');
                    });
                    if (l >= count) {
                      win.on('scroll', scrollFunction);
                    }
                  }
                }
              });
            }
          }, 30);

          win.on('scroll', scrollFunction);
        });

      }
    },
    animation: {
      selector: '.animation, .thb-counter, .thb-iconbox, .thb-fadetype, .thb-slidetype, .thb-progressbar, .thb-autotype',
      init: function() {
        var base = this,
          container = $(base.selector);


        win.on('scroll.thb-animation', function() {
          base.control(container, true);
        }).trigger('scroll.thb-animation');
      },
      container: function(container) {
        var base = this,
          element = $(base.selector, container);

        base.control(element, false);
      },
      control: function(element, filter) {
        var t = 0,
          delay = 0.15,
          speed = 0.5,
          el = filter ? element.filter(':in-viewport') : element;

        el.each(function() {
          var _this = $(this),
            params = {
              autoAlpha: 1,
              x: 0,
              y: 0,
              z: 0,
              rotationZ: '0deg',
              rotationX: '0deg',
              rotationY: '0deg',
              delay: t * delay
            };

          if (_this.hasClass('thb-client') || _this.hasClass('thb-counter') || _this.hasClass('thb-iconlist-li')) {
            speed = 0.2;
            delay = 0.05;
          } else if (_this.hasClass('thb-team-member')) {
            speed = 0.4;
            delay = 0.1;
          } else {
            speed = 0.5;
            delay = 0.15;
          }

          if (_this.data('thb-animated') !== true) {
            _this.data('thb-animated', true);
            if (_this.hasClass('thb-iconbox')) {
              SITE.iconbox.control(_this, t * delay);
            } else if (_this.hasClass('thb-counter')) {
              SITE.counter.control(_this, t * delay);
            } else if (_this.hasClass('portfolio-title')) {
              SITE.portfolioTitle.control(_this, t * delay);
            } else if (_this.hasClass('thb-autotype')) {
              SITE.autoType.control(_this, t * delay);
            } else if (_this.hasClass('thb-fadetype')) {
              SITE.fadeType.control(_this, t * delay);
            } else if (_this.hasClass('thb-slidetype')) {
              SITE.slideType.control(_this, t * delay);
            } else if (_this.hasClass('thb-progressbar')) {
              SITE.progressBar.control(_this, t * delay);
            } else {
              if (_this.hasClass('scale')) {
                params.scale = 1;
              }
              params.duration = speed;
              gsap.to(_this, params);
            }
            t++;
          }
        });
      }
    },
    perspective: {
      selector: '.perspective-enabled',
      init: function() {
        var base = this,
          container = $(base.selector),
          lastScroll = win.scrollTop();

        function thb_setPerspective() {
          var scrollTop = win.scrollTop(),
            perspective = (scrollTop + (win.height())) + 'px';

          if (lastScroll !== scrollTop) {

            gsap.set(container, {
              'perspective-origin': '50% ' + perspective
            });
            lastScroll = scrollTop;
          }
          requestAnimationFrame(thb_setPerspective);
        }

        requestAnimationFrame(thb_setPerspective);

      }
    },
    autoType: {
      selector: '.thb-autotype',
      control: function(container, delay, skip) {
        if ((container.data('thb-in-viewport') === undefined) || skip) {
          container.data('thb-in-viewport', true);

          var _this = container,
            entry = _this.find('.thb-autotype-entry'),
            strings = entry.data('strings'),
            speed = entry.data('speed') ? entry.data('speed') : 50,
            loop = entry.data('thb-loop') === 1 ? true : false,
            cursor = entry.data('thb-cursor') === 1 ? true : false;

          entry.typed({
            strings: strings,
            loop: loop,
            showCursor: cursor,
            cursorChar: '|',
            contentType: 'html',
            typeSpeed: speed,
            backDelay: 1000,
          });
        }
      }
    },
    fadeType: {
      selector: '.thb-fadetype',
      control: function(container, delay, skip) {
        if ((container.data('thb-in-viewport') === undefined) || skip) {
          container.data('thb-in-viewport', true);
          var split = new SplitText(
              $('.thb-fadetype-entry', container), {
                type: "chars"
              }
            ),
            tl = gsap.timeline({
              onComplete: function() {
                split.revert();
              }
            }),
            args = {};

          tl
            .set(container, {
              visibility: "visible"
            });
          if (container.hasClass('thb-fadetype-style1')) {

            args = {
              duration: 0.25,
              autoAlpha: 0,
              y: 10,
              rotationX: '-90deg',
              delay: delay,
              stagger: 0.05
            };
            tl.from(split.chars, args);
          } else if (container.hasClass('thb-fadetype-style2')) {
            for (var t = split.chars.length, n = 0; n < t; n++) {
              var i = split.chars[n],
                r = 0.5 * Math.random();
              tl
                .from(i, {
                  duration: 2,
                  opacity: 0,
                  ease: Linear.easeNone
                }, r)
                .from(i, {
                  duration: 2,
                  yPercent: -50,
                  ease: Expo.easeOut
                }, r);
            }
          }
        }
      }
    },
    progressBar: {
      selector: '.thb-progressbar',
      control: function(container, delay, skip) {
        if ((container.data('thb-in-viewport') === undefined) || skip) {
          var progress = container.find('.thb-progress'),
            value = progress.data('progress');

          var tl = gsap.timeline();

          tl
            .to(container, {
              duration: 0.6,
              autoAlpha: 1,
              delay: delay
            })
            .to(progress.find('span'), {
              duration: 1,
              scaleX: value / 100
            });

        }
      }
    },
    slideType: {
      selector: '.thb-slidetype',
      control: function(container, delay, skip) {
        if ((container.data('thb-in-viewport') === undefined) || skip) {
          container.data('thb-in-viewport', true);
          var style = container.data('style'),
            split,
            tl = gsap.timeline({
              onComplete: function() {
                if (style !== 'style1') {
                  split.revert();
                }
              }
            }),
            animated_split,
            dur = 0.25,
            stagger = 0.05;

          if (style === 'style1') {
            animated_split = container.find('.thb-slidetype-entry .lines');
            dur = 0.65;
            stagger = 0.15;
          } else if (style === 'style2') {
            split = new SplitText(container.find('.thb-slidetype-entry'), {
              type: 'words'
            });
            animated_split = split.words;
            dur = 0.65;
            stagger = 0.15;
          } else if (style === 'style3') {
            split = new SplitText(container.find('.thb-slidetype-entry'), {
              type: 'chars'
            });
            animated_split = split.chars;
          }

          tl
            .set(container, {
              visibility: "visible"
            })
            .from(animated_split, {
              duration: dur,
              y: '200%',
              delay: delay,
              stagger: stagger
            }, '+=0');

        }
      }
    },
    counter: {
      selector: '.thb-counter',
      control: function(container, delay) {
        if (container.data('thb-in-viewport') === undefined) {
          container.data('thb-in-viewport', true);

          var _this = container,
            el = _this.find('.h1:not(.counter-text), .counter:not(.counter-text)').eq(0),
            counter = el[0],
            count = el.data('count'),
            speed = el.data('speed'),
            separator = _this.data('separator'),
						format = _this.data('format'),
            params = {
              el: counter,
              value: 0,
              duration: speed,
              theme: 'minimal'
            };

          if (_this.hasClass('single-decimal')) {
            params.format = '(,ddd).d';
          } else if (!separator || separator === '') {
            params.format = '';
          } else {
            params.format = format;
          }
          var od = new Odometer(params);

          gsap.set(_this, {
            visibility: 'visible'
          });
          setTimeout(function() {
            od.update(count);
          }, delay);
        }
      }
    },
    iconbox: {
      selector: '.thb-iconbox',
      control: function(container, delay) {
        if (container.data('thb-in-viewport') === undefined && !container.hasClass('animation-off')) {
          container.data('thb-in-viewport', true);

          var _this = container,
            animation_speed = _this.data('animation_speed') !== '' ? _this.data('animation_speed') : 1.5,
            svg = _this.find('svg'),
            img = _this.find('img:not(.thb_image_hover)'),
            el = svg.find('path, circle, rect, ellipse'),
            h = _this.find('h5'),
            p = _this.find('p'),
            line = _this.find('.thb-iconbox-line'),
            dot = _this.find('.thb-iconbox-line em'),
            tl = gsap.timeline({
              delay: delay,
              paused: true,
              clearProps: 'all'
            }),
            all = [];
          if (h.length) {
            all.push(h);
          }
          if (p.length) {
            all.push(p);
          }
          if (img.length) {
            all.push(img);
          }
          if (!(_this.hasClass('left') || _this.hasClass('right'))) {
            if (_this.find('.thb-read-more').length) {
              all.push(_this.find('.thb-read-more'));
            }
          }
          tl
            .set(_this, {
              visibility: 'visible'
            })
            .set(svg, {
              visibility: 'visible'
            })
            .from(el, {
              duration: animation_speed,
              drawSVG: "0%"
            }, "s")
            .fromTo(all, {
              autoAlpha: 0,
              y: '20px'
            }, {
              duration: (animation_speed / 2),
              autoAlpha: 1,
              y: '0px',
              stagger: 0.1
            });

          if (dot.length) {
            tl
              .to(dot, {
                duration: (animation_speed / 2),
                scale: '1'
              });
          }

          if (line.length) {
            tl
              .to(line, {
                duration: (animation_speed / 2),
                scaleX: '1'
              });
          }

          tl.play();
        }
      }
    },
    contactMap: {
      selector: '.contact_map:not(.disabled)',
      init: function() {
        var base = this,
          container = $(base.selector);


        container.each(function() {
          var _this = $(this),
            mapzoom = _this.data('map-zoom'),
            mapstyle = _this.data('map-style'),
            mapType = _this.data('map-type'),
            panControl = _this.data('pan-control'),
            zoomControl = _this.data('zoom-control'),
            mapTypeControl = _this.data('maptype-control'),
            scaleControl = _this.data('scale-control'),
            streetViewControl = _this.data('streetview-control'),
            locations = _this.find('.thb-location'),
            expand = _this.next('.expand'),
            tw = _this.width(),
            once,
            map;

          var bounds = new google.maps.LatLngBounds();

          var mapOptions = {
            styles: mapstyle,
            zoom: mapzoom,
            draggable: !("ontouchend" in document),
            scrollwheel: false,
            panControl: panControl,
            zoomControl: zoomControl,
            mapTypeControl: mapTypeControl,
            scaleControl: scaleControl,
            streetViewControl: streetViewControl,
            fullscreenControl: false,
            mapTypeId: mapType,
            gestureHandling: 'cooperative'
          };

          if (expand) {
            expand.toggle(function() {
              var w = _this.parents('.row').width();

              _this.parents('.contact_map_parent').css('overflow', 'visible');
              gsap.to(_this, {
                duration: 1,
                width: w,
                onUpdate: function() {
                  google.maps.event.trigger(map, 'resize');
                  map.setCenter(bounds.getCenter());
                }
              });
              return false;
            }, function() {
              gsap.to(_this, {
                duration: 1,
                width: tw,
                onUpdate: function() {
                  google.maps.event.trigger(map, 'resize');
                  map.setCenter(bounds.getCenter());
                },
                onComplete: function() {
                  _this.parents('.contact_map_parent').css('overflow', 'hidden');
                }
              });
              return false;
            });
          }
          // Render Map
          map = new google.maps.Map(_this[0], mapOptions);

          // Render Marker
          function thb_renderMarker(i, location) {
            var options = location.data('option'),
              lat = options.latitude,
              long = options.longitude,
              latlng = new google.maps.LatLng(lat, long),
              marker = options.marker_image,
              marker_size = options.marker_size,
              retina = options.retina_marker,
              title = options.marker_title,
              desc = options.marker_description,
              pinimageLoad = new Image();

            bounds.extend(latlng);

            pinimageLoad.src = marker;

            location.data('rendered', true);

            $(pinimageLoad).on('load', function() {
              base.setMarkers(i, map, latlng, marker, marker_size, title, desc, retina);
            });
          }

          locations.each(function(i) {
            var location = $(this);
            thb_renderMarker(i, location);
          });


          // On Tiles Loaded
          google.maps.event.addListenerOnce(map, 'tilesloaded', function() {

            if (mapzoom > 0) {
              map.setCenter(bounds.getCenter());
              map.setZoom(mapzoom);
            } else {
              map.setCenter(bounds.getCenter());
              map.fitBounds(bounds);
            }

          });
          win.on('resize.google_map', _.debounce(function() {
            map.setCenter(bounds.getCenter());
          }, 50)).trigger('resize.google_map');

        });
      },
      setMarkers: function(i, map, latlng, marker, marker_size, title, desc, retina) {
        // info windows
        var contentString = '<h3>' + title + '</h3>' + '<div>' + desc + '</div>',
          infowindow = new google.maps.InfoWindow({
            content: contentString
          });

        if (retina) {
          marker_size[0] = marker_size[0] / 2;
          marker_size[1] = marker_size[1] / 2;
        }

        function CustomMarker(latlng, map) {
          this.latlng = latlng;
          this.setMap(map);
        }

        CustomMarker.prototype = new google.maps.OverlayView();

        CustomMarker.prototype.draw = function() {
          var self = this;
          var div = this.div_;
          if (!div) {
            div = this.div_ = $('' +
              '<div class="thb_pin">' +
              '<div class="pulse"></div>' +
              '<div class="shadow"></div>' +
              '<div class="pin-wrap"><img src="' + marker + '" width="' + marker_size[0] + '" height="' + marker_size[1] + '"/></div>' +
              '</div>' +
              '');
            this.pinShadow = this.div_.find('.shadow');
            this.pulse = this.div_.find('.pulse');
            this.div_[0].style.position = 'absolute';
            this.div_[0].style.cursor = 'pointer';

            var panes = this.getPanes();
            panes.overlayImage.appendChild(this.div_[0]);

            google.maps.event.addDomListener(div[0], "click", function(event) {
              infowindow.setPosition(latlng);
              infowindow.open(map);
            });

          }

          var point = this.getProjection().fromLatLngToDivPixel(latlng);

          if (point) {
            var shadow_offset = ((marker_size[0] - 40) / 2);

            this.div_[0].style.left = point.x - (marker_size[0] / 2) + 'px';
            this.div_[0].style.top = point.y - (marker_size[1] / 2) + 'px';
            this.div_[0].style.width = marker_size[0] + 'px';
            this.div_[0].style.height = marker_size[1] + 'px';
            this.pinShadow[0].style.marginLeft = shadow_offset + 'px';
            this.pulse[0].style.marginLeft = shadow_offset + 'px';
          }


        };
        CustomMarker.prototype.remove = function() {
          if (this.div_) {
            this.div_.parentNode.removeChild(this.div_);
            this.div_ = null;
          }
        };

        CustomMarker.prototype.getPosition = function() {
          return this.latlng;
        };

        var g_marker = new CustomMarker(latlng, map);
      }
    },
    ajaxAddToCart: {
      selector: '.ajax_add_to_cart',
      init: function() {
        var base = this,
          container = $(base.selector);

        body.on('added_to_cart', function(e, fragments, cart_hash, $button) {
          $button.text(themeajax.l10n.added);
        });
        body.on('wc_fragments_refreshed added_to_cart', function() {
          if (lazySizes) {
            lazySizes.loader.checkElems();
          }
        });
      }
    },
    loginForm: {
      selector: '.thb-overflow-container',
      init: function() {
        var base = this,
          container = $(base.selector),
          ul = $('ul', container),
          links = $('a', ul);

        links.on('click', function() {
          var _this = $(this);
          if (!_this.hasClass('active')) {
            links.removeClass('active');
            _this.addClass('active');

            $('.thb-form-container', container).toggleClass('register-active');
          }
          return false;
        });
      }
    },
    productAjaxAddtoCart: {
      selector: '.thb-single-product-ajax-on.single-product .product-type-variable form.cart, .thb-single-product-ajax-on.single-product .product-type-simple form.cart',
      init: function() {
        var base = this,
          container = $(base.selector),
          btn = $('.single_add_to_cart_button', container);

        if (typeof wc_add_to_cart_params !== 'undefined') {
          if (wc_add_to_cart_params.cart_redirect_after_add === 'yes') {
            return;
          }
        }
        $doc.on('submit', 'body.single-product form.cart', function(e) {
          e.preventDefault();
          var _this = $(this),
            btn_text = btn.text();

          if (btn.is('.disabled') || btn.is('.wc-variation-selection-needed')) {
            return;
          }

          var data = {
            product_id: _this.find("[name*='add-to-cart']").val(),
            product_variation_data: _this.serialize()
          };

          $.ajax({
            method: 'POST',
            data: data.product_variation_data,
            dataType: 'html',
            url: wc_cart_fragments_params.wc_ajax_url.toString().replace('%%endpoint%%', 'add-to-cart=' + data.product_id + '&thb-ajax-add-to-cart=1'),
            cache: false,
            headers: {
              'cache-control': 'no-cache'
            },
            beforeSend: function() {
              body.trigger('adding_to_cart');
              btn.addClass('disabled').text(themeajax.l10n.adding_to_cart);
            },
            success: function(data) {
              var parsed_data = $.parseHTML(data);

              var thb_fragments = {
                '.float_count': $(parsed_data).find('.float_count').html(),
                '.thb_prod_ajax_to_cart_notices': $(parsed_data).find('.thb_prod_ajax_to_cart_notices').html(),
                '.widget_shopping_cart_content': $(parsed_data).find('.widget_shopping_cart_content').html()
              };

              $.each(thb_fragments, function(key, value) {
                $(key).html(value);
              });
              body.trigger('wc_fragments_refreshed');
              btn.removeClass('disabled').text(btn_text);
            },
            error: function(response) {
              body.trigger('wc_fragments_ajax_error');
              btn.removeClass('disabled').text(btn_text);
            }
          });
        });
      }
    },
    variations: {
      selector: 'form.variations_form',
      init: function() {
        var base = this,
          container = $(base.selector),
          slider = $('#product-images'),
          thumbnails = $('#product-thumbnails'),
          org_image_wrapper = $('.first', slider),
          org_image = $('img', org_image_wrapper),
          org_link = $('a', org_image_wrapper),
          org_image_link = org_link.attr('href'),
          org_image_src = org_image.attr('src'),
          org_thumb = $('.first img', thumbnails),
          org_thumb_src = org_thumb.attr('src'),
          price_container = $('p.price', '.product-information').eq(0),
          org_price = price_container.html();

        container.on("show_variation", function(e, variation) {
          if (variation.price_html) {
            price_container.html(variation.price_html);
          }

          if (variation.hasOwnProperty("image") && variation.image.src) {
            org_image.attr("src", variation.image.src).attr("srcset", "");
            org_thumb.attr("src", variation.image.thumb_src).attr("srcset", "");
            org_link.attr("href", variation.image.full_src);

            if (slider.hasClass('slick-initialized')) {
              slider.slick('slickGoTo', 0);
            }
            if (typeof wc_single_product_params !== 'undefined') {
              if (wc_single_product_params.zoom_enabled === '1') {
                org_image.attr("data-src", variation.image.full_src);
              }
            }
          }
        }).on('reset_image', function() {
          price_container.html(org_price);
          org_image.attr("src", org_image_src).attr("srcset", "");
          org_thumb.attr("src", org_thumb_src).attr("srcset", "");
          org_link.attr("href", org_image_link);

          if (typeof wc_single_product_params !== 'undefined') {
            if (wc_single_product_params.zoom_enabled === '1') {
              org_image.attr("data-src", org_image_src);
            }
          }
        });
        if (container.find('.single_variation').is(':visible')) {
          if (container.find('.single_variation .woocommerce-variation-price').html()) {
            price_container.html(container.find('.single_variation .woocommerce-variation-price').html());
          }
        }
      }
    },
    quantity: {
      selector: '.quantity:not(.hidden)',
      init: function() {
        var base = this,
          container = $(base.selector);

        base.initialize();
        body.on('updated_cart_totals', function() {
          base.initialize();
          if (lazySizes) {
            lazySizes.loader.checkElems();
          }
        });
      },
      initialize: function() {
        // Quantity buttons
        $('div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)').addClass('buttons_added').append('<input type="button" value="+" class="plus" />').prepend('<input type="button" value="-" class="minus" />').end().find('input[type="number"]').attr('type', 'text');
        $('.plus, .minus').on('click', function() {
          // Get values
          var $qty = $(this).closest('.quantity').find('.qty'),
            currentVal = parseFloat($qty.val()),
            max = parseFloat($qty.attr('max')),
            min = parseFloat($qty.attr('min')),
            step = $qty.attr('step');

          // Format values
          if (!currentVal || currentVal === '' || currentVal === 'NaN') {
            currentVal = 0;
          }
          if (max === '' || max === 'NaN') {
            max = '';
          }
          if (min === '' || min === 'NaN') {
            min = 0;
          }
          if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') {
            step = 1;
          }

          // Change the value
          if ($(this).is('.plus')) {

            if (max && (max === currentVal || currentVal > max)) {
              $qty.val(max);
            } else {
              $qty.val(currentVal + parseFloat(step));
            }

          } else {

            if (min && (min === currentVal || currentVal < min)) {
              $qty.val(min);
            } else if (currentVal > 0) {
              $qty.val(currentVal - parseFloat(step));
            }

          }

          // Trigger change event
          $qty.trigger('change');
          return false;
        });
      }
    },
    archiveLoading: {
      selector: '.archive-pagination-container',
      thb_loading: false,
      scrollInfinite: false,
      href: false,
      init: function() {
        var base = this,
          container = $(base.selector),
          type = container.data('pagination-style') || 'style1';

        if ($('.pagination').length && (body.hasClass('archive') || body.hasClass('blog') || body.hasClass('search-results'))) {
          if (type === 'style2') {
            base.loadButton(container);
          } else if (type === 'style3') {
            base.loadInfinite(container);
          }
        }
      },
      loadButton: function(container) {
        var base = this;

        $('.pagination').before('<div class="text-center masonry_loader"><a class="thb_load_more btn pill-radius large black">' + themeajax.l10n.loadmore + '</a></div>');

        if ($('.pagination a.next').length === 0) {
          $('.masonry_loader').addClass('is-hidden');
        }
        $('.pagination').hide();

        body.on('click', '.thb_load_more:not(.no-ajax)', function(e) {
          var _this = $(this);
          base.href = $('.pagination a.next').attr('href');


          if (base.thb_loading === false) {
            _this.html(themeajax.l10n.loading).addClass('loading');

            base.loadPosts(_this, container);
          }
          return false;
        });
      },
      loadInfinite: function(container) {
        var base = this;

        if ($('.pagination a.next').length === 0) {
          $('.masonry_loader').addClass('is-hidden');
        }
        $('.pagination').hide();

        base.scrollInfinite = _.debounce(function() {
          if ((base.thb_loading === false) && ((win.scrollTop() + win.height() + 150) >= (container.offset().top + container.outerHeight()))) {

            base.href = $('.pagination a.next').attr('href');
            base.loadPosts(false, container, true);
          }
        }, 30);

        win.on('scroll', base.scrollInfinite);
      },
      loadPosts: function(button, container, infinite) {
        var base = this;
        $.ajax(base.href, {
          method: 'GET',
          beforeSend: function() {
            base.thb_loading = true;

            if (infinite) {
              gsap.to($('.pagination').next('.thb-preloader'), {
                duration: 0.5,
                autoAlpha: 1
              });
              win.off('scroll', base.scrollInfinite);
            }
          },
          success: function(response) {
            var resp = $(response),
              posts = $(resp.find('.archive-pagination-container').html());

            $('.pagination').html(resp.find('.pagination').html());

            if (button) {
              if (!resp.find('.pagination .next').length) {
                button.html(themeajax.l10n.nomore).removeClass('loading').addClass('no-ajax');
              } else {
                button.html(themeajax.l10n.loadmore).removeClass('loading');
              }
            } else if (infinite) {
              gsap.to($('.pagination').next('.thb-preloader'), {
                duration: 0.5,
                autoAlpha: 0
              });
              if (resp.find('.pagination .next').length) {
                win.on('scroll', base.scrollInfinite);
              }
            }
            posts.appendTo(container);
            if (container.data('isotope')) {
              posts.hide();
              container.isotope('appended', posts);
              container.imagesLoaded(function() {
                container.isotope('layout');
              });
            }
            base.thb_loading = false;
          }
        });
      }
    },
    shopLoading: {
      selector: '.post-type-archive-product ul.products.thb-main-products',
      thb_loading: false,
      scrollInfinite: false,
      href: false,
      init: function() {
        var base = this,
          container = $(base.selector),
          type = themeajax.settings.shop_product_listing_pagination;

        if ($('.woocommerce-pagination').length && body.hasClass('post-type-archive-product')) {
          if (type === 'style2') {
            base.loadButton(container);
          } else if (type === 'style3') {
            base.loadInfinite(container);
          }
        }
      },
      loadButton: function(container) {
        var base = this;

        $('.woocommerce-pagination').before('<div class="thb_load_more_container pagination-space text-center"><a class="thb_load_more btn pill-radius large black">' + themeajax.l10n.loadmore + '</a></div>');

        if ($('.woocommerce-pagination a.next').length === 0) {
          $('.thb_load_more_container').addClass('is-hidden');
        }
        $('.woocommerce-pagination').hide();

        body.on('click', '.thb_load_more:not(.no-ajax)', function(e) {
          var _this = $(this);
          base.href = $('.woocommerce-pagination a.next').attr('href');


          if (base.thb_loading === false) {
            _this.html(themeajax.l10n.loading).addClass('loading');

            base.loadProducts(_this, container);
          }
          return false;
        });
      },
      loadInfinite: function(container) {
        var base = this;

        if ($('.woocommerce-pagination a.next').length === 0) {
          $('.thb_load_more_container').addClass('is-hidden');
        }
        $('.woocommerce-pagination').hide();

        base.scrollInfinite = _.debounce(function() {
          if ((base.thb_loading === false) && ((win.scrollTop() + win.height() + 150) >= (container.offset().top + container.outerHeight()))) {

            base.href = $('.woocommerce-pagination a.next').attr('href');
            base.loadProducts(false, container, true);
          }
        }, 30);

        win.on('scroll', base.scrollInfinite);
      },
      loadProducts: function(button, container, infinite) {
        var base = this;
        $.ajax(base.href, {
          method: 'GET',
          beforeSend: function() {
            base.thb_loading = true;

            if (infinite) {
              win.off('scroll', base.scrollInfinite);
            }
          },
          success: function(response) {
            var resp = $(response),
              products = resp.find('ul.products.thb-main-products li');

            $('.woocommerce-pagination').html(resp.find('.woocommerce-pagination').html());

            if (button) {
              if (!resp.find('.woocommerce-pagination .next').length) {
                button.html(themeajax.l10n.nomore_products).removeClass('loading').addClass('no-ajax');
              } else {
                button.html(themeajax.l10n.loadmore).removeClass('loading');
              }
            } else if (infinite) {
              if (resp.find('.woocommerce-pagination .next').length) {
                win.on('scroll', base.scrollInfinite);
              }
            }
            if (products.length) {
              products.addClass('will-animate').appendTo(container);
              gsap.set(products, {
                opacity: 0,
                y: 30
              });
              gsap.to(products, {
                duration: 0.3,
                y: 0,
                opacity: 1,
                stagger: 0.15
              });
            }
            base.thb_loading = false;
          }
        });
      }
    },
    newsletter: {
      selector: '.newsletter-form:not(.thb-active)',
      init: function() {
        var base = this,
          container = $(base.selector),
          mc_enabled = themeajax.settings.newsletter_mailchimp,
          selected_action = mc_enabled ? 'thb_subscribe_mailchimp' : 'thb_subscribe_emails';

        container.each(function() {
          var _this = $(this),
            security = _this.data('security'),
            args = {
              security: security,
              action: selected_action,
              privacy: false
            };
          _this.addClass('thb-active');
          _this.on('submit', function() {
            if (_this.next('.thb-custom-checkbox').length) {
              args.privacy = true;
              args.checked = _this.next('.thb-custom-checkbox').find('.thb-newsletter-privacy').is(':checked');
            }
            args.email = _this.find('.widget_subscribe').val() || false;
            $.ajax(themeajax.url, {
              method: 'POST',
              data: args,
              beforeSend: function() {
                _this.addClass('thb-loading');
              },
              success: function(data) {
                var d = $.parseHTML($.trim(data));
                _this.removeClass('thb-loading');
                $(d).appendTo(body);
                _.delay(function() {
                  $(d).remove();
                }, 8000);
              }
            });
            return false;
          });
        });

      }
    },
    widget_nav_menu: {
      selector: '.widget_nav_menu, .widget_pages',
      init: function() {
        var base = this,
          container = $(base.selector),
          items = container.find('.menu-item-has-children, .page_item_has_children');

        items.each(function() {
          var _this = $(this),
            link = $('>a', _this);

          link.append('<div class="thb-arrow"><i class="thb-icon-down-open-mini"></i></div>');

          $('.thb-arrow', _this).on('click', function(e) {
            var that = $(this),
              parent = that.parents('a'),
              menu = parent.next('.sub-menu, .children');

            if (parent.hasClass('active')) {
              parent.removeClass('active');
              menu.slideUp('200');
            } else {
              parent.addClass('active');
              menu.slideDown('200');
            }
            e.stopPropagation();
            e.preventDefault();
          });
          if (link.attr('href') === '#') {
            link.on('click', function(e) {
              var that = $(this),
                menu = that.next('.sub-menu');
              if (that.hasClass('active')) {
                that.removeClass('active');
                menu.slideUp('200');
              } else {
                that.addClass('active');
                menu.slideDown('200');
              }
              e.preventDefault();
            });
          }
        });
      }
    },
    pricingStyle2: {
      selector: '.thb-pricing-table.style2',
      init: function(el) {
        var base = this,
          container = $(base.selector);

        container.each(function() {
          var _this = $(this),
            columns = $('.pricing-container', _this),
            highlight = $('.pricing-style2-highlight', _this),
            highlight_init = highlight.parents('.pricing-container');

          function moveHighlight(el) {
            var hover = el;

            gsap.set(highlight, {
              'left': hover.position().left,
              'width': hover.outerWidth(),
              'height': hover.parents('.thb-pricing-column').outerHeight(),
              'top': hover.position().top,
            });
          }

          columns.on('mouseenter', function() {
            moveHighlight($(this));
          }).on('mouseleave', function() {
            moveHighlight(highlight_init);
          });

          win.on('resize.move_highlight', function() {
            moveHighlight(highlight_init);
          }).trigger('resize.move_highlight');
          _this.addClass('active');
        });

      }
    },
    toBottom: {
      selector: '.scroll-bottom',
      init: function() {
        var base = this,
          container = $(base.selector);

        var fixed_height = $('.header>.row').outerHeight() + (parseInt(themeajax.settings.fixed_header_padding.top, 10) || 0) + (parseInt(themeajax.settings.fixed_header_padding.bottom, 10) || 0);

        container.each(function() {
          var _this = $(this);

          _this.on('click', function() {
            var p = _this.parents('.post-gallery').length ? _this.parents('.post-gallery') : _this.closest('.row'),
              h = p.outerHeight(),
              ah = $('#wpadminbar').outerHeight() || 0,
              finalScroll = p.offset().top + h;

            finalScroll -= ah;

            gsap.to(win, {
              duration: 1,
              scrollTo: {
                y: finalScroll,
                autoKill: false
              }
            });
            return false;
          });
        });
      }
    },
    darkMode: {
      selector: '.thb-light-toggle',
      init: function() {
        var base = this,
          container = $(base.selector),
          is_dark = body.hasClass('thb-dark-mode-on');

        container.on('click', function() {
          var _this = $(this),
            dark_mode_on = false;

          if (_this.hasClass('active')) {
            container.removeClass('active');
            body.removeClass('thb-dark-mode-on');
            dark_mode_on = false;
            header.removeClass('dark-header');
            $('.subheader, .footer, .subfooter').removeClass('dark').addClass('light');
          } else {
            container.addClass('active');
            body.addClass('thb-dark-mode-on');
            dark_mode_on = true;
            header.addClass('dark-header');
            $('.subheader, .footer, .subfooter').removeClass('light').addClass('dark');
          }
          $('.header .logoimg').each(function() {
            var _this = $(this),
              logo = _this.attr('src'),
              alt = _this.data('logo-alt');

            if (dark_mode_on) {
              _this.attr('src', alt);
              _this.data('logo-alt', logo);
            } else {
              _this.attr('src', alt);
              _this.data('logo-alt', logo);
            }
          });
          $.ajax(themeajax.url, {
            method: 'POST',
            data: {
              action: 'thb_dark_mode',
              dark_mode_on: dark_mode_on,
            }
          });

          return false;
        });
      }
    },
    toTop: {
      selector: '#scroll_to_top',
      init: function() {
        var base = this,
          container = $(base.selector);

        container.on('click', function() {
          gsap.to(win, {
            duration: 1,
            scrollTo: {
              y: 0,
              autoKill: false
            }
          });
          return false;
        });
        win.scroll(_.debounce(function() {
          base.control();
        }, 20));
      },
      control: function() {
        var base = this,
          container = $(base.selector);

        if (win.scrollTop() > 100) {
          container.addClass('active');
        } else {
          container.removeClass('active');
        }
      }
    },
    right_click: {
      selector: '.right-click-on',
      init: function() {
        var target = $('#right_click_content'),
          clickMain = gsap.timeline({
            paused: true,
            onStart: function() {
              target.css('display', 'flex');
            },
            onReverseComplete: function() {
              target.css('display', 'none');
            }
          }),
          el = target.find('.columns>*');


        clickMain
          .to(target, {
            duration: 0.25,
            opacity: 1
          }, "start");

        if (el.length) {
          clickMain.from(el, {
            duration: 0.5,
            y: 20,
            opacity: 0,
            stagger: 0.1
          });
        }


        win.on("contextmenu", function(e) {
          if (e.which === 3) {
            clickMain.play();
            return false;
          }
        });
        $doc.keyup(function(e) {
          if (e.keyCode === 27) {
            clickMain.reverse();
          }
        });
        target.on('click', function() {
          clickMain.reverse();
        });
      }
    },
  };

  $(function() {
    if ($('#vc_inline-anchor').length) {
      win.on('vc_reload', function() {
        SITE.init();
      });
    } else {
      SITE.init();
    }
  });
})(jQuery, this);