let cart = JSON.parse(localStorage.getItem("cart")) || [];
let checkoutItems = document.getElementById("checkout-items");
let checkoutTotal = document.getElementById("checkout-total");
let placeOrderBtn = document.getElementById("place-order-btn");

function displayCheckout() {
    checkoutItems.innerHTML = "";
    let total = 0;

    if (cart.length === 0) {
        checkoutItems.innerHTML = `
            <div class="alert alert-warning text-center">
                Your cart is empty 🛒
            </div>
        `;
        checkoutTotal.innerText = "$0";
        placeOrderBtn.disabled = true;
        return;
    }

    for (let i = 0; i < cart.length; i++) {
        let itemTotal = cart[i].price * cart[i].quantity;
        total += itemTotal;

        checkoutItems.innerHTML += `
            <div class="d-flex justify-content-between mb-2">
                <span>${cart[i].name} x ${cart[i].quantity}</span>
                <span>$${itemTotal}</span>
            </div>
        `;
    }

    checkoutTotal.innerText = "$" + total;
}

placeOrderBtn.addEventListener("click", function () {
    if (cart.length === 0) {
        alert("Your cart is empty");
        return;
    }

    let firstName = document.getElementById("firstName").value.trim();
    let lastName = document.getElementById("lastName").value.trim();
    let email = document.getElementById("email").value.trim();
    let address = document.getElementById("address").value.trim();
    let city = document.getElementById("city").value.trim();
    let zipCode = document.getElementById("zipCode").value.trim();

    if (
        firstName === "" ||
        lastName === "" ||
        email === "" ||
        address === "" ||
        city === "" ||
        zipCode === ""
    ) {
        alert("Please fill all billing details");
        return;
    }

    alert("Order placed successfully!");

    localStorage.removeItem("cart");
    window.location.href = "cart.html";
});

displayCheckout();