document.addEventListener('DOMContentLoaded', function () {
    

    function previewImage(event) {
        
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var previewImage = document.getElementById('preview-image');
            var currentImage = document.getElementById('current-image');
            previewImage.src = dataURL;
            previewImage.style.display = 'block';
            if (currentImage) {
                currentImage.style.display = 'none';
            }
        };
        reader.readAsDataURL(input.files[0]);
    }

    // Make the function globally accessible
    window.previewImage = previewImage;
});

    


