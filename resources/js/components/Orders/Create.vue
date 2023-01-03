<template>
  <div>
    <navmenu></navmenu>
    <Form :mode="mode" v-if="isMounted" :order="order"></Form>
  </div>
  
</template>


<script>
  import navmenu from '../navmenu';
  import Form from './Form';
  export default {
    components: {navmenu, Form},
    data() {
      return {
        order: {
          date: "2023-01-01",
          project_id: null,
          project_id: null,
          payment_status: null,
          purchase_status: null,
          total: 0.00,
          paid: 0,
          due: 0,
          total_discount: 0,
          discount_type: null,
          notes: '',
          details: [{
            id: null,
            order_id: null,
            material_id: null,
            quantity: 0,
            unit_price: 0,
            discount: 0,
            discount_type: 'fixed',
            total: 0,
          }]
        },
        mode: 'create',
        isMounted: false,
      }
    },
    mounted(){
      console.log('mounted Create Order:', this.$route, this.$route.params);
      this.isMounted = true;
    },
    methods: {
      onSubmit() {
        console.log('submit!');
      }
    }
  }
</script>


<style scoped>
</style>
