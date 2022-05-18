<?php
session_start();
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = array();
}
include 'components/db.php';

$sql = 'SELECT * FROM `tracks` LIMIT 4';
$all_tracks = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="foramt-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <title>Главная</title>
</head>

<body class="index">
    <?php include("template/header.php") ?>
    <?php include("template/authorization.php") ?>
    <div class="preview__bg">
    </div>
    <main class="page">
        <section class="preview">
            <div class="preview__container container">
                <h2 class="preview__title">
                    Место, Где Можно Купить Биты От Лучших Мировых Производителей
                </h2>
                <form method="get" action="catalog.php" class="preview__input-container">
                    <label for="search-preview">
                        <svg class="preview__search-icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.7663 18.5889L14.7962 13.6188C16.1506 11.9623 16.8165 9.84866 16.6562 7.71497C16.4959 5.58128 15.5216 3.59083 13.9349 2.15534C12.3482 0.719841 10.2704 -0.0508742 8.13136 0.00260835C5.99233 0.0560909 3.95568 0.929679 2.44268 2.44268C0.929679 3.95568 0.0560909 5.99233 0.00260835 8.13136C-0.0508742 10.2704 0.719841 12.3482 2.15534 13.9349C3.59083 15.5216 5.58128 16.4959 7.71497 16.6562C9.84866 16.8165 11.9623 16.1506 13.6188 14.7962L18.5889 19.7663C18.7459 19.9179 18.9563 20.0019 19.1746 20C19.3929 19.9981 19.6017 19.9105 19.7561 19.7561C19.9105 19.6017 19.9981 19.3929 20 19.1746C20.0019 18.9563 19.9179 18.7459 19.7663 18.5889ZM8.35314 15.0143C7.03568 15.0143 5.74781 14.6237 4.65238 13.8917C3.55695 13.1598 2.70317 12.1194 2.199 10.9023C1.69483 9.6851 1.56292 8.34575 1.81994 7.05361C2.07697 5.76146 2.71138 4.57455 3.64297 3.64297C4.57455 2.71138 5.76146 2.07697 7.05361 1.81994C8.34575 1.56292 9.6851 1.69483 10.9023 2.199C12.1194 2.70317 13.1598 3.55695 13.8917 4.65238C14.6237 5.74781 15.0143 7.03568 15.0143 8.35314C15.0124 10.1192 14.3099 11.8123 13.0611 13.0611C11.8123 14.3099 10.1192 15.0124 8.35314 15.0143Z" fill="#F7F7F7" />
                        </svg>
                    </label>
                    <input class="preview__search-input" type="text" placeholder="Поиск" id="search" name="search">
                    <select class="preview__select" name="type" id="search-type">
                        <option value="0">
                            Треки
                        </option>
                        <option value="1">
                            Авторы
                        </option>
                    </select>
                </form>
                <div class="preview__tags">
                    <div class="preview__tags-title">
                        Популярные метки:
                    </div>
                    <a href="catalog.php?search=Реп" class="preview__tag tag">
                        Реп
                    </a>
                    <a href="catalog.php?search=западный" class="preview__tag tag">
                        Западный
                    </a>
                    <a href="catalog.php?search=Рок" class="preview__tag tag">
                        Рок
                    </a>
                </div>
            </div>
        </section>
        <div class="index-numbers">
            <div class="index-numbers__container container">
                <div class="index-numbers__item">
                    <div class="index-numbers__number">
                        400,000+
                    </div>
                    <div class="index-numbers__title">
                        Проданных цифровых продуктов
                    </div>
                </div>
                <div class="index-numbers__item">
                    <div class="index-numbers__number">
                        30,000,000+
                    </div>
                    <div class="index-numbers__title">
                        Рублей выплачивается независимым создателям
                    </div>
                </div>
                <div class="index-numbers__item">
                    <div class="index-numbers__number">
                        1,000,000+
                    </div>
                    <div class="index-numbers__title">
                        Ежемесячные уникальные посетители нашего сайта
                    </div>
                </div>
            </div>
        </div>
        <section class="trend">
            <div class="trend__container container">
                <a href="catalog.php" class="trend__title section__title section__link">
                    Популярные треки
                    <svg width="36" height="24" viewBox="0 0 36 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10.5C1.17157 10.5 0.5 11.1716 0.5 12C0.5 12.8284 1.17157 13.5 2 13.5L2 10.5ZM35.0607 13.0607C35.6464 12.4749 35.6464 11.5251 35.0607 10.9393L25.5147 1.3934C24.9289 0.807612 23.9792 0.807612 23.3934 1.3934C22.8076 1.97918 22.8076 2.92893 23.3934 3.51472L31.8787 12L23.3934 20.4853C22.8076 21.0711 22.8076 22.0208 23.3934 22.6066C23.9792 23.1924 24.9289 23.1924 25.5147 22.6066L35.0607 13.0607ZM2 13.5L34 13.5L34 10.5L2 10.5L2 13.5Z" fill="#F7F7F7" />
                    </svg>
                </a>
                <div class="trend__subtitle section__subtitle">
                    Всего несколько крутых популярных треков
                </div>
                <div class="trend__catalog catalog__content">
                    <?php if ($all_tracks != null) {
                        foreach ($all_tracks as $track) { ?>
                            <article class="catalog__item item">
                                <div class="item__img-bg">
                                    <img class="item__img" src="img/covers/<?= $track['cover'] ?>" alt="<?= $track['name'] ?>">
                                    <div class="player-link" data-src="/tracks/<?= $track['src']; ?>">
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
        <section class="why">
            <div class="why__container container">
                <h2 class="why__title section__title">
                    Зачем Покупать у Lost connection?
                </h2>
                <div class="why__content">
                    <div class="why__item">
                        <h3 class="why__item-title">
                            Ты знаешь, что получаешь
                        </h3>
                        <p class="why__item-description">
                            Мы следим за тем, чтобы вы знали, что получаете, и размещаем всю информацию заранее,
                            например, какие файлы
                            вы получите и какие условия использования вы получите. Никогда не приходите в студию с
                            пустыми руками
                            снова!
                        </p>
                        <div class="why__item-img">
                            <picture>
                                <source srcset="img/why/vinyl.webp" type="image/webp"><img class="why-img" src="img/why/vinyl.jpg" alt="vinyl">
                            </picture>
                        </div>
                    </div>
                    <div class="why__item">
                        <h3 class="why__item-title">
                            Держать адвокатов на расстоянии
                        </h3>
                        <p class="why__item-description">
                            Каждая покупка оформляется электронным контрактом, подписанным обеими сторонами. Ты
                            полностью защищен. </p>
                        <div class="why__item-img">
                            <picture>
                                <source srcset="img/why/keybord.webp" type="image/webp"><img class="why-img" src="img/why/keybord.jpg" alt="keybord">
                            </picture>
                        </div>
                    </div>
                    <div class="why__item">
                        <h3 class="why__item-title">
                            Попробуйте, прежде чем покупать
                        </h3>
                        <p class="why__item-description">
                            Тысячи битов предлагаются для бесплатного скачивания, так что вы можете попробовать, прежде
                            чем покупать, и сделать
                            уверен, что ритм подходит именно вам
                        <div class="why__item-img">
                            <picture>
                                <source srcset="img/why/micro.webp" type="image/webp"><img class="why-img" src="img/why/micro.jpg" alt="micro">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="who">
            <div class="who__container container">
                <h2 class="who__title section__title">
                    С Кем Работали Наши Продюсеры
                </h2>
                <div class="who__subtitle section__subtitle">
                    Всего несколько популярных артистов, которые работают с нашими продюсерами
                </div>
            </div>
            <div class="who__content" data-duplicated='true'>
                <div class="who__item">
                    <picture>
                        <source srcset="img/who/blueface.webp" type="image/webp"><img class="who__img" src="img/who/blueface.jpg" alt="blueface">
                    </picture>
                    blueface
                </div>
                <div class="who__item">
                    <picture>
                        <source srcset="img/who/kanye-west.webp" type="image/webp"><img class="who__img" src="img/who/kanye-west.jpg" alt="kanye-west">
                    </picture>
                    kanye west
                </div>
                <div class="who__item">
                    <picture>
                        <source srcset="img/who/drake.webp" type="image/webp"><img class="who__img" src="img/who/drake.jpg" alt="drake">
                    </picture>
                    drake
                </div>
                <div class="who__item">
                    <picture>
                        <source srcset="img/who/eminem.webp" type="image/webp"><img class="who__img" src="img/who/eminem.jpg" alt="eminem">
                    </picture>
                    eminem
                </div>
                <div class="who__item">
                    <picture>
                        <source srcset="img/who/lil-pump.webp" type="image/webp"><img class="who__img" src="img/who/lil-pump.jpg" alt="lil-pump">
                    </picture>
                    lil pump
                </div>
                <div class="who__item">
                    <picture>
                        <source srcset="img/who/lil-tecca.webp" type="image/webp"><img class="who__img" src="img/who/lil-tecca.jpg" alt="lil-tecca">
                    </picture>
                    lil tecca
                </div>
                <div class="who__item">
                    <picture>
                        <source srcset="img/who/xxxtentacion.webp" type="image/webp"><img class="who__img" src="img/who/xxxtentacion.jpg" alt="xxxtentacion">
                    </picture>
                    xxxtentacion
                </div>
                <div class="who__item">
                    <picture>
                        <source srcset="img/who/snoop-dog.webp" type="image/webp"><img class="who__img" src="img/who/snoop-dog.jpg" alt="snoop-dog">
                    </picture>
                    snoop dog
                </div>
            </div>
        </section>
        <section class="features" id="features">
            <div class="features__container container">
                <h2 class="features__title section__title">
                    приемущество
                </h2>
                <div class="features__content">
                    <div class="features__section">
                        <h3 class="features__section-title">
                            ДЛЯ битмейкеров
                        </h3>
                        <div class="features__item">
                            <h4 class="features__item-title">
                                Эксклюзивный контент
                            </h4>
                            <div class="features__item-description">
                                Будьте уверены, что вы найдете только высококачественный, оригинальный контент.
                            </div>
                        </div>
                        <div class="features__item">
                            <h4 class="features__item-title">
                                Разнообразный Выбор</h4>
                            <div class="features__item-description">
                                Откройте для себя идеальное звучание для вашего последнего проекта или сингла. С нашим
                                огромным, охватывающим
                                выбор
                                конечно, здесь найдется что-то для каждого.
                            </div>
                        </div>
                        <div class="features__item">
                            <h4 class="features__item-title">
                                Сообщество</h4>
                            <div class="features__item-description">
                                Присоединяйтесь к сообществу Lost Connection и будьте в курсе всех последних новостей
                                хип-хопа.
                            </div>
                        </div>
                    </div>
                    <div class="features__section">
                        <h3 class="features__section-title">
                            для артистов
                        </h3>
                        <div class="features__item">
                            <h4 class="features__item-title">
                                никаких взносов</h4>
                            <div class="features__item-description">
                                Что твое, то твое. Мы обещаем не добавлять никаких дополнительных или скрытых платежей в
                                дополнение
                                к продажам beat
                                для
                                производитель или покупатель.
                            </div>
                        </div>
                        <div class="features__item">
                            <h4 class="features__item-title">
                                Настройка</h4>
                            <div class="features__item-description">
                                Мы предлагаем вам все инструменты для создания идеального трека. Выбирите бит для
                                определенного
                                трека.</div>
                        </div>
                        <div class="features__item">
                            <h4 class="features__item-title">
                                Продвижение</h4>
                            <div class="features__item-description">
                                Хотите получить больше информации о своей музыке? Участвуйте в наших Станциях,
                                приобретайте
                                Рекомендуемые
                                Инструментальный
                                реклама или место для дополнительной рекламы, чтобы ваши инструменты были представлены
                                на нашей домашней
                                странице с высоким трафиком.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="banner">
            <div class="banner__container container">
                <div class="banner__content">
                    <h2 class="banner__title">
                        новостная рассылка
                    </h2>
                    <form class="banner__form">
                        <input class="banner__form-input" type="text" name="email" id="email" placeholder="Ваша почта@">
                        <div class="banner__form-submit" onclick="subscribe()">
                            Подписаться
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="faq">
            <div class="faq__container container">
                <div class="faq__title section__title section__link">
                    Популярные вопросы
                </div>
                <div class="faq__subtitle section__subtitle">
                    Всего несколько популярных вопросов, чтобы вам стало проще
                </div>
                <div class="faq__questions" id="faq">
                    <div class="question">
                        <div class="question__title">
                            Как купить бит?
                            <svg class="question__title-icon" width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.57613 0.210111C6.25796 -0.0700369 5.74204 -0.0700369 5.42387 0.210111L0.238643 4.77538C-0.0795477 5.05555 -0.0795477 5.50975 0.238643 5.78988C0.556833 6.07004 1.07272 6.07004 1.39091 5.78988L6 1.73187L10.6091 5.78988C10.9273 6.07004 11.4432 6.07004 11.7613 5.78988C12.0796 5.50975 12.0796 5.05555 11.7613 4.77538L6.57613 0.210111Z" fill="#F7F7F7" />
                            </svg>
                        </div>
                        <div class="question__answer">
                            Нажмите на красную кнопку покупки, если есть разные варианты приобретаемых лицензий
                            (лизинг/эксклюзив), прочтите их условия, укажите Ваш выбор, Ваши контактные данные и
                            произведите оплату удобным Вам способом.
                        </div>
                    </div>
                    <div class="question">
                        <div class="question__title">
                            Как я получу бит?
                            <svg class="question__title-icon" width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.57613 0.210111C6.25796 -0.0700369 5.74204 -0.0700369 5.42387 0.210111L0.238643 4.77538C-0.0795477 5.05555 -0.0795477 5.50975 0.238643 5.78988C0.556833 6.07004 1.07272 6.07004 1.39091 5.78988L6 1.73187L10.6091 5.78988C10.9273 6.07004 11.4432 6.07004 11.7613 5.78988C12.0796 5.50975 12.0796 5.05555 11.7613 4.77538L6.57613 0.210111Z" fill="#F7F7F7" />
                            </svg>
                        </div>
                        <div class="question__answer">
                            На указанные контактные данные в течение трёх суток придёт уведомление об отправке Вам
                            нетегированной полной версии инструментала в формате wav и если это предусматривает
                            выбранная Вам лицензия ссылка на архив с трекаутом. Зайдите в Личный Кабинет, раздел
                            "Покупки и Продажи", скачайте полученный инструментал и подтвердите, что Вы получили именно
                            то, что оплатили либо отправьте битмейкеру на доработку с указанием причины.
                        </div>
                    </div>
                    <div class="question">
                        <div class="question__title">
                            Какую лицензию на бит я получаю?
                            <svg class="question__title-icon" width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.57613 0.210111C6.25796 -0.0700369 5.74204 -0.0700369 5.42387 0.210111L0.238643 4.77538C-0.0795477 5.05555 -0.0795477 5.50975 0.238643 5.78988C0.556833 6.07004 1.07272 6.07004 1.39091 5.78988L6 1.73187L10.6091 5.78988C10.9273 6.07004 11.4432 6.07004 11.7613 5.78988C12.0796 5.50975 12.0796 5.05555 11.7613 4.77538L6.57613 0.210111Z" fill="#F7F7F7" />
                            </svg>
                        </div>
                        <div class="question__answer">
                            Вы получает бит в лизинг или эксклюзив, полные условия предоставляемых лицензий на
                            необходимый бит Вы можете прочитать наведя на треугольник справа от цены бита, за иными
                            правами обратитесь к нам в группу или на почту: support@LC.ru
                        </div>
                    </div>
                    <div class="question">
                        <div class="question__title">
                            Какие гарантии у меня есть?
                            <svg class="question__title-icon" width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.57613 0.210111C6.25796 -0.0700369 5.74204 -0.0700369 5.42387 0.210111L0.238643 4.77538C-0.0795477 5.05555 -0.0795477 5.50975 0.238643 5.78988C0.556833 6.07004 1.07272 6.07004 1.39091 5.78988L6 1.73187L10.6091 5.78988C10.9273 6.07004 11.4432 6.07004 11.7613 5.78988C12.0796 5.50975 12.0796 5.05555 11.7613 4.77538L6.57613 0.210111Z" fill="#F7F7F7" />
                            </svg>
                        </div>
                        <div class="question__answer">
                            Мы лично сопровождаем каждую сделку, в том случае, если Вы не получите свой бит или получите
                            не тот/не надлежащего качества, мы гарантируем полный возврат денежных средств.
                        </div>
                    </div>
                    <div class="question">
                        <div class="question__title">
                            Какие формы оплаты вы принимаете?
                            <svg class="question__title-icon" width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.57613 0.210111C6.25796 -0.0700369 5.74204 -0.0700369 5.42387 0.210111L0.238643 4.77538C-0.0795477 5.05555 -0.0795477 5.50975 0.238643 5.78988C0.556833 6.07004 1.07272 6.07004 1.39091 5.78988L6 1.73187L10.6091 5.78988C10.9273 6.07004 11.4432 6.07004 11.7613 5.78988C12.0796 5.50975 12.0796 5.05555 11.7613 4.77538L6.57613 0.210111Z" fill="#F7F7F7" />
                            </svg>
                        </div>
                        <div class="question__answer">
                            На данный момент мы принимаем все самые распространенные платёжные системы, за исключением
                            WebMoney. Подключение к WebMoney произойдёт в самое ближайшее время.
                        </div>
                    </div>
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