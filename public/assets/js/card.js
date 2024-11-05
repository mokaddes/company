$(document).ready(function () {

    function endsWithEdit() {
        return window.location.pathname.endsWith('/edit');
    }

    // Trigger the keyup event if the input has a default value
    $('.cin').each(function() {
        var cin = $(this).val();
        var preview = $(this).data('preview');

        if (cin) {
            document.querySelectorAll('#' + preview).forEach(function(element) {
                element.innerHTML = cin;
            });
        }

        // Specific hide/show condition for #preview_website_2 and #preview_phone_2
        if (preview === 'preview_website_2' || preview === 'preview_phone_2' || (preview === 'preview_website' && endsWithEdit())) {
            var parentDiv = $('#' + preview).closest('.icon-wrap');
            if (cin) {
                parentDiv.show();
            } else {
                parentDiv.hide();
            }
        }
    });
});

$(document).on('keyup', '.cin', function () {
    var cin = $(this).val();
    var preview = $(this).data('preview');

    var concat_cls = $(this).data('concat');
    if (concat_cls !== undefined) {
        cin = getFullStr(concat_cls);
    }

    document.querySelectorAll('#' + preview).forEach(function(element) {
        element.innerHTML = cin;
    });

    // Specific hide/show condition for #preview_website_2 and #preview_phone_2
    if (preview === 'preview_website_2' || preview === 'preview_website' || preview === 'preview_phone_2') {
        var parentDiv = $('#' + preview).closest('.icon-wrap');
        if (cin) {
            parentDiv.show();
        } else {
            parentDiv.hide();
        }
    }
}).keyup();


$(document).ready(function() {

    $('.icon-wrapper').hide();

    $('.icon_in').each(function() {
        var inputField = $(this);
        var iconType = inputField.data('icon');
        var inputValue = inputField.val().trim();

        if (inputValue) {
            $('.icon-wrapper[data-icon="' + iconType + '"]').show();
        } else {
            $('.icon-wrapper[data-icon="' + iconType + '"]').hide();
        }
    });
    
    $(document).on('input', '.icon_in', function() {
        var inputField = $(this);
        var iconType = inputField.data('icon');
        var inputValue = inputField.val().trim();

        if (inputValue) {
            $('.icon-wrapper[data-icon="' + iconType + '"]').show();
        } else {
            $('.icon-wrapper[data-icon="' + iconType + '"]').hide();
        }
    });


});


function getFullStr(concat_cls) {
    var cin = '';
    $('.' + concat_cls).each(function (e) { cin = cin + ' ' + $(this).val(); });
    return cin;
}