var openCart = document.querySelector(".shopping");
var closeCart = document.querySelector(".close");
var body = document.querySelector("body");

openCart.addEventListener("click", function () {
  body.classList.add("active");
});

closeCart.addEventListener("click", function () {
  body.classList.remove("active");
});

const cartItemsContainer = document.querySelector(".cart");

document.querySelectorAll(".btn").forEach(function (button) {
  button.addEventListener("click", function (event) {
    var product = this.closest(".product");
    var imgSrc = product.querySelector("img").src;
    var title = product.querySelector("h3").textContent;
    var price = parseFloat(
      product.querySelector("p").textContent.split(" ")[0]
    );

    addItemToCart(imgSrc, title, price);
    updateCartUI();
  });
});

function addItemToCart(imgSrc, title, price) {
  var found = false;
  document.querySelectorAll(".cart-item").forEach(function (item) {
    if (item.querySelector("img").src === imgSrc) {
      var quantity = item.querySelector(".quantity");
      quantity.textContent = parseInt(quantity.textContent) + 1;
      found = true;
    }
  });

  if (!found) {
    const cartRow = document.createElement("div");
    cartRow.classList.add("cart-row");
    const cartContent = `
              <div class="cart-item">
                  <img src="${imgSrc}" alt="${title}" style="width: 50px; height: auto;">
                  <span>${title}</span>
                  <div class="price-quantity">
                      <span class="price">${price} DT</span>
                      <div class="quantity-controls">
                          <button class="quantity-decrease" style="cursor: pointer">-</button>
                          <span class="quantity" >1</span>
                          <button class="quantity-increase" style="cursor: pointer">+</button>
                      </div>
                  </div>
                  <button class="remove-item" style="cursor: pointer">Remove</button>
              </div>
          `;
    cartRow.innerHTML = cartContent;
    cartItemsContainer.appendChild(cartRow);

    cartRow
      .querySelector(".quantity-increase")
      .addEventListener("click", function () {
        const quantity =
          this.closest(".quantity-controls").querySelector(".quantity");
        quantity.textContent = parseInt(quantity.textContent) + 1;
        updateCartUI();
      });

    cartRow
      .querySelector(".quantity-decrease")
      .addEventListener("click", function () {
        const quantity =
          this.closest(".quantity-controls").querySelector(".quantity");
        const currentQuantity = parseInt(quantity.textContent);
        if (currentQuantity > 1) {
          quantity.textContent = currentQuantity - 1;
        } else {
          this.closest(".cart-row").remove();
        }
        updateCartUI();
      });

    cartRow
      .querySelector(".remove-item")
      .addEventListener("click", function () {
        this.closest(".cart-row").remove();
        updateCartUI();
      });
  }
}

function updateCartUI() {
  var totalItems = 0;
  var total = 0;
  document.querySelectorAll(".cart-item").forEach(function (item) {
    const quantity = parseInt(item.querySelector(".quantity").textContent);
    totalItems += quantity;
    const price = parseFloat(
      item.querySelector(".price").textContent.split(" ")[0]
    );
    total += price * quantity;
  });
  const quantityDisplay = document.querySelector(".shopping .quantity");
  const totalDisplay = document.querySelector(".total");
  quantityDisplay.textContent = totalItems;
  totalDisplay.textContent = `${total} DT`;
}
