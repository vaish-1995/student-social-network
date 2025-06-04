@extends('master')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">{{ __('auth.forum_posts') }}</h2>
            <button id="newPostBtn" class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#postModal">
                <i class="bi bi-plus-circle me-1"></i>{{ __('auth.forum_new_post') }}
            </button>
        </div>

        @if ($posts->isEmpty())
            <div class="alert alert-info">{{ __('auth.no_forum_posts') }}</div>
        @else
            <div class="row g-4">
                @foreach ($posts as $post)
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold text-primary">
                                    {{ $post->language == 'fr' ? $post->title_fr : $post->title_en }}
                                </h5>
                                <p class="card-text">{{ $post->language == 'fr' ? $post->content_fr : $post->content_en }}</p>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <small class="text-muted">
                                        {{ __('auth.posted_by') }} {{ $post->user->name }} •
                                        {{ $post->created_at->format('M d, Y \a\t h:i A') }}
                                    </small>

                                    @if ($post->user_id === auth()->id())
                                        <div class="btn-group">
                                            <form action="{{ route('forum.edit', $post) }}" class="d-inline">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i> {{ __('auth.Edit') }}
                                                </button>
                                            </form>

                                            <form action="{{ route('forum.destroy', $post) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                                    <i class="bi bi-trash"></i> {{ __('auth.Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold" id="postModalLabel">{{ __('auth.forum_new_post') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modalFormContainer" class="p-4">
                    @include('forum.form')
                </div>
            </div>
        </div>
    </div>
@endsection