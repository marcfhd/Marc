
const products = [
    {
        name: "Gaming GPU",
        price: 1200,
        image: "https://images.unsplash.com/photo-1587202372775-e229f172b9d7"
    },
    {
        name: "Mechanical Keyboard <br> (red lights)",
        price: 40,
        image: "../img/front.png"
    },
    {
        name: "Mechanical Keyboard <br> (white)",
        price: 40,
        image: "../img/f75c5900-7913-4019-b47c-41558c113734.5c375d7392bd2168da60ad85d8f4a785.webp"
    },
     {
        name: "Mechanical Keyboard <br> (black)",
        price: 40,
        image: "../img/02th3QKnG4NLgUrOSBe1cfh-32..v1750707254.jpg"
    },
    {
        name: "Gaming Keyboard ",
        price: 80,
        image: "../img/BlitzWolf-BW-KB2-yellow.jpg"
    },
    
    {
        name: "Gaming keyboard",
        price: 100,
        image: "../img/GamingKEYBOARD-1.webp"
    },
    {
        name: "Gaming mouse",
        price: 150,
        image: "../img/RedragonRGBWirelessGamingMouseImpactEliteM913_2.webp"
    },
    {
        name: "Gaming mouse <br> (white)",
        price: 60,
        image: "../img/e5a1cb_934497d69e0841f883869d690daa3414~mv2.avif"
    },
       {
        name: "Gaming mouse",
        price: 90,
        image: "../img/big.jpg"
    },
    {
        name: "Logitech M331 Silent Mouse <br> (Black)",
        price: 40,
        image: "../img/logitech-m331-wireless-silent-mouse-black.jpg"
    },
     {
        name: "Logitech M331 Silent Mouse <br> (Red)",
        price: 40,
        image: "../img/m330-wireless-mouse-top-view-red-gallery-01.webp"
    },
     {
        name: "Logitech M331 Silent Mouse <br> (Grey)",
        price: 40,
        image: "../img/images.jpg"
    },
    {
        name: "Logitech M331 Silent Mouse <br> (Blue)",
        price: 40,
        image: "../img/images (2).jpg"
    },
   
    {
        name: "Processor <br> core i7",
        price: 220,
        image: "../img/71Xyi7bXarL._AC_UF894,1000_QL80_.jpg"
    },
     {
        name: "Processor <br> core i9",
        price: 300,
        image: "../img/s-Intel-Core-X-Series-processor-family-21-690x460_2.webp"
    },
    {
        name: "Processor <br> core i5",
        price: 150,
        image: "../img/41i+sZeH71L._AC_UF1000,1000_QL80_.jpg"
    },
     {
        name: "RAM <br> 16 GB(2X8GB)",
        price: 600,
        image: "../img/za44-1.gif"
    },
     {
        name: "RAM <br> 16 GB",
        price: 700,
        image: "../img/WhatsApp-Image-2025-06-21-at-10.27.37-AM.jpeg"
    },
     {
        name: "RAM <br> 8 GB",
        price: 400,
        image: "../img/wbywhltj.png"
    },
      {
        name: "RAM <br> 48 GB(2x24GB)",
        price: 900,
        image: "../img/za60-1.gif"
    },
      {
        name: "Hard Disk <br> 6TB",
        price: 220,
        image: "../img/35-internal-wd-hard-drive-35-inch-4tb-internal-surveillance-64mb-6gb-s-purple-wd40purx-64akyy0.jpg"
    },
     {
        name: "Hard Disk <br> 1TB",
        price: 180,
        image: "../img/WesternDigital1tbHarddiskDriveBlue-b_2048x.webp"
    },
     {
        name: "Hard Disk <br> 4TB",
        price: 180,
        image: "../img/WD40PURX.webp"
    },
     {
        name: " Gaming Monitor <br> 32-inch",
        price: 224,
        image: "../img/lg-ultragear-32gs95ue-gaming-monitor-6492.webp"
    },
    {
        name: " Gaming Monitor <br> 32-inch",
        price: 224,
        image: "../img/MnbigSzr5VXNPJueXazWhT.png"
    },
    {
        name: " Gaming Monitor <br> 34-inch",
        price: 224,
        image: "../img/xiaomi-monitors-xiaomi-mi-curved-gaming-monitor-34-inch-with-amd-freesync-premium-wqhd-3-440-x-1-440-21-9-144hz-4ms-300lm-121-srgb-2-hdmi-2-display-port-audio-out-tuv-certified-blue-l_443f23f2-605a-47a3-af74.webp"
    },
     {
        name: " Headset <br> (Black)",
        price: 65,
        image: "../img/1-1.jpg"
    },
   {
        name: " Headset <br> (White)",
        price: 65,
        image: "../img/36717.webp"
    },
    {
        name: " Headset <br> (Grey)",
        price: 65,
        image: "../img/arctis_nova_elite_sage_gold_img_buy_primary.webp"
    },
    {
        name: " Headset <br> (Red)",
        price: 65,
        image: "../img/5-cee36fcc73-312811537.webp"
    },
     {
        name: " HDMI-USB-C adapter",
        price: 65,
        image: "../img/AVimg_46450.jpg"
    },
    {
        name: " USB C to Dual HDMI Adapter",
        price: 65,
        image: "../img/usb-c-4-in-1-beirut-lebanon-1.webp"
    },
    {
        name: " USB C to Multiport Adapter with Charging Port",
        price: 65,
        image: "../img/61kv7aTqB0L.jpg"
    },

    


];


let productList = document.getElementById("product-list");

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
                     <button class="btn btn-outline-danger favorite-btn" data-index="${product.name}">
                        <i class="fa fa-heart"></i>
                    </button>
                </div>

            </div>
        </div>
    `;
});

// After loading navbar
fetch("navbar.html")
  .then(res => res.text())
  .then(data => {
    document.getElementById("navbar").innerHTML = data;
     let page1 = window.location.pathname.split("/").pop();

  // Highlight active link
  let links = document.querySelectorAll(".nav-link");
  for (var i = 0; i < links.length; i++) {
    if (links[i].getAttribute("href") == page1) {
      links[i].classList.add("active");
    }
  }

    // Show search bar ONLY on products page
    const page = window.location.pathname.split("/").pop();
    const searchForm = document.getElementById("searchForm");
    if (page !== "products.html") searchForm?.classList.add("d-none");

    // ✅ Attach search listener AFTER navbar is loaded
    const searchInput = document.getElementById("searchInput");
    if (searchInput) {
        searchInput.addEventListener("keyup", function () {
            const value = this.value.toLowerCase();
            const cards = document.querySelectorAll(".product-card");
            let found = false;

            cards.forEach(card => {
                const text = card.innerText.toLowerCase();
                if (text.includes(value)) {
                    card.parentElement.style.display = "";
                    found = true;
                } else {
                    card.parentElement.style.display = "none";
                }
            });

            // Handle no results
            let noResultMsg = document.getElementById("no-results");
            if (!found) {
                if (!noResultMsg) {
                    noResultMsg = document.createElement("h4");
                    noResultMsg.id = "no-results";
                    noResultMsg.className = "text-center w-100 mt-4";
                    noResultMsg.innerText = "No products found 😢";
                    document.getElementById("product-list").appendChild(noResultMsg);
                }
            } else {
                if (noResultMsg) noResultMsg.remove();
            }
        });
    }
  });