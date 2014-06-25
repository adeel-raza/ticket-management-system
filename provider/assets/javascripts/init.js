/**
 * Created by Rw.
 */

(function ($) {
    $(document).on('click', 'a', function (e) {
        e.preventDefault();

        history.pushState(null, null, $(this).attr('href'));

        $.ajax({
            type: 'POST',
            url: '/ajax',
            data: {
                requested: $(this).attr('href')
            },
            success: function (data) {
                console.log(data);
            }
        });
    });
}(jQuery));