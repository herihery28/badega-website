@extends('layouts.admin')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-0">
                <h1 class="mt-4">Detail Transaksi {{ $item->user->name }}</h1>
                <ol class="breadcrumb mb-4">
                </ol>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-shadow">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <td>{{ $item->id }}</td>
                            </tr>
                            <tr>
                                <th>Tour Package</th>
                                <td>{{ $item->tour_packages->title }}</td>
                            </tr>
                            <tr>
                                <th>Pembeli</th>
                                <td>{{ $item->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Total Transaksi</th>
                                <td>IDR{{ $item->transactions_total }}</td>
                            </tr>
                            <tr>
                                <th>Status Transaksi</th>
                                <td>{{ $item->transactions_status}}</td>
                            </tr>
                            <tr>
                                <th>Reservasi</th>
                            <td>
                                <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Date</th>
                                </tr>
                                @foreach ($item->details as $detail)
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    <td>{{ $detail->username }}</td>
                                    <td>{{ $detail->date }}</td>
                                </tr>
                                @endforeach
                                </table>
                            </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
