/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
// require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

// console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

export const bootstrapCollectionBorrarItem = (item) => {
    window.$(item).parent().parent().remove();
}
window.bootstrapCollectionBorrarItem = bootstrapCollectionBorrarItem;

export const inicializarPlugins = (item) => {
    window.$('.select2').select2(
        { language: "es"}
    );
    console.log(item)
    // window.$(this).prev().find('.select2entity').last().select2entity();
}
window.inicializarPlugins = inicializarPlugins;

window.$('body').on('click', '.bootstrapcollection-agregar-otro-item', function(e) {
    window.$(this).prev().find('.select2entity').last().select2entity();
});

// window.$.widget.bridge('uibutton', window.$.ui.button)