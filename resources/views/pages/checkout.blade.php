@extends('layouts.checkout')

@section('title', 'Checkout')

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
              <li class="breadcrumb-item active" aria-current="page">
                Reservations
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details mb-3">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <h1>Reservation</h1>
            <p>
              Trip to {{ $item->tour_packages->title }}, {{ $item->tour_packages->location }}
            </p>
            <div class="attendee">
                  <table class="table table-responsive-sm text-center">
                    <thead>
                      <tr>
                        <td scope="col">Picture</td>
                        <td scope="col">Name</td>
                        <td scope="col">Date</td>
                        <td scope="col"></td>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($item->details as $detail)
                      <tr>
                        <td>
                          <img
                            src="https://ui-avatars.com/api/?name={{ $detail->username }}"
                            height="60" class="rounded-circle"/>
                        </td>
                        <td class="align-middle">{{ $detail->username }}</td>
                        <td class="align-middle">{{ $detail->date }}</td>
                        <td class="align-middle">
                          <a href="{{ route('checkout-remove', $detail->id) }}">
                            <img src="{{ url('frontend/images/ic_remove.png') }}" alt="" />
                          </a>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="6" class="text-center">No Visitor</td>
                      </tr>
                    @endforelse
                    </tbody>
                  </table>
                </div>
                <div class="member mt-3">
                  <h2>Add</h2>
                  <form class="form-inline" method="post" action="{{ route('checkout-create', $item->id) }}">
                    @csrf
                    <label for="username" class="sr-only">Name</label>
                    <input
                      type="text"
                      name="username"
                      class="form-control mb-2 mr-sm-2"
                      id="username"
                      placeholder="Username"
                    />

                    <label for="date" class="sr-only" for="Date"
                      >Date</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <input
                        type="text"
                        class="form-control datepicker"
                        name="date"
                        id="date"
                        placeholder="Date"
                      />
                    </div>

                    <button type="submit" class="btn btn-add-now mb-2 px-4">
                      Add Now
                    </button>
                  </form>
                  <h3 class="mt-2 mb-0">Note</h3>
                  <p class="disclaimer mb-0">
                    You are only able to invite member that has registered in
                    Badega Gunung Parang.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-details card-right">
                <h2>Checkout Information</h2>
                <table class="trip-informations">
                  <tr>
                    <th width="50%">Trip Price</th>
                    <td width="50%" class="text-right">IDR{{ $item->tour_packages->price }} / person</td>
                  </tr>
                  <tr>
                    <th width="50%">Sub Total</th>
                    <td width="50%" class="text-right">IDR{{ $item->transactions_total }}</td>
                  </tr>
                  <tr>
                    <th width="50%">Total (+Unique)</th>
                    <td width="50%" class="text-right text-total">
                      <span class="text-blue">IDR{{ $item->transactions_total }},</span
                      ><span class="text-orange">{{ mt_rand(0,99) }}</span>
                    </td>
                  </tr>
                </table>
        
                <hr />

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
              <div class="join-container">
                <a href="{{ route('payment', $item->id) }}"
                  class="btn btn-block btn-join-now mt-3 py-2"
                  >I Have Made Payment</a
                >
              </div>
              <div class="text-center mt-3">
                <a href="{{ route('detail', $item->tour_packages->slug) }}" class="text-muted">Cancel</a>
              </div>
            </div>
          </div>
        </div>
      </section>
</main>

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
