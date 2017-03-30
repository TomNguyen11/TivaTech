$(document).ready(function(){
    $('.form-search input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        var resultDropdown = $(".result");
        if(term.length){
            $.ajax
            ({
                type: "GET",
                url: "index.php?ctr=search&act=show",
                data: {searchValue: term}
            }).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $('.form-search').find('input[type="text"]').val($(this).text());
        $(".result").empty();
    });
    // Submit
    // $('.form-search').submit(function(event)
    // {
    //     var value = $('.form-search').find('input[type="text"]').val();
    //     var $form = $(this);
    //     var action = $form.attr('action');
    //     $.ajax
    //     ({
    //         url : action,
    //         type: "POST",
    //         data:
    //         {
    //             searchValue : value
    //         }
    //     });
    //     event.preventDefault();
    // });
});
