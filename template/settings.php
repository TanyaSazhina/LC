<div class="popup-setting">
    <a href="#header" class="popup-setting__close"></a>
    <div class="popup-setting__content">
        <div class="popup-setting__title">
            Профиль
        </div>
        <form class="popup-setting__form" method="post" action="components/update.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $_SESSION["user"]["id"] ?>">
            <div class="popup-setting__item name__settings">
                <label for="name">ИМЯ</label>
                <input class="popup-setting__input-text" type="text" name="name" id="name" value="<?= $_SESSION["user"]["name"] ?>">
            </div>
            <div class="popup-setting__item">
                <label for="profile_header">ШАПКА ПРОФИЛЯ</label>
                <input class="popup-setting__input-file" type="file" name="profileHeader" id="profile_header">
            </div>
            <div class="popup-setting__item">
                <label for="profile_avatar">АВАТАР ПРОФИЛЯ</label>
                <input class="popup-setting__input-file" type="file" name="userAvatar" id="profile_avatar">
            </div>
            <div class="popup-setting__item biography__setting">
                <label for="name">БИОГРАФИЯ</label>
                <textarea class="popup-setting__input-text" type="text" name="biography" id="biography"><?= $_SESSION["user"]["biography"] ?></textarea>
            </div>
            <div class="popup-setting__item">
                <label for="profile_site">Сайт</label>
                <input class="popup-setting__input-text" type="text" name="site" id="profile_site" value="<?= $_SESSION["user"]["site"] ?>">
            </div>
            <div class="popup-setting__item">
                <label for="profile_loc">Локация</label>
                <input class="popup-setting__input-text" type="text" name="loc" id="profile_loc" value="<?= $_SESSION["user"]['loc'] ?>">
            </div>
            <div class="popup-setting__item">
                <label for="yt_link">YT</label>
                <input class="popup-setting__input-text" type="text" name="yt" id="yt_link" value="<?= $_SESSION["user"]['yt'] ?>">
            </div>
            <div class="popup-setting__item">
                <label for="twitter_link">twitter</label>
                <input class="popup-setting__input-text" type="text" name="twitter" id="twitter_link" value="<?= $_SESSION["user"]['twitter'] ?>">
            </div>
            <div class="popup-setting__item">
                <label for="instagram_link">instagram</label>
                <input class="popup-setting__input-text" type="text" name="instagram" id="instagram_link" value="<?= $_SESSION["user"]['instagram'] ?>">
            </div>
            <div class="popup-setting__item">
                <label for="spotify_link">spotify</label>
                <input class="popup-setting__input-text" type="text" name="spotify" id="spotify_link" value="<?= $_SESSION["user"]['spotify'] ?>">
            </div>
            <div class="popup-setting__item">
                <label for="facebook_link">facebook</label>
                <input class="popup-setting__input-text" type="text" name="facebook" id="facebook_link" value="<?= $_SESSION["user"]['facebook'] ?>">
            </div>
            <div class="popup-setting__item">
                <label for="telegram_link">telegram</label>
                <input class="popup-setting__input-text" type="text" name="telegram" id="telegram_link" value="<?= $_SESSION["user"]['telegram'] ?>">
            </div>

            <button type="submit" class="popup-setting__save" style="color: #f7f7f7;">
                СОХРАНИТЬ
            </button>
        </form>
    </div>
</div>