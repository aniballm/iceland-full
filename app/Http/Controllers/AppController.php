<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Classes\Translations;
use App\Exports\TranslationsExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
     * Método que devuelve la lista de traducciones resultantes de la búsqueda para mostrarlos en la vista principal
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function search(Request $request ) {
        $searchText = $request->findText ? $request->findText : null;
        $group      = $request->group ? $request->group : null;

        $searchResults = Translations::find( $searchText, $group );

        return view( 'partials.table-content', [
            'texts'  => $searchResults,
            'search' => $searchText
        ]);
    }

    /**
     * Método que devuelve los datos de una traducción para mostrarlos en la vista principal
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function getTranslationAjax(Request $request ) {
        $key = $request->fullKey;
        $translation = Translations::getTranslation( $key );

        return view( 'partials.modal-content', [ 'translation' => $translation ] );
    }

    /**
     * Método que exporta a excel las traducciones que se están mostrando en la vista principal
     *
     * @param Request $request
     * @param $group
     * @return BinaryFileResponse
     */
    public function exportToExcel(Request $request, $group = null ) {
        $findText = ( $request->findText ) ? $request->findText : null;

        return Excel::download( new TranslationsExport( $group, $findText ), 'translations.xlsx' );
    }

}
