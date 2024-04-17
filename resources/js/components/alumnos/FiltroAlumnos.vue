<template>
    <div>
      <div class="row mb-3">
        <div class="col-lg-4">
          
          <input type="text" id="filtroEstado" v-model="filtroEstado" class="form-control" placeholder="Busqueda por Estado:">
        </div>
        <div class="col-lg-2">
          <button @click="filtrarAlumnos" class="btn btn-primary">Buscar</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        filtroEstado: '', 
      };
    },
    methods: {
      filtrarAlumnos() {
        this.$emit('filtrar-alumnos', this.filtroEstado);
      },
    },
  };
  </script>
  