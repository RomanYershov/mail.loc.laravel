<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank you for registration</title>
</head>
<body>
  <h1>Dear, {{$data['name']}}</h1>
<p>Your email {{$data['email']}} was registration</p>
<p>Activation code: <a href="http://mail.loc:8090/auth/{{$data['activation_code']}}">Click</a></p>
</body>
</html>