/**
 * Created by Rw.
 */

(function ($) {
    $(document).on('click', 'a', function (e) {
        e.preventDefault();

        var self = $(this),
            re = new RegExp(location.origin + '\/');

        $('.navbar-nav > ul > li').removeClass('active');

        history.pushState(null, null, $(this).attr('href').replace(re, ''));

        $.ajax({
            type: 'GET',
            url: '/ajax',
            data: {
                requested: location.pathname.replace('\/', '')
            },
            success: function (data) {
                document.write('');
                document.write(data);

                self.closest('li').addClass('active');
            }
        });
    });
}(jQuery));