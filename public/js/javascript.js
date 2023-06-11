setupSidebar();


function setupSidebar() {
    const elementsToUpdate = document.querySelectorAll('[data-collapsed-sidebar-classes]');
    cartButton = document.querySelector('.cart-button');
    sidebar.addEventListener('hide.bs.collapse', onSidebarHide);
    sidebar.addEventListener('show.bs.collapse', onSidebarShow);

    if (!cartWasOpen()) {
        cartButton.click();
    } else {
        hideCardButton();
    }

    function hideCardButton() {
        cartButton.style.display = 'none';
    }

    function showCardButton() {
        cartButton.style.display = '';
    }

    function onSidebarHide() {
        // ensure full with column
        elementsToUpdate.forEach(element => {
            element.classList.add(element.dataset.collapsedSidebarClasses);
        });
        showCardButton();
        localStorage.setItem('cartIsOpen', '0');
    }

    function onSidebarShow() {
        // ensure full with column
        elementsToUpdate.forEach(element => {
            element.classList.remove(element.dataset.collapsedSidebarClasses);
        });
        hideCardButton();
        localStorage.setItem('cartIsOpen', '1');
    }

    function cartWasOpen() {
        try {
            return localStorage.getItem('cartIsOpen') === '1'
        } catch (err) {
            return false;
        }
    }
}

async function onItemCardFavoriteClick(button, event) {
    event.stopPropagation();
    button.disabled = true;
    const itemId = parseInt(button.dataset.id);
    const resposne = await axios.post('/toggle_favorite', {
        'id': itemId
    });
    const item = resposne.data;
    if (item.favorite) {
        button.classList.add('active');
    } else {
        button.classList.remove('active');
    }
    window.location.reload();
}

async function onItemCardClick(div, event) {
    const itemId = parseInt(div.dataset.id);
    const resposne = await axios.post('/add_to_cart', {
        'id': itemId
    });
    const cartItem = resposne.data;
    window.location.reload();
}

function onMouseDown(div) {
    div.style.backgroundColor = '#e9ecef';
    div.style.transition = 'background-color 0.05s';
}

function onMouseUp(div) {
    div.style.backgroundColor = '';
    div.style.transition = 'background-color 0.05s';
}

async function deleteCartItem(i, event) {
    const cartItemId = parseInt(i.dataset.id);
    const resposne = await axios.post('/delete_cart_item', {
        'id': cartItemId
    });
    const cartItem = resposne.data;
    window.location.reload();
}
