$(document).ready(function(){
        $('.submitBtn').on('click',function(){
          var post_id = $('#form').attr("data-id");
          var action = $('#form').attr("data-info");
          $('#form').attr('action',action+post_id);
        });
        $('.delete').on('click',function(e){
          e.preventDefault();
          var r = confirm("Vous voulez supprimer se commentaire ?");
          if(r){
              var comment_id = $(this).attr("data-id");
              var action = $(this).attr("data-info");
              $(this).closest(".formCom").attr('action',action+comment_id);
              $(this).closest(".formCom").submit();
          }
        });
        $('.edit').on('click',function (e) {
            e.preventDefault();
            var p = $(this).parent().parent().parent();
            var txt = p.children("p").text();
            p.children('.editComment').children('.commentText').val(txt);
            p.children('.editComment').show();
            p.children("p").hide();

            p.children('.editComment').children('#annulerEdit').on('click',function(e){
              e.preventDefault();
              $(this).parent().siblings("p").show();
              $(this).parent().hide();
            })

            p.children('.editComment').children('#submitEdit').on('click',function(e){
              e.preventDefault();
              var r = confirm("Vous voulez modifier se commentaire ?");
              if(r){
                  var comment_id = $(this).parent().siblings("h4").children('.formCom').children('.edit').attr("data-id");
                  var action = $(this).parent().siblings("h4").children('.formCom').children('.edit').attr("data-info");
                  var txt = $(this).siblings('.commentText').val();
                  $(this).parent().siblings("h4").children('.formCom').children('#text').attr('value',txt);
                  $(this).parent().siblings("h4").children('.formCom').children('.method').attr('value','PUT');
                  $(this).parent().siblings("h4").children('.formCom').attr('action',action+comment_id);
                  $(this).parent().siblings("h4").children('.formCom').submit();
              }
            })
        });
})
