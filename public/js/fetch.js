/////////////////////// update data ///////////////////////////

const product_update = document.querySelectorAll('#product_update');
let product_id = document.getElementById('product_id')
let modal_update = document.getElementById('modal_update');
let modal_close = document.getElementById('modal_close');
let openmodal = document.getElementById('openmodal');
let modal_product_name = document.getElementById('modal_product_name')
let modal_price = document.getElementById('modal_price')
let modalimage = document.getElementById('modalimage')

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

product_update.forEach(element => {
    element.addEventListener('click', (e) => {
        let id = e.target.value;

        async function get_update_product() {
            try {
                let response = await axios.get(`/products/${id}/edit`);
                if (response.status == '200') {
                    openmodal.click();
                    const details = response.data.data;
                    product_id.value = details.id;
                    modal_product_name.value = details.name;
                    modal_price.value = details.price;
                    modalimage.src = '/uploads/' + details.image;
                }
            } catch (error) {

            }
        }
        get_update_product();
    })
});

modal_update.addEventListener('click', () => {
    let id = product_id.value;
    let updatedimage = document.querySelector('#updatedimage').files[0];
    let productimage = document.getElementById('productimage' + id)
    let product_name = document.getElementById('product_name' + id)
    let product_price = document.getElementById('product_price' + id)

    async function update_product() {
        try {
            const data = new FormData();
            data.append('_method', 'put');
            data.append("image", updatedimage);
            data.append("product_name", modal_product_name.value);
            data.append("price", modal_price.value)

            await axios.post(`/products/${id}`, data)
                .then(response => {
                    modal_close.click();
                    product_name.innerHTML = response.data.data.name;
                    product_price.innerHTML = response.data.data.price;
                    productimage.src = '/uploads/' + response.data.data.image;
                    toastr.success(response.data.message);
                })
        } catch (error) {

        }
    }
    update_product();
})

/////////////////////// delete data ///////////////////////////

const deleteProduct = document.querySelectorAll('#delete_product')

deleteProduct.forEach(element => {
    element.addEventListener('click', (e) => {
        let id = e.target.value
        let product_name = document.getElementById('product_name' + id)

        async function deleteproduct() {

            try {
                await axios.delete(`/products/${id}`)
                    .then(response => {
                        product_name.parentElement.style.display = 'none';
                        toastr.error(response.data.message);
                    })

            } catch (error) {

            }
        }
        deleteproduct()
    })
})