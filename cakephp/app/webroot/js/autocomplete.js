(function($) {
  $(document).ready(function() {
    var path = "/banners/cakephp/banners/";
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
    $( "#SearchForm" ).submit(function( event ) {
      var order = $( "#order" ).val();
      var searchOption = $( "#searchOption" ).val();
      var name = normalize($( "#autoc" ).val());
      if ($('input[name=show]').val() == '0') {
        window.location.replace(path+"search/"+name);
        event.preventDefault();
      }
      $( "#results" ).hide('slow');
      $( "#results" ).empty();
      $.ajax({
        url: path+'getData/'+name+'/nac/'+searchOption+'/'+order,
        dataType: 'json',
        success: function( data ){
          var all = "<h3>All Results</h3>";
          var items = [];
          for (var i = 0; i < data.length; i++) {
              items.push("<ul><li>Name: "+data[i]['Banner']['name']+
                "</li><li>Description: "+data[i]['Banner']['description']+
                "</li><li>Price: "+data[i]['Banner']['price']+
                "</li></ul><br>"
              );
          };
          $( "<ul/>", {
            "class": "result-list",
            html: all+items.join( "" )
          }).appendTo( "#results" );
          $("#results").show('slow');
          $("#showallbutton").hide("fast");
        }//success
      });
      event.preventDefault();
    });
    // SHOW ALL RESULTS BUTTON
    $( "#showall" ).click(function() {
      $( "#SearchForm" ).submit();
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
          var id = ui.item.Banner.id;
          var name = ui.item.Banner.name;
          $( "#autoc" ).val(name);
          $.ajax({
            url: path+'getData/'+name+'/ac',
            dataType: 'json',
            success: function( data ){
              var best = "<h3>Best Results</h3>";
              var items = [];
              for (var i = 0; i < data.length; i++) {
                if (data[i]['Banner']['id'] != id) { 
                  items.push("<ul><li>Name: "+data[i]['Banner']['name']+
                    "</li><li>Description: "+data[i]['Banner']['description']+
                    "</li><li>Price: "+data[i]['Banner']['price']+
                    "</li></ul><br>"
                  );
                } 
                else {
                  best += "<ul><li>Name: "+data[i]['Banner']['name']+
                    "</li><li>Description: "+data[i]['Banner']['description']+
                    "</li><li>Price: "+data[i]['Banner']['price']+
                    "</li></ul><br>";
                };
              };
              $( "<ul/>", {
                "class": "result-list",
                html: best + items.join( "" )
              }).appendTo( "#results" );
              $("#results").show('slow');
              $("#showallbutton").show("slow");
            }//success
          });
          event.preventDefault();
        };
      }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        var href = '';
        if ( $('input[name=show]').val() == '0' ) {
          href += " href='banners/search/" + item.Banner.name + '/' + item.Banner.id + "'";
        };
        return $("<li></li>").data("ui-autocomplete-item", item)
          .append("<a"+href+">" + item.Banner.name + "</a>")
          .appendTo(ul);
      };
    // IF PATH IS .../products/search
    if ($( "#autoc" ).val()) {  
      if ($('input[name=show]').val() == '1') {
        $( "#showall" ).click();
      }
    };
  });
})(jQuery);