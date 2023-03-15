<?php

namespace App\Http\Classes;

use App\Http\Classes\Translation;
use Illuminate\Support\Facades\Http;

class Translations extends Translation
{
    /* Contantes para realizar la conexión a la API */
    const USER  = 'candidate';
    const PASS  = 'scandinaviantravel2023';
    const TOKEN = '1|6QCELHY8VjScOtlvV0pKDacIX8wMWJB9vpgBocGe';

    /**
     * Método para generar la cadena de conexión a la API
     *
     * @return string
     */
    private static function conn() {
        return 'Basic ' . base64_encode( self::USER . ':' . self::PASS ) . ', Bearer ' . self::TOKEN;
    }

    /**
     * Método que devuelve el listado de grupos de traducción
     *
     * @return array|mixed
     */
    public static function getTranlationGroups() {
        $response = Http::withHeaders( [ 'Authorization' => self::conn() ] )->get('https://practical-neumann.62-151-178-253.plesk.page/api/translationgroups');

        return $response->json( 'data' ) ? $response->json( 'data' ) : array();
    }


    /**
     * Método que devuelve el listado de las traducciones, pudiendo filtrar por grupo de traducción
     *
     * @param $group
     * @return array
     */
    public static function getTranslationsList( $group = null ) {
        $response = Http::withHeaders( [ 'Authorization' => self::conn() ] )->get( 'https://practical-neumann.62-151-178-253.plesk.page/api/translations', [ 'group' => $group ] );

        $translations = $response->json( 'data' );

        $translationsList = array();

        if ( $translations && count( $translations ) > 0 ) {
            foreach ( $translations as $translation ) {
                $translationsList[ $translation[ 'full_key' ] ] = new self( $translation[ 'full_key' ], $translation[ 'text' ] );
            }
        }

        return $translationsList;
    }


    /**
     * Método que devuelve la traducción que se recibe como parámetro
     *
     * @param string $full_key
     * @return Translation|array|mixed
     */
    public static function getTranslation ( $full_key ) {
        $response = Http::withHeaders( [ 'Authorization' => self::conn() ] )->get( "https://practical-neumann.62-151-178-253.plesk.page/api/translations/{$full_key}" );

        $translation = $response->json( 'data' );

        if ( $translation ) {
            $translation = new self( $translation[ 'full_key' ], $translation[ 'text' ] );
        }

        return $translation;
    }


    /**
     * Método que devuelve el listado traducciones correspondiente a la búsqueda realizada
     *
     * @param string $find_text
     * @param $group
     * @return array
     */
    public static function find (string $find_text = null, $group = null ) {
        $response = Http::withHeaders( [ 'Authorization' => self::conn() ] )->get( 'https://practical-neumann.62-151-178-253.plesk.page/api/translations', [ 'group' => $group ] );

        $translations     = $response->json( 'data' );
        $translationsList = array();

        if ( '' != $find_text && ! is_null( $find_text ) ) { // Obtenemos una cadena de texto que, además, no está vacía
            if ( $translations && count( $translations ) > 0 ) {
                foreach ( $translations as $translation ) {
                    $found = false;

                    if ( str_contains( $translation[ 'full_key' ], $find_text ) ) $found = true;
                    foreach ( $translation[ 'text' ] as $text ) {
                        if ( str_contains( $text, $find_text ) ) $found = true;
                    }

                    if ( $found ) {
                        $translationsList[] = new self( $translation[ 'full_key' ], $translation[ 'text' ] );
                    }
                }
            }
        } else { // No obtenemos ninguna cadena de texto o la que recibimos está vacía
            foreach ( $translations as $translation ) {
                $translationsList[] = new self( $translation[ 'full_key' ], $translation[ 'text' ] );
            }
        }

        return $translationsList;
    }
}
