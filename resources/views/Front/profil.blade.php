@extends('Front.Layout.master', ['title' => 'Profil Influencer'])

@section('konten')
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Profil</h5>
                <h1 class="mb-0">Contact For Any Query</h1>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-12">
                    <form id="form-edit-profil" enctype="multipart/form-data">
                        <div class="d-flex justify-content-start mb-2" style="max-width: 900px;">
                            <h2 class="mb-0">Biodata</h2>
                        </div>
                        <div class="row g-3 mb-5">
                            <div class="col-md-2">
                                <div class="form-floating">
                                    @if($profil->path_foto != null)
                                        <img src="{{ asset('storage/' . $profil->path_foto) }}" class="img-fluid" style="border-radius:1rem;">
                                    @else
                                        <img src="{{ asset('All/assets/img/no_image.png') }}" class="img-fluid" style="border-radius:1rem;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="nama"
                                                id="name" value="{{ $profil->nama }}" placeholder="Your Name">
                                            <label for="name">Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0" name="email"
                                                id="email" value="{{ $profil->email }}" placeholder="Your Email">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="no_hp"
                                                id="no_hp" value="{{ $profil->no_hp }}" placeholder="Your Nomor Hp">
                                            <label for="no_hp">Nomor Hp</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="umur"
                                                id="umur" value="{{ $profil->umur }}" placeholder="Your Umur">
                                            <label for="umur">Umur</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="lokasi_live" class="form-control border-0"
                                                id="lokasi_live" value="{{ $profil->lokasi_live }}"
                                                placeholder="Your Email">
                                            <label for="lokasi_live">Lokasi Live</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="file" name="path_foto" class="form-control border-0"
                                                id="path_foto" value="{{ $profil->lokasi_live }}"
                                                placeholder="Your Email">
                                            <label for="lokasi_live">Foto</label>
                                            <div class="input-group has-validation" style="margin-bottom: 10px; margin-top: 5px;">
                                                <label style="margin-top: 0.2rem; font-size: 0.8rem; font-weight: 600;"
                                                    class="text-danger error-text pathfoto_error"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mb-2" style="max-width: 900px;">
                            <h2 class="mb-0">Media Sosial</h2>
                        </div>
                        <div class="col-md-12">
                        @foreach ($profil->relasi_medsos as $medsos)
                            <input type="hidden" name="medsos_old_id[]" value="{{ $medsos->id }}" hidden>
                            <div class="row mb-3">
                                <div class="col-7" style="padding-right:0% !important">
                                    <div class="form-floating">
                                        <select class="form-select" id="pilih-medsos" name="medsos[]">
                                            <option selected disabled value=""></option>
                                            <option value="instagram"
                                                @if ($medsos->medsos == 'instagram') @selected(true) @endif>
                                                Instagram</option>
                                            <option value="facebook"
                                                @if ($medsos->medsos == 'facebook') @selected(true) @endif>
                                                Facebook</option>
                                            <option value="tiktok"
                                                @if ($medsos->medsos == 'tiktok') @selected(true) @endif>
                                                Tiktok</option>
                                            <option value="youtube"
                                                @if ($medsos->medsos == 'youtube') @selected(true) @endif>
                                                Youtube</option>
                                            <option value="twitter"
                                                @if ($medsos->medsos == 'twitter') @selected(true) @endif>
                                                Twitter</option>
                                            <option value="linkedin"
                                                @if ($medsos->medsos == 'linkedin') @selected(true) @endif>
                                                LinkedIn</option>
                                        </select>
                                        <label for="pilih-medsos">Media Sosial</label>
                                    </div>
                                </div>
                                <div class="col-3" style="padding-right:0% !important">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="pengikut" name="pengikut[]"
                                            value="{{ $medsos->pengikut }}" placeholder="Your Email">
                                        <label for="pengikut">Pengikut</label>
                                    </div>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <button class="btn btn-icon btn-sm btn-2 btn-danger btn_remove_medsos" data-id="{{ $medsos->id }}" type="button">
                                        <span class="btn-inner--icon"><i class="fa fa-minus"></i></span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                        <div id="dynamic_medsos"></div>

                        <style>
                            .btn-info:hover{
                                color: #fff;
                            }
                        </style>
                        <div class="col-md-12 d-flex justify-content-center pb-4">
                            <button class="btn btn-icon btn-sm btn-2 btn-info btn-add-medsos" type="button">
                                <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                            </button>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        var e = -1;
        $('.btn-add-medsos').click(function() {
            ++e;
            $('#dynamic_medsos').append('<div class="row mb-3" id="row-' + e +
                '"><div class="col-7" style="padding-right:0% !important"><div class="form-floating"><select class="form-select" id="pilih-medsos" name="medsos_edit[]"><option selected disabled value="">-- Pilih --</option><option value="instagram">Instagram</option><option value="facebook">Facebook</option><option value="tiktok">Tiktok</option><option value="youtube">Youtube</option><option value="twitter">Twitter</option><option value="linkedin">LinkedIn</option></select><label for="pilih-medsos">Media Sosial</label></div><div class="input-group has-validation"><label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;" class="text-danger error-text medsosedit' +
                e +
                '_error"></label></div></div><div class="col-3" style="padding-right:0% !important"><div class="form-floating"><input type="text" class="form-control border-0" id="pengikut" name="pengikut_edit[]" placeholder="Your Email"><label for="pengikut">Pengikut</label><div class="input-group has-validation"><label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;" class="text-danger error-text pengikutedit' +
                e +
                '_error"></label></div></div></div><div class="col-1 d-flex align-items-center"><button class="btn btn-icon btn-sm btn-2 btn-danger btn_remove" id="' +
                e +
                '" type="button"> <span class="btn-inner--icon"><i class="fa fa-minus"></i></span></button></div></div>'
                );
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row-' + button_id).remove();
            --e;
        });

        $(document).on('click', '.btn_remove_medsos', function(event) {
            const id = $(this).data('id');
            Swal.fire({
                title: '<small style="font-size:1rem;">Yakin ingin menghapus data ini?</small>',
                icon: 'question',
                showDenyButton: true,
                width: '300px'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "/influencer/proses-hapus-medsos/" + id,
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_berhasil == 1) {
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
                                var jenis = "Influencer";
                                location.reload();
                            }
                        }
                    });
                }
            });
        });

        $('#form-edit-profil').on('submit', function(e) {
            e.preventDefault();
            var $search = $("#icon-action-button")
            $("#icon-action-button").addClass("fa fa-spinner fa-spin")
            $("#text-submit-port").html('')
            $("#action-button").prop('disabled', true);

            $.ajax({
                url: "/influencer/proses-edit-profil",
                method: "POST",
                data: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                dataType: 'json',
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $(document).find('label.error-text').text('');
                },
                success: function(data) {
                    if (data.status_form_kosong == 1) {
                        $.each(data.error, function(prefix, val) {
                            var str = prefix.replace(/[_\W]+/g, "");
                            $("label." + str + '_error').text(val[0]);
                        });

                        $search.removeClass("fa fa-spinner fa-spin")
                        $("#text-submit-port").html(
                            '<span id="text-submit-port" class="d-sm-block">Submit</span>'
                        )
                        $("#action-button").prop('disabled', false);
                    } else if (data.status_berhasil == 1) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: data.msg
                        })
                        location.reload();
                    }
                },
            });
        });
    </script>
@endpush
