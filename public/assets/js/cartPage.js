const cartItems = document.getElementById("cartItems");
const cartTotal = document.getElementById("cartTotal");

function getCart() {
  return JSON.parse(localStorage.getItem("cart")) || [];
}

function saveCart(cart) {
  localStorage.setItem("cart", JSON.stringify(cart));
}

function renderCart() {
  let cart = getCart();
  cartItems.innerHTML = "";
  let total = 0;

  cart.forEach((item, index) => {
    total += item.price * item.quantity;

    cartItems.innerHTML += `
      <div class="card mb-3">
        <div class="row g-0 align-items-center">
          <div class="col-md-3">
            <img src="${item.image}" class="img-fluid rounded">
          </div>

          <div class="col-md-6">
            <div class="card-body">
              <h5>${item.name}</h5>
              <p>€${item.price}</p>

              <button class="btn btn-sm btn-outline-secondary" onclick="changeQty(${index}, -1)">−</button>
              <span class="mx-2">${item.quantity}</span>
              <button class="btn btn-sm btn-outline-secondary" onclick="changeQty(${index}, 1)">+</button>
            </div>
          </div>

          <div class="col-md-3 text-center">
            <button class="btn btn-danger btn-sm" onclick="removeItem(${index})">
              <i class="fa fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    `;
  });

  cartTotal.innerText = "€" + total.toFixed(2);
}

function changeQty(index, change) {
  let cart = getCart();
  cart[index].quantity += change;

  if (cart[index].quantity <= 0) {
    cart.splice(index, 1);
  }

  saveCart(cart);
  renderCart();
}

function removeItem(index) {
  let cart = getCart();
  cart.splice(index, 1);
  saveCart(cart);
  renderCart();
}

renderCart();



