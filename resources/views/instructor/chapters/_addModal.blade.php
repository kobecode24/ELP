<div class="modal" style="display:none;" id="addChapterModal">
    <div class="modal-background" onclick="closeModal()"></div>
    <div class="modal-content">
        <form action="{{ route('chapters.store', ['course' => $course->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <div class="field">
                <label class="label" for="title">Chapter Title</label>
                <div class="control">
                    <input class="input" type="text" name="title" id="title" required>
                </div>
            </div>
            <div class="field">
                <label class="label" for="description">Description</label>
                <div class="control">
                    <textarea class="textarea" name="description" id="description"></textarea>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Add Chapter</button>
                </div>
            </div>
        </form>
    </div>
    <button class="modal-close is-large" aria-label="close" onclick="closeModal()"></button>
</div>
