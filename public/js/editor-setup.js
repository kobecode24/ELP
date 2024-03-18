    tinymce.init({
    selector: '#question',
    plugins: 'link image code',
    toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
    height: 300,
});

    function initializeAceEditor(editorId) {
        var editor = ace.edit(editorId);
        editor.setTheme("ace/theme/monokai");
        editor.session.setMode(window.editorMode);
        editor.setOptions({
            maxLines: Infinity
        });
        editor.getSession().on('change', function() {
            document.getElementById(editorId.replace('_editor', '')).value = editor.getSession().getValue();
        });
        return editor;
    }

    var initialCodeEditor = initializeAceEditor("initial_code_editor");
    var testCodeEditor = initializeAceEditor("test_code_editor");
    var expectedOutputEditor = initializeAceEditor("expected_output_editor");
