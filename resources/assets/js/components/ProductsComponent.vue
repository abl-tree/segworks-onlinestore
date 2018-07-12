<template>        
    <div class="col-lg-4 col-md-6">
        <div class="product">
            <div class="image"><a v-bind:href="route+product.id"><img v-bind:src="image" alt="" class="img-fluid image1"></a></div>
            <div class="text">
                <h3 class="h5"><a v-bind:href="route+product.id" style="
                    position: relative;
                    height: 50px;
                    width: 100%;
                    overflow:hidden;
                    text-overflow:ellipsis;
                    white-space: pre-wrap;
                    display:inline-block;
                ">{{product.name}}</a></h3>
                <p class="price">Php {{product.price}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product', 'route'],
        data: function () {
            return {
                image: ""
            }
        },
        mounted() {
            this.image = this.product.images[0].image;
        }
    }
</script>
