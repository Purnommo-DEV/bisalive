@extends('Back.Layout.master', ['title' => 'Daftar Pengguna'])
@push('style')
    <style>
        .word-wrap {
            word-break: break-all;
        }
    </style>
@endpush
@section('konten')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Daftar Pengguna</h6>
                    <p class="text-sm mb-0">
                    <p>Berikut ini merupakan daftar pengguna</p>
                    </p>
                </div>
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active pilih-jenis" id="nav-influencer-tab" kategori-pengguna="Influencer" data-bs-toggle="tab" data-bs-target="#nav-influencer" type="button" role="tab" aria-controls="nav-influencer" aria-selected="true">Influencer</button>
                          <button class="nav-link pilih-jenis" id="nav-customer-tab" kategori-pengguna="Customer" data-bs-toggle="tab" data-bs-target="#nav-customer" type="button" role="tab" aria-controls="nav-customer" aria-selected="true">Customer</button>
                        </div>
                      </nav>
                    <table id="table-pengguna-influencer" class="table table-sm table-bordered" style="display: none">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th>Umur</th>
                                <th>Tipe</th>
                                <th>Lokasi Live</th>
                                <th>Bukti Bayar</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    <table id="table-pengguna-customer" class="table table-sm table-bordered" style="display: none">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    {{-- @include('Back.Keuangan.Kategori._form_tambah_pengguna')
                    @include('Back.Keuangan.Kategori._form_ubah_pengguna') --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>

        var asyncDataUrl;
        var jenis = "Influencer";
        getData(jenis);

        $(document).on('click', '.pilih-jenis', function(event) {
            var jenis = $(this).attr('kategori-pengguna');
            initialiseTable(jenis);
            getData(jenis);
        });

        function getData(jenis) {
            const getUrl = async () => {
                var url = await '{{route("admin.DataPendaftar", ["jenis"=>":jenis"])}}';
                url = url.replace(":jenis", jenis);
                const dataUrl = await url;
                asyncDataUrl = dataUrl;
                initialiseTable(jenis);
                return dataUrl;
            };
            getUrl();
        }

        function initialiseTable(jenis) {
            let daftar_data_pengguna = [];
            if(jenis == "Influencer"){
                $('#table-pengguna-influencer').show();
                $('#table-pengguna-customer').hide();
                const table_data_pengguna = $('#table-pengguna-influencer').DataTable({
                    "destroy": true,
                    "pageLength": 5,
                    "lengthMenu": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bInfo": false,
                    "bPaginate": false,
                    "processing": true,
                    "bServerSide": true,
                    // "responsive": true,
                    "searching": false,
                    ajax: {
                        url: asyncDataUrl,
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    },
                    columnDefs: [{
                            defaultContent: "-",
                            targets: '_all',
                            visible: true
                        },
                        {
                            "targets": 0,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                                return  meta.row + 1;
                            }
                        },
                        {
                            "targets": 1,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                            return row.nama;
                            }
                        },
                        {
                            "targets": 2,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                            return row.email;
                            }
                        },
                        {
                            "targets": 3,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                            return row.no_hp;
                            }
                        },
                        {
                            "targets": 4,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                            return row.umur;
                            }
                        },
                        {
                            "targets": 5,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                            return row.tipe_akun;
                            }
                        },
                        {
                            "targets": 6,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                            return row.lokasi_live;
                            }
                        },
                        {
                            "targets": 7,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                                if (row.path_bukti_bayar != null) {
                                    return `<a href="/storage/${row.path_bukti_bayar}" target="_blank"><img src="/storage/${row.path_bukti_bayar}" width="100"></a>`
                                }
                                else {
                                    return `<img src="/storage/banner/no_image.png" width="100">`
                                }
                            }
                        },
                        {
                            "targets": 8,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                                if (row.path_foto != null) {
                                    return `<a href="/storage/${row.path_foto}" target="_blank"><img src="/storage/${row.path_foto}" width="100"></a>`
                                }
                                else {
                                    return `<img src="/storage/banner/no_image.png" width="100">`
                                }
                            }
                        },
                        {
                            "targets": 9,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                                var status;
                                if(row.status_verifikasi == 0){
                                    status = `<button class="btn btn-sm btn-warning"><i class="fa fa-question"></i></button>`
                                }else if(row.status_verifikasi == 1){
                                    status = `<button class="btn btn-sm btn-info"><i class="fa fa-check"></i></button>`
                                }else if(row.status_verifikasi == 2){
                                    status = `<button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>`
                                }
                                return status;
                            }
                        },
                        {
                            "targets": 10,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                                daftar_data_pengguna[row.id] = row;
                                let tampilan;
                                if(row.status_verifikasi > 0){
                                    tampilan = `<button class="btn btn-sm btn-info btn-konfirmasi-pengguna" tipe="revisi" data-id="${row.id}">Revisi</button>`
                                }else{
                                    tampilan = `<button class="btn btn-sm btn-warning btn-konfirmasi-pengguna" tipe="verifikasi" data-id="${row.id}">Verifikasi</button>
                                                <button class="btn btn-sm btn-dark btn-konfirmasi-pengguna" tipe="batalkan" data-id="${row.id}">Batalkan</button>
                                                <button class="btn btn-sm btn-danger btn-konfirmasi-pengguna" tipe="hapus" data-id="${row.id}">Hapus</button>`
                                }
                                return tampilan;
                            }
                        }
                    ]
                });
            }
            else if(jenis == "Customer"){
                $('#table-pengguna-customer').show();
                $('#table-pengguna-influencer').hide();
                const table_data_pengguna = $('#table-pengguna-customer').DataTable({
                    "destroy": true,
                    "pageLength": 5,
                    "lengthMenu": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bInfo": false,
                    "bPaginate": false,
                    "processing": true,
                    "bServerSide": true,
                    // "responsive": true,
                    "searching": false,
                    ajax: {
                        url: asyncDataUrl,
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    },
                    columnDefs: [{
                            defaultContent: "-",
                            targets: '_all',
                            visible: true
                        },
                        {
                            "targets": 0,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                                return  meta.row + 1;
                            }
                        },
                        {
                            "targets": 1,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                            return row.nama;
                            }
                        },
                        {
                            "targets": 2,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                            return row.email;
                            }
                        },
                        {
                            "targets": 3,
                            "class": "text-wrap text-center",
                            "render": function(data, type, row, meta) {
                            return row.no_hp;
                            }
                        }
                    ]
                });
            }
        }

        $('.batal').on('click', function() {
            $(document).find('label.error-text').text('');
            $("#kategori_transaksi_id").val('');

            $("#text-tambah-pengguna").html(
                '<span id="text-tambah-pengguna" class="d-sm-block">Simpan</span>')
            $("#button-tambah-pengguna").prop('disabled', false);
        });

        $(document).on('click', '.btn-konfirmasi-pengguna', function(event) {
            var jenis = $(this).attr('tipe');
            const id = $(this).data('id');

            Swal.fire({
                title: '<small style="font-size:1rem;">Yakin ingin '+ jenis +' data ini?</small>',
                icon: 'warning',
                showDenyButton: true,
                width: '300px'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "/admin/konfirmasi-pengguna/" + id + "/" + jenis,
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
                                initialiseTable(jenis);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
