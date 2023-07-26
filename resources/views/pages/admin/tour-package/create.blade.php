@extends('layouts.admin')

@section('content')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    
                    <h1 class="mt-4">Tambah Paket</h1>
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
                        <form action="{{ route('tour-package.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="title">Location</label>
                                <input type="text" class="form-control" name="location" placeholder="Location" value="{{ old('location') }}">
                            </div>
                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea name="about" rows="10" class="d-block w-100 form-control">{{ old('about') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="type">Featured Ticket</label>
                                <input type="text" class="form-control" name="featured_ticket" placeholder="Featured Ticket" value="{{ old('featured_ticket') }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Parking</label>
                                <input type="text" class="form-control" name="parking" placeholder="Parking" value="{{ old('parking') }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Documentation</label>
                                <input type="text" class="form-control" name="documentation" placeholder="Documentation" value="{{ old('documentation') }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Guide Tours</label>
                                <input type="text" class="form-control" name="guide_tours" placeholder="Guide Tours" value="{{ old('guide_tours') }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Safety</label>
                                <input type="text" class="form-control" name="safety" placeholder="Safety" value="{{ old('safety') }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Foods</label>
                                <input type="text" class="form-control" name="foods" placeholder="Foods" value="{{ old('foods') }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Duration</label>
                                <input type="text" class="form-control" name="duration" placeholder="Duration" value="{{ old('duration') }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" class="form-control" name="type" placeholder="Type" value="{{ old('type') }}">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                            Simpan
                            </button>
                        </form>
                        </div>
                        </div>
                            </main>
@endsection