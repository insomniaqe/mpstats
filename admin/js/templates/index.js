const index = {template: `<div class="container"><div class="card shadow" style="margin-top: 250px;">
        <div class="card-body">
            <div style = "display: none" class="alert" id = 'alert'>

            </div>
            <p>Авторизация в админ панель</p>
            <input class="form-control" type="text" id = "login" placeholder="Введит логин"><br>
            <input class="form-control" type="password" id = "password" placeholder="Введит пароль"><br>
            <button class="btn btn-primary" style="width: 100%" onclick = "app.login($('#login').val(), $('#password').val())">Войти</button>
        </div>
    </div></div>`}