(window.webpackJsonp=window.webpackJsonp||[]).push([[8],{Jbxb:function(e,t,a){"use strict";a.r(t);var s={name:"CreateAfpComponent",data:function(){return{form:new(this.$ioc.resolve("Form"))({name:""})}},methods:{modalOpened:function(e){var t=e.ref.getElementsByTagName("input");t.length>0&&t[0].focus()},createNew:function(){var e=this;this.form.post("/api/afps",{}).then((function(t){e.$emit("afp-created",t.data),e.form.fields.name="",e.$swal("Nice!","The Afp "+t.data.name+" was added!","success"),e.$modal.hide("create-afp")}))}}},n=a("KHd+"),o=Object(n.a)(s,(function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"_create_Afps"},[a("modal",{attrs:{name:"create-afp",height:"auto",scrollable:!0},on:{opened:e.modalOpened}},[a("form",{staticClass:"form-horizonal",attrs:{role:"form",autocomplete:"off"},on:{submit:function(t){return t.preventDefault(),e.createNew.apply(null,arguments)}}},[a("div",{staticClass:"box-header with-border"},[a("h4",[e._v("Create Afp")])]),e._v(" "),a("div",{staticClass:"box-body"},[a("div",{staticClass:"form-group",class:{"has-error":e.form.error.has("name")}},[a("div",{},[a("label",{staticClass:"col-sm-2 control-label",attrs:{for:"name"}},[e._v("Name:")]),e._v(" "),a("div",{staticClass:"col-sm-10"},[a("div",{staticClass:"input-group"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.form.fields.name,expression:"form.fields.name"}],staticClass:"form-control",attrs:{type:"text",id:"create-afp-name",name:"name"},domProps:{value:e.form.fields.name},on:{input:function(t){t.target.composing||e.$set(e.form.fields,"name",t.target.value)}}}),e._v(" "),a("div",{staticClass:"input-group-addon"},[a("i",{staticClass:"fa fa-flag"})])]),e._v(" "),e.form.error.has("name")?a("span",{staticClass:"text-danger"},[e._v(e._s(e.form.error.get("name")))]):e._e()])])])]),e._v(" "),a("div",{staticClass:"box-footer"},[a("button",{staticClass:"btn btn-primary",attrs:{type:"submit"}},[e._v("CREATE")])])])])],1)}),[],!1,null,null,null);t.default=o.exports},"KHd+":function(e,t,a){"use strict";function s(e,t,a,s,n,o,r,i){var l,c="function"==typeof e?e.options:e;if(t&&(c.render=t,c.staticRenderFns=a,c._compiled=!0),s&&(c.functional=!0),o&&(c._scopeId="data-v-"+o),r?(l=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),n&&n.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},c._ssrRegister=l):n&&(l=i?function(){n.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:n),l)if(c.functional){c._injectStyles=l;var f=c.render;c.render=function(e,t){return l.call(t),f(e,t)}}else{var d=c.beforeCreate;c.beforeCreate=d?[].concat(d,l):[l]}return{exports:e,options:c}}a.d(t,"a",(function(){return s}))}}]);