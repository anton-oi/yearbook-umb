<!DOCTYPE html>
<html lang="en-US">
<head>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="{{asset('ipdf/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('ipdf/ipages.min.css')}}">
	<!-- /end css -->
    <!-- scripts-section -->
    <script type="text/javascript" src="{{asset('ipdf/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('ipdf/pdf.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('ipdf/jquery.ipages.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            console.log(window.location.href.split('/')[4]);
            var options = {
                responsive:true,
                autoFit:true,

                padding:10,

                pdfUrl: '/storage/pdf/'+window.location.href.split('/')[4],
                pdfAutoCreatePages: true,
                pdfBookSizeFromDocument: true,

                zoom:1,

                onLoad: function () {
                    console.log('PDFNYA KELOAD ');
                }
            };

            $('#flipbook').ipages(options);
        });
    </script>
    <!-- /end scripts-section -->
</head>
<body>

<!-- flipbook markup -->
<!-- <div class="ipgs-flipbook" style="height: 500px" data-pdf-src="{{asset('storage/pdf/'.$id)}}"></div> -->

<div id="flipbook"></div>
<!-- /end flipbook markup -->

</body>
</html>
