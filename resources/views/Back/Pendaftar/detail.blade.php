<div class="modal fade text-left" id="modal-tambah-banner" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Form Banner</h4>
                <button type="button" class="btn-close text-dark batal" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-tambah-banner" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="input-group input-group-static mb-4">
                        <label>Teks 1</label>
                        <input name="teks1" class="form-control" type="text"
                            placeholder="Masukkan Teks 1">
                        <div class="input-group has-validation">
                            <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                class="text-danger error-text teks1_error">
                            </label>
                        </div>
                    </div>
                     <div class="input-group input-group-static mb-4">
                        <label>Teks 2</label>
                        <input name="teks2" class="form-control" type="text"
                            placeholder="Masukkan Teks 2">
                        <div class="input-group has-validation">
                            <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                class="text-danger error-text teks2_error">
                            </label>
                        </div>
                    </div>
                     <div class="input-group input-group-static mb-4">
                        <label>Gambar</label>
                        <input name="path" class="form-control" type="file">
                        <div class="input-group has-validation">
                            <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                class="text-danger error-text path_error">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary batal" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm" id="button-tambah-banner">
                        <i id="icon-button-tambah-banner"></i>
                        <span id="text-tambah-banner" class="d-sm-block">
                            Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        $('.tambah-banner').on('click', function() {
            $("#modal-tambah-banner").modal('show')
        });

        $('#form-tambah-banner').on('submit', function(e) {
            e.preventDefault();
            var $search = $("#icon-button-tambah-banner")
            $("#icon-button-tambah-banner").addClass("fa fa-spinner fa-spin")
            $("#text-tambah-banner").html('')
            $("#button-tambah-banner").prop('disabled', true);
            $.ajax({
                url: "{{ route('admin.ProsesTambahBanner') }}",
                method: "POST",
                data: new FormData(this),
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
                            $('label.' + prefix + '_error').text(val[0]);
                            // $('span.'+prefix+'_error').text(val[0]);
                        });
                        $search.removeClass("fa fa-spinner fa-spin")
                        $("#text-tambah-banner").html(
                            '<span id="text-tambah-banner" class="d-sm-block">Simpan</span>'
                        )
                        $("#button-tambah-banner").prop('disabled', false);
                    } else if (data.status_berhasil == 1) {
                        $("#form-tambah-banner").trigger('reset');
                        $("#modal-tambah-banner").modal('hide')
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
                        $search.removeClass("fa fa-spinner fa-spin")
                        $("#text-tambah-banner").html(
                            '<span id="text-tambah-banner" class="d-sm-block">Simpan</span>'
                        )
                        $("#button-tambah-banner").prop('disabled', false);
                        $(document).find('label.error-text').text('');
                        table_data_banner.draw();
                    }
                },
            });
        });
    </script>
@endpush
