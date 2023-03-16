<div class="modal-header">
    <h1 class="modal-title" id="modal-key">
        @isset ( $translation )
            {!! $translation->getFullKey() !!}
        @endisset
    </h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <table class="table">
        <tbody>
        <tr>
            <td>English</td>
            <td id="modal-en">
                @isset( $translation )
                    {!! $translation->getText( 'en' ) !!}
                @endisset
            </td>
        </tr>
        <tr>
            <td>Español</td>
            <td id="modal-es">
                @isset( $translation )
                    {!! $translation->getText( 'es' ) !!}
                @endisset
            </td>
        </tr>
        <tr>
            <td>Deutsch</td>
            <td id="modal-de">
                @isset( $translation )
                    {!! $translation->getText( 'de' ) !!}
                @endisset
            </td>
        </tr>
        <tr>
            <td>Français</td>
            <td id="modal-fr">
                @isset( $translation )
                    {!! $translation->getText( 'fr' ) !!}
                @endisset
            </td>
        </tr>
        <tr>
            <td>Italiano</td>
            <td id="modal-it">
                @isset( $translation )
                    {!! $translation->getText( 'it' ) !!}
                @endisset
            </td>
        </tr>
        <tr>
            <td>Dansk</td>
            <td id="modal-da">
                @isset( $translation )
                    {!! $translation->getText( 'da' ) !!}
                @endisset
            </td>
        </tr>
        </tbody>
    </table>
</div>
