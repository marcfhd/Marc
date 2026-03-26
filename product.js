
const products = [
    {
        name: "Gaming GPU",
        price: 1200,
        image: "https://images.unsplash.com/photo-1587202372775-e229f172b9d7"
    },
    {
        name: "Mechanical Keyboard",
        price: 80,
        image: "https://images.unsplash.com/photo-1593642634367-d91a135587b5"
    },
    {
        name: "Headphones",
        price: 150,
        image: "images/headphones.png"
    },
    {
        name: "Keyboard",
        price: 90,
        image: "images/keyboard.png"
    },
    {
        name: "Logitech M331 Silent Mouse (Black)",
        price: 40,
        image: "../logitech-m331-wireless-silent-mouse-black.jpg"
    },
     {
        name: "Logitech M331 Silent Mouse (Red)",
        price: 40,
        image: "../m330-wireless-mouse-top-view-red-gallery-01.webp"
    },
     {
        name: "Logitech M331 Silent Mouse (Grey)",
        price: 40,
        image: "../images.jpg"
    },
    {
        name: "Logitech M331 Silent Mouse (Blue)",
        price: 40,
        image: "../images (2).jpg"
    },
    {
        name: "Monitor",
        price: 300,
        image: "images/monitor.png"
    },

];


const productList = document.getElementById("product-list");

products.forEach(product => {
    productList.innerHTML += `
        <div class="col-md-4 p-3">
            <div class="card product-card h-100">

                <img class="card-img-top product-img" src="${product.image}" alt="${product.name}">

                <div class="card-body text-center">
                    <h5 class="card-title">${product.name}</h5>
                    <p class="card-text">$${product.price}</p>

                    <a href="#" class="btn btn-primary">
                        <i class="fa fa-cart-plus"></i> Add to Cart
                    </a>
                </div>

            </div>
        </div>
    `;
});
