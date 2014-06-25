/**
 * Created by Rw.
 */

(function ($) {
    $(document).on('click', 'a', function (e) {
        e.preventDefault();

        history.pushState(null, null, $(this).attr('href'));

        $.ajax({
            type: 'GET',
            url: '/',
            data: {},
            success: function () {

            }
        });
    });
}(jQuery));