@extends('page.layouts.main')

@section('title', 'Manajemen Mobil')

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
                    Data Manajemen Mobil
                </li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="ti ti-car"></i> Data Manajemen Mobil
                </h5>
            </div>
            <div class="card-body">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Pemilik</th>
                                <th>Email</th>
                                <th>Merek</th>
                                <th>Model</th>
                                <th class="text-center">Tarif</th>
                                <th class="text-center">Nomor Plat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mobil as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $item['users']['nama'] }}</td>
                                    <td>{{ $item['users']['email'] }}</td>
                                    <td>{{ $item['merek'] }}</td>
                                    <td>{{ $item['model'] }}</td>
                                    <td class="text-center">Rp. {{ number_format($item['tarif']) }}</td>
                                    <td class="text-center">{{ $item['nomor_plat'] }}</td>
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
