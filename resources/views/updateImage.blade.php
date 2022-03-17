<!DOCTYPE html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
<select class="custom-select" id="mySelect" name="values" size="6">
    <option selected>Open this select menu</option>
    <option value="1">line</option>
    <option value="2">rectangle</option>
    <option value="3">circle</option>
    <option value="4">triangle</option>
    <option value="4">text</option>

</select>
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
</form>
<form id="myDiv2" action="/arc" method="POST">
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
        <label for="formGroupExampleInput2">width</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="width" placeholder="x2">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">height</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="height" placeholder="y2">
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
</form>
<form id="myDiv3" action="/triangle" method="POST">
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
        <label for="formGroupExampleInput">x2</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="x2" placeholder="x1">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">y2</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="y2" placeholder="y1">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">x3</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="x3" placeholder="x1">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">y3</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="y3" placeholder="y1">
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
</form>
<form id="myDiv4" action="/text" method="POST">
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
        <label for="formGroupExampleInput2">font</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="font" placeholder="font">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">text</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="text" placeholder="text">
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
</form>
<form method="get" action="/show">
    <button type="submit">Continue</button>
</form>
</body>

<script type="text/javascript">
    var myDiv0 = document.getElementById("myDiv0");
    var myDiv = document.getElementById("myDiv");
    var myDiv2 = document.getElementById("myDiv2");
    var myDiv3 = document.getElementById("myDiv3");
    var myDiv4 = document.getElementById("myDiv4");
    document.getElementById("mySelect").onchange = function(){
        myDiv0.style.display = (this.selectedIndex == 1) ? "block" : "none";
        myDiv.style.display = (this.selectedIndex == 2) ? "block" : "none";
        myDiv2.style.display = (this.selectedIndex == 3) ? "block" : "none";
        myDiv3.style.display = (this.selectedIndex == 4) ? "block" : "none";
        myDiv4.style.display = (this.selectedIndex == 5) ? "block" : "none";

    }
    $("#myDiv0").submit(function(e) {
        e.preventDefault();
        $.post('line', $('#myDiv0').serialize())
    })
    $("#myDiv").submit(function(e) {
        e.preventDefault();
        $.post('rectangle', $('#myDiv').serialize())
    })
    $("#myDiv2").submit(function(e) {
        e.preventDefault();
        $.post('arc', $('#myDiv2').serialize())
    })
    $("#myDiv3").submit(function(e) {
        e.preventDefault();
        $.post('triangle', $('#myDiv3').serialize())
    })
    $("#myDiv4").submit(function(e) {
        e.preventDefault();
        $.post('text', $('#myDiv4').serialize())
    })
</script>
</body>
</html>
