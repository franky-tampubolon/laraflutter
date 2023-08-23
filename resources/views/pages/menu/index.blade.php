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
                <div class="ml-1">
                    <a href="{{route('menu.create')}}" title="Add Data" class="btn btn-outline-primary">
                        <i class="fas fa-plus"></i>

                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="tabel" class="table table-striped ">
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($menus as $key => $val)
                            <tr>
                                <td>{{$menus->firstItem()+$key}}</td>
                                <td>{{$val->menu_name}}</td>
                                <td>
                                    <a href="{{url($val->url)}}" class="btn btn-outline-primary">{{url($val->url)}}</a>
                                </td>
                                <td>
                                    <a href="{{route('menu.edit', [$val->id])}}" class="badge badge-success">
                                    <span>
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </span>
                                    </a>
                                    <a href="#" onclick="modal_confirm({{route('menu.destroy', $val->id)}}, {{$val->id}})"  class="badge badge-danger">
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
                {{$menus->onEachSide(5)->links()}}
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
        function modal_confirm(url, id)
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
                    hapus(url, id);
                } else {
                    swal('Your data is save');
                }
                });
        }

        function hapus(url, id)
        {
            $.ajaxSetup({
                headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
             url: url,
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
                        icon: 'error'
                    });
                }
            }
          });
        }
    </script>
@endpush
