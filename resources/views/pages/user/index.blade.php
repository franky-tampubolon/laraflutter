@extends('layouts.app')

@section('title', $title)

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{$title}}</h1>
            </div>

        </section>

        <div class="card">
            <div class="card-header justify-content-end">
                <div class="card-header-action ">
                    <form method="GET">
                        <div class="input-group">
                          <input type="text" name="search" value="{{Request::query('search')}}" class="form-control " placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="tabel" class="table table-striped ">
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $val)
                            <tr>
                                <td>{{$users->firstItem()+$key}}</td>
                                <td>{{$val->name}}</td>
                                <td>{{$val->email}}</td>
                                <td>
                                    @if($val->email_verified_at !== NULL)
                                        <span class="badge badge-success">Verified</span>
                                    @else
                                        <span class="badge badge-danger">Unverified</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('user.edit', [$val->id])}}" class="badge badge-success">
                                    <span>
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </span>
                                    </a>
                                    <a href="#" onclick="modal_confirm({{$val->id}})"  class="badge badge-danger">
                                    <span>
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            <div class="card-footer">
                {{$users->onEachSide(5)->links()}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{asset('library/sweetalert/dist/sweetalert.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>

    <script>
        function modal_confirm(id)
        {
            swal({
                title: 'Are you sure?',
                text: 'Once deleted, you will lose this data',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    hapus(id);
                } else {
                swal('Your imaginary file is safe!');
                }
                });
        }

        function hapus(id)
        {
            $.ajaxSetup({
                headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
             url: "{{url('user')}}"+'/'+id,
             method:"post",
             data: { 'id':id,
                    '_method': "DELETE"
                    },
             success:function(data){
                if(data.status){
                    swal('Success to delete data', {
                        icon: 'success',
                    });
                    location.reload()
                }else{
                    swal('Failed to delete data', {
                        icon: 'failed'
                    });
                }
            }
          });
        }
    </script>
@endpush
