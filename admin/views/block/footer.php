<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
let isChoose = false;
const formChooseAll = document.getElementById('form-choose-all');
const submitFormChooseAll = document.getElementById('submit-form-choose-all');
const checkedBtn = document.getElementById('checked-all-btn');
const uncheckedBtn = document.getElementById('unchecked-all-btn');
const selectInput = document.querySelectorAll('input[type=checkbox]');

if (formChooseAll && checkedBtn && uncheckedBtn && selectInput) {
    checkedBtn.onclick = () => {
        selectInput.forEach(input => {
            input.checked = true;
        })
    }

    uncheckedBtn.onclick = () => {
        selectInput.forEach(input => {
            input.checked = false;
        })
    }
}

if (submitFormChooseAll) {
    submitFormChooseAll.onclick = () => {
        if (confirm('Bạn chắc chắn muốn kiểm duyệt tất cả cột đã chọn???')) {
            isChoose = true;
            console.log(isChoose)
        }

        if (!isChoose) {
            formChooseAll.onsubmit = (e) => {
                e.preventDefault();
            }
        } else {
            formChooseAll.submit();
        }
    }
}
</script>
<script src="public/js/main.js"></script>
</body>

</html>