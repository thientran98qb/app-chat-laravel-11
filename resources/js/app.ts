/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "../css/app.css";

import { createApp, DefineComponent, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/inertia-vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist";
import { InertiaProgress } from "@inertiajs/progress";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { far } from "@fortawesome/free-regular-svg-icons";
import { fab } from "@fortawesome/free-brands-svg-icons";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>("./Pages/**/*.vue")
        ),
    setup({ el, app, props, plugin }) {
        createApp({ render: () => h(app, props) })
            .component("fa", FontAwesomeIcon)
            .component("inertia-link", Link)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});

library.add(fas, far, fab);

InertiaProgress.init({ color: "red", showSpinner: false });
