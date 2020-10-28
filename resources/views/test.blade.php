@extends('layouts.app')
<style>
    #myProgress {
        width: 100%;
        background-color: #ddd;
    }

    #myBar {
        width: 1%;
        height: 20px;
        background-color: #4CAF50;
    }
</style>
@section('content')

    {{--<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">--}}
    {{--<link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">--}}
    {{--<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">--}}

    <div class="container">
        <div class="col-md-8 section offset-md-2">
            <div class="panel panel-primary">

                <div class="panel-body">
                    <div id="success" style="display: none">
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Files uploaded successfully</strong>
                        </div>
                    </div>
                    <div id="error" style="display: none">
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                        </div>
                    </div>
                    <form id="file_upload" method="POST">
                        <div class="row">
                            <div class="col-md-10">
                                <input id="file" type="file" name="file[]" class="form-control" multiple>
                                <br>
                                <div id="myProgress" style="display: none">
                                    <div id="myBar"></div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button id="btn_up" type="button" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<example-component></example-component>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).on('click', '#btn_up', function () {
        $('#myProgress').show();
        let myForm = document.getElementById('file_upload');
        let fd = new FormData(myForm);
        let i = 0;
        function move() {
            if (i == 0) {
                i = 1;
                var elem = document.getElementById("myBar");
                var width = 1;
                var id = setInterval(frame, 10);

                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                        i = 0;
                    } else {
                        width++;
                        elem.style.width = width + "%";
                    }
                }
            }
        }
        move();
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: '{{ route('file.upload.post') }}',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (result) {
                if (result.status == 'success') {
                    $('#success').show();
                    $('#myProgress').hide();
                    $('#file').val('');
                }
            },
            error: function (result) {
                $('#myProgress').hide();
                $('#error').show();
            }
        });
    });
</script>
{{--<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>--}}


