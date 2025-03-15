function placeOrder() {
    const customer_name = document.getElementById("customer_name").value;
    const product = document.getElementById("product").value;
    const quantity = document.getElementById("quantity").value;

    fetch("http://localhost/backend/api.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ customer_name, product, quantity })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        loadOrders();
    });
}

function loadOrders() {
    fetch("http://localhost/backend/api.php")
    .then(response => response.json())
    .then(orders => {
        const orderList = document.getElementById("order_list");
        orderList.innerHTML = "";
        orders.forEach(order => {
            orderList.innerHTML += `<li>${order.customer_name} - ${order.product} (x${order.quantity})</li>`;
        });
    });
}

document.addEventListener("DOMContentLoaded", loadOrders);
