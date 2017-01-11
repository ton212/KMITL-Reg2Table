
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KMITL Timetable Converter</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/thsarabunnew.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cover.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">
        <div class="cover-container">

            <div class="inner cover">
                <h1 class="cover-heading">KMITL Timetable Converter</h1>
                <p class="lead">โปรแกรมช่วยสร้างตารางเรียนที่ดูง๊ายง่ายกว่าของสำนักทะเบียน</p>
                <p class="lead" style="margin-top: 50px;">
                    <a href="{{ route('wizard.step1') }}" class="btn btn-lg btn-default">เริ่มกันเลย... ☺️</a>
                </p>
                <p class="lead" style="font-size: 14px;margin-bottom: 10px;">เพื่อความเป็นส่วนตัวของผู้ใช้โปรแกรม ข้อมูลทั้งหมดที่ผ่านโปรแกรมนี้จะ<u>ไม่</u>ถูกบันทึกบนเซิร์ฟเวอร์ของเราและที่ใดๆ</p>
                <p class="lead" style="font-size: 14px;">โปรแกรมนี้<u>ไม่มี</u>การเชื่อมต่อใดๆ ไปยังระบบของสำนักทะเบียนสจล.</p>
            </div>

            <div class="mastfoot">
                <div class="inner">
                    <p>Made with ♥ by iTon and <a href="#acknowledgementModel" data-toggle="modal">friends</a></p>
                </div>
            </div>

        </div>

    </div>

</div>

<div class="modal fade" id="acknowledgementModel">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Acknowledgement</h4>
			</div>
			<div class="modal-body">
				<p>@ton212 / sleepCode / @PhompAng / @topggunz / นัตตี้ / XIIKJIIX / foofybuster</p>
                <p><small>All from Faculty of Information Technology, KMITL</small></p>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
</body>
</html>
