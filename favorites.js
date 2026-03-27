let favs = JSON.parse(localStorage.getItem("favorites")) || [];

let list = document.getElementById("favorites-list");
let empty = document.getElementById("no-favorites");

// if empty
if (favs.length === 0) {
    empty.style.display = "block";
    list.style.display = "none";
} else {
    empty.style.display = "none";

    // simple loop
 for (let i = 0; i < favs.length; i++) {
    list.innerHTML += `
        <div class="col-md-4 p-3">
            <div class="card product-card h-100">

                <img class="card-img-top product-img" src="${favs[i].image}" alt="${favs[i].name}">

                <div class="card-body text-center">
                    <h5 class="card-title">${favs[i].name}</h5>
                    <p class="card-text">$${favs[i].price}</p>

                    <button onclick="removeFav(${i})" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Remove
                    </button>
                </div>

            </div>
        </div>
    `;
}
}

// remove
function removeFav(i) {
    favs.splice(i, 1);
    localStorage.setItem("favorites", JSON.stringify(favs));
    location.reload();
}