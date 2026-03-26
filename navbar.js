fetch("navbar.html")
.then(response => response.text())
.then(data => {
  document.getElementById("navbar").innerHTML = data;

  let page = window.location.pathname.split("/").pop();

  // Highlight active link
  let links = document.querySelectorAll(".nav-link");
  for (var i = 0; i < links.length; i++) {
    if (links[i].getAttribute("href") == page) {
      links[i].classList.add("active");
    }
  }

  // ✅ Show search bar ONLY on products.html
  let searchForm = document.getElementById("searchForm");
 if (page !== "products.html") {
  searchForm.classList.add("d-none");
}
});