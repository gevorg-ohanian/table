<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>ajax_test</title>
            <script src="/js/jquery-2.1.4.min .js" type="text/javascript"></script>
            <script src="/js/bootstrap.js" type="text/javascript"></script>
            <script src="/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="/js/custom_js/custom_js.js" type="text/javascript"></script>
            <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
            <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
            <link href="/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
            <link href="/css/custom.css" rel="stylesheet" type="text/css">
        </head>
        <body>
            <div class="main-form">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Country</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tbody class="editable">
                    @foreach($others as $other)
                        <tr data-id="{{$other['others_id']}}">
                            <td data-name="id"><span>{{$other['others_id']}}</span></td>
                            <td data-name="email"><span class="name">{{$other['others_email']}}</span></td>
                            <td data-name="name"><span class="name">{{$other['others_name']}}</span></td>
                            <td data-name="surname"><span class="name">{{$other['others_surname']}}</span></td>
                            <td data-name="country"><span class="name">{{$other['others_country']}}</span></td>
                            <td data-name="city"><span class="name">{{$other['others_city']}}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </body>
    </html>