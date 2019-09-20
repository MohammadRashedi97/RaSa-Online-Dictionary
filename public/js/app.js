// CSRF token
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

// When document is ready
$(document).ready(function () {

   $('#search').val("");

   if(localStorage['radio-button'] == 'english')
   {
      $("#english-persian").prop("checked", true);
      $('#search').addClass('text-left');
      $('#search').attr('placeholder', 'Search for a word').val("").focus().blur();
   }

   if(localStorage['radio-button'] == 'persian')
   {
      $("#persian-english").prop("checked", true);
      $('#search').addClass('text-right');
      $('#search').attr('placeholder', 'جستجو برای یک کلمه').val("").focus().blur();
   }


   // don't allow search form to submit empty strings(with trimming)
   $('#search-form').submit(function () {
      if ($.trim($("#search").val()) === "") {
         alert('Search can not be empty!');
         return false;
      }
   });

   // Autocomplete functionality for the search input with jquery-ui autocomplete
   $("#search").autocomplete({
      source: function (request, response) {
         // Fetch data
         $.ajax({
            url: "/fetch",
            type: 'post',
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
            success: function (data) {
               response(data);
            }
         });
      },
      // fill the search input with selected item
      select: function (event, ui) {
         // Set selection
         $('#search').val(ui.item.label); // display the selected text
         return false;
      }
   });

   // American pronunciation
   $('#pronounce-US').click(function () {
      var word = $('#word').text();
      responsiveVoice.speak(word, "US English Female");
   });

   // British Pronunciation
   $('#pronounce-UK').click(function () {
      var word = $('#word').text();
      responsiveVoice.speak(word, "UK English Male");
   });

   // Toggle the fropdown
   $('.dropdown-toggle').dropdown();

   // fade the alert
   $('.alert-message').fadeOut(3000);

   var english_persian = $('#english-persian');
   var persian_english = $('#persian-english');
   var searchInput = $('#search');
   english_persian.change(function() {
      localStorage['radio-button'] = 'english';
      searchInput.removeClass('text-right');
      searchInput.addClass('text-left');
      searchInput.attr('placeholder', 'Search for a word').val("").focus().blur();
   });

   persian_english.change(function() {
      localStorage['radio-button'] = 'persian';
      searchInput.removeClass('text-left');
      searchInput.addClass('text-right');
      searchInput.attr('placeholder', 'جستجو برای یک کلمه').val("").focus().blur();
   });

});
