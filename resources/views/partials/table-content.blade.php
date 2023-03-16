@if( !$texts )
    <tr>
        <td colspan="7" class="text-center">No existen traducciones</td>
    </tr>
@else
    @foreach( $texts as $text )
        <tr>
            <td class="full-key" data-key="{{ $text->getFullKey() }}">
                {{ $text->getFullKey() }}
            </td>
            <td>
                {!! $text->getText( 'en' ) !!}
            </td>
            <td>
                {!! $text->getText( 'es' ) !!}
            </td>
            <td>
                {!! $text->getText( 'de' ) !!}
            </td>
            <td>
                {!! $text->getText( 'fr' ) !!}
            </td>
            <td>
                {!! $text->getText( 'it' ) !!}
            </td>
            <td>
                {!! $text->getText( 'da' ) !!}
            </td>
        </tr>
    @endforeach
@endif
