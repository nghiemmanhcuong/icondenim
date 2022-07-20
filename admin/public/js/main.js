const sitebarItem = document.querySelectorAll('.sitebar-nav-item');
const menuSub = document.querySelectorAll('.sitebar-nav-sub');
const menuIcon = document.querySelectorAll('.sitebar-nav-icon');
sitebarItem.forEach((item) => {
    item.onclick = () => {
        const sitebarNavSub = item.querySelector('.sitebar-nav-sub');
        const sitebarNavIcon = item.querySelector('.sitebar-nav-icon');

        if (sitebarNavSub) {
            if (sitebarNavSub.classList.contains('show')) {
                sitebarNavSub.classList.remove('show');
                if (sitebarNavIcon.classList.contains('bi-caret-up-fill')) {
                    sitebarNavIcon.classList.remove('bi-caret-up-fill');
                    sitebarNavIcon.classList.add('bi-caret-down-fill');
                }
                return;
            }
        }

        menuSub.forEach((menu, index) => {
            menu.classList.remove('show');
            if (menuIcon[index].classList.contains('bi-caret-up-fill')) {
                menuIcon[index].classList.remove('bi-caret-up-fill');
                menuIcon[index].classList.add('bi-caret-down-fill');
            }
        });

        if (sitebarNavIcon) {
            if (sitebarNavIcon.classList.contains('bi-caret-down-fill')) {
                sitebarNavIcon.classList.add('bi-caret-up-fill');
                sitebarNavIcon.classList.remove('bi-caret-down-fill');
            }
        }
        if (sitebarNavSub) {
            sitebarNavSub.classList.add('show');
        }
    };
});

// filter
const filter = document.getElementById('filter');

if (filter) {
    filter.onchange = () => {
        filter.options[filter.selectedIndex].value && (window.location = filter.options[filter.selectedIndex]
            .value);
    }
}

// checked popular category
const popular = document.getElementById('popular');
const notPopular = document.getElementById('not_popular');
const trent = document.getElementById('trent');
const notTrent = document.getElementById('not_trent');
const checked_text = document.getElementById('checked_text');

if(popular && notPopular && checked_text){
    popular.onchange = () => {
        if (popular.checked) {
            checked_text.innerText = '*';
        }
    }

    notPopular.onchange = () => {
        if (notPopular.checked) {
            checked_text.innerText = '(không bắt buộc)';
        }
    }

    if (popular.checked) {
        checked_text.innerText = '*';
    }

    if (notPopular.checked) {
        checked_text.innerText = '(không bắt buộc)';
    }
}

if(trent && notTrent && checked_text){
    trent.onchange = () => {
        if (trent.checked) {
            checked_text.innerText = '*';
        }
    }

    notTrent.onchange = () => {
        if (notTrent.checked) {
            checked_text.innerText = '(không bắt buộc)';
        }
    }

    if (trent.checked) {
        checked_text.innerText = '*';
    }

    if (notTrent.checked) {
        checked_text.innerText = '(không bắt buộc)';
    }
}
