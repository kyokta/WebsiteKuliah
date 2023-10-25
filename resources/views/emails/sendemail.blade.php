<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Registered</title>
</head>
<body>
    <h2><b>Hi {{ $data['name'] }},</b></h2>
    <p>Your account has been registered successfully.</p>
    <p>Here are your account details:</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Name: {{ $data['name'] }}</p>
    <p>Thanks</p>
</body>
</html>