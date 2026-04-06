let cart = JSON.parse(localStorage.getItem("cart")) || [];
let cartBody = document.getElementById("cart-body");

function displayCart() {
    cartBody.innerHTML = "";

    if (cart.length === 0) {
        cartBody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center py-4">Your cart is empty 🛒</td>
            </tr>
        `;
        document.querySelector(".text-primary").innerText = "$0";
        return;
    }

    for (let i = 0; i < cart.length; i++) {
        cartBody.innerHTML += `
            <tr>
                <td class="d-flex align-items-center">
                    <img src="${cart[i].image}" class="me-3 product-img" width="80" height="80">
                    ${cart[i].name}
                </td>
                <td>$${cart[i].price}</td>
                <td>
                    <input type="number" value="${cart[i].quantity}" min="1" class="form-control quantity" data-index="${i}">
                </td>
                <td class="row-total">$${cart[i].price * cart[i].quantity}</td>
                <td>
                    <button class="btn btn-danger btn-sm remove-btn" data-index="${i}">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
    }

    updateCart();
    addEvents();
}

function updateCart() {
    let grandTotal = 0;
    let quantities = document.querySelectorAll(".quantity");
    let totals = document.querySelectorAll(".row-total");

    for (let i = 0; i < quantities.length; i++) {
        let quantity = parseInt(quantities[i].value);
        let index = quantities[i].getAttribute("data-index");

        cart[index].quantity = quantity;
        let total = cart[index].price * quantity;
        totals[i].innerText = "$" + total;
        grandTotal += total;
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    document.querySelector(".text-primary").innerText = "$" + grandTotal;
}

function addEvents() {
    let quantities = document.querySelectorAll(".quantity");
    for (let i = 0; i < quantities.length; i++) {
        quantities[i].addEventListener("input", function () {
            if (this.value < 1 || this.value === "") {
                this.value = 1;
            }
            updateCart();
        });
    }

    let removeButtons = document.querySelectorAll(".remove-btn");
    for (let i = 0; i < removeButtons.length; i++) {
        removeButtons[i].addEventListener("click", function () {
            let index = this.getAttribute("data-index");
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            displayCart();
        });
    }
}

displayCart();