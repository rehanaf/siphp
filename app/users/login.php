<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="<?=url()?>" method="post">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <br>
        <button>Login</button>
    </form>
</body>
</html>