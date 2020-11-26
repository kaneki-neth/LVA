export const registrarHome = {
    path: '/registrar/home',
    name: 'registrar.home',
    component: () => import('../../pages/registrar/Dashboard.vue')
};

export const subject = {
    path: '/registrar/subject',
    name: 'registrar.subject',
    component: () => import('../../pages/registrar/Subject.vue')
};

export const track = {
    path: '/registrar/track',
    name: 'registrar.track',
    component: () => import('../../pages/registrar/Track.vue')
};