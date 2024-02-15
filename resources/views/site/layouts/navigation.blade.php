<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link @if (request()->routeIs(['home',''])) active @endif" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('categories*')) active @endif" href="{{ route('categories') }}">Categorias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('listings*')) active @endif" href="{{ route('listings') }}">Listagens</a>
              </li>
              <li class="nav-item text-center ">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 d-flex">
                <li class="nav-item dropdown">
                    <a class="text-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{  route('profile.edit') }}">Editar Perfil</a></li>
                        <li>
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        </li>
                    </ul>
                </li>
            </ul>
          </div>
        </div>
      </nav>
</div>