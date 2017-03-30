$(document).ready(function()
{
    $('.btn-star').click(function(){
        var elm = $(this);
        var authoID = elm.attr("author-id");
        $.ajax
        ({
            type: "GET",
            url:  "index.php?ctr=star",
            data: {author_id: authoID}
        }).done(function(result){
            elm.find('.count-star').text(parseInt(result.stars));
            if(result.isStar) {
                elm.removeClass('unStar');
                elm.addClass('isStar');
            } else {
                elm.removeClass('isStar');
                elm.addClass('unStar');
            }
        });
    });
});
