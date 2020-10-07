<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
      </li>
      <li class="nav-item" >
        <a class="nav-link {{ Request::is('employee/create') ? 'active' : '' }}" href="employee/create">Create</a>
      </li>
      <li class="nav-item" >
        <a class="nav-link {{ Request::is('/user/profile') ? 'active' : '' }}" href="/user/profile">Profile</a>
      </li>
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="/logout">Logout</a>
      </li>
    </ul>
  </div>
</nav>