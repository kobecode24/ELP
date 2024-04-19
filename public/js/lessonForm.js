document.addEventListener('DOMContentLoaded', function () {
    const videoUrlInput = document.getElementById('video_url');
    const videoFileInput = document.getElementById('video');
    const errorMessage = document.getElementById('videoError');
    const form = document.querySelector('form');

    function checkVideoUrlAndAdjustFileInput() {
        const videoUrl = videoUrlInput.value.trim();
        if (videoUrl.length > 0 && !validateVideoUrl(videoUrl)) {
            errorMessage.textContent = 'Please enter a valid YouTube, Vimeo, or Cloudinary URL.';
            errorMessage.style.display = 'block';
            videoFileInput.disabled = true;
            videoFileInput.value = '';
        } else {
            errorMessage.style.display = 'none';
            videoFileInput.disabled = videoUrl.length > 0;
            if (videoUrl.length > 0) {
                videoFileInput.value = '';
            }
        }
    }

    function validateVideoUrl(url) {
        const pattern = /^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/|vimeo\.com\/|res\.cloudinary\.com\/).+$/;
        return pattern.test(url);
    }

    videoUrlInput.addEventListener('input', checkVideoUrlAndAdjustFileInput);
    checkVideoUrlAndAdjustFileInput();

    form.addEventListener('submit', function (event) {
        if (errorMessage.style.display !== 'none') {
            event.preventDefault();
            iziToast.error({
                title: 'Error',
                message: 'Please correct the errors before submitting.',
                position: 'bottomRight'
            });
        }
    });
});
