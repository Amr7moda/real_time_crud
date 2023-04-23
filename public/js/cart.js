const cart = document.querySelectorAll('#cart');
let showcart = document.getElementById('showCart');
let homeCart = document.querySelectorAll('#homeCart')
let cartquantity = document.getElementById('quantity')
let carttotal = document.getElementById('total')

cart.forEach(element => {
    element.addEventListener('click', (e) => {
        let id = e.target.value

        async function add_to_cart() {
            try {
                await axios.post(`add_cart/${id}`)
                    .then(response => {
                        var quantity = 0;
                        var total = 0;

                        for (const iterator of Object.entries(response.data.data)) {
                            quantity += iterator[1]['quantity']
                            total += iterator[1]['price'] * iterator[1]['quantity']
                        }
                        cartquantity.innerHTML = quantity
                        carttotal.innerHTML = total

                        homeCart.forEach(element => {
                            element.style.display = 'none';
                        })
                        let show = ''

                        for (const details of Object.entries(response.data.data)) {
                            show += `
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="/uploads/${details[1]['image']}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>${details[1]['name']}</p>
                                    <span class="price text-info">  ${details[1]['price']} </span>
                                    <span class="count">Quantity: ${details[1]['quantity']}</span>
                                </div>
                                </div>
                            `
                        }
                        showcart.innerHTML = show;
                    })
            } catch (error) {

            }
        }
        add_to_cart();
    })
});