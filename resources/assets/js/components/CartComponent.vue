<template>
    <tr>
        <td>{{product}}</td>
    </tr>
</template>

<script>
    export default {
        props: ['product'],
        mounted() {
            console.log('this is cart component');
            console.log(this.product);
        }
    }
</script>
