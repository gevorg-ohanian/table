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

            <div class="main-form" id="main-form">
                <table class="custom-table table table-striped" id="main-table">
                    <thead>
                        <tr data-name="sortable">
                            <th></th>
                            <th><a href="#" data-href="others_id">User ID</a></th>
                            <th><a href="#" data-href="others_email">Email</a></th>
                            <th><a href="#" data-href="others_name">Name</a></th>
                            <th><a href="#" data-href="others_surname">Surname</a></th>
                            <th><a href="#" data-href="others_country">Country</a></th>
                            <th><a href="#" data-href="others_city">City</a></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($others as $other)
                        <tr data-id="{{$other->others_id}}" data-tr-name="editable">
                            <td><input type="checkbox" name="delete" value="{{$other->others_id}}"></td>
                            @foreach($other['attributes'] as $key=>$value)
                                <td data-name="{{$key}}"><span class="name">{{$value}}</span></td>
                            @endforeach
                            <td class="del"><button class="delete btn btn-primary btn-sm active" type="button">Delete Row</button>
                                <button class="editor btn btn-primary btn-sm active" data-id="{{$other->others_id}}" type="button">Edit Row</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            {{$others->appends(array('sort_by' => $sort_by))->links()}}

        </body>
    </html>