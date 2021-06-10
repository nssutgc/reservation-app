<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Reservation system</title>
 <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
 <div class="container">
   <h3 class="my-3">予約管理システム</h3>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
<b>予約完了</b><br>
<p>予約内容</p>
<p>{{ $_POST['user']}} 様</p>
<p>{{ $_POST['count']}}名様</p>
<p>{{ $_POST['date']}} </p>
<a href="/">トップ</a>
 </div>
</body>
</html>
