<template>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Crear Alumno
            </div>
            <div class="card-body">
              <form @submit.prevent="crear">
                <div class="row">
                  <div class="col-12 mb-2">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" v-model="alumnos.nombre">
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="form-group">
                      <label for="apellidos">Apellidos</label>
                      <input type="text" class="form-control" id="apellidos" v-model="alumnos.apellidos">
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="form-group">
                      <label for="estado">Estado</label>
                      <select class="form-control" id="estado" v-model="alumnos.estado">
                        <option value="Matriculación">Matriculación</option>
                        <option value="Inscripción">Inscripción</option>
                      </select>
                    </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: 'crear',
        data() {
            return {
                alumnos: {
                    nombre: '',
                    apellidos: '',
                    estado: ''
                }
            }
        },
        methods: {
            async crear(){
                await axios.post('api/alumnos', this.alumnos)
                .then(response => {
                    this.$router.push({name: 'mostrar'});
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }
    };
</script>