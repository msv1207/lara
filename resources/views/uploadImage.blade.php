<!DOCTYPE html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        .mt-5{
            margin-top: 150px !important;
        }
        body{
            background: #423E3D;
        }
    </style>
</head>
<body class="bg-dark">
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <form enctype="multipart/form-data" id="imageUpload" action="/image" method="POST">
                        @csrf
                        <div class="form-group">
                            <label><strong>Image : </strong></label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="get" action="/update">
    <div class="form-group text-center">
        <button type="submit">Continue</button>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#imageUpload').on('submit',(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "/image",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            complete: function(response)
            {
                if($.isEmptyObject(response.responseJSON.error)){
                    $('.success').show();
                    setTimeout(function(){
                        $('.success').hide();
                    }, 5000);
                }else{
                    printErrorMsg(response.responseJSON.error);
                }
            }
        });
    }));</script>
</body>
</html>
