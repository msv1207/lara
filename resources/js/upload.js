var myDiv0 = document.getElementById("myDiv0");
var myDiv = document.getElementById("myDiv");
var myDiv2 = document.getElementById("myDiv2");
document.getElementById("mySelect").onchange = function(){
    myDiv0.style.display = (this.selectedIndex == 1) ? "block" : "none";
    myDiv.style.display = (this.selectedIndex == 2) ? "block" : "none";
    myDiv2.style.display = (this.selectedIndex == 3) ? "block" : "none";
}
// {{--$.ajax({--}}
//     {{--    type: 'post',--}}
//     {{--    url: '"{{ route('line')}}"',--}}
//     {{--    data: formData,--}}
//     {{--    complete: function(response)--}}
//     {{--    {--}}
//         {{--        alert(response);--}}
//         {{--        }--}}
//
//     {{--});--}}
$("#myDiv0").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('line');

    $.ajax({
        type: "POST",
        url: 'line',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            var img = document.createElement(data);
            // data.style.cssText = 'position:absolute;width:100%;height:100%;opacity:0.3;z-index:100;background:#000';
            document.body.appendChild(img); // show response from the php script.
        }
    });
});
// $(document).ready(function() {
//     $("#formButton").cl
//     // $("#formButton").click(function() {
//         $("#form1").toggle();
//     });
// });
