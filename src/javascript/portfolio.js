// Adicione esta parte dentro da tag <script></script> antes de fechar a tag </body> no seu arquivo HTML



document.addEventListener('DOMContentLoaded', function() {
    const videos = document.querySelectorAll('.video-item');

    videos.forEach(function(video) {
        video.addEventListener('click', function() {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
        });
    });
});
