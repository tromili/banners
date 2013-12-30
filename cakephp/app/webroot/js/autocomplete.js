(function($) {
  $(document).ready(function() {
    var main = "/banners/cakephp/";
    var path = main + "banners/";
    var photo_dir = main + "/files/banner/photo/";
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
    var html_banner = function (data, id) {
      if (id)
        var h = "<h3>Mejores Resultados</h3>";
      else
        var h = "<h3>Todos los Resultados</h3>";
      var items = [];
      for (var i = 0; i < data.length; i++) {
        var tmp = "<ul class='banner'><li>Nombre: "+data[i]['Banner']['name']+
          "</li><li>Descripción: "+data[i]['Banner']['description']+
          "</li><li>Medida: "+data[i]['Banner']['measure']+ 
          "</li><li><img src='"+
          photo_dir+data[i]['Banner']['photo_dir']+"/"+
          data[i]['Banner']['photo']+"' alt="+data[i]['Banner']['photo']+
          " height='400' width='400'>"+
          "</li></ul><br>";
        if (id || (data[i]['Banner']['id'] != id))
          items.push(tmp);
        else
          h += tmp;
      }
      return h + items.join( "" )
    };
    // SUBMIT FORM
    $( "#SearchForm" ).submit(function( event ) {
      var order = $( "#order" ).val();
      var searchOption = $( "#searchOption" ).val();
      var name = normalize($( "#autoc" ).val());
      var size = $( "#measure").val();
      if (! name)
        name = 'todos';
      if ($('input[name=show]').val() == '0') {
        window.location.replace(path+"search/"+name);
        event.preventDefault();
      }
      $( "#results" ).hide('slow');
      $( "#results" ).empty();
      $.ajax({
        url: path+'getData/'+name+'/nac/'+searchOption+'/'+order+'/'+size,
        dataType: 'json',
        success: function( data ){
          $( "<ul/>", {
            "class": "result-list",
            html: html_banner(data, false)
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
    // BUSCAR BUTTON
    $( "#showall2" ).click(function() {
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
        event.preventDefault();
      },
      select: function( event, ui ) {
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
              $( "<ul/>", {
                "class": "result-list",
                html: html_banner(data, id)
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
    // IF PATH IS .../banners/search
    if ($( "#autoc" ).val()) {  
      if ($('input[name=show]').val() == '1') {
        $( "#showall" ).click();
      }
    };
  });
})(jQuery);