<template>
  <div class="_Edit">
    <form role="form" class="form-horizontal" @submit.prevent="handleForm" autocomplete="off"
      @change="form.error.clear($event.target.name)">
      <div class="box-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('first_name') }">
              <label for="first_name" class="col-sm-4 control-label">Primer Nombre:</label>
              <div class="col-sm-8">
                <input type="text" id="first_name" name="first_name" class="form-control input-sm"
                  v-model="form.fields.first_name" />
                <span class="text-danger" v-if="form.error.has('first_name')">{{
                  form.error.get("first_name")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./First Name-->

          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('secon_first_name') }">
              <label for="second_first_name" class="col-sm-4 control-label">Segundo Nombre:</label>
              <div class="col-sm-8">
                <input type="text" id="second_first_name" name="second_first_name" class="form-control input-sm"
                  v-model="form.fields.second_first_name" />
                <span class="text-danger" v-if="form.error.has('second_first_name')">{{
                  form.error.get("second_first_name")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Second First Name-->
        </div>
        <!-- .row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('last_name') }">
              <label for="last_name" class="col-sm-4 control-label">Primer Apellido:</label>
              <div class="col-sm-8">
                <input type="text" id="last_name" name="last_name" class="form-control input-sm"
                  v-model="form.fields.last_name" />
                <span class="text-danger" v-if="form.error.has('last_name')">{{
                  form.error.get("last_name")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Last Name-->

          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('second_last_name') }">
              <label for="second_last_name" class="col-sm-4 control-label">Segundo Apellido:</label>
              <div class="col-sm-8">
                <input type="text" id="second_last_name" name="second_last_name" class="form-control input-sm"
                  v-model="form.fields.second_last_name" />
                <span class="text-danger" v-if="form.error.has('second_last_name')">{{
                  form.error.get("second_last_name")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Second Last Name-->
        </div>
        <!-- .row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('personal_id') }">
              <label for="personal_id" class="col-sm-4 control-label">Cédula:</label>
              <div class="col-sm-8">
                <input type="text" id="personal_id" name="personal_id" class="form-control input-sm"
                  v-model="form.fields.personal_id" />
                <span class="text-danger" v-if="form.error.has('personal_id')">{{
                  form.error.get("personal_id")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Personal ID-->
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('passport') }">
              <label for="passport" class="col-sm-4 control-label">O Pasaporte:</label>
              <div class="col-sm-8">
                <input type="text" id="passport" name="passport" class="form-control input-sm"
                  v-model="form.fields.passport" />
                <span class="text-danger" v-if="form.error.has('passport')">{{
                  form.error.get("passport")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Or Passport-->
        </div>
        <!-- .row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('hire_date') }">
              <label for="hire_date" class="col-sm-4 control-label">Fecha Entrada:</label>
              <div class="col-sm-8">
                <date-picker input-class="form-control input-sm" v-model="form.fields.hire_date" name="hire_date"
                  format="MM/dd/yyyy" @updated="updateHireDate"></date-picker>
                <span class="text-danger" v-if="form.error.has('hire_date')">{{
                  form.error.get("hire_date")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Hire Date-->
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('date_of_birth') }">
              <label for="date_of_birth" class="col-sm-4 control-label">Fecha Nacimiento:</label>
              <div class="col-sm-8">
                <date-picker input-class="form-control input-sm" name="date_of_birth"
                  v-model="form.fields.date_of_birth" format="MM/dd/yyyy" @updated="updateDateOfBirth"></date-picker>
                <span class="text-danger" v-if="form.error.has('date_of_birth')">{{
                  form.error.get("date_of_birth")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Date of Birth-->
        </div>
        <!-- .row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('cellphone_number') }">
              <label for="cellphone_number" class="col-sm-4 control-label">Celular:</label>
              <div class="col-sm-8">
                <input type="text" id="cellphone_number" name="cellphone_number" class="form-control input-sm"
                  v-model="form.fields.cellphone_number" />
                <span class="text-danger" v-if="form.error.has('cellphone_number')">{{
                  form.error.get("cellphone_number")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Cellphone Number-->
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('secondary_phone') }">
              <label for="secondary_phone" class="col-sm-4 control-label">Email:</label>
              <div class="col-sm-8">
                <input type="text" id="secondary_phone" name="secondary_phone" class="form-control input-sm"
                  v-model="form.fields.secondary_phone" />
                <span class="text-danger" v-if="form.error.has('secondary_phone')">{{
                  form.error.get("secondary_phone")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Secondary Phone #-->
        </div>
        <!-- .row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('position_id') }">
              <label for="position_id" class="col-sm-4 control-label">Posición:</label>
              <div class="col-sm-8">
                <div class="input-group">
                  <Select2 v-model="form.fields.position_id" name="position_id" :options="computedPositionsList"
                    @selectUpdated="selectUpdated" />
                  <!-- <select
                    class="form-control select2"
                    name="position_id"
                    v-model="form.fields.position_id"
                  >
                    <option
                      v-for="position in positions_list"
                      :key="position.id"
                      :value="position.id"
                    >
                      {{ position.name }} / {{ position.department.name }}, ${{
                        position.salary
                      }}
                    </option>
                  </select> -->

                  <div class="input-group-addon">
                    <create-position @position-created="addPosition" :departments_list="employee.departments_list"
                      :payment_types_list="employee.payment_types_list" :payment_frequencies_list="
                        employee.payment_frequencies_list
                      "></create-position>
                  </div>
                </div>
                <span class="text-danger" v-if="form.error.has('position_id')">{{
                  form.error.get("position_id")
                }}</span>
              </div>
            </div>
          </div>
          <!-- / Position -->
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('gender_id') }">
              <label for="gender_id" class="col-sm-4 control-label">Sexo:</label>
              <div class="col-sm-8">
                <select name="gender_id" id="gender_id" class="form-control" v-model="form.fields.gender_id">
                  <option v-for="gender in employee.genders_list" :value="gender.id" :key="gender.id">
                    {{ gender.name }}
                  </option>
                </select>
                <span class="text-danger" v-if="form.error.has('gender_id')">{{
                  form.error.get("gender_id")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Gender-->
        </div>
        <!-- .row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('site_id') }">
              <label for="site_id" class="col-sm-4 control-label">Localidad:</label>
              <div class="col-sm-8">
                <Select2 v-model="form.fields.site_id" name="site_id" :options="employee.sites_list"
                  @selectUpdated="selectUpdated" />
                <span class="text-danger" v-if="form.error.has('site_id')">{{
                  form.error.get("site_id")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Site-->
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('project_id') }">
              <label for="project_id" class="col-sm-4 control-label">Proyecto:</label>
              <div class="col-sm-8">
                <Select2 v-model="form.fields.project_id" name="project_id" :options="employee.projects_list"
                  @selectUpdated="selectUpdated" />
                <span class="text-danger" v-if="form.error.has('project_id')">{{
                  form.error.get("project_id")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Project-->
        </div>
        <!-- .row -->
        <!-- .row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('marital_id') }">
              <label for="marital_id" class="col-sm-4 control-label">Estado Civil:</label>
              <div class="col-sm-8">
                <select name="marital_id" id="marital_id" class="form-control" v-model="form.fields.marital_id">
                  <option v-for="marital in employee.maritals_list" :value="marital.id" :key="marital.id">
                    {{ marital.name }}
                  </option>
                </select>
                <span class="text-danger" v-if="form.error.has('marital_id')">{{
                  form.error.get("marital_id")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Marital Status-->
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('has_kids') }">
              <label for="has_kids" class="col-sm-4 control-label">Tiene Hijos?:</label>
              <div class="col-sm-8">
                <div class="radio">
                  <label>
                    <input type="radio" name="has_kids" :value="1" v-model="form.fields.has_kids" />
                    Sí
                  </label>
                  <label>
                    <input type="radio" name="has_kids" :value="0" v-model="form.fields.has_kids" />
                    No
                  </label>
                </div>
                <span class="text-danger" v-if="form.error.has('has_kids')">{{
                  form.error.get("has_kids")
                }}</span>
              </div>
            </div>
          </div>
          <!-- ./Has Kids-->
        </div>
        <!-- .row -->
        <div class="row" v-if="isUpdating === false">
          <div class="col-lg-6">
            <div class="form-group" :class="{ 'has-error': form.error.has('punch') }">
              <label for="punch" class="col-sm-4 control-label">ID de Ponche:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="punch" name="punch" v-model="form.fields.punch" />
                <span class="text-danger" v-if="form.error.has('punch')">{{
                  form.error.get("punch")
                }}</span>
              </div>
            </div>
          </div>
        </div>
        <!-- .row -->
      </div>

      <div class="box-footer">
        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
            <button type="submit" class="btn text-uppercase" :class="[isUpdating ? 'btn-warning' : 'btn-primary']">
              {{ isUpdating? "Actualizar": "Crear" }}
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import DatePicker from "./../DatePicker";
import CreatePosition from "../forms/CreatePosition";
import EmployeeMixins from "./Mixins";
import Select2 from "../Select2.vue";

export default {
  name: "EmployeeForm",

  data() {
    return {
      form: new (this.$ioc.resolve("Form"))(this.getEmployeeObject(), false),
      positions_list: [],
      projects_list: [],
    };
  },

  mixins: [EmployeeMixins],

  props: {
    employee: {
      type: Object,
      required: true,
    },
    isUpdating: {
      type: Boolean,
      default: false,
    },
    nextPunchId: {
      required: false
    }
  },

  components: { DatePicker, CreatePosition, Select2 },

  mounted() {
    this.$store.dispatch("employee/set", this.employee);
    this.positions_list = this.employee.positions_list;
    this.projects_list = this.getProjectsList(this.employee.projects_list);
  },

  computed: {
    computedEmployee() {
      this.form.fields.hire_date =
        this.$store.getters["employee/getEmployee"].hire_date;
      return this.$store.getters["employee/getEmployee"];
    },

    computedPositionsList() {
      return this.positions_list.map(function (el) {
        return {
          text: `${el.name} / ${el.department.name}, $${el.salary}`,
          id: el.id,
        };
      });
    },
  },

  methods: {
    /**
     * Respond to the change event from the Select2 component.
     * @param object. The event payload, containing the field name being changed and the value selected for that field
     */
    selectUpdated(payload) {
      this.form.fields[payload.field] = payload.value;
    },
    /**
     * Map projects list
     */
    getProjectsList(projects) {
      return projects.filter(function (element) {
        return element.name.toLowerCase().search("downtime") == -1;
      });
    },
    handleForm() {
      this.isUpdating ? this.updateEmployee() : this.createEmployee();
    },
    createEmployee() {
      this.form.post("/admin/employees").then((response) => {
        this.form.fields = this.getEmployeeObject();

        this.$swal({
          type: "success",
          title: "Sweet",
          text: "Employee " + response.data.full_name + " was created!",
          confirmButtonText: '<i class="fa fa-edit"></i> Edit',
          confirmButtonClass: "btn btn-warning",
        }).then((result) => {
          if (result.value) {
            window.location.assign(
              `/admin/employees/${response.data.id}/edit`
            );
          }
        });
      });
    },

    updateEmployee() {
      this.form.put("/admin/employees/" + this.employee.id).then(({ data }) => {
        this.$store.dispatch("employee/set", data);

        this.$swal({
          type: "success",
          toast: true,
          position: 'bottom-end',
          title: 'Updated!',
          timer: 10000,
          timerProgressBar: true

        });

        return (this.form.fields = this.getEmployeeObject());
      });
    },
    addPosition(position) {
      this.positions_list.unshift(position);
      this.form.fields.position_id = position.id
    },
    getDefaultDateOfBirth(years_ago = 18) {
        const today = new Date();
        const date_of_birth = new Date();
        date_of_birth.setFullYear(today.getFullYear() - years_ago);

        return date_of_birth;
    },
    getEmployeeObject() {
      let employee = this.$store.getters["employee/getEmployee"];
      return {
        first_name: employee.hasOwnProperty("first_name")
          ? employee.first_name
          : "",
        second_first_name: employee.hasOwnProperty("second_first_name")
          ? employee.second_first_name
          : "",
        last_name: employee.hasOwnProperty("second_first_name")
          ? employee.last_name
          : "",
        second_last_name: employee.hasOwnProperty("second_last_name")
          ? employee.second_last_name
          : "",
        personal_id: employee.hasOwnProperty("personal_id")
          ? employee.personal_id
          : "",
        passport: employee.hasOwnProperty("passport") ? employee.passport : "",
        hire_date: employee.hasOwnProperty("hire_date")
          ? employee.hire_date
          : new Date(),
        date_of_birth: employee.hasOwnProperty("date_of_birth")
          ? employee.date_of_birth
          : this.getDefaultDateOfBirth(20),
        cellphone_number: employee.hasOwnProperty("cellphone_number")
          ? employee.cellphone_number
          : "",
        secondary_phone: employee.hasOwnProperty("secondary_phone")
          ? employee.secondary_phone
          : "",
        gender_id: employee.hasOwnProperty("gender_id")
          ? employee.gender_id
          : "",
        marital_id: employee.hasOwnProperty("marital_id")
          ? employee.marital_id
          : "",
        has_kids: employee.hasOwnProperty("has_kids")
          ? Number(employee.has_kids)
          : "",
        position_id: employee.hasOwnProperty("position_id")
          ? employee.position_id
          : "",
        site_id: employee.hasOwnProperty("site_id") ? employee.site_id : "",
        project_id: employee.hasOwnProperty("project_id")
          ? employee.project_id
          : "",
        punch: this.nextPunchId,
      };
    },
    updateHireDate(date) {
      this.form.fields.hire_date = date;
    },
    updateDateOfBirth(date) {
      this.form.fields.date_of_birth = date;
    },
  },
};
</script>

<style lang="css" scoped>

</style>
