<!-- navbar start -->
<nav class="px-3 py-2 bg-white shadow">
    <i class="fa-solid fa-bars sidebar-toggle me-3 d-block d-md-none"></i>
    <h4 class="fw-bold mb-0 me-auto">{{ $title }}</h4>
    <div class="dropdown">
      <div
        class="d-flex align-items-center cursor-pointer dropdown-toggle"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
      <span class="me-2 d-none d-sm-block">{{ auth()->user()->name }}</span>
        <img
          class="navbar-profile-image"
          src="{{ asset('storage/'.auth()->user()->picture) }}"
          alt="Admin"
        />
      </div>
      <ul class="dropdown-menu">
        <li class="mb-2">
            <a href="/dashboard/profile/edit" class="dropdown-item">
              <i class="fa-solid fa-user me-1"></i> Edit Profil 
            </a>
        </li>
        <li>
            <a href="{{ route('password.edit', ['id' => auth()->user()->id]) }}" class="dropdown-item">
              <i class="fa-solid fa-key me-1"></i> Edit Password 
            </a>
        </li>
        <hr>
        <li>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item">
              <i class="fa-solid fa-right-from-bracket me-1"></i> Keluar 
            </button>
          </form>
        </li>
      </ul>
    </div>
  </nav>
  <!-- navbar end -->