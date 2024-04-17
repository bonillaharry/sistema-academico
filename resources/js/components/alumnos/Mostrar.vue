<template>
    <div class="container">
    
      <FiltroAlumnos @filtrar-alumnos="filtrarAlumnos" />
  
      
      <button type="button" @click="limpiarFiltro" class="btn btn-secondary mb-3"><i class="fa-solid fa-broom"></i> Limpiar Busqueda</button>
        
      <router-link :to="{ name: 'crear' }" class="btn btn-success mb-3">
      <i class="fa-solid fa-circle-plus"></i> Crear Alumno
        </router-link>
      
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-bordered">
        
            <thead class="bg-primary text-white">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Estado</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="alumno in alumnosFiltrados" :key="alumno.id">
                <td>{{alumno.id}}</td>
                <td>{{alumno.nombre}}</td>
                <td>{{alumno.apellidos}}</td>
                <td>{{alumno.estado}}</td>
                <td>
                  <button type="button" @click="eliminarAlumno(alumno.id)" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import FiltroAlumnos from './FiltroAlumnos.vue'; 
  
  export default {
    components: {
      FiltroAlumnos, 
    },
    data() {
      return {
        alumnos: [],
        filtroEstado: '', 
      };
    },
    computed: {
      alumnosFiltrados() {
        return this.alumnos.filter(alumno =>
          alumno.estado.toLowerCase().includes(this.filtroEstado.toLowerCase())
        );
      },
    },
    mounted() {
      this.getAlumnos();
    },
    methods: {
      async getAlumnos() {
        try {
          const response = await axios.get('api/alumnos');
          this.alumnos = response.data;
        } catch (error) {
          console.log(error);
        }
      },
      async eliminarAlumno(id) {
        try {
          await axios.delete(`api/alumnos/${id}`);
          this.getAlumnos(); 
        } catch (error) {
          console.log(error);
        }
      },
      filtrarAlumnos(estado) {
        this.filtroEstado = estado;
      },
      limpiarFiltro() {
        this.filtroEstado = '';
      },
    },
  };
  </script>
  
  