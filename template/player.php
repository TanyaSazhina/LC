<div class="player" id="music-container">
    <div class="music-container container">
        <audio src="demo17.mp3" id="audio" class="audio audio_player" preload="metadata"></audio>
        <div class="navigation container">
            <button id="prev" class="action-btn" title="Previous">
                <i class="fas fa-backward"></i>
            </button>
            <button id="play" class="action-btn action-btn-big">
                <i class="fas fa-play"></i>
            </button>
            <button id="next" class="action-btn" title="Next">
                <i class="fas fa-forward"></i>
            </button>
            <div class="music-info">
                <div class="music-info__container">
                    <img id="player-cover" src="img/covers/cover.jpg" alt="cover">
                    <div class="music-info__text">
                        <h4 id="player-name">Название трека</h4>
                        <div id="player-aurhor" class="author">Автор</div>
                    </div>
                </div>
            </div>
            <div class="volume">
                <button class="action-btn speaker">
                    <i id="speaker_icon" class="fa fa-volume-up" aria-hidden="true"></i>
                </button>
                <input type="range" name="volume" class="player_slider" min="0" max="1" step="0.01" value="1"></input>
            </div>
            <div class="time">
                <span class="time-elapsed">00:00</span>
                <span class="time-duration"> / 5:59</span>
            </div>
        </div>
        <div class="progress-range">
            <div class=" progress-container" id="progress-container">
                <div class="progress progress-bar" id="progress"></div>
            </div>
        </div>
    </div>
</div>