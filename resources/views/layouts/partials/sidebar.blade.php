<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @if(Auth::user()->type === 'admin')
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-admin" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Dosen</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-admin" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.store.dosen') }}" >
              <i class="bi bi-circle"></i><span>Tambah Dosen</span>
            </a>
          </li>
        </ul>
        <ul id="forms-admin" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.daftar.dosen') }}">
              <i class="bi bi-circle"></i><span>Daftar Dosen</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-mahasiswa" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Mahasiswa</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-mahasiswa" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.store.mahasiswa') }}" >
              <i class="bi bi-circle"></i><span>Tambah Mahasiswa</span>
            </a>
          </li>
        </ul>
        <ul id="forms-mahasiswa" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.daftar.mahasiswa')}}">
              <i class="bi bi-circle"></i><span>Daftar Mahasiswa</span>
            </a>
          </li>
        </ul>
        
        <ul id="forms-mahasiswa" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.daftar.nilai')}}">
              <i class="bi bi-circle"></i><span>Daftar Nilai</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-matakuliah" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Matakuliah</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-matakuliah" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.store.matkul')}}" >
              <i class="bi bi-circle"></i><span>Tambah Matakuliah</span>
            </a>
          </li>
        </ul>
        <ul id="forms-matakuliah" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.daftar.matkul')}}">
              <i class="bi bi-circle"></i><span>Daftar Matakuliah</span>
            </a>
          </li>
        </ul>
        <ul id="forms-matakuliah" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.daftar.matkul')}}">
              <i class="bi bi-circle"></i><span>Ver Daftar Matakuliah</span>
            </a>
          </li>
        </ul>
      </li>
      @elseif(Auth::user()->type === 'dosen')
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-matakuliah" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Matakuliah</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-matakuliah" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('dosen.store.matkul') }}" >
              <i class="bi bi-circle"></i><span>Tambah Matakuliah</span>
            </a>
          </li>
        </ul>
        <ul id="forms-matakuliah" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('dosen.daftar.matkul')}}">
              <i class="bi bi-circle"></i><span>Daftar Matakuliah</span>
            </a>
          </li>
        </ul>
      
      
    </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="{{ route('mahasiswa.nilai') }}">
          <i class="bi bi-journal-text"></i>
          <span>Nilai</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('mahasiswa.matakuliah') }}">
          <i class="bi bi-journal-text"></i>
          <span>Mata Kuliah</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('mahasiswa.krs') }}">
          <i class="bi bi-journal-text"></i>
          <span>KRS</span>
        </a>
      </li>
      @endif
    </ul>

  </aside>