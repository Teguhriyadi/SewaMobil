@extends('page.layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ url('datatables/css/bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('page/home') }}">
                        Home
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    Data Administrator
                </li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <button onclick="aksi('tambah', 0)" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    <i class="fa fa-plus" style="margin-right: 5px"></i> Tambah Data
                </button>
            </div>
            <div class="card-body">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th class="text-center">Nomor Telepon</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($administrator as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['alamat'] }}</td>
                                    <td class="text-center">{{ $item['nomor_telepon'] }}</td>
                                    <td class="text-center"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ url('datatables/javascript/datatables.min.js') }}"></script>
    <script src="{{ url('datatables/javascript/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        new DataTable('#example');
    </script>
@endsection
