<!doctype html>
<html lang="{{ locale::LANG_TAG }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- fontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset( 'css/style.css' ) }}">

    <title>Listado de traducciones</title>
</head>
<body>
    <section id="actions" class="actions container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-auto d-flex filter">
                <input type="text" id="search" class="search form-control" placeholder="Search" value="">

                <div class="dropdown">
                    <button id="group" class="btn btn-light dropdown-toggle btn-dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ ( isset( $current_group ) ) ? $current_group : 'GROUP' }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light">
                        <li>
                            <a href="{{ url('/') }}"  class="dropdown-item">GROUP</a>
                        </li>
                        @foreach( $groups as $group )
                            <li>
                                <a class="dropdown-item @if( $current_group == $group ) active @endif" href="{{ url( $group ) }}">{{ $group }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-auto export-excel">
                @php
                    $export_url = url( 'export' ) . ( ( isset( $current_group ) ) ? '/' . $current_group : '');
                @endphp

                <a class="btn btn-excel" href="{{ $export_url }}" target="_blank">Excel</a>
            </div>
        </div>
    </section>

    <section id="content" class="content container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">English</th>
                            <th scope="col">Español</th>
                            <th scope="col">Deutsch</th>
                            <th scope="col">Français</th>
                            <th scope="col">Italiano</th>
                            <th scope="col">Dansk</th>
                        </tr>
                    </thead>
                    <tbody id="table-content">
                        @include( 'partials.table-content' )
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="translationModal" tabindex="-1" aria-labelledby="modal-key" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="modal-key">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>English</td>
                                <td id="modal-en"></td>
                            </tr>
                            <tr>
                                <td>Español</td>
                                <td id="modal-es"></td>
                            </tr>
                            <tr>
                                <td>Deutsch</td>
                                <td id="modal-de"></td>
                            </tr>
                            <tr>
                                <td>Français</td>
                                <td id="modal-fr"></td>
                            </tr>
                            <tr>
                                <td>Italiano</td>
                                <td id="modal-it"></td>
                            </tr>
                            <tr>
                                <td>Dansk</td>
                                <td id="modal-da"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        const baseUrl = '{{ url('/') }}'
        const exportUrl = '{{ $export_url }}'
        const group = '{{ ( isset( $current_group ) ) ? $current_group : '' }}'
        const modal = new bootstrap.Modal('#translationModal')
    </script>
    <script src="{{ asset( 'js/translations.js' ) }}"></script>
</body>
</html>
