<template>
    <div class="_Nationality well">
        <form class="form-horizontal" role="form"
            @submit.prevent="updateNationality"
            autocomplete="off"
            @change="form.error.clear($event.target.name)"
        >

            <div class="box-header with-border">
                <h4>Nacionalidad:</h4>
            </div>

            <div class="box-body">
                <div class="form-group" :class="{'has-error': form.error.has('nationality_id')}">
                    <label for="nationality_id" class="col-xs-3 col-md-12 col-lg-3">Nacionalidad:</label>
                    <div class="col-xs-9 col-md-12 col-lg-9">
                        <div class="input-group">
                            <select name="nationality" id="nationality"
                                class="form-control"
                                v-model="form.fields.nationality_id"
                            >
                                <option v-for="nationality in nationalities_list" :key="nationality.id" :value="nationality.id">
                                    {{ nationality.name }}
                                </option>
                            </select>
                            <a href="#" @click.prevent="$modal.show('create-nationality')" class="input-group-addon">
                                <i class="fa fa-plus"></i> Agregar
                            </a>
                        </div>
                        <span class="text-danger" v-if="form.error.has('nationality_id')">{{ form.error.get('nationality_id') }}</span>
                    </div>
                </div>
            </div>
             <!-- ./Nationality-->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">
                            Salvar Nacionalidad
                        </button>
                    </div>
                </div>
            </div>

        </form>
        <create-nationality-form
            @nationality-created="nationalityCreated"
            :departments_list="employee.departments_list"
        ></create-nationality-form>
    </div>
</template>

<script>
    import CreateNationalityForm from '../forms/CreateNationality'

    export default {

      name: 'NationalityComponent',

      data () {
        return {
            form: new (this.$ioc.resolve('Form')) (this.getNationalityObject(), false),
            nationalities_list: []
        };
    },

    computed: {
        employee() {
            return this.$store.getters['employee/getEmployee']
        }
    },

    components: {
        CreateNationalityForm
    },

    mounted() {
        return this.nationalities_list = this.employee.nationalities_list
    },

    methods: {
        getNationalityObject() {
            let employee = this.$store.getters['employee/getEmployee']
            return {
                'nationality_id': employee.nationality ? employee.nationality.id : '',
            }
        },
        nationalityCreated(nationality) {
            this.nationalities_list.unshift(nationality)
        },
        updateNationality() {
            this.form.post('/admin/employees/' + this.employee.id + '/nationality')
                .then(response => {
                    this.$store.dispatch('employee/set', response.data)
                    // this.employee.nationality = response.data.nationality;
                    // return this.form.fields.nationality_id = response.data.nationality.id
                })
        },
    //     nationalityUpdated(id) {
    //         return this.form.fields.nationality_id = id
    //     }
    }
};
</script>

<style lang="css" scoped>
</style>
