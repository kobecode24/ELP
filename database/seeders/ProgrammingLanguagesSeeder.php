<?php

namespace Database\Seeders;

use App\Models\ProgrammingLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgrammingLanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $programmingLanguages = [
            ['name' => 'AWK [GAWK]', 'editor_mode' => 'ace/mode/awk'],
            ['name' => 'AWK [MAWK]', 'editor_mode' => 'ace/mode/awk'],
            ['name' => 'Ada', 'editor_mode' => 'ace/mode/ada'],
            ['name' => 'Assembler [GCC]', 'editor_mode' => 'ace/mode/assembly_x86'],
            ['name' => 'Assembler [NASM 64bit]', 'editor_mode' => 'ace/mode/assembly_x86'],
            ['name' => 'Assembler [NASM]', 'editor_mode' => 'ace/mode/assembly_x86'],
            ['name' => 'Bash', 'editor_mode' => 'ace/mode/sh'],
            ['name' => 'Brainf**k', 'editor_mode' => 'ace/mode/text'],
            ['name' => 'C', 'editor_mode' => 'ace/mode/c_cpp'],
            ['name' => 'C#', 'editor_mode' => 'ace/mode/csharp'],
            ['name' => 'C# [Mono]', 'editor_mode' => 'ace/mode/csharp'],
            ['name' => 'C++ 4.3.2', 'editor_mode' => 'ace/mode/c_cpp'],
            ['name' => 'C++ [GCC]', 'editor_mode' => 'ace/mode/c_cpp'],
            ['name' => 'C++14 [GCC]', 'editor_mode' => 'ace/mode/c_cpp'],
            ['name' => 'C99 strict', 'editor_mode' => 'ace/mode/c_cpp'],
            ['name' => 'CLIPS', 'editor_mode' => 'ace/mode/text'],
            ['name' => 'COBOL', 'editor_mode' => 'ace/mode/cobol'],
            ['name' => 'Clojure', 'editor_mode' => 'ace/mode/clojure'],
            ['name' => 'Common Lisp [CLISP]', 'editor_mode' => 'ace/mode/lisp'],
            ['name' => 'D [DMD]', 'editor_mode' => 'ace/mode/d'],
            ['name' => 'D [GDC]', 'editor_mode' => 'ace/mode/d'],
            ['name' => 'Dart', 'editor_mode' => 'ace/mode/dart'],
            ['name' => 'Elixir', 'editor_mode' => 'ace/mode/elixir'],
            ['name' => 'Erlang', 'editor_mode' => 'ace/mode/erlang'],
            ['name' => 'F#', 'editor_mode' => 'ace/mode/fsharp'],
            ['name' => 'Forth', 'editor_mode' => 'ace/mode/forth'],
            ['name' => 'Fortran', 'editor_mode' => 'ace/mode/fortran'],
            ['name' => 'Go', 'editor_mode' => 'ace/mode/golang'],
            ['name' => 'Groovy', 'editor_mode' => 'ace/mode/groovy'],
            ['name' => 'Haskell', 'editor_mode' => 'ace/mode/haskell'],
            ['name' => 'Icon', 'editor_mode' => 'ace/mode/text'],
            ['name' => 'Intercal', 'editor_mode' => 'ace/mode/text'],
            ['name' => 'Java', 'editor_mode' => 'ace/mode/java'],
            ['name' => 'Java - legacy', 'editor_mode' => 'ace/mode/java'],
            ['name' => 'JavaScript [Rhino]', 'editor_mode' => 'ace/mode/javascript'],
            ['name' => 'JavaScript [SpiderMonkey]', 'editor_mode' => 'ace/mode/javascript'],
            ['name' => 'Julia', 'editor_mode' => 'ace/mode/julia'],
            ['name' => 'Kotlin', 'editor_mode' => 'ace/mode/kotlin'],
            ['name' => 'Lua', 'editor_mode' => 'ace/mode/lua'],
            ['name' => 'Nemerle', 'editor_mode' => 'ace/mode/text'],
            ['name' => 'Nice', 'editor_mode' => 'ace/mode/text'],
            ['name' => 'Node.js', 'editor_mode' => 'ace/mode/javascript'],
            ['name' => 'Objective-C', 'editor_mode' => 'ace/mode/objectivec'],
            ['name' => 'Ocaml', 'editor_mode' => 'ace/mode/ocaml'],
            ['name' => 'Octave', 'editor_mode' => 'ace/mode/matlab'],
            ['name' => 'PHP', 'editor_mode' => 'ace/mode/php'],
            ['name' => 'Pascal [FPC]', 'editor_mode' => 'ace/mode/pascal'],
            ['name' => 'Pascal [GPC]', 'editor_mode' => 'ace/mode/pascal'],
            ['name' => 'Perl', 'editor_mode' => 'ace/mode/perl'],
            ['name' => 'Perl 6', 'editor_mode' => 'ace/mode/perl6'],
            ['name' => 'Pike', 'editor_mode' => 'ace/mode/text'],
            ['name' => 'Prolog [GNU]', 'editor_mode' => 'ace/mode/prolog'],
            ['name' => 'Prolog [SWI]', 'editor_mode' => 'ace/mode/prolog'],
            ['name' => 'Python (Pypy)', 'editor_mode' => 'ace/mode/python'],
            ['name' => 'Python 2.x [Pypy]', 'editor_mode' => 'ace/mode/python'],
            ['name' => 'Python 3 ML/AI', 'editor_mode' => 'ace/mode/python'],
            ['name' => 'Python 3 nbc', 'editor_mode' => 'ace/mode/python'],
            ['name' => 'Python 3.x', 'editor_mode' => 'ace/mode/python'],
            ['name' => 'R', 'editor_mode' => 'ace/mode/r'],
            ['name' => 'Racket', 'editor_mode' => 'ace/mode/scheme'],
            ['name' => 'Ruby', 'editor_mode' => 'ace/mode/ruby'],
            ['name' => 'Rust', 'editor_mode' => 'ace/mode/rust'],
            ['name' => 'SQLite - queries', 'editor_mode' => 'ace/mode/sql'],
            ['name' => 'SQLite - schema', 'editor_mode' => 'ace/mode/sql'],
            ['name' => 'Scala', 'editor_mode' => 'ace/mode/scala'],
            ['name' => 'Scheme', 'editor_mode' => 'ace/mode/scheme'],
            ['name' => 'Scheme [Chicken]', 'editor_mode' => 'ace/mode/scheme'],
            ['name' => 'Scheme [Guile]', 'editor_mode' => 'ace/mode/scheme'],
            ['name' => 'Sed', 'editor_mode' => 'ace/mode/sed'],
            ['name' => 'Smalltalk', 'editor_mode' => 'ace/mode/smalltalk'],
            ['name' => 'Swift', 'editor_mode' => 'ace/mode/swift'],
            ['name' => 'Tcl', 'editor_mode' => 'ace/mode/tcl'],
            ['name' => 'Text', 'editor_mode' => 'ace/mode/plain_text'],
            ['name' => 'TypeScript', 'editor_mode' => 'ace/mode/typescript'],
            ['name' => 'VB', 'editor_mode' => 'ace/mode/vbscript'],
            ['name' => 'VB.NET', 'editor_mode' => 'ace/mode/vbscript'],
            ['name' => 'Whitespace', 'editor_mode' => 'ace/mode/text'],
            ['name' => 'bc', 'editor_mode' => 'ace/mode/text']

        ];

        foreach ($programmingLanguages as $language) {
            $pl = ProgrammingLanguage::where('name', $language['name'])->first();
            if ($pl) {
                $pl->update(['editor_mode' => $language['editor_mode']]);
            }
}
    }
}

