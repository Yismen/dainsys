<template>
    <div class="_Social_Security well">
        <form class="form-horizontals" role="form"
            @submit.prevent="handleUpdateSocialSecurity"
            autocomplete="off"
            @change="updated">

            <div class="box-header with-border">
                <h4>Informacion Seguridad Social:</h4>
            </div>

            <div class="box-body">
                <div class="form-group" :class="{'has-error': form.error.has('number')}">
                    <label for="number" class="col-xs-3 col-md-12 col-lg-3">Número Seguridad Social:</label>
                    <div class="col-xs-9 col-md-12 col-lg-9">
                        <input type="text" class=" form-control"
                        id="number" name="number"
                        v-model="form.fields.number">
                        <span class="text-danger" v-if="form.error.has('number')">{{ form.error.get('number') }}</span>
                    </div>
                </div> <!-- ./Social Sec. Number-->
            </div>

            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">
                            Salvar Seguridad Social
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</template>

<script>

    export default {

    name: 'SocialSecurityComponent',

    data () {
        return {
            form: new (this.$ioc.resolve('Form')) ({
                'number': this.getSocial(),
            }, false),
        };
    },

    computed: {
        employee() {
            return this.$store.getters['employee/getEmployee']
        }
    },

    methods: {
        getSocial() {
            return this.$store.getters['employee/getEmployee'].social_security ?
                this.$store.getters['employee/getEmployee'].social_security.number :
                ''
        },
        updated(event) {
            this.form.error.clear(event.target.name)
        },
        handleUpdateSocialSecurity() {
            this.form.post('/admin/employees/' + this.employee.id + '/social-security')
                .then(response => {
                    this.$store.dispatch('employee/set', response.data)
                })
        }
    }
};
</script>

<style lang="css" scoped>
</style>
