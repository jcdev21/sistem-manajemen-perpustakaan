document.addEventListener('DOMContentLoaded', function (e) {
    const fullscreenButton = document.getElementById('fullscreen-button');

    // Menampilkan tombol fullscreen hanya jika browser mendukung API fullscreen
    if (document.fullscreenEnabled || document.webkitFullscreenEnabled || document.mozFullScreenEnabled || document.msFullscreenEnabled) {
        fullscreenButton.style.display = 'block';
    }

    fullscreenButton.addEventListener('click', function () {
        toggleFullscreen();
    });

    function toggleFullscreen() {
        if (!document.fullscreenElement
            && !document.mozFullScreenElement
            && !document.webkitFullscreenElement
            && !document.msFullscreenElement
        ) {
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }
    }
});