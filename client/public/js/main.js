const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
index = 0;

const topbarTexts = $$('.topbar-block-text');
setInterval(() => {
    index++;
    if (index == 3) {
        index = 0;
    }
    topbarTexts.forEach((text) => {
        text.classList.remove('active');
    });
    topbarTexts[index].classList.add('active');
}, 5000);

// hover image
const images = $$('.product-info-image-item');
images.forEach((image) => {
    const mainImage = image.parentElement.parentElement.querySelector('.product-img');
    image.onmouseenter = () => {
        mainImage.src = image.src;
    };

    image.onmouseleave = () => {
        const firstImage = image.parentElement.querySelector(
            '.product-info-image-item:first-child',
        );
        mainImage.src = firstImage.src;
    };
});

// navigation
navigationItems = document.querySelectorAll('.navigation-item');

if (navigationItems) {
    navigationItems.forEach((item) => {
        item.onclick = () => {
            const dropdown = item.querySelector('.dropdown');
            if (dropdown) {
                dropdown.classList.toggle('block');
            }
        };
    });
}

const navigationListOpen = document.querySelector('.navigation-list-open');
const navigationListClose = document.querySelector('.navigation-list-close');
const navigationList = document.querySelector('.navigation-list');

if (navigationListOpen && navigationListClose && navigationList) {
    navigationListOpen.onclick = () => {
        navigationList.classList.add('show');
    };

    navigationListClose.onclick = () => {
        navigationList.classList.remove('show');
    };
}

const navigationWrapper = $('.navigation-wrapper');
const navigationLogo = $('.navigation-logo > a > svg');

if (navigationWrapper && navigationLogo) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            navigationWrapper.classList.add('fixed');
            navigationLogo.style.height = '65px';
        } else {
            navigationWrapper.classList.remove('fixed');
            navigationLogo.style.height = 'unset';
        }
    });
}

// new product slide
var swiper = new Swiper('.product-slide', {
    slidesPerView: 4,
    slidesPerGroup: 1,
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    duration: 15000,
    speed: 1000,
    breakpoints: {
        200: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        600: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
});

// category trent slide
var swiper = new Swiper('.category-trent', {
    slidesPerView: 3,
    spaceBetween: 10,
    slidesPerGroup: 1,
    loop: true,
    autoplay: {
        delay: 20000,
    },
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    duration: 15000,
    speed: 1000,
    breakpoints: {
        200: {
            slidesPerView: 1,
            spaceBetween: 10,
        },
        600: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
});
// blog slide
var swiper = new Swiper('.blog-slide', {
    slidesPerView: 3,
    spaceBetween: 10,
    slidesPerGroup: 1,
    loop: true,
    autoplay: {
        delay: 10000,
    },
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    delay: 15000,
    duration: 12000,
    speed: 1000,
    breakpoints: {
        200: {
            slidesPerView: 1,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
});

// club slide
var swiper = new Swiper('.club-slide', {
    slidesPerView: 6,
    spaceBetween: 10,
    slidesPerGroup: 1,
    loop: true,
    autoplay: {
        delay: 10000,
    },
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    duration: 15000,
    speed: 1000,
    breakpoints: {
        300: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        600: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        900: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
        1250: {
            slidesPerView: 6,
            spaceBetween: 20,
        },
    },
});

// filter product
const filters = $$('input[name=filter]');
const filterSize = $$('input[name=filter_size]');
const filterColor = $$('input[name=filter_color]');
const filterTitle = $$('.collections-filter-title');
const filterBoxs = $$('.collections-filter-list');

if (filters && filterSize && filterColor) {
    filters.forEach((filter) => {
        filter.onchange = () => {
            window.location = filter.value;
        };
    });

    filterSize.forEach((filter) => {
        filter.onchange = () => {
            window.location = filter.value;
        };
    });

    filterColor.forEach((filter) => {
        filter.onchange = () => {
            window.location = filter.value;
        };
    });
}

if (filterTitle && filterBoxs) {
    filterTitle.forEach((title) => {
        title.onclick = () => {
            title.style.fontWeight = 'bold';
            const filterBox = title.parentElement.querySelector('.collections-filter-list');
            filterBoxs.forEach((box) => {
                box.classList.remove('show');
            });
            filterBox.classList.toggle('show');
        };
    });

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.collections-filter-item')) {
            filterBoxs.forEach((box) => {
                box.classList.remove('show');
            });
        }
    });
}

// show form evaluate and form answer
const formEvaluate = $('.form-evaluate');
const formEvaluateShow = $('.evaluate-comment-show');
const formAnswers = Array.from($$('.form-answer'));
const formAnswerSubmit = Array.from($$('.form-answer-submit'));
const formAnswerCloses = Array.from($$('.form-answer-cancel'));
const formAnswerShows = Array.from($$('.comment-item-main-action-btn'));

if (formEvaluate && formEvaluateShow) {
    formEvaluateShow.onclick = () => {
        formEvaluate.classList.toggle('show');
    };
}

if (formAnswers && formAnswerSubmit && formAnswerCloses && formAnswerShows) {
    formAnswerShows.forEach((btn, index) => {
        btn.onclick = () => {
            formAnswers[index].classList.add('show');
        };
    });

    formAnswerCloses.forEach((btn, index) => {
        btn.onclick = () => {
            formAnswers[index].classList.remove('show');
        };
    });

    formAnswerSubmit.forEach((btn, index) => {
        btn.onclick = () => {
            formAnswers[index].submit();
        };
    });
}

// handle quantity product plus and minus
const productsSubImage = $$('.products-sub-image > img');
const mainImage = $('.products-main-image > img');
const plusBtn = $('.products-quantity-plus');
const minusBtn = $('.products-quantity-minus');
const quantityNumber = $('.products-quantity-number');
const quantityInput = $('#product-quantity');

let quantity = 1;

if (productsSubImage && mainImage) {
    productsSubImage.forEach((image) => {
        image.onclick = () => {
            mainImage.src = image.src;
        };
    });
}

if (plusBtn && quantityNumber && quantityInput && minusBtn) {
    plusBtn.onclick = () => {
        quantity++;
        quantityNumber.innerText = quantity;
        quantityInput.value = quantity;
    };

    minusBtn.onclick = () => {
        quantity--;
        if (quantity <= 1) {
            quantity = 1;
        }
        quantityNumber.innerText = quantity;
        quantityInput.value = quantity;
    };
}

// cart
const cartShowBtn = $('#cart-show-btn');
const cartCloseBtn = $('#cart-close-btn');
const cartContainer = $('.cart-container');
const cart = $('.cart');

if (cartShowBtn && cartCloseBtn && cartContainer && cart) {
    cartShowBtn.onclick = () => {
        cartContainer.classList.add('show');
        cart.classList.add('show');
    };

    cartCloseBtn.onclick = () => {
        cartContainer.classList.remove('show');
        cart.classList.remove('show');
    };
}

// color and size click events
const sizeItems = Array.from($$('.products-sizes-item'));

if (sizeItems) {
    if (sizeItems[0]) {
        sizeItems[0].classList.add('active');
    }

    sizeItems.forEach((item) => {
        item.onclick = () => {
            sizeItems.forEach((item) => {
                item.classList.remove('active');
            });
            item.classList.add('active');
        };
    });
}

// alert
const closeAlert = $('.product-alert-close');
const alertItem = $('.product-alert');
const closeErrorAlert = $('.product-alert-error-close');
const alertError = $('.product-alert-error');
const closeAuthAlert = $('.auth-alert-close');
const authAlert = $('.auth-alert');

if (closeAlert && alertItem) {
    closeAlert.onclick = () => {
        alertItem.style.display = 'none';
    };
}

if (closeAuthAlert && authAlert) {
    if (closeAuthAlert && authAlert) {
        closeAuthAlert.onclick = () => {
            authAlert.style.display = 'none';
        };
    }
}

if (closeErrorAlert && alertError) {
    if (closeErrorAlert && alertError) {
        closeErrorAlert.onclick = () => {
            alertError.style.display = 'none';
        };
    }
}

window.addEventListener('click', () => {
    if ($('.product-alert-error')) {
        $('.product-alert-error').classList.remove('show');
    }
});

// handle star
const startInput = $$('input[name=star]');
const startsLable = $$('.star-label > i');
let starNum = 5;

if (startInput && startsLable) {
    startInput.forEach((input) => {
        input.onchange = () => {
            starNum = input.value;
            startsLable.forEach((label) => {
                label.classList.remove('bi-star-fill');
                label.classList.add('bi-star');
            });

            for (let i = 0; i < starNum; i++) {
                startsLable[i].classList.remove('bi-star');
                startsLable[i].classList.add('bi-star-fill');
            }
        };
    });
}

// check form evaluate
const inputName = $('input[name=assessor_name]');
const inputEmail = $('input[name=assessor_email]');
const inputPhone = $('input[name=assessor_phone]');
const inputTitle = $('input[name=assessor_title]');
const inputContent = $('textarea[name=assessor_content]');

function getErrorMessage(input, error) {
    const inputParent = input.parentElement;
    const errorMessage = inputParent.querySelector('.form-error');
    errorMessage.innerText = error;
}

function getStringLength(string) {
    string = string.trim();
    string = string.replace(/\s+/g, '');
    let stringLength = string.length;
    return stringLength;
}

// formEvaluate available at line number 128
if (formEvaluate) {
    formEvaluate.onsubmit = (e) => {
        checkName();
        checkEmail();
        checkPhone();
        checkTitle();
        checkContent();
        const check = checkName() && checkEmail() && checkPhone() && checkTitle() && checkContent();
        if (!check) {
            e.preventDefault();
        }
    };
}

function checkName() {
    if (inputName) {
        if (inputName.value == '') {
            getErrorMessage(inputName, 'Vui lòng nhập tên của bạn');
            return false;
        } else if (getStringLength(inputName.value) > 100) {
            getErrorMessage(inputName, 'Tên không được vượt quá 100 ký tự');
            return false;
        } else {
            getErrorMessage(inputName, '');
            return true;
        }
    }
}

function checkEmail() {
    if (inputEmail) {
        if (inputEmail.value == '') {
            getErrorMessage(inputEmail, 'Vui lòng nhập email của bạn');
            return false;
        } else {
            getErrorMessage(inputEmail, '');
            return true;
        }
    }
}

function checkPhone() {
    if (inputPhone) {
        if (inputPhone.value == '') {
            getErrorMessage(inputPhone, 'Vui lòng nhập số điện thoại của bạn');
            return false;
        } else {
            getErrorMessage(inputPhone, '');
            return true;
        }
    }
}

function checkTitle() {
    if (inputTitle) {
        if (inputTitle.value == '') {
            getErrorMessage(inputTitle, 'Vui lòng nhập tiêu đề đánh giá');
            return false;
        } else if (getStringLength(inputTitle.value) > 255) {
            getErrorMessage(inputName, 'Tiêu đề không được vượt quá 255 ký tự');
            return false;
        } else {
            getErrorMessage(inputTitle, '');
            return true;
        }
    }
}

function checkContent() {
    if (inputContent) {
        if (inputContent.value == '') {
            getErrorMessage(inputContent, 'Vui lòng nhập nội dung đánh giá');
            return false;
        } else if (getStringLength(inputContent.value) > 1000) {
            getErrorMessage(inputName, 'Nội dung không được vượt quá 1000 ký tự');
            return false;
        } else {
            getErrorMessage(inputContent, '');
            return true;
        }
    }
}

// order lookup form
const choosePhone = $('#method_phone');
const chooseEmail = $('#method_email');

if (choosePhone && chooseEmail) {
    choosePhone.onchange = () => {
        if (choosePhone.checked) {
            window.location = choosePhone.value;
        }
    };

    chooseEmail.onchange = () => {
        if (chooseEmail.checked) {
            window.location = chooseEmail.value;
        }
    };
}

// payment handle
const inputPayment = $$('input[name=payment]');
const paymentDescs = $$('.checkouts-form-payment-desc');
const paymentChecks = $$('.checkouts-form-payment-check');

if (inputPayment && paymentDescs && paymentChecks) {
    inputPayment.forEach((input) => {
        input.onchange = () => {
            if (input.checked) {
                paymentDescs.forEach((desc) => {
                    desc.classList.remove('show');
                });

                paymentChecks.forEach((check) => {
                    check.classList.remove('check');
                });

                const paymentDesc = input.parentElement.querySelector(
                    '.checkouts-form-payment-desc',
                );
                const paymentCheck = input.parentElement.querySelector(
                    '.checkouts-form-payment-check',
                );

                paymentDesc.classList.add('show');
                paymentCheck.classList.add('check');
            }
        };
    });
}

// handle password
function handleEYEclick(icon, input) {
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
    if (input.type == 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}

const inputPasswordIcon = $$('.auth-form-icon');
if (inputPasswordIcon) {
    inputPasswordIcon.forEach((icon) => {
        icon.onclick = () => {
            inputPassword = icon.parentElement.querySelector('input[name=password]');
            handleEYEclick(icon, inputPassword);
        };
    });
}

// check code time
let time = 90;
const checkCodeText = $('#check-code-text');

if (checkCodeText) {
    const checkCodeInterval = setInterval(() => {
        time--;
        if (time == 0) {
            time = 0;
            checkCodeText.innerText = 'Vui lòng gửi lại mã';
            clearInterval(checkCodeInterval);
        }
    }, 1000);
}

// hanlde choose Color product
const chooseColor = document.querySelectorAll('input[name=color]');

if (chooseColor) {
    chooseColor.forEach((input) => {
        input.onchange = () => {
            if (input.checked) {
                window.location = `?c=${input.value}`;
            }
        };
    });
}

// fixed
const searchOpen = document.querySelector('#search-open');
const searchClose = document.querySelector('.search-close');
const search = document.querySelector('.search');
const popupLoyaltyContent = document.querySelector('.popup-loyalty-content');
const popupLoyaltyContentClose = document.querySelector('.popup-loyalty-content-close');
const popupLoyaltyContentOpen = document.querySelector('.popup-loyalty');

if (searchOpen && searchClose && search) {
    searchOpen.onclick = () => {
        search.classList.add('show');
    };

    searchClose.onclick = () => {
        search.classList.remove('show');
    };
}

if (popupLoyaltyContent && popupLoyaltyContentClose && popupLoyaltyContentOpen) {
    popupLoyaltyContentClose.onclick = () => {
        popupLoyaltyContent.classList.remove('show');
    };

    popupLoyaltyContentOpen.onclick = () => {
        popupLoyaltyContent.classList.add('show');
    };
}

const toTop = document.querySelector('.to-top');

if (toTop) {
    toTop.onclick = () => {
        window.scrollTo({top: 0, behavior: 'smooth'});
    };

    window.addEventListener('scroll', () => {
        if (window.scrollY > 250) {
            toTop.classList.add('show');
        } else {
            toTop.classList.remove('show');
        }
    });
}
