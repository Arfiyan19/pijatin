<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code Form</title>
</head>

<body>
    <h1>Verification Code Form</h1>
    <form action="{{ url('/verification') }}" method="post">
        @csrf
        <label for="verification_code">Verification Code:</label>
        <input type="text" id="verification_code" name="verification_code" value="" required>
        <button type="submit">Submit</button>
    </form>
</body>

</html>