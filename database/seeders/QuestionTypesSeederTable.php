<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionType;
use Illuminate\Support\Str;

class QuestionTypesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $questionTypes = [
        'Multiple Choice',
        'Short Answer',
        'Paragraph',
        'Checkboxes',
        'linear scale'
    ];

    public function run()
    {
        foreach ($this->questionTypes as $questionType) {

            QuestionType::firstOrCreate([
                'keyname' => Str::slug($questionType)
            ], [
                'name' => $questionType,
            ]);
        }
    }
}
