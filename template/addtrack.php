<div class="popup-addtrack">
    <a href="#header" class="popup-addtrack__close"></a>
    <div class="popup-setting__content">
        <div class="popup-setting__title">
            добавить трек
        </div>
        <form class="popup-setting__form" method="post" action="components/addtrack_action.php" enctype="multipart/form-data">
            <input type="hidden" name="id_owner" value="<?= $_SESSION['user']['id'] ?>">
            <div class="popup-setting__item name__settings">
                <label for="name">Название</label>
                <input class="popup-setting__input-text" type="text" name="name" id="name" required>
            </div>
            <div class="popup-setting__item">
                <label for="cover">Обложка трека</label>
                <input class="popup-setting__input-file" type="file" name="cover" id="cover" required>
            </div>
            <div class="popup-setting__item">
                <label for="scr_track">Трек</label>
                <input class="popup-setting__input-file" type="file" name="src_track" id="src_track" required>
            </div>
            <div class="popup-setting__item">
                <label for="add_tag1">Добавить тег</label>
                <input class="popup-setting__input-text" type="text" name="tag1" id="add_tag1">
            </div>
            <div class="popup-setting__item">
                <label for="add_tag2">Добавить тег</label>
                <input class="popup-setting__input-text" type="text" name="tag2" id="add_tag2">
            </div>
            <div class="popup-setting__item">
                <label for="add_tag3">Добавить тег</label>
                <input class="popup-setting__input-text" type="text" name="tag3" id="add_tag3">
            </div>
            <div class="popup-setting__item">
                <label for="add_tag4">Добавить тег</label>
                <input class="popup-setting__input-text" type="text" name="tag4" id="add_tag4">
            </div>
            <button type="submit" class="popup-setting__save" style="color: #f7f7f7;">
                Добавить
            </button>
        </form>
    </div>
</div>