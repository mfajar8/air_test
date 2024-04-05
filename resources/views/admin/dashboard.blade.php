@extends('layout.master')

@section('content')
    <div class="layout-specing">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h5 class="mb-0">Dashboard</h5>
            </div>
        </div>

        <section id="chart">
            <div class="row">
                <div class="col-12">
                    <div class="card card-datatable table-responsive p-1">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Luwes Water Sensor</h5>
                            <canvas id="sensorChart" width="600" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section id="basic-datatables">
            <div class="row">
                <div class="col-12">
                    <div class="card card-datatable table-responsive p-1">
                        <div class="card-body">
                            <h5 class="card-title">Data Luwes Water Sensor</h5>
                            <table class="table table-striped table-bordered" id="table_luwesdata">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>ID</th>
                                        <th>IMEI</th>
                                        <th>Level Sensor</th>
                                        <th>Name</th>
                                        <th>REC</th>
                                        <th>Submitted At</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($luwesData as $data)
                                        <tr>
                                            <td>{{ $data->no }}</td>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->imei }}</td>
                                            <td>{{ $data->level_sensor }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->rec }}</td>
                                            <td>{{ $data->submitted_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Periksa apakah ada pesan sukses dalam sesi flash
                var successMessage = "{{ session('success') }}";
                if (successMessage) {
                    // Tampilkan Sweet Alert dengan pesan sukses
                    Swal.fire({
                        icon: 'success',
                        title: successMessage,
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
        </script>
    @endif

    <script>
        var ctx = document.getElementById('sensorChart').getContext('2d');
        var sensorChart = new Chart(ctx, {
            type: 'line', // Jenis grafik
            data: {
                labels: [], // Label sumbu x (mungkin waktu atau indeks)
                datasets: [{
                    label: 'Level Sensor', // Label untuk dataset
                    data: [], // Data level sensor
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna latar belakang batang
                    borderColor: 'rgba(54, 162, 235, 1)', // Warna garis batang
                    borderWidth: 1 // Lebar garis batang
                }]
            },
            options: {
                scales: {
                    y: {
                        min: 13, // Minimum value for y-axis
                        max: 14, // Maximum value for y-axis
                        ticks: {
                            stepSize: 0.1 // Setiap langkah di sumbu y adalah 0.1
                        }
                    }
                }
            }
        });

        // Mengambil data dari API
        $.ajax({
            url: '{{ route('api.luwes-chart') }}',
            type: 'GET',
            success: function(response) {
                var data = response.data;

                // Mendapatkan data level sensor
                var sensorData = data.map(function(item) {
                    return item.level_sensor;
                });

                // Memperbarui data grafik
                sensorChart.data.labels = Array.from(Array(sensorData.length)
                    .keys()); // Menghasilkan label indeks
                sensorChart.data.datasets[0].data = sensorData;

                // Menggambar grafik ulang
                sensorChart.update();
            }
        });

        var token = $('meta[name="csrf-token"]').attr('content');
        $('#table_luwesdata').DataTable({
            order: [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                headers: {
                    'X-CSRF-TOKEN': token
                },
                "url": '{{ route('api.luwes') }}',
                "type": 'POST',
                "data": function(data) {}
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
                    data: 'id',
                    className: "text-center",
                },
                {
                    data: 'imei',
                    className: "text-center",
                },
                {
                    data: 'level_sensor',
                    className: "text-center",
                },
                {
                    data: 'name',
                    className: "text-center",
                },
                {
                    data: 'rec',
                    className: "text-center",
                },
                {
                    data: 'submitted_at',
                    className: "text-center",
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
            searching: false,
        });
    </script>

    <!-- Tampilkan email pengguna -->
    {{-- @if (session('user_email'))
        <p>ID Pengguna: {{ session('user_id') }}</p>
        <p>Email Pengguna: {{ session('user_email') }}</p>
        <p>Nama Pengguna: {{ session('user_name') }}</p>
        <p>Role Pengguna: {{ session('user_role') }}</p>
    @endif --}}
@endsection
