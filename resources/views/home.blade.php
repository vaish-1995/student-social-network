@extends('master')

@section('title', __('auth.home'))
@section('header', __('auth.home'))

@section('content')
<div class="container py-5">

    {{-- Hero Section --}}
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">{{ __('home.title') }}</h1>
        <p class="lead text-muted">{{ __('home.subtitle') }}</p>
    </div>

    {{-- About Section --}}
    <div class="row align-items-center mb-5 bg-light rounded p-4 shadow-sm">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ url('/images/logo.png') }}" alt="{{ __('home.about_title') }}" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h2 class="fw-semibold mb-3 text-secondary">{{ __('home.about_title') }}</h2>
            <p class="text-muted">{{ __('home.about_description') }}</p>
        </div>
    </div>

    {{-- Programs Section --}}
    <div class="mb-5">
        <h2 class="fw-semibold mb-4 text-primary">{{ __('home.programs_title') }}</h2>
        <div class="list-group shadow-sm">
            <div class="list-group-item list-group-item-action">
                <i class="bi bi-mortarboard-fill me-2 text-secondary"></i>{{ __('home.programs.undergrad') }}
            </div>
            <div class="list-group-item list-group-item-action">
                <i class="bi bi-easel-fill me-2 text-secondary"></i>{{ __('home.programs.grad') }}
            </div>
            <div class="list-group-item list-group-item-action">
                <i class="bi bi-flask-fill me-2 text-secondary"></i>{{ __('home.programs.research') }}
            </div>
        </div>
    </div>

    {{-- Testimonials Section --}}
    <div class="mb-5 p-4 bg-white rounded shadow">
        <h2 class="mb-4 text-primary">{{ __('home.testimonials_title') }}</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="border-start ps-3">
                    <p class="mb-1 fst-italic">{{ __('home.testimonials.student1_text') }}</p>
                    <small class="text-muted">— {{ __('home.testimonials.student1_name') }}, <span class="fw-bold">{{ __('home.testimonials.student1_role') }}</span></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="border-start ps-3">
                    <p class="mb-1 fst-italic">{{ __('home.testimonials.student2_text') }}</p>
                    <small class="text-muted">— {{ __('home.testimonials.student2_name') }}, <span class="fw-bold">{{ __('home.testimonials.student2_role') }}</span></small>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Facts Section --}}
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="p-4 bg-light rounded shadow-sm">
                <h3 class="text-success fw-bold display-6">{{ __('home.quick_facts.job_placement_rate') }}</h3>
                <p class="text-muted">{{ __('home.quick_facts.job_placement_label') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light rounded shadow-sm">
                <h3 class="text-info fw-bold display-6">{{ __('home.quick_facts.programs_offered') }}</h3>
                <p class="text-muted">{{ __('home.quick_facts.programs_offered_label') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light rounded shadow-sm">
                <h3 class="text-warning fw-bold display-6">{{ __('home.quick_facts.active_students') }}</h3>
                <p class="text-muted">{{ __('home.quick_facts.active_students_label') }}</p>
            </div>
        </div>
    </div>

    {{-- Call to Action --}}
    <div class="text-center mb-5">
        <div class="p-5 bg-primary text-white rounded shadow-lg">
            <h2 class="fw-bold mb-3">{{ __('home.cta_title') }}</h2>
            <p class="lead">{{ __('home.cta_text') }}</p>
            <a class="btn btn-light btn-lg px-4 mt-3">
                {{ __('home.cta_button') }}
            </a>
        </div>
    </div>

    {{-- News Section --}}
    <div class="mb-5">
        <h2 class="fw-semibold text-primary">{{ __('home.news_title') }}</h2>
        <p class="text-muted">{{ __('home.news_description') }}</p>
    </div>
</div>
@endsection
