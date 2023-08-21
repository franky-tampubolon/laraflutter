@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')

    <h4 class="text-center">Verify Your Email</h4>
    @if(session('status') == 'verification-link-sent')
        <div class="badge badge-success m-1">
            Email Berhasil dikirim. Buka email anda.
        </div>
    @endif
    <form method="POST"
        action="{{route('verification.send')}}"
        class="needs-validation"
        novalidate="">
        @csrf

        <div class="form-group">
            <button type="submit" id="send_email"
                class="btn btn-primary btn-lg btn-block"
                tabindex="4">
                ReSend Email
            </button>
        </div>
    </form>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
