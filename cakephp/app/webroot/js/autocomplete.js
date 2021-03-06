(function($) {
  $(document).ready(function() {
    var main = "/banners/cakephp/"; //change this if necessary 
    var path = main + "banners/";
    var photo_dir = main + "files/banner/photo/";
    var page = 1;
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
      var hasNext = data.pop();
      if (hasNext)
        $( "#pagination" ).show("fast")
      else
        $( "#pagination" ).hide("fast")
      if (id == -1)
        var h = "<hr>";
      else if (id)
        var h = "<h3>Mejores Resultados</h3>";
      else
        var h = "<h3>Todos los Resultados</h3>";
      var items = [];
      for (var i = 0; i < data.length; i++) {
        var tmp = "<div class='row-fluid'>";
        var span1 = "<div class='span6'>"+
          "<h4>"+data[i]['Banner']['name']+"</h4>"+
          "<p>"+data[i]['Banner']['description']+"</p>"+
          "<h5>Tamaño "+data[i]['Banner']['measure']+"</h5></div>";
        var photo_path =  photo_dir+data[i]['Banner']['photo_dir']+"/"+
          data[i]['Banner']['photo']+"' alt="+data[i]['Banner']['photo'];
        var span2 = "<div class='span6'>"+"<a href='"+photo_path+"'><img src='"+photo_path+
        "' alt="+data[i]['Banner']['photo']+"></a></div>";
        var end_tmp = "</div></div><br><hr><br>";
        if (i == data.length-1)
          end_tmp = "</div></div><br>";
        if (i%2)
          tmp += span2 + span1 + end_tmp;
        else
          tmp += span1 + span2 + end_tmp;
        if (id || (data[i]['Banner']['id'] != id))
          items.push(tmp);
        else
          h += tmp;
      }
      return h + items.join( "" )
    };
    // SUBMIT FORM
    $( "#SearchForm" ).submit(function( event ) {
      $( "#loading" ).show("fast");
      page = 1;
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
          $( "<div/>", {
            "class": "span12",
            html: html_banner(data, false)
          }).appendTo( "#results" );
          $("#results").show('slow');
          $("#showallbutton").hide("fast");
          $( "#loading" ).hide("fast");
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
    // MORE RESULTS BUTTON
    $( "#more" ).click(function() {
      $( "#pagination" ).hide("fast");
      $( "#loading" ).show("fast");
      page++;
      var order = $( "#order" ).val();
      var searchOption = $( "#searchOption" ).val();
      var name = normalize($( "#autoc" ).val());
      var size = $( "#measure").val();
      if (! name)
        name = 'todos';
      $.ajax({
        url: path+'getData/'+name+'/nac/'+searchOption+'/'+order+'/'+size+'/page:'+page,
        dataType: 'json',
        success: function( data ) {
          $( "<div/>", {
            "class": "span12",
            html: html_banner(data, -1)
          }).appendTo( "#results" );
          $( "#loading" ).hide("fast");
        }//success
      });
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
              $( "<div/>", {
                "class": "span12",
                html: html_banner(data, id)
              }).appendTo( "#results" );
              $("#pagination").hide("fast");
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
          href += " href='banners/search/" + item.Banner.name + "'";
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
