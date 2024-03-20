import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue';
import {Link} from '@inertiajs/vue3';
import LinkBtn from './Shared/LinkBtn.vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';


createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || Layout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .component('Link', Link)
      .component('LinkBtn', LinkBtn)
      .component('Bootstrap5Pagination', Bootstrap5Pagination)
      .use(plugin)
      .mount(el)
  },
})