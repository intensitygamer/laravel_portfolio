import { Notification, CodeJquery, Modal, DateTimePicker, Ajaxios } from './modules';

/**
 * This is customise js created through modules structure
 * with ES6 kind of code and will compile in webpack.
 * importing files coming from index.js in modules folder
 */
window.CreateNoty = (opts) => {
    new Notification().createNoty(opts);
}

window.CodeJquery = (codes) => {
    new CodeJquery().start(codes);
}

window.createDatePicker = (dtype, opts) => {

    const dtpicker = new DateTimePicker();

    switch (dtype){
        case 'dateInline':
            dtpicker.createDate(opts);
            break;

        case 'dateRange':
            dtpicker.createDateRange(opts);
            break;

        case 'timeInline':
            dtpicker.createTime(opts);
            break;

        default:
            console.error('DatePicker Error: No type found')
            break;
    }
}

window.sendAjax = (atype, opts) => {

    const ax = new Ajaxios(atype);

    switch (atype) {
        case 'axios':
            new ax.useAxios(opts);
            break;

        case 'jquery':
            new ax.useJquery(opts);
            break;

        default:
            console.error('Ajax Error: No type found')
            break;
    }

}

window.CreateModal = (currentElement, targetModal, modalType, opts) => {

    const modal = new Modal(targetModal, modalType);

    switch (modalType) {
        case 'confirmModal':
            modal.confirmModal(currentElement, targetModal, opts);
            break;

        case 'appendViewModal':
            modal.appendViewModal(currentElement, targetModal, opts);
            break;

        default:
            console.error('Modal Error: No type found')
            break;
    }
}

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*
    Vue.component('example', require('./components/Example.vue'));
    const app = new Vue({
        el: '#app-vue'
    });
*/
Vue.component('autocomplete',require('../components/Autocomplete.vue'));



/**
 * Bootstraping help-block remove when click
 */
$('body').on('click', '.help-block', function(e){
    e.preventDefault()
    $(this).remove()
})
