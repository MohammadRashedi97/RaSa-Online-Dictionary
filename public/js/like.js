$(document).ready(function() {

     var _token = $('input[name="_token"]').val();
     var likeOrDislike;

     $('.persian-like-div').click(function() {
          var id = $(this).data('id');  //record id
          var like = $(this).children('.like');
          likeOrDislike = 1;  //like

          $.ajax({
               url: "/persian-definition/{id}/like",  // route url
               method: "POST",          // method
               data: { id: id, likeOrDislike: likeOrDislike, _token: _token},
               success: function (data)
               {
                    if(data == 'undefined')
                    {
                         alert("You can't like without logging in!");
                         return;
                    }
                    else
                    {
                         if(data == 'already_disliked')
                         {
                              alert("You already disliked the post so you can't like it");
                              return;
                         }
                         else
                         {
                              $(like).html(data);
                         }
                    }
               }
          });
     });

     $('.persian-dislike-div').click(function() {
          var id = $(this).data('id');
          var dislike = $(this).children('.dislike');
          likeOrDislike = 0;       //dislike

          $.ajax({
               url: "/persian-definition/{id}/dislike",
               method: "POST",
               data: { id: id, likeOrDislike: likeOrDislike, _token: _token},
               success: function (data)
               {
                    if(data == 'undefined')
                    {
                         alert("You can't dislike without logging in!");
                         return;
                    }
                    else
                    {
                         if(data == 'already_liked')
                         {
                              alert("You already liked the post so you can't dislike it");
                              return;
                         }
                         else
                         {
                              $(dislike).html(data);
                         }
                    }
               }
          });
     });



     $('.english-like-div').click(function() {
          var id = $(this).data('id');  //record id
          var like = $(this).children('.like');
          likeOrDislike = 1;  //like

          $.ajax({
               url: "/english-definition/{id}/like",  // route url
               method: "POST",          // method
               data: { id: id, likeOrDislike: likeOrDislike, _token: _token},
               success: function (data)
               {
                    if(data == 'undefined')
                    {
                         alert("You can't like without logging in!");
                         return;
                    }
                    else
                    {
                         if(data == 'already_disliked')
                         {
                              alert("You already disliked the post so you can't like it");
                              return;
                         }
                         else
                         {
                              $(like).html(data);
                         }
                    }
               }
          });
     });

     $('.english-dislike-div').click(function() {
          var id = $(this).data('id');
          var dislike = $(this).children('.dislike');
          likeOrDislike = 0;       //dislike

          $.ajax({
               url: "/english-definition/{id}/dislike",
               method: "POST",
               data: { id: id, likeOrDislike: likeOrDislike, _token: _token},
               success: function (data)
               {
                    if(data == 'undefined')
                    {
                         alert("You can't dislike without logging in!");
                         return;
                    }
                    else
                    {
                         if(data == 'already_liked')
                         {
                              alert("You already liked the post so you can't dislike it");
                              return;
                         }
                         else
                         {
                              $(dislike).html(data);
                         }
                    }
               }
          });
     });




     $('.example-like-div').click(function() {
          var id = $(this).data('id');  //record id
          var like = $(this).children('.like');
          likeOrDislike = 1;  //like

          $.ajax({
               url: "/example/{id}/like",  // route url
               method: "POST",          // method
               data: { id: id, likeOrDislike: likeOrDislike, _token: _token},
               success: function (data)
               {
                    if(data == 'undefined')
                    {
                         alert("You can't like without logging in!");
                         return;
                    }
                    else
                    {
                         if(data == 'already_disliked')
                         {
                              alert("You already disliked the post so you can't like it");
                              return;
                         }
                         else
                         {
                              $(like).html(data);
                         }
                    }
               }
          });
     });

     $('.example-dislike-div').click(function() {
          var id = $(this).data('id');
          var dislike = $(this).children('.dislike');
          likeOrDislike = 0;       //dislike

          $.ajax({
               url: "/example/{id}/dislike",
               method: "POST",
               data: { id: id, likeOrDislike: likeOrDislike, _token: _token},
               success: function (data)
               {
                    if(data == 'undefined')
                    {
                         alert("You can't dislike without logging in!");
                         return;
                    }
                    else
                    {
                         if(data == 'already_liked')
                         {
                              alert("You already liked the post so you can't dislike it");
                              return;
                         }
                         else
                         {
                              $(dislike).html(data);
                         }
                    }
               }
          });
     });


});