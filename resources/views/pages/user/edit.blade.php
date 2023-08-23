@extends('layouts.app')

@section('title', 'General Dashboard')

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
                <form action="{{route('user.update', $user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" value="{{$user->name}}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email"  name="email" class="form-control @error('email')
                            is-invalid
                        @enderror" value="{{$user->email}}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password"  name="password" class="form-control @error('password')
                            is-invalid
                        @enderror" value="">
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="text" id="phone"  name="phone" class="form-control @error('phone')
                            is-invalid
                        @enderror" value="{{$user->phone}}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role User</label>
                        <select name="role" id="role" class="form-control @error('role')
                            is-invalid
                        @enderror">
                            <option value="super admin" @if($user->role==='super admin') selected @endif>Super Admin</option>
                            <option value="admin" @if($user->role==='admin') selected @endif>Admin</option>
                            <option value="user" @if($user->role==='user') selected @endif>User</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bio">Biografi</label>
                        <textarea name="bio" id="bio" cols="30" class="form-control summernote-simple @error('bio')
                            is-invalid
                        @enderror" rows="10">{{$user->bio}}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email_verified_at">Email Verified</label>
                        <div class="custom-switches-stacked mt-2">
                            <label class="custom-switch">
                                <input type="radio"
                                    name="email_verified_at"
                                    value="{{now()}}"
                                    class="custom-switch-input"
                                    @if($user->email_verified_at !==NULL) checked @endif>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Sudah</span>
                            </label>
                            <label class="custom-switch">
                                <input type="radio"
                                    name="email_verified_at"
                                    value=""
                                    class="custom-switch-input" @if($user->email_verified_at ===NULL) checked @endif>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Belum</span>
                            </label>
                        </div>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save change</button>
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
