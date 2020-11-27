import Vue from 'vue';
import VueRouter from 'vue-router';
import { registrarHome, subject, track, section } from './modules/registrar';
import { teacherHome } from './modules/teacher';

Vue.use(VueRouter);

const routes = [
    registrarHome,
    subject,
    track,
    section,
    teacherHome
];

export default new VueRouter({
    mode: 'history',
    routes,
    linkActiveClass: 'active'
}); 