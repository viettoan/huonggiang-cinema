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
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <input class="form-control" type="hidden" id="schedule-id" value="{{ $schedule->id }}" required>
    @php 
        $index = 1;
    @endphp
    @foreach ($data as $key => $element)
    <div class="room col-md-12" data-index='{{ $index }}'>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.date') }}</label>
            <input class="form-control date" type="date" name="date" value="{{ $key }}" required>
            @if ($errors->has('date'))
                <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.time') }}</label>
            <select class="time-multiple-{{ $index }} form-control time_id" name="time_id[]" multiple="multiple">
                @foreach ($times as $time)
                    <option value="{{ $time->id }}" @if (in_array($time->id, $element))
                        selected
                    @endif>{{ $time->time }}</option>
                @endforeach 
            </select>
        </div>
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-primary col-md-2 btn-edit-schedule-time">{{ trans('message.action.edit') }}</button>
            <button type="button" class="btn btn-danger col-md-2 btn-remove-schedule-time">{{ trans('message.action.remove') }}</button>
        </div>
    </div>
    @php
     $index++;
    @endphp
    @endforeach
    <div class="room col-md-12" data-index='{{ $index }}'>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.date') }}</label>
            <input class="form-control date" type="date" name="date" value="{{ old('date') }}" required>
            @if ($errors->has('date'))
                <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.time') }}</label>
            <select class="time-multiple-{{ $index }} form-control time_id" name="time_id[]" multiple="multiple">
            </select>
            @if ($errors->has('time'))
                <span class="help-block">
                        <strong>{{ $errors->first('time') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-primary col-md-2 btn-save-schedule-time">{{ trans('message.action.save') }}</button>
            <button type="button" class="btn btn-primary col-md-2 btn-edit-schedule-time">{{ trans('message.action.edit') }}</button>
            <button type="button" class="btn btn-danger col-md-2 btn-remove-schedule-time">{{ trans('message.action.remove') }}</button>
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
        $(document).ready(function(){
            var index = {{ $index }};
                for (var i = 1; i <= index; i++) {
                $('.time-multiple-' + i).select2();
            }

            $('.time-multiple-' + index).parents('.room').find('.btn-remove-schedule-time').hide();
            $('.time-multiple-' + index).parents('.room').find('.btn-edit-schedule-time').hide();
        });
        
    </script>
</body>
</html>
