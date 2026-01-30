localStorage.getItem("cart")

function getCart() {
  return JSON.parse(localStorage.getItem("cart")) || [];
}

function saveCart(cart) {
  localStorage.setItem("cart", JSON.stringify(cart));
}

document.querySelectorAll(".add-to-cart").forEach(button => {
  button.addEventListener("click", () => {
    const product = {
      id: button.dataset.id,
      name: button.dataset.name,
      price: parseFloat(button.dataset.price),
      image: button.dataset.image,
      quantity: 1
    };

    let cart = getCart();
    let existing = cart.find(item => item.id === product.id);

    if (existing) {
      existing.quantity++;
    } else {
      cart.push(product);
    }

    saveCart(cart);
    alert("Added to cart 🛒");
  });
});
