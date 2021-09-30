import {createApp} from "vue";

const products = {
    data() {
        return {}
    },
    methods: {
        destroy(id) {
            axios.delete('api/products/destroy/' + id)
                .then(function (response) {
                    // handle success
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    location.reload();
                });
        }
    }
}
createApp(products).mount('#products')
console.log('fgbv')
