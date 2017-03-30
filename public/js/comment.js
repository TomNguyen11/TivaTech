function loadComment(postID)
{
    $('.comment-container[post-id='+postID+']').fadeIn();

    $.ajax
    ({
        type: "GET",
        url: "index.php?ctr=comment",
        data: {post_id: postID}
    }).done(function(result){
        $('.count-comment[post-id='+postID+']').html(parseInt(result.commentList.length));
        var cmtList = "";
        for (i=0;i<result.commentList.length;i++){
            //alert(result.commentList.length);
            var photo = result.authorComments[result.commentList[i]['id']]['photo'];
            if(photo==null){
              photo = "public/images/avatar.png";
            }
            cmtList += '<div class="comment-item clearfix">'

            +    '<div class="comment-item-photo">'

            +      '<a href="index.php?ctr=authors_all&act=detail&author_id='+ result.authorComments[result.commentList[i]['id']]['id'] +'" title="'+result.authorComments[result.commentList[i]['id']]['firstname']
            +       ' '+result.authorComments[result.commentList[i]['id']]['lastname']+'">'
            +          '<img src="'+photo+'" alt="Avartar">'
            +      '</a>'

            +    '</div>'

            +    '<div class="comment-item-content">'
            +        '<p class="comment-time">'+result.authorComments[result.commentList[i]['id']]['firstname']
            +                                  ' '+result.authorComments[result.commentList[i]['id']]['lastname']
            +                               ' ( '+result.commentList[i]['created_at']+') </p>'
            +        '<p class"comment-content">'+result.commentList[i]['content']+'</p>'
            +    '</div>'
            +'</div>';

        }
        $('.commment-list[post-id='+postID+']').html(cmtList);
        $('.comment-post-content[post-id='+postID+']').val("");
        $('.count-comment[post-id='+postID+']').html(parseInt(result.commentList.length));
    });

}
$(document).ready(function(){
    $('a.btn-comment').click(function(){
        var elm = $(this);
        var postID = $(this).attr("post-id");

        if($('.comment-container[post-id='+postID+']').css('display')=='none') {
            $('.comment-container[post-id='+postID+']').fadeIn();
        } else {
            $('.comment-container[post-id='+postID+']').fadeOut();
        }

        $.ajax
        ({
            type: "GET",
            url: "index.php?ctr=comment",
            data: {post_id: postID}
        }).done(function(result){
            var cmtList = "";
            for (i=0;i<result.commentList.length;i++){
                //alert(result.commentList.length);
                var photo = result.authorComments[result.commentList[i]['id']]['photo'];
                if(photo==null){
                  photo = "public/images/avatar.png";
                }
                cmtList += '<div class="comment-item clearfix">'

                +    '<div class="comment-item-photo">'

                +      '<a href="index.php?ctr=authors_all&act=detail&author_id='+ result.authorComments[result.commentList[i]['id']]['id'] +'" title="'+result.authorComments[result.commentList[i]['id']]['firstname']
                +       ' '+result.authorComments[result.commentList[i]['id']]['lastname']+'">'
                +          '<img src="'+photo+'" alt="Avartar">'
                +      '</a>'

                +    '</div>'

                +    '<div class="comment-item-content">'
                +        '<p class="comment-time">'+result.authorComments[result.commentList[i]['id']]['firstname']
                +                                  ' '+result.authorComments[result.commentList[i]['id']]['lastname']
                +                               ' ( '+result.commentList[i]['created_at']+') </p>'
                +        '<p class"comment-content">'+result.commentList[i]['content']+'</p>'
                +    '</div>'
                +'</div>';

            }
            $('.commment-list[post-id='+postID+']').html(cmtList);
            $('.count-comment[post-id='+postID+']').val(result.commentList.length);
        });


    });
    var postID;
    $('.comment-form').submit(function(event){
        //event.preventDefault();
        postID = $(this).attr("post-id");
        var content = $('.comment-post-content[post-id='+postID+']').val();
        var $form = $(this);
        var action = $form.attr('action');
        //alert(action);
        $.ajax
        ({
            url : action,
            type: "POST",
            data:
            {
                post_id: postID,
                cmtContent: content,
            }
        }).done(function(data){
        });
        event.preventDefault();
        loadComment(postID);
    });
    //$('.comment-form[post-id='+postID+']').submit();
    //$('a.btn-comment[post-id='+postID+']').click();

});
