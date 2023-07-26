@extends('layouts.admin')

@section('content')
<div id="layoutSidenav_content">
   <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
                 <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary shadow-sm">
                  <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Gallery
                 </a>
                </div>

                <div class="row">
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                                    <th>Id</th>
                                    <th>Tour Packages</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id = 1; ?> <!-- Add this line to initialize the ID counter -->
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id}}</td>
                                    <td>{{ $item->tour_packages->title }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->image) }}" alt="" style="width: 150px" class="img-thumbnail" />
                                    </td>
                                    <td>
                                        <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('gallery.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                     </div>
                    </div>
                </div>
            </div>
@endsection
