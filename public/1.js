(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Orders/List.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Orders/List.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _navmenu_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../navmenu.vue */ "./resources/js/components/navmenu.vue");


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    navmenu: _navmenu_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  methods: {
    handleClick: function handleClick() {
      console.log('click');
    },
    getList: function getList() {
      var _this = this;
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('api/orders').then(function (response) {
        _this.list = response.data.data;
        console.log('list: ', _this.list, response);
      })["catch"](function (error) {
        console.log(error);
      });
    },
    handleDelete: function handleDelete(id) {
      var _this2 = this;
      this.$confirm('This will permanently delete Order#' + id + '. Continue?', 'Warning', {
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancel',
        type: 'warning'
      }).then(function () {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a["delete"]('/api/orders/' + id).then(function (response) {
          _this2.$message({
            type: 'success',
            message: 'Delete completed'
          });
          _this2.getList();
        })["catch"](function (error) {
          console.log(error);
        });
      })["catch"](function () {
        _this2.$message({
          type: 'info',
          message: 'Delete canceled'
        });
      });
    }
  },
  data: function data() {
    return {
      list: [],
      total: 0,
      loading: true,
      downloading: false
    };
  },
  mounted: function mounted() {
    console.log('mounted Order List');
    this.getList();
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/navmenu.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/navmenu.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      activeIndex: '1',
      activeIndex2: '1'
    };
  },
  methods: {
    handleSelect: function handleSelect(key, keyPath) {
      console.log(key, keyPath);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Orders/List.vue?vue&type=template&id=413c008d&scoped=true&":
/*!********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Orders/List.vue?vue&type=template&id=413c008d&scoped=true& ***!
  \********************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "container-fluid"
  }, [_c("navmenu"), _vm._v(" "), _c("el-row", {
    attrs: {
      gutter: 20
    }
  }, [_c("el-col", {
    attrs: {
      span: 6,
      offset: 18
    }
  }, [_c("router-link", {
    attrs: {
      to: "/orders/create"
    }
  }, [_c("el-button", {
    attrs: {
      type: "primary",
      size: "medium",
      icon: "el-icon-plus"
    }
  }, [_vm._v("\n            Add New Order\n          ")])], 1)], 1)], 1), _vm._v(" "), _c("el-table", {
    staticStyle: {
      width: "100%"
    },
    attrs: {
      data: _vm.list
    }
  }, [_c("el-table-column", {
    attrs: {
      fixed: "",
      prop: "date",
      label: "Date",
      width: "150"
    },
    scopedSlots: _vm._u([{
      key: "default",
      fn: function fn(scope) {
        return [_c("span", [_vm._v(_vm._s(scope.row.date))])];
      }
    }])
  }), _vm._v(" "), _c("el-table-column", {
    attrs: {
      prop: "project_name",
      label: "Project"
    },
    scopedSlots: _vm._u([{
      key: "default",
      fn: function fn(scope) {
        return [_c("span", [_vm._v(_vm._s(scope.row.project_name))])];
      }
    }])
  }), _vm._v(" "), _c("el-table-column", {
    attrs: {
      prop: "supplier_name",
      label: "Supplier"
    },
    scopedSlots: _vm._u([{
      key: "default",
      fn: function fn(scope) {
        return [_c("span", [_vm._v(_vm._s(scope.row.supplier_name))])];
      }
    }])
  }), _vm._v(" "), _c("el-table-column", {
    attrs: {
      prop: "total",
      label: "Total"
    },
    scopedSlots: _vm._u([{
      key: "default",
      fn: function fn(scope) {
        return [_c("span", [_vm._v(_vm._s(scope.row.total))])];
      }
    }])
  }), _vm._v(" "), _c("el-table-column", {
    attrs: {
      prop: "payment_status",
      label: "Payment Status"
    },
    scopedSlots: _vm._u([{
      key: "default",
      fn: function fn(scope) {
        return [_c("span", [_vm._v(_vm._s(scope.row.payment_status))])];
      }
    }])
  }), _vm._v(" "), _c("el-table-column", {
    attrs: {
      prop: "total_discount",
      label: "Discount"
    },
    scopedSlots: _vm._u([{
      key: "default",
      fn: function fn(scope) {
        return [_c("span", [_vm._v(_vm._s(scope.row.total_discount))])];
      }
    }])
  }), _vm._v(" "), _c("el-table-column", {
    attrs: {
      fixed: "right",
      label: "Operations"
    },
    scopedSlots: _vm._u([{
      key: "default",
      fn: function fn(scope) {
        return [_c("router-link", {
          attrs: {
            to: "/orders/edit/" + scope.row.id
          }
        }, [_c("el-button", {
          attrs: {
            type: "primary",
            size: "small",
            icon: "el-icon-edit"
          }
        }, [_vm._v("\n            Edit\n          ")])], 1), _vm._v(" "), _c("router-link", {
          attrs: {
            to: "/orders/view/" + scope.row.id
          }
        }, [_c("el-button", {
          attrs: {
            type: "warning",
            size: "small",
            icon: "el-icon-info"
          }
        }, [_vm._v("\n            Detail\n          ")])], 1), _vm._v(" "), _c("el-button", {
          attrs: {
            type: "danger",
            size: "small",
            icon: "el-icon-delete"
          },
          on: {
            click: function click($event) {
              return _vm.handleDelete(scope.row.id);
            }
          }
        }, [_vm._v("\n            Delete\n          ")])];
      }
    }])
  })], 1)], 1);
};
var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/navmenu.vue?vue&type=template&id=31baa587&":
/*!****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/navmenu.vue?vue&type=template&id=31baa587& ***!
  \****************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", [_c("el-menu", {
    staticClass: "el-menu-demo",
    attrs: {
      "default-active": _vm.activeIndex2,
      mode: "horizontal",
      "background-color": "#545c64",
      "text-color": "#fff",
      "active-text-color": "#ffd04b"
    },
    on: {
      select: _vm.handleSelect
    }
  }, [_c("el-menu-item", {
    attrs: {
      index: "1"
    }
  }, [_c("router-link", {
    attrs: {
      to: "/orders"
    }
  }, [_vm._v("Orders")])], 1), _vm._v(" "), _c("el-submenu", {
    attrs: {
      index: "2"
    }
  }, [_c("template", {
    slot: "title"
  }, [_vm._v("Workspace")]), _vm._v(" "), _c("el-menu-item", {
    attrs: {
      index: "2-1"
    }
  }, [_vm._v("item one")]), _vm._v(" "), _c("el-menu-item", {
    attrs: {
      index: "2-2"
    }
  }, [_vm._v("item two")]), _vm._v(" "), _c("el-menu-item", {
    attrs: {
      index: "2-3"
    }
  }, [_vm._v("item three")]), _vm._v(" "), _c("el-submenu", {
    attrs: {
      index: "2-4"
    }
  }, [_c("template", {
    slot: "title"
  }, [_vm._v("item four")]), _vm._v(" "), _c("el-menu-item", {
    attrs: {
      index: "2-4-1"
    }
  }, [_vm._v("item one")]), _vm._v(" "), _c("el-menu-item", {
    attrs: {
      index: "2-4-2"
    }
  }, [_vm._v("item two")]), _vm._v(" "), _c("el-menu-item", {
    attrs: {
      index: "2-4-3"
    }
  }, [_vm._v("item three")])], 2)], 2), _vm._v(" "), _c("el-menu-item", {
    attrs: {
      index: "3",
      disabled: ""
    }
  }, [_vm._v("Info")])], 1)], 1);
};
var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
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


/***/ }),

/***/ "./resources/js/components/Orders/List.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/Orders/List.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _List_vue_vue_type_template_id_413c008d_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./List.vue?vue&type=template&id=413c008d&scoped=true& */ "./resources/js/components/Orders/List.vue?vue&type=template&id=413c008d&scoped=true&");
/* harmony import */ var _List_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./List.vue?vue&type=script&lang=js& */ "./resources/js/components/Orders/List.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _List_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _List_vue_vue_type_template_id_413c008d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _List_vue_vue_type_template_id_413c008d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "413c008d",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Orders/List.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Orders/List.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/Orders/List.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_List_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./List.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Orders/List.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_List_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Orders/List.vue?vue&type=template&id=413c008d&scoped=true&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/Orders/List.vue?vue&type=template&id=413c008d&scoped=true& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_List_vue_vue_type_template_id_413c008d_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!../../../../node_modules/vue-loader/lib??vue-loader-options!./List.vue?vue&type=template&id=413c008d&scoped=true& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Orders/List.vue?vue&type=template&id=413c008d&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_List_vue_vue_type_template_id_413c008d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_List_vue_vue_type_template_id_413c008d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/navmenu.vue":
/*!*********************************************!*\
  !*** ./resources/js/components/navmenu.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _navmenu_vue_vue_type_template_id_31baa587___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./navmenu.vue?vue&type=template&id=31baa587& */ "./resources/js/components/navmenu.vue?vue&type=template&id=31baa587&");
/* harmony import */ var _navmenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./navmenu.vue?vue&type=script&lang=js& */ "./resources/js/components/navmenu.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _navmenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _navmenu_vue_vue_type_template_id_31baa587___WEBPACK_IMPORTED_MODULE_0__["render"],
  _navmenu_vue_vue_type_template_id_31baa587___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/navmenu.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/navmenu.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/components/navmenu.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_navmenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./navmenu.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/navmenu.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_navmenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/navmenu.vue?vue&type=template&id=31baa587&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/navmenu.vue?vue&type=template&id=31baa587& ***!
  \****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_navmenu_vue_vue_type_template_id_31baa587___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!../../../node_modules/vue-loader/lib??vue-loader-options!./navmenu.vue?vue&type=template&id=31baa587& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/navmenu.vue?vue&type=template&id=31baa587&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_navmenu_vue_vue_type_template_id_31baa587___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_navmenu_vue_vue_type_template_id_31baa587___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);