<table>
    <thead>
        <tr>
            <th>
                <strong>NAME</strong>
            </th>
            <th>
                <strong>ENGLISH</strong>
            </th>
            <th>
                <strong>ESPAÑOL</strong>
            </th>
            <th>
                <strong>DEUTSCH</strong>
            </th>
            <th>
                <strong>FRANÇAIS</strong>
            </th>
            <th>
                <strong>ITALIANO</strong>
            </th>
            <th>
                <strong>DANSK</strong>
            </th>
        </tr>
    </thead>

    <tbody>
    @foreach($translations as $translation)
        <tr>
            <td>{{ $translation->getFullKey() }}</td>
            <td>{{ $translation->getText( 'en' ) }}</td>
            <td>{{ $translation->getText( 'es' ) }}</td>
            <td>{{ $translation->getText( 'de' ) }}</td>
            <td>{{ $translation->getText( 'fr' ) }}</td>
            <td>{{ $translation->getText( 'it' ) }}</td>
            <td>{{ $translation->getText( 'da' ) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
