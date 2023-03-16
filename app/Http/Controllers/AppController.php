<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Classes\Translations;
use App\Exports\TranslationsExport;
use Maatwebsite\Excel\Facades\Excel;

class AppController extends Controller
{


    public function translationsList( Request $request, $group = null ) {
        $translationsList = Translations::getTranslationsList( $group );
        $grupos = Translations::getTranlationGroups();

        return view('translations',[
            'groups'         => $grupos,
            'current_group'  => $group,
            'texts'          => $translationsList,
        ]);
    }

    /**
     * Método que devuelve en formato json la lista de traducciones resultantes de la búsqueda
     *
     * @param Request $request
     * @return false|string
     */
    public function search( Request $request ) {
        $searchText = $request->findText ? $request->findText : null;
        $group      = $request->group ? $request->group : null;

        $searchResults = Translations::find( $searchText, $group );

        $searchResultsAjax = array();

        foreach ( $searchResults as $result ) {
            $searchResultsAjax[] = $result->toArray();
        }

        return response()->json( $searchResultsAjax );
    }

    public function getTranslationAjax( Request $request ) {
        $key = $request->fullKey;
        $translation = Translations::getTranslation( $key );

        return response()->json( $translation->toArray() );
    }

    public function exportToExcel(Request $request, $group = null ) {
        $findText = ( $request->findText ) ? $request->findText : null;

        return Excel::download( new TranslationsExport( $group, $findText ), 'translations.xlsx' );
    }
}
