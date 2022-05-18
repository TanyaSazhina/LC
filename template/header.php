<header class="header">
    <div class="header__container container">
        <form class="header__search" method="GET" action="/catalog.php">
            <label for="search">
                <picture>
                    <source srcset="img/icons/search.svg" type="image/webp"><img class="header__search-icon search__icon" src="img/icons/search.svg" alt="search">
                </picture>
            </label>
            <input class="header__search-input" type="text" placeholder="ПОИСК" id="search" name="search">
            <button class="header__search-btn" type="submit">
                Поиск
            </button>
        </form>
        <div class="header__logo">
            <a href="index.php">
                <picture>
                    <source srcset="img/logo.svg" type="image/webp"><img class="header__logo-desktop logo-desktop" src="img/logo.svg" alt="logo">
                </picture>
                <picture>
                    <source srcset="img/logo-mobile.svg" type="image/webp"><img class="header__logo-mobile logo-mobile" src="img/logo-mobile.svg" alt="logo">
                </picture>
            </a>
        </div>
        <div class="header__menu-top">
            <?php if ($_SESSION['user']) { ?>
                <a href="profile.php?id=<?= $_SESSION["user"]["id"] ?>" class="header__link-item">
                    <img src="img/header/user.svg" alt="user">
                </a>
                <a href="components/out.php" class="header__link-item">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.25 16.5H3.75C3.15326 16.5 2.58097 16.2629 2.15901 15.841C1.73705 15.419 1.5 14.8467 1.5 14.25V3.75C1.5 3.15326 1.73705 2.58097 2.15901 2.15901C2.58097 1.73705 3.15326 1.5 3.75 1.5H5.25C5.44891 1.5 5.63968 1.42098 5.78033 1.28033C5.92098 1.13968 6 0.948912 6 0.75C6 0.551088 5.92098 0.360322 5.78033 0.21967C5.63968 0.0790176 5.44891 0 5.25 0L3.75 0C2.7558 0.00119089 1.80267 0.396661 1.09966 1.09966C0.396661 1.80267 0.00119089 2.7558 0 3.75L0 14.25C0.00119089 15.2442 0.396661 16.1973 1.09966 16.9003C1.80267 17.6033 2.7558 17.9988 3.75 18H5.25C5.44891 18 5.63968 17.921 5.78033 17.7803C5.92098 17.6397 6 17.4489 6 17.25C6 17.0511 5.92098 16.8603 5.78033 16.7197C5.63968 16.579 5.44891 16.5 5.25 16.5Z" fill="#F7F7F7" />
                        <path d="M13.9035 14.0308L17.3438 10.5913C17.7643 10.1687 18.0004 9.59674 18.0004 9.00055C18.0004 8.40435 17.7643 7.83242 17.3438 7.4098L13.9035 3.9703C13.762 3.83368 13.5726 3.75809 13.3759 3.75979C13.1793 3.7615 12.9912 3.84038 12.8521 3.97944C12.7131 4.11849 12.6342 4.3066 12.6325 4.50325C12.6308 4.6999 12.7064 4.88935 12.843 5.0308L16.062 8.25055H4.5C4.30109 8.25055 4.11032 8.32957 3.96967 8.47022C3.82902 8.61087 3.75 8.80164 3.75 9.00055C3.75 9.19946 3.82902 9.39023 3.96967 9.53088C4.11032 9.67153 4.30109 9.75055 4.5 9.75055H16.0627L12.843 12.9703C12.7714 13.0395 12.7142 13.1222 12.6749 13.2137C12.6356 13.3052 12.6149 13.4037 12.6141 13.5032C12.6132 13.6028 12.6322 13.7016 12.6699 13.7938C12.7076 13.8859 12.7633 13.9697 12.8337 14.0401C12.9041 14.1105 12.9879 14.1662 13.08 14.2039C13.1722 14.2416 13.271 14.2606 13.3706 14.2597C13.4701 14.2589 13.5686 14.2382 13.6601 14.1989C13.7516 14.1596 13.8343 14.1024 13.9035 14.0308Z" fill="#F7F7F7" />
                    </svg>
                </a>
            <? } else { ?>
                <a href="#" class="header__link-item log">
                    <picture>
                        <source srcset="img/header/user.svg" type="image/webp"><img src="img/header/user.svg" alt="user">
                    </picture>
                </a>
            <? } ?>
            <a href="catalog.php?favorites=1" class="header__link-item">
                <svg class="favorite" width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28.6201 3.6423C27.0671 1.93842 24.9362 1 22.6195 1C20.8878 1 19.3018 1.55384 17.9057 2.646C17.2012 3.19729 16.5628 3.87175 16 4.65898C15.4374 3.87199 14.7988 3.19729 14.0941 2.646C12.6982 1.55384 11.1122 1 9.38051 1C7.06377 1 4.93265 1.93842 3.37968 3.6423C1.84526 5.32627 1 7.62682 1 10.1205C1 12.6871 1.94551 15.0365 3.97546 17.5144C5.79141 19.7309 8.40135 21.981 11.4237 24.5864C12.4558 25.4762 13.6256 26.4848 14.8403 27.5592C15.1611 27.8435 15.5729 28 16 28C16.4269 28 16.8389 27.8435 17.1593 27.5596C18.374 26.4851 19.5445 25.476 20.5769 24.5858C23.5989 21.9807 26.2088 19.7309 28.0248 17.5141C30.0547 15.0365 31 12.6871 31 10.1202C31 7.62682 30.1547 5.32627 28.6201 3.6423Z" fill="none" stroke="#F7F7F7" stroke-width="2" />
                </svg>
            </a>
            <!--<a href="cart.php" class="header__link-item">
                <picture><source srcset="img/header/cart.svg" type="image/webp"><img src="img/header/cart.svg" alt="cart"></picture>
            </a>-->
        </div>
        <nav class="header__menu">
            <ul class="header__menu-list">
                <li class="header__menu-link">
                    <a href="index.php">
                        Главная
                    </a>
                </li>
                <li class="header__menu-link">
                    <a href="catalog.php">
                        Треки
                    </a>
                </li>
                <!--<li class="header__menu-link">
                    <a href="studio.php">
                        studio
                    </a>
                </li>-->
            </ul>
        </nav>
    </div>
</header>