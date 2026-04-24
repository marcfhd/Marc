const products = [
    {
        name: "Gaming GPU",
        price: 1200,
        image: "https://images.unsplash.com/photo-1587202372775-e229f172b9d7",
        category: "GPU"
    },
    {
        name: "Mechanical Keyboard <br> (red lights)",
        price: 40,
        image: "../img/front.png",
        category: "Keyboard"
    },
    {
        name: "Mechanical Keyboard <br> (white)",
        price: 40,
        image: "../img/f75c5900-7913-4019-b47c-41558c113734.5c375d7392bd2168da60ad85d8f4a785.webp",
        category: "Keyboard"
    },
    {
        name: "Mechanical Keyboard <br> (black)",
        price: 40,
        image: "../img/02th3QKnG4NLgUrOSBe1cfh-32..v1750707254.jpg",
        category: "Keyboard"
    },
    {
        name: "Gaming Keyboard",
        price: 80,
        image: "../img/BlitzWolf-BW-KB2-yellow.jpg",
        category: "Keyboard"
    },
    {
        name: "Gaming keyboard",
        price: 100,
        image: "../img/GamingKEYBOARD-1.webp",
        category: "Keyboard"
    },
    {
        name: "Gaming mouse",
        price: 150,
        image: "../img/RedragonRGBWirelessGamingMouseImpactEliteM913_2.webp",
        category: "Mouse"
    },
    {
        name: "Gaming mouse <br> (white)",
        price: 60,
        image: "../img/e5a1cb_934497d69e0841f883869d690daa3414~mv2.avif",
        category: "Mouse"
    },
    {
        name: "Gaming mouse",
        price: 90,
        image: "../img/big.jpg",
        category: "Mouse"
    },
    {
        name: "Logitech M331 Silent Mouse <br> (Black)",
        price: 40,
        image: "../img/logitech-m331-wireless-silent-mouse-black.jpg",
        category: "Mouse"
    },
    {
        name: "Logitech M331 Silent Mouse <br> (Red)",
        price: 40,
        image: "../img/m330-wireless-mouse-top-view-red-gallery-01.webp",
        category: "Mouse"
    },
    {
        name: "Logitech M331 Silent Mouse <br> (Grey)",
        price: 40,
        image: "../img/images.jpg",
        category: "Mouse"
    },
    {
        name: "Logitech M331 Silent Mouse <br> (Blue)",
        price: 40,
        image: "../img/images (2).jpg",
        category: "Mouse"
    },
    {
        name: "Processor <br> core i7",
        price: 220,
        image: "../img/71Xyi7bXarL._AC_UF894,1000_QL80_.jpg",
        category: "Processor"
    },
    {
        name: "Processor <br> core i9",
        price: 300,
        image: "../img/s-Intel-Core-X-Series-processor-family-21-690x460_2.webp",
        category: "Processor"
    },
    {
        name: "Processor <br> core i5",
        price: 150,
        image: "../img/41i+sZeH71L._AC_UF1000,1000_QL80_.jpg",
        category: "Processor"
    },
    {
        name: "RAM <br> 16 GB(2X8GB)",
        price: 600,
        image: "../img/za44-1.gif",
        category: "RAM"
    },
    {
        name: "RAM <br> 16 GB",
        price: 700,
        image: "../img/WhatsApp-Image-2025-06-21-at-10.27.37-AM.jpeg",
        category: "RAM"
    },
    {
        name: "RAM <br> 8 GB",
        price: 400,
        image: "../img/wbywhltj.png",
        category: "RAM"
    },
    {
        name: "RAM <br> 48 GB(2x24GB)",
        price: 900,
        image: "../img/za60-1.gif",
        category: "RAM"
    },
    {
        name: "Hard Disk <br> 6TB",
        price: 220,
        image: "../img/35-internal-wd-hard-drive-35-inch-4tb-internal-surveillance-64mb-6gb-s-purple-wd40purx-64akyy0.jpg",
        category: "Hard Disk"
    },
    {
        name: "Hard Disk <br> 1TB",
        price: 180,
        image: "../img/WesternDigital1tbHarddiskDriveBlue-b_2048x.webp",
        category: "Hard Disk"
    },
    {
        name: "Hard Disk <br> 4TB",
        price: 180,
        image: "../img/WD40PURX.webp",
        category: "Hard Disk"
    },
    {
        name: "Gaming Monitor <br> 32-inch",
        price: 224,
        image: "../img/lg-ultragear-32gs95ue-gaming-monitor-6492.webp",
        category: "Monitor"
    },
    {
        name: "Gaming Monitor <br> 32-inch",
        price: 224,
        image: "../img/MnbigSzr5VXNPJueXazWhT.png",
        category: "Monitor"
    },
    {
        name: "Gaming Monitor <br> 34-inch",
        price: 224,
        image: "../img/xiaomi-monitors-xiaomi-mi-curved-gaming-monitor-34-inch-with-amd-freesync-premium-wqhd-3-440-x-1-440-21-9-144hz-4ms-300lm-121-srgb-2-hdmi-2-display-port-audio-out-tuv-certified-blue-l_443f23f2-605a-47a3-af74.webp",
        category: "Monitor"
    },
    {
        name: "Headset <br> (Black)",
        price: 65,
        image: "../img/1-1.jpg",
        category: "Headset"
    },
    {
        name: "Headset <br> (White)",
        price: 65,
        image: "../img/36717.webp",
        category: "Headset"
    },
    {
        name: "Headset <br> (Grey)",
        price: 65,
        image: "../img/arctis_nova_elite_sage_gold_img_buy_primary.webp",
        category: "Headset"
    },
    {
        name: "Headset <br> (Red)",
        price: 65,
        image: "../img/5-cee36fcc73-312811537.webp",
        category: "Headset"
    },
    {
        name: "HDMI-USB-C adapter",
        price: 12,
        image: "../img/AVimg_46450.jpg",
        category: "Adapter"
    },
    {
        name: "USB Type C to Dual HDMI Adapter",
        price: 17,
        image: "../img/usb-c-4-in-1-beirut-lebanon-1.webp",
        category: "Adapter"
    },
    {
        name: "USB Type C to Multiport Adapter with Charging Port",
        price: 24,
        image: "../img/61kv7aTqB0L.jpg",
        category: "Adapter"
    },
    {
        name: "USB Type C to HDMI/VGA Adapter",
        price: 30,
        image: "../img/USB-C-TO-HDMIVGA-PIC-1.jpeg",
        category: "Adapter"
    }
];

let productList = document.getElementById("product-list");
let categoryFilter = document.getElementById("categoryFilter");

function displayProducts(filteredProducts) {
    productList.innerHTML = "";

    if (filteredProducts.length === 0) {
        productList.innerHTML = `
            <h4 id="no-results" class="text-center w-100 mt-4">No products found </h4>
        `;
        return;
    }

    filteredProducts.forEach((product, index) => {
        productList.innerHTML += `
            <div class="col-md-4 p-3">
                <div class="card product-card h-100">
                    <img class="card-img-top product-img" src="${product.image}" alt="${product.name}">
                    <div class="card-body text-center">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">$${product.price}</p>
                        <p class="text-muted">${product.category}</p>

                        <button class="btn btn-primary add-cart-btn" data-name="${product.name}" data-image="${product.image}">
                            <i class="fa fa-cart-plus"></i> Add to Cart
                        </button>

                        <button class="btn btn-outline-danger favorite-btn" data-name="${product.name}" data-image="${product.image}">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
    });

    addFavoriteEvents();
    addCartEvents();
}
displayProducts(products);


function getFilteredProducts() {
    let selectedCategory = categoryFilter.value;
    let searchValue = document.getElementById("searchInput").value.toLowerCase();

    return products.filter(function(product) {
        let name = product.name.replace("<br>", " ").toLowerCase();

        if ((selectedCategory === "all" || product.category === selectedCategory) &&
            name.includes(searchValue)) {
            return true;
        } else {
            return false;
        }
    });
}

// // FAVORITES
function addFavoriteEvents() {
    let favs = JSON.parse(localStorage.getItem("favorites")) || [];
    let favButtons = document.querySelectorAll(".favorite-btn");

    for (let i = 0; i < favButtons.length; i++) {
        favButtons[i].onclick = function () {
            let name = this.getAttribute("data-name");
            let image = this.getAttribute("data-image");
            let exists = false;
            let productToAdd = null;

            for (let j = 0; j < products.length; j++) {
                if (products[j].name === name && products[j].image === image) {
                    productToAdd = products[j];
                    break;
                }
            }

            for (let j = 0; j < favs.length; j++) {
                if (favs[j].name === name && favs[j].image === image) {
                    exists = true;
                    break;
                }
            }

            if (!exists && productToAdd) {
                favs.push(productToAdd);
                localStorage.setItem("favorites", JSON.stringify(favs));
            }
        };
    }
}

// CART
function addCartEvents() {
    let cartButtons = document.querySelectorAll(".add-cart-btn");

    for (let i = 0; i < cartButtons.length; i++) {
        cartButtons[i].onclick = function () {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let name = this.getAttribute("data-name");
            let image = this.getAttribute("data-image");
            let exists = false;
            let productToAdd = null;

            for (let j = 0; j < products.length; j++) {
                if (products[j].name === name && products[j].image === image) {
                    productToAdd = products[j];
                    break;
                }
            }

            for (let j = 0; j < cart.length; j++) {
                if (cart[j].name === name && cart[j].image === image) {
                    cart[j].quantity += 1;
                    exists = true;
                    break;
                }
            }

            if (!exists && productToAdd) {
                cart.push({
                    name: productToAdd.name,
                    price: productToAdd.price,
                    image: productToAdd.image,
                    quantity: 1
                });
            }

            localStorage.setItem("cart", JSON.stringify(cart));
        };
    }
}

displayProducts(products);

// NAVBAR
fetch("navbar.html")
    .then(res => res.text())
    .then(data => {
        document.getElementById("navbar").innerHTML = data;

        let page1 = window.location.pathname.split("/").pop();

        let links = document.querySelectorAll(".nav-link");
        for (let i = 0; i < links.length; i++) {
            if (links[i].getAttribute("href") == page1) {
                links[i].classList.add("active");
            }
        }

        let page = window.location.pathname.split("/").pop();
        let searchForm = document.getElementById("searchForm");

        if (page !== "products.html" && searchForm) {
            searchForm.classList.add("d-none");
        }

        let searchInput = document.getElementById("searchInput");

        if (searchInput) {
            searchInput.addEventListener("keyup", function () {
                displayProducts(getFilteredProducts());
            });
        }

        if (categoryFilter) {
            categoryFilter.addEventListener("change", function () {
                displayProducts(getFilteredProducts());
            });
        }
    });