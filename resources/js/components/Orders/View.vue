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
        order: {},
        mode: 'view',
        isMounted: false,
      }
    },
    async mounted(){
      await axios.get('/api/orders/'+this.$route.params.id)
                      .then(response => {
                        console.log('Order View response:', response.data.data);
                        this.order = response.data.data;
                      });
      console.log('mounted View Order:', this.$route, this.$route.params);
      this.isMounted = true;
    }
  }
</script>


<style scoped>
</style>
