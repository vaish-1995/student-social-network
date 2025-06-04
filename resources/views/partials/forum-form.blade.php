<form id="postForm">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">{{ $title ?? 'Create Post' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <div class="modal-body">
        <!-- Form fields same as before -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>