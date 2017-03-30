$(document).ready(function()
{
    $('.btn-like').click(function () {
        var elm = $(this);
        var postID = elm.attr("post-id");

        $.ajax
        ({
            type: "GET",
            url: "index.php?ctr=like",
            data: {
                post_id: postID
            }
        }).done(function (result) {
            elm.find('.count-like').text(parseInt(result.likes));
            if (result.isLike) {
                elm.removeClass('unlike');
                elm.addClass('islike');
            } else {
                elm.addClass('unlike');
                elm.removeClass('islike');
            }

        });
    });

    
});
