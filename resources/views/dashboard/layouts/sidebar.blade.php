  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color: #0D6EFD;">
        <div class="position-sticky pt-3 sidebar-sticky">
          <div class="container">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link fs-6 {{ ($title === 'Dashboard') ? 'active' : '' }}" href="/dashboard">
                  <span class="align-text-bottom"></span>
                    Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 {{ ($title === 'Informasi') ? 'active' : '' }}" href="/dashboard/informasi">
                  <span class="align-text-bottom"></span>
                    Informasi Publik
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 {{ ($title === 'Berita') ? 'active' : '' }}" href="/dashboard/berita">
                  <span class="align-text-bottom"></span>
                    Berita
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 {{ ($title === 'Dokumen') ? 'active' : '' }}" href="/dashboard/dokumen">
                  <span class="align-text-bottom"></span>
                    Dokumen
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 {{ ($title === 'Profil') ? 'active' : '' }}" href="/dashboard/profil">
                  <span class="align-text-bottom"></span>
                    Profil
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 {{ ($title === 'Galeri') ? 'active' : '' }}" href="/dashboard/galeri">
                  <span class="align-text-bottom"></span>
                    Galeri
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 {{ ($title === 'KategoriInformasi') ? 'active' : '' }}" href="/dashboard/kategori-informasi">
                  <span class="align-text-bottom"></span>
                    Kategori Informasi
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 {{ ($title === 'KategoriBerita') ? 'active' : '' }}" href="/dashboard/kategori-berita">
                  <span class="align-text-bottom"></span>
                    Kategori Berita
                </a>
              </li>
            </ul>

            {{-- @can('admin') --}}
            <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span class="text-white">Administrator</span>
            </h5>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link fs-6 {{ ($title === 'Admin') ? 'active' : '' }}" href="/admin">
                  Staf Sekretariat
                </a>
              </li>
            </ul>
          {{-- @endcan --}}
          </div>
        </div>
      </nav>
    </div> 
  </div>