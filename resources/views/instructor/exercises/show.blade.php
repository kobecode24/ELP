@extends('layouts.app')

@section('content')
    <div class="container p-20">
        <h1>{{ $exercise->title }}</h1>
        <p>{!! $exercise->question !!}</p>

        <div id="editor" style="height: 200px;">{{ $exercise->initial_code }}</div>
        <button onclick="submitCode()">Submit</button>
        <div id="overlay" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.5); z-index:100;">
            <img id="loadingSpinner" src="https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExZWs4ZWRkcWc4N2drY2dlaXpqNG50N3Y3ZGZndHlrNmMyaG5hNG9zNyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/RgzryV9nRCMHPVVXPV/giphy.gif
            " style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50px; height: 50px;" alt="Loading...">
        </div>

        @if( ($exercise->test_code))
            <h2>Test Case</h2>
            <div id="testCaseEditor" style="height: 200px;"></div>
            <h3>Expected Output</h3>
            <div id="expectedOutputEditor" style="height: 200px;"></div>
        @endif

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
    <script>
        function htmlDecode(input) {
            var doc = new DOMParser().parseFromString(input, "text/html");
            return doc.documentElement.textContent;
        }

        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.session.setMode("{{ $editorMode }}");

        @if(!empty($exercise->test_code))
        var testCaseEditor = ace.edit("testCaseEditor");
        testCaseEditor.setTheme("ace/theme/monokai");
        testCaseEditor.session.setMode("{{ $editorMode }}");
        testCaseEditor.setValue(htmlDecode(`{{ trim($exercise->test_code) }}`));
        testCaseEditor.setReadOnly(true);

        var expectedOutputEditor = ace.edit("expectedOutputEditor");
        expectedOutputEditor.setTheme("ace/theme/monokai");
        expectedOutputEditor.session.setMode("ace/mode/plain_text");
        expectedOutputEditor.setValue(htmlDecode(`{{ trim($exercise->expected_output) }}`));
        expectedOutputEditor.setReadOnly(true);
        @endif

        async function submitCode() {
            const code = editor.getValue();
            const exerciseId = "{{ $exercise->id }}";
            const submitUrl = `/instructor/exercises/${exerciseId}/execute`;
            const overlay = document.getElementById('overlay');

            overlay.style.display = 'flex';

            try {
                const response = await fetch(submitUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ code })
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                displayFeedback(data);
            } catch (error) {
                console.error('Error:', error);
                document.getElementById('feedback').textContent = 'Error submitting code. Please try again.';
            } finally {
                overlay.style.display = 'none';
            }
        }



        function displayFeedback(data) {
            const annotations = [];
            if (data.testResults && data.testResults.length) {
                data.testResults.forEach((result, index) => {
                    const type = result.passed ? 'info' : 'error';
                    const text = result.passed ? `Passed (Expected: ${result.expected}, Actual: ${result.actual})` : `Failed (Expected: ${result.expected}, Actual: ${result.actual})`;

                    annotations.push({
                        row: index,
                        column: 0,
                        type: type,
                        text: text
                    });
                });

                testCaseEditor.getSession().setAnnotations(annotations);
            } else {
                console.error('No test case results available.');
            }
        }
    </script>
    <style>
        .test-cases-container {
            display: flex;
            flex-wrap: wrap;
        }
        .test-case {
            margin-right: 20px;
            margin-bottom: 20px;
        }
        .expected-output {
            margin-top: 10px;
        }
        .ace_error {
            color: #ff5f58;
        }
        .ace_success {
            color: #23d18b;
        }
        .ace_annotation {
            position: absolute;
            z-index: 9;
        }

        .ace_gutter-cell.ace_info {
            background-color: #28a745;
            color: #fff !important;
        }

        .ace_gutter-cell.ace_error {
            background-color: #dc3545;
            color: #fff !important;
        }

    </style>
@endsection
