<?php

function mo_openid_licensing_plans($value){
if($value=="feature_plan")
{
 ?>
    <script>
        jQuery(document).ready(function($) {
            jQuery('#Recharge').prop('checked',true);
            jQuery('.mosslp').removeClass('is-visible').addClass('is-hidden');
            jQuery('.momslp').addClass('is-visible').removeClass('is-hidden is-selected');
        });
    </script>
    <?php
}
    echo '<style>.update-nag, .updated, .error, .is-dismissible, .notice, .notice-error { display: none; }</style>';
    ?>

    <style>
        *, *::after, *::before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        html {
            font-size: 62.5%;
        }
        html * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .cd-header>h1{
            text-align: center;
            color: #FFFFFF;
            font-size: 3.2rem;
        }
        .cd-pricing-container {
            width: 90%;
            max-width: 1170px;
            margin: 4em auto;
        }
        @media only screen and (min-width: 768px) {
            .cd-pricing-container {
                margin: auto;
            }
            .cd-pricing-container.cd-full-width {
                width: 100%;
                max-width: none;
            }
        }
        .cd-pricing-switcher {
            text-align: center;
        }
        .cd-pricing-switcher .fieldset {
            display: inline-block;
            position: relative;
            border-radius: 50em;
            border: 1px solid #e97d68;
        }
        .cd-pricing-switcher input[type="radio"] {
            position: absolute;
            opacity: 0;
        }
        .cd-pricing-switcher label {
            position: relative;
            z-index: 1;
            display: inline-block;
            float: left;
            width: 160px;
            height: 44px;
            line-height: 40px;
            cursor: pointer;
            font-size: 1.4rem;
            color: #FFFFFF;
            font-size:18px;
        }
        .cd-pricing-switcher .cd-switch {
            /* floating background */
            position: absolute;
            top: 2px;
            left: 2px;
            height: 40px;
            width: 160px;
            background-color: black;
            border-radius: 50em;
            -webkit-transition: -webkit-transform 0.5s;
            -moz-transition: -moz-transform 0.5s;
            transition: transform 0.5s;
        }
        .cd-pricing-switcher input[type="radio"]:checked + label + .cd-switch,
        .cd-pricing-switcher input[type="radio"]:checked + label:nth-of-type(n) + .cd-switch {
            /* use label:nth-of-type(n) to fix a bug on safari with multiple adjacent-sibling selectors*/
            -webkit-transform: translateX(155px);
            -moz-transform: translateX(155px);
            -ms-transform: translateX(155px);
            -o-transform: translateX(155px);
            transform: translateX(155px);
        }
        .no-js .cd-pricing-switcher {
            display: none;
        }
        .cd-pricing-list > li {
            position: relative;
            margin-bottom: 1em;
        }
        @media only screen and (min-width: 768px) {
            .cd-pricing-list:after {
                content: "";
                display: table;
                clear: both;
            }
            .cd-pricing-list > li {
                width: 35.3333333333%;
                float: left;
            }
            .cd-has-margins .cd-pricing-list > li {
                width: 32.3333333333%;
                float: left;
                margin-right: 1.5%;
            }
            .cd-has-margins .cd-pricing-list > li:last-of-type {
                margin-right: 0;
            }
        }
        .cd-pricing-wrapper {
            /* this is the item that rotates */
            overflow: show;
            position: relative;
        }

        .touch .cd-pricing-wrapper {
            /* fix a bug on IOS8 - rotating elements dissapear*/
            -webkit-perspective: 2000px;
            -moz-perspective: 2000px;
            perspective: 2000px;
        }
        .cd-pricing-wrapper.is-switched .is-visible {
            /* totate the tables - anticlockwise rotation */
            -webkit-transform: rotateY(180deg);
            -moz-transform: rotateY(180deg);
            -ms-transform: rotateY(180deg);
            -o-transform: rotateY(180deg);
            transform: rotateY(180deg);
            -webkit-animation: cd-rotate 0.5s;
            -moz-animation: cd-rotate 0.5s;
            animation: cd-rotate 0.5s;
        }
        .cd-pricing-wrapper.is-switched .is-hidden {
            /* totate the tables - anticlockwise rotation */
            -webkit-transform: rotateY(0);
            -moz-transform: rotateY(0);
            -ms-transform: rotateY(0);
            -o-transform: rotateY(0);
            transform: rotateY(0);
            -webkit-animation: cd-rotate-inverse 0.5s;
            -moz-animation: cd-rotate-inverse 0.5s;
            animation: cd-rotate-inverse 0.5s;
            opacity: 0;
        }
        .cd-pricing-wrapper.is-switched .is-selected {
            opacity: 1;
        }
        .cd-pricing-wrapper.is-switched.reverse-animation .is-visible {
            /* invert rotation direction - clockwise rotation */
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            -o-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
            -webkit-animation: cd-rotate-back 0.5s;
            -moz-animation: cd-rotate-back 0.5s;
            animation: cd-rotate-back 0.5s;
        }
        .cd-pricing-wrapper.is-switched.reverse-animation .is-hidden {
            /* invert rotation direction - clockwise rotation */
            -webkit-transform: rotateY(0);
            -moz-transform: rotateY(0);
            -ms-transform: rotateY(0);
            -o-transform: rotateY(0);
            transform: rotateY(0);
            -webkit-animation: cd-rotate-inverse-back 0.5s;
            -moz-animation: cd-rotate-inverse-back 0.5s;
            animation: cd-rotate-inverse-back 0.5s;
            opacity: 0;
        }
        .cd-pricing-wrapper.is-switched.reverse-animation .is-selected {
            opacity: 1;
        }
        .cd-pricing-wrapper > li {
            background-color: #FFFFFF;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            /* Firefox bug - 3D CSS transform, jagged edges */
            outline: 1px solid transparent;
        }
        .cd-pricing-wrapper > li::after {
            /* subtle gradient layer on the right - to indicate it's possible to scroll */
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 50px;
            pointer-events: none;
            background: -webkit-linear-gradient( right , #FFFFFF, rgba(255, 255, 255, 0));
            background: linear-gradient(to left, #FFFFFF, rgba(255, 255, 255, 0));
        }
        .cd-pricing-wrapper > li.is-ended::after {
            /* class added in jQuery - remove the gradient layer when it's no longer possible to scroll */
            display: none;
        }
        .cd-pricing-wrapper .is-visible {
            /* the front item, visible by default */
            position: relative;
            background-color: #f2f5f8;
        }
        .cd-pricing-wrapper .is-hidden {
            /* the hidden items, right behind the front one */
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 1;
            -webkit-transform: rotateY(180deg);
            -moz-transform: rotateY(180deg);
            -ms-transform: rotateY(180deg);
            -o-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }
        .cd-pricing-wrapper .is-selected {
            /* the next item that will be visible */
            z-index: 3 !important;
        }
        @media only screen and (min-width: 768px) {
            .cd-pricing-wrapper > li::before {
                /* separator between pricing tables - visible when number of tables > 3 */
                content: '';
                position: absolute;
                z-index: 6;
                left: -1px;
                top: 50%;
                bottom: auto;
                -webkit-transform: translateY(-50%);
                -moz-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                -o-transform: translateY(-50%);
                transform: translateY(-50%);
                height: 50%;
                width: 1px;
                background-color: #b1d6e8;
            }
            .cd-pricing-wrapper > li::after {
                /* hide gradient layer */
                display: none;
            }
            .cd-popular .cd-pricing-wrapper > li {
                box-shadow: inset 0 0 0 3px #e97d68;
            }
            .cd-has-margins .cd-pricing-wrapper > li, .cd-has-margins .cd-popular .cd-pricing-wrapper > li {
                box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
            }
            .cd-secondary-theme .cd-pricing-wrapper > li {
                background: #3aa0d1;
                background: -webkit-linear-gradient( bottom , #3aa0d1, #3ad2d1);
                background: linear-gradient(to top, #3aa0d1, #3ad2d1);
            }
            .cd-secondary-theme .cd-popular .cd-pricing-wrapper > li {
                background: #e97d68;
                background: -webkit-linear-gradient( bottom , #e97d68, #e99b68);
                background: linear-gradient(to top, #e97d68, #e99b68);
                box-shadow: none;
            }
            :nth-of-type(1) > .cd-pricing-wrapper > li::before {
                /* hide table separator for the first table */
                display: none;
            }
            .cd-has-margins .cd-pricing-wrapper > li {
                border-radius: 4px 4px 6px 6px;
            }
            .cd-has-margins .cd-pricing-wrapper > li::before {
                display: none;
            }
        }
        @media only screen and (min-width: 1500px) {
            .cd-full-width .cd-pricing-wrapper > li {
                padding: 2.5em 0;
            }
        }

        .no-js .cd-pricing-wrapper .is-hidden {
            position: relative;
            -webkit-transform: rotateY(0);
            -moz-transform: rotateY(0);
            -ms-transform: rotateY(0);
            -o-transform: rotateY(0);
            transform: rotateY(0);
            margin-top: 1em;
        }

        @media only screen and (min-width: 768px) {
            .cd-popular .cd-pricing-wrapper > li::before {
                /* hide table separator for .cd-popular table */
                display: none;
            }

            .cd-popular + li .cd-pricing-wrapper > li::before {
                /* hide table separator for tables following .cd-popular table */
                display: none;
            }
        }
        .cd-pricing-header {
            position: relative;

            height: 80px;
            padding: 1em;
            pointer-events: none;
            background-color: #3aa0d1;
            color: #FFFFFF;
        }
        .cd-pricing-header h2 {

            font-weight: 700;
            text-transform: uppercase;
        }
        .cd-popular .cd-pricing-header {
            background-color: #e97d68;
        }
        @media only screen and (min-width: 768px) {
            .cd-pricing-header {
                height: auto;
                pointer-events: auto;
                text-align: center;
                color: #2f6062;
                background-color: transparent;
            }
            .cd-popular .cd-pricing-header {
                color: #e97d68;
                background-color: transparent;
            }
            .cd-secondary-theme .cd-pricing-header {
                color: #FFFFFF;
            }
            .cd-pricing-header h2 {
                font-size: 1.8rem;
                letter-spacing: 2px;
            }
        }


        .cd-popular .cd-duration {
            color: #f3b6ab;
        }
        .cd-duration::before {
            content: '/';
            margin-right: 2px;
        }

        @media only screen and (min-width: 768px) {
            .cd-value {
                font-size: 4rem;
                font-weight: 300;
            }

            .cd-contact {
                font-size: 3rem;

            }

            .cd-currency, .cd-duration {
                color: rgba(23, 61, 80, 0.4);
            }
            .cd-popular .cd-currency, .cd-popular .cd-duration {
                color: #e97d68;
            }
            .cd-secondary-theme .cd-currency, .cd-secondary-theme .cd-duration {
                color: #2e80a7;
            }
            .cd-secondary-theme .cd-popular .cd-currency, .cd-secondary-theme .cd-popular .cd-duration {
                color: #ba6453;
            }


        }
        .cd-pricing-body {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        .is-switched .cd-pricing-body {
            /* fix a bug on Chrome Android */
            overflow: hidden;
        }
        @media only screen and (min-width: 768px) {
            .cd-pricing-body {
                overflow-x: visible;
            }
        }

        .cd-pricing-features {
            width: 600px;
        }
        .cd-pricing-features:after {
            content: "";
            display: table;
            clear: both;
        }
        .cd-pricing-features li {
            width: 100px;
            float: left;
            padding: 1.6em 1em;
            font-size: 1.4rem;
            text-align: center;
            white-space: initial;

            line-height:1.4em;

            text-overflow: ellipsis;
            color: black;
            overflow-wrap: break-word;
            margin: 0 !important;

        }
        .cd-pricing-features em {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: black;
        }
        @media only screen and (min-width: 768px) {
            .cd-pricing-features {
                width: auto;
                word-wrap: break-word;
            }
            .cd-pricing-features li {
                float: none;
                width: auto;
                padding: 1em;
                word-wrap: break-word;
            }
            .cd-popular .cd-pricing-features li {
                margin: 0 3px;
            }
            .cd-pricing-features li:nth-of-type(2n+1) {
                background-color: rgba(23, 61, 80, 0.06);
            }
            .cd-pricing-features em {
                display: inline-block;
                margin-bottom: 0;
                word-wrap: break-word;
            }
            .cd-has-margins .cd-popular .cd-pricing-features li, .cd-secondary-theme .cd-popular .cd-pricing-features li {
                margin: 0;
            }
            .cd-secondary-theme .cd-pricing-features li {
                color: #FFFFFF;
            }
            .cd-secondary-theme .cd-pricing-features li:nth-of-type(2n+1) {
                background-color: transparent;
            }
        }



        .cd-select {
            position: relative;
            z-index: 1;
            display: block;
            height: 100%;
            /* hide button text on mobile */
            overflow: hidden;
            text-indent: 100%;
            white-space: nowrap;
            color: transparent;
        }
        @media only screen and (min-width: 768px) {
            .cd-select {
                position: static;
                display: inline-block;
                height: auto;
                padding: 1.3em 3em;
                color: #FFFFFF;
                border-radius: 2px;
                background-color: #0c1f28;
                font-size: 1.3rem;
                text-indent: 0;
                text-transform: uppercase;
                letter-spacing: 2px;
                text-decoration: none;
            }
            .no-touch .cd-select:hover {
                background-color: #112e3c;
            }
            .cd-popular .cd-select {
                background-color: #e97d68;
            }
            .no-touch .cd-popular .cd-select:hover {
                background-color: #ec907e;
            }
            .cd-secondary-theme .cd-popular .cd-select {
                background-color: #0c1f28;
            }
            .no-touch .cd-secondary-theme .cd-popular .cd-select:hover {
                background-color: #112e3c;
            }
            .cd-has-margins .cd-select {
                display: block;
                padding: 1.7em 0;
                border-radius: 0 0 4px 4px;
            }
        }
        /* --------------------------------

        xkeyframes

        -------------------------------- */
        @-webkit-keyframes cd-rotate {
            0% {
                -webkit-transform: perspective(2000px) rotateY(0);
            }
            70% {
                /* this creates the bounce effect */
                -webkit-transform: perspective(2000px) rotateY(200deg);
            }
            100% {
                -webkit-transform: perspective(2000px) rotateY(180deg);
            }
        }
        @-moz-keyframes cd-rotate {
            0% {
                -moz-transform: perspective(2000px) rotateY(0);
            }
            70% {
                /* this creates the bounce effect */
                -moz-transform: perspective(2000px) rotateY(200deg);
            }
            100% {
                -moz-transform: perspective(2000px) rotateY(180deg);
            }
        }
        @keyframes cd-rotate {
            0% {
                -webkit-transform: perspective(2000px) rotateY(0);
                -moz-transform: perspective(2000px) rotateY(0);
                -ms-transform: perspective(2000px) rotateY(0);
                -o-transform: perspective(2000px) rotateY(0);
                transform: perspective(2000px) rotateY(0);
            }
            70% {
                /* this creates the bounce effect */
                -webkit-transform: perspective(2000px) rotateY(200deg);
                -moz-transform: perspective(2000px) rotateY(200deg);
                -ms-transform: perspective(2000px) rotateY(200deg);
                -o-transform: perspective(2000px) rotateY(200deg);
                transform: perspective(2000px) rotateY(200deg);
            }
            100% {
                -webkit-transform: perspective(2000px) rotateY(180deg);
                -moz-transform: perspective(2000px) rotateY(180deg);
                -ms-transform: perspective(2000px) rotateY(180deg);
                -o-transform: perspective(2000px) rotateY(180deg);
                transform: perspective(2000px) rotateY(180deg);
            }
        }
        @-webkit-keyframes cd-rotate-inverse {
            0% {
                -webkit-transform: perspective(2000px) rotateY(-180deg);
            }
            70% {
                /* this creates the bounce effect */
                -webkit-transform: perspective(2000px) rotateY(20deg);
            }
            100% {
                -webkit-transform: perspective(2000px) rotateY(0);
            }
        }
        @-moz-keyframes cd-rotate-inverse {
            0% {
                -moz-transform: perspective(2000px) rotateY(-180deg);
            }
            70% {
                /* this creates the bounce effect */
                -moz-transform: perspective(2000px) rotateY(20deg);
            }
            100% {
                -moz-transform: perspective(2000px) rotateY(0);
            }
        }
        @keyframes cd-rotate-inverse {
            0% {
                -webkit-transform: perspective(2000px) rotateY(-180deg);
                -moz-transform: perspective(2000px) rotateY(-180deg);
                -ms-transform: perspective(2000px) rotateY(-180deg);
                -o-transform: perspective(2000px) rotateY(-180deg);
                transform: perspective(2000px) rotateY(-180deg);
            }
            70% {
                /* this creates the bounce effect */
                -webkit-transform: perspective(2000px) rotateY(20deg);
                -moz-transform: perspective(2000px) rotateY(20deg);
                -ms-transform: perspective(2000px) rotateY(20deg);
                -o-transform: perspective(2000px) rotateY(20deg);
                transform: perspective(2000px) rotateY(20deg);
            }
            100% {
                -webkit-transform: perspective(2000px) rotateY(0);
                -moz-transform: perspective(2000px) rotateY(0);
                -ms-transform: perspective(2000px) rotateY(0);
                -o-transform: perspective(2000px) rotateY(0);
                transform: perspective(2000px) rotateY(0);
            }
        }
        @-webkit-keyframes cd-rotate-back {
            0% {
                -webkit-transform: perspective(2000px) rotateY(0);
            }
            70% {
                /* this creates the bounce effect */
                -webkit-transform: perspective(2000px) rotateY(-200deg);
            }
            100% {
                -webkit-transform: perspective(2000px) rotateY(-180deg);
            }
        }
        @-moz-keyframes cd-rotate-back {
            0% {
                -moz-transform: perspective(2000px) rotateY(0);
            }
            70% {
                /* this creates the bounce effect */
                -moz-transform: perspective(2000px) rotateY(-200deg);
            }
            100% {
                -moz-transform: perspective(2000px) rotateY(-180deg);
            }
        }
        @keyframes cd-rotate-back {
            0% {
                -webkit-transform: perspective(2000px) rotateY(0);
                -moz-transform: perspective(2000px) rotateY(0);
                -ms-transform: perspective(2000px) rotateY(0);
                -o-transform: perspective(2000px) rotateY(0);
                transform: perspective(2000px) rotateY(0);
            }
            70% {
                /* this creates the bounce effect */
                -webkit-transform: perspective(2000px) rotateY(-200deg);
                -moz-transform: perspective(2000px) rotateY(-200deg);
                -ms-transform: perspective(2000px) rotateY(-200deg);
                -o-transform: perspective(2000px) rotateY(-200deg);
                transform: perspective(2000px) rotateY(-200deg);
            }
            100% {
                -webkit-transform: perspective(2000px) rotateY(-180deg);
                -moz-transform: perspective(2000px) rotateY(-180deg);
                -ms-transform: perspective(2000px) rotateY(-180deg);
                -o-transform: perspective(2000px) rotateY(-180deg);
                transform: perspective(2000px) rotateY(-180deg);
            }
        }
        @-webkit-keyframes cd-rotate-inverse-back {
            0% {
                -webkit-transform: perspective(2000px) rotateY(180deg);
            }
            70% {
                /* this creates the bounce effect */
                -webkit-transform: perspective(2000px) rotateY(-20deg);
            }
            100% {
                -webkit-transform: perspective(2000px) rotateY(0);
            }
        }
        @-moz-keyframes cd-rotate-inverse-back {
            0% {
                -moz-transform: perspective(2000px) rotateY(180deg);
            }
            70% {
                /* this creates the bounce effect */
                -moz-transform: perspective(2000px) rotateY(-20deg);
            }
            100% {
                -moz-transform: perspective(2000px) rotateY(0);
            }
        }
        @keyframes cd-rotate-inverse-back {
            0% {
                -webkit-transform: perspective(2000px) rotateY(180deg);
                -moz-transform: perspective(2000px) rotateY(180deg);
                -ms-transform: perspective(2000px) rotateY(180deg);
                -o-transform: perspective(2000px) rotateY(180deg);
                transform: perspective(2000px) rotateY(180deg);
            }
            70% {
                /* this creates the bounce effect */
                -webkit-transform: perspective(2000px) rotateY(-20deg);
                -moz-transform: perspective(2000px) rotateY(-20deg);
                -ms-transform: perspective(2000px) rotateY(-20deg);
                -o-transform: perspective(2000px) rotateY(-20deg);
                transform: perspective(2000px) rotateY(-20deg);
            }
            100% {
                -webkit-transform: perspective(2000px) rotateY(0);
                -moz-transform: perspective(2000px) rotateY(0);
                -ms-transform: perspective(2000px) rotateY(0);
                -o-transform: perspective(2000px) rotateY(0);
                transform: perspective(2000px) rotateY(0);
            }
        }


        .tab-content {
            margin-left: 0%!important;
            margin-top: 0%!important;

        }
        .tab-content>.active {
            width: 100% !important;
        }

        .tab-pane,.cd-pricing-container,.cd-pricing-switcher ,.cd-row,.cd-row>div{

        }



        .nav-pills>li{
            width:250px;
        }


        .nav-pills>li+li {
            margin-left: 0px;
        }

        .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus,.nav-pills>li.active>a:active{
            color: #1e3334;
            background-color:white;
            height:47px;
        }

        .nav-pills>li>a:hover {
            color:#fff;
            background: #E97D68;
            height:46px;
        }

        .nav-pills>li>a:focus{
            color:#fff;
            background:grey;
            height:47px;

        }

        .nav-pills>li.active{
            background-color: #fff;
        }

        .nav-pills>li>a {
            border-radius: 0px;
            height:47px;
            border-color:#E85700;
            font-weight: 500;
            color: #d3f3d3;
            text-transform:uppercase;
        }




        .ui-slider .ui-slider-handle {
            position: absolute !important;
            z-index: 2 !important;
            width: 3.2em !important;
            height: 2.2em !important;
            cursor: default !important;
            margin: 0 -20px auto !important;
            text-align: center !important;
            line-height: 30px !important;
            color: #FFFFFF !important;
            font-size: 15px !important;
        }





        .ui-slider .ui-slider-handle {width:2em;left:-.6em;text-decoration:none;text-align:center;}
        .ui-slider-horizontal .ui-slider-handle {
            margin-left: -0.5em !important;
        }

        .ui-slider .ui-slider-handle {
            cursor: pointer;
        }

        .ui-slider a,
        .ui-slider a:focus {
            cursor: pointer;
            outline: none;
        }

        .price, .lead p {
            font-weight: 600;
            font-size: 32px;
            display: inline-block;
            line-height: 60px;
        }



        .price-form label {
            font-weight: 200;
            font-size: 21px;
        }



        .ui-slider-horizontal .ui-slider-handle {
            top: -.6em !important;
        }



        .pricing-tooltip .pricing-tooltiptext {
            visibility: hidden;
            background-color: black;
            line-height: 1.5em;
            font-size:12px;
            min-width: 300px;
            color: rgb(253, 252, 252);
            padding: 10px;
            border-radius: 6px;
            position: absolute;
            z-index: 5;
            text-align: center;
        }

        .pricing-tooltiptext .body{
            font-weight:100;
        }

        .pricing-tooltip:hover .pricing-tooltiptext {
            visibility: visible;
        }



        .cd-pricing-features>li>a{
            color:#E97D68;
        }


        .cd-row .col-md-4, .cd-row .col-md-6 {
            padding-left: 30px!important;
            font-size: 16px;
            padding: 4px;
        }

        .cd-row .col-md-6 {
            width: 60.33333333%;
        }


        .ribbon {
            font-size: 12px !important;
            /* This ribbon is based on a 16px font side and a 24px vertical rhythm. I've used em's to position each element for scalability. If you want to use a different font size you may have to play with the position of the ribbon elements */

            width: 8%;

            position: relative;
            background: #ba89b6;
            color: #fff;
            text-align: center;
            padding-top: 8px; /* Adjust to suit */
            padding-bottom: 8px;
            margin: 2em auto 3em; /* Based on 24px vertical rhythm. 48px bottom margin - normally 24 but the ribbon 'graphics' take up 24px themselves so we double it. */
        }
        .ribbon:before, .ribbon:after {
            content: "";
            position: absolute;
            display: block;
            bottom: -1em;
            border: 15px solid #986794;
            z-index: -1;
        }
        .ribbon:before {
            left: -2em;
            border-right-width: 1.5em;
            border-left-color: transparent;
        }
        .ribbon:after {
            right: -2em;
            border-left-width: 1.5em;
            border-right-color: transparent;
        }
        .ribbon .ribbon-content:before, .ribbon .ribbon-content:after {
            content: "";
            position: absolute;
            display: block;
            border-style: solid;
            border-color: #804f7c transparent transparent transparent;
            bottom: -1em;
        }
        .ribbon .ribbon-content:before {
            left: 0;
            border-width: 0em 0 0 1em;
        }
        .ribbon .ribbon-content:after {
            right: 0;
            border-width: 0em 1em 0 0;
        }
    </style>

    <div class="tab-content">
        <div class="tab-pane active text-center" id="cloud">
            <div class="cd-pricing-container cd-has-margins"><br>
                <div class="cd-pricing-switcher">
                    <p class="fieldset" style="background-color: #e97d68;">
                        <input type="radio" name="sitetype" value="regular_plans" id="regular_plans"" checked>
                        <label for="regular_plans">Regular Plans</label>
                        <input type="radio" name="sitetype" value="Recharge" id="Recharge">
                        <label for="Recharge">Featured-Plans</label>
                        <span class="cd-switch"></span>
                    </p>
                </div>

                <ul class="cd-pricing-list cd-bounce-invert" >
                    <li>
                        <ul class="cd-pricing-wrapper">
                            <li data-type="regular_plans" class="mosslp is-visible">
                                <a data-placement="top" data-html="true">
                                    <header class="cd-pricing-header">
                                        <h2 style="margin-bottom: 10px" >WOOCOMMERCE Plugin</h2>
                                        <h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">25</h1>
                                    </header> <!-- .cd-pricing-header -->
                                </a>
                                <footer>
                                    <a href="#" style="padding-left: 32%" class="cd-select" id="mosocial_purchase_cust_addon" onclick="mosocial_addonform('wp_social_login_woocommerce_plan')"  >Upgrade Now</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li><b>All Free features +</b></li>
                                        <li><div class="mo_openid_tooltip" >Woocommerce Integration <i class="mofa mofa-commenting" style="font-size:18px;color:#85929E"></i> <span class="mo_openid_tooltiptext"style="width:100%;"> First name, last name and email are pre-filled in billing details of a user and on the Woocommerce checkout page. Social Login icons are displayed on the Woocommerce checkout page.</span></li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                        </ul> <!-- .cd-pricing-wrapper -->
                    </li>

                    <li class="cd-popular">
                        <ul class="cd-pricing-wrapper">
                            <li data-type="regular_plans" class="mosslp is-visible">
                                <header class="cd-pricing-header">
                                    <h2 style="margin-bottom: 10px">BUDDYPRESS Plugin</h2>
                                    <h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">25</h1>
                                </header> <!-- .cd-pricing-header -->

                                </a>
                                <footer >
                                    <a href="#" style="padding-left: 32%" class="cd-select" id="mosocial_purchase_cust_addon" onclick="mosocial_addonform('wp_social_login_buddypress_plan')"  >Upgrade Now</a>
                                </footer>

                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li><b>All Free features +</b></li>
                                        <li><div class="mo_openid_tooltip" >BuddyPress Integration <i class="mofa mofa-commenting " style="font-size:18px;color:#85929E"> </i><span class="mo_openid_tooltiptext" style="width:100%;"> Extended attributes returned from social app are mapped to Custom BuddyPress fields. Profile picture from social media is mapped to Buddypress avatar.</span></li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                        </ul> <!-- .cd-pricing-wrapper -->
                    </li>

                    <li>
                        <ul class="cd-pricing-wrapper">
                            <li data-type="regular_plans" class="mosslp is-visible" >
                                <header class="cd-pricing-header">
                                    <h2 style="margin-bottom:10px;">MAILCHIMP Plugin</h2>
                                    <h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">25</h1>
                                </header> <!-- .cd-pricing-header -->
                                </a>
                                <footer>
                                    <a href="#" style="padding-left: 32%" class="cd-select" id="mosocial_purchase_cust_addon" onclick="mosocial_addonform('wp_social_login_mailchimp_plan')"  >Upgrade Now</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features ">
                                        <li><b>All Free features +</b></li>
                                        <li><div class="mo_openid_tooltip" >MailChimp Integration <i class="mofa mofa-commenting " style="font-size:18px;color:#85929E"> </i><span class="mo_openid_tooltiptext" style="width:100%;">A user is added as a subscriber to a mailing list in MailChimp when that user registers using Social Login. First name, last name and email are also captured for that user in the Mailing List. Option is available to download csv file that has list of emails of all users in WordPress.</span></li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->

                            </li>

                        </ul> <!-- .cd-pricing-wrapper -->
                    </li>
                </ul>

                <ul class="cd-pricing-list cd-bounce-invert" >
                    <li>
                        <ul class="cd-pricing-wrapper">
                            <li data-type="regular_plans" class="mosslp is-visible">
                                <a data-placement="top" data-html="true">
                                    <header class="cd-pricing-header">
                                        <h1 style="margin-bottom: 10px" >FREE</h1>
                                        <h3 style="color:black;">(YOU ARE ON THIS PLAN)</h3>
                                        <h1>    <img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">0</h1><h3>(Features and plans)</h3>
                                    </header> <!-- .cd-pricing-header -->
                                </a>

                                <footer>
                                    <a href="#" style="padding-left: 3%"  class="cd-select" onclick="mo_openid_support_form('')" >Contact us for more features</a>
                                </footer>

                                <div class="cd-pricing-body">

                                    <ul class="cd-pricing-features">
                                        <li><div class="mo_openid_tooltip" style="padding-left: 25px;">9 Pre-configured Social Login Apps <i class="mofa mofa-commenting " style="font-size:18px;color:#85929E"></i><span class="mo_openid_tooltiptext"style="width:100%;">Pre-configured apps are already configured by miniOrange. Login flow will go from plugin to miniOrange and then back to plugin. 9 pre-configured apps are<span id="mo_openid_dots">...</span><span id="mo_openid_more" style="display: none"><br>  google,vkontakte,twitter,linkedin,<br>amazon,windowslive,salesforce,<br/>yahoo and instagram.</span><button style="border:transparent;background-color: transparent;color: tomato;" onclick="myFunction('mo_openid_dots','mo_openid_more','mo_openid_myBtn')" id="mo_openid_myBtn">Read more</button>
                                            </div></li>
                                        <li><div class="mo_openid_tooltip" style="padding-left: 37px;">9 Custom Social Login Apps <i class="mofa mofa-commenting " style="font-size:18px;color:#85929E"></i><span class="mo_openid_tooltiptext"style="width:100%;"> Using the custom app tab, you can set up your own app id and secret in the plugin. Login flow will not involve miniOrange in between. Login flow will go from plugin to social media application and then back to plugin.<br>10 custom apps are <span id="mo_openid_dots1">...</span><span id="mo_openid_more1" style="display:none" ><br>Facebook,Google,vkontakte,<br/>twitter,linkedin,<br>amazon,windowslive,yahoo and instagram.</span><button style="border:transparent;background-color: transparent;color: tomato;" onclick="myFunction('mo_openid_dots1','mo_openid_more1','mo_openid_myBtn1')" id="mo_openid_myBtn1">Read more</button></li>
                                        <li>Beautiful Icon Customisations</li>
                                        <li>16 Social Sharing Apps</li>
                                        <li>Facebook Social Comments</li>
                                        <li>Disqus Social Comments</li>
                                        <li>Login Redirect URL</li>
                                        <li>Logout Redirect URL</li>
                                        <li>Profile completion (username, email)</li>
                                        <li>Profile Picture</li>
                                        <li>Email notification to admin</li>
                                        <li>Customizable Text For Login Icons</li>
                                        <li>Option to enable/disable user registration</li>
                                        <li>Basic Email Support</li>
                                        <li>Role Mapping</li>
                                        <li>Shortcodes to display social icons on<br/>any login page, post, popup and php pages</li>
                                        <li><a style="cursor: pointer" onclick="mo_openid_support_form('')">Click here to Contact Us</a></li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>

                            <li data-type="Recharge" class="momslp is-hidden" >
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-1</h2>
                                    <h3 style="color:black;">(Social Login Premium Applications)<br /><br /></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">10</h1></center>
                                </div>
                                <footer >
                                    <a href="#" style="padding-left: 32%" class="cd-select" onclick="mo_openid_support_form('[Plan-1.App integrations]')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>You will get the application of your choice integrated with the plugin with $10 each.</li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                            <br>
                            <li data-type="Recharge" class="momslp is-hidden">
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-4</h2>
                                    <h3 style="color:black;">(Email notification + GDPR + Account linking)<br /><br /></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">19</h1></center>
                                </div>
                                <footer >
                                    <a href="#" style="padding-left: 32%" class="cd-select" onclick="mo_openid_support_form('[Plan-4.Email notification+GDPR+Account linking],It seems that you have shown interest. Please elaborate more on your requirements ')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>You will get the email notification which will include notification for both user and admin.In addition with that you will get GDPR and account linking also.<br/>&nbsp;</li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                            <br>
                            <li data-type="Recharge" class="momslp is-hidden" >
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-7</h2>
                                    <h3 style="color:black;">(Mailchimp Integration)<br /><br /><br></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">25</h1></center>
                                </div>
                                <footer>
                                    <a href="#" style="padding-left: 32%" class="cd-select" onclick="mo_openid_support_form('[Plan-7.Mailchimp integration]')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>You will get the Mailchimp integration in this plan.<br><br></li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li><br>
                            <li data-type="Recharge" class="momslp is-hidden" >
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-10</h2>
                                    <h3 style="color:black;">(Premium Features)<br /><br /><br></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">19</h1></center>
                                </div>
                                <footer >
                                    <a href="#" style="padding-left: 32%" class="cd-select" onclick="mo_openid_support_form('[Plan-10.Premium Features]')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>In this plan you will get all the premium features.They are listed below:
                                            1.Force Admin To Login Using Password
                                            2.User Moderation
                                            3.Reset Password
                                            4.Redirect to social in a new window</li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                        </ul> <!-- .cd-pricing-wrapper -->
                    </li>

                    <li class="cd-popular">
                        <ul class="cd-pricing-wrapper">
                            <li data-type="regular_plans" class="mosslp is-visible">
                                <header class="cd-pricing-header">
                                    <h1 style="margin-bottom: 10px">STANDARD<br/></h1>
                                    <h3 style="color:black;">&nbsp;</h3>
                                    <h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;"><strike>39</strike> <img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">29</h1>
                                    <h3>(Features and plans)</h3>
                                </header> <!-- .cd-pricing-header -->

                                </a>
                                <footer >
                                    <a href="#" style="padding-left: 32%" class="cd-select" id="mosocial_purchase_cust_addon" onclick="mosocial_addonform('wp_social_login_standard_plan')"  >Upgrade Now</a>

                                </footer>

                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li><b>All Free features +</b></li>
                                        <li><div class="mo_openid_tooltip" style="padding-left: 40px;">32 Custom Social Login Apps <i class="mofa mofa-commenting " style="font-size:18px;color:#85929E"></i><span class="mo_openid_tooltiptext"style="width:100%;"> Using the custom app tab, you can set up your own app id and secret in the plugin. Login flow will not involve miniOrange in between. Login flow will go from plugin to social media application and then back to plugin.<br>32 custom apps are <span id="mo_openid_dots3">...</span><span id="mo_openid_more3" style="display:none" ><br>Facebook,Google,Yandex,<br/>vkontakte,Reddit,twitter,linkedin,<br>amazon,windowslive,yahoo,<br>apple,disqus,instagram,<br>wordpress,pinterest,spotify,<br>
                                                        tumblr,twitch,vimeo,kakao,<br>discord,dirbble,flickr,line,meetup,<br>naver,snapchat,foursquare,<br>teamsnap,stackexchange,livejournal & odnoklassniki.</span><button style="border:transparent;background-color: transparent;color: tomato;" onclick="myFunction('mo_openid_dots3','mo_openid_more3','mo_openid_myBtn3')" id="mo_openid_myBtn3">Read more</button>
                                            </div></li>
                                        <li>Advance Account Linking</li>
                                        <li style="padding-right: 0px; padding-left: 0px">General Data Protection Regulation (GDPR)</li>
                                        <li>BuddyPress Display Options</li>
                                        <li>Woocommerce Display Options</li>
                                        <li>Account Linking & Unlinking for user</li>
                                        <li>Email notification to multiple admins</li>
                                        <li>Welcome Email to end users</li>
                                        <li>Customizable Email Notification template</li>
                                        <li>Customizable welcome Email template</li>
                                        <li>Custom CSS for Social Login buttons</li>
                                        <li>Social Login Opens in a New Window</li>
                                        <li>Domain restriction</li>
                                        <li>Force Admin To Login Using Password</li>
                                        <li>Send username and password reset link</li>
                                        <li>Disable admin bar</li>
                                        <li>Google recaptcha</li>
                                        <li><a style="cursor: pointer" onclick="mo_openid_support_form('')">Click here to Contact Us</a></li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>

                            <li data-type="Recharge" class="momslp is-hidden" >
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-2</h2>
                                    <h3 style="color:black;">(Woocommerce Integrations)<br /><br /></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">25</h1></center>
                                </div>
                                <footer >
                                    <a href="#" style="padding-left: 32%" class="cd-select" onclick="mo_openid_support_form('[Plan-2.Woocommerce integration]')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>You will get Woocommerce integration with their display options.</li>

                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                            <br>
                            <li data-type="Recharge" class="momslp is-hidden" >
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-5</h2>
                                    <h3 style="color:black;">(Domain Restriction + Recaptcha + Password reset)<br /><br /></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">19</h1></center>
                                </div>
                                <footer>
                                    <a href="#" style="padding-left: 32%" class="cd-select" onclick="mo_openid_support_form('[Plan-5.Domain Restriction+Recaptcha+Password reset]')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>You will get Domain restriction,Recaptcha with both the versions and password reset feature in which user will get the link to their email for resetting the password.<br/>&nbsp;</li>

                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                            <br>
                            <li data-type="Recharge" class="momslp is-hidden" >
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-8</h2>
                                    <h3 style="color:black;">(Paid Membership Pro + GDPR + Email notification)<br /><br /></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">19</h1></center>
                                </div>
                                <footer>
                                    <a href="#" style="padding-left: 32%" class="cd-select" onclick="mo_openid_support_form('[Plan-8.Paid Membership Pro+GDPR+Email notification]')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>In this plan you will get the integration with Paid membership pro along with you will get email notification and GDPR.</li>

                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                            <br>
                            <li data-type="Recharge" class="momslp is-hidden" >
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-11</h2>
                                    <h3 style="color:black;">(Redirect to new window + Domain restriction)<br /><br /></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">19</h1></center>
                                </div>
                                <footer>
                                    <a href="#" style="padding-left: 32%" class="cd-select" onclick="mo_openid_support_form('[Plan-11.Redirect to new window+Domain restriction]')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>In this plan you will get the Redirect to social in a new window , as the name suggest a new window pops up with login form of respective app.You will also get Domain restriction in which you can restrict or allow the particular domain </li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                        </ul> <!-- .cd-pricing-wrapper -->
                    </li>

                    <li>
                        <ul class="cd-pricing-wrapper">
                            <li data-type="regular_plans" class="mosslp is-visible" >
                                <header class="cd-pricing-header">
                                    <h1 style="margin-bottom:10px;">PREMIUM</h1>
                                    <h3 style="color:red;">(Popular plugins integrations)</h3>
                                    <h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;"><strike>59</strike> <img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">49</h1>
                                    <h3>(Features and plans)</h3>
                                </header> <!-- .cd-pricing-header -->
                                </a>
                                <footer>
                                    <a href="#" style="padding-left: 32%" class="cd-select" id="mosocial_purchase_cust_addon" onclick="mosocial_addonform('wp_social_login_premium_plan')"  >Upgrade Now</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features ">
                                        <li><b>All Free features +</b></li>
                                        <li><div class="mo_openid_tooltip" style="padding-left: 40px;">32 Custom Social Login Apps <i class="mofa mofa-commenting " style="font-size:18px;color:#85929E"></i><span class="mo_openid_tooltiptext"style="width:100%;"> Using the custom app tab, you can set up your own app id and secret in the plugin. Login flow will not involve miniOrange in between. Login flow will go from plugin to social media application and then back to plugin.<br>32 custom apps are <span id="mo_openid_dots3">...</span><span id="mo_openid_more3" style="display:none" ><br>Facebook,Google,Yandex,<br/>vkontakte,Reddit,twitter,linkedin,<br>amazon,windowslive,yahoo,<br>apple,disqus,instagram,<br>wordpress,pinterest,spotify,<br>
                                                        tumblr,twitch,vimeo,kakao,<br>discord,dirbble,flickr,line,meetup,<br>naver,snapchat,foursquare,<br>teamsnap,stackexchange,livejournal & odnoklassniki.</span><button style="border:transparent;background-color: transparent;color: tomato;" onclick="myFunction('mo_openid_dots3','mo_openid_more3','mo_openid_myBtn3')" id="mo_openid_myBtn3">Read more</button>
                                            </div></li>
                                        <li><span class="mo_openid_tooltip">Custom attribute mapping <i class="mofa mofa-commenting" style="font-size:18px;color:#85929E"></i> <span class="mo_openid_tooltiptext"style="width:100%;">Extended attributes returned from social app are mapped to Custom attributes created by admin. These Attributes get stored in user_meta.</span></li>
                                        <li><span class="mo_openid_tooltip">Paid Membership pro Integration <i class="mofa mofa-commenting" style="font-size:18px;color:#85929E"></i> <span class="mo_openid_tooltiptext"style="width:100%;">Assign default levels or let users choose to set their levels provided by Paid Membership Pro to the users login using Social Login</span></li>
                                        <li><div class="mo_openid_tooltip" >BuddyPress Integration <i class="mofa mofa-commenting " style="font-size:18px;color:#85929E"> </i><span class="mo_openid_tooltiptext" style="width:100%;"> Extended attributes returned from social app are mapped to Custom BuddyPress fields. Profile picture from social media is mapped to Buddypress avatar.</span></li>
                                        <li><div class="mo_openid_tooltip" >Woocommerce Integration <i class="mofa mofa-commenting" style="font-size:18px;color:#85929E"></i> <span class="mo_openid_tooltiptext"style="width:100%;"> First name, last name and email are pre-filled in billing details of a user and on the Woocommerce checkout page. Social Login icons are displayed on the Woocommerce checkout page.</span></li>
                                        <li><div class="mo_openid_tooltip" >MailChimp Integration <i class="mofa mofa-commenting " style="font-size:18px;color:#85929E"> </i><span class="mo_openid_tooltiptext" style="width:100%;">A user is added as a subscriber to a mailing list in MailChimp when that user registers using Social Login. First name, last name and email are also captured for that user in the Mailing List. Option is available to download csv file that has list of emails of all users in WordPress.</span></li>
                                        <li>Ultimate Member Integration</li>
                                        <li><div class="mo_openid_tooltip" >miniOrange OTP Integration<span style="color: red">*</span> <i class="mofa mofa-commenting " style="font-size:18px;color:#85929E"> </i><span class="mo_openid_tooltiptext" style="width:100%;">Verify your users via OTP on registration.</span></li>
                                        <li><div class="mo_openid_tooltip" >Extended Profile Data <i class="mofa mofa-commenting " style="font-size:18px;color:#85929E"> </i><span class="mo_openid_tooltiptext" style="width:100%;">Extended profile data feature requires additional configuration. You need to have your own social media app and permissions from social media providers to collect extended user data.</span></li>
                                        <li><div class="mo_openid_tooltip" >Custom Integration <i class="mofa mofa-commenting " style="font-size:18px;color:#85929E"> </i><span class="mo_openid_tooltiptext" style="width:100%;"> If you have a specific custom requirement in the Social Login Plugin, we can implement and integrate it in the Plugin fo you. This includes all those custom features that come under the scope of Social Login/ Sharing/ Comments and impart additional value to the plugin. These features are chargeable. Please send us a query through the support forum to get in touch with us about your custom requirements.</span></div></li>
                                        <li>Send account activation link to the user</li>
                                        <li>Restrict registration from specific pages</li>
                                        <li>User Moderation</li>
                                        <li>Advance Account Linking</li>
                                        <li style="padding-right: 0px; padding-left: 0px">General Data Protection Regulation (GDPR)</li>
                                        <li>BuddyPress Display Options</li>
                                        <li>Woocommerce Display Options</li>
                                        <li>Account Linking & Unlinking for user</li>
                                        <li>Email notification to multiple admins</li>
                                        <li>Welcome Email to end users</li>
                                        <li>Customizable Email Notification template</li>
                                        <li>Customizable welcome Email template</li>
                                        <li>Custom CSS for Social Login buttons</li>
                                        <li>Social Login Opens in a New Window</li>
                                        <li>Domain restriction</li>
                                        <li>Force Admin To Login Using Password</li>
                                        <li>Send username and password reset link</li>
                                        <li>Disable admin bar</li>
                                        <li>Google recaptcha</li>
                                        <li><a style="cursor: pointer" onclick="mo_openid_support_form('')">Click here to Contact Us</a></li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->

                            </li>

                            <li data-type="Recharge" class="momslp is-hidden" >
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-3</h2>
                                    <h3 style="color:black;">(Buddypress Integrations)<br /><br /></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">25</h1></center>
                                </div>
                                <footer>
                                    <a href="#" style="padding-left: 32%" class="cd-select" onclick="mo_openid_support_form('[Plan-3.Buddypress Integrations]')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>You will get Buddypress integration with their display options.</li>

                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                            <br>
                            <li data-type="Recharge" class="momslp is-hidden" >
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-6</h2>
                                    <h3 style="color:black;">(User moderation+ Force admin)<br /><br /><br></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">19</h1></center>
                                </div>
                                <footer >
                                    <a href="#" style="padding-left: 32%" class="cd-select" onclick="mo_openid_support_form('[Plan-6.User moderation + Force admin]')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>You will get user moderation in which till the admin activate the account user can not use it and in Force admin feature admin will be forced to login using Password for security reasons.</li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                            <br>
                            <li data-type="Recharge" class="momslp is-hidden" >
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-9</h2>
                                    <h3 style="color:black;">(Recaptcha + GDPR)<br /><br /><br></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">19</h1></center>
                                </div>
                                <footer >
                                    <a href="#" style="padding-left: 32%" id="plan" class="cd-select" onclick="mo_openid_support_form('[Plan-9.Recaptcha +GDPR] ')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>You will get Recaptcha with both the versions and GDPR settings in this plan.<br><br></li>
                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>
                            <br>
                            <li data-type="Recharge" class="momslp is-hidden" >
                                <h2>&nbsp;</h2>
                                <center><h2 style="margin-bottom: 10px;margin-top: 1px;">Plan-12</h2>
                                    <h3 style="color:black;">(Email Notification)<br /><br /><br /></h3></center>
                                <div class="cd-price" style="align-content: center">
                                    <center><h1><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;">10</h1></center>
                                </div>
                                <footer >
                                    <a href="#" style="padding-left: 32%" class="cd-select" onclick="mo_openid_support_form('[Plan-12.Email notification]')" >Interested</a>
                                </footer>
                                <div class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li>You will get Email notification feature.It includes sending email to both admin and user during registration</li>

                                    </ul>
                                </div> <!-- .cd-pricing-body -->
                            </li>


                        </ul> <!-- .cd-pricing-wrapper -->
                    </li>
                </ul> <!-- .cd-pricing-list -->
            </div> <!-- .cd-pricing-container -->
            <div style="font-size: 15px; padding: 1%">
                <hr><h3>Available Add on</h3>
                <a style="text-decoration: none" target="_blank" href="<?php echo get_site_url() . "/wp-admin/admin.php?page=mo_openid_settings_addOn";?> ">Social Login Custom Registration Form Add on</a>
                <button style="margin-left: 2%; margin-top: -.5%" onclick="mosocial_addonform('wp_social_login_extra_attributes_addon')" id="mosocial_purchase_cust_addon" class="button button-primary button-large">Upgrade Now</button>
                <p style="font-size: 15px">Custom Registration Form Add-On helps you to integrate details of new as well as existing users. You can add as many fields as you want including the one which are returned by social sites at time of registration.</p>
            </div>
            <div class="clear" style="font-size:15px;padding: 1%">
                <hr>
                <h3>Refund Policy -</h3>
                <p style="font-size: 15px;">At miniOrange, we want to ensure you are 100% happy with your purchase. If the premium plugin you purchased is <b>not working as advertised</b> and you've <b>attempted to resolve any issues with our support team, which couldn't get resolved</b> then we will refund the whole amount within 10 days of the purchase. Please email us at <a href="mailto:info@xecurify.com"><i>info@xecurify.com</i></a> for any queries regarding the return policy.</p>
                <b>Not applicable for -</b>
                <ol>
                    <li>Returns that are because of features that are not advertised.</li>
                    <li>Returns beyond 10 days.</li>
                </ol>
            </div>
        </div>
    </div>
    <style>
        .table-onpremisetable2 th {
            background-color: #fcfdff;

            text-align: center;
            vertical-align:center;
        }

        .table-onpremisetable2 td {
            background-color: #fcfdff;

            text-align: center;
            vertical-align:center;
        }
        div.grid      { width: 100%; }
        div.grid div  { float: left; height: 10px; }
        div.col100    { width: 33%; }
        div.col300    { width: 33%; }
        div.clear     { clear: both; }

        .mo_table-bordered-license, .mo_table-bordered-license>tbody>tr{
            border: 1px solid #ddd;
            height: 40px;
            box-shadow: 0px 1px #ddd;
            /*margin-left:25%; */
        }

        .mo_table-bordered-license>thead>tr>th{
            vertical-align:top !important;
        }


        .mo_openid_tooltip {
            position: relative;
            display: inline-block;
            opacity:1;


        }
        .mo_openid_tooltip .mo_openid_tooltiptext {
            padding:15px 20px 20px 20px;
            visibility: hidden;
            width: 20px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
            left: 50%;


        }

        .mo_openid_tooltip .mo_openid_tooltiptext::after {
            content: "";
            position: absolute;
            bottom: 100%;
            left: 60%;
            margin-left: -60px;
            border-width: 5px;
            border-style: solid;
            border-color: transparent transparent black transparent;
        }

        .mo_openid_tooltip:hover .mo_openid_tooltiptext {
            visibility: visible;
        }

        .mo_openid_tooltip .mo_tooltiptext1 {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding:10px 5px 5px 5px;
            position: absolute;
            z-index: 1;
            top: 150%;
            left: 50%;
            margin-left: -60px;


        }

        .mo_openid_tooltip .mo_tooltiptext1::after {
            content: "";
            position: absolute;
            bottom: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: transparent transparent black transparent;
        }

        .mo_openid_tooltip:hover .mo_tooltiptext1 {
            visibility: visible;
        }

        h1 {
            margin: .67em 0;
            font-size: 2em;
        }
        .tab-content-plugins-pricing div {
            background: #173d50;
        }
    </style>



    <form style="display:none;" id="mosocial_loginform" action="<?php echo get_option( 'mo_openid_host_name' ) . '/moas/login'; ?>"
          target="_blank" method="post" >
        <input type="email" name="username" value="<?php echo esc_attr(get_option('mo_openid_admin_email')); ?>" />
        <input type="text" name="redirectUrl" value="<?php echo esc_attr(get_option( 'mo_openid_host_name')).'/moas/initializepayment'; ?>" />
        <input type="text" name="requestOrigin" id="requestOrigin"/>
    </form>
    <script>
        //to set heading name
        jQuery('#mo_openid_page_heading').text('Licensing Plan For Social Login');

        function myFunction(dots_id,read_id,btn_id) {

            var dots = document.getElementById(dots_id);
            var moreText = document.getElementById(read_id);
            var btnText = document.getElementById(btn_id);

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Close";
                moreText.style.display = "inline";
            }
        }
        function mosocial_addonform(planType) {
            jQuery.ajax({
                url: "<?php echo admin_url("admin-ajax.php");?>", //the page containing php script
                method: "POST", //request type,
                dataType: 'json',
                data: {
                    action: 'mo_register_customer_toggle_update',
                },
                success: function (result) {
                    if(result.status){
                        jQuery('#requestOrigin').val(planType);
                        jQuery('#mosocial_loginform').submit();
                    }
                    else
                    {
                        alert("It seems you are not registered with miniOrange. Please login or register with us to upgrade to premium plan.");
                        window.location.href="<?php echo site_url()?>".concat("/wp-admin/admin.php?page=mo_openid_general_settings&tab=profile");
                    }
                }
            });
        }

        jQuery("input[name=sitetype]:radio").change(function() {

            if (this.value == 'Recharge') {
                jQuery('.mosslp').removeClass('is-visible').addClass('is-hidden');
                jQuery('.momslp').addClass('is-visible').removeClass('is-hidden is-selected');

            }
            else if(this.value == 'regular_plans'){
                jQuery('.mosslp').addClass('is-visible').removeClass('is-hidden');
                jQuery('.momslp').removeClass('is-visible').addClass('is-hidden is-selected');
            }
        });

        jQuery(document).ready(function($){
            //hide the subtle gradient layer (.cd-pricing-list > li::after) when pricing table has been scrolled to the end (mobile version only)
            checkScrolling($('.cd-pricing-body'));
            $(window).on('resize', function(){
                window.requestAnimationFrame(function(){checkScrolling($('.cd-pricing-body'))});
            });
            $('.cd-pricing-body').on('scroll', function(){
                var selected = $(this);
                window.requestAnimationFrame(function(){checkScrolling(selected)});
            });

            function checkScrolling(tables){
                tables.each(function(){
                    var table= $(this),
                        totalTableWidth = parseInt(table.children('.cd-pricing-features').width()),
                        tableViewport = parseInt(table.width());
                    if( table.scrollLeft() >= totalTableWidth - tableViewport -1 ) {
                        table.parent('li').addClass('is-ended');
                    } else {
                        table.parent('li').removeClass('is-ended');
                    }
                });
            }

            //switch from monthly to annual pricing tables

            function show_selected_items(selected_elements) {
                selected_elements.addClass('is-selected');
            }

            function hide_not_selected_items(table_containers, filter) {
                $.each(table_containers, function(key, value){
                    if ( key != filter ) {
                        $(this).removeClass('is-visible is-selected').addClass('is-hidden');

                    } else {
                        $(this).addClass('is-visible').removeClass('is-hidden is-selected');
                    }
                });
            }
        });
    </script>
    <?php
}

function mo_openid_licensing_plans_addon()
{
    ?>
    <td style="vertical-align:top;width:100%;">
        <div class="mo_openid_table_layout" style="min-height:625px; margin-left: 6%">
            <div class="grid">
                <div style="width: 25%;"></div>
                <div class="col100 red">
                    <table class="table mo_table-bordered-license mo_table-striped-license" style="width: 150%;">
                        <thead>
                        <tr style="background-color:#F5F5F5;">
                            <th width="400px;"><br>
                                <h1><font color="#00CED1">Custom Registration Form</font></h1>
                                <h1><font color="#00CED1">Add-On</font></h1>
                                <h1>
                                    <img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>includes/images/dollar.png" style="width:20px;height:20px;"><strike>19</strike>
                                    <img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))); ?>includes/images/dollar.png" style="width:20px;height:20px;">15</h1>
                                <h3>Features/ Plan</h3></th>
                        </tr>
                        <tr>
                            <th><button onclick="mosocial_addonform('wp_social_login_extra_attributes_addon')"
                                        id="mosocial_purchase_cust_addon"
                                        class="button-plan">Upgrade Now</button></th>
                        </tr>
                        </thead>
                        <tbody class="mo_align-center mo-fa-icon">
                        <tr>
                            <td>Map users data which is returned from social apps</td>
                        </tr>
                        <tr>
                            <td>Create a pre-registration form</td>
                        </tr>
                        <tr>
                            <td>The form can support any theme</td>
                        </tr>
                        <tr>
                            <td>Ability to add custom fields in the registration form</td>
                        </tr>
                        <tr>
                            <td>Edit Profile option using shortcode</td>
                        </tr>
                        <tr>
                            <td>Support input field types: text, date, checkbox or dropdown</td>
                        </tr>
                        <tr>
                            <td>Optional mandatory fields</td>
                        </tr>
                        <tr>
                            <td>Synchronization existing meta field</td>
                        </tr>
                        <tr>
                            <td><a target="_blank"
                                   href="<?php echo get_site_url() . "/wp-admin/admin.php?page=mo_openid_settings&tab=login"; ?> ">Contact
                                    Us using Support Form</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="clear">
            <hr>
            <h3>Refund Policy -</h3>
            <p><b>At miniOrange, we want to ensure you are 100% happy with your purchase. If the premium plugin you
                    purchased is not working as advertised and you've attempted to resolve any issues with our support
                    team, which couldn't get resolved then we will refund the whole amount within 10 days of the
                    purchase. Please email us at <a href="mailto:info@xecurify.com"><i>info@xecurify.com</i></a> for any
                    queries regarding the return policy.</b></p>
            <b>Not applicable for -</b>
            <ol>
                <li>Returns that are because of features that are not advertised.</li>
                <li>Returns beyond 10 days.</li>
            </ol>
        </div>
        <style>
            div.grid {
                width: 850px;
            }

            div.grid div {
                float: left;
                height: 10px;
            }

            div.col100 {
                width: 250px;
            }

            div.col200 {
                width: 50px;
            }

            div.col300 {
                width: 250px;
            }

            div.clear {
                clear: both;
            }

            .mo_table-bordered-license, .mo_table-bordered-license > tbody > tr {
                border: 1px solid #ddd;
                height: 40px;
                box-shadow: 0px 1px #ddd;
                /*margin-left:25%; */
            }

            .mo_table-bordered-license > thead > tr > th {
                vertical-align: top !important;
            }

            .button-plan {
                background-color: #00CED1;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 15px;
                cursor: pointer;
                width: 360px;
            }

            .button-plans {
                background-color: #000000;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
                width: 280px;
            }

            .mo_openid_highlight {
                background-color: #0867b2;
                padding: 30px 30px 30px 30px;
                color: #fff;
            }

            .tooltip {
                position: relative;
                display: inline-block;
                opacity: 1;


            }

            .tooltip .tooltiptext {
                padding: 15px 20px 20px 20px;
                visibility: hidden;
                width: 20px;
                background-color: black;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                position: absolute;
                z-index: 1;
                left: 50%;
                margin-left: -160px;

            }

            .tooltip .tooltiptext::after {
                content: "";
                position: absolute;
                bottom: 100%;
                left: 60%;
                margin-left: -60px;
                border-width: 5px;
                border-style: solid;
                border-color: transparent transparent black transparent;
            }

            .tooltip:hover .tooltiptext {
                visibility: visible;
            }

            .tooltip .tooltiptext1 {
                visibility: hidden;
                width: 120px;
                background-color: black;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 10px 5px 5px 5px;
                position: absolute;
                z-index: 1;
                top: 150%;
                left: 50%;
                margin-left: -60px;


            }

            .tooltip .tooltiptext1::after {
                content: "";
                position: absolute;
                bottom: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: transparent transparent black transparent;
            }

            .tooltip:hover .tooltiptext1 {
                visibility: visible;
            }
        </style>
        <script>
            //to set heading name
            jQuery('#mo_openid_page_heading').text('<?php echo mo_sl('Licensing Plan For Social Login');?>');
            function mosocial_addonform(planType) {
                jQuery.ajax({
                    url: "<?php echo admin_url("admin-ajax.php");?>", //the page containing php script
                    method: "POST", //request type,
                    dataType: 'json',
                    data: {
                        action: 'mo_register_customer_toggle_update',
                    },
                    success: function (result) {
                        if(result.status){
                            jQuery('#requestOrigin').val(planType);
                            jQuery('#mosocial_loginform').submit();
                        }
                        else
                        {
                            alert("It seems you are not registered with miniOrange. Please login or register with us to upgrade to premium plan.");
                            window.location.href="<?php echo site_url()?>".concat("/wp-admin/admin.php?page=mo_openid_general_settings&tab=profile");
                        }
                    }
                });
            }
        </script>



    <td>
        <form style="display:none;" id="mosocial_loginform" action="<?php echo get_option( 'mo_openid_host_name' ) . '/moas/login'; ?>"
              target="_blank" method="post" >
            <input type="email" name="username" value="<?php echo esc_attr(get_option('mo_openid_admin_email')); ?>" />
            <input type="text" name="redirectUrl" value="<?php echo esc_attr(get_option( 'mo_openid_host_name')).'/moas/initializepayment'; ?>" />
            <input type="text" name="requestOrigin" id="requestOrigin"/>
        </form>
    </td>
    <?php
}