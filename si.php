<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>snap.svg动画 与 css3动画</title>
  <style>
   .si-icons{ background-color: green !important; }
   svg.si{ width:60px;height: 60px;fill:green;transition: .2s all; }
   svg.si:hover{ fill:#af1259;width:120px; }
  </style>
  <script src="js/snap.svg-min.js"></script>
</head>
<body>
<section class="si-icons si-icons-easing">
  <span class="si-icon si-reverse si-icon-nav-left-arrow" data-name="navLeftArrow"></span>
</section>
<?php include('svg/icon.svg'); ?>
<svg class="si"><use xlink:href="#si-ant-arrow-left"/></svg>
<script src="js/svgicons-config.js"></script>
<script src="js/svgicons.js"></script>
<script>
  (function() {
    // initialize all

    // [].slice.call( document.querySelectorAll( '.si-icons-default' ) ).forEach( function( el ) {
    //   var svgicon = new svgIcon( el, svgIconConfig );
    // } );

    new svgIcon( document.querySelector( '.si-icons-easing .si-icon-nav-left-arrow' ), svgIconConfig, { easing : mina.backin } );
    // new svgIcon( document.querySelector( '.si-icons-easing .si-icon-hamburger-cross' ), svgIconConfig, { easing : mina.elastic, speed: 600 } );

    // new svgIcon( document.querySelector( '.si-icons-hover .si-icon-clock' ), svgIconConfig, { easing : mina.backin, evtoggle : 'mouseover', size : { w : 128, h : 128 } } );
  })();
</script>
</body>
</html>