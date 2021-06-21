<?php
date_default_timezone_set('Asia/Tokyo');

if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    $ym = date('Y-m');
}

$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

$today = date('Y-m-j');

$html_title = date('Y年n月', $timestamp);

$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

$day_count = date('t', $timestamp);

$youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

$weeks = [];
$week = '';

$week .= str_repeat('<td></td>', $youbi);

for ( $day = 1; $day <= $day_count; $day++, $youbi++) {


    $date = $ym . '-' . $day;

    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';
    if ($youbi % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            $week .= str_repeat('<td></td>', 6 - $youbi % 7);
        }
        $weeks[] = '<tr>' . $week . '</tr>';
        $week = '';
	}
}
?>

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
<b>予約フォーム</b><br>
<form method="POST" action="{{ url('/reservation') }}">
@csrf
1.お名前<br>
<input type="text" name="user"/><br>
2.メールアドレス<br>
<input type="text" name="email"/><br>
3.カレンダーから日付を選択してください<br>
<input name="date" type="text" id="date"/><br>
<div id="datepicker"></div><br>
4.時間を選択してください<br>
    <select name="time">
    <option value=""> 選択してください</option>
    <option value="">9:00～10:00</option>
    <option value="">10:00～11:00</option>
    <option value="">11:00～12:00</option>
    <option value="">13:00～14:00</option>
    <option value="">14:00～15:00</option>
    <option value="">15:00～16:00</option>
    <option value="">16:00～17:00</option>
    <option value="">17:00～18:00</option>
    </select><br><br>
5.人数を選択してください<br>
    <select name="count">
    <option value=""> 選択してください</option>
    <option value="1">１</option>
    <option value="2">２</option>
    <option value="3">３</option>
    <option value="4">４</option>
    </select>
    <br><br>
    @if ($errors->has('user'))
    <p class="text-danger">{{ $errors->first('user') }}</p>
    @endif
    @if ($errors->has('email'))
    <p class="text-danger">{{ $errors->first('email') }}</p>
    @endif
    @if ($errors->has('date'))
    <p class="text-danger">{{ $errors->first('date') }}</p>
    @endif
    @if ($errors->has('count'))
    <p class="text-danger">{{ $errors->first('count') }}</p>
    @endif
    <input type="submit" value="予約する" class="submit">
</form>

<script>
$(function() {
    var dateFormat = 'yymmdd';
    $("#datepicker").datepicker({
        dateFormat: dateFormat,
        minDate: 0,
        onSelect: function(dateText, inst) {
                    $("#date").val(dateText);
        }
    });
});
</script>
<div class="container">
    <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
    <table class="table table-bordered">
        <tr>
            <th>日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
        </tr>
        <?php
            foreach ($weeks as $week) {
                echo $week;
            }
        ?>
    </table>
</div>

 </div>
</body>
</html>
