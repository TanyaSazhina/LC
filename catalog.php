<?php
session_start();
include 'components/db.php';
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = array();
}
if ($_GET['favorites'] == 1) {
    $itemIds = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : array();
    $strIds = implode(', ', $itemIds);
    $sql = "SELECT * 
    FROM `tracks`
    WHERE id in ($strIds)";
    $all_tracks = mysqli_query($db, $sql);
} else if ($_GET['search']) {
    if ($_GET['type'] == '0' || $_GET['type'] == null) {
        $query = $_GET['search'];
        $query = htmlspecialchars($query);
        $query = trim($query);
        $sql = "SELECT *
                FROM `tracks` WHERE `name` LIKE '%$query%'
                OR `tag1` LIKE '%$query%' OR `tag2` LIKE '%$query%'
                OR `tag3` LIKE '%$query%' OR `tag4` LIKE '%$query%'";
        $all_tracks = mysqli_query($db, $sql);
    } else {
        $query = $_GET['search'];
        $query = htmlspecialchars($query);
        $query = trim($query);
        $sql = "SELECT id FROM `users` WHERE `name` LIKE '%$query%'";
        $allUsers = mysqli_query($db, $sql);
        $allUsers = mysqli_fetch_all($allUsers);
        foreach ($allUsers as $user) {
            $value = implode('', $user);
            $row .= ", " . $value;
        }
        $row = ltrim($row, ',');
        $sql = "SELECT * FROM `tracks` WHERE id_owner in ($row)";
        $all_tracks = mysqli_query($db, $sql);
    }
} else {
    $sql = 'SELECT * FROM `tracks`';
    $all_tracks = mysqli_query($db, $sql);
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="foramt-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <title>CATALOG</title>
</head>

<body>
    <?php include("template/header.php") ?>
    <?php include("template/authorization.php") ?>
    <main class="page">
        <section class="catalog">
            <div class="catalog__container">
                <div class="catalog-filter">
                    <div class="catalog-filter__container container">
                        <div tabindex="0" class="catalog-filter__item filter-item filter-view">
                            <div class="filter-item__title">
                                Вид
                                <svg class="filter-item__title-icon" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 7L6.5 2L12 7" stroke="var(--color-white)" stroke-width="2" />
                                </svg>
                            </div>
                            <div class="filter-item__content filter-item__content-view filter-item__content-active">
                                <div class="filter-item__view-item filter-item__view-block filter-item__view-item-active">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="filter-item__view-item filter-item__view-stroke">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="catalog__content container">
                    <?php if ($all_tracks != null) {
                        foreach ($all_tracks as $track) { ?>
                            <article class="catalog__item item">
                                <div class="item__img-bg">
                                    <img class="item__img" src="img/covers/<?= $track['cover'] ?>" alt="<?= $track['name'] ?>">
                                    <div class="player-link" data-src="/tracks/<?= $track['src']; ?>" data-cover="/img/covers/<?= $track['cover']; ?>" data-name="<?= $track['name']; ?>" data-aurhor="<?php
                                                                                                                                                                                                        $sql = "SELECT * FROM `users` WHERE id = " .  $track['id_owner'];
                                                                                                                                                                                                        $rs = mysqli_query($db, $sql);
                                                                                                                                                                                                        $rs = mysqli_fetch_assoc($rs);
                                                                                                                                                                                                        echo "<a href='profile.php?id=" . $rs["id"] . "'>" . $rs["name"] . "</a>"; ?>">
                                        <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="27.7826" cy="27.7822" r="26.9892" fill="#FF3004" />
                                            <path d="M39.1768 26.0509C40.5101 26.8207 40.5101 28.7452 39.1768 29.515L23.5854 38.5166C22.2521 39.2864 20.5854 38.3242 20.5854 36.7846V18.7812C20.5854 17.2416 22.2521 16.2794 23.5854 17.0492L39.1768 26.0509Z" fill="#F7F7F7" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="item__info">
                                    <h3 class="item__title">
                                        <?= $track['name'] ?>
                                    </h3>
                                    <div class="item__author">
                                        <?php
                                        $sql = "SELECT name FROM `users` WHERE id = " .  $track['id_owner'];
                                        $rs = mysqli_query($db, $sql);
                                        $rs = mysqli_fetch_assoc($rs);
                                        echo `<a href="profile.php?id=` . $rs["id"] . `">` . $rs["name"] . `</a>`; ?>
                                    </div>
                                </div>
                                <?php if ($track['tag1'] || $track['tag2'] || $track['tag3'] || $track['tag4']) { ?>
                                    <div class="item__tags">
                                        <?php if ($track['tag1']) { ?>
                                            <div class="item__tag tag">
                                                <?= $track['tag1'] ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($track['tag2']) { ?>
                                            <div class="item__tag tag">
                                                <?= $track['tag2'] ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($track['tag3']) { ?>
                                            <div class="item__tag tag">
                                                <?= $track['tag3'] ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($track['tag4']) { ?>
                                            <div class="item__tag tag">
                                                <?= $track['tag4'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <div class="item__like" id="addFavorites_<?= $track['id'] ?>" onclick="addToFavourites(<?= $track['id'] ?>)" <?php if (in_array($track['id'], $_SESSION['favorites'])) { ?> style="display:none;" <?php } ?>>
                                    <svg class="like" width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M28.6201 3.6423C27.0671 1.93842 24.9362 1 22.6195 1C20.8878 1 19.3018 1.55384 17.9057 2.646C17.2012 3.19729 16.5628 3.87175 16 4.65898C15.4374 3.87199 14.7988 3.19729 14.0941 2.646C12.6982 1.55384 11.1122 1 9.38051 1C7.06377 1 4.93265 1.93842 3.37968 3.6423C1.84526 5.32627 1 7.62682 1 10.1205C1 12.6871 1.94551 15.0365 3.97546 17.5144C5.79141 19.7309 8.40135 21.981 11.4237 24.5864C12.4558 25.4762 13.6256 26.4848 14.8403 27.5592C15.1611 27.8435 15.5729 28 16 28C16.4269 28 16.8389 27.8435 17.1593 27.5596C18.374 26.4851 19.5445 25.476 20.5769 24.5858C23.5989 21.9807 26.2088 19.7309 28.0248 17.5141C30.0547 15.0365 31 12.6871 31 10.1202C31 7.62682 30.1547 5.32627 28.6201 3.6423Z" fill="#303030" stroke="#F7F7F7" stroke-width="2" />
                                    </svg>
                                </div>
                                <div class="item__like like__active" id="removeFavorites_<?= $track['id'] ?>" onclick="removeFromFavourites(<?= $track['id'] ?>)" <?php if (!in_array($track['id'], $_SESSION['favorites'])) { ?> style="display:none;" <?php } ?>>
                                    <svg class="like" width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M28.6201 3.6423C27.0671 1.93842 24.9362 1 22.6195 1C20.8878 1 19.3018 1.55384 17.9057 2.646C17.2012 3.19729 16.5628 3.87175 16 4.65898C15.4374 3.87199 14.7988 3.19729 14.0941 2.646C12.6982 1.55384 11.1122 1 9.38051 1C7.06377 1 4.93265 1.93842 3.37968 3.6423C1.84526 5.32627 1 7.62682 1 10.1205C1 12.6871 1.94551 15.0365 3.97546 17.5144C5.79141 19.7309 8.40135 21.981 11.4237 24.5864C12.4558 25.4762 13.6256 26.4848 14.8403 27.5592C15.1611 27.8435 15.5729 28 16 28C16.4269 28 16.8389 27.8435 17.1593 27.5596C18.374 26.4851 19.5445 25.476 20.5769 24.5858C23.5989 21.9807 26.2088 19.7309 28.0248 17.5141C30.0547 15.0365 31 12.6871 31 10.1202C31 7.62682 30.1547 5.32627 28.6201 3.6423Z" fill="#303030" stroke="#F7F7F7" stroke-width="2" />
                                    </svg>
                                </div>
                            </article>
                    <?php }
                    } ?>
                </div>
            </div>
        </section>
    </main>
    <?php include("template/player.php") ?>
    <?php include("template/footer.php") ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type='text/javascript' src='//cdn.jsdelivr.net/jquery.marquee/1.4.0/jquery.marquee.min.js'></script>
    <script src="js/script.min.js"></script>
</body>

</php>