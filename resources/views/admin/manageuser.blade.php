@extends('layout.master')

@section('content')
    <div class="layout-specing">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h5 class="mb-0">Kelola User</h5>
            </div>
        </div>

        <section id="basic-datatables">
            <div class="row">
                <div class="col-12">
                    <div class="card card-datatable table-responsive p-1">
                        <div class="card-body">
                            <h5 class="card-title">Data User</h5>
                            <table class="table table-striped table-bordered" id="table_user">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Nama</th>
                                        <th>E-mail</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Fungsi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Ubah Pengguna -->
    <div class="modal fade" id="changeUserModal" tabindex="-1" aria-labelledby="changeUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeUserModalLabel">Ubah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formChangeUser">
                        <input type="hidden" id="user_id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role">
                                <option value="1">Superadmin</option>
                                <option value="2">Admin</option>
                                <option value="3">User</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Posisi</label>
                            <input type="text" class="form-control" id="position">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="btnSimpanPerubahan">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Ubah Pengguna -->

    <script>
        var token = $('meta[name="csrf-token"]').attr('content');
        $('#table_user').DataTable({
            order: [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                headers: {
                    'X-CSRF-TOKEN': token
                },
                "url": '{{ route('api.listuser') }}',
                "type": 'POST',
                "data": function(data) {
                    // Anda bisa menambahkan data tambahan yang ingin dikirimkan ke server di sini
                    // Contoh: data.example = 'value';
                }
            },
            "columns": [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    className: "text-center",
                    orderable: false
                },
                {
                    data: 'name',
                    className: "text-center",
                },
                {
                    data: 'email',
                    className: "text-center",
                },
                {
                    data: 'position',
                    className: "text-center",
                },
                {
                    data: null,
                    className: "text-center",
                    render: function(data, type, row) {
                        var button = '';
                        var checked = row.status === 1 ? 'checked' : '';
                        button +=
                            '<div class="form-check form-switch d-flex justify-content-center align-items-center">';
                        button += '<input data-id="' + row.id +
                            '" class="form-check-input" type="checkbox" role="switch" id="changeStatus" ' +
                            checked;
                        button += ' style="background-color: ' + (row.status === 1 ? 'green' : 'grey') +
                            ';">';
                        button += '</div>';
                        return button;
                    },
                    createdCell: function(cell, cellData, rowData, rowIndex, colIndex) {
                        var checkbox = cell.querySelector('input[type="checkbox"]');

                        checkbox.addEventListener('change', function() {
                            if (this.checked) {
                                checkbox.style.backgroundColor = 'green';
                            } else {
                                checkbox.style.backgroundColor = 'grey';
                            }
                        });
                    }
                },
                {
                    data: null,
                    className: "text-center",
                    render: function(data, type, row) {
                        var editButton = '<span type="button" class="badge bg-warning m-1">' +
                            '<a data-bs-toggle="modal" data-bs-target="#changeUserModal"' +
                            ' data-id="' + row.id +
                            '" data-name="' + row.name +
                            '" data-email="' + row.email +
                            '" data-role="' + row.role +
                            '" data-position="' + row.position + '">' +
                            '<i class="fas fa-edit"></i> Ubah</a>' +
                            '</span><br>';

                        return editButton;
                    }
                },
            ],
            "lengthMenu": [10, 25, 50, 100],
            "pageLength": 10,
            "pagingType": "full_numbers",
            "language": {
                "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                "zeroRecords": "<div style='text-align: center;'><img src='/assets/images/pencaritable.png' class='img-fluid' style='max-width: 40%; display: inline-block; margin: 0 auto;'><p> <b> Belum Ada Data </b></p></div>",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "",
                "infoFiltered": "(filter dari total _MAX_ data)",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            },
        });

        $(document).on('change', '#changeStatus', function() {
            var var_id = $(this).data('id');
            var checked = $(this).is(':checked');
            var status = checked ? '1' : '0';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route('api.changeuserstatus') }}',
                method: 'POST',
                data: {
                    id: var_id,
                    status: status
                },
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        icon: response.status,
                        title: response.title,
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                statusCode: {
                    403: function(response) {
                        var errorMessage = response.responseJSON.message;
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: errorMessage
                        }).then(function() {
                            // Refresh datatable setelah menampilkan SweetAlert
                            $('#table_user').DataTable().ajax.reload();
                        });
                    },
                    422: function(response) {
                        var errors = response.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '<br>';
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: errorMessage
                        });
                    },
                    500: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan server. Silakan coba lagi nanti.'
                        });
                    }
                }
            });
        });

        $(document).on('click', '[data-bs-target="#changeUserModal"]', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var role = $(this).data('role');
            var position = $(this).data('position');

            $('#user_id').val(id);
            $('#name').val(name);
            $('#email').val(email);
            $('#role').val(role);
            $('#position').val(position);

            // Tampilkan modal
            $('#changeUserModal').modal('show');
        });

        // Tambahkan event listener untuk tombol "Simpan Perubahan" di dalam modal
        $('#changeUserModal').on('click', '#btnSimpanPerubahan', function() {
            Swal.fire({
                icon: 'success',
                title: 'HEHE',
                text: 'Maaf, fitur belum tersedia'
            });
        });
    </script>
@endsection
