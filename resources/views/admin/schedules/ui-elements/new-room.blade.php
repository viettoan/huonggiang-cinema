<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type='image/png' href="favicon.png">
      <!-- Bootstrap core CSS-->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <!-- Page level plugin CSS-->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
    <link href="{{asset('bower/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('bower/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet">
    <link href="{{asset('bower/select2/dist/css/select2.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    @yield('style')
</head>
<body>
    <div class="col-md-12 row">
        <div class="room col-md-10">
            <div class="form-group">
                <label for="exampleInputEmail1">{{ trans('message.column.room') }}</label>
                <select name="room_id[]" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{ trans('message.column.time') }}</label>
                <select class="js-example-basic-multiple-2 form-control" name="time_id[]" multiple="multiple">
                    <option>1</option>
                </select>
                @if ($errors->has('time'))
                    <span class="help-block">
                            <strong>{{ $errors->first('time') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-1 room-action">
            <i class="fas fa-plus-circle new-room"></i>
            <i class="fas fa-minus-circle del-room"></i>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin.min.js')}}"></script>

    <!-- Custom scripts for this page-->
    <script src="{{asset('bower/sweetalert2/dist/sweetalert2.js')}}"></script>
    <script src="{{asset('bower/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('bower/select2/dist/js/select2.js')}}"></script>
    <script src="{{asset('js/plugin/ckeditor/ckeditor.js')}}"></script>
    <script>
            $('.js-example-basic-multiple-2').select2();
    </script>
</body>
</html>
