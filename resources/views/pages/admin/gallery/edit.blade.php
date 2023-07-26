@extends('layouts.admin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-0">

            <h1 class="mt-4">Edit Gallery</h1>
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
                    <form action="{{ route('gallery.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="tour_packages_id">Tour Packages</label>
                            <select name="tour_packages_id" required class="form-control">
                                <option value="{{ $item->tour_packages_id }}">Jangan Diubah</option>
                                @foreach ($tour_packages as $tour_package)
                                <option value="{{ $tour_package->id }}">
                                    {{ $tour_package->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" placeholder="image" class="form-control">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
