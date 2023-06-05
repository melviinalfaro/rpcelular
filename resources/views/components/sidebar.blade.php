<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </span>

            <div class="text logo-text">
                <span class="name">Recursos QR</span>
            </div>
        </div>

        <i class="material-symbols-rounded sidebarBtn toggle" style="display: none;">menu</i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="{{ route('inicio') }}" class="{{ Request::is('inicio') ? 'active' : '' }}">
                        <i class="icon material-symbols-rounded">home</i>
                        <span class="text nav-text">Inicio</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('usuario') }}" class="{{ Request::is('usuario') ? 'active' : '' }}">
                        <i class="icon material-symbols-rounded">group</i>
                        <span class="text nav-text">Usuarios</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="medium-content">
            <li class="">
                <a href="#">
                    <i class="icon material-symbols-rounded">account_circle</i>
                    <span class="text nav-text">Mi perfil</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="icon material-symbols-rounded">settings</i>
                    <span class="text nav-text">Configuración</span>
                </a>
            </li>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="#">
                    <i class="icon material-symbols-rounded"> logout</i>
                    <span class="text nav-text">Cerrar sesión</span>
                </a>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <i class="icon material-symbols-rounded sun">light_mode</i>
                    <i class="icon material-symbols-rounded moon">dark_mode</i>
                </div>
                <span class="mode-text text">Oscuro</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>
    </div>
</nav>
