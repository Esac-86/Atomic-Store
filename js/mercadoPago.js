const createCheckoutButton = async (preferenceId) => {
    try {
        const mp = new MercadoPago('APP_USR-a5e0a869-cd6a-4167-972a-77b4ee911edd', {
            locale: 'es-CO'
        });

        const bricksBuilder = mp.bricks();

        const renderComponent = async () => {
            const walletContainer = document.getElementById("wallet_container");
            if (walletContainer) {
                // Desmontar cualquier componente existente dentro del contenedor
                walletContainer.innerHTML = "";
            }

            await bricksBuilder.create("wallet", "wallet_container", {
                initialization: {
                    preferenceId: preferenceId,
                    redirectMode: "blank",
                },
            });
        }

        renderComponent();
    } catch (error) {
        console.error("Error al crear el botón de pago:", error);
    }
};

document.getElementById("btnComprar").addEventListener("click", async () => {
    try {
        const carrito = JSON.parse(document.getElementById("btnComprar").getAttribute("data-cart"));

        console.log("Carrito de compras:", carrito);

        const items = carrito.map(producto => ({
            title: producto.NOMBRE,
            quantity: parseInt(producto.CANTIDAD),
            currency_id: 'COP',
            unit_price: parseFloat(producto.PRECIO)
        }));

        const preference = {
            items: items,
            payment_methods: {
                excluded_payment_methods: [], // No excluyas ningún método de pago
                excluded_payment_types: [], // No excluyas ningún tipo de pago
            },
            back_urls: {
                success: "https://www.google.com/?hl=es",
                failure: "https://www.google.com/?hl=en",
                pending: "https://www.google.com/?hl=fr"
            },
            auto_return: "approved",
        };
        
        console.log("Datos de los productos enviados al backend:", items);

        console.log("Preferencia a enviar:", preference);

        const response = await fetch("https://mp-atomic.onrender.com/create_preference", {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(preference),
        });

        const preferenceResult = await response.json();
        console.log("Respuesta del backend:", preferenceResult);
        createCheckoutButton(preferenceResult.id);
    } catch (error) {
        console.error("Error al procesar la compra:", error);
    }
});
