<template>
  <div class="container-fluid">
    <navmenu></navmenu>
    <el-row :gutter="20">
      <el-col :span="6" :offset="18">
          <router-link :to="'/orders/create'">
            <el-button
              type="primary"
              size="medium"
              icon="el-icon-plus"
            >
              Add New Order
            </el-button>
          </router-link>
      </el-col>
    </el-row>

    <el-table
      :data="list"
      style="width: 100%"
    >
      <el-table-column
        fixed
        prop="date"
        label="Date"
        width="150">
          <template slot-scope="scope">
            <span>{{ scope.row.date }}</span>
          </template>
      </el-table-column>
      <el-table-column
        prop="project_name"
        label="Project">
          <template slot-scope="scope">
            <span>{{ scope.row.project_name }}</span>
          </template>
      </el-table-column>
      <el-table-column
        prop="supplier_name"
        label="Supplier">
          <template slot-scope="scope">
            <span>{{ scope.row.supplier_name }}</span>
          </template>
      </el-table-column>
      <el-table-column
        prop="total"
        label="Total">
          <template slot-scope="scope">
            <span>{{ scope.row.total }}</span>
          </template>
      </el-table-column>
      <el-table-column
        prop="payment_status"
        label="Payment Status">
          <template slot-scope="scope">
            <span>{{ scope.row.payment_status }}</span>
          </template>
      </el-table-column>

      <el-table-column
        prop="total_discount"
        label="Discount">
          <template slot-scope="scope">
            <span>{{ scope.row.total_discount }}</span>
          </template>
      </el-table-column>

      <el-table-column
        fixed="right"
        label="Operations">
        <template slot-scope="scope">
          <router-link :to="'/orders/edit/' + scope.row.id">
            <el-button
              type="primary"
              size="small"
              icon="el-icon-edit"
            >
              Edit
            </el-button>
          </router-link>

            <el-button
              type="warning"
              size="small"
              icon="el-icon-info"
            >
              Detail
            </el-button>

          <!-- <el-button @click="handleClick" type="text" size="small">Detail</el-button> -->
        </template>
      </el-table-column>
    </el-table>

  </div>
</template>


<script>
  import axios from 'axios';
  import navmenu from '../navmenu.vue'
  export default {
    components: {
      navmenu
    },
    methods: {
      handleClick() {
        console.log('click');
      }
    },
    data() {
      return {
        list: [],
        total: 0,
        loading: true,
        downloading: false,
      }
    },
    mounted(){
      console.log('mounted Order List');
      axios.get('api/orders')
            .then(response => {
              this.list = response.data.data;
              console.log('list: ', this.list, response);
            }).catch(error => {
              console.log(error);
            });
    },

  }
</script>


<style lang="scss" scoped>
</style>
