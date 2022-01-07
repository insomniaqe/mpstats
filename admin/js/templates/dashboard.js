const dashboard = {template : `
<div><nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Панель администратора</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Пользователи</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Настройки</span></a>
            </li>
        </ul>
    </div>
</nav>  
<div class="container" style="margin-top: 100px;" id = "div_push_users"></div>
</div>`};