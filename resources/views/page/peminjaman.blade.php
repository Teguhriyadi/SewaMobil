@extends('page.theme.main')

@section('title', 'Peminjaman')

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
            Peminjaman Mobil
        </li>
    </ol>
</nav>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            <i class="ti ti-book" style="margin-right: 5px"></i> Data Peminjam
        </h5>
    </div>
    <div class="card-datatable table-responsive pt-0">
        <table class="table table-bordered" id="example">
            <thead>
                <tr>
                    <td class="text-center">No</td>
                    <th class="text-center">Nomor Plat</th>
                    <th>Mobil</th>
                    <th class="text-center">Tanggal Pinjam</th>
                    <th class="text-center">Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}.</td>
                    <td class="text-center">{{ $item['mobil']['nomor_plat'] }}</td>
                    <td>{{ $item['mobil']['merek'] }} - {{ $item['mobil']['model'] }}</td>
                    <td class="text-center">{{ $item['tanggal_mulai'] }}</td>
                    <td class="text-center">{{ $item['tanggal_selesai'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
