<template>
    <div class="_Card well">
        <form class="form-horizontal" role="form"
            @submit.prevent="submitCard"
            autocomplete="off"
            @change="updated">

            <div class="box-header with-border">
                <h4># Tarjeta de Acceso:</h4>
            </div>

            <div class="box-body">
                <div class="form-group" :class="{'has-error': form.error.has('card')}">
                    <label for="input" class="col-xs-3 col-md-12 col-lg-3">Id Tarjeta:</label>
                    <div class="col-xs-9 col-md-12 col-lg-9">
                        <input type="text" class="form-control"
                         id="card" name="card"
                        v-model="form.fields.card">
                        <span class="text-danger" v-if="form.error.has('card')">{{ form.error.get('card') }}</span>
                    </div>
                </div> <!-- ./Card -->
            </div>

            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">
                            Salvar Tarjeta
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</template>

<script>

    export default {

      name: 'CardComponent',

      data () {
        return {
            form: new (this.$ioc.resolve('Form')) ({
                'card': this.getCard(),
            }, false),

        };
    },

    computed: {
        employee() {
            return this.$store.getters['employee/getEmployee']
        }
    },

    methods: {
        getCard(){
            return this.$store.getters['employee/getEmployee'].card ?
                this.$store.getters['employee/getEmployee'].card.card :
                ''
        },
        updated(event) {
            this.form.error.clear(event.target.name)
        },
        submitCard() {
            this.form.post('/admin/employees/'+ this.employee.id +'/card')
                .then(response => {
                    this.$store.dispatch('employee/set', response.data)
                })
        }
    }
};
</script>

<style lang="css" scoped>
</style>
