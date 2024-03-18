function initExerciseEdit(editorMode, initialCode, testCode, expectedOutput) {
    document.addEventListener('DOMContentLoaded', function() {
        tinymce.init({
            selector: '#question',
            plugins: 'link image code',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
            height: 300,
        });

        function initAceEditor(editorId, content) {
            var editor = ace.edit(editorId);
            editor.session.setValue(content);
            editor.setTheme("ace/theme/monokai");
            editor.session.setMode(editorMode);
            editor.getSession().on('change', function() {
                var textarea = document.getElementById(editorId + '_hidden');
                textarea.value = editor.getSession().getValue();
            });
        }

        initAceEditor('initial_code_editor', initialCode);
        initAceEditor('test_code_editor', testCode);
        initAceEditor('expected_output_editor', expectedOutput);
    });
}
