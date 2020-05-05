(function($){

  $.fn.fontselect = function(options) {  

     var __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

     var fonts = [
      "",
      "Aclonica",
      "Allan",
      "Annie+Use+Your+Telescope",
      "Anonymous+Pro",
      "Allerta+Stencil",
      "Allerta",
      "Amaranth",
      "Anton",
      "Architects+Daughter",
      "Arimo",
      "Artifika",
      "Arvo",
      "Asset",
      "Astloch",
      "Bangers",
      "Bentham",
      "Bevan",
      "Bigshot+One",
      "Bowlby+One",
      "Bowlby+One+SC",
      "Brawler",
      "Buda:300",
      "Cabin",
      "Calligraffitti",
      "Candal",
      "Cantarell",
      "Cardo",
      "Carter One",
      "Caudex",
      "Cedarville+Cursive",
      "Cherry+Cream+Soda",
      "Chewy",
      "Coda",
      "Coming+Soon",
      "Copse",
      "Corben:700",
      "Cousine",
      "Covered+By+Your+Grace",
      "Crafty+Girls",
      "Crimson+Text",
      "Crushed",
      "Cuprum",
      "Damion",
      "Dancing+Script",
      "Dawning+of+a+New+Day",
      "Didact+Gothic",
      "Droid+Sans",
      "Droid+Sans+Mono",
      "Droid+Serif",
      "EB+Garamond",
      "Expletus+Sans",
      "Fontdiner+Swanky",
      "Forum",
      "Francois+One",
      "Geo",
      "Give+You+Glory",
      "Goblin+One",
      "Goudy+Bookletter+1911",
      "Gravitas+One",
      "Gruppo",
      "Hammersmith+One",
      "Holtwood+One+SC",
      "Homemade+Apple",
      "Inconsolata",
      "Indie+Flower",
      "IM+Fell+DW+Pica",
      "IM+Fell+DW+Pica+SC",
      "IM+Fell+Double+Pica",
      "IM+Fell+Double+Pica+SC",
      "IM+Fell+English",
      "IM+Fell+English+SC",
      "IM+Fell+French+Canon",
      "IM+Fell+French+Canon+SC",
      "IM+Fell+Great+Primer",
      "IM+Fell+Great+Primer+SC",
      "Irish+Grover",
      "Irish+Growler",
      "Istok+Web",
      "Josefin+Sans",
      "Josefin+Slab",
      "Judson",
      "Jura",
      "Jura:500",
      "Jura:600",
      "Just+Another+Hand",
      "Just+Me+Again+Down+Here",
      "Kameron",
      "Kenia",
      "Kranky",
      "Kreon",
      "Kristi",
      "La+Belle+Aurore",
      "Lato:100",
      "Lato:100italic",
      "Lato:300", 
      "Lato",
      "Lato:bold",  
      "Lato:900",
      "League+Script",
      "Lekton",  
      "Limelight",  
      "Lobster",
      "Lobster Two",
      "Lora",
      "Love+Ya+Like+A+Sister",
      "Loved+by+the+King",
      "Luckiest+Guy",
      "Maiden+Orange",
      "Mako",
      "Maven+Pro",
      "Maven+Pro:500",
      "Maven+Pro:700",
      "Maven+Pro:900",
      "Meddon",
      "MedievalSharp",
      "Megrim",
      "Merriweather",
      "Metrophobic",
      "Michroma",
      "Miltonian Tattoo",
      "Miltonian",
      "Modern Antiqua",
      "Monofett",
      "Molengo",
      "Mountains of Christmas",
      "Muli:300", 
      "Muli", 
      "Neucha",
      "Neuton",
      "News+Cycle",
      "Nixie+One",
      "Nobile",
      "Nova+Cut",
      "Nova+Flat",
      "Nova+Mono",
      "Nova+Oval",
      "Nova+Round",
      "Nova+Script",
      "Nova+Slim",
      "Nova+Square",
      "Nunito:light",
      "Nunito",
      "OFL+Sorts+Mill+Goudy+TT",
      "Old+Standard+TT",
      "Open+Sans:300",
      "Open+Sans",
      "Open+Sans:600",
      "Open+Sans:800",
      "Open+Sans+Condensed:300",
      "Orbitron",
      "Orbitron:500",
      "Orbitron:700",
      "Orbitron:900",
      "Oswald",
      "Over+the+Rainbow",
      "Reenie+Beanie",
      "Pacifico",
      "Patrick+Hand",
      "Paytone+One", 
      "Permanent+Marker",
      "Philosopher",
      "Play",
      "Playfair+Display",
      "Podkova",
      "PT+Sans",
      "PT+Sans+Narrow",
      "PT+Sans+Narrow:regular,bold",
      "PT+Serif",
      "PT+Serif Caption",
      "Puritan",
      "Quattrocento",
      "Quattrocento+Sans",
      "Radley",
      "Raleway:100",
      "Redressed",
      "Rock+Salt",
      "Rokkitt",
      "Ruslan+Display",
      "Schoolbell",
      "Shadows+Into+Light",
      "Shanti",
      "Sigmar+One",
      "Six+Caps",
      "Slackey",
      "Smythe",
      "Sniglet:800",
      "Special+Elite",
      "Stardos+Stencil",
      "Sue+Ellen+Francisco",
      "Sunshiney",
      "Swanky+and+Moo+Moo",
      "Syncopate",
      "Tangerine",
      "Tenor+Sans",
      "Terminal+Dosis+Light",
      "The+Girl+Next+Door",
      "Tinos",
      "Ubuntu",
      "Ultra",
      "Unkempt",
      "UnifrakturCook:bold",
      "UnifrakturMaguntia",
      "Varela",
      "Varela Round",
      "Vibur",
      "Vollkorn",
      "VT323",
      "Waiting+for+the+Sunrise",
      "Wallpoet",
      "Walter+Turncoat",
      "Wire+One",
      "Yanone+Kaffeesatz",
      "Yanone+Kaffeesatz:300",
      "Yanone+Kaffeesatz:400",
      "Yanone+Kaffeesatz:700",
      "Yeseva+One",
      "Zeyada"];

    var settings = {
      style: 'font-select',
      placeholder: 'Select a font',
      lookahead: 2,
      api: 'http://fonts.googleapis.com/css?family=',
      activeFont: ''
    };
    
    var Fontselect = (function(){
    
      function Fontselect(original, o){
        this.$original = $(original);
        this.options = o;
        this.active = false;
        this.setupHtml();
        this.getVisibleFonts();
        this.bindEvents();

        var font = this.$original.val();
        if (font) {
          this.updateSelected();
          this.addFontLink(font);
        }

      }
      
      Fontselect.prototype.bindEvents = function(){
      
        $('li', this.$results)
        .click(__bind(this.selectFont, this))
        .mouseenter(__bind(this.activateFont, this))
        .mouseleave(__bind(this.deactivateFont, this));
        
        $('span', this.$select).click(__bind(this.toggleDrop, this));
        this.$arrow.click(__bind(this.toggleDrop, this));
      };
      
      Fontselect.prototype.toggleDrop = function(ev){
        
        if(this.active){
          this.$element.removeClass('font-select-active');
          this.$drop.hide();
          clearInterval(this.visibleInterval);
          
        } else {
          this.$element.addClass('font-select-active');
          this.$drop.show();
          this.moveToSelected();
          this.visibleInterval = setInterval(__bind(this.getVisibleFonts, this), 500);
        }
        
        this.active = !this.active;
      };
      
      Fontselect.prototype.selectFont = function(){
        
        var font = $('li.active', this.$results).data('value');
        this.$original.val(font).change();
        this.updateSelected();
        this.toggleDrop();
      };
      
      Fontselect.prototype.moveToSelected = function(){
        
        var $li, font = this.$original.val();
        
        if (font){
          $li = $("li[data-value='"+ font +"']", this.$results);
        } else {
          $li = $("li", this.$results).first();
        }

        this.$results.scrollTop($li.addClass('active').position().top);
      };
      
      Fontselect.prototype.activateFont = function(ev){
        $('li.active', this.$results).removeClass('active');
        $(ev.currentTarget).addClass('active');
      };
      
      Fontselect.prototype.deactivateFont = function(ev){
        
        $(ev.currentTarget).removeClass('active');
      };
      
      Fontselect.prototype.updateSelected = function(){
        
        var font = this.$original.val();
        $('span', this.$element).text(this.toReadable(font)).css(this.toStyle(font));
      };
      
      Fontselect.prototype.setupHtml = function(){
      
        this.$original.empty().hide();
        this.$element = $('<div>', {'class': this.options.style});
        this.$arrow = $('<div><b></b></div>');
        this.$select = $('<a><span>'+ this.options.placeholder +'</span></a>');
        this.$drop = $('<div>', {'class': 'fs-drop'});
        this.$results = $('<ul>', {'class': 'fs-results'});
        this.$original.after(this.$element.append(this.$select.append(this.$arrow)).append(this.$drop));
        this.$drop.append(this.$results.append(this.fontsAsHtml())).hide();
      };
      
      Fontselect.prototype.fontsAsHtml = function(){
        
        var l = fonts.length;
        var r, s, h = '';
        
        for(var i=0; i<l; i++){
         
          r = this.toReadable(fonts[i]);
          s = this.toStyle(fonts[i]);

          h += '<li data-value="'+ fonts[i] +'" style="font-family: '+s['font-family'] +'; font-weight: '+s['font-weight'] +'">'+ r +'</li>';
        }
       
        return h;
      };
      
      Fontselect.prototype.toReadable = function(font){
        return font.replace(/[\+|:]/g, ' ');
      };
      
      Fontselect.prototype.toStyle = function(font){
        var t = font.split(':');
        return {'font-family': this.toReadable(t[0]), 'font-weight': (t[1] || 400)};
      };
      
      Fontselect.prototype.getVisibleFonts = function(){
      
        if(this.$results.is(':hidden')) return;
        
        var fs = this;
        var top = this.$results.scrollTop();
        var bottom = top + this.$results.height();
        
        if(this.options.lookahead){
          var li = $('li', this.$results).first().height();
          bottom += li*this.options.lookahead;
        }
       
        $('li', this.$results).each(function(){

          var ft = $(this).position().top+top;
          var fb = ft + $(this).height();

          if ((fb >= top) && (ft <= bottom)){
            var font = $(this).data('value');
            fs.addFontLink(font);
          }
          
        });
      };
      
      Fontselect.prototype.addFontLink = function(font){
        if ( font == '' )
          return;

        var link = this.options.api + font;
      
        if ($("link[href*='" + font + "']").length === 0){
            $('link:last').after('<link href="' + link + '" rel="stylesheet" type="text/css">');
        }
      };
    
      return Fontselect;
    })();

    return this.each(function(options) {        
      // If options exist, lets merge them
      if (options) $.extend( settings, options );
      
      return new Fontselect(this, settings);
    });

  };
})(jQuery);
/*!
 * Bootstrap v3.3.5 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under the MIT license
 */
if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(a){"use strict";var b=a.fn.jquery.split(" ")[0].split(".");if(b[0]<2&&b[1]<9||1==b[0]&&9==b[1]&&b[2]<1)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher")}(jQuery),+function(a){"use strict";function b(){var a=document.createElement("bootstrap"),b={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var c in b)if(void 0!==a.style[c])return{end:b[c]};return!1}a.fn.emulateTransitionEnd=function(b){var c=!1,d=this;a(this).one("bsTransitionEnd",function(){c=!0});var e=function(){c||a(d).trigger(a.support.transition.end)};return setTimeout(e,b),this},a(function(){a.support.transition=b(),a.support.transition&&(a.event.special.bsTransitionEnd={bindType:a.support.transition.end,delegateType:a.support.transition.end,handle:function(b){return a(b.target).is(this)?b.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var c=a(this),e=c.data("bs.alert");e||c.data("bs.alert",e=new d(this)),"string"==typeof b&&e[b].call(c)})}var c='[data-dismiss="alert"]',d=function(b){a(b).on("click",c,this.close)};d.VERSION="3.3.5",d.TRANSITION_DURATION=150,d.prototype.close=function(b){function c(){g.detach().trigger("closed.bs.alert").remove()}var e=a(this),f=e.attr("data-target");f||(f=e.attr("href"),f=f&&f.replace(/.*(?=#[^\s]*$)/,""));var g=a(f);b&&b.preventDefault(),g.length||(g=e.closest(".alert")),g.trigger(b=a.Event("close.bs.alert")),b.isDefaultPrevented()||(g.removeClass("in"),a.support.transition&&g.hasClass("fade")?g.one("bsTransitionEnd",c).emulateTransitionEnd(d.TRANSITION_DURATION):c())};var e=a.fn.alert;a.fn.alert=b,a.fn.alert.Constructor=d,a.fn.alert.noConflict=function(){return a.fn.alert=e,this},a(document).on("click.bs.alert.data-api",c,d.prototype.close)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.button"),f="object"==typeof b&&b;e||d.data("bs.button",e=new c(this,f)),"toggle"==b?e.toggle():b&&e.setState(b)})}var c=function(b,d){this.$element=a(b),this.options=a.extend({},c.DEFAULTS,d),this.isLoading=!1};c.VERSION="3.3.5",c.DEFAULTS={loadingText:"loading..."},c.prototype.setState=function(b){var c="disabled",d=this.$element,e=d.is("input")?"val":"html",f=d.data();b+="Text",null==f.resetText&&d.data("resetText",d[e]()),setTimeout(a.proxy(function(){d[e](null==f[b]?this.options[b]:f[b]),"loadingText"==b?(this.isLoading=!0,d.addClass(c).attr(c,c)):this.isLoading&&(this.isLoading=!1,d.removeClass(c).removeAttr(c))},this),0)},c.prototype.toggle=function(){var a=!0,b=this.$element.closest('[data-toggle="buttons"]');if(b.length){var c=this.$element.find("input");"radio"==c.prop("type")?(c.prop("checked")&&(a=!1),b.find(".active").removeClass("active"),this.$element.addClass("active")):"checkbox"==c.prop("type")&&(c.prop("checked")!==this.$element.hasClass("active")&&(a=!1),this.$element.toggleClass("active")),c.prop("checked",this.$element.hasClass("active")),a&&c.trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active")),this.$element.toggleClass("active")};var d=a.fn.button;a.fn.button=b,a.fn.button.Constructor=c,a.fn.button.noConflict=function(){return a.fn.button=d,this},a(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(c){var d=a(c.target);d.hasClass("btn")||(d=d.closest(".btn")),b.call(d,"toggle"),a(c.target).is('input[type="radio"]')||a(c.target).is('input[type="checkbox"]')||c.preventDefault()}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(b){a(b.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(b.type))})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.carousel"),f=a.extend({},c.DEFAULTS,d.data(),"object"==typeof b&&b),g="string"==typeof b?b:f.slide;e||d.data("bs.carousel",e=new c(this,f)),"number"==typeof b?e.to(b):g?e[g]():f.interval&&e.pause().cycle()})}var c=function(b,c){this.$element=a(b),this.$indicators=this.$element.find(".carousel-indicators"),this.options=c,this.paused=null,this.sliding=null,this.interval=null,this.$active=null,this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",a.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",a.proxy(this.pause,this)).on("mouseleave.bs.carousel",a.proxy(this.cycle,this))};c.VERSION="3.3.5",c.TRANSITION_DURATION=600,c.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},c.prototype.keydown=function(a){if(!/input|textarea/i.test(a.target.tagName)){switch(a.which){case 37:this.prev();break;case 39:this.next();break;default:return}a.preventDefault()}},c.prototype.cycle=function(b){return b||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(a.proxy(this.next,this),this.options.interval)),this},c.prototype.getItemIndex=function(a){return this.$items=a.parent().children(".item"),this.$items.index(a||this.$active)},c.prototype.getItemForDirection=function(a,b){var c=this.getItemIndex(b),d="prev"==a&&0===c||"next"==a&&c==this.$items.length-1;if(d&&!this.options.wrap)return b;var e="prev"==a?-1:1,f=(c+e)%this.$items.length;return this.$items.eq(f)},c.prototype.to=function(a){var b=this,c=this.getItemIndex(this.$active=this.$element.find(".item.active"));return a>this.$items.length-1||0>a?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){b.to(a)}):c==a?this.pause().cycle():this.slide(a>c?"next":"prev",this.$items.eq(a))},c.prototype.pause=function(b){return b||(this.paused=!0),this.$element.find(".next, .prev").length&&a.support.transition&&(this.$element.trigger(a.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},c.prototype.next=function(){return this.sliding?void 0:this.slide("next")},c.prototype.prev=function(){return this.sliding?void 0:this.slide("prev")},c.prototype.slide=function(b,d){var e=this.$element.find(".item.active"),f=d||this.getItemForDirection(b,e),g=this.interval,h="next"==b?"left":"right",i=this;if(f.hasClass("active"))return this.sliding=!1;var j=f[0],k=a.Event("slide.bs.carousel",{relatedTarget:j,direction:h});if(this.$element.trigger(k),!k.isDefaultPrevented()){if(this.sliding=!0,g&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var l=a(this.$indicators.children()[this.getItemIndex(f)]);l&&l.addClass("active")}var m=a.Event("slid.bs.carousel",{relatedTarget:j,direction:h});return a.support.transition&&this.$element.hasClass("slide")?(f.addClass(b),f[0].offsetWidth,e.addClass(h),f.addClass(h),e.one("bsTransitionEnd",function(){f.removeClass([b,h].join(" ")).addClass("active"),e.removeClass(["active",h].join(" ")),i.sliding=!1,setTimeout(function(){i.$element.trigger(m)},0)}).emulateTransitionEnd(c.TRANSITION_DURATION)):(e.removeClass("active"),f.addClass("active"),this.sliding=!1,this.$element.trigger(m)),g&&this.cycle(),this}};var d=a.fn.carousel;a.fn.carousel=b,a.fn.carousel.Constructor=c,a.fn.carousel.noConflict=function(){return a.fn.carousel=d,this};var e=function(c){var d,e=a(this),f=a(e.attr("data-target")||(d=e.attr("href"))&&d.replace(/.*(?=#[^\s]+$)/,""));if(f.hasClass("carousel")){var g=a.extend({},f.data(),e.data()),h=e.attr("data-slide-to");h&&(g.interval=!1),b.call(f,g),h&&f.data("bs.carousel").to(h),c.preventDefault()}};a(document).on("click.bs.carousel.data-api","[data-slide]",e).on("click.bs.carousel.data-api","[data-slide-to]",e),a(window).on("load",function(){a('[data-ride="carousel"]').each(function(){var c=a(this);b.call(c,c.data())})})}(jQuery),+function(a){"use strict";function b(b){var c,d=b.attr("data-target")||(c=b.attr("href"))&&c.replace(/.*(?=#[^\s]+$)/,"");return a(d)}function c(b){return this.each(function(){var c=a(this),e=c.data("bs.collapse"),f=a.extend({},d.DEFAULTS,c.data(),"object"==typeof b&&b);!e&&f.toggle&&/show|hide/.test(b)&&(f.toggle=!1),e||c.data("bs.collapse",e=new d(this,f)),"string"==typeof b&&e[b]()})}var d=function(b,c){this.$element=a(b),this.options=a.extend({},d.DEFAULTS,c),this.$trigger=a('[data-toggle="collapse"][href="#'+b.id+'"],[data-toggle="collapse"][data-target="#'+b.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};d.VERSION="3.3.5",d.TRANSITION_DURATION=350,d.DEFAULTS={toggle:!0},d.prototype.dimension=function(){var a=this.$element.hasClass("width");return a?"width":"height"},d.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var b,e=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(e&&e.length&&(b=e.data("bs.collapse"),b&&b.transitioning))){var f=a.Event("show.bs.collapse");if(this.$element.trigger(f),!f.isDefaultPrevented()){e&&e.length&&(c.call(e,"hide"),b||e.data("bs.collapse",null));var g=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[g](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var h=function(){this.$element.removeClass("collapsing").addClass("collapse in")[g](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!a.support.transition)return h.call(this);var i=a.camelCase(["scroll",g].join("-"));this.$element.one("bsTransitionEnd",a.proxy(h,this)).emulateTransitionEnd(d.TRANSITION_DURATION)[g](this.$element[0][i])}}}},d.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var b=a.Event("hide.bs.collapse");if(this.$element.trigger(b),!b.isDefaultPrevented()){var c=this.dimension();this.$element[c](this.$element[c]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var e=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return a.support.transition?void this.$element[c](0).one("bsTransitionEnd",a.proxy(e,this)).emulateTransitionEnd(d.TRANSITION_DURATION):e.call(this)}}},d.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},d.prototype.getParent=function(){return a(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(a.proxy(function(c,d){var e=a(d);this.addAriaAndCollapsedClass(b(e),e)},this)).end()},d.prototype.addAriaAndCollapsedClass=function(a,b){var c=a.hasClass("in");a.attr("aria-expanded",c),b.toggleClass("collapsed",!c).attr("aria-expanded",c)};var e=a.fn.collapse;a.fn.collapse=c,a.fn.collapse.Constructor=d,a.fn.collapse.noConflict=function(){return a.fn.collapse=e,this},a(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(d){var e=a(this);e.attr("data-target")||d.preventDefault();var f=b(e),g=f.data("bs.collapse"),h=g?"toggle":e.data();c.call(f,h)})}(jQuery),+function(a){"use strict";function b(b){var c=b.attr("data-target");c||(c=b.attr("href"),c=c&&/#[A-Za-z]/.test(c)&&c.replace(/.*(?=#[^\s]*$)/,""));var d=c&&a(c);return d&&d.length?d:b.parent()}function c(c){c&&3===c.which||(a(e).remove(),a(f).each(function(){var d=a(this),e=b(d),f={relatedTarget:this};e.hasClass("open")&&(c&&"click"==c.type&&/input|textarea/i.test(c.target.tagName)&&a.contains(e[0],c.target)||(e.trigger(c=a.Event("hide.bs.dropdown",f)),c.isDefaultPrevented()||(d.attr("aria-expanded","false"),e.removeClass("open").trigger("hidden.bs.dropdown",f))))}))}function d(b){return this.each(function(){var c=a(this),d=c.data("bs.dropdown");d||c.data("bs.dropdown",d=new g(this)),"string"==typeof b&&d[b].call(c)})}var e=".dropdown-backdrop",f='[data-toggle="dropdown"]',g=function(b){a(b).on("click.bs.dropdown",this.toggle)};g.VERSION="3.3.5",g.prototype.toggle=function(d){var e=a(this);if(!e.is(".disabled, :disabled")){var f=b(e),g=f.hasClass("open");if(c(),!g){"ontouchstart"in document.documentElement&&!f.closest(".navbar-nav").length&&a(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(a(this)).on("click",c);var h={relatedTarget:this};if(f.trigger(d=a.Event("show.bs.dropdown",h)),d.isDefaultPrevented())return;e.trigger("focus").attr("aria-expanded","true"),f.toggleClass("open").trigger("shown.bs.dropdown",h)}return!1}},g.prototype.keydown=function(c){if(/(38|40|27|32)/.test(c.which)&&!/input|textarea/i.test(c.target.tagName)){var d=a(this);if(c.preventDefault(),c.stopPropagation(),!d.is(".disabled, :disabled")){var e=b(d),g=e.hasClass("open");if(!g&&27!=c.which||g&&27==c.which)return 27==c.which&&e.find(f).trigger("focus"),d.trigger("click");var h=" li:not(.disabled):visible a",i=e.find(".dropdown-menu"+h);if(i.length){var j=i.index(c.target);38==c.which&&j>0&&j--,40==c.which&&j<i.length-1&&j++,~j||(j=0),i.eq(j).trigger("focus")}}}};var h=a.fn.dropdown;a.fn.dropdown=d,a.fn.dropdown.Constructor=g,a.fn.dropdown.noConflict=function(){return a.fn.dropdown=h,this},a(document).on("click.bs.dropdown.data-api",c).on("click.bs.dropdown.data-api",".dropdown form",function(a){a.stopPropagation()}).on("click.bs.dropdown.data-api",f,g.prototype.toggle).on("keydown.bs.dropdown.data-api",f,g.prototype.keydown).on("keydown.bs.dropdown.data-api",".dropdown-menu",g.prototype.keydown)}(jQuery),+function(a){"use strict";function b(b,d){return this.each(function(){var e=a(this),f=e.data("bs.modal"),g=a.extend({},c.DEFAULTS,e.data(),"object"==typeof b&&b);f||e.data("bs.modal",f=new c(this,g)),"string"==typeof b?f[b](d):g.show&&f.show(d)})}var c=function(b,c){this.options=c,this.$body=a(document.body),this.$element=a(b),this.$dialog=this.$element.find(".modal-dialog"),this.$backdrop=null,this.isShown=null,this.originalBodyPad=null,this.scrollbarWidth=0,this.ignoreBackdropClick=!1,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,a.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};c.VERSION="3.3.5",c.TRANSITION_DURATION=300,c.BACKDROP_TRANSITION_DURATION=150,c.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},c.prototype.toggle=function(a){return this.isShown?this.hide():this.show(a)},c.prototype.show=function(b){var d=this,e=a.Event("show.bs.modal",{relatedTarget:b});this.$element.trigger(e),this.isShown||e.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',a.proxy(this.hide,this)),this.$dialog.on("mousedown.dismiss.bs.modal",function(){d.$element.one("mouseup.dismiss.bs.modal",function(b){a(b.target).is(d.$element)&&(d.ignoreBackdropClick=!0)})}),this.backdrop(function(){var e=a.support.transition&&d.$element.hasClass("fade");d.$element.parent().length||d.$element.appendTo(d.$body),d.$element.show().scrollTop(0),d.adjustDialog(),e&&d.$element[0].offsetWidth,d.$element.addClass("in"),d.enforceFocus();var f=a.Event("shown.bs.modal",{relatedTarget:b});e?d.$dialog.one("bsTransitionEnd",function(){d.$element.trigger("focus").trigger(f)}).emulateTransitionEnd(c.TRANSITION_DURATION):d.$element.trigger("focus").trigger(f)}))},c.prototype.hide=function(b){b&&b.preventDefault(),b=a.Event("hide.bs.modal"),this.$element.trigger(b),this.isShown&&!b.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),a(document).off("focusin.bs.modal"),this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"),this.$dialog.off("mousedown.dismiss.bs.modal"),a.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",a.proxy(this.hideModal,this)).emulateTransitionEnd(c.TRANSITION_DURATION):this.hideModal())},c.prototype.enforceFocus=function(){a(document).off("focusin.bs.modal").on("focusin.bs.modal",a.proxy(function(a){this.$element[0]===a.target||this.$element.has(a.target).length||this.$element.trigger("focus")},this))},c.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",a.proxy(function(a){27==a.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},c.prototype.resize=function(){this.isShown?a(window).on("resize.bs.modal",a.proxy(this.handleUpdate,this)):a(window).off("resize.bs.modal")},c.prototype.hideModal=function(){var a=this;this.$element.hide(),this.backdrop(function(){a.$body.removeClass("modal-open"),a.resetAdjustments(),a.resetScrollbar(),a.$element.trigger("hidden.bs.modal")})},c.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},c.prototype.backdrop=function(b){var d=this,e=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var f=a.support.transition&&e;if(this.$backdrop=a(document.createElement("div")).addClass("modal-backdrop "+e).appendTo(this.$body),this.$element.on("click.dismiss.bs.modal",a.proxy(function(a){return this.ignoreBackdropClick?void(this.ignoreBackdropClick=!1):void(a.target===a.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus():this.hide()))},this)),f&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!b)return;f?this.$backdrop.one("bsTransitionEnd",b).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):b()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var g=function(){d.removeBackdrop(),b&&b()};a.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",g).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):g()}else b&&b()},c.prototype.handleUpdate=function(){this.adjustDialog()},c.prototype.adjustDialog=function(){var a=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&a?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!a?this.scrollbarWidth:""})},c.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},c.prototype.checkScrollbar=function(){var a=window.innerWidth;if(!a){var b=document.documentElement.getBoundingClientRect();a=b.right-Math.abs(b.left)}this.bodyIsOverflowing=document.body.clientWidth<a,this.scrollbarWidth=this.measureScrollbar()},c.prototype.setScrollbar=function(){var a=parseInt(this.$body.css("padding-right")||0,10);this.originalBodyPad=document.body.style.paddingRight||"",this.bodyIsOverflowing&&this.$body.css("padding-right",a+this.scrollbarWidth)},c.prototype.resetScrollbar=function(){this.$body.css("padding-right",this.originalBodyPad)},c.prototype.measureScrollbar=function(){var a=document.createElement("div");a.className="modal-scrollbar-measure",this.$body.append(a);var b=a.offsetWidth-a.clientWidth;return this.$body[0].removeChild(a),b};var d=a.fn.modal;a.fn.modal=b,a.fn.modal.Constructor=c,a.fn.modal.noConflict=function(){return a.fn.modal=d,this},a(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(c){var d=a(this),e=d.attr("href"),f=a(d.attr("data-target")||e&&e.replace(/.*(?=#[^\s]+$)/,"")),g=f.data("bs.modal")?"toggle":a.extend({remote:!/#/.test(e)&&e},f.data(),d.data());d.is("a")&&c.preventDefault(),f.one("show.bs.modal",function(a){a.isDefaultPrevented()||f.one("hidden.bs.modal",function(){d.is(":visible")&&d.trigger("focus")})}),b.call(f,g,this)})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tooltip"),f="object"==typeof b&&b;(e||!/destroy|hide/.test(b))&&(e||d.data("bs.tooltip",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.type=null,this.options=null,this.enabled=null,this.timeout=null,this.hoverState=null,this.$element=null,this.inState=null,this.init("tooltip",a,b)};c.VERSION="3.3.5",c.TRANSITION_DURATION=150,c.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},c.prototype.init=function(b,c,d){if(this.enabled=!0,this.type=b,this.$element=a(c),this.options=this.getOptions(d),this.$viewport=this.options.viewport&&a(a.isFunction(this.options.viewport)?this.options.viewport.call(this,this.$element):this.options.viewport.selector||this.options.viewport),this.inState={click:!1,hover:!1,focus:!1},this.$element[0]instanceof document.constructor&&!this.options.selector)throw new Error("`selector` option must be specified when initializing "+this.type+" on the window.document object!");for(var e=this.options.trigger.split(" "),f=e.length;f--;){var g=e[f];if("click"==g)this.$element.on("click."+this.type,this.options.selector,a.proxy(this.toggle,this));else if("manual"!=g){var h="hover"==g?"mouseenter":"focusin",i="hover"==g?"mouseleave":"focusout";this.$element.on(h+"."+this.type,this.options.selector,a.proxy(this.enter,this)),this.$element.on(i+"."+this.type,this.options.selector,a.proxy(this.leave,this))}}this.options.selector?this._options=a.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.getOptions=function(b){return b=a.extend({},this.getDefaults(),this.$element.data(),b),b.delay&&"number"==typeof b.delay&&(b.delay={show:b.delay,hide:b.delay}),b},c.prototype.getDelegateOptions=function(){var b={},c=this.getDefaults();return this._options&&a.each(this._options,function(a,d){c[a]!=d&&(b[a]=d)}),b},c.prototype.enter=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),b instanceof a.Event&&(c.inState["focusin"==b.type?"focus":"hover"]=!0),c.tip().hasClass("in")||"in"==c.hoverState?void(c.hoverState="in"):(clearTimeout(c.timeout),c.hoverState="in",c.options.delay&&c.options.delay.show?void(c.timeout=setTimeout(function(){"in"==c.hoverState&&c.show()},c.options.delay.show)):c.show())},c.prototype.isInStateTrue=function(){for(var a in this.inState)if(this.inState[a])return!0;return!1},c.prototype.leave=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),b instanceof a.Event&&(c.inState["focusout"==b.type?"focus":"hover"]=!1),c.isInStateTrue()?void 0:(clearTimeout(c.timeout),c.hoverState="out",c.options.delay&&c.options.delay.hide?void(c.timeout=setTimeout(function(){"out"==c.hoverState&&c.hide()},c.options.delay.hide)):c.hide())},c.prototype.show=function(){var b=a.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(b);var d=a.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(b.isDefaultPrevented()||!d)return;var e=this,f=this.tip(),g=this.getUID(this.type);this.setContent(),f.attr("id",g),this.$element.attr("aria-describedby",g),this.options.animation&&f.addClass("fade");var h="function"==typeof this.options.placement?this.options.placement.call(this,f[0],this.$element[0]):this.options.placement,i=/\s?auto?\s?/i,j=i.test(h);j&&(h=h.replace(i,"")||"top"),f.detach().css({top:0,left:0,display:"block"}).addClass(h).data("bs."+this.type,this),this.options.container?f.appendTo(this.options.container):f.insertAfter(this.$element),this.$element.trigger("inserted.bs."+this.type);var k=this.getPosition(),l=f[0].offsetWidth,m=f[0].offsetHeight;if(j){var n=h,o=this.getPosition(this.$viewport);h="bottom"==h&&k.bottom+m>o.bottom?"top":"top"==h&&k.top-m<o.top?"bottom":"right"==h&&k.right+l>o.width?"left":"left"==h&&k.left-l<o.left?"right":h,f.removeClass(n).addClass(h)}var p=this.getCalculatedOffset(h,k,l,m);this.applyPlacement(p,h);var q=function(){var a=e.hoverState;e.$element.trigger("shown.bs."+e.type),e.hoverState=null,"out"==a&&e.leave(e)};a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",q).emulateTransitionEnd(c.TRANSITION_DURATION):q()}},c.prototype.applyPlacement=function(b,c){var d=this.tip(),e=d[0].offsetWidth,f=d[0].offsetHeight,g=parseInt(d.css("margin-top"),10),h=parseInt(d.css("margin-left"),10);isNaN(g)&&(g=0),isNaN(h)&&(h=0),b.top+=g,b.left+=h,a.offset.setOffset(d[0],a.extend({using:function(a){d.css({top:Math.round(a.top),left:Math.round(a.left)})}},b),0),d.addClass("in");var i=d[0].offsetWidth,j=d[0].offsetHeight;"top"==c&&j!=f&&(b.top=b.top+f-j);var k=this.getViewportAdjustedDelta(c,b,i,j);k.left?b.left+=k.left:b.top+=k.top;var l=/top|bottom/.test(c),m=l?2*k.left-e+i:2*k.top-f+j,n=l?"offsetWidth":"offsetHeight";d.offset(b),this.replaceArrow(m,d[0][n],l)},c.prototype.replaceArrow=function(a,b,c){this.arrow().css(c?"left":"top",50*(1-a/b)+"%").css(c?"top":"left","")},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle();a.find(".tooltip-inner")[this.options.html?"html":"text"](b),a.removeClass("fade in top bottom left right")},c.prototype.hide=function(b){function d(){"in"!=e.hoverState&&f.detach(),e.$element.removeAttr("aria-describedby").trigger("hidden.bs."+e.type),b&&b()}var e=this,f=a(this.$tip),g=a.Event("hide.bs."+this.type);return this.$element.trigger(g),g.isDefaultPrevented()?void 0:(f.removeClass("in"),a.support.transition&&f.hasClass("fade")?f.one("bsTransitionEnd",d).emulateTransitionEnd(c.TRANSITION_DURATION):d(),this.hoverState=null,this)},c.prototype.fixTitle=function(){var a=this.$element;(a.attr("title")||"string"!=typeof a.attr("data-original-title"))&&a.attr("data-original-title",a.attr("title")||"").attr("title","")},c.prototype.hasContent=function(){return this.getTitle()},c.prototype.getPosition=function(b){b=b||this.$element;var c=b[0],d="BODY"==c.tagName,e=c.getBoundingClientRect();null==e.width&&(e=a.extend({},e,{width:e.right-e.left,height:e.bottom-e.top}));var f=d?{top:0,left:0}:b.offset(),g={scroll:d?document.documentElement.scrollTop||document.body.scrollTop:b.scrollTop()},h=d?{width:a(window).width(),height:a(window).height()}:null;return a.extend({},e,g,h,f)},c.prototype.getCalculatedOffset=function(a,b,c,d){return"bottom"==a?{top:b.top+b.height,left:b.left+b.width/2-c/2}:"top"==a?{top:b.top-d,left:b.left+b.width/2-c/2}:"left"==a?{top:b.top+b.height/2-d/2,left:b.left-c}:{top:b.top+b.height/2-d/2,left:b.left+b.width}},c.prototype.getViewportAdjustedDelta=function(a,b,c,d){var e={top:0,left:0};if(!this.$viewport)return e;var f=this.options.viewport&&this.options.viewport.padding||0,g=this.getPosition(this.$viewport);if(/right|left/.test(a)){var h=b.top-f-g.scroll,i=b.top+f-g.scroll+d;h<g.top?e.top=g.top-h:i>g.top+g.height&&(e.top=g.top+g.height-i)}else{var j=b.left-f,k=b.left+f+c;j<g.left?e.left=g.left-j:k>g.right&&(e.left=g.left+g.width-k)}return e},c.prototype.getTitle=function(){var a,b=this.$element,c=this.options;return a=b.attr("data-original-title")||("function"==typeof c.title?c.title.call(b[0]):c.title)},c.prototype.getUID=function(a){do a+=~~(1e6*Math.random());while(document.getElementById(a));return a},c.prototype.tip=function(){if(!this.$tip&&(this.$tip=a(this.options.template),1!=this.$tip.length))throw new Error(this.type+" `template` option must consist of exactly 1 top-level element!");return this.$tip},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},c.prototype.enable=function(){this.enabled=!0},c.prototype.disable=function(){this.enabled=!1},c.prototype.toggleEnabled=function(){this.enabled=!this.enabled},c.prototype.toggle=function(b){var c=this;b&&(c=a(b.currentTarget).data("bs."+this.type),c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c))),b?(c.inState.click=!c.inState.click,c.isInStateTrue()?c.enter(c):c.leave(c)):c.tip().hasClass("in")?c.leave(c):c.enter(c)},c.prototype.destroy=function(){var a=this;clearTimeout(this.timeout),this.hide(function(){a.$element.off("."+a.type).removeData("bs."+a.type),a.$tip&&a.$tip.detach(),a.$tip=null,a.$arrow=null,a.$viewport=null})};var d=a.fn.tooltip;a.fn.tooltip=b,a.fn.tooltip.Constructor=c,a.fn.tooltip.noConflict=function(){return a.fn.tooltip=d,this}}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.popover"),f="object"==typeof b&&b;(e||!/destroy|hide/.test(b))&&(e||d.data("bs.popover",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.init("popover",a,b)};if(!a.fn.tooltip)throw new Error("Popover requires tooltip.js");c.VERSION="3.3.5",c.DEFAULTS=a.extend({},a.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),c.prototype=a.extend({},a.fn.tooltip.Constructor.prototype),c.prototype.constructor=c,c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle(),c=this.getContent();a.find(".popover-title")[this.options.html?"html":"text"](b),a.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof c?"html":"append":"text"](c),a.removeClass("fade top bottom left right in"),a.find(".popover-title").html()||a.find(".popover-title").hide()},c.prototype.hasContent=function(){return this.getTitle()||this.getContent()},c.prototype.getContent=function(){var a=this.$element,b=this.options;return a.attr("data-content")||("function"==typeof b.content?b.content.call(a[0]):b.content)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")};var d=a.fn.popover;a.fn.popover=b,a.fn.popover.Constructor=c,a.fn.popover.noConflict=function(){return a.fn.popover=d,this}}(jQuery),+function(a){"use strict";function b(c,d){this.$body=a(document.body),this.$scrollElement=a(a(c).is(document.body)?window:c),this.options=a.extend({},b.DEFAULTS,d),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",a.proxy(this.process,this)),this.refresh(),this.process()}function c(c){return this.each(function(){var d=a(this),e=d.data("bs.scrollspy"),f="object"==typeof c&&c;e||d.data("bs.scrollspy",e=new b(this,f)),"string"==typeof c&&e[c]()})}b.VERSION="3.3.5",b.DEFAULTS={offset:10},b.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},b.prototype.refresh=function(){var b=this,c="offset",d=0;this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight(),a.isWindow(this.$scrollElement[0])||(c="position",d=this.$scrollElement.scrollTop()),this.$body.find(this.selector).map(function(){var b=a(this),e=b.data("target")||b.attr("href"),f=/^#./.test(e)&&a(e);return f&&f.length&&f.is(":visible")&&[[f[c]().top+d,e]]||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){b.offsets.push(this[0]),b.targets.push(this[1])})},b.prototype.process=function(){var a,b=this.$scrollElement.scrollTop()+this.options.offset,c=this.getScrollHeight(),d=this.options.offset+c-this.$scrollElement.height(),e=this.offsets,f=this.targets,g=this.activeTarget;if(this.scrollHeight!=c&&this.refresh(),b>=d)return g!=(a=f[f.length-1])&&this.activate(a);if(g&&b<e[0])return this.activeTarget=null,this.clear();for(a=e.length;a--;)g!=f[a]&&b>=e[a]&&(void 0===e[a+1]||b<e[a+1])&&this.activate(f[a])},b.prototype.activate=function(b){this.activeTarget=b,this.clear();var c=this.selector+'[data-target="'+b+'"],'+this.selector+'[href="'+b+'"]',d=a(c).parents("li").addClass("active");d.parent(".dropdown-menu").length&&(d=d.closest("li.dropdown").addClass("active")),
d.trigger("activate.bs.scrollspy")},b.prototype.clear=function(){a(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var d=a.fn.scrollspy;a.fn.scrollspy=c,a.fn.scrollspy.Constructor=b,a.fn.scrollspy.noConflict=function(){return a.fn.scrollspy=d,this},a(window).on("load.bs.scrollspy.data-api",function(){a('[data-spy="scroll"]').each(function(){var b=a(this);c.call(b,b.data())})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tab");e||d.data("bs.tab",e=new c(this)),"string"==typeof b&&e[b]()})}var c=function(b){this.element=a(b)};c.VERSION="3.3.5",c.TRANSITION_DURATION=150,c.prototype.show=function(){var b=this.element,c=b.closest("ul:not(.dropdown-menu)"),d=b.data("target");if(d||(d=b.attr("href"),d=d&&d.replace(/.*(?=#[^\s]*$)/,"")),!b.parent("li").hasClass("active")){var e=c.find(".active:last a"),f=a.Event("hide.bs.tab",{relatedTarget:b[0]}),g=a.Event("show.bs.tab",{relatedTarget:e[0]});if(e.trigger(f),b.trigger(g),!g.isDefaultPrevented()&&!f.isDefaultPrevented()){var h=a(d);this.activate(b.closest("li"),c),this.activate(h,h.parent(),function(){e.trigger({type:"hidden.bs.tab",relatedTarget:b[0]}),b.trigger({type:"shown.bs.tab",relatedTarget:e[0]})})}}},c.prototype.activate=function(b,d,e){function f(){g.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),b.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),h?(b[0].offsetWidth,b.addClass("in")):b.removeClass("fade"),b.parent(".dropdown-menu").length&&b.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),e&&e()}var g=d.find("> .active"),h=e&&a.support.transition&&(g.length&&g.hasClass("fade")||!!d.find("> .fade").length);g.length&&h?g.one("bsTransitionEnd",f).emulateTransitionEnd(c.TRANSITION_DURATION):f(),g.removeClass("in")};var d=a.fn.tab;a.fn.tab=b,a.fn.tab.Constructor=c,a.fn.tab.noConflict=function(){return a.fn.tab=d,this};var e=function(c){c.preventDefault(),b.call(a(this),"show")};a(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',e).on("click.bs.tab.data-api",'[data-toggle="pill"]',e)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.affix"),f="object"==typeof b&&b;e||d.data("bs.affix",e=new c(this,f)),"string"==typeof b&&e[b]()})}var c=function(b,d){this.options=a.extend({},c.DEFAULTS,d),this.$target=a(this.options.target).on("scroll.bs.affix.data-api",a.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",a.proxy(this.checkPositionWithEventLoop,this)),this.$element=a(b),this.affixed=null,this.unpin=null,this.pinnedOffset=null,this.checkPosition()};c.VERSION="3.3.5",c.RESET="affix affix-top affix-bottom",c.DEFAULTS={offset:0,target:window},c.prototype.getState=function(a,b,c,d){var e=this.$target.scrollTop(),f=this.$element.offset(),g=this.$target.height();if(null!=c&&"top"==this.affixed)return c>e?"top":!1;if("bottom"==this.affixed)return null!=c?e+this.unpin<=f.top?!1:"bottom":a-d>=e+g?!1:"bottom";var h=null==this.affixed,i=h?e:f.top,j=h?g:b;return null!=c&&c>=e?"top":null!=d&&i+j>=a-d?"bottom":!1},c.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(c.RESET).addClass("affix");var a=this.$target.scrollTop(),b=this.$element.offset();return this.pinnedOffset=b.top-a},c.prototype.checkPositionWithEventLoop=function(){setTimeout(a.proxy(this.checkPosition,this),1)},c.prototype.checkPosition=function(){if(this.$element.is(":visible")){var b=this.$element.height(),d=this.options.offset,e=d.top,f=d.bottom,g=Math.max(a(document).height(),a(document.body).height());"object"!=typeof d&&(f=e=d),"function"==typeof e&&(e=d.top(this.$element)),"function"==typeof f&&(f=d.bottom(this.$element));var h=this.getState(g,b,e,f);if(this.affixed!=h){null!=this.unpin&&this.$element.css("top","");var i="affix"+(h?"-"+h:""),j=a.Event(i+".bs.affix");if(this.$element.trigger(j),j.isDefaultPrevented())return;this.affixed=h,this.unpin="bottom"==h?this.getPinnedOffset():null,this.$element.removeClass(c.RESET).addClass(i).trigger(i.replace("affix","affixed")+".bs.affix")}"bottom"==h&&this.$element.offset({top:g-b-f})}};var d=a.fn.affix;a.fn.affix=b,a.fn.affix.Constructor=c,a.fn.affix.noConflict=function(){return a.fn.affix=d,this},a(window).on("load",function(){a('[data-spy="affix"]').each(function(){var c=a(this),d=c.data();d.offset=d.offset||{},null!=d.offsetBottom&&(d.offset.bottom=d.offsetBottom),null!=d.offsetTop&&(d.offset.top=d.offsetTop),b.call(c,d)})})}(jQuery);


		var pageImages = [];
		var pageNum = 1;
/**
* Reset numbering on tab buttons
*/
function reNumberPages() {
	pageNum = 1;

	var tabCount = jQuery('#pageTab > li').length;
	jQuery('#pageTab > li').each(function() {
		var pageId = jQuery(this).children('a').attr('href');
		if (pageId == "#page1") {
			return true;
		}
		pageNum++;
		jQuery(this).children('a').html('Slide ' + pageNum +
			'<button class="close" type="button" ' +
			'title="Remove this slide">×</button>');
	});
}

jQuery(document).ready(function() {
        /**
         * Add a Tab
         */
         pageNum = jQuery('#sliderslidecount').val();
         jQuery('#btnAddPage').click(function() { 
         	pageNum++;
         	jQuery('#pageTab').append(
         		jQuery('<li class="slidepage slidepage' + pageNum + '"><a href="#page' + pageNum + '">' +
         			'Slide ' + pageNum +
         			'<button class="close" type="button" ' +
         			'title="Remove this slide">×</button>' +
         			'</a></li>'));

         	jQuery('#pageTabContent').append(
         		jQuery('<div class="tab-pane" id="page' + pageNum +
         			'"></div>'));


         	var contWidth = jQuery('#page1 .slider_preview_image').width();
         	var contHeight = jQuery('#page1 .slider_preview_image').height();

         	var slidePanel = jQuery('<div class="tab-pane wprls-slide active slide'  + pageNum + ' id="page1"><form class="form-horizontal sub-slide-options"> <div class="form-group"> <label class="col-sm-2" for="">Background Image</label> <div class="col-sm-10"> <a data-slide="'  + pageNum + '" class="btn btn-info upload_image_button">CLICK TO SET</a> <input class="media_attach_url" name="slide_bg" type="hidden" value=""> <input class="media_attach_id" name="attach_id" type="hidden" value=""> </div> </div> <div class="form-group"> <label class="col-sm-2" for="">Animation duration</label> <div class="col-sm-10"> <input type="number" class="slide_duration" name="slide_duration" value="1000"> <small class="text-muted"> (ms)</small> </div> </div> <div class="form-group"> <label class="col-sm-2" for="">Slide Animation</label> <div class="col-sm-10"> <select disabled name="custom_slide_animation" class="custom_slide_animation"> <option value="" selected="selected"> </option> <option value="fade">Fade</option> <option value="slide">Slide</option> <option value="rotate">Rotate</option> <option value="antirotate">Opposite Rotate</option> <option value="cube">CubeX</option> <option value="cubey">CubeY</option> <option value="cube3x">Cube3</option> <option value="cube3y">Bars3</option> <option value="cube5x">Cube5</option> <option value="cube5y">Bars5</option> <option value="zoom">Zoom</option> <option value="zoomout">Zoom Out</option> <option value="slicewave">Wave</option> <option value="slice">Slice</option> <option value="puzzle">Puzzle</option> <option value="assemble">Assemble</option> <option value="ripple">Ripple</option> </select><small class="text-muted">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a>.</small> </div> </div> </form><h3 id="rls_wp_slider_preview">Slide Preview</h3><div id="wp_rls_layer_canvas"><div class="slider_preview"><div class="wprlslayers wprlslayers'  + pageNum +'"' + '></div><img class="slider_preview_image" src=""></div></div><h3 id="rls_wp_layer_options">Layer Options</h3><div id="wp_rls_layer_positioning"><div id="wp_rls_panel_group" class="panel-group" ><div class="panel-group" id="accordion'  + pageNum + '"></div><button id="wp_rls_add_new_layer" class="btn btn-lg btn-primary btn-add-panel" data-slide="'  + pageNum + '" data-layercount="0"><i class="glyphicon glyphicon-plus"></i> Add new Layer</button></div></div>');

         	slidePanel.find('#wp_rls_layer_canvas').css({
         		'width': contWidth,
         		'height': contHeight
         	});

         	slidePanel.find('.wprlslayers').css({
         		'width': contWidth,
         		'height': contHeight
         	});

         	slidePanel.find('.slider_preview').css({
         		'width': contWidth,
         		'height': contHeight
         	});

         	slidePanel.find('.slider_preview_image').css({
         		'width': contWidth,
         		'height': contHeight
         	});
         	
         	jQuery("#page"+pageNum).append( slidePanel );
	

		
		jQuery(".wp_rls_container").append(jQuery('#wp_rls_slides_settings .submit'));

		
		jQuery('.slidepage' + pageNum).find('a').click();


});

/**
* Remove a Tab
*/
jQuery('#pageTab').on('click', ' li a .close', function() {
	var tabId = jQuery(this).parents('li').children('a').attr('href');
	
	if ( confirm( 'Are you sure you want to remove this slide ? Page will reload to complete remove action.' ) ) {
		jQuery(this).parents('li').remove('li');
		jQuery(tabId).remove();
		reNumberPages();
		jQuery('#pageTab a:first').tab('show');
		jQuery('#submit-slides').click();
	}
});

/**
 * Click Tab to show its content 
 */
 jQuery("#pageTab").on("click", "a", function(e) {
 	e.preventDefault();
 	jQuery(this).tab('show');
 });

});


function sliderTab(){
	document.getElementById("wp_rls_slides_settings").style.display="none";
	document.getElementById("wp_rls_slider_settings").style.display="block";
	jQuery('#wp_rls_slides_settings').removeClass('active');
	jQuery('#wp_rls_slider_settings').addClass('active');
	jQuery('#sliderTab').addClass('active');
	jQuery('#slidesTab').removeClass('active');
	jQuery('#rls_slider_name').prop('disabled',false);

}  
function slidesTab(){
	document.getElementById("wp_rls_slider_settings").style.display="none";
	document.getElementById("wp_rls_slides_settings").style.display="block";
	jQuery('#wp_rls_slider_settings').removeClass('active');
	jQuery('#wp_rls_slides_settings').addClass('active');
	jQuery('#slidesTab').addClass('active');
	jQuery('#sliderTab').removeClass('active');
	jQuery('#rls_slider_name').prop('disabled','disabled');
}
var hash = 1;

jQuery(document).ready(function($) {

var $template = $($.parseHTML('<div class="panel panel-default"><div class="panel-heading"> <span class="glyphicon glyphicon-remove-circle pull-right "></span><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">Layer 1</a></h4></div><div id="collapseOne1" class="panel-collapse collapse in"><div class="panel-body"><textarea style="display: none" class="wprls_textcontent">Empty Text</textarea><textarea style="display: none" class="wprls_htmlcontent">Empty HTML</textarea><input style="display: none" class="wprls_linkurl" value=""><input style="display: none" class="wprls_textalign" value="left"><input style="display: none" class="wprls_textgooglefont" value=""><input style="display: none" class="wprls_linktext" value=""><input style="display: none" class="wprls_linkbeforetext" value=""><input style="display: none" class="wprls_linkaftertext" value=""><input style="display: none" class="wprls_linkcolor" value="#337ab7"><input style="display: none" class="wprls_imageurl" value=""><input style="display: none" class="wprls_videourl" value=""><input style="display: none" class="wprls_videoposterurl" value=""><select style="display: none" class="wprls_videotype"><option selected="selected" value="youtube">Youtube</option><option value="vimeo">Vimeo</option><option value="html5">HTML5</option><option value="videojs">Video.js</option><option value="sublimevideo">SublimeVideo</option><option value="jw">JW Player</option></select><input type="button" id="wp_rls_layer_text" class="button triggertextmodal" value="Text" data-toggle="modal" data-target="#wp_rls_text_box" /><input type="button" id="wp_rls_layer_image" class="button triggerimagemodal" value="Image" data-toggle="modal" data-target="#wp_rls_image_box"/><input type="button" data-toggle="modal" data-target="#wp_rls_video_box" id="wp_rls_layer_video" class="button triggervideomodal" value="Video" /><input type="button" id="wp_rls_layer_link" class="button triggerlinkmodal" value="Links" data-toggle="modal" data-target="#wp_rls_link_box" /><input type="button" id="wp_rls_layer_html" class="button triggerhtmlmodal" value="HTML" data-toggle="modal" data-target="#wp_rls_html_box" /><table id="wp_rls_layers_table"><tr><td>Type</td><td><select class="input input--dropdown wp_rls_layer_box_type inputlayertype"> <option value="text">Text</option> <option value="image">Image</option> <option value="video">Video</option> <option value="link">Link</option><option value="html">HTML</option></select></td><td></td><td></td><td></td></tr><tr><td>Layer Animation</td><td> <select class="input input--dropdown js--animations wp_rls_layer_box_animation inputlayeranimation"> <optgroup label="Attention Seekers"> <option value="bounce">bounce</option> <option value="flash">flash</option> <option value="pulse">pulse</option> <option value="rubberBand">rubberBand</option> <option value="shake">shake</option> <option value="swing">swing</option> <option value="tada">tada</option> <option value="wobble">wobble</option> <option value="jello">jello</option> </optgroup> <optgroup label="Bouncing Entrances"> <option value="bounceIn">bounceIn</option> <option value="bounceInDown">bounceInDown</option> <option value="bounceInLeft">bounceInLeft</option> <option value="bounceInRight">bounceInRight</option> <option value="bounceInUp">bounceInUp</option> </optgroup> <optgroup label="Fading Entrances"> <option value="fadeIn">fadeIn</option> <option value="fadeInDown">fadeInDown</option> <option value="fadeInDownBig">fadeInDownBig</option> <option value="fadeInLeft">fadeInLeft</option> <option value="fadeInLeftBig">fadeInLeftBig</option> <option value="fadeInRight">fadeInRight</option> <option value="fadeInRightBig">fadeInRightBig</option> <option value="fadeInUp">fadeInUp</option> <option value="fadeInUpBig">fadeInUpBig</option> </optgroup> <optgroup label="Flippers"> <option value="flip">flip</option> <option value="flipInX">flipInX</option> <option value="flipInY">flipInY</option> <option value="flipOutX">flipOutX</option> <option value="flipOutY">flipOutY</option> </optgroup> <optgroup label="Lightspeed"> <option value="lightSpeedIn">lightSpeedIn</option> </optgroup> <optgroup label="Rotating Entrances"> <option value="rotateIn">rotateIn</option> <option value="rotateInDownLeft">rotateInDownLeft</option> <option value="rotateInDownRight">rotateInDownRight</option> <option value="rotateInUpLeft">rotateInUpLeft</option> <option value="rotateInUpRight">rotateInUpRight</option> </optgroup> <optgroup label="Sliding Entrances"> <option value="slideInUp">slideInUp</option> <option value="slideInDown">slideInDown</option> <option value="slideInLeft">slideInLeft</option> <option value="slideInRight">slideInRight</option> </optgroup> <optgroup label="Zoom Entrances"> <option value="zoomIn">zoomIn</option> <option value="zoomInDown">zoomInDown</option> <option value="zoomInLeft">zoomInLeft</option> <option value="zoomInRight">zoomInRight</option> <option value="zoomInUp">zoomInUp</option> </optgroup> <optgroup label="Specials"> <option value="hinge">hinge</option> <option value="rollIn">rollIn</option> </optgroup> </select></td><td></td><td></td><td></td></tr><tr><td>Layer Animation Delay</td><td> <input value="1000" id="wp_rls_layer_animation_delay" type="number" placeholder="ms" class="wp_rls_layer_box_animation_delay inputlayerdelay"> (ms)</td><td></td><td></td><td></td></tr><tr><td>Hide Layer</td><td> <div class="onoffswitch"> <input type="checkbox" name="hideme" class="onoffswitch-checkbox wprls_hide_me" id="" /> <label class="wprls_hide_me_label onoffswitch-label" for=""> <span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span> </label> </div> <td> With <select class="input input--dropdown js--animations wp_rls_hide_layer_box_animation inputhidelayeranimation"> <optgroup label="Bouncing Exits"> <option value="bounceOut">bounceOut</option> <option value="bounceOutDown">bounceOutDown</option> <option value="bounceOutLeft">bounceOutLeft</option> <option value="bounceOutRight">bounceOutRight</option> <option value="bounceOutUp">bounceOutUp</option> </optgroup> <optgroup label="Fading Exits"> <option selected value="fadeOut">fadeOut</option> <option value="fadeOutDown">fadeOutDown</option> <option value="fadeOutLeft">fadeOutLeft</option> <option value="fadeOutRight">fadeOutRight</option> <option value="fadeOutUp">fadeOutUp</option> </optgroup> <optgroup label="Rotating Exits"> <option value="rotateOut">rotateOut</option> <option value="rotateOutDownLeft">rotateOutDownLeft</option> <option value="rotateOutDownRight">rotateOutDownRight</option> <option value="rotateOutUpLeft">rotateOutUpLeft</option> <option value="rotateOutUpRight">rotateOutUpRight</option> </optgroup> <optgroup label="Zoom Exits"> <option value="zoomOut">zoomOut</option> <option value="zoomOutDown">zoomOutDown</option> <option value="zoomOutLeft">zoomOutLeft</option> <option value="zoomOutRight">zoomOutRight</option> <option value="zoomOutUp">zoomOutUp</option> </optgroup> <optgroup label="Sliding Exits"> <option value="slideOutUp">slideOutUp</option> <option value="slideOutDown">slideOutDown</option> <option value="slideOutLeft">slideOutLeft</option> <option value="slideOutRight">slideOutRight</option> </optgroup> </select> </td> <td> After <input value="2000" id="wp_rls_hide_layer_animation_delay" type="number" placeholder="ms" class="wp_rls_hide_layer_box_animation_delay inputhidelayerdelay" data-layerid="" />(ms) </td> <td></td> </tr><td>Size & Position:</td><td>Width <input id="wp_rls_layer_image_size_width" type="number" min="0" placeholder="%" class="wp_rls_layer_box_width inputlayerwidth" value="30" /> (%)</td><td>Height <input id="wp_rls_layer_image_size_height" type="text" value="auto" placeholder="px" class="wp_rls_layer_box_width wp_rls_layer_box_height inputlayerheight"/> (px)</td><td>Top <input id="wp_rls_layer_top_position" class="wp_rls_layer_box_width wp_rls_layer_box_top inputlayertop" type="number" min="0" value="0" placeholder="px"/></td><td>Left <input id="wp_rls_layer_left_position" value="0" type="number" min="0" placeholder="px" class="wp_rls_layer_box_left wp_rls_layer_box_width inputlayerleft"/></td></tr><tr><td>Text size</td><td><input id="wp_rls_layer_text_size" type="number" min="0" class="wp_rls_layer_box_width wp_rls_layer_box_text_size inputlayertextsize" placeholder="px" value="15" /></td><td></td><td></td><td></td></tr><tr><td>Image size: </td><td>Width <input id="wp_rls_layer_image_size_width" type="number" min="0" class="wp_rls_layer_box_width wp_rls_layer_box_image_width inputlayerimgwidth" placeholder="%" /> (%) </td><td>Height <input id="wp_rls_layer_image_size_height" type="text" class="wp_rls_layer_box_width wp_rls_layer_box_image_height inputlayerimgheight" placeholder="px" value="auto" /> (px) </td><td></td><td></td></tr><tr><td>Text color:</td><td><input id="wp_rls_layer_text_color" value="#000000" type="text" class="wp_rls_layer_box_width text-color-picker wp_rls_layer_box_text_color inputlayertextcolor"/></td><td></td><td></td><td></td></tr><tr><td>Background color:</td><td><input value="#ffffff" id="wp_rls_layer_bg_color" type="text" class="wp_rls_layer_box_width wp_rls_layer_box_bg_color alpha-color-picker inputlayerbgcolor"></td><td></td><td></td><td></td></tr></table></div></div></div>'));

$('.layercontentcont').live('dblclick', function() {

	var layerid = $(this).data('layerid');
	
	var slideid = $(this).data('slideid');

	var layercounter = 1;

	
	$("#accordion"+slideid+' .panel').each(function ( index) {
		$(this).find(".panel-collapse").removeClass("in");
	});
	


	$('#collapseOne'+layerid).collapse('toggle');

	 $('html, body').animate({
        scrollTop: $('#collapseOne'+layerid).offset().top
    }, 500);
	


});

$(".btn-add-panel").live("click", function () {
	
	var slideid = $(this).data('slide');
	
	var layercount = $(this).data('layercount');
	
	var $newPanel = $template.clone();
	

	$newPanel.find(".accordion-toggle").attr('data-parent', "#accordion"+slideid);
	
	$("#accordion"+slideid+' .panel').each(function ( index) {
		$(this).find(".panel-collapse").removeClass("in");
	});
	
	
	$newPanel.find(".accordion-toggle").attr("href", "#collapseOne" + slideid + (++layercount))
	.text("Layer " + layercount);
	
	
	$newPanel.find(".panel-collapse").prop( 'id', 'collapseOne' + slideid + (layercount) );
	
	$newPanel.find('.wprls_textcontent').addClass("wprlstcontent"+slideid +''+ (layercount));
	$newPanel.find('.wprls_textalign').addClass("wprlstextalign"+slideid +''+ (layercount));
  $newPanel.find('.wprls_textgooglefont').addClass("wprlstextgooglefont"+slideid +''+ (layercount));

  $newPanel.find('.wprls_htmlcontent').addClass("wprlshcontent"+slideid +''+ (layercount));
	
	$newPanel.find('.triggertextmodal').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.triggerlinkmodal').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.triggerimagemodal').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.triggervideomodal').attr('data-layerid', slideid +''+ (layercount));
  $newPanel.find('.triggerhtmlmodal').attr('data-layerid', slideid +''+ (layercount));

	//Add classes and data-layerid to input fields
	//->Adding layerid
	$newPanel.find('.inputlayerwidth').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.inputlayerheight').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.inputlayertop').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.inputlayerleft').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.inputlayertextsize').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.inputlayerimgwidth').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.inputlayerimgheight').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.inputlayertextcolor').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.inputlayerbgcolor').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.inputlayertype').attr('data-layerid', slideid +''+ (layercount));

	$newPanel.find('.wprls_linkurl').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.wprls_linktext').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.wprls_linkbeforetext').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.wprls_linkaftertext').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.wprls_linkcolor').attr('data-layerid', slideid +''+ (layercount));

	$newPanel.find('.wprls_imageurl').attr('data-layerid', slideid +''+ (layercount));

	$newPanel.find('.wprls_videourl').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.wprls_videoposterurl').attr('data-layerid', slideid +''+ (layercount));
	$newPanel.find('.wprls_videotype').attr('data-layerid', slideid +''+ (layercount));

	//->Adding classes
	$newPanel.find('.inputlayerwidth').addClass('inputlayerwidth'+slideid +''+ (layercount));
	$newPanel.find('.inputlayerheight').addClass('inputlayerheight'+slideid +''+ (layercount));
	$newPanel.find('.inputlayertop').addClass('inputlayertop'+slideid +''+ (layercount));
	$newPanel.find('.inputlayerleft').addClass('inputlayerleft'+slideid +''+ (layercount));
	$newPanel.find('.inputlayerimgwidth').addClass('inputlayerimgwidth'+slideid +''+ (layercount));
	$newPanel.find('.inputlayerimgheight').addClass('inputlayerimgheight'+slideid +''+ (layercount));
	$newPanel.find('.inputlayertextcolor').addClass('inputlayertextcolor'+slideid +''+ (layercount));
	$newPanel.find('.inputlayertextsize').addClass('inputlayertextsize'+slideid +''+ (layercount));
	$newPanel.find('.inputlayerbgcolor').addClass('inputlayerbgcolor'+slideid +''+ (layercount));

	$newPanel.find('.inputlayertype').addClass('inputlayertype'+slideid +''+ (layercount));

	$newPanel.find('.wprls_linkurl').addClass('wprlslinkurl'+slideid +''+ (layercount));
	$newPanel.find('.wprls_linktext').addClass('wprlslinktext'+slideid +''+ (layercount));
	$newPanel.find('.wprls_linkbeforetext').addClass('wprlslinkbeforetext'+slideid +''+ (layercount));
	$newPanel.find('.wprls_linkaftertext').addClass('wprlslinkaftertext'+slideid +''+ (layercount));
	$newPanel.find('.wprls_linkcolor').addClass('wprlslinkcolor'+slideid +''+ (layercount));

	$newPanel.find('.wprls_imageurl').addClass('wprlsimageurl'+slideid +''+ (layercount));

	$newPanel.find('.wprls_videourl').addClass('wprlsvideourl'+slideid +''+ (layercount));
	$newPanel.find('.wprls_videoposterurl').addClass('wprlsvideoposterurl'+slideid +''+ (layercount));
	$newPanel.find('.wprls_videotype').addClass('wprlsvideotype'+slideid +''+ (layercount));

  $newPanel.find('.wprls_hide_me').attr('id','layerhideme'+slideid +''+ (layercount));

  $newPanel.find('.wprls_hide_me_label').attr('for','layerhideme'+slideid +''+ (layercount));

	

	$("#accordion"+slideid).append($newPanel.fadeIn());

	layercontent = $("<div data-slideid='"+slideid +"' data-layerid='"+slideid +''+ (layercount)+"' class='wprlslayercontent parentlayercontent"+slideid +''+ (layercount)+"'><div data-slideid='"+slideid +"' data-layerid='"+slideid +''+ (layercount)+"' class='layercontentcont layercontent"+slideid +''+ (layercount)+"'><span class='wprlslayertext'>Empty Text</span></div></div>");

	$('.wprlslayers').css({
		'width': $('.slider_preview').css('width'),
		'height': $('.slider_preview').css('height')
	});

	$('.wprlslayers' + slideid ).append(layercontent);
	
	$("#"+layercount+" input[type=text]").val('');
	
	$(this).data('layercount', layercount);

	WprlsBuildDraggable();
	WprlsBuildColorabble();
  WprlsBuildResize();

});
});





jQuery(document).on('click', '.glyphicon-remove-circle', function () {

	if ( confirm( 'Are you sure you want to remove this layer ? Page will reload to complete remove action.' ) ) {

			jQuery(this).parents('.panel').get(0).remove();
	
			--hash;

			jQuery('#submit-slides').click();
		
	}
	
	
});


jQuery(document).ready(function($) {

  
  //HTML Modal

  $( '.triggerhtmlmodal' ).live('click', function() {

    var layerid = $(this).data('layerid');

    content = $( '.wprlshcontent'+layerid ).val();

    var editor = tinymce.editors.wprlshtmlcontent;

    if ( editor )
      tinymce.editors.wprlshtmlcontent.setContent(content);
    else
      $('#wprlshtmlcontent').val(content);

    wprlsslider.modalhtmllayerid = layerid;

  });

  $( '#modalbtn-html' ).click(function() {

    var content = '';

    var editor = tinymce.editors.wprlshtmlcontent;

    if ( editor )
      content = tinymce.editors.wprlshtmlcontent.getContent();
    else
      content = $('#wprlshtmlcontent').val();

    var layerid = wprlsslider.modalhtmllayerid;

    if ( layerid === false ) return;

    $( '.wprlshcontent'+layerid ).val(content);

    content = '<div class="layercontenthtml">'+ content +'</div>';

    $( '.layercontent'+layerid).html( content );

    
    $( '.inputlayertype'+layerid ).val('html');

    $('.close', $('#wp_rls_html_box')).delay(100).click();

    $('html, body').animate({
          scrollTop: $( '.layercontent'+layerid).offset().top-50
      }, 200);

  });

  $('#wp_rls_html_box').on('hidden.bs.modal', function (e) {

    tinymce.editors.wprlshtmlcontent.setContent('');

    wprlsslider.modalhtmllayerid = false;
      
  });

  //Text Modal

	$( '.triggertextmodal' ).live('click', function() {

		var layerid = $(this).data('layerid');

		var content = $( '.wprlstcontent'+layerid ).val();
		var align = $('.wprlstextalign'+layerid).val();
    var googlefont = $('.wprlsgooglefont'+layerid).val();

		tinymce.editors.wprlstextcontent.setContent(content);
		$('#textalign').val(align);
    $('#googlefonts').val(googlefont);

		wprlsslider.modaltextlayerid = layerid;

	});

	$( '#modalbtn-text' ).click(function() {

		var content = tinymce.editors.wprlstextcontent.getContent({format: 'text'});

		var layerid = wprlsslider.modaltextlayerid;

		if ( layerid === false ) return;

		var align = $('#textalign').val();

    var googlefont = $('#googlefonts').val();

		$( '.wprlstextalign'+layerid ).val(align);

    $( '.wprlstextgooglefont'+layerid ).val(googlefont);

		$( '.wprlstcontent'+layerid ).val(content);

		//$( '.layercontent'+layerid).html('<span class="wprlslayertext">'+content+'</span>');
    
    $( '.layercontent'+layerid+' span.wprlslayertext' ).text(content);
    if ( googlefont == '' ) {

      $( '.layercontent'+layerid+' span.wprlslayertext' ).css( 'font-family', 'inherit' );      

    } else {

      var _googlefont = googlefont.split('+').join(' ');
      
      $( '.layercontent'+layerid+' span.wprlslayertext' ).css({
        'font-family': "'" + _googlefont + "'" 
      });

    }

		if ( align == 'left' ) {
			$( '.layercontent'+layerid+' span.wprlslayertext' ).removeClass('wprlslayertextcenter');
			$( '.layercontent'+layerid+' span.wprlslayertext' ).removeClass('wprlslayertextright');
			$( '.layercontent'+layerid+' span.wprlslayertext' ).addClass('wprlslayertextleft');
		}
		if ( align == 'center' ) {
			$( '.layercontent'+layerid+' span.wprlslayertext' ).addClass('wprlslayertextcenter');
			$( '.layercontent'+layerid+' span.wprlslayertext' ).removeClass('wprlslayertextright');
			$( '.layercontent'+layerid+' span.wprlslayertext' ).removeClass('wprlslayertextleft');
		}
		if ( align == 'right' ) {
			$( '.layercontent'+layerid+' span.wprlslayertext' ).addClass('wprlslayertextright');
			$( '.layercontent'+layerid+' span.wprlslayertext' ).removeClass('wprlslayertextleft');
			$( '.layercontent'+layerid+' span.wprlslayertext' ).removeClass('wprlslayertextcenter');
		}


    $( '.inputlayertype'+layerid ).val('text');

		$('.close', $('#wp_rls_text_box')).delay(100).click();

		$('html, body').animate({
        	scrollTop: $( '.layercontent'+layerid).offset().top-50
    	}, 200);

	});

	$('#wp_rls_text_box').on('hidden.bs.modal', function (e) {

		tinymce.editors.wprlstextcontent.setContent('');
		$('#textalign').val('');
    $('#googlefonts').val('');

		wprlsslider.modaltextlayerid = false;


  		
	});

	//Link Module Manager
	$( '.triggerlinkmodal' ).live('click', function() {

		var layerid = $(this).data('layerid');

		var linkurl = $( '.wprlslinkurl'+layerid ).val();

		var linktext = $( '.wprlslinktext'+layerid ).val();

		var linkbeforetext = $( '.wprlslinkbeforetext'+layerid ).val();

		var linkaftertext = $( '.wprlslinkaftertext'+layerid ).val();

		var linkcolor = $( '.wprlslinkcolor'+layerid ).val();

		var modal = $('#wp_rls_link_box');

		$('.wprlslayerlinkurl', modal).val(linkurl);

		$('.wprlslayerlinktext', modal).val(linktext);

		$('.wprlslayerlinkbeforetext', modal).val(linkbeforetext);

		$('.wprlslayerlinkaftertext', modal).val(linkaftertext);

		$('.wprlslayerlinkcolor', modal).val(linkcolor);

		wprlsslider.modallinklayerid = layerid;

	});

	$( '#modalbtn-link' ).click(function() {

		var layerid = wprlsslider.modallinklayerid;

		if ( layerid === false ) return;

		var modal = $('#wp_rls_link_box');

		var linkurl = $('.wprlslayerlinkurl', modal).val();

		var linktext = $('.wprlslayerlinktext', modal).val();

		var linkbeforetext = $('.wprlslayerlinkbeforetext', modal).val();

		var linkaftertext = $('.wprlslayerlinkaftertext', modal).val();

		var linkcolor = $('.wprlslayerlinkcolor', modal).val();

		$( '.wprlslinkurl'+layerid ).val( linkurl );

		$( '.wprlslinktext'+layerid ).val( linktext );

		$( '.wprlslinkbeforetext'+layerid ).val( linkbeforetext );

		$( '.wprlslinkaftertext'+layerid ).val( linkaftertext );

		$( '.wprlslinkcolor'+layerid ).val( linkcolor );

		var link = '<a class="layercontentlink" target="_blank" href="'+linkurl+'" style="color:'+ linkcolor +'">'+ linktext +'</a>';

		link = linkbeforetext+' '+link+ ' '+linkaftertext;

		$( '.layercontent'+layerid ).html(link);

    $( '.inputlayertype'+layerid ).val('link');

		$('.close', $('#wp_rls_link_box')).delay(100).click();

    $('html, body').animate({
          scrollTop: $( '.layercontent'+layerid).offset().top-50
      }, 200);

	});

	$('#wp_rls_link_box').on('hidden.bs.modal', function (e) {

		var modal = $('#wp_rls_link_box');

		$('.wprlslayerlinkurl', modal).val('');

		$('.wprlslayerlinktext', modal).val('');

		$('.wprlslayerlinkbeforetext', modal).val('');

		$('.wprlslayerlinkaftertext', modal).val('');

		$('.wprlslayerlinkcolor', modal).val('');

		wprlsslider.modallinklayerid = false;
  		
	});

	//Image Modal

	$( '.triggerimagemodal' ).live('click', function() {

		var layerid = $(this).data('layerid');

		var image_url = $( '.wprlsimageurl'+layerid ).val();

		var modal = $('#wp_rls_image_box');

		$('.image_attach_url', modal).val(image_url);

		$('.image_modal_preview', modal).attr('src', image_url);

		wprlsslider.modalimagelayerid = layerid;

	});

	$( '#modalbtn-image' ).click(function() {

		var layerid = wprlsslider.modalimagelayerid;

		if ( layerid === false ) return;
 	
 		var modal = $('#wp_rls_image_box');

		var image_url = $('.image_attach_url', modal).val();

		$( '.wprlsimageurl'+layerid ).val( image_url );

		var image = '<img class="layercontenttypeimage" src="'+ image_url +'"/>';

		$( '.layercontent'+layerid ).html(image);

    $( '.inputlayertype'+layerid ).val('image');

		$('.close', $('#wp_rls_image_box')).delay(100).click();

    $('html, body').animate({
          scrollTop: $( '.layercontent'+layerid).offset().top-50
      }, 200);

	});

	$('#wp_rls_image_box').on('hidden.bs.modal', function (e) {

		modal = $('#wp_rls_image_box');

		$('.image_attach_url', modal).val('');

		$('.image_modal_preview', modal).attr('src', '');
		

		wprlsslider.modalimagelayerid = false;
  		
	});

	//Video Modal

	$( '.triggervideomodal' ).live('click', function() {

		var layerid = $(this).data('layerid');

		var video_url = $( '.wprlsvideourl'+layerid ).val();

		var video_poster_url = $( '.wprlsvideoposterurl'+layerid ).val();

		var video_type = $( '.wprlsvideotype'+layerid ).val();

		if ( video_poster_url === '' ) {
			video_poster_url = wprlsslider.videoposterimageurl;
		}

		var modal = $('#wp_rls_video_box');

		$('.wprlslayervideourl', modal).val( video_url );

		$('.wprlslayervideoposterurl', modal).val( video_poster_url );

		$('.wprlslayervideotype', modal).val( video_type );

		wprlsslider.modalvideolayerid = layerid;

	});

	$( '#modalbtn-video' ).click(function() {

		var layerid = wprlsslider.modalvideolayerid;

		if ( layerid === false ) return;
 	
 		var modal = $('#wp_rls_video_box');

		var video_url = $('.wprlslayervideourl', modal).val();

		var video_poster_url = $('.wprlslayervideoposterurl', modal).val();

		var video_type = $('.wprlslayervideotype', modal).val();

		$( '.wprlsvideourl'+layerid ).val( video_url );

		$( '.wprlsvideoposterurl'+layerid ).val( video_poster_url );

		$( '.wprlsvideotype'+layerid ).val( video_type );


		if ( video_poster_url == '' ) {
			video_poster_url = wprlsslider.videoposterimageurl;
			$( '.wprlsvideoposterurl'+layerid ).val( video_poster_url );
		}

		var poster_image = '<img class="layercontenttypevideo" src="'+ video_poster_url +'"/>';

		$( '.layercontent'+layerid ).html(poster_image);

    $( '.inputlayertype'+layerid ).val('video');

		$('.close', $('#wp_rls_video_box')).delay(100).click();

    $('html, body').animate({
          scrollTop: $( '.layercontent'+layerid).offset().top-50
      }, 200);

	});

	$('#wp_rls_video_box').on('hidden.bs.modal', function (e) {

		var modal = $('#wp_rls_video_box');

		$('.wprlslayervideourl', modal).val('');

		$('.wprlslayervideoposterurl', modal).val('');

		$('.wprlslayervideotype', modal).val('youtube');
		

		wprlsslider.modalvideolayerid = false;
  		
	});

	jQuery('#submit-slides').click( function() {

		var slides = {};
		
		var layers = {};

		$( '.wprls-slide' ).each( function( index)  {

			var sindex = index;

			var bgimage = $( '.media_attach_url', this ).val();

			var slideduration = $( '.slide_duration', this ).val();

			var slide_animation = $( '.custom_slide_animation', this ).val();

      var attach_id = $( '.media_attach_id', this ).val();

      
			
			$( '.panel', '#accordion'+(sindex+1) ).each( function( index ) {

				var width =  $( '.wp_rls_layer_box_width', this ).val();

				var height =  $( '.wp_rls_layer_box_height', this ).val();

				var directiontop =  $( '.wp_rls_layer_box_top', this ).val();

				var left =  $( '.wp_rls_layer_box_left', this ).val();

				var text_size =  $( '.wp_rls_layer_box_text_size', this ).val();

				var text_color =  $( '.wp_rls_layer_box_text_color', this ).val();

				var bg_color =  $( '.wp_rls_layer_box_bg_color', this ).val();

				var text_content = $( '.wprls_textcontent', this ).val();

        var html_content = $( '.wprls_htmlcontent', this ).val();

				var image_width =  $( '.wp_rls_layer_box_image_width', this ).val();

				var image_height =  $( '.wp_rls_layer_box_image_height', this ).val();

				var animation_delay = $( '.wp_rls_layer_box_animation_delay', this ).val();

				var animation_name = $( '.wp_rls_layer_box_animation', this ).val();

				var layertype = $('.wp_rls_layer_box_type', this).val();

				var link_url = $( '.wprls_linkurl', this ).val();

				var link_text = $( '.wprls_linktext', this ).val();

				var link_before_text = $( '.wprls_linkbeforetext', this ).val();

				var link_after_text = $( '.wprls_linkaftertext', this ).val();

				var link_color = $( '.wprls_linkcolor', this ).val();

				var image_url = $( '.wprls_imageurl', this ).val();

				var video_url = $( '.wprls_videourl', this ).val();

				var video_poster_url = $( '.wprls_videoposterurl', this ).val();

				var video_type = $( '.wprls_videotype', this ).val();

				var text_align = $( '.wprls_textalign', this ).val();

        var text_googlefont = $( '.wprls_textgooglefont', this ).val();

        var hide_animation = $( '.wp_rls_hide_layer_box_animation', this ).val();

        var hide_animation_delay = $( '.wp_rls_hide_layer_box_animation_delay', this ).val();

        if ( $( '.wprls_hide_me', this ).is(":checked") )
          var hide_me = true;
        else
          hide_me = false;


				layers[index] = {
					type: layertype,
					width: width,
					height: height,
					top: directiontop,
					left: left,
					tsize: text_size,
					tcolor: text_color,
					imgwidth: image_width,
					imgheight: image_height,
					tcontent: text_content,
          hcontent: html_content,
					bgcolor: bg_color,
					animationdelay: animation_delay,
					animation: animation_name,
					linkurl: link_url,
					linktext: link_text,
					linkbeforetext: link_before_text,
					linkaftertext: link_after_text,
					linkcolor: link_color,
					imageurl: image_url,
					videourl: video_url,
					videoposterurl: video_poster_url,
					videotype: video_type,
					textalign: text_align,
          hideme: hide_me,
          hideme_animation: hide_animation,
          hideme_after: hide_animation_delay,
          googlefont: text_googlefont
					
				}


				slides[sindex] = new Object();

				slides[sindex].layers = layers;

				slides[sindex].bgimage = bgimage;

				slides[sindex].slideduration = slideduration;

				slides[sindex].animation = slide_animation;

        slides[sindex].attachid = attach_id;				

			}); //End layers loop 
			
			if ( jQuery.isEmptyObject( slides[sindex] ) ) {

				slides[sindex] = new Object();

				slides[sindex].layers = {};

				slides[sindex].bgimage = bgimage;

				slides[sindex].slideduration = slideduration;

				slides[sindex].animation = slide_animation;

        slides[sindex].attachid = attach_id;	

			}
				
			layers = {};
		}); // End panel loop

		jsonstr = JSON.stringify(slides);

		postid = $('#slideridvalue').val();

		$.ajax({
	        type: 'POST',
	        url: wprlsslider.ajaxurl+'?action=wprlsajaxsave',
	        data: {json: jsonstr, postid: postid},
	        success: function(response) {
	        	 url = window.location.href.replace('#','');
	        	 url = url + '&tab=slides&msg=1';
	             window.location = url;
	        }
    	});


		

	});

});





 // Uploading files
  var file_frame;

   jQuery('.upload_image_button').live('click', function( event ){

    event.preventDefault();

    var slide = '.slide' + jQuery(this).data('slide');

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      
      // We set multiple to false so only get one image from the uploader
      attachment = file_frame.state().get('selection').first().toJSON();
      jQuery( '.media_attach_url', slide ).val( attachment.url );
      jQuery( '.media_attach_id', slide ).val( attachment.id );

      jQuery( '.slider_preview_image', slide ).attr( 'src', attachment.url );
      
     
    });

    // Finally, open the modal
    file_frame.open();
  });

   jQuery('.upload_image_modal').live('click', function( event ){

    event.preventDefault();

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      
      // We set multiple to false so only get one image from the uploader
      attachment = file_frame.state().get('selection').first().toJSON();

      jQuery( '.image_attach_url' ).val( attachment.url );

      jQuery( '.image_modal_preview').attr( 'src', attachment.url );

    });

    // Finally, open the modal
    file_frame.open();
  });


jQuery(document).ready(function($) {


	$('#wp_rls_text_box').on('hidden.bs.modal', function (e) {
	});

	$('.inputlayerwidth').live('change', function() {

		layerid = $(this).data('layerid');

		layercontentpreview = '.layercontent'+layerid;
		
		$(layercontentpreview).css( 'width', $(this).val() + '%' );

		//$(layercontentpreview+' img').css( 'width', $(this).val() + '%' );

	});

	$('.inputlayerheight').live('change', function() {

		layerid = $(this).data('layerid');

		layercontentpreview = '.layercontent'+layerid;

		if ( $(this).val() === 'auto' ) {

			$(layercontentpreview).css( 'height', $(this).val() );

			$(layercontentpreview+' img').css( 'height', $(this).val() );

		}
		else{

			$(layercontentpreview).css( 'height', $(this).val() + 'px' );

			$(layercontentpreview+' img').css( 'height', $(this).val() + 'px' );

		}

		
		


	});

	$('.inputlayertop').live('change', function() {

		layerid = $(this).data('layerid');

		layercontentpreview = '.parentlayercontent'+layerid;
		
		$(layercontentpreview).css( 'top', $(this).val() + 'px' );


	});

	$('.inputlayerleft').live('change', function() {

		layerid = $(this).data('layerid');

		layercontentpreview = '.parentlayercontent'+layerid;
		
		$(layercontentpreview).css( 'left', $(this).val() + 'px' );


	});

	$('.inputlayertextsize').live('change', function() {

		layerid = $(this).data('layerid');

		layercontentpreview = '.layercontent'+layerid;
		
		$(layercontentpreview).css( 'font-size', $(this).val() + 'px' );


	});


	$('.inputlayertextcolor').live('change', function() {
		
		layerid = $(this).data('layerid');

		layercontentpreview = '.layercontent'+layerid;
		
		$(layercontentpreview).css( 'color', $(this).val() );


	});

	$('.inputlayerbgcolor').live('change', function() {
		
		layerid = $(this).data('layerid');

		layercontentpreview = '.layercontent'+layerid;
		
		$(layercontentpreview).css( 'background-color', $(this).val() );


	});


	$.ui.plugin.add("draggable", "smartguides", {
	start: function(event, ui) {
		var i = $(this).data("ui-draggable"), o = i.options;
		i.elements = [];
		$(o.smartguides.constructor != String ? ( o.smartguides.items || ':data(ui-draggable)' ) : o.smartguides).each(function() {
			var $t = $(this); var $o = $t.offset();
			if(this != i.element[0]) i.elements.push({
				item: this,
				width: $t.outerWidth(), height: $t.outerHeight(),
				top: $o.top, left: $o.left
			});

			
		});
	},
    stop: function(event, ui) {
        $(".objectx").css({"display":"none"});
        $(".objecty").css({"display":"none"});
    },
	drag: function(event, ui) {
		var inst = $(this).data("ui-draggable"), o = inst.options;
		var d = o.tolerance;
        
        $(".objectx").css({"display":"none"});
        $(".objecty").css({"display":"none"});

            var x1 = ui.offset.left, x2 = x1 + inst.helperProportions.width,
                y1 = ui.offset.top, y2 = y1 + inst.helperProportions.height,
                xc = (x1 + x2) / 2, yc = (y1 + y2) / 2;

            for (var i = inst.elements.length - 1; i >= 0; i--){
                var l = inst.elements[i].left, r = l + inst.elements[i].width,
                    t = inst.elements[i].top, b = t + inst.elements[i].height,
                    hc = (l + r) / 2, vc = (t + b) / 2;

                    var ls = Math.abs(l - x2) <= d;
                    var rs = Math.abs(r - x1) <= d;
                    var ts = Math.abs(t - y2) <= d;
                    var bs = Math.abs(b - y1) <= d;
                    var hs = Math.abs(hc - xc) <= d;
                    var vs = Math.abs(vc - yc) <= d;
                    
                if(ls) {
                	
                    ui.position.left = inst._convertPositionTo("relative", { top: 0, left: l - inst.helperProportions.width }).left - inst.margins.left;
                    //Left Side align done
                    $(".objectx").css({"left":(l-171)-d-4,"display":"block"});

                }
                if(rs) {
                    ui.position.left = inst._convertPositionTo("relative", { top: 0, left: r }).left - inst.margins.left;
                     $(".objectx").css({"left":(r-170)-d-4,"display":"block"});
                   	
                     
                }
                
                if(ts) {
                    ui.position.top = inst._convertPositionTo("relative", { top: t - inst.helperProportions.height, left: 0 }).top - inst.margins.top;
                    
                    $(".objecty").css({"top":(t-24)-d-4,"display":"block"});
                    //Top Align done
                }
                if(bs) {
                    ui.position.top = inst._convertPositionTo("relative", { top: b, left: 0 }).top - inst.margins.top;
                    
                    $(".objecty").css({"top":(b-22)-d-4,"display":"block"});
                    //Bottom align done
                }
                if(hs) {
                    ui.position.left = inst._convertPositionTo("relative", { top: 0, left: hc - inst.helperProportions.width/2 }).left - inst.margins.left;
                     //Vertical Center Done
                     $(".objectx").css({"left":(hc-171)-d-4,"display":"block"});
                     
                     

                }
                if(vs) {
                    ui.position.top = inst._convertPositionTo("relative", { top: vc - inst.helperProportions.height/2, left: 0 }).top - inst.margins.top;
                    //Horizontal Center Done
                    
                    $(".objecty").css({"top":(vc-24)-d-4,"display":"block"});

                }
                
                
            };
        }
});

	WprlsBuildDraggable = function() {
		
	if ( wprlsslider ) {
		$( ".layercontentcont" ).draggable({
			scroll: false,
			smartguides: '.layercontentcont',
			tolerance: 5,
		    start: function( event, ui ) {
		        
		    }, 
		    drag: function( event, ui ){
		    		var top = $(this).position().top;

			        var left = $(this).position().left;

			        var layerid = $(this).data('layerid');

			        $('.inputlayertop'+layerid).val(top);

			        $('.inputlayerleft'+layerid).val(left);
				}
		});
	}
	else {
		$( ".layercontentcont" ).draggable({
		scroll: false,
	    start: function( event, ui ) {
	        
	    }, 
	    drag: function( event, ui ){
	    		var top = $(this).position().top;

		        var left = $(this).position().left;

		        var layerid = $(this).data('layerid');

		        $('.inputlayertop'+layerid).val(top);

		        $('.inputlayerleft'+layerid).val(left);
			}
	});
	}



	}
	

	WprlsBuildColorabble = function() {

		$( 'input.alpha-color-picker' ).alphaColorPicker();

		$( 'input.link-color-picker' ).wpColorPicker();

		$( 'input.text-color-picker' ).wpColorPicker( {

			change: function(event, ui) {

          layerid = $(this).data('layerid');

				  layercontentpreview = '.layercontent'+layerid;
			
				  $(layercontentpreview).css( 'color', $(this).val() );

	    	}

		});
	}

  WprlsBuildResize = function() {

    $( ".layercontentcont" ).resizable({
      
      handles: "n, e, s, w, nw, ne, sw,se",
      
      helper: "ui-resizable-helper",
      
      ghost: true,

      start: function(event, ui) {

        $(this).resizable().on('resize', function (e) {
            e.stopPropagation(); 
        });
        
      },
      
      stop: function(event, ui) {

        var parent = $(this).parent();

        var width = $(this).css('width').replace( 'px', '' );

        var height = '';

        var layerid = $(this).data('layerid');

        width = width/parent.width()*100;

        height = $(this).css('height').replace( 'px', '' );

        $('.inputlayerwidth'+layerid).val(width);

        $('.inputlayerheight'+layerid).val(height);

        var top = $(this).position().top;

        var left = $(this).position().left;

        $('.inputlayertop'+layerid).val(top);

        $('.inputlayerleft'+layerid).val(left);



      }

    });
    
  }

	WprlsBuildDraggable();

	WprlsBuildColorabble();

  WprlsBuildResize();


  $( 'input#wprls_slider_slide_bgcolor' ).alphaColorPicker();

  $( 'input#wprls_slider_arrows_color' ).alphaColorPicker();

  $( 'input#wprls_slider_dots_color' ).alphaColorPicker();

  $( 'input#wprls_slider_dots_border_color' ).alphaColorPicker();

  $( 'input#wprls_slider_border_color' ).alphaColorPicker();

  $( 'input#wprls_slider_thumbnail_border_color' ).alphaColorPicker();

  $(document).ready(function(){

    $('#googlefonts').fontselect().change(function(){
    
      var font = $(this).val().replace(/\+/g, ' ');

    });

    $('.open-live-preview').click(function( e ) {
      $(window).trigger('resize');
    });

  });

});
