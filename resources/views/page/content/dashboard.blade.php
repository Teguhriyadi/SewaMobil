@extends('page.layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    Home
                </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-xl-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="badge p-2 bg-label-info mb-2 rounded">
                            <i class="ti ti-user ti-md"></i>
                        </div>
                        <h5 class="card-title mb-1 pt-2">Total Data User</h5>
                        <p class="mb-2 mt-1">{{ $user }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="badge p-2 bg-label-info mb-2 rounded">
                            <i class="ti ti-car ti-md"></i>
                        </div>
                        <h5 class="card-title mb-1 pt-2">Total Data Manajemen Mobil</h5>
                        <p class="mb-2 mt-1">{{ $mobil }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="badge p-2 bg-label-info mb-2 rounded">
                            <i class="ti ti-users ti-md"></i>
                        </div>
                        <h5 class="card-title mb-1 pt-2">Total Data Administrator</h5>
                        <p class="mb-2 mt-1">{{ $admin }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
