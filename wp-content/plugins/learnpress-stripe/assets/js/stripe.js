;
//jQuery( function ( $ ) {
//    var $stripeForm, $cardNumber, $cardExpiry, $cardCvc, $button;
//
//    function initForm() {
//        $stripeForm = $( '#learn-press-checkout' );
//        $cardNumber = $( '#learn-press-stripe-payment-card-number', $stripeForm );
//        $cardExpiry = $( '#learn-press-stripe-payment-card-expiry', $stripeForm );
//        $cardCvc = $( '#learn-press-stripe-payment-card-code', $stripeForm );
//        $button = $( '#learn-press-checkout[name="learn_press_checkout_place_order"]', $stripeForm );
//
//        $stripeForm.on( 'change', '.learn-press-stripe-expiry', function () {
//            $cardExpiry.val( $( '.learn-press-stripe-expiry', $stripeForm ).map( function () {
//                return this.value;
//            } ).get().join( '/' ) );
//        } );
//    }
//
//    function stripeResponseHandler( status, response ) {
//        if ( response.error ) {
//            LP.Checkout.showErrors( '<div class="learn-press-error">' + response.error.message + '</div>' );
//            $button.prop( 'disabled', false );
//            $button.val( $button.attr( 'data-value' ) );
//            $stripeForm.find( 'input#learn-press-stripe-token' ).remove();
//        } else {
//            $stripeForm.append( '<input type="hidden" id="learn-press-stripe-token" class="learn-press-stripe-token" name="learn-press-stripe[token]" value="' + response.id + '"/>' );
//            $stripeForm.submit();
//        }
//    }
//
//    function init() {
//        load_libs();
//        if ( typeof Stripe == 'undefined' ) {
//            alert( 'Stripe library does not exists' );
//            return;
//        }
//        // Set API key
//        Stripe.setPublishableKey( learn_press_stripe_info.publish_key );
//
//        initForm();
//        $stripeForm.on( 'learn_press_checkout_place_order', function () {
//            $button.prop( 'disabled', true );
//            $button.val( $button.attr( 'data-processing-text' ) );
//            if ( $( 'input[type="radio"]:checked', $stripeForm ).val() == 'stripe' && !$( '#learn-press-stripe-token', $stripeForm ).val() ) {
//                var cardExpiry = $cardExpiry.payment( 'cardExpiryVal' ),
//                        stripeData = {
//                            number: $cardNumber.val() || '',
//                            cvc: $cardCvc.val() || '',
//                            exp_month: cardExpiry.month || '',
//                            exp_year: cardExpiry.year || '',
//                            name: learn_press_stripe_info.card_name || ''
//                        };
//                Stripe.createToken( stripeData, stripeResponseHandler );
//                return false;
//            }
//            return true;
//        } );
//        if ( learn_press_stripe_info.test_mode == 'yes' ) {
//            //$cardNumber.val( '4242424242424242' );
//            //$cardCvc.val(123);
//        }
//        $( '.learn-press-stripe-expiry' ).trigger( 'change' );
//    }
//
//    function load_libs() {
//        if ( typeof $.fn.payment == 'undefined' ) {
//            var headTag = document.getElementsByTagName( "head" )[0];
//            var jqTag = document.createElement( 'script' );
//            jqTag.type = 'text/javascript';
//            jqTag.src = learn_press_stripe_info.plugin_url + '/assets/js/payment.js';
//            headTag.appendChild( jqTag );
//        }
//    }
//
//    init();
//} );

( function ( $ ) {
    $.fn.learnpress_toggleInputError = function ( error ) {
        this.parent( '.learn-press-form-row' ).toggleClass( 'has-error', error );
        return error;
    };
    var learnpress_addon_stripe = {
        $stripeForm: null,
        $cardNumber: null,
        $cardExpiry: null,
        $cardCvc: null,
        $button: null,
        init: function () {
            this.$stripeForm = $( '#learn-press-checkout' ),
                    this.$cardNumber = $( '#learn-press-stripe-payment-card-number', this.$stripeForm ),
                    this.$cardExpiry = $( '#learn-press-stripe-payment-card-expiry', this.$stripeForm ),
                    this.$cardCvc = $( '#learn-press-stripe-payment-card-code', this.$stripeForm ),
                    this.$button = $( '#learn-press-checkout[name="learn_press_checkout_place_order"]', this.$stripeForm );

            // load jquery-payment.js
            this.payment_validate();
            // implode month - year date
            this.$stripeForm.on( 'change', '.learn-press-stripe-expiry', this.expiry_date );
            // place_order
            this.$stripeForm.on( 'learn_press_checkout_place_order', this.place_order );
        },
        // load payment.js library
        payment_validate: function () {
            this.$cardNumber.payment( 'formatCardNumber' );
            this.$cardExpiry.payment( 'formatCardExpiry' );
            this.$cardCvc.payment( 'formatCardCVC' );
        },
        // Set Expiry Date
        expiry_date: function ( e ) {
            e.preventDefault();
            learnpress_addon_stripe.$cardExpiry.val( $( '.learn-press-stripe-expiry', learnpress_addon_stripe.$stripeForm ).map( function () {
                return this.value;
            } ).get().join( ' / ' ) );
            
            return false;
        },
        // place order
        place_order: function () {
            var _this = learnpress_addon_stripe;

            _this.$button.prop( 'disabled', true );
            _this.$button.val( _this.$button.attr( 'data-processing-text' ) );
            if ( $( 'input[type="radio"]:checked', _this.$stripeForm ).val() === 'stripe' && !$( '#learn-press-stripe-token', _this.$stripeForm ).val() ) {
                console.debug( $.payment.validateCardExpiry( _this.$cardExpiry.val() ) );
                var error_num = _this.$cardNumber.learnpress_toggleInputError(
                        !$.payment.validateCardNumber( _this.$cardNumber.val() )
                    );
                var error_expire = _this.$cardExpiry.learnpress_toggleInputError(
                        !$.payment.validateCardExpiry( _this.$cardExpiry.payment('cardExpiryVal') )
                    );
                var error_cvc = _this.$cardCvc.learnpress_toggleInputError(
                        !$.payment.validateCardCVC( _this.$cardCvc.val() )
                    );
                if ( ! error_num || ! error_expire || !error_cvc ) {
                    _this.$button.attr( 'disabled', false );
                }
            }
            return true;
        }
    };

    $( document ).ready( function () {
        learnpress_addon_stripe.init();
    } );
} )( jQuery );