<template>
    <div class="_Punch well">
        <form class="form-horizontal" role="form"
            @submit.prevent="submitPunch"
            autocomplete="off"
            @change="updated">

            <div class="box-header with-border">
                <h4>ID Ponche:</h4>
            </div>

            <div class="box-body">
                <div class="form-group" :class="{'has-error': form.error.has('punch')}">
                    <label for="input" class="col-xs-3 col-md-12 col-lg-3">Ponche:</label>
                    <div class="col-xs-9 col-md-12 col-lg-9">
                        <input type="text" class="form-control"
                         id="punch" name="punch"
                        v-model="form.fields.punch">
                        <span class="text-danger" v-if="form.error.has('punch')">{{ form.error.get('punch') }}</span>
                    </div>
                </div> <!-- ./Ponche -->
            </div>

            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary text-uppercase">
                            Salvar Ponche
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</template>

<script>

    export default {

      name: 'PunchComponent',

      data () {
        return {
            form: new (this.$ioc.resolve('Form')) ({
                'punch': this.getPunch(),
            }, false),

        };
    },

    computed: {
        employee() {
            return this.$store.getters['employee/getEmployee']
        },
        punch() {
            return this.employee.punch ?
                this.employee.punch.punch :
                ''
        }
    },

    methods: {
        getPunch(){
            return this.$store.getters['employee/getEmployee'].punch ?
                this.$store.getters['employee/getEmployee'].punch.punch :
                ''
        },
        updated(event) {
            this.form.error.clear(event.target.name)
        },
        submitPunch() {
            this.form.post('/admin/employees/'+ this.employee.id +'/punch')
                .then(response => {
                    this.$store.dispatch('employee/set', response.data)
                })
        }
    }
};
</script>

<style lang="css" scoped>
</style>
