(window.webpackJsonp=window.webpackJsonp||[]).push([[19],{KDIo:function(e,t,n){"use strict";n.r(t);var o={data:function(){return{isCheked:!1}},props:["employees"],methods:{toggleChecked:function(){this.isCheked=!this.isCheked}}},s=n("KHd+"),i=Object(s.a)(o,(function(){var e=this,t=e._self._c;return t("div",{staticClass:"wrapper"},e._l(e.employees,(function(n){return t("div",{key:n.id},[t("div",{staticClass:"checkbox",class:{"bg-danger":e.isCheked}},[t("label",[t("input",{attrs:{type:"checkbox",name:"employee[]"},domProps:{value:n.id},on:{change:e.toggleChecked}}),e._v(" "),t("b",[e._v(e._s(n.full_name))]),e._t("default")],2)])])})),0)}),[],!1,null,"05f03eb6",null);t.default=i.exports},"KHd+":function(e,t,n){"use strict";function o(e,t,n,o,s,i,r,a){var c,d="function"==typeof e?e.options:e;if(t&&(d.render=t,d.staticRenderFns=n,d._compiled=!0),o&&(d.functional=!0),i&&(d._scopeId="data-v-"+i),r?(c=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),s&&s.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(r)},d._ssrRegister=c):s&&(c=a?function(){s.call(this,(d.functional?this.parent:this).$root.$options.shadowRoot)}:s),c)if(d.functional){d._injectStyles=c;var l=d.render;d.render=function(e,t){return c.call(t),l(e,t)}}else{var u=d.beforeCreate;d.beforeCreate=u?[].concat(u,c):[c]}return{exports:e,options:d}}n.d(t,"a",(function(){return o}))}}]);