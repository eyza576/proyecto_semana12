<template>
    <div class="container container-task">
        <div class="row">
            <div class="col-md-8">
                <h2>LISTA DE CITAS</h2>
                <table class="table text-center table table-info table-striped"><!--Creamos una tabla que mostrará todas las iddoctor-->
                        <thead>
                            <tr>
                                <th scope="col">Id Paciente</th>
                                 <th scope="col">Fecha</th>
                                  <th scope="col">Id Doctor</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="task in arrayTasks" :key="task.id"> <!--Recorremos el array y cargamos nuestra tabla-->
                                <td v-text="task.idpaciente"></td>
                                <td v-text="task.fecha"></td>
                                <td v-text="task.iddoctor"></td>
                                <td>
                                    <!--Botón modificar, que carga los datos del formulario con la tarea seleccionada-->
                                    <button class="btn btn-outline-warning" @click="loadFieldsUpdate(task)">Modificar</button>
                                    <!--Botón que borra la tarea que seleccionemos-->
                                    <button class="btn btn-outline-warning" @click="deleteTask(task)">Borrar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="col-md-4">

                <div class="form-group"><!-- Formulario para la creación o modificación de nuestras iddoctor-->
                    <label>Id Paciente</label>
                    <input v-model="idpaciente" type="text" class="form-control">

                </div>
                <div class="form-group"><!-- Formulario para la creación o modificación de nuestras iddoctor-->
                    <label>Fecha</label>
                    <input v-model="fecha" type="text" class="form-control">

                </div>
                <div class="form-group"><!-- Formulario para la creación o modificación de nuestras iddoctor-->
                    <label>Id Doctor</label>
                    <input v-model="iddoctor" type="text" class="form-control">

                </div>
                
                <div class="container-buttons ">
                    <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                    <button v-if="update == 0" @click="saveTasks()" class="btn btn-outline-info">
                        <i class='fas fa-plus'></i>
                    Añadir</button>
                    <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                    <button v-if="update != 0" @click="updateTasks()" class="btn  btn-outline-dark">
                        <i class='fas fa-sync-alt'></i>
                    Actualizar</button>
                    <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                    <button v-if="update != 0" @click="clearFields()" class="btn  btn-outline-dark">
                        <i class='fas fa-reply'></i>
                    Atrás</button>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
    export default {
        data(){
            return{
                idpaciente:"",
                 //Esta variable, mediante v-model esta relacionada con el input del formulario
                update:0, /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado
                          ninguna tarea, pero si es diferente de 0 entonces tendrá el id de la tarea y no mostrará el boton guardar sino el modificar*/
                arrayTasks:[], //Este array contendrá las iddoctor de nuestra bd
            }
        },
        methods:{
            getTasks(){
                let me =this;
                let url = '/citas' //Ruta que hemos creado para que nos devuelva todas las iddoctor
                axios.get(url).then(function (response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    me.arrayTasks = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            saveTasks(){
                let me =this;
                let url = '/citas/guardar' //Ruta que hemos creado para enviar una tarea y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                    'idpaciente':this.idpaciente,
                    'fecha':this.fecha,
                    'iddoctor':this.iddoctor,
                  

                }).then(function (response) {
                    me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                    me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });   

            },
            updateTasks(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                tarea que queremos modificar*/
                let me = this;
                axios.put('/citas/actualizar',{
                    'idcitas':this.update,
                    'idpaciente':this.idpaciente,
                    'fecha':this.fecha,
                    'iddoctor':this.iddoctor,
                

                }).then(function (response) {
                   me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                   me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadFieldsUpdate(data){ //Esta función rellena los campos y la variable update, con la tarea que queremos modificar
                this.update = data.idcitas
                let me =this;
                let url = '/citas/buscar?idcitas='+this.update;
                axios.get(url).then(function (response) {
                    me.idpaciente= response.data.idpaciente;
                    me.fecha= response.data.fecha;
                    me.iddoctor= response.data.iddoctor;

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                }); 
            },
            deleteTask(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la tarea que hemos elegididdoctoro
                let me =this;
                let task_id = data.idcitas
                if (confirm('¿Seguro que deseas borrar esta tarea?')) {
                    axios.delete('/citas/borrar/'+task_id
                    ).then(function (response) {
                        me.getTasks();
                    })
                    .catch(function (error) {
                        console.log(error);
                    }); 
                }
            },
            clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
                this.idpaciente = "";
                this.fecha = "";
                this.iddoctor = "";
                this.update = 0;
            }
        },
        mounted() {
           this.getTasks();
        }
    }
</script>

