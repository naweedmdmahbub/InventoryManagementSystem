<template>
    <div class="card">
      <el-row :gutter="5">
          <el-col :span="7" :offset="1">
            <el-form-item label="Unit" prop="unit_id">
              <el-select v-model="orderDetail.unit_id" placeholder="Please Select Unit" :disabled="mode === 'view'" width="100%">
                  <el-option v-for="unit in units"
                            :key="unit.id"
                            :label="unit.name"
                            :value="unit.id" />
              </el-select>
            </el-form-item>
          </el-col>
          <el-col :span="7" :offset="1">
            <el-form-item label="Material" prop="material_id">
              <el-select v-model="orderDetail.material_id" placeholder="Please Select Material" :disabled="mode === 'view'" width="100%">
                  <el-option v-for="material in materials"
                            :key="material.id"
                            :label="material.name"
                            :value="material.id" />
              </el-select>
            </el-form-item>
          </el-col>
          <el-col :span="7" :offset="1">
              <el-form-item label="Unit Price" prop="unit_price">
                  <el-input v-model="orderDetail.unit_price" placeholder="Unit Price" :disabled="mode === 'view'" @change="calculateTotal" />
              </el-form-item>
          </el-col>
      </el-row>

      <el-row :gutter="5">
          <el-col :span="7" :offset="1">
              <el-form-item label="Quantity" prop="quantity">
                  <el-input v-model="orderDetail.quantity" placeholder="Quantity" :disabled="mode === 'view'" @change="calculateTotal" />
              </el-form-item>
          </el-col>
          <el-col :span="7" :offset="1">
              <el-form-item label="Discount" prop="discount">
                  <el-input v-model="orderDetail.discount" placeholder="Discount" :disabled="mode === 'view'" @change="calculateTotal" />
              </el-form-item>
          </el-col>
          <el-col :span="7" :offset="1">
              <el-form-item label="Total" prop="total">
                  <el-input v-model="orderDetail.total" placeholder="Total" :disabled="true" />
              </el-form-item>
          </el-col>
      </el-row>

      <el-row >
          <el-col :span="23" :offset="1">
              <el-form-item label="Description" prop="description">
                  <el-input v-model="orderDetail.description" type="textarea" placeholder="description" :disabled="mode === 'view'" />
              </el-form-item>
          </el-col>
      </el-row>
    </div>
</template>


<script>
export default {
  props: ['orderDetail', 'mode', 'units', 'materials', 'order'],
  data() {
    return {
    }
  },
  async mounted(){
  },
  async created(){
    // console.log('orderDetail create:', this.order, this.orderDetail);
  },
  
  methods: {
    async calculateTotal(){
      let perviousTotal = parseFloat(this.orderDetail.total);
      this.orderDetail.total = parseFloat(this.orderDetail.unit_price * this.orderDetail.quantity - this.orderDetail.discount);
      this.$emit('calculateTotal');
    },
    removeBuildingElement(item) {
      var index = this.order.orderDetails.indexOf(item);
      console.log('removeBuildingElement: ', this.order, item, item.id, index, this.order.deletedOrderDetailIDs);
      this.order.deletedOrderDetailIDs.push(item.id);
      this.order.orderDetails.splice(index, 1);
    },
  }
}
</script>

<style scoped>
</style>