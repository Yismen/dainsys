<template>
    <div class="_Supervisor well">
        <form class="form-horizontal" role="form"
            autocomplete="off"
            @submit.prevent="updateSupervisor"
            @change="form.error.clear($event.target.name)"
        >

            <div class="box-header with-border">
                <h4>Información Supervisor:</h4>
            </div>

            <div class="box-body" :class="{'has-error': form.error.has('supervisor_id')}">
                <div class="form-group">
                    <label for="input" class="col-xs-3 col-md-12 col-lg-3">Supervisor:</label>
                    <div class="col-xs-9 col-md-12 col-lg-9">
                        <div class="input-group">
                            <select name="supervisor_id" id="supervisor_id"
                                class="form-control"
                                v-model="form.fields.supervisor_id"
                            >
                                <option v-for="supervisor in supervisors_list" :value="supervisor.id" :key="supervisor.id">
                                    {{ supervisor.name }}
                                </option>
                            </select>
                            <a href="#" @click.prevent="$modal.show('create-supervisor')" class="input-group-addon">
                                <i class="fa fa-plus"></i> Agregar
                            </a>
                        </div>
                        <span class="text-danger" v-if="form.error.has('supervisor_id')">{{ form.error.get('supervisor_id') }}</span>
                    </div>
                </div> <!-- ./Supervisor-->
            </div>

            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary text-uppercase">
                            Salvar Supervisor
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <create-supervisor-form
            @supervisor-created="supervisorCreated"
            :departments_list="employee.departments_list"
        ></create-supervisor-form>
        <!-- ./ Modal -->
    </div>
</template>

<script>
import CreateSupervisorForm from '../forms/CreateSupervisor'

export default {
name: 'SupervisorComponent',

data () {
    return {
        supervisors_list: [],
        form: new (this.$ioc.resolve('Form')) (this.getSupervisorObject(), {reset: false})
    };
},

computed: {
    employee() {
        return this.$store.getters['employee/getEmployee']
    }
},

components: {CreateSupervisorForm },

mounted() {
    return this.supervisors_list = this.employee.supervisors_list
},

methods: {
    getSupervisorObject(){
        return {
            'supervisor_id': this.$store.getters['employee/getEmployee'].supervisor ?
                this.$store.getters['employee/getEmployee'].supervisor.id :
                ''
        }
    },
    updateSupervisor() {
        this.form.put('/admin/employees/' + this.employee.id + '/supervisor')
            .then(({data}) => {
                this.$store.dispatch('employee/set', data)
            })
    },
    supervisorCreated(supervisor) {
        // return this.supervisors_list = Object.assign({[supervisor.id]: supervisor.name}, this.supervisors_list)
        this.supervisors_list.unshift(supervisor);
    }
}
};
</script>

<style lang="css" scoped>
</style>
