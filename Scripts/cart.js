document.addEventListener("DOMContentLoaded", function () {
    const cartData = JSON.parse(sessionStorage.getItem("cart"));

    if (!cartData || cartData.length === 0) {
        const cartContainer = document.getElementById("cart");
        const pName = document.createElement("h1");
        pName.innerHTML = "Cart is Empety"
        cartContainer.appendChild(pName);
    } else {
        const cartContainer = document.getElementById("cart");
        let totalPrice = 0;

        cartData.forEach((item, index) => {
            const div = document.createElement("div");
            const pName = document.createElement("p");
            const pPrice = document.createElement("p");
            const removeButton = document.createElement("button");

            pName.textContent = item.name;
            pPrice.textContent = "$" + parseFloat(item.price).toFixed(2);
            removeButton.textContent = "Remove";

            removeButton.addEventListener("click", () => {
                removeFromCart(index);
            });

            div.appendChild(pName);
            div.appendChild(pPrice);
            div.appendChild(removeButton);
            div.className = "order";

            cartContainer.appendChild(div);

            totalPrice += parseFloat(item.price);
        });

        const totalDiv = document.createElement("div");
        const totalText = document.createElement("p");
        totalText.textContent = "Total Price: $" + totalPrice.toFixed(2);
        totalText.className = "totalPrice";
        totalDiv.appendChild(totalText);

        // Create a form to submit the cart data
        const form = document.createElement("form");
        form.method = "POST";
        form.action = "cart.php"; // PHP file to handle the order

        // Create a hidden input to store cart data
        const cartInput = document.createElement("input");
        cartInput.type = "hidden";
        cartInput.name = "cart_data";
        cartInput.value = JSON.stringify(cartData); // Store cart data as JSON string
        form.appendChild(cartInput);

        // Create a hidden input to store total price
        const totalInput = document.createElement("input");
        totalInput.type = "hidden";
        totalInput.name = "total_price";
        totalInput.value = totalPrice;
        form.appendChild(totalInput);

        // Create the Buy button
        const buyButton = document.createElement("button");
        buyButton.type = "submit";
        buyButton.textContent = "Buy";
        buyButton.className = "Buy";
        form.appendChild(buyButton);

        totalDiv.appendChild(form);
        totalDiv.className = "total";
        cartContainer.appendChild(totalDiv);
    }
});

function removeFromCart(index) {
    const cartData = JSON.parse(sessionStorage.getItem("cart"));
    cartData.splice(index, 1);
    sessionStorage.setItem("cart", JSON.stringify(cartData));
    window.location.reload();
}
