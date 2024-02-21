<?php

namespace Database\Seeders;

use App\Models\ProgrammingLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgrammingLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $programmingLanguages = [
            ['name' => 'AWK [GAWK]', 'compiler_id' => 104],
            ['name' => 'AWK [MAWK]', 'compiler_id' => 105],
            ['name' => 'Ada', 'compiler_id' => 7],
            ['name' => 'Assembler [GCC]', 'compiler_id' => 45],
            ['name' => 'Assembler [NASM 64bit]', 'compiler_id' => 42],
            ['name' => 'Assembler [NASM]', 'compiler_id' => 13],
            ['name' => 'Bash', 'compiler_id' => 28],
            ['name' => 'Brainf**k', 'compiler_id' => 12],
            ['name' => 'C', 'compiler_id' => 11],
            ['name' => 'C#', 'compiler_id' => 86],
            ['name' => 'C# [Mono]', 'compiler_id' => 27],
            ['name' => 'C++ 4.3.2', 'compiler_id' => 41],
            ['name' => 'C++ [GCC]', 'compiler_id' => 1],
            ['name' => 'C++14 [GCC]', 'compiler_id' => 44],
            ['name' => 'C99 strict', 'compiler_id' => 34],
            ['name' => 'CLIPS', 'compiler_id' => 14],
            ['name' => 'COBOL', 'compiler_id' => 118],
            ['name' => 'Clojure', 'compiler_id' => 111],
            ['name' => 'Common Lisp [CLISP]', 'compiler_id' => 32],
            ['name' => 'D [DMD]', 'compiler_id' => 102],
            ['name' => 'D [GDC]', 'compiler_id' => 20],
            ['name' => 'Dart', 'compiler_id' => 48],
            ['name' => 'Elixir', 'compiler_id' => 96],
            ['name' => 'Erlang', 'compiler_id' => 36],
            ['name' => 'F#', 'compiler_id' => 124],
            ['name' => 'Forth', 'compiler_id' => 107],
            ['name' => 'Fortran', 'compiler_id' => 5],
            ['name' => 'Go', 'compiler_id' => 114],
            ['name' => 'Groovy', 'compiler_id' => 121],
            ['name' => 'Haskell', 'compiler_id' => 21],
            ['name' => 'Icon', 'compiler_id' => 16],
            ['name' => 'Intercal', 'compiler_id' => 9],
            ['name' => 'Java', 'compiler_id' => 10],
            ['name' => 'Java - legacy', 'compiler_id' => 55],
            ['name' => 'JavaScript [Rhino]', 'compiler_id' => 35],
            ['name' => 'JavaScript [SpiderMonkey]', 'compiler_id' => 112],
            ['name' => 'Julia', 'compiler_id' => 80],
            ['name' => 'Kotlin', 'compiler_id' => 47],
            ['name' => 'Lua', 'compiler_id' => 26],
            ['name' => 'Nemerle', 'compiler_id' => 30],
            ['name' => 'Nice', 'compiler_id' => 25],
            ['name' => 'Node.js', 'compiler_id' => 56],
            ['name' => 'Objective-C', 'compiler_id' => 43],
            ['name' => 'Ocaml', 'compiler_id' => 8],
            ['name' => 'Octave', 'compiler_id' => 127],
            ['name' => 'PHP', 'compiler_id' => 29],
            ['name' => 'Pascal [FPC]', 'compiler_id' => 22],
            ['name' => 'Pascal [GPC]', 'compiler_id' => 2],
            ['name' => 'Perl', 'compiler_id' => 3],
            ['name' => 'Perl 6', 'compiler_id' => 54],
            ['name' => 'Pike', 'compiler_id' => 19],
            ['name' => 'Prolog [GNU]', 'compiler_id' => 108],
            ['name' => 'Prolog [SWI]', 'compiler_id' => 15],
            ['name' => 'Python (Pypy)', 'compiler_id' => 99],
            ['name' => 'Python 2.x [Pypy]', 'compiler_id' => 4],
            ['name' => 'Python 3 ML/AI', 'compiler_id' => 119],
            ['name' => 'Python 3 nbc', 'compiler_id' => 126],
            ['name' => 'Python 3.x', 'compiler_id' => 116],
            ['name' => 'R', 'compiler_id' => 117],
            ['name' => 'Racket', 'compiler_id' => 95],
            ['name' => 'Ruby', 'compiler_id' => 17],
            ['name' => 'Rust', 'compiler_id' => 93],
            ['name' => 'SQLite - queries', 'compiler_id' => 52],
            ['name' => 'SQLite - schema', 'compiler_id' => 40],
            ['name' => 'Scala', 'compiler_id' => 39],
            ['name' => 'Scheme', 'compiler_id' => 18],
            ['name' => 'Scheme [Chicken]', 'compiler_id' => 97],
            ['name' => 'Scheme [Guile]', 'compiler_id' => 33],
            ['name' => 'Sed', 'compiler_id' => 46],
            ['name' => 'Smalltalk', 'compiler_id' => 23],
            ['name' => 'Swift', 'compiler_id' => 85],
            ['name' => 'Tcl', 'compiler_id' => 38],
            ['name' => 'Text', 'compiler_id' => 62],
            ['name' => 'TypeScript', 'compiler_id' => 57],
            ['name' => 'VB', 'compiler_id' => 88],
            ['name' => 'VB.NET', 'compiler_id' => 50],
            ['name' => 'Whitespace', 'compiler_id' => 6],
            ['name' => 'bc', 'compiler_id' => 110],
            ];

        foreach ($programmingLanguages as $language) {
            ProgrammingLanguage::create($language);
        }
    }
}
