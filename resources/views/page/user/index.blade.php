@extends('page.layouts.main')

@section('title', "User")

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
                    Data User
                </li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fa fa-user fs-7" style="margin-right: 5px"></i> Data User
                </h5>
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
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['alamat'] }}</td>
                                    <td class="text-center">{{ $item['nomor_telepon'] }}</td>
                                    <td class="text-center">
                                        @if ($item['status'] == "1")
                                            <form action="{{ url('page/user/' . $item['id'] . '/non-aktifkan') }}" method="POST">
                                                @csrf
                                                @method("PUT")
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-times fs-7" style="margin-right: 5px"></i> Non - Aktifkan
                                                </button>
                                            </form>
                                        @elseif($item['status'] == "0")
                                        <form action="{{ url('page/user/' . $item['id'] . '/aktifkan') }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fa fa-check fs-7" style="margin-right: 5px"></i> Aktifkan
                                            </button>
                                        </form>
                                        @endif
                                    </td>
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
