@extends('master')

@section('title', __('about.title'))
@section('header', __('about.title'))

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary">{{ __('about.title') }}</h1>
    </div>

    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="{{ url('/images/logo.png') }}" alt="Concordia University" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-6">
            <p class="text-muted">{{ __('about.university_desc') }}</p>
        </div>
    </div>

    <div class="mb-5">
        <h2 class="text-secondary mb-4">{{ __('about.features_title') }}</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ __('home.programs_title') }}</h5>
                        <p class="card-text text-muted">{{ __('about.feature_auth') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ __('home.about_title') }}</h5>
                        <p class="card-text text-muted">{{ __('about.feature_multilang') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ __('home.news_title') }}</h5>
                        <p class="card-text text-muted">{{ __('about.feature_forum') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5 p-4 bg-light rounded shadow-sm">
        <h2 class="text-secondary mb-3">{{ __('about.tech_title') }}</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ __('about.tech_computer') }}</li>
            <li class="list-group-item">{{ __('about.tech_laravel') }}</li>
            <li class="list-group-item">{{ __('about.tech_mysql') }}</li>
            <li class="list-group-item">{{ __('about.tech_bootstrap') }}</li>
            <li class="list-group-item">{{ __('about.tech_blade') }}</li>
            <li class="list-group-item">{{ __('about.tech_localization') }}</li>
        </ul>
    </div>

    <div class="text-center my-5">
        <a href="{{ route('forum.index') }}" class="btn btn-primary btn-lg px-4">
            {{ __('about.cta') }}
        </a>
    </div>

</div>
@endsection
