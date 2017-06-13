
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./Event');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Example from './components/Example.vue'
import Tabs from './components/Tabs.vue'
import Tab from './components/Tab.vue'
import Endpoint from './components/Endpoint.vue'
import EndpointData from './components/EndpointData.vue'

const app = new Vue({
    el: '#app',
    components: { Example, Tabs, Tab, Endpoint,
    	'endpoint-data': EndpointData
    }
});
