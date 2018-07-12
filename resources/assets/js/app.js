
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('courier-component', require('./components/CourierComponent.vue'));
Vue.component('products-component', require('./components/ProductsComponent.vue'));
Vue.component('cart-component', require('./components/CartComponent.vue'));

if(document.getElementById('cart-item')){
    var cart_item = new Vue({
        el: '#cart-item',
        data: {
            products: []
        },
        mounted: function() {
            // console.log('this.products');
            // console.log(this.products);
        }
    });
};

var cart_icon = new Vue({
    el: '#cart-icon',
    data: {
        count: 0
    },
    created() {
        var self = this;
        $.ajax({
            method: 'GET',
            url: '/get/cart',
            dataType: 'json',
            success: function(data) {
                if(!data) {
                    return;
                }

                self.count = data.items.length;

                if(document.getElementById('cart-item')){
                    $.each(data.items, function(key, value){
                        cart_item.products.push(value);
                    });
                }
            }
        })
    },
    mounted: function() {
        console.log(this.condition);
    }
});

if(document.getElementById('products')){
    const products = new Vue({
        el: '#products',
        data: {
            products: []
        },
        methods: {
            category: function(id) {
                var self = this;
                $.ajax({
                    type: 'GET',
                    url: '/item/category',
                    data: {id: id},
                    dataType: 'json',
                    success: function(data) {
                        if(!data) {
                            return;
                        }

                        self.products = null;
                        var obj = new Array();

                        $.each(data, function(key, value){
                            obj.push(value.item);
                        });

                        self.products = obj;
                    }
                });
            },
            subcategory: function(id) {
                var self = this;
                $.ajax({
                    type: 'GET',
                    url: '/item/subcategory',
                    data: {id: id},
                    dataType: 'json',
                    success: function(data) {
                        if(!data) {
                            return;
                        }
                        self.products = null;
                        var obj = new Array();

                        $.each(data, function(key, value){
                            obj.push(value.item);
                        });

                        self.products = obj;
                    }
                });
            }
        },
        created() {
            var self = this;
            $.ajax({
                type: 'GET',
                url: '/item',
                dataType: 'json',
                success: function(data) {
                    if(!data) {
                        return;
                    }
                    self.products = data;

                    // console.log(self.products);
                }
            });
        },
        mounted: function() {
            // console.log('this.products ni');
            // console.log(this.products);
        }
    });
}

if(document.getElementById('addtocart')){
    var token = window.axios.defaults.headers.common['X-CSRF-TOKEN'];
    var store = {item_id:'', size: 'small', quantity: '', _token: token};

    const cart = new Vue({
        el: '#addtocart',
        data: {
            store: store
        },
        methods: {
            onSubmit: function(e) {
                $.ajax({
                    method: 'POST',
                    url: '/cart/add',
                    data: this.store,
                    dataType: 'json',
                    success: function(data) {
                        cart_icon.count = data.items.length;
                    }
                })
            }
            
        },
        created() {
            // console.log(this.store);

        },
        mounted: function() {
            // console.log(window.axios.defaults.headers.common['X-CSRF-TOKEN']);
        }
    });
}

if(document.getElementById('cartdetails')) {
    const cartdetails = new Vue({
        el: '#cartdetails',
        data: {
            selected: '',
            fee: 0,
            total: 0
        },
        methods: {
            getCourier: function(data) {
                var self = this;
    
                $.ajax({
                    type: 'GET',
                    url: '/get/courier',
                    data: {id: self.selected},
                    dataType: 'json',
                    success: function(data) {    
                        self.selected = data.id;
                        self.fee = data.fee;
                        self.total = data.withshippingfee;
                    }
                });
            },
            checkout: function() {
                alert(this.selected);
            }
        },
        created() {

        },
        mounted: function() {
            var self = this;
            // console.log('this.options');
            // console.log(self.products);
        }
    });
}