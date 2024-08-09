<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="<?=url()?>" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <br>
        <label for="password2">Confirm: </label>
        <input type="password" name="password2" id="password2">
        <br>
        <button>Register</button>
    </form>
</body>
</html>