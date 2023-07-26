 @extends('layouts.admin')


@section('content')
     
 <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Laporan Keuangan</h1>
                    </div>
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h5 class="h5 mb-0 text-gray-800">Periode Tanggal</h5>
                    </div>
                    <form>
                        <input type="date" id="start_date" name="start_date" required>
                        <input type="date" id="end_date" name="end_date" required>
                        <button type="submit" class="btn btn-primary">Show</button>
                <div>
                    <label for="entries">Show entries:</label>
                    <select id="entries" onchange="changeEntries()">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                    </form>
                 <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Reservations ID</th>
                                <th>Members</th>
                                <th>Date</th>
                                <th>Total Bayar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                <td>{{ $loop->iteration }}</td> 
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->user->username }}</td>
                                <td>{{ optional($transaction->transaction_details)->date }}</td>
                                <td>IDR. {{ $transaction->transactions_total }}</td>
                            <tr>
                            @empty
                                <td colspan="7" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div>
                            <button onclick="previous()" class="btn btn-primary">Previous</button>
                            <span id="currentPage">1</span>
                            <button onclick="next()" class="btn btn-primary">Next</button>
                        </div>
                        <br>
                        <div>
                        <button onclick="cetakLaporan()" class="btn btn-primary">Cetak Laporan</button>
                        </div>
                    
                   
                    
@endsection