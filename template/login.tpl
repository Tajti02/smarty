<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Users Table</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <form action="index.php" method="post">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" {if isset($errors['username'])} style="border-color: red"{/if} {if isset($populate['username'])} value="{$populate['username']}" {/if}>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" {if isset($errors['password'])} style="border-color: red"{/if}>

            <input type="submit" name ="submit" value="Login">
        </form>
        {if isset($errors)}
            {foreach from=$errors item=error}
                {$error}
            {/foreach}
        {/if}
    </body>
</html>