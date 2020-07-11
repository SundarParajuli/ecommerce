const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
// PATH
const public_path = 'public/';
const resource_path_frontend = public_path + 'site/';
const resource_path_backend = public_path + 'admin/';
const vendor_path = public_path + 'vendor/';
const build_path = public_path + 'build/';

const bower_path = 'bower_components/';
const node_module_path = 'node_modules/';

mix.copyDirectory(bower_path + 'alertify-js/build', vendor_path + 'alertifyjs');

/*
 |==========================================================================================
 | Frontend Resource minification and versioning
 |==========================================================================================
 |
 */
mix.babel([
    resource_path_frontend + 'css/template.min.css',
    resource_path_frontend + 'lib/owlcarousel/owl.carousel.min.css',
    resource_path_frontend + 'lib/tabs/responsive-tabs.css',
    resource_path_frontend + 'lib/rangeslider/rangeslider.css',
    resource_path_frontend + 'lib/customscroll/jquery.mCustomScrollbar.min.css',
     
    resource_path_frontend + 'lib/select2/select2.css',

    resource_path_frontend + 'css/custom.css',
    resource_path_frontend + 'css/animate.css',
    resource_path_frontend + 'less/style.css'

], build_path + 'css/app.css').babel([ 
    // resource_path_frontend + 'lib/alertify/alertify.min.js',
    resource_path_frontend + 'lib/rangeslider/rangeslider.js',
    resource_path_frontend + 'js/bootstrap.min.js',
    resource_path_frontend + 'lib/owlcarousel/owl.carousel.min.js',
    resource_path_frontend + 'lib/tabs/jquery.responsiveTabs.js',
    resource_path_frontend + 'lib/hovertab/hovertab.js',
    resource_path_frontend + 'js/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.js',
    resource_path_frontend + 'lib/select2/select2.js',
    resource_path_frontend + 'lib/bigslide/bigslide2.js',
    resource_path_frontend + 'lib/customscroll/jquery.mCustomScrollbar.concat.min.js',
    resource_path_frontend + 'js/jquery-cookie.min.js',

    resource_path_frontend + 'js/autocompleteClass.js',
    resource_path_frontend + 'js/custom.js' 

], build_path + 'js/app.js').version(); // Hot reloading

/*
|==========================================================================================
| Backend Resource minification and versioning
|==========================================================================================
|
*/
// mix.babel([
//     resource_path_backend + 'css/icons/icomoon/styles.css',
//     resource_path_backend + 'css/bootstrap.css',
//     resource_path_backend + 'css/core.css',
//     resource_path_backend + 'css/components.css',
//     resource_path_backend + 'css/colors.css',
//     resource_path_backend + 'css/jquery.datetimepicker.css',
//     public_path + 'lib/fancybox/source/jquery.fancybox.css',
//     public_path + 'lib/highslide/highslide.css',
//     resource_path_backend + 'css/pretty-checkbox.min.css',
//     resource_path_backend + 'bootstrap-date/bootstrap-datepicker.min.css',
//     resource_path_backend + 'css/icons/icomoon/style.css',
//     resource_path_backend + 'css/custom.css',
//
// ], build_path + 'admin/css/app.css').babel([
//     resource_path_backend + 'js/plugins/loaders/pace.min.js',
//     resource_path_backend + 'js/core/libraries/bootstrap.min.js',
//     resource_path_backend + 'js/plugins/loaders/blockui.min.js',
//     resource_path_backend + 'js/plugins/forms/wizards/stepy.min.js',
//     resource_path_backend + 'js/core/libraries/jasny_bootstrap.min.js',
//     resource_path_backend + 'js/pages/wizard_stepy.js',
//     resource_path_backend + 'js/plugins/visualization/d3/d3.min.js',
//     resource_path_backend + 'js/plugins/visualization/d3/d3_tooltip.js',
//     resource_path_backend + 'js/plugins/forms/inputs/touchspin.min.js',
//     resource_path_backend + 'js/plugins/forms/styling/switchery.min.js',
//     resource_path_backend + 'js/plugins/forms/styling/switch.min.js',
//     resource_path_backend + 'js/plugins/forms/styling/uniform.min.js',
//     resource_path_backend + 'js/plugins/forms/selects/bootstrap_multiselect.js',
//     resource_path_backend + 'js/plugins/ui/moment/moment.min.js',
//     resource_path_backend + 'js/plugins/pickers/daterangepicker.js',
//     resource_path_backend + 'js/plugins/forms/styling/uniform.min.js',
//     resource_path_backend + 'js/plugins/forms/validation/validate.min.js',
//     resource_path_backend + 'js/plugins/forms/validation/additional_methods.min.js',
//     resource_path_backend + 'js/plugins/forms/validation/file.validate.js',
//     resource_path_backend + 'js/core/libraries/jquery_ui/interactions.min.js',
//     resource_path_backend + 'js/plugins/notifications/sweet_alert.min.js',
//     resource_path_backend + 'js/plugins/pickers/color/spectrum.js',
//     resource_path_backend + 'js/plugins/forms/inputs/duallistbox.min.js',
//     resource_path_backend + 'js/pages/form_dual_listboxes.js',
//     resource_path_backend + 'js/core/app.js',
//     resource_path_backend + 'js/pages/picker_color.js',
//     resource_path_backend + 'js/jquery.datetimepicker.full.min.js',
//     resource_path_backend + 'js/pages/form_validation.js',
//     resource_path_backend + 'js/plugins/ui/ripple.min.js',
//     public_path + 'lib/fancybox/source/jquery.fancybox.js',
//     public_path + 'lib/highslide/highslide-with-gallery.js',
//     resource_path_backend + 'bootstrap-date/bootstrap-datepicker.min.js',
//     resource_path_backend + 'js/plugins/notifications/sweet_alert.min.js',
//     resource_path_backend + 'js/filestyle/bootstrap-filestyle.min.js',
//     resource_path_backend + 'js/plugins/tinymce/tinymce.min.js',
//     resource_path_backend + 'js/check-all.js'
//
// ], build_path + 'admin/js/app.js').version(); // Hot reloading
// mix.copyDirectory(resource_path_backend+'css/icons/icomoon/fonts', build_path+'admin/css/fonts');
