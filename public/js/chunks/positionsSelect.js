(window.webpackJsonp=window.webpackJsonp||[]).push([[26],{A8I7:function(e,t,a){"use strict";a.r(t);var s=a("FTSL"),r=a("Snq/"),n=a.n(r),o={data:function(){return{positions:[],selected:this.current}},props:{current:{type:Number}},mounted:function(){this.changed()},methods:{changed:function(){this.$emit("changed",this.selected)},positionCreated:function(e){console.log(e.data),this.positions.unshift(e)}},components:{CreatePosition:s.a,vSelect:n.a}},i=a("KHd+"),l=Object(i.a)(o,(function(){var e=this,t=e._self._c;return t("div",{staticClass:"positions"},[t("div",{staticClass:"input-group"},[t("select",{directives:[{name:"model",rawName:"v-model",value:e.selected,expression:"selected"}],staticClass:"form-control",attrs:{name:"position_id",id:"position_id",required:"required"},on:{change:[function(t){var a=Array.prototype.filter.call(t.target.options,(function(e){return e.selected})).map((function(e){return"_value"in e?e._value:e.value}));e.selected=t.target.multiple?a:a[0]},e.changed]}},e._l(e.positions,(function(a){return t("option",{key:a.id,domProps:{value:a.id,selected:a.id==e.selected}},[e._v("\n                "+e._s(a.name_and_department)+",\n                $"+e._s(Number(a.salary).toFixed(2))+" -\n                "+e._s(a.payment_type?a.payment_type.name:"")+"\n            ")])})),0),e._v(" "),t("a",{staticClass:"input-group-addon",attrs:{href:"#"},on:{click:function(t){return t.preventDefault(),e.$modal.show("create-position")}}},[t("i",{staticClass:"fa fa-plus"}),e._v(" Add\n        ")])]),e._v(" "),t("create-position",{on:{"position-created":e.positionCreated}})],1)}),[],!1,null,null,null);t.default=l.exports},FTSL:function(e,t,a){"use strict";var s={name:"CreatePositionComponent",data:function(){return{form:new(this.$ioc.resolve("Form"))({name:"",department_id:"",payment_type_id:"",payment_frequency_id:"",salary:""}),departments:[]}},props:{departments_list:{required:!0},payment_types_list:{required:!0},payment_frequencies_list:{required:!0}},computed:{paymentTypes:function(){return this.payment_types_list},paymentFrequencies:function(){return this.payment_frequencies_list}},components:{CreateDepartment:a("sZXK").a},mounted:function(){return this.departments=this.departments_list},methods:{modalOpened:function(e){this.setFocusOnFirstElement(e)},createNew:function(){var e=this;this.form.post("/api/positions").then((function(t){e.$emit("position-created",t.data),e.form.fields.name="",e.$modal.hide("create-position")}))},setFocusOnFirstElement:function(e){var t=e.ref.getElementsByTagName("input");t.length>0&&t[0].focus()},departmentCreated:function(e){console.log(e),this.departments.unshift(e)}}},r=a("KHd+"),n=Object(r.a)(s,(function(){var e=this,t=e._self._c;return t("div",{staticClass:"_create_positions"},[t("a",{attrs:{href:"#"},on:{click:function(t){return t.preventDefault(),e.$modal.show("create-position")}}},[t("i",{staticClass:"fa fa-plus"}),e._v("\n        Add\n    ")]),e._v(" "),t("modal",{attrs:{name:"create-position",height:"auto",scrollable:!0},on:{opened:e.modalOpened}},[t("form",{staticClass:"form-horizontal",attrs:{role:"form",autocomplete:"off"},on:{submit:function(t){return t.preventDefault(),e.createNew.apply(null,arguments)}}},[t("div",{staticClass:"box-header with-border"},[t("h4",[e._v("Create Position")])]),e._v(" "),t("div",{staticClass:"box-body"},[t("div",{staticClass:"form-group",class:{"has-error":e.form.error.has("name")}},[t("label",{staticClass:"col-sm-3 control-label",attrs:{for:"name"}},[e._v("Name:")]),e._v(" "),t("div",{staticClass:"col-sm-9"},[t("div",{staticClass:"input-group"},[t("input",{directives:[{name:"model",rawName:"v-model",value:e.form.fields.name,expression:"form.fields.name"}],staticClass:"form-control",attrs:{type:"text",id:"create-position-name",name:"name"},domProps:{value:e.form.fields.name},on:{input:function(t){t.target.composing||e.$set(e.form.fields,"name",t.target.value)}}}),e._v(" "),t("div",{staticClass:"input-group-addon"},[t("i",{staticClass:"fa fa-flag"})])]),e._v(" "),e.form.error.has("name")?t("span",{staticClass:"text-danger"},[e._v(e._s(e.form.error.get("name")))]):e._e()])]),e._v(" "),t("div",{staticClass:"form-group",class:{"has-error":e.form.error.has("department_id")}},[t("label",{staticClass:"col-sm-3 control-label",attrs:{for:"input"}},[e._v("Department:")]),e._v(" "),t("div",{staticClass:"col-sm-9"},[t("div",{staticClass:"input-group"},[t("select",{directives:[{name:"model",rawName:"v-model",value:e.form.fields.department_id,expression:"form.fields.department_id"}],staticClass:"form-control",attrs:{name:"department_id",id:"department_id"},on:{change:function(t){var a=Array.prototype.filter.call(t.target.options,(function(e){return e.selected})).map((function(e){return"_value"in e?e._value:e.value}));e.$set(e.form.fields,"department_id",t.target.multiple?a:a[0])}}},e._l(e.departments,(function(a,s){return t("option",{key:s,domProps:{value:a.id}},[e._v(e._s(a.name))])})),0),e._v(" "),t("div",{staticClass:"input-group-addon"},[t("create-department",{on:{"department-created":e.departmentCreated}})],1)]),e._v(" "),e.form.error.has("department_id")?t("span",{staticClass:"text-danger"},[e._v(e._s(e.form.error.get("department_id")))]):e._e()])]),e._v(" "),t("div",{staticClass:"form-group",class:{"has-error":e.form.error.has("payment_type_id")}},[t("label",{staticClass:"col-sm-3 control-label",attrs:{for:"input"}},[e._v("Payment Type:")]),e._v(" "),t("div",{staticClass:"col-sm-9"},[t("select",{directives:[{name:"model",rawName:"v-model",value:e.form.fields.payment_type_id,expression:"form.fields.payment_type_id"}],staticClass:"form-control",attrs:{name:"payment_type_id",id:"payment_type_id"},on:{change:function(t){var a=Array.prototype.filter.call(t.target.options,(function(e){return e.selected})).map((function(e){return"_value"in e?e._value:e.value}));e.$set(e.form.fields,"payment_type_id",t.target.multiple?a:a[0])}}},e._l(e.paymentTypes,(function(a,s){return t("option",{key:s,domProps:{value:a.id}},[e._v(e._s(a.name))])})),0),e._v(" "),e.form.error.has("payment_type_id")?t("span",{staticClass:"text-danger"},[e._v(e._s(e.form.error.get("payment_type_id")))]):e._e()])]),e._v(" "),t("div",{staticClass:"form-group",class:{"has-error":e.form.error.has("payment_frequency_id")}},[t("label",{staticClass:"col-sm-3 control-label",attrs:{for:"input"}},[e._v("Payment Frequency:")]),e._v(" "),t("div",{staticClass:"col-sm-9"},[t("select",{directives:[{name:"model",rawName:"v-model",value:e.form.fields.payment_frequency_id,expression:"form.fields.payment_frequency_id"}],staticClass:"form-control",attrs:{name:"payment_frequency_id",id:"payment_frequency_id"},on:{change:function(t){var a=Array.prototype.filter.call(t.target.options,(function(e){return e.selected})).map((function(e){return"_value"in e?e._value:e.value}));e.$set(e.form.fields,"payment_frequency_id",t.target.multiple?a:a[0])}}},e._l(e.paymentFrequencies,(function(a,s){return t("option",{key:s,domProps:{value:a.id}},[e._v(e._s(a.name))])})),0),e._v(" "),e.form.error.has("payment_frequency_id")?t("span",{staticClass:"text-danger"},[e._v(e._s(e.form.error.get("payment_frequency_id")))]):e._e()])]),e._v(" "),t("div",{staticClass:"form-group",class:{"has-error":e.form.error.has("salary")}},[t("div",{},[t("label",{staticClass:"col-sm-3 control-label",attrs:{for:"salary"}},[e._v("Salary:")]),e._v(" "),t("div",{staticClass:"col-sm-9"},[t("div",{staticClass:"input-group"},[t("input",{directives:[{name:"model",rawName:"v-model",value:e.form.fields.salary,expression:"form.fields.salary"}],staticClass:"form-control",attrs:{type:"number",id:"create-position-salary",name:"salary"},domProps:{value:e.form.fields.salary},on:{input:function(t){t.target.composing||e.$set(e.form.fields,"salary",t.target.value)}}}),e._v(" "),t("div",{staticClass:"input-group-addon"},[t("i",{staticClass:"fa fa-money"})])]),e._v(" "),e.form.error.has("salary")?t("span",{staticClass:"text-danger"},[e._v(e._s(e.form.error.get("salary")))]):e._e()])])])]),e._v(" "),t("div",{staticClass:"box-footer"},[t("button",{staticClass:"btn btn-primary",attrs:{type:"submit"}},[e._v("CREATE")])])])])],1)}),[],!1,null,null,null);t.a=n.exports},sZXK:function(e,t,a){"use strict";var s={name:"CreateDepartment",data:function(){return{form:new(this.$ioc.resolve("Form"))({name:""})}},methods:{modalOpened:function(e){this.setFocusOnFirstElement(e)},createNew:function(){var e=this;this.form.post("/api/departments").then((function(t){e.$emit("department-created",t.data),e.form.fields.name="",e.$modal.hide("create-department")}))},setFocusOnFirstElement:function(e){var t=e.ref.getElementsByTagName("input");t.length>0&&t[0].focus()}}},r=a("KHd+"),n=Object(r.a)(s,(function(){var e=this,t=e._self._c;return t("div",{staticClass:"_create_departments"},[t("a",{attrs:{href:"#"},on:{click:function(t){return t.preventDefault(),e.$modal.show("create-department")}}},[t("i",{staticClass:"fa fa-plus"}),e._v("\n        Add\n    ")]),e._v(" "),t("modal",{attrs:{name:"create-department",height:"auto",scrollable:!0},on:{opened:e.modalOpened}},[t("form",{staticClass:"form-horizontal",attrs:{role:"form",autocomplete:"off"},on:{submit:function(t){return t.preventDefault(),e.createNew.apply(null,arguments)}}},[t("div",{staticClass:"box-header with-border"},[t("h4",[e._v("Create Department")])]),e._v(" "),t("div",{staticClass:"box-body"},[t("div",{staticClass:"form-group",class:{"has-error":e.form.error.has("name")}},[t("div",{},[t("label",{staticClass:"col-sm-3 control-label",attrs:{for:"name"}},[e._v("Name:")]),e._v(" "),t("div",{staticClass:"col-sm-9"},[t("div",{staticClass:"input-group"},[t("input",{directives:[{name:"model",rawName:"v-model",value:e.form.fields.name,expression:"form.fields.name"}],staticClass:"form-control",attrs:{type:"text",id:"create-department-name",name:"name"},domProps:{value:e.form.fields.name},on:{input:function(t){t.target.composing||e.$set(e.form.fields,"name",t.target.value)}}}),e._v(" "),t("div",{staticClass:"input-group-addon"},[t("i",{staticClass:"fa fa-flag"})])]),e._v(" "),e.form.error.has("name")?t("span",{staticClass:"text-danger"},[e._v(e._s(e.form.error.get("name")))]):e._e()])])])]),e._v(" "),t("div",{staticClass:"box-footer"},[t("button",{staticClass:"btn btn-primary",attrs:{type:"submit"}},[e._v("CREATE")])])])])],1)}),[],!1,null,null,null);t.a=n.exports}}]);