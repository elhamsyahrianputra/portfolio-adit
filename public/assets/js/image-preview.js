function imagePreview(input_id, img_preview) {
    const image = document.querySelector('#'+input_id);
    const imgPreview = document.querySelector('#'+img_preview);

    imgPreview.style.display = 'block';
    imgPreview.style.maxHeight = '250px';
    imgPreview.classList.add('border');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}