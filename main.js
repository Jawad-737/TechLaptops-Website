document.addEventListener("DOMContentLoaded", () => {
  const productsContainer = document.getElementById("products");
  const searchInput = document.getElementById("search");
  const filterBtn = document.getElementById("filter-icon");
  const filterMenu = document.getElementById("filter-options");

  // Cart functions removed - now handled by PHP and inline onclick handlers

  // --- Search ---
  if (searchInput) {
    searchInput.addEventListener("input", () => {
      const term = searchInput.value.toLowerCase();
      document.querySelectorAll(".product").forEach((prod) => {
        const name = prod.querySelector("h3").textContent.toLowerCase();
        prod.style.display = name.includes(term) ? "block" : "none";
      });
    });
  }

  // --- Filter Icon & Sort ---
  if (filterBtn && filterMenu) {
    filterBtn.addEventListener("click", () => {
      filterMenu.classList.toggle("hidden");
    });

    filterMenu.querySelectorAll("button").forEach((btn) => {
      btn.addEventListener("click", () => {
        const value = btn.getAttribute("data-sort");
        sortProducts(value);
        filterMenu.classList.add("hidden");
      });
    });
  }

  function sortProducts(value) {
    const items = Array.from(
      productsContainer.getElementsByClassName("product")
    );

    if (value === "asc") {
      items.sort((a, b) => getPrice(a) - getPrice(b));
    } else if (value === "desc") {
      items.sort((a, b) => getPrice(b) - getPrice(a));
    }

    items.forEach((item) => productsContainer.appendChild(item));
  }

  function getPrice(product) {
    const priceText = product.querySelector("p").textContent;
    const match = priceText.match(/\$([\d.]+)/);
    return match ? parseFloat(match[1]) : 0;
  }

  updateCartCount?.();

  // Remove login success parameter from URL if present
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.get('login') === 'success') {
    window.history.replaceState({}, document.title, window.location.pathname);
    // Reload page to show updated logout button
    location.reload();
  }
});

const productImages = {
  "HP Victus 15": [
    "assets/victus/victus 1.png",
    "assets/victus/victus 2.png",
    "assets/victus/victus 3.png",
  ],

  "Lenovo LOQ 15": [
    "assets/loq/loq 1.avif",
    "assets/loq/loq 2.avif",
    "assets/loq/loq 3.avif",
    "assets/loq/loq 4.avif",
    "assets/loq/loq 5.avif",

  ],
  "Acer Nitro 16": [
    "assets/acer/NItro/Nitro 1.png",
    "assets/acer/NItro/Nitro 2.png",
    "assets/acer/NItro/Nitro 3.png",
    "assets/acer/NItro/Nitro 4.png",
  ],
  "Acer Predator Triton 300 SE": [
   "assets/acer/predetor/1.png",
    "assets/acer/predetor/2.png",
    "assets/acer/predetor/3.png",
  ],
  "ASUS TUF F15": [
   "assets/asus/tuf 15/tuf 1.png",
    "assets/asus/tuf 15/tuf 2.png",
    "assets/asus/tuf 15/tuf 3.png",
  ],
  "ASUS TUF F16": [
   "assets/asus/tuf 16/tuf 1.png",
    "assets/asus/tuf 16/tuf 2.png",
    "assets/asus/tuf 16/tuf 3.png",
  ],
  "Lenovo Ideapad 3i": [
   "assets/lenovo bes/len 1.png",
    "assets/lenovo bes/len 2.png",
    
  ],
  "HP 15-FC000 2023": [
   "assets/hp bess/1.png",
   "assets/hp bess/2.png",
    "assets/hp bess/3.png",
    "assets/hp bess/4.png",
  ],
};

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".carousel").forEach((carousel) => {
    const title = carousel.getAttribute("data-title");
    const images = productImages[title];
    if (!images || images.length === 0) return;

    let index = 0;
    const imgEl = carousel.querySelector(".carousel-img");

    imgEl.src = images[index];

    const prevBtn = carousel.querySelector(".prev");
    const nextBtn = carousel.querySelector(".next");

    prevBtn.addEventListener("click", () => {
      index = (index - 1 + images.length) % images.length;
      imgEl.src = images[index];
    });

    nextBtn.addEventListener("click", () => {
      index = (index + 1) % images.length;
      imgEl.src = images[index];
    });
  });
});
