<!DOCTYPE html>
<html>
    <head>
        <title>Down for manteniance.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
        @include('layouts.code')
        <script src="{{ url('https://libraries.hund.io/status-js/status-1.0.1.js') }}">var statusWidget = new Status.Widget({
  status_page: "status.miguelpiedrafita.com",
  selector: "#status",
  component: "58c0fca18c48eb4923fc46bf"
});</script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Down for manteniance.</div>
                <div class="status"></div>
            </div>
        </div>
    </body>
</html>
