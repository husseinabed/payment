import Vue from 'vue';
import Vuetify from 'vuetify/lib';

Vue.use(Vuetify);

export default new Vuetify({
    rtl: true,
    theme: {
        themes: {
            light: {
                primary: '#354ba0'
            }
        }
    }
});
