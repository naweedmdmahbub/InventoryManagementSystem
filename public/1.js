(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Orders/Create.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Orders/Create.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      form: {
        name: '',
        region: '',
        date1: '',
        date2: '',
        delivery: false,
        type: [],
        resource: '',
        desc: ''
      },
      previous: ''
    };
  },
  mounted: function mounted() {
    console.log('mounted Create Order:', this.$route, this.$route.params);
  },
  methods: {
    onSubmit: function onSubmit() {
      console.log('submit!');
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Orders/Create.vue?vue&type=template&id=5d0dd82b&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Orders/Create.vue?vue&type=template&id=5d0dd82b&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************************************/
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
    staticClass: "form-container"
  }, [_c("el-form", {
    ref: "form",
    attrs: {
      model: _vm.form,
      "label-position": "left",
      "label-width": "150px"
    }
  }, [_c("el-form-item", {
    attrs: {
      label: "Activity name"
    }
  }, [_c("el-input", {
    model: {
      value: _vm.form.name,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "name", $$v);
      },
      expression: "form.name"
    }
  })], 1), _vm._v(" "), _c("el-form-item", {
    attrs: {
      label: "Activity zone"
    }
  }, [_c("el-select", {
    attrs: {
      placeholder: "please select your zone"
    },
    model: {
      value: _vm.form.region,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "region", $$v);
      },
      expression: "form.region"
    }
  }, [_c("el-option", {
    attrs: {
      label: "Zone one",
      value: "shanghai"
    }
  }), _vm._v(" "), _c("el-option", {
    attrs: {
      label: "Zone two",
      value: "beijing"
    }
  })], 1)], 1), _vm._v(" "), _c("el-form-item", {
    attrs: {
      label: "Activity time"
    }
  }, [_c("el-col", {
    attrs: {
      span: 11
    }
  }, [_c("el-date-picker", {
    staticStyle: {
      width: "100%"
    },
    attrs: {
      type: "date",
      placeholder: "Pick a date"
    },
    model: {
      value: _vm.form.date1,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "date1", $$v);
      },
      expression: "form.date1"
    }
  })], 1), _vm._v(" "), _c("el-col", {
    staticClass: "line",
    attrs: {
      span: 2
    }
  }, [_vm._v("-")]), _vm._v(" "), _c("el-col", {
    attrs: {
      span: 11
    }
  }, [_c("el-time-picker", {
    staticStyle: {
      width: "100%"
    },
    attrs: {
      placeholder: "Pick a time"
    },
    model: {
      value: _vm.form.date2,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "date2", $$v);
      },
      expression: "form.date2"
    }
  })], 1)], 1), _vm._v(" "), _c("el-form-item", {
    attrs: {
      label: "Instant delivery"
    }
  }, [_c("el-switch", {
    model: {
      value: _vm.form.delivery,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "delivery", $$v);
      },
      expression: "form.delivery"
    }
  })], 1), _vm._v(" "), _c("el-form-item", {
    attrs: {
      label: "Activity type"
    }
  }, [_c("el-checkbox-group", {
    model: {
      value: _vm.form.type,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "type", $$v);
      },
      expression: "form.type"
    }
  }, [_c("el-checkbox", {
    attrs: {
      label: "Online activities",
      name: "type"
    }
  }), _vm._v(" "), _c("el-checkbox", {
    attrs: {
      label: "Promotion activities",
      name: "type"
    }
  }), _vm._v(" "), _c("el-checkbox", {
    attrs: {
      label: "Offline activities",
      name: "type"
    }
  }), _vm._v(" "), _c("el-checkbox", {
    attrs: {
      label: "Simple brand exposure",
      name: "type"
    }
  })], 1)], 1), _vm._v(" "), _c("el-form-item", {
    attrs: {
      label: "Resources"
    }
  }, [_c("el-radio-group", {
    model: {
      value: _vm.form.resource,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "resource", $$v);
      },
      expression: "form.resource"
    }
  }, [_c("el-radio", {
    attrs: {
      label: "Sponsor"
    }
  }), _vm._v(" "), _c("el-radio", {
    attrs: {
      label: "Venue"
    }
  })], 1)], 1), _vm._v(" "), _c("el-form-item", {
    attrs: {
      label: "Activity form"
    }
  }, [_c("el-input", {
    attrs: {
      type: "textarea"
    },
    model: {
      value: _vm.form.desc,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "desc", $$v);
      },
      expression: "form.desc"
    }
  })], 1), _vm._v(" "), _c("el-form-item", [_c("el-button", {
    attrs: {
      type: "primary"
    },
    on: {
      click: _vm.onSubmit
    }
  }, [_vm._v("Create")]), _vm._v(" "), _c("el-button", [_vm._v("Cancel")])], 1)], 1)], 1);
};
var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./resources/js/components/Orders/Create.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/Orders/Create.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Create_vue_vue_type_template_id_5d0dd82b_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Create.vue?vue&type=template&id=5d0dd82b&scoped=true& */ "./resources/js/components/Orders/Create.vue?vue&type=template&id=5d0dd82b&scoped=true&");
/* harmony import */ var _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Create.vue?vue&type=script&lang=js& */ "./resources/js/components/Orders/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Create_vue_vue_type_template_id_5d0dd82b_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Create_vue_vue_type_template_id_5d0dd82b_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "5d0dd82b",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Orders/Create.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Orders/Create.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/Orders/Create.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Orders/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Orders/Create.vue?vue&type=template&id=5d0dd82b&scoped=true&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/Orders/Create.vue?vue&type=template&id=5d0dd82b&scoped=true& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_5d0dd82b_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=template&id=5d0dd82b&scoped=true& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Orders/Create.vue?vue&type=template&id=5d0dd82b&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_5d0dd82b_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_5d0dd82b_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);