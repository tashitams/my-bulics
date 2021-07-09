import Vue from 'vue'
import { App, plugin } from '@inertiajs/inertia-vue'

Vue.component('icon', require('./Shared/Icons').default)
Vue.component('meta-head', require('./Shared/MetaHead').default)

Vue.mixin({ methods: { route: window.route } })
Vue.use(plugin)

const el = document.getElementById('app');

new Vue({
	render: h => h(App, {
		props: {
			initialPage: JSON.parse(el.dataset.page),
			resolveComponent: name => require(`./Pages/${name}`).default,
		},
	}),
}).$mount(el)
