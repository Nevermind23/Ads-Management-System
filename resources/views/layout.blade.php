<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple CRUD</title>
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <section class="section">
        <nav class="level">
            <div class="level-left">
                <div class="level-item">
                    <form class="field has-addons" action="{{route('click.show')}}">
                        @if(request()->route()->getName() != 'click.index')
                            <p class="control">
                                <a href="javascript:void(0);" class="button is-normal" onclick="GoBack()">
                                    <i class="fas fa-chevron-left"></i> &nbsp; Go Back
                                </a>
                            </p>
                        @endif
                        <p class="control">
                            <input class="input" type="text" name="id" placeholder="Type click ID">
                        </p>
                        <p class="control">
                            <button class="button">GO</button>
                        </p>
                    </form>
                </div>
            </div>

            <div class="level-right">
                <p class="level-item">
                    <a href="{{route('click.create')}}" class="button is-success">
                        <i class="fas fa-plus"></i> &nbsp; Create Click
                    </a>
                </p>
            </div>
        </nav>
        @yield('content')
    </section>
</div>
<script>
    function GoBack() {
        if (document.referrer == "") {
            window.location.replace('{{route('click.index')}}');
        } else {
            history.back()
        }
    }
</script>
</body>
</html>
