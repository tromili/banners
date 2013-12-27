$('.previous').click(function (e) {
    e.preventDefault();
    var exampleId = $('.divs.open').attr('id');
    var selector = "a.links[href='#" + exampleId + "']";
    var link = $(selector);
    var prev = link.parent().prev().find('a.links');    
});