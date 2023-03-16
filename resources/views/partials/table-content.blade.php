@if( !$texts )
    <tr>
        <td colspan="7" class="text-center">No existen traducciones</td>
    </tr>
@else
    @foreach( $texts as $text )
        <tr>
            <td class="full-key" data-key="{{ $text->getFullKey() }}">
                @isset( $search )
                    {!! str_replace( $search, '<span class="highlight">' . $search . '</span>', $text->getFullKey() ) !!}
                @else
                    {!! $text->getFullKey() !!}
                @endisset
            </td>
            <td>
                @isset( $search )
                    {!! str_replace( $search, '<span class="highlight">' . $search . '</span>', $text->getText( 'en' ) ) !!}
                @else
                     {!! $text->getText( 'en' ) !!}
                @endisset
            </td>
            <td>
                @isset( $search )
                    {!! str_replace( $search, '<span class="highlight">' . $search . '</span>', $text->getText( 'es' ) ) !!}
                @else
                    {!! $text->getText( 'es' ) !!}
                @endisset
            </td>
            <td>
                @isset( $search )
                    {!! str_replace( $search, '<span class="highlight">' . $search . '</span>', $text->getText( 'de' ) ) !!}
                @else
                    {!! $text->getText( 'de' ) !!}
                @endisset
            </td>
            <td>
                @isset( $search )
                    {!! str_replace( $search, '<span class="highlight">' . $search . '</span>', $text->getText( 'fr' ) ) !!}
                @else
                    {!! $text->getText( 'fr' ) !!}
                @endisset
            </td>
            <td>
                @isset( $search )
                    {!! str_replace( $search, '<span class="highlight">' . $search . '</span>', $text->getText( 'it' ) ) !!}
                @else
                    {!! $text->getText( 'it' ) !!}
                @endisset
            </td>
            <td>
                @isset( $search )
                    {!! str_replace( $search, '<span class="highlight">' . $search . '</span>', $text->getText( 'da' ) ) !!}
                @else
                    {!! $text->getText( 'da' ) !!}
                @endisset
            </td>
        </tr>
    @endforeach
@endif
