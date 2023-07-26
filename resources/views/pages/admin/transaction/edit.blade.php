@extends('layouts.admin')

@section('content')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-0">
                    <h1 class="mt-4">Edit Tour Package {{ $item->title }}</h1>
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
                                <form action="{{ route('transaction.update', $item->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="transactions_status">Status</label>
                                        <select name="transactions_status" required class="form-control">
                                            <option value="{{ $item->transactions_status }}">
                                            Jangan Ubah({{ $item->transactions_status }})
                                            </option>
                                            <option value="IN_CART">In Cart</option>
                                            <option value="PENDING">Pending</option>
                                            <option value="SUCCESS">Success</option>
                                            <option value="CANCEL">Cancel</option>
                                            <option value="FAILED">Failed</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                                </form>
                            </div>
                        </div>
                    </main>
@endsection
