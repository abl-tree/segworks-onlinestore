<template>
    <div class="sizes">
        <h5>Shipping Fee</h5>
        <select class="bs-select" v-model="selected">
            <option v-for="option in options" v-bind:key="option.id" v-bind:value="option.id">{{option.fee}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        props: ['options', 'selected'],
        mounted() {
            // console.log('this.option component');
            console.log(this.options);
        }
    }
</script>
