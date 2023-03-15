<?php

namespace App\Exports;

use App\Http\Classes\Translations;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TranslationsExport implements FromView
{
    protected $group;
    protected $findText;

    public function __construct( $group, $findText = null ) {
        $this->group = $group;
        $this->findText = $findText;
    }

    public function view() : View
    {
        if ( ! $this->findText ) {
            $translationsList = Translations::getTranslationsList( $this->group );
        } else {
            $translationsList = Translations::find( $this->findText, $this->group );
        }

        return view('excel.translations_export', [ 'translations' => $translationsList ]);
    }
}
