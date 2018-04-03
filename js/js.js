($(document).ready(function () {


  var value = 10;
    var $loader = $("#l-oader");
    var $input = $(".form-control");
    load_more_books();

    $("button").click(function(){
      value +=10;
      load_more_books();
    });

    $("#search").click(function(){
      var s = $input.val().trim().toLowerCase();
      $input.val("");
      search(s);
    });
    $("form").submit(function(){
        event.preventDefault();
      var s = $input.val().trim().toLowerCase();
      $input.val("");
      search(s);
      });

    function search(key_word){
      $.post("./inc/search_for_books.php",{
        name: "search",
        search_for:key_word
       },
       function(data, status){
         // $loader.removeClass("loader");
        //  $("#books-container").html(data);
          $("#books-container").html(data);

       });
     //  $loader.addClass("loader");
    }
    function load_more_books(){
      $.post("./inc/load_more_books.php",{
        name: "load_more_books",
        limit:value
       },
       function(data, status){
          $loader.removeClass("loader");
          $("#books-container").append(data);

       });
       $loader.addClass("loader");
    }




}));
