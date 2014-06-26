/**
 * Created by Rw.
 * @author Rw
 * @year 2014
 */

(function ($) {
    var pushify = function (pushed) {
        var self = $(this),
            pushed = pushed || true,
            re = new RegExp(location.origin + '\/');

        $('.navbar-nav > li').removeClass('active');
        self.closest('li').addClass('active');

        var anchorURL = ($(this).attr('href') || location.pathname);

        if (anchorURL.indexOf(location.origin) > 0
            && location.href.indexOf(anchorURL) < 0
        ) {
            location.href = anchorURL;
        }

        if (pushed != "false") {
            history.pushState(null, null, anchorURL.replace(re, ''));
        }

        $.ajax({
            type: 'GET',
            url: '/ajax',
            data: {
                requested: location.pathname.replace('\/', '')
            },
            complete: function (data) {
                $('#page-wrapper').empty().html(data.responseText);
            }
        });
    };

    $(document).on('click', 'a', function (e) {
        e.preventDefault();

        pushify.call(this);
    });

    $(window).bind('popstate', function(e) {
        pushify.call(this, "false");
    });
}(jQuery));