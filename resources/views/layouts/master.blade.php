<!DOCTYPE html>
<html>
    <head>
        <title>Shards - @yield('title')</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        <link href="{{ elixir('css/shards.css') }}" rel="stylesheet">

        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="{{ elixir('js/shards.js') }}"></script>
        {!! Toastr::render() !!}
    </head>
    <body class="@yield('body_class')">
        @yield('content')


        @if (count($errors) > 0)
            <script>
                $(document).ready(function() {

                    toastr.options.showEasing = 'swing';
                    toastr.options.hideEasing = 'linear';
                    toastr.options.progressBar = true;
                    toastr.options.closeButton = true;

                    @foreach ($errors->all() as $error)
                        toastr.error('{{ $error }}');
                    @endforeach
                });
            </script>
        @endif
    </body>
</html>
