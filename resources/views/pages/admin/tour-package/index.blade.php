 
 @extends('layouts.admin')


@section('content')
     
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Tour Package</h1>
                     <a href="{{ route('tour-package.create') }}" class="btn btn-sm btn-primary shadow-sm">
                      <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Paket
                     </a>
                    </div>

                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Duration</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($items as $item)
                                <tr>
                                <td>{{ $item->id }}</td> 
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->duration }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                        <a href="{{ route('tour-package.edit', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('tour-package.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tr>
                            @empty
                                <tr>
                                <td colspan="7" class="text-center">
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