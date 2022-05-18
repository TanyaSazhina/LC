<footer class="footer">
    <div class="footer__container container">
        <div class="footer__left">
            <div class="footer__logo">
                lost connection
            </div>
            <div class="footer__app-links">
                <div class="footer__app">
                    <picture>
                        <source srcset="img/app-store.svg" type="image/webp"><img src="img/app-store.svg" alt="app-store">
                    </picture>
                </div>
                <div class="footer__app">
                    <picture>
                        <source srcset="img/google-play.svg" type="image/webp"><img src="img/google-play.svg" alt="google-play">
                    </picture>
                </div>
            </div>
        </div>
        <div class="footer__nav">
            <div class="footer__nav-block">
                <h4 class="footer__nav-title">
                    Lost connection
                </h4>
                <ul class="footer__list">
                    <li class="footer__link">
                        <a href="index">Главная</a>
                    </li>
                    <li class="footer__link">
                        <a href="index.php#features">Приемущества</a>
                    </li>
                    <li class="footer__link">
                        <a href="index.php#faq">Часто задаваемые вопросы</a>
                    </li>
                </ul>
            </div>
            <div class="footer__nav-block">
                <h4 class="footer__nav-title">
                    Треки
                </h4>
                <ul class="footer__list">
                    <li class="footer__link">
                        <a href="catalog.php">Последние</a>
                    </li>
                    <li class="footer__link">
                        <a href="catalog.php?id=features">Избранные</a>
                    </li>
                </ul>
            </div>
            <?php if ($_SESSION['user']) { ?>
                <div class="footer__nav-block">
                    <a href="profile.php?id=<?= $_SESSION["user"]["id"] ?>" class="footer__nav-title">
                        Аккаунт
                    </a>
                    <ul class="footer__list">
                        <li class="footer__link footer__add-track">
                            <span>Добавить трек</span>
                        </li>
                        <li class="footer__link footer__settings-user">
                            <span>Настройки аккаунт</span>
                        </li>
                    </ul>
                </div>
            <?php } ?>
            <div class="footer__nav-block">
                <h4 class="footer__nav-title">
                    Соц сети
                </h4>
                <ul class="footer__list">
                    <li class="footer__link">
                        <a href="#">
                            <picture>
                                <source srcset="img/social/inst.svg" type="image/webp"><img class="footer__social-icon" src="img/social/inst.svg" alt="inst">
                            </picture>
                            Instagram
                        </a>
                    </li>
                    <li class="footer__link">
                        <a href="#">
                            <picture>
                                <source srcset="img/social/yt.svg" type="image/webp"><img class="footer__social-icon" src="img/social/yt.svg" alt="yt">
                            </picture>
                            Youtube
                        </a>
                    </li>
                    <li class="footer__link">
                        <a href="#">
                            <picture>
                                <source srcset="img/social/fb.svg" type="image/webp"><img class="footer__social-icon" src="img/social/fb.svg" alt="fb">
                            </picture>
                            Facebook
                        </a>
                    </li>
                    <li class="footer__link">
                        <a href="#">
                            <picture>
                                <source srcset="img/social/tg.svg" type="image/webp"><img class="footer__social-icon" src="img/social/tg.svg" alt="tg">
                            </picture>
                            Telegram
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php if ($_SESSION['user']) {
    include("addtrack.php");
    include("settings.php");
} ?>