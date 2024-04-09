<div class="container-fluid bg-primary px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                @auth
                    @if(Auth::user()->tipe_akun == "admin")
                        <a href="#"><small class="me-3 text-light"><i class="fa fa-gear me-2"></i>Dashboard</small></a>
                    @elseif(Auth::user()->tipe_akun == "influencer")
                        <a href="{{ route('influencer.HalamanProfil') }}"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Profil Saya</small></a>
                        <a href="{{ route('ProsesLogout') }}"><small class="me-3 text-light"><i class="fa fa-power-off me-2"></i>Keluar</small></a>
                    @else
                        <a href="{{ route('ProsesLogout') }}"><small class="me-3 text-light"><i class="fa fa-power-off me-2"></i>Keluar</small></a>
                    @endif
                @else
                <a href="{{ route('HalamanRegister') }}"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                <a href="{{ route('HalamanLogin') }}"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                @endauth
                {{-- <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i> My Dashboard</small></a>
                    <div class="dropdown-menu rounded">
                        <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
