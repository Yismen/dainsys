(window.webpackJsonp=window.webpackJsonp||[]).push([[6],{"KHd+":function(t,n,i){"use strict";function a(t,n,i,a,o,s,e,r){var c,l="function"==typeof t?t.options:t;if(n&&(l.render=n,l.staticRenderFns=i,l._compiled=!0),a&&(l.functional=!0),s&&(l._scopeId="data-v-"+s),e?(c=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),o&&o.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(e)},l._ssrRegister=c):o&&(c=r?function(){o.call(this,(l.functional?this.parent:this).$root.$options.shadowRoot)}:o),c)if(l.functional){l._injectStyles=c;var f=l.render;l.render=function(t,n){return c.call(n),f(t,n)}}else{var d=l.beforeCreate;l.beforeCreate=d?[].concat(d,c):[c]}return{exports:t,options:l}}i.d(n,"a",(function(){return a}))},assA:function(t,n,i){"use strict";i.r(n);var a={data:function(){return{notificationsData:this.notifications,notification:{},moment:window.moment}},props:["notifications","user_id"],mounted:function(){var t=this;window.Echo.private("App.User.".concat(this.user_id)).listen("UserAppNotificationSent",(function(n){t.notificationsData.unshift(n.notification)}))},computed:{count:function(){return this.notificationsData.length}},methods:{parseClass:function(t){var n=t.data?t.data.css_class:"bg-gray";return String(n).search("bg-")>=0?n:"bg-".concat(n)},showModal:function(t){this.$modal.show("notifications-modal",t)},closeModal:function(){this.$modal.hide("notifications-modal")},beforeOpen:function(t){var n=this,i=t.params;this.notification=i,this.notification.type=i.type,axios.get("/api/notifications/show/".concat(i.id)).then((function(t){n.notificationsData=n.notificationsData.filter((function(t){return t.id!=i.id}))}))},markAllAsRead:function(){var t=this;this.$swal({type:"warning",title:"Confirm",text:"Are you sure you want to mark them all as read? By proceeding all notifications will disapear!",confirmButtonText:'<i class="fa fa-edit"></i> Confirm',confirmButtonClass:"btn btn-warning"}).then((function(n){n.value&&axios.post("/api/notifications/mark-all-as-read").then((function(n){t.notificationsData=n.data}))}))},fetchUnreadNotifications:function(){var t=this;axios.get("/api/notifications/unread").then((function(n){return t.notificationsData=n.data}))}}},o=i("KHd+"),s=Object(o.a)(a,(function(){var t=this,n=t.$createElement,i=t._self._c||n;return i("li",{staticClass:"dropdown notifications-menu"},[i("a",{staticClass:"dropdown-toggle",attrs:{href:"#","data-toggle":"dropdown"}},[i("i",{staticClass:"fa fa-bell-o"}),t._v(" "),i("span",{staticClass:"label",class:[t.count>0?"label-info":"bg-gray"]},[t._v("\r\n            "+t._s(t.count)+" \r\n        ")])]),t._v(" "),i("ul",{staticClass:"dropdown-menu"},[i("li",{staticClass:"header"},[t._v("\r\n            You have "+t._s(t.count)+" new notifications\r\n            ")]),t._v(" "),i("li",[i("ul",{staticClass:"menu"},t._l(t.notificationsData,(function(n){return i("li",{key:n.id,class:t.parseClass(n)},[i("a",{attrs:{href:"#"},on:{click:function(i){return i.preventDefault(),t.showModal(n)}}},[i("i",{staticClass:"fa fa-bell-o text-aqua"}),t._v(t._s(n.data?n.data.subject:"No Subject")+" \r\n                    ")])])})),0)]),t._v(" "),t.count>0?i("a",{staticClass:"btn btn-danger form-control",attrs:{href:"#",title:"All notifications will be marked as read!"},on:{click:function(n){return n.preventDefault(),t.markAllAsRead.apply(null,arguments)}}},[t._v("\r\n            Mark All as Read\r\n        ")]):t._e()]),t._v(" "),i("modal",{attrs:{name:"notifications-modal",height:"auto",scrollable:!0},on:{"before-open":t.beforeOpen}},[i("div",{staticClass:"box box-solid"},[i("div",{staticClass:"box-header with-border"},[i("h4",[t._v("\r\n                    "+t._s(t.notification.data?t.notification.data.subject:"No Subject")+" \r\n                    "),i("a",{staticClass:"btn btn-link pull-right",attrs:{href:"#"},on:{click:function(n){return n.preventDefault(),t.closeModal.apply(null,arguments)}}},[t._v(" X ")])])]),t._v(" "),i("div",{staticClass:"box-body"},[t.notification.data&&t.notification.data.body?i("p",[t._v(t._s(t.notification.data.body)+" ")]):i("pre",[t._v(t._s(t.notification)+" ")])]),t._v(" "),i("div",{staticClass:"box-footer"},[t._v("\r\n                Notification type: "+t._s(t.notification.type)+", @ "+t._s(t.moment(t.notification.created_at).format("Y-MM-DD H:mm:ss"))+"\r\n            ")])])])],1)}),[],!1,null,"75011833",null);n.default=s.exports}}]);