<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Blog</title>
    @include('layouts.partial.styles')
    @stack('css')
    <style>
        .category-custom-card {
          transition: transform 0.3s ease;
        }

        .category-custom-card:hover {
          transform: scale(1.05);
        }

        .custom-title:hover {
          color: #0000;
          cursor: pointer;
        }
        a {
            color: rgb(22 41 70);
            text-decoration: none;
        }
      </style>
</head>
<body>
    <div class="container">
    <!----Navber----->
        @include('layouts.partial.navber')
    <!----End Navber----->

    <!----Card Item---->
        @yield('main-content')
        <!-----End Blog Post----->
    </div>
    @include('layouts.partial.scripts')

    @if (Session::has('success'))
        <script>
            toastr.options = {
                'progressBar': true,
                'closeButton': true,
                'positionClass': 'toast-bottom-right', // Set position to bottom-right
                'preventDuplicates': true, // Prevent duplicate toasts
            };
            toastr.success("{{ Session::get('success') }}", 'Success!', {
                timeout: 120000
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            toastr.options = {
                'progressBar': true,
                'closeButton': true,
                'positionClass': 'toast-bottom-right',
            }
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                @foreach ($errors->all() as $error)
                    toastr.options = {
                        'progressBar': true,
                        'closeButton': true,
                        'positionClass': 'toast-bottom-right',
                    }
                    toastr.error('{{ $error }}');
                @endforeach
            });
        </script>
    @endif

    @stack('js')

</body>
</html>
