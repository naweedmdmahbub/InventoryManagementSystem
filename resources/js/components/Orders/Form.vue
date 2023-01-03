<template>
  <div class="form-container">
    <el-form
      ref="form"
      :model="order"
      label-position="left"
      label-width="150px"
      v-if="isMounted"
    >
          <el-form-item label="Date">
            <el-col :span="24">
              <el-date-picker type="date" placeholder="Pick a date" v-model="order.date"
                        format="yyyy-MM-dd" value-format="yyyy-MM-dd" 
              />
            </el-col>
          </el-form-item>
          <el-form-item label="Project">
            <el-select v-model="order.project_id" placeholder="Please select project">
              <el-option v-for="project in projects"
                        :key="project.id" 
                        :label="project.name" 
                        :value="project.id" />
            </el-select>
          </el-form-item>
          <el-form-item label="Supplier">
            <el-select v-model="order.supplier_id" placeholder="Please select supplier">
              <el-option v-for="supplier in suppliers"
                        :key="supplier.id"
                        :label="supplier.full_name" 
                        :value="supplier.id" />
            </el-select>
          </el-form-item>
          
          <el-form-item label="Total">
            <el-input v-model="order.total" placeholder="Please enter Total Amount" @change="calculateDue" />
          </el-form-item>
          <el-form-item label="Paid">
            <el-input v-model="order.paid" placeholder="Please enter Paid Amount" @change="calculateDue" />
          </el-form-item>
          <el-form-item label="Due">
            <el-input v-model="order.due" placeholder="Please enter Due Amount" :disabled="true" />
          </el-form-item>
          <el-form-item label="Total Discount">
            <el-input v-model="order.total_discount" placeholder="Please enter Discount Amount" />
          </el-form-item>
          
          <el-form-item label="Discount Type">
            <el-radio-group v-model="order.discount_type">
              <el-radio label="Percentage"></el-radio>
              <el-radio label="Fixed"></el-radio>
            </el-radio-group>
          </el-form-item>

          <el-form-item label="Notes">
            <el-input type="textarea" v-model="order.notes"></el-input>
          </el-form-item>

          <h2>Details</h2>
          <template v-for="(orderDetail, index) in order.details">
            <order-detail-component :v-if="isMounted"
                                    :key="index"
                                    :order="order"
                                    :orderDetail="orderDetail"
                                    :mode="mode"
                                    :units="units"
                                    :materials="materials"
                                    @calculateTotal="totalCalculated"
            />
          </template>

          <el-button v-if="mode !== 'view'" type="info" @click="addItem">Add Detail</el-button>

          <el-form-item>
            <el-button type="primary" @click="onSubmit">Create</el-button>
            <el-button>Cancel</el-button>
          </el-form-item>
      </el-form>
  </div>
</template>


<script>
  import OrderDetailComponent from './OrderDetailComponent';
  export default {
    components: { OrderDetailComponent },
    props: ['order', 'mode'],
    data() {
      return {
        isMounted: false,
        projects: [],
        suppliers: [],
        units: [],
        materials: [],
        detail: {
          id: null,
          order_id: null,
          material_id: null,
          quantity: 0,
          unit_price: 0,
          discount: 0,
          discount_type: 'fixed',
          total: 0,
        },
      }
    },
    async mounted(){
      console.log('Order Form mounted:', this.order);
      await axios.get('/api/projects')
              .then(response => {
                this.projects = response.data.data;
              });
      await axios.get('/api/suppliers')
              .then(response => {
                  this.suppliers = response.data.data;
              });
      await axios.get('/api/units')
              .then(response => {
                  this.units = response.data.data;
              });
      await axios.get('/api/materials')
              .then(response => {
                  this.materials = response.data.data;
              });
      // console.log('suppliers: ', this.suppliers, 'projects: ', this.projects, 'units: ', this.units, 'Materials: ', this.materials, )
      this.isMounted = true;
    },
    methods: {
      async calculateDue(){
        this.order.due = this.order.total - this.order.paid;
        console.log('calculateDue: ', this.order);
      },
      addItem(){
        var obj;
        this.order.details.push(this.detail);
      },
      totalCalculated(){
        let total = 0;
        this.order.details.forEach(element => {
          total += element.total;
        });
        console.log('total after foreach: ',total);
        this.order.total = total;
        this.calculateDue();
      },
      onSubmit() {
        if (this.order.id !== undefined) {
          axios
            .put('/api/orders/'+this.order.id, this.order)
            .then(response => {
              this.$router.push('/orders');
              this.$message({
                type: 'success',
                message: 'Order info has been updated successfully',
                duration: 5 * 1000,
              });
            })
            .catch(error => {
              console.log('error:', error);
              showErrors(error);
            });
        } else {
          console.log('onSubmit:', this.order);
          axios
            .post('/api/orders', this.order)
            .then(response => {
              this.$router.push('/orders');
              this.$message({
                message: 'New order has been created successfully.',
                type: 'success',
                duration: 5 * 1000,
              });
            })
            .catch(error => {
              console.log(error);
              // showErrors(error);
            });
        }
      },
    }
  }
</script>


<style scoped>
</style>
