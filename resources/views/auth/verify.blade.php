@extends('layouts.front')

@section('content')
    @push('css')
        <style>
            footer
            {
                margin-top: 400px;
            }
        </style>
    @endpush
    <div class="title-page">
        <div class="container">
            <h3>@lang('verify')</h3>
        </div>
    </div>
    <div class="main-content">

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('verify')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __(trans('freshVerify')) }}
                        </div>
                    @endif

                    {{ __(trans('verify2')) }}
                   <a href="{{ route('verification.resend') }}">{{ __(trans('verify3')) }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection
