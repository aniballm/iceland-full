<?php

namespace App\Http\Classes;

class Translation
{

    /* Propiedades de la clase */
    private $full_key;
    private $en = null;
    private $es = null;
    private $de = null;
    private $fr = null;
    private $it = null;
    private $da = null;


    /**
     * @param $full_key
     * @param $texts
     */
    public function __construct($full_key, $texts ) {
        $this->full_key = $full_key;

        if ( count( $texts ) > 0 ) {
            foreach ( $texts as $lang => $text ) {
                switch ( $lang ) {
                    case 'es' :
                        $this->es = $text;
                        break;

                    case 'de' :
                        $this->de = $text;
                        break;

                    case 'fr' :
                        $this->fr = $text;
                        break;

                    case 'it' :
                        $this->it = $text;
                        break;

                    case 'da' :
                        $this->da = $text;
                        break;

                    case 'en' :
                        $this->en = $text;
                        break;
                }
            }
        }
    }

    /**
     * Método que devuelve la clave de la traducción
     *
     * @return string
     */
    public function getFullKey() {
        return $this->full_key;
    }


    /**
     * Método que devuelve los textos de las traducciones
     *
     * @param $lang
     * @return mixed|null
     */
    public function getText( $lang ) {
        switch ( $lang ) {
            case 'es' :
                return ( $this->es ) ? $this->es : $this->en;
                break;

            case 'de' :
                return ( $this->de ) ? $this->de : $this->en;
                break;

            case 'fr' :
                return ( $this->fr ) ? $this->fr : $this->en;
                break;

            case 'it' :
                return ( $this->it ) ? $this->it : $this->en;
                break;

            case 'da' :
                return ( $this->da ) ? $this->da : $this->en;
                break;

            default :
                return $this->en;
                break;
        }
    }


    /**
     * Método que convierte los datos de una instancia en un array
     *
     * @return array
     */
    public function toArray() {
        $translation_array = array();

        $translation_array[ 'full_key' ] = $this->getFullKey();
        $translation_array[ 'en' ]       = $this->getText( 'en' );
        $translation_array[ 'es' ]       = $this->getText( 'es' );
        $translation_array[ 'de' ]       = $this->getText( 'de' );
        $translation_array[ 'fr' ]       = $this->getText( 'fr' );
        $translation_array[ 'it' ]       = $this->getText( 'it' );
        $translation_array[ 'da' ]       = $this->getText( 'da' );

        return $translation_array;
    }

}
