

function updateCart() {

  let rows = document.querySelectorAll("tbody tr");
  let grandTotal = 0;

  // LOOP through each row
  for (let i = 0; i < rows.length; i++) {

    let priceText = rows[i].children[1].innerText;
    let price = parseFloat(priceText.replace('$', ''));

    let quantityInput = rows[i].querySelector(".quantity");
    let quantity = quantityInput.value;

    let total = price * quantity;

    // Update row total
    rows[i].children[3].innerText = "$" + total;

    // Add to grand total
    grandTotal = grandTotal + total;
  }

  // Update total at bottom
  document.querySelector(".text-primary").innerText = "$" + grandTotal;
}


// Detect quantity change
let quantities = document.querySelectorAll(".quantity");

for (let i = 0; i < quantities.length; i++) {
  quantities[i].addEventListener("input", updateCart);
}


// Remove item
let buttons = document.querySelectorAll(".btn-danger");

for (let i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener("click", function () {

    let row = this.parentElement.parentElement;
    row.remove();

    updateCart();
  });
}


// Run once when page loads
updateCart();

