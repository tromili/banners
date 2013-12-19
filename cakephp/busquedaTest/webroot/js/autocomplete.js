(function($) {
  $(document).ready(function() {
    var path = "/banners/cakephp/busquedaTest/products/";
    var cache = {};
    var accentMap = {
      "á": "a",
      "é": "e",
      "í": "i",
      "ó": "o",
      "ú": "u",
    };
    var normalize = function (str) {
      var result = '';
      for (var i = 0; i < str.length; i++) {
        result += accentMap[ str.charAt(i) ] || str.charAt(i);
      }
      return result;
    };
    // SUBMIT FORM
    $( "#ProductSearchForm" ).submit(function( event ) {
      var name = normalize($( "#autoc" ).val());
      if ($('input[name=show]').val() == '0') {
        window.location.replace(path+"search/"+name);
        //$( "#ProductSearchForm" ).submit();
        event.preventDefault();
      }
      $( "#results" ).hide('slow');
      $( "#results" ).empty();
      $.ajax({
        url: path+'getData/'+name,
        dataType: 'json',
        success: function( data ){
          var all = "<h3>All Results</h3>";
          var items = [];
          for (var i = 0; i < data.length; i++) {
              items.push("<ul><li>Name: "+data[i]['Product']['name']+
                "</li><li>Description: "+data[i]['Product']['description']+
                "</li><li>Price: "+data[i]['Product']['price']+
                "</li></ul><br>"
              );
          };
          $( "<ul/>", {
            "class": "result-list",
            html: all+items.join( "" )
          }).appendTo( "#results" );
          $("#results").show('slow');
        }//success
      });
      event.preventDefault();
    });
    // SHOW ALL RESULTS BUTTON
    $( "#showall" ).click(function() {
      $( "#ProductSearchForm" ).submit();
    });
    // AUTOCOMPLETE
    $( "#autoc" ).autocomplete({
      source: function( request, response ) {
        request.term = normalize( request.term.toLowerCase() );
        var term = request.term;
        if ( term in cache ) {
          response( cache[ term ] );
          return;
        }
        $.getJSON( path+"autoComplete/",
          request, function( data, status, xhr ) {
          cache[ term ] = data;
          response( data );
        });
      },
      minLength: 3,
      focus: function( event, ui ) {
        //$('#autoc').val(ui.item.Product.name);
        event.preventDefault();
      },
      select: function( event, ui ) {
        //console.log(ui.item.Product.name);
        if ($('input[name=show]').val() == '1') {
          $( "#results" ).hide('slow');
          $( "#results" ).empty();
          var id = ui.item.Product.id;
          var name = ui.item.Product.name;
          $( "#autoc" ).val(name);
          $.ajax({
            url: path+'getData/'+name+'/ac',
            dataType: 'json',
            success: function( data ){
              var best = "<h3>Best Results</h3>";
              var items = [];
              for (var i = 0; i < data.length; i++) {
                if (data[i]['Product']['id'] != id) { 
                  items.push("<ul><li>Name: "+data[i]['Product']['name']+
                    "</li><li>Description: "+data[i]['Product']['description']+
                    "</li><li>Price: "+data[i]['Product']['price']+
                    "</li></ul><br>"
                  );
                } 
                else {
                  best += "<ul><li>Name: "+data[i]['Product']['name']+
                    "</li><li>Description: "+data[i]['Product']['description']+
                    "</li><li>Price: "+data[i]['Product']['price']+
                    "</li></ul><br>";
                };
              };
              $( "<ul/>", {
                "class": "result-list",
                html: best + items.join( "" )
              }).appendTo( "#results" );
              $("#results").show('slow');
            }//success
          });
          event.preventDefault();
        };
      }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        var href = '';
        if ( $('input[name=show]').val() == '0' ) {
          href += " href='products/search/" + item.Product.name + '/' + item.Product.id + "'";
        };
        return $("<li></li>").data("ui-autocomplete-item", item)
          .append("<a"+href+">" + item.Product.name + "</a>")
          .appendTo(ul);
      };
    if ($( "#autoc" ).val()) {  
      if ($('input[name=show]').val() == '1') {
        $( "#showall" ).click();
      }
    };
  });
})(jQuery);