<!-- APP ASIDE ==========-->
<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <?php
            $userPhoto = \Auth::user()->photo;
            $imgSrc = !empty($userPhoto) ? 'images/users/'.$userPhoto : 'assets/images/icon-user.png'; 
          ?>
          <a href="{{ URL('/profilku') }}"><img class="img-responsive" src="{{ asset($imgSrc) }}" alt="avatar"/></a>
        </div>
      </div>
      <div class="media-body">
        <div class="foldable">
          <h5>
            <a href="{{ URL('/profilku') }}" class="username">
              {{ \Auth::user()->name }}
              <small>{{ substr(\Auth::user()->email, 0, 25) }}</small>
            </a>
          </h5>
        </div>
      </div>
    </div>
  </div>

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">
        <li class="has-submenu">
          <a href="{{ URL('/') }}">
            <i class="menu-icon zmdi zmdi-home zmdi-hc-lg"></i>
            <span class="menu-text">Beranda</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="{{ URL('/hafalan') }}">
            <i class="menu-icon zmdi zmdi-book zmdi-hc-lg"></i>
            <span class="menu-text">Hafalan</span>
          </a>
        </li>

        <li class="menu-separator"><hr></li>

        <li class="has-submenu">
          <a href="{{ URL('/profilku') }}">
            <i class="menu-icon zmdi zmdi-account-box zmdi-hc-lg"></i>
            <span class="menu-text">Profilku</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="{{ URL('/ganti-password') }}">
            <i class="menu-icon zmdi zmdi-shield-security zmdi-hc-lg"></i>
            <span class="menu-text">Ganti Password</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="{{ URL('/keluar') }}">
            <i class="menu-icon zmdi zmdi-info zmdi-hc-lg"></i>
            <span class="menu-text">Keluar</span>
          </a>
        </li>

      </ul>
    </div>
  </div>
</aside>
<!--========== END app aside -->
