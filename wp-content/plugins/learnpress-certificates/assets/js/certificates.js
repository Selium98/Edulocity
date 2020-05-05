;(function ($) {
	var _ = {
		now     : Date.now || function () {
			return new Date().getTime();
		},
		debounce: function (func, wait, immediate) {
			var timeout, args, context, timestamp, result;

			var later = function () {
				var last = _.now() - timestamp;

				if (last < wait && last >= 0) {
					timeout = setTimeout(later, wait - last);
				} else {
					timeout = null;
					if (!immediate) {
						result = func.apply(context, args);
						if (!timeout) context = args = null;
					}
				}
			};

			return function () {
				context = this;
				args = arguments;
				timestamp = _.now();
				var callNow = immediate && !timeout;
				if (!timeout) timeout = setTimeout(later, wait);
				if (callNow) {
					result = func.apply(context, args);
					context = args = null;
				}

				return result;
			};
		}
	};
	window.LP_Certificate = function (el, options) {
		var self = this,
			viewport = {
				width         : 0,
				height        : 0,
				templateWidth : 0,
				templateHeight: 0,
				ratio         : 1
			},
			$el = $(el),
			$background = $el.find('.cert-template'),
			$canvas = null;
			ajaxData = new FormData();

		function init() {
			initCanvas();
			$(document).on('click', '[data-cert="' + $el.attr('id') + '"]', download);
			self.$canvas = $canvas;
			self.$background = $background;
		}

		function dataURItoBlob(dataURI) {
			// convert base64 to raw binary data held in a string
			// doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
			var byteString = atob(dataURI.split(',')[1]);

			// separate out the mime component
			var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]

			// write the bytes of the string to an ArrayBuffer
			var ab = new ArrayBuffer(byteString.length);

			// create a view into the buffer
			var ia = new Uint8Array(ab);

			// set the bytes of the buffer to the correct values
			for (var i = 0; i < byteString.length; i++) {
				ia[i] = byteString.charCodeAt(i);
			}

			// write the ArrayBuffer to a blob, and you're done
			var blob = new Blob([ab], {type: mimeString});
			return blob;

		}

		function download() {
			 
			var name = 'certificate',
				type = $(this).data('type'),
				args = {
					format    : type === 'jpg' ? 'jpeg' : 'png',
					multiplier: 1 / $canvas.getZoom()
				}

			if (args.type === 'jpeg') {
				args.quality = 1;
			}

			var data_url = $canvas.toDataURL();
			var imageBlob = dataURItoBlob(data_url);
			var ajaxData = new FormData();
			ajaxData.append('files', imageBlob,options.name);

			downloadjs($canvas.toDataURL(args), options.name);
			return false;
		}

		function createPreview() {
			var name = 'certificate',
				type = 'png',
				args = {
					format    : type === 'jpg' ? 'jpeg' : 'png',
					multiplier: 1 / $canvas.getZoom()
				}

			if (args.type === 'jpeg') {
				args.quality = 1
			}

			var data = $canvas.toDataURL(args),
				$img = $el.siblings('.certificate-result');

			if ($img.length === 0) {
				$img = $('<img class="certificate-result" />').css({'max-width': '100%'}).insertBefore($el);
			}

			$img.attr('src', data)
		}

		function initCanvas() {
			if (!$canvas) {

				$canvas = $el.find('canvas');
				$canvas = new fabric.Canvas($canvas.get(0));
				$canvas.selection = false;
				$.each(options.layers, function (i, layer) {
					if (!layer.type) return;
					addLayer(layer, {setActive: false});
				});

				$background.on('load', function () {
					var tester = new Image();
					tester.src = $background.attr('src');
					viewport = {
						width         : $background.width(),
						height        : $background.height(),
						templateWidth : tester.width,
						templateHeight: tester.height,
						ratio         : $background.width() / tester.width
					};

					fabric.Image.fromURL(tester.src, function (img) {
						$canvas.backgroundImage = img;
						updateView();
						createPreview();

						$(document).triggerHandler('learn-press/certificates/loaded');
					});

				}).trigger('load');
			}


			$(window).on('resize.update-certificate-view', _.debounce(updateView, 300)).trigger('resize');
		}

		function addLayer($layer, args) {
			args = $.extend({
				setActive: true
			}, args || {});

			if ($.isPlainObject($layer)) {
				$layer = createLayer($layer);
			}

			try {
				if ($layer) {
					$canvas.add($layer);

					if (args.setActive) {
						$canvas.setActiveObject($layer);
					}
					$canvas.renderAll();
				}
			} catch (e) {
				console.log('Error:' + e)
			}
			return $layer;
		}

		function htmlDecode(input) {
			var e = document.createElement('div');
			e.innerHTML = input;
			return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
		}

		function createLayer(args) {
			args.text = htmlDecode(args.text) || '';

			var defaults = $.extend({
					fontSize  : 24,
					left      : 0,
					top       : 0,
					lineHeight: 1,
					originX   : 'center',
					originY   : 'center',
					fontFamily: 'Helvetica',
					fieldType : 'custom'
				}, args),
				text = args.text || '';

			try {
				var $object = new fabric.Text('' + text + 'xx', defaults),
					that = this;
					var is_url = /^(https?|s?ftp):\/\//i.test(args.text);
                if( args.fieldType == 'verified-link' && args.qr_size > 0  && is_url ){
                	var qr_code = new Image();
                	defaults.type = 'image';
                    defaults.height = defaults.qr_size;
                    defaults.width = defaults.qr_size;
                    qr_code.crossOrigin = "Anonymous";
                    qr_code.src = args.text;
                    $object = new fabric.Image(qr_code, defaults);
                }
				$object.set({
					borderColor       : '#AAA',
					cornerColor       : '#666',
					cornerSize        : 7,
					transparentCorners: true,
					padding           : 0
				});
				$object.set({
					hasControls: false
				});
				$object.selectable = false;

				$.each(defaults, function (k, v) {
					setLayerProp($object, k, v);
				});


				var $_object = $(document).triggerHandler('learn_press_certificate_layer_obj', [$object, args]);

				if (typeof $_object === 'object') {
					$object = $_object;
				}
			} catch (e) {
				console.log(text)
			}

			return $object;
		}

		function getMaxWidth() {
			return $el.width();
		}

		function calculate() {
			viewport = $.extend(viewport, {
				width : $background.width(),
				height: $background.height(),
				ratio : $background.width() / viewport.templateWidth
			});
		}

		function updateView() {
			calculate();
			$canvas.setHeight(viewport.height);
			$canvas.setWidth(viewport.width);
			$canvas.setZoom(viewport.ratio);
			$canvas.calcOffset();
			$canvas.renderAll();

			fitImage();
		}

		function fitImage() {
			var $preview = $el.siblings('.certificate-result'),
				scrWidth = $el.parent().width(),
				scrHeight = $(window).height() - (60 + parseInt($el.parent().position().top)),
				maxWidth = viewport.width,
				maxHeight = viewport.height;

			var scale = Math.min(
				scrWidth / maxWidth,
				scrHeight / maxHeight
			);

			maxWidth = maxWidth * scale;
			if (maxWidth) {
				$preview.css({
					//maxWidth: maxWidth * scale
				});
			}
		}

		function setLayerProp($layer, prop, value) {
			var options = {};
			switch (prop) {
				case 'textAlign':
					//$layer.originX = value;
					break;
				case 'color':
					//$layer.set('fill', value);
					options['fill'] = value;
					break;
				case 'scaleX':
				case 'scaleY':
					if (value < 0) {
						if (prop === 'scaleX') {
							$layer.flipX = true;
						} else {
							$layer.flipY = true;
						}
					} else {
						if (prop === 'scaleX') {
							$layer.flipX = false;
						} else {
							$layer.flipY = false;
						}
					}
					options[prop] = (Math.abs(value));
					break;
				case 'top':
				case 'left':
				case 'angle':
					options[prop] = parseInt(value);
					break;
				default:
					options[prop] = value;
			}
			$.each(options, function (k, v) {
				$layer.set(k, v);
			})
			$layer.setCoords();
		}

		init();
	}

	LP_Certificate.loadJs = function (src, id) {
		var d = document, s = 'script', js, fjs = d.getElementsByTagName(s)[0];
		if (id && d.getElementById(id)) return;
		js = d.createElement(s);
		id && (js.id = id);
		js.src = src;
		fjs.parentNode.insertBefore(js, fjs);
	}

	$(document).ready(function () {
		var $html = $('html, body'),
			$popup = $('#certificate-popup'),
			docOverflow = '';
		if (!$popup.length) {
			return;
		}

		function close() {
			$popup.fadeOut(function () {
				$html.css('overflow', docOverflow);
				$popup.find('.learn-press-message').remove();
			});
		}

		function open() {
			$html.css('overflow', 'hidden');
			$popup.fadeIn();
		}

		docOverflow = $html.css('overflow');

		$(document).on('learn-press/certificates/loaded', function () {
			$popup.addClass('ready').hide();

			$(this)
				.off('keyup.close-certificate-popup')
				.on('keyup.close-certificate-popup', function (e) {
					if (e.keyCode === 27) {
						close();
					}
				})
				.off('clic.close-certificate-popup')
				.on('click.close-certificate-popup', '.close-popup', function (e) {
					close();
					e.preventDefault();
				});

			$('form[name="certificate-form-button"]').on('submit', function () {
				open();
				return false;
			});

			if (window.auto_show_certificate === true) {
				open();
			} else {
				$popup.find('.learn-press-message').remove();
			}

		})

	})
})(jQuery);

