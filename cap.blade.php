<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>reCAPTCHAのサンプル</title>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <style>
    h1 { font-size: 16px; }
    .form_wrap { padding: 10px; }
    .errors {
      width: 300px;
      font-size: 12px;
      color: #e95353;
      border: 1px solid #e95353;
      background-color: #f2dede;
    }
    .complete {
      padding-left: 10px;
      width: 290px;
      font-size: 12px;
      color: #2a88bd;
      border: 1px solid #2a88bd;
      background-color: #a6e1ec;
    }
  </style>
</head>
<body>
  @if ($errors->any())
    <div class="errors">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @isset ($status)
    <div class="complete">
      <p>認証に成功しました</p>
    </div>
  @endisset
  <div class="form_wrap">
    <form method="post">
      {{ csrf_field() }}
      <input type="text" name="sample_01"><br><br>
      <div class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_API_KRY')}}" data-callback="recaptchaCallback"></div><br><br>
      <button type="submit" id="submit" disabled>送信</button>
    </form>
  </div>
  <script> function recaptchaCallback(param) { if(param) { document.getElementById('submit').disabled = ""; } } </script>
</body>
</html>