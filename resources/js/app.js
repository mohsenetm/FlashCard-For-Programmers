require('./bootstrap');
window.Vue=require('vue');
window.hljs=require('highlight.js');
import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use( CKEditor );
Vue.component('editor-component', require('./components/EditorComponent').default);
window.onload = function () {
    let app = new Vue({
        el: '#app',
    });
};

