@extends('adm.layouts.app')

@push('css')

    <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">
    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/packages/barryvdh/elfinder/css/elfinder.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/packages/barryvdh/elfinder/css/theme.css') }}">

    <!-- elFinder JS (REQUIRED) -->

    @php
        $locale = app()->getLocale();
    @endphp

    @if($locale && $locale != 'en')
        <script src="<?= asset("/packages/barryvdh/elfinder/js/i18n/elfinder.$locale.js") ?>"></script>
    @endif

    <script src="<?= asset("/packages/barryvdh/elfinder/js/i18n/elfinder.uk.js") ?>"></script>


@endpush

@section('content')
    <div id="elfinder"></div>
@endsection

@push('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="{{ asset('/packages/barryvdh/elfinder/js/elfinder.min.js') }}"></script>
    <script type="text/javascript" charset="utf-8">
        // Documentation for client options:
        // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
        document.addEventListener('DOMContentLoaded', function(){
            $('#elfinder').elfinder({
                // set your elFinder options here
                <?php if($locale){ ?>
                lang: '<?= $locale ?>', // locale
                <?php } ?>
                customData: {
                    _token: '<?= csrf_token() ?>'
                },
                url : '<?= route("elfinder.connector") ?>',  // connector URL
                soundPath: '<?= asset('/packages/barryvdh/elfinder/sounds') ?>'
            });
        });
    </script>
@endpush