const app = new Vue({
    el: "#app",
    data: {
        tarea: "",
        buscar: "",
        editar: null,
        tareas_por_hacer: [],
        tareas_hechas: []
    },
    created() {
        fetch("/javascript/tareas.json")
            .then(response => response.json())
            .then(json => {
                //console.log(json);
                for (const tareas of json) {
                    if (tareas.completed != false) {
                        this.tareas_por_hacer.push({
                            name: tareas.name
                        })
                    } else {
                        this.tareas_hechas.push({
                            name: tareas.name
                        })
                    }
                }
            })
    },
    methods: {
        addAndEditTarea() {
            if (this.editar === null) {
                this.tareas_por_hacer.push({
                    name: this.tarea
                })
            } else {
                this.tareas_por_hacer[this.editar].name = this.tarea;
                this.editar = null;
            }
            this.tarea = '';
        },
        editTarea(index) {
            this.tarea = this.tareas_por_hacer[index].name;
            this.editar = index;
        },
        deleteTareaHecha(index) {
            this.tareas_hechas.splice(index, 1);
        },
        deleteTareaPendiente(index) {
            this.tareas_por_hacer.splice(index, 1);
        },
        okTarea(index, tareas) {
            this.tareas_por_hacer.splice(index, 1)
            this.tareas_hechas.push(tareas);
        },
        resetTarea(index, tareas) {
            this.tareas_hechas.splice(index, 1)
            this.tareas_por_hacer.push(tareas);
        }
    },
    computed: {
        tarea_pendientes() {
            return this.tareas_por_hacer.length;
        },
        tarea_hechas() {
            return this.tareas_hechas.length;
        },
        filtro1() {
            return this.tareas_por_hacer.filter(item => {
                return item.name.toLowerCase().includes(this.buscar.toLowerCase());
            });
        },
        filtro2() {
            return this.tareas_hechas.filter(item => {
                return item.name.toLowerCase().includes(this.buscar.toLowerCase());
            });
        }
    }

})