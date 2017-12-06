(function($) {
    var _this;
    var _main = {
        init: function() {
            _this = this;
            this.setup();

        },
        masonry: function() {
            $('section.list').masonry({
                // options
                fitWidth: true,
                itemSelector: 'dl'
            });
        },
        setup: function() {
            this.masonry();
            //masonry
            setTimeout(function() {
                _this.masonry();
            }, 500);
        },
        bind: function() {}
    };
    $(document).ready(function() {
        _main.init();
    });
})($);
