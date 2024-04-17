<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="https://ugb.edu.sv/wp-content/uploads/2023/06/UGB_LOGOTIPO_HORIZONTAL-scaled.jpg" alt="" height="90">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <router-link exact-active-class="active" class="nav-link active" to="/" area-current="page">Inicio</router-link>
                </li>
                <li class="nav-item">
                    <router-link exact-active-class="active" class="nav-link" to="/alumnos" area-current="page">Alumnos</router-link>
                </li>
            </ul>

        </div>
        </nav>
        <div>
            <router-view></router-view>
        </div>
    </main>
</template>

<script>
    export default {
    name: 'App',
    };
</script>