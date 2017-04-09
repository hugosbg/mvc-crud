var mvc = (function($) {
    return {
        confirm: function (e) {
            e.preventDefault();
            var url = $(e.target).attr('href');
            if (window.confirm('Deseja realmente excluir esté produto?')) {
                $(location).attr('href', url);
            }
        },
        init: function () {
            // Todo code
        }
    }
}(jQuery));

$(document).ready(function() {
    mvc.init();
});
