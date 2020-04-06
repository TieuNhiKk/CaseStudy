function uploadImage(input, src) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            let img = e.target.result;
            $(`#${src}`).attr('src', img);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function ckedit(name) {
    CKEDITOR.replace(name, { height: 500 });
}