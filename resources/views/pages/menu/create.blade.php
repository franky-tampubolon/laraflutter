@extends('layouts.app')

@section('title', 'Create Data')

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
                    <h4>{{$title}}</h4>
                </div>
            </div>
            <div class="card-body ">
                <form action="{{route('menu.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" id="menu" name="menu" class="form-control @error('menu')
                            is-invalid
                        @enderror" value="{{old('menu')}}">
                        @error('menu')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" id="url"  name="url" class="form-control @error('url')
                            is-invalid
                        @enderror" value="{{old('url')}}">
                        @error('url')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    {{-- <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script> --}}
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    {{-- <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script> --}}

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('js/page/index-0.js') }}"></script> --}}
@endpush
