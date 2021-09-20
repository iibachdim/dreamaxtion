<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('D') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Dreamaxtion') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#profil" aria-expanded="true">
                    <i class="tim-icons icon-single-02" ></i>
                    <span class="nav-link-text" >{{ __('Profile') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="profil">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('user.profile') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#jadwal" aria-expanded="true">
                    <i class="tim-icons icon-calendar-60" ></i>
                    <span class="nav-link-text" >{{ __('Jadwal') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="jadwal">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'jadwal') class="active " @endif>
                            <a href="{{ route('jadwal-siswa') }}">
                                <i class="tim-icons icon-calendar-60"></i>
                                <p>{{ __('List Jadwal') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'add_jadwal') class="active " @endif>
                            <a href="{{ route('tambah-jadwal-siswa') }}">
                                <i class="tim-icons icon-calendar-60"></i>
                                <p>{{ __('Tambah Jadwal') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'daftar_pengajuan') class="active " @endif>
                            <a href="{{ route('daftar-pengajuan-siswa') }}">
                                <i class="tim-icons icon-calendar-60"></i>
                                <p>{{ __('Pengajuan Jadwal') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
