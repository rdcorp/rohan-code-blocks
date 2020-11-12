document.getElementById('targetElement').scrollIntoView({behavior: 'smooth'});
jQuery(document).ready(function(){
  jQuery([document.documentElement, document.body]).animate({
    scrollTop: jQuery("#targetElement").offset().top
  }, 500);
});
