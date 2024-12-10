$(document).ready(function() {
    $('.show-detail').on('click', function() {
        var targetSelector = $(this).data('target');
        var target = $(targetSelector);
        var url = target.data('url');
        target.toggle();
        if (target.data('loaded')) {
            return;
        }
        $.get(url).done(function(response) {
            target.data('loaded', 1);
            target.find('td').html(response);
        });
    })
})
