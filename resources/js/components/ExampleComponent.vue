<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <order-list></order-list>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import OrderList from './Orders/List.vue';
    export default {
        components: { OrderList },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
