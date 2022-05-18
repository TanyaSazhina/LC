<div class="display-form">
    <a href="#header" class="display-form__link"></a>
    <div class="login-page">
        <div class="formpopup">
            <a href="#header" class="formpopup__logo">
                <picture>
                    <source srcset="img/logo-opacity.webp" type="image/webp"><img src="img/logo-opacity.png" palt="logo">
                </picture>
            </a>
            <div class="formpopup__header">
                <div class="formpopup__sing-link formpopup__active-link">
                    Войти
                </div>
                <div class="formpopup__reg-link">
                    Зарегестрироваться
                </div>
            </div>
            <form class="register-form" method="post">
                имя
                <input type="text" name="name" id="name" />
                email
                <input type="text" name="email" id="email" />
                пароль
                <input type="password" name="password" id="password" />
                подтвердите пароль
                <input type="password" name="passwordConfirm" id="passwordConfirm" />
                <input type="button" id="create" onclick="registerNewUser()" value="Создать">
            </form>
            <form class="login-form">
                почта
                <input id="login-email" name="email" type="text" />
                пароль
                <input id="login-password" name="password" type="password" />
                <input type="button" id="login" onclick="loginUser()" value="Войти">
            </form>
        </div>
    </div>
</div>