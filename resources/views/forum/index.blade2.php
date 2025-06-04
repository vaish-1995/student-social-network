
{{-- index.blade.php --}}

@extends('master')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">{{ __('auth.forum_posts') }}</h2>
            <button id="newPostBtn" type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#postModal">
                <i class="bi bi-plus-circle"></i>
                {{ __('auth.forum_new_post') }}
            </button>
        </div>

        @if ($posts->isEmpty())
            <div class="alert alert-info">{{__('auth.no_forum_posts')}} </div>
        @else
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title">
                                    {{-- {{ app()->getLocale() == 'fr' ? $post->title_fr : $post->title_en }} --}}
                                    {{ $post->language == 'fr' ? $post->title_fr : $post->title_en }}
                                </h4>
                                <p class="card-text">
                                    {{-- {{ app()->getLocale() == 'fr' ? $post->content_fr : $post->content_en }} --}}
                                    {{ $post->language == 'fr' ? $post->content_fr : $post->content_en }}

                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        {{ __('auth.posted_by') }} : {{ $post->user->name }} •
                                        {{ $post->created_at->format('M d, Y \a\t h:i A') }}
                                    </small>

                                    @if ($post->user_id === auth()->id())
                                        <div class="btn-group">

                                            <form action="{{ route('forum.edit', $post) }}" class="d-inline">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i>
                                                    {{ __('auth.Edit') }}
                                                </button>
                                            </form>


                                            <form action="{{ route('forum.destroy', $post) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                                    <i class="bi bi-trash"></i>
                                                    {{ __('auth.Delete') }}
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

            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Create New Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modalFormContainer">
                    @include('forum.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function loadEditForm(postId) {
            alert('Loading edit form for post ID: ' + postId);

            const modalTitle = document.getElementById('postModalLabel');
            const formContainer = document.getElementById('modalFormContainer');

            if (postId) {
                // Load edit form
                modalTitle.textContent = 'Edit Post';
                fetch(`/forum/${postId}/edit`)
                    .then(response => response.text())
                    .then(html => {
                        formContainer.innerHTML = html;
                        initializeFormScripts();
                    });
            } else {
                // Load create form
                modalTitle.textContent = 'Create Post';
                fetch('{{ route("forum.create") }}')
                    .then(response => response.text())
                    .then(html => {
                        formContainer.innerHTML = html;
                        initializeFormScripts();
                    });
            }
        }

        function initializeFormScripts() {
            // Your existing toggleLanguageFields function
            function toggleLanguageFields() {
                const lang = document.getElementById('language').value;
                const fieldsEn = document.getElementById('fields-en');
                const fieldsFr = document.getElementById('fields-fr');
                const titleEn = document.getElementById('title_en');
                const contentEn = document.getElementById('content_en');
                const titleFr = document.getElementById('title_fr');
                const contentFr = document.getElementById('content_fr');

                if (lang === 'en') {
                    fieldsEn.style.display = 'block';
                    fieldsFr.style.display = 'none';
                    titleEn.required = true;
                    contentEn.required = true;
                    titleFr.required = false;
                    contentFr.required = false;
                } else {
                    fieldsEn.style.display = 'none';
                    fieldsFr.style.display = 'block';
                    titleEn.required = false;
                    contentEn.required = false;
                    titleFr.required = true;
                    contentFr.required = true;
                }
            }

            // Initialize form scripts
            const languageSelect = document.getElementById('language');
            if (languageSelect) {
                toggleLanguageFields();
                languageSelect.addEventListener('change', toggleLanguageFields);
            }

            // Handle form submission
            const postForm = document.getElementById('postForm');
            if (postForm) {
                postForm.addEventListener('submit', function (e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    const url = this.action;
                    const method = this.querySelector('input[name="_method"]') ?
                        this.querySelector('input[name="_method"]').value : 'POST';

                    fetch(url, {
                        method: method,
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        }
                    })
                        .then(response => {
                            if (response.ok) {
                                window.location.reload();
                            } else {
                                return response.text().then(html => {
                                    document.getElementById('modalFormContainer').innerHTML = html;
                                    initializeFormScripts();
                                });
                            }
                        });
                });
            }
        }

        // Initialize new post button
        document.getElementById('newPostBtn')?.addEventListener('click', function () {
            console.lang
            loadEditForm(null);
        });

    </script>
@endsection