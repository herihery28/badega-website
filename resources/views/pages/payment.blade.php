@extends('layouts.payment')

@section('title', 'Payment')

@section('content')

<main>
  <section class="section-details-header"></section>
  <section class="section-details-content">
    <div class="container">
      <div class="row">
        <div class="col p-0 pl-3 pl-lg-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page">
                Paket Travel
              </li>
              <li class="breadcrumb-item" aria-current="page">
                Details
              </li>
              <li class="breadcrumb-item" aria-current="page">
                Reservations
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Payment
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="card-body">
          <div class="card card-details mb-3">
            <h1 class="h3 mb-0 text-gray-800">Payment</h1>
            <br>
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Tour Packages</th>
                    <th class="text-center">Users</th>
                    <th class="text-center">Transactions Total</th>
                    <th class="text-center">Transactions Status</th>
                    
                </thead>
                <tbody>
                  @forelse ($transactions as $transaction)
                  <tr>
                    <td class="text-center">{{ $transaction->id }}</td>
                    <td class="text-center">{{ $transaction->tour_packages->title }}</td>
                    <td class="text-center">{{ optional($transaction->user)->name }}</td>
                    <td class="text-center">IDR. {{ $transaction->transactions_total }}</td>
                    <td class="text-center">{{ $transaction->transactions_status }}</td>
                    
                </td>
                  </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center">
                        Data Kosong
                       </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>

                <h2>Payment Instructions</h2>
                <p class="payment-instructions">
                  Please complete your payment before continuing the wonderful trip.
                </p>
                <div class="bank">
                  <div class="bank-item pb-3">
                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image" />
                    <div class="description">
                      <h3>PT Badega ID</h3>
                      <p>
                        0881 8829 8800
                        <br />
                        Bank Central Asia
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="bank-item">
                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image" />
                    <div class="description">
                      <h3>PT Badega ID</h3>
                      <p>
                        0899 8501 7888
                        <br />
                        Bank HSBC
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-group">
                  <label for="image">Upload Bukti Pembayaran </label>
                      <input type="file" class="form-control" 
                      name="image" 
                      placeholder="image" 
                      class="form-control">
                </div>
                  <a href="{{ route('success') }}" class="btn btn-primary btn-block">Simpan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css') }}" />
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
<script>
  $(document).ready(function () {
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap4',
      icons: {
        rightIcon: '<img src="{{ url('frontend/images/ic_doe.png') }}" />'
      }
    });
  });
</script>
@endpush