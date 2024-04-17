const Home = () => import('./components/Home.vue');

const Mostrar = () => import('./components/alumnos/Mostrar.vue');
const Crear = () => import('./components/alumnos/Crear.vue');
const FiltroAlumnos = () => import('./components/alumnos/FiltroAlumnos.vue');

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'mostrar',
        path: '/alumnos',
        component: Mostrar
    },
    {
        name: 'crear',
        path: '/crear',
        component: Crear
    },
    {
        name: 'filtroAlumnos',
        path: '/filtroAlumnos',
        component: FiltroAlumnos
    }
]