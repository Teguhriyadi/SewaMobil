@extends('page.theme.main')

@section('title', 'Manajemen Mobil')

@section('css')

    <link rel="stylesheet" href="{{ url('datatables/css/bootstrap.min.css') }}">

@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">
                    Home
                </a>
            </li>
            <li class="breadcrumb-item active">
                Manajemen Mobil
            </li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <button onclick="aksi('tambah', 0)" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                <i class="fa fa-plus" style="margin-right: 5px"></i> Tambah Data
            </button>
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table class="table table-bordered" id="example">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Merek</th>
                        <th class="text-center">Model</th>
                        <th class="text-center">Nomor Plat</th>
                        <th class="text-center">Tarif</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobil as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}.</td>
                        <td class="text-center">{{ $item->merek }}</td>
                        <td class="text-center">{{ $item->model }}</td>
                        <td class="text-center">{{ $item->nomor_plat }}</td>
                        <td class="text-center">Rp. {{ number_format($item->tarif) }}</td>
                        <td class="text-center">
                            <button onclick="aksi('edit', '{{ $item['id_manajemen'] }}')" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#basicModal">
                                <i class="fa fa-edit fs-7" style="margin-right: 5px"></i> Edit
                            </button>
                            <form action="{{ url('manajemen-mobil/' . $item['id_manajemen']) }}" method="POST" style="display: inline">
                                @csrf
                                @method("DELETE")
                                <button onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash fs-7" style="margin-right: 5px"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal-content"></div>
            </div>
        </div>
    </div>
    <!-- End -->

@endsection

@section('javascript')

    <script src="{{ url('datatables/javascript/datatables.min.js') }}"></script>
    <script src="{{ url('datatables/javascript/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        new DataTable('#example');

        function aksi(action, id) {
            let url

            if (action == "tambah") {
                $("#modalTitle").html("Tambah Data")
                url = "{{ url('manajemen-mobil/create') }}"
            } else if (action == "edit") {
                $("#modalTitle").html("Edit Data")
                url = "{{ url('manajemen-mobil') }}" + "/" + id + "/edit"
            }

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    $("#modal-content").html(response)
                },
                error: function(xhr, response) {
                    console.error(xhr.response);
                }
            })
        }
    </script>

@endsection
