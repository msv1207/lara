<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        html {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: auto;
            color: #666;
        }

        form {
            padding: 15px;
            border: 1px solid #666;
            background: #fff;
            display: none;
        }

        #formButton {
            display: block;
            margin-right: auto;
            margin-left: auto;
        }
        #myDiv0{
            display: none;
        }
        #myDiv{
            display: none;
        }
        #myDiv2{
            display: none;
        }
    </style>
</head>
<body class="bg-dark" id = "body">
<select class="custom-select" id="mySelect" name="values" size="3">
    <option selected>Open this select menu</option>
    <option value="1">line</option>
    <option value="2">rectangle</option>
    <option value="3">3</option>
</select>
{{--<img src="{{ asset('images/1647256970.png') }}" alt="tag">--}}
{{--<img src="/Users/mishavlasov/Sites/untitled42/docker-laravel-8/source/public/images/1647256970.png">--}}
<form id="myDiv0" action="/line" method="POST"  >
@csrf

    <div class="form-group">
            <label for="formGroupExampleInput">x1</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="x1" placeholder="x1">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">y1</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="y1" placeholder="y1">
        </div>
        <div class="form-group">
        <label for="formGroupExampleInput2">x2</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="x2" placeholder="x2">
        </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">y2</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="y2" placeholder="y2">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">color</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="color" placeholder="color">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">id</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="id" placeholder="id">
    </div>
    <input type="submit" value="Отправить">
{{--    </form>--}}
</form>
<form id="myDiv" action="/rectangle" method="POST"  >
    @csrf

    <div class="form-group">
        <label for="formGroupExampleInput">x1</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="x1" placeholder="x1">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">y1</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="y1" placeholder="y1">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">x2</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="x2" placeholder="x2">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">y2</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="y2" placeholder="y2">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">color</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="color" placeholder="color">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">id</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="id" placeholder="id">
    </div>
    <input type="submit" value="Отправить">
    {{--    </form>--}}
</form>
<div id="myDiv2">
    <p>Select 2 to show me, otherwise I'm invisible!</p>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    var myDiv0 = document.getElementById("myDiv0");
    var myDiv = document.getElementById("myDiv");
    var myDiv2 = document.getElementById("myDiv2");
    document.getElementById("mySelect").onchange = function(){
        myDiv0.style.display = (this.selectedIndex == 1) ? "block" : "none";
        myDiv.style.display = (this.selectedIndex == 2) ? "block" : "none";
        myDiv2.style.display = (this.selectedIndex == 3) ? "block" : "none";
    }
    {{--$.ajax({--}}
    {{--    type: 'post',--}}
    {{--    url: '"{{ route('line')}}"',--}}
    {{--    data: formData,--}}
    {{--    complete: function(response)--}}
    {{--    {--}}
    {{--        alert(response);--}}
    {{--        }--}}

    {{--});--}}
    $("#myDiv0").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        // var actionUrl = form.attr('line');

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $.ajax({
            type: "POST",
            url: 'line',
            contentType: "image/png",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            // data: form.serialize(), // serializes the form's elements.
            success: function (data) {
                // var img = document.createElement('img');
                // img.src=data;
                document.getElementById('body').append(data);
            }
        });
    });

</script>
</body>
</html>
