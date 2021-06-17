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
    <h3><a>&lt;</a>&nbsp;&nbsp;2021年 6月&nbsp;&nbsp;<a>&gt;</a></h3>
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
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
        </tr>
        <tr>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
        </tr>
        <tr>
            <td>15</td>
            <td>16</td>
            <td class="today">17</td>
            <td>18</td>
            <td>19</td>
            <td>20</td>
            <td>21</td>
        </tr>
        <tr>
            <td>22</td>
            <td>23</td>
            <td>24</td>
            <td>25</td>
            <td>26</td>
            <td>27</td>
            <td>28</td>
        </tr>
        <tr>
            <td>29</td>
            <td>30</td>
            <td>31</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>

 </div>
</body>
</html>
