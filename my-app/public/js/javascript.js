setupSidebar();

document.body.onload = function () {
    window.axios.defaults.headers.common = {
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
    };
};

function setupSidebar() {
    const elementsToUpdate = document.querySelectorAll(
        "[data-collapsed-sidebar-classes]"
    );
    cartButton = document.querySelector(".cart-button");
    sidebar.addEventListener("hide.bs.collapse", onSidebarHide);
    sidebar.addEventListener("show.bs.collapse", onSidebarShow);

    function hideCardButton() {
        cartButton.style.display = "none";
    }

    function showCardButton() {
        cartButton.style.display = "";
    }

    function onSidebarHide() {
        // ensure full with column
        elementsToUpdate.forEach((element) => {
            element.classList.add(element.dataset.collapsedSidebarClasses);
        });
        showCardButton();
    }

    function onSidebarShow() {
        // ensure full with column
        elementsToUpdate.forEach((element) => {
            element.classList.remove(element.dataset.collapsedSidebarClasses);
        });
        hideCardButton();
    }
}

async function onItemCardFavoriteClick(button, event) {
    event.stopPropagation();
    button.disabled = true;
    const itemId = parseInt(button.dataset.id);
    const resposne = await axios.post("/toggle_favorite", {
        id: itemId,
    });
    const item = resposne.data;
    if (item.favorite) {
        button.classList.add("checked");
    } else {
        button.classList.remove("checked");
    }

    button.disabled = false;
}

async function onItemCardClick(div, event) {
    const itemId = parseInt(div.dataset.id);
    const resposne = await axios.post("/add_to_cart", {
        id: itemId,
    });
    const cartItem = resposne.data;
    window.location.reload();
}

function onMouseDown(div) {
    div.style.backgroundColor = "#e9ecef";
    div.style.transition = "background-color 0.05s";
}

function onMouseUp(div) {
    div.style.backgroundColor = "";
    div.style.transition = "background-color 0.05s";
}

async function deleteCartItem(i, event) {
    const cartItemId = parseInt(i.dataset.id);
    const resposne = await axios.post("/delete_cart_item", {
        id: cartItemId,
    });
    const cartItem = resposne.data;
    window.location.reload();
}
