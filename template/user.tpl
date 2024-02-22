
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Users Table</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="template/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>

        <form action="user.php" method="post" enctype="multipart/form-data">
            <div style="visibility:{if isset($visibility)} hidden {else} visible {/if}">
                <input type="submit" name ="submit" value="New User">
            </div>
            <div style="visibility:{if isset($visibility)} {$visibility} {else} hidden" {/if}>

                <div class="form-group col-md-4">
                    <label for="name">Name:</label>
                    {if isset($populate['id'])} <input type = "hidden" name = "id" value = "{$populate['id']}">{/if}
                    <input type="text" id="name" name="name" {if isset($errors['name'])} style="border-color: red"{/if}{if isset($populate['name'])}value="{$populate['name']}" {/if}>
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email"{if isset($errors['email'])} style="border-color: red"{/if} {if isset($populate['email'])} value="{$populate['email']}" {/if}>
                </div>
                <div class="form-group col-md-4">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" {if isset($errors['password'])} style="border-color: red"{/if}>
                </div>
                <div class="form-group col-md-4">
                    <label for="vpass">Verify Password:</label>
                    <input type="password" id="vpass" name="vpass" {if isset($errors['password'])} style="border-color: red"{/if}>
                </div>
                <div class="form-group col-md-4">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" {if isset($errors['username'])} style="border-color: red"{/if} {if isset($populate['username'])} value="{$populate['username']}" {/if}>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" {if isset($populate['phone'])} value="{$populate['phone']}" {/if}>
                </div>

                <div class="form-group col-md-8">
                    <label for="country">Country:</label>
                    <select name="country" id="country">';
                        <option value="null"> Choose One </option>
                        {foreach from=$countries item=country}
                            <tr>

                            <option value="{$country['id']}">{$country['name']}</option>

                            </tr>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" {if isset($populate['city'])} value="{$populate['city']}" {/if}>
                </div>
                <div class="form-group col-md-4">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" {if isset($populate['address'])} value="{$populate['address']}" {/if}>
                </div>
                <div class="form-group col-md-4">
                    <label for="zipcode">Zip Code:</label>
                    <input type="text" id="zipcode" name="zipcode" {if isset($populate['zipcode'])} value="{$populate['zipcode']}" {/if}>
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Select your Gender</label><br>
                    <input type="radio" id="male" name="gender" value="1">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="2">
                    <label for="female">Female</label><br>
                    <label for="active"> Active </label>
                    <input type="checkbox" id="active" name="active" value="1">
                </div>

                {if isset($errors)}
                    {foreach from=$errors item=error}
                        {$error}
                    {/foreach}
                {/if}
                <br>
                <div class="form-group col-md-4">
                    <label for="myFile">Add a profile picture</label><br>
                    <input type="file" id="myFile" name="filename" max-size="1000">
                </div>
                {if isset($editButton)}
                    <input type="submit" name="submit" value="Save">
                {else}
                    <input type="submit" name ="submit" value="Add">
                {/if}
            </div>


            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAllTable" name="checkAllTable" onclick="checkAll(this);"></th>
                        <th><a class="columnSort" id="u.name" data-order="desc" href="#">Name</a></th>
                        <th><a class="columnSort" id="u.email" data-order="desc" href="#">Email</a></th>
                        <th><a class="columnSort" id="u.username" data-order="desc" href="#">Username</a></th>
                        <th><a class="columnSort" id="u.phone" data-order="desc" href="#">Phone</a></th>
                        <th><a class="columnSort" id="c.countryName" data-order="desc" href="#">Country</a></th>
                        <th><a class="columnSort" id="u.city" data-order="desc" href="#">City</a></th>
                        <th><a class="columnSort" id="u.address" data-order="desc" href="#">Address</a></th>
                        <th><a class="columnSort" id="u.zipcode" data-order="desc" href="#">Zipcode</a></th>
                        <th><a class="columnSort" id="u.gender" data-order="desc" href="#">Gender</a></th>
                        <th><a class="columnSort" id="u.active" data-order="desc" href="#">Active</a></th>
                        <th><a class="columnSort" id="u.pfp" data-order="desc" href="#">Profile Picture</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> no users yet </td>
                    </tr>
                </tbody>

            <input type="submit" name ="submit" value="Delete Selected" onclick="confirmDelete();">
            </table>
        </form>
        {if isset($delete)}
            <script> alert("{$delete}"); </script>
        {/if}
        {if isset($update)}
            <script> alert("{$update}"); </script>
        {/if}

        <div class="pagination-container">
            {if isset($pageNumber)}
                {if $pageNumber != 1}
                    <a href="user.php?pageNum=1"> First </a>
                {/if}
                {for $num = $pageNumber-2 to $pageNumber + 2}
                    {if $num > 0 && $num <=$numberOfPages}
                    <a href="user.php?pageNum={$num}"> {$num} </a>
                    {/if}
                {/for}
                {if $pageNumber != $numberOfPages}
                    <a href="user.php?pageNum={$numberOfPages}" >Last</a>
                {/if}
                <input type="hidden" name='pageNumber' value="{$pageNumber}">
            {else}
                <input type="hidden" name='pageNumber' value="1">
                <a href="user.php?pageNum=1">1</a>
                <a href="user.php?pageNum=2">2</a>
                {if $numberOfPages>=3}
                    <a href="user.php?pageNum=3">3</a>
                {/if}
                <a href="user.php?pageNum={$numberOfPages}" >Last</a>
            {/if}
        </div>
        <script>
            var pageNumber = <?php echo $_GET['pageNum'] ?? 1; ?>;
        </script>
        <script src="template/js/script.js"></script>
    </body>
</html>