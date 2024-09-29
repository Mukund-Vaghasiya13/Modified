function addToCart(name, price) {
    let AddcartProduct = JSON.parse(sessionStorage.getItem("cart")) || [];
    AddcartProduct.push({ name, price });
    console.log(`add:${AddcartProduct}`);
    sessionStorage.setItem("cart", JSON.stringify(AddcartProduct)); // Use sessionStorage instead of localStorage
    alert("Product added to cart!");
    window.location.reload();
}

window.addToCart = addToCart;

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".add-to-cart");
    console.log(buttons);
    buttons.forEach(button => {
        button.addEventListener("click", function () {
            const name = this.getAttribute("data-name");
            const price = this.getAttribute("data-price");
            addToCart(name, price);
        });
    });
});
