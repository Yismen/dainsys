<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-aqua-active">
                    <button class="btn btn-danger btn-xs pull-right" v-if="hasPhoto" @click="removePhoto">Remove</button>
                </div>
                <a :href="`/${photo}`" target="_employee_photo" class="view-photo">
                    <div class="widget-user-image">
                        <img :src="`/${photo}`"
                            class="img-circle"
                        >
                    </div>
                </a>

                <div class="box-footer">
                    <form class="form-horizontal" role="form"
                        @submit.prevent="submitPhoto(this)"
                        autocomplete="off"
                        enctype="multipart/form-data"
                        @change="loadFiles"
                        @keydown="blurred"
                    >

                        <div class="box-body">
                            <div class="form-group" :class="{'has-error': form.error.has('photo')}">
                                <label for="input" class="col-sm-2 control-label">Foto:</label>
                                <div class="col-sm-10">
                                    <input type="file" id="photo"
                                        name="photo" class="form-control"
                                        accept="image/*"
                                    >
                                    <span class="text-danger" v-if="form.error.has('photo')">{{ form.error.get('photo') }}</span>
                                </div>
                            </div> <!-- ./Photo -->
                        </div>

                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-success text-uppercase">
                                        Actualizar Foto
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

    export default {

        name: 'PhotoComponent',

        data () {
            return {
                form: new (this.$ioc.resolve('Form')) ({
                    photo: ''
                }, false)
            };
        },

        computed: {
            employee() {
                return this.$store.getters['employee/getEmployee']
            },
            photo() {
                let time = new Date().getTime();

                return `${this.employee.photo}?${time}`;
            },
            hasPhoto() {
                return String(this.employee.photo).includes('storage');
            }
        },

        methods: {
            loadFiles(event) {
                this.form.loadFiles(event.target.name, event.target.files)
            },
            blurred(event) {
                this.form.error.clear(event.target.name)
            },
            submitPhoto () {
                this.form.post('/admin/employees/' + this.employee.id +'/photo')
                    .then(response => {
                        this.$store.dispatch('employee/set', response.data);

                        this.form.reset()
                    })

            },
            removePhoto () {

                this.$swal({
                    title: "Are you sure?",
                    text: "This action can not be reverted. It will be gone forever. ",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then(result => {
                    if (result.value) {
                        this.form.delete(`/admin/employees/${this.employee.id}/photo`)
                            .then(response => {
                                this.$store.dispatch('employee/set', response.data)

                                this.form.reset()
                            })
                    }
                });

            }
        }
    };
</script>

<style lang="css" scoped>
    .view-photo {
        color: #fafafa;
        font-weight: bold;
    }
</style>
