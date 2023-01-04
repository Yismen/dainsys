"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["js/chunks/appNotification"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/AppNotifications.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/AppNotifications.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var NOTIFICATIONS_AMOUNT = 25;
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      notificationsData: this.notifications,
      notification: {},
      notificationsCount: 0,
      moment: window.moment
    };
  },
  props: {
    notifications: {
      type: Array,
      required: true
    },
    user_id: {
      type: Number,
      required: true
    },
    count: {
      type: Number,
      required: true
    }
  },
  mounted: function mounted() {
    var vm = this;
    this.notificationsCount = this.count;
    window.Echo["private"]("App.User.".concat(this.user_id)).listen("UserAppNotificationSent", function (response) {
      vm.notificationsData.unshift(response.notification);
      vm.notificationsCount--;
    });
  },
  methods: {
    parseClass: function parseClass(notification) {
      var css_class = notification.data ? notification.data.css_class : "bg-gray";
      return String(css_class).search("bg-") >= 0 ? css_class : "bg-".concat(css_class);
    },
    showModal: function showModal(notification) {
      this.$modal.show("notifications-modal", notification);
    },
    closeModal: function closeModal() {
      this.$modal.hide("notifications-modal");
    },
    beforeOpen: function beforeOpen(event) {
      var _this = this;
      var params = event.params;
      this.notification = params;
      this.notification.type = params.type;
      axios.get("/api/notifications/show/".concat(params.id)).then(function (response) {
        _this.notificationsCount--;
        _this.notificationsData = _this.notificationsData.filter(function (el) {
          return el.id != params.id;
        });
      });
    },
    markAllAsRead: function markAllAsRead() {
      var _this2 = this;
      this.$swal({
        type: "warning",
        title: "Confirm",
        text: "Are you sure you want to mark them all as read? By proceeding all notifications will disapear!",
        confirmButtonText: '<i class="fa fa-edit"></i> Confirm',
        confirmButtonClass: "btn btn-warning"
      }).then(function (result) {
        if (result.value) {
          axios.post("/api/notifications/mark-all-as-read").then(function (response) {
            _this2.notificationsData = response.data;
            _this2.notificationsCount = _this2.notificationsCount < NOTIFICATIONS_AMOUNT ? 0 : _this2.notificationsCount - NOTIFICATIONS_AMOUNT;
          });
        }
      });
    },
    fetchUnreadNotifications: function fetchUnreadNotifications() {
      var _this3 = this;
      axios.get("/api/notifications/unread").then(function (response) {
        return _this3.notificationsData = response.data;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/AppNotifications.vue?vue&type=template&id=e43ac19c&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/AppNotifications.vue?vue&type=template&id=e43ac19c&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("li", {
    staticClass: "dropdown notifications-menu"
  }, [_c("a", {
    staticClass: "dropdown-toggle",
    attrs: {
      href: "#",
      "data-toggle": "dropdown"
    }
  }, [_c("i", {
    staticClass: "fa fa-bell-o"
  }), _vm._v(" "), _c("span", {
    staticClass: "label",
    "class": [_vm.notificationsCount > 0 ? "label-info" : "bg-gray"]
  }, [_vm._v("\n      " + _vm._s(_vm.notificationsCount) + "\n    ")])]), _vm._v(" "), _c("ul", {
    staticClass: "dropdown-menu"
  }, [_c("li", {
    staticClass: "header"
  }, [_vm._v("\n      You have " + _vm._s(_vm.notificationsCount) + " new notifications\n      ")]), _vm._v(" "), _c("li", [_c("ul", {
    staticClass: "menu"
  }, _vm._l(_vm.notificationsData, function (notification) {
    return _c("li", {
      key: notification.id,
      "class": _vm.parseClass(notification)
    }, [_c("a", {
      attrs: {
        href: "#"
      },
      on: {
        click: function click($event) {
          $event.preventDefault();
          return _vm.showModal(notification);
        }
      }
    }, [_c("i", {
      staticClass: "fa fa-bell-o text-aqua"
    }), _vm._v(_vm._s(notification.data ? notification.data.subject : "No Subject") + "\n          ")])]);
  }), 0)]), _vm._v(" "), _vm.notificationsCount > 0 ? _c("a", {
    staticClass: "btn btn-danger form-control",
    attrs: {
      href: "#",
      title: "All notifications will be marked as read!"
    },
    on: {
      click: function click($event) {
        $event.preventDefault();
        return _vm.markAllAsRead.apply(null, arguments);
      }
    }
  }, [_vm._v("\n      Mark All as Read\n    ")]) : _vm._e()]), _vm._v(" "), _c("modal", {
    attrs: {
      name: "notifications-modal",
      height: "auto",
      scrollable: true
    },
    on: {
      "before-open": _vm.beforeOpen
    }
  }, [_c("div", {
    staticClass: "box box-solid"
  }, [_c("div", {
    staticClass: "box-header with-border"
  }, [_c("h4", [_vm._v("\n          " + _vm._s(_vm.notification.data ? _vm.notification.data.subject : "No Subject") + "\n          "), _c("a", {
    staticClass: "btn btn-link pull-right",
    attrs: {
      href: "#"
    },
    on: {
      click: function click($event) {
        $event.preventDefault();
        return _vm.closeModal.apply(null, arguments);
      }
    }
  }, [_vm._v("\n            X\n          ")])])]), _vm._v(" "), _c("div", {
    staticClass: "box-body"
  }, [_vm.notification.data && _vm.notification.data.body ? _c("p", [_vm._v("\n          " + _vm._s(_vm.notification.data.body) + "\n        ")]) : _c("pre", [_vm._v(_vm._s(_vm.notification) + " ")])]), _vm._v(" "), _c("div", {
    staticClass: "box-footer"
  }, [_vm._v("\n        Notification type: " + _vm._s(_vm.notification.type) + ", @\n        " + _vm._s(_vm.moment(_vm.notification.created_at).format("Y-MM-DD H:mm:ss")) + "\n      ")])])])], 1);
};
var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./resources/js/components/AppNotifications.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/AppNotifications.vue ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _AppNotifications_vue_vue_type_template_id_e43ac19c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AppNotifications.vue?vue&type=template&id=e43ac19c&scoped=true& */ "./resources/js/components/AppNotifications.vue?vue&type=template&id=e43ac19c&scoped=true&");
/* harmony import */ var _AppNotifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AppNotifications.vue?vue&type=script&lang=js& */ "./resources/js/components/AppNotifications.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _AppNotifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AppNotifications_vue_vue_type_template_id_e43ac19c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _AppNotifications_vue_vue_type_template_id_e43ac19c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "e43ac19c",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/AppNotifications.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/AppNotifications.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/AppNotifications.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AppNotifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./AppNotifications.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/AppNotifications.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AppNotifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/AppNotifications.vue?vue&type=template&id=e43ac19c&scoped=true&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/components/AppNotifications.vue?vue&type=template&id=e43ac19c&scoped=true& ***!
  \*************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_AppNotifications_vue_vue_type_template_id_e43ac19c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_AppNotifications_vue_vue_type_template_id_e43ac19c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_AppNotifications_vue_vue_type_template_id_e43ac19c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./AppNotifications.vue?vue&type=template&id=e43ac19c&scoped=true& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/AppNotifications.vue?vue&type=template&id=e43ac19c&scoped=true&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ normalizeComponent)
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent(
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */,
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options =
    typeof scriptExports === 'function' ? scriptExports.options : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) {
    // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
          injectStyles.call(
            this,
            (options.functional ? this.parent : this).$root.$options.shadowRoot
          )
        }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection(h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing ? [].concat(existing, hook) : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

}]);