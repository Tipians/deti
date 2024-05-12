let cart = document.querySelectorAll('.add-cart')

let products = [

    {
        name: 'French Fries - Sour Cream Flavor',
        tag: 'Sour%20Cream',
        price: 35.00,
        inCart: 0,
    },
    {
        name: 'Coke',
        tag: 'coke',
        price: 50.00,
        inCart: 0,
    },
    {
        name: 'Family Size - Big Ultimate',
        tag: 'Big%20Ultimate',
        price: 899.00,
        inCart: 0,
    },
    {
        name: 'Onion Rings - Ketchup',
        tag: 'Ketchup',
        price: 10.00,
        inCart: 0,
    },
    {
        name: 'Iced Tea',
        tag: 'Iced%20Tea',
        price: 55.00,
        inCart: 0,
    },
    {
        name: 'Coffee',
        tag: 'coffee',
        price: 60.00,
        inCart: 0,
    },
    {
        name: 'Onion Rings - Cheddar Dip',
        tag: 'Cheddar_Dip',
        price: 20.00,
        inCart: 0,
    },
    {
        name: 'Hot Chocolate',
        tag: 'hot-chocolate',
        price: 60.00,
        inCart: 0,
    },
    {
        name: 'MilkTea',
        tag: 'MilkTea',
        price: 80.00,
        inCart: 0,
    }
];


for (let i=0; i < cart.length; i++) {
    cart[i].addEventListener('click', () =>{
        cartNumbers(products[i]);
        totalCost(products[i])
    })
}
function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');

    if(productNumbers) {
        document.querySelector('.num-cart-product').textContent = productNumbers;
    }
}

function cartNumbers(product) {
    let productNumbers = localStorage.getItem('cartNumbers');

    productNumbers = parseInt(productNumbers);

    if ( productNumbers ) {
        localStorage.setItem('cartNumbers', productNumbers + 1);
        document.querySelector('.num-cart-product').textContent = productNumbers + 1;
    } else {
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.num-cart-product').textContent = 1;
    }

    setItems(product);

}

function setItems(product) {
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if(cartItems != null) {

        if(cartItems[product.tag] == undefined) {
            cartItems = {
                ...cartItems,
            [product.tag]: product
            }
        }
        cartItems[product.tag].inCart += 1;
    } else {
        product.inCart = 1;
        cartItems = {
            [product.tag]: product
        }
    }
    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}

function totalCost(product) {
    let cartCost = localStorage.getItem('totalCost');

    console.log("My cartCost is", cartCost);
    console.log(typeof cartCost);

    if(cartCost != null) {
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost + product.price);
    } else {
    localStorage.setItem("totalCost", product.price);
    }

}

function removeOne(tag){
     //gets data from localstorage
     var cart = JSON.parse(localStorage.getItem("productsInCart"));
     var totalPrice = parseInt(localStorage.getItem("totalCost")); //
     var N = parseInt(localStorage.getItem("cartNumbers"));

     //gets the correct item
     var item = cart[tag]

     //changes values of cart items
     if (item.inCart > 1){
         item.inCart--
         localStorage.setItem("productsInCart", JSON.stringify(cart));
     }
     else{
         delete cart[tag];
         localStorage.setItem("productsInCart", JSON.stringify(cart));
     }

     //changes total price and total number of products
     localStorage.setItem("totalCost", totalPrice - item.price);
     localStorage.setItem("cartNumbers", N - 1);
     location.reload();
 }
 function addOne(tag){
     //gets data from localstorage
     var cart = JSON.parse(localStorage.getItem("productsInCart"));
     var totalPrice = parseInt(localStorage.getItem("totalCost"));
     var N = parseInt(localStorage.getItem("cartNumbers"));

     //gets the correct item
     var item = cart[tag];

     //change values
     item.inCart++; //adds one more inCart
     localStorage.setItem("productsInCart", JSON.stringify(cart));
     localStorage.setItem("totalCost", totalPrice + item.price);
     localStorage.setItem("cartNumbers", N + 1);
     location.reload();
 }
 function removeAll(tag){
     //gets data from localstorage
     var cart = JSON.parse(localStorage.getItem("productsInCart"));
     var totalPrice = parseInt(localStorage.getItem("totalCost"));
     var N = parseInt(localStorage.getItem("cartNumbers"));

     //gets the correct item
     var item = cart[tag]

     //deletes the item
     delete cart[tag]
     localStorage.setItem("productsInCart", JSON.stringify(cart));
     localStorage.setItem("totalCost", totalPrice - (item.price * item.inCart))
     localStorage.setItem("cartNumbers", N - item.inCart)
     location.reload();
 }


 //to your icons add the above functions (watch <ion-icon>) with onClick=''
 function displayCart(){
     let cartItems = localStorage.getItem("productsInCart");
     cartItems = JSON.parse(cartItems);
     let productContainer = document.querySelector(".products");
     let cartCost = localStorage.getItem("totalCost");
     console.log(cartItems);
     if(cartItems && productContainer){
          productContainer.innerHTML = "";
          Object.values(cartItems).map(item => {
               productContainer.innerHTML += `
               <div class="product">
                    <button type="button" onclick="removeAll('${item.tag}')"><ion-icon name="close-circle"></ion-icon></button>
                    <img src="./Products/${item.tag}.png">
                    <span>${item.name}</span>
               </div>
               <div class="price">&nbsp;₱${item.price}.00</div>
               <div class="quantity">
                    <button onclick="removeOne('${item.tag}')"><ion-icon name="chevron-back-circle-outline"></ion-icon></button>
                    <span>${item.inCart}</span>
                    <ion-icon onclick="addOne('${item.tag}')" name="chevron-forward-circle-outline"></ion-icon>
               </div>
               <div class="total">
                    ₱${item.inCart * item.price}.00
               </div>
               `;
          });

          productContainer.innerHTML += `
               <div class="cartTotalContainer">
                    <h3 class="cartTotalTitle">
                         Cart Total
                    </h3>
                    <h3 class="cartTotal">
                         ₱${cartCost}.00
                    </h3>
          `;

     }
 }


displayCart();
onLoadCartNumbers();
