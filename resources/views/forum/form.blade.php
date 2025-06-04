{{-- form.blade.php --}}
@section('header', __('forum.edit_post'))

<form id="postForm" method="POST" action="{{ isset($forum) ? route('forum.update', $forum) : route('forum.store') }}"
    class="needs-validation" novalidate>
    @csrf
    @if(isset($forum))
        @method('PUT')
    @endif

    <div class="mb-4">
        <label for="language" class="form-label">{{ __('forum.language') }}</label>
        <select class="form-select" id="language" name="language" required>
            <option value="en" {{ old('language', $forum->language ?? app()->getLocale()) == 'en' ? 'selected' : '' }}>
                {{ __('forum.english') }}
            </option>
            <option value="fr" {{ old('language', $forum->language ?? app()->getLocale()) == 'fr' ? 'selected' : '' }}>
                {{ __('forum.french') }}
            </option>
        </select>
    </div>

    <div id="fields-en" class="language-fields"
        style="display: {{ (old('language', $forum->language ?? app()->getLocale()) == 'en') ? 'block' : 'none' }};">
        <div class="mb-4">
            <label for="title_en" class="form-label">{{ __('forum.title_english') }}</label>
            <input type="text" class="form-control rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                id="title_en" name="title_en" value="{{ old('title_en', $forum->title_en ?? '') }}" required>
            <div class="invalid-feedback">
                {{ __('forum.title_required') }}
            </div>
        </div>
        <div class="mb-4">
            <label for="content_en" class="form-label">{{ __('forum.content_english') }}</label>
            <textarea class="form-control rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                id="content_en" name="content_en" rows="6"
                required>{{ old('content_en', $forum->content_en ?? '') }}</textarea>
            <div class="invalid-feedback">
                {{ __('forum.content_required') }}
            </div>
        </div>
    </div>

    <div id="fields-fr" class="language-fields"
        style="display: {{ (old('language', $forum->language ?? app()->getLocale()) == 'fr') ? 'block' : 'none' }};">
        <div class="mb-4">
            <label for="title_fr" class="form-label">{{ __('forum.title_french') }}</label>
            <input type="text" class="form-control rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                id="title_fr" name="title_fr" value="{{ old('title_fr', $forum->title_fr ?? '') }}">
            <div class="invalid-feedback">
                {{ __('forum.title_required') }}
            </div>
        </div>
        <div class="mb-4">
            <label for="content_fr" class="form-label">{{ __('forum.content_french') }}</label>
            <textarea class="form-control rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                id="content_fr" name="content_fr" rows="6">{{ old('content_fr', $forum->content_fr ?? '') }}</textarea>
            <div class="invalid-feedback">
                {{ __('forum.content_required') }}
            </div>
        </div>
    </div>

    <div class="modal-footer bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
        <button type="button" class="btn btn-secondary me-2"
            onclick="event.preventDefault(); window.location.href='{{ route('forum.index') }}'">
            {{ __('forum.close') }}
        </button>
        <button type="submit" class="btn btn-primary">
            {{ isset($forum) ? __('forum.update') : __('forum.create') }}
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Form validation
        const form = document.getElementById('postForm');
        if (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }

        // Language toggle
        const languageSelect = document.getElementById('language');
        if (languageSelect) {
            // Initialize on load
            toggleLanguageFields();

            // Add event listener
            languageSelect.addEventListener('change', toggleLanguageFields);

            function toggleLanguageFields() {
                const lang = languageSelect.value;
                document.querySelectorAll('.language-fields').forEach(field => {
                    field.style.display = 'none';
                });

                const activeFields = document.getElementById(`fields-${lang}`);
                if (activeFields) {
                    activeFields.style.display = 'block';
                }

                // Toggle required attributes
                const fields = {
                    en: ['title_en', 'content_en'],
                    fr: ['title_fr', 'content_fr']
                };

                Object.entries(fields).forEach(([language, ids]) => {
                    const isActive = language === lang;
                    ids.forEach(id => {
                        const field = document.getElementById(id);
                        if (field) {
                            field.required = isActive;
                        }
                    });
                });
            }
        }
    });
</script>

<style>
    .language-fields {
        transition: opacity 0.3s ease;
    }

    .form-control {
        padding: 0.5rem 1rem;
    }

    .invalid-feedback {
        display: none;
        color: #dc3545;
    }

    .was-validated .form-control:invalid~.invalid-feedback,
    .was-validated .form-control:invalid~.invalid-feedback {
        display: block;
    }
</style>