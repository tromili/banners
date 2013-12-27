$(function(){

     $('a[href*=#]').click(function() {

     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
         && location.hostname == this.hostname) {

             var $target = $(this.hash);

             $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

             if ($target.length) {

                 var targetOffset = $target.offset().top;

                 $('html,body').animate({scrollTop: targetOffset}, 1000);

                 return false;

            }

       }

   });

});

$('.previous').click(function (e) {
    e.preventDefault();
    var exampleId = $('.divs.open').attr('id');
    var selector = "a.links[href='#" + exampleId + "']";
    var link = $(selector);
    var prev = link.parent().prev().find('a.links');    
});