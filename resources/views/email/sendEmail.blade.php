<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <p>Dear {{ $data['first_name'] }} {{ $data['last_name'] }},</p>
    <p>{{ $data['message'] }}</p>
    <p>Regards,<br>{{ $data['first_name'] }} {{ $data['last_name'] }}</p>
</body>
</html>
