@extends('Auth.Layout_Auth.master_auth', ['title' => 'Register'])
@section('konten-auth')
    <div class="page-header align-items-start min-vh-100"
        style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto p-5">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form-register" class="text-start">

                                <div class="input-group input-group-outline">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama">

                                    <div class="input-group has-validation" style="margin-bottom: 10px; margin-top: 5px;">
                                        <label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"
                                            class="text-danger error-text nama_error"></label>
                                    </div>
                                </div>

                                <div class="input-group input-group-outline">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email">

                                    <div class="input-group has-validation" style="margin-bottom: 7px; margin-top: 5px;">
                                        <label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"
                                            class="text-danger error-text email_error"></label>
                                    </div>
                                </div>

                                <div class="input-group input-group-outline">
                                    <label class="form-label">Nomor HP/WA</label>
                                    <input type="number" class="form-control" name="no_hp">

                                    <div class="input-group has-validation" style="margin-top: 5px;">
                                        <label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"
                                            class="text-danger error-text no_hp_error"></label>
                                    </div>
                                </div>

                                <div class="input-group input-group-outline">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">

                                    <div class="input-group has-validation" style="margin-top: 5px;">
                                        <label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"
                                            class="text-danger error-text password_error"></label>
                                    </div>
                                </div>

                                <div class="input-group input-group-static mb-2">
                                    <select class="form-control" name="tipe_akun" id="tipe_akun">
                                        <option selected disabled value="">Pilih Tipe Akun</option>
                                        <option value="customer">Customer</option>
                                        <option value="influencer">Influencer</option>
                                    </select>

                                    <div class="input-group has-validation" style="margin-bottom: 10px; margin-top: 5px;">
                                        <label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"
                                            class="text-danger error-text tipe_akun_error"></label>
                                    </div>
                                </div>

                                <div id="tipe-influencer" style="display: none">
                                    <label class="form-label">Foto (Rekomendasi rasio 1:1 atau Portrait)</label>
                                    <div class="input-group input-group-outline">
                                        <input type="file" class="form-control" name="path_foto">
                                        <div class="input-group has-validation" style="margin-bottom: 10px; margin-top: 5px;">
                                            <label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"
                                                class="text-danger error-text path_foto_error"></label>
                                        </div>
                                    </div>

                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Umur</label>
                                        <input type="number" class="form-control" name="umur">

                                        <div class="input-group has-validation" style="margin-bottom: 10px; margin-top: 5px;">
                                            <label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"
                                                class="text-danger error-text umur_error"></label>
                                        </div>
                                    </div>

                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Lokasi Live</label>
                                        <input type="text" class="form-control" name="lokasi_live">
                                        <div class="input-group has-validation" style="margin-bottom: 10px; margin-top: 5px;">
                                            <label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"
                                                class="text-danger error-text lokasi_live_error"></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col" style="padding-right: 0;">
                                            <label>Media Sosial</label>
                                            <div class="input-group input-group-static mb-4" style="margin-top: -0.6rem">
                                                <select class="form-control" id="exampleFormControlSelect1" name="medsos[]">
                                                    <option selected disabled value=""></option>
                                                    <option value="instagram">Instagram</option>
                                                    <option value="facebook">Facebook</option>
                                                    <option value="tiktok">Tiktok</option>
                                                    <option value="youtube">Youtube</option>
                                                    <option value="twitter">Twitter</option>
                                                    <option value="linkedin">LinkedIn</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col" style="padding-right: 0;">
                                            <div class="input-group input-group-static">
                                                <label>Followers</label>
                                                <input type="text" class="form-control" name="pengikut[]">

                                                <div class="input-group has-validation"
                                                    style="margin-bottom: 10px; margin-top: 5px;">
                                                    <label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"
                                                        class="text-danger error-text pengikut_error"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <button class="btn btn-icon btn-sm btn-2 btn-info" id="add" type="button">
                                                <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                                            </button>
                                        </div>
                                    </div>

                                    <div id="dynamic_field"></div>

                                    <label class="form-label">Bukti Bayar</label>
                                    <div class="input-group input-group-outline">
                                        <input type="file" class="form-control" name="path_bukti_bayar">

                                        <div class="input-group has-validation" style="margin-bottom: 10px; margin-top: 5px;">
                                            <label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"
                                                class="text-danger error-text path_bukti_bayar_error"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-5">
                                    <button class="btn bg-gradient-primary w-100 my-4 mb-2" id="button-register">
                                        <i id="icon-button-register"></i>
                                        <span id="text-register" class="d-sm-block">
                                            Daftar</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>

        $(document).on('change', '#tipe_akun', function(){
            var tipe = $(this).val();
            if(tipe == 'influencer'){
                $('#tipe-influencer').show(700);
            }else if(tipe == 'customer'){
                $('#tipe-influencer').hide(700);
            }
        })

        var e = 0;
        $('#add').click(function() {
            ++e;
            $('#dynamic_field').append('<div class="row" id="row-' + e +
                '"><div class="col" style="padding-right: 0;"> <label>Media Sosial</label> <div class="input-group input-group-static mb-4" style="margin-top: -0.6rem"><select class="form-control" id="exampleFormControlSelect1" name="medsos[]"><option selected disabled value=""></option><option value="instagram">Instagram</option><option value="facebook">Facebook</option><option value="tiktok">Tiktok</option><option value="youtube">Youtube</option><option value="twitter">Twitter</option><option value="linkedIn">LinkedIn</option></select></div></div><div class="col" style="padding-right: 0;"><div class="input-group input-group-static"><label>Followers</label><input type="text" class="form-control" name="pengikut[]"><div class="input-group has-validation"style="margin-bottom: 10px; margin-top: 5px;"><label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"class="text-danger error-text pengikut_error"></label></div></div></div><div class="col-2 d-flex align-items-center"><button class="btn btn-icon btn-sm btn-2 btn-primary btn_remove" id="' +
                e +
                '" type="button"><span class="btn-inner--icon"><i class="fa fa-minus"></i></span></button></div></div>'
                );
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row-' + button_id + '').remove();
            --e;
        });

        $('#form-register').on('submit', function(e) {
            e.preventDefault();
            var $search = $("#icon-button-register")
            $("#icon-button-register").addClass("fa fa-spinner fa-spin")
            $("#text-register").html('')
            $("#button-register").prop('disabled', true);
            $.ajax({
                url: "{{ route('ProsesRegister') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: function() {
                    $(document).find('label.error-text').text('');
                },
                success: function(data) {
                    if (data.status_form_kosong == 1) {
                        $.each(data.error, function(prefix, val) {
                            $('label.' + prefix + '_error').text(val[
                                0]);
                            // $('span.'+prefix+'_error').text(val[0]);
                        });
                        $search.removeClass("fa fa-spinner fa-spin")
                        $("#text-register").html(
                            '<span id="text-register" class="d-sm-block">Login</span>'
                        )
                        $("#button-register").prop('disabled', false);
                    } else if (data.status_berhasil == 1) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter',
                                    Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave',
                                    Swal
                                    .resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.msg
                        })
                        window.location.href = `${data.route}`;
                        $search.removeClass("fa fa-spinner fa-spin")
                        $("#text-register").html(
                            '<span id="text-register" class="d-sm-block">Login</span>'
                        )
                        $("#button-register").prop('disabled', false);
                    }
                }
            });
        });
    </script>
@endpush
