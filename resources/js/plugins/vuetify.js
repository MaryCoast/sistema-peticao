import Vue from 'vue'
import colors from 'vuetify/lib/util/colors'
import Vuetify from 'vuetify/lib'
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify)

let light = {
    primary:  "#D50000",
    secondary: "#9E9E9E",
    accent: "#EEEEEE",
    error: colors.red.base,
    warning: colors.amber.lighten1,
    info: colors.cyan.base,
    success: colors.green.base
};

let dark = {}

const opts = {
    theme: {
        themes: {
            light,
            dark
        }
    },
    icons: {
        iconfont: 'mdi'
    }
};

export default new Vuetify(opts)