$('#menu-btn').click(function() {
    $('#menu').toggleClass("active");
})

// Preview Image
function previewImage()
{
const image = document.querySelector('#foto');
const imgPreview = document.querySelector('.img-preview');

imgPreview.style.display = 'block';

const oFReader = new FileReader();
oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent)
    {
        imgPreview.src = oFREvent.target.result;
    }
}