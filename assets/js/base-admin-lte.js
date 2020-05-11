// try {
//     window.$ = window.jQuery = require('jquery');
//
//     require('bootstrap');
// } catch (e) {}

global.$ = global.jQuery = $;
require('bootstrap');

require('select2')
require('jquery-ui-dist/jquery-ui.min.js')
// require('bootstrap-daterangepicker')
// require('bootstrap-datepicker')
require('daterangepicker')
require('moment')
require('overlayScrollbars')
require('fastclick')
require('admin-lte')

$(document).ready(function() {
    // $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip()
    $('.select2').select2(
        { language: "es"}
    );
});