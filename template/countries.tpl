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
        <form action="countries.php" method="post">
            <div style="visibility:{if isset($visibility)} hidden {else} visible {/if}">
                <input type="submit" name ="submit" value="New Country">
            </div>
            <div style="visibility:{if isset($visibility)} {$visibility} {else} hidden" {/if}>

                 <div class="form-group col-md-4">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" {if isset($errors['name'])} style="border-color: red"{/if}>
                </div>
                {if isset($errors)}
                    {foreach from=$errors item=error}
                        {$error}
                    {/foreach}
                {/if}
                <br><input type="submit" name ="submit" value="Add">

            </div>
            {if isset($import)}
                <script> alert("{$import}"); </script>
            {/if}
            {if isset($delete)}
                <script> alert("{$delete}"); </script>
            {/if}
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAllTable" name="checkAllTable" onclick="checkAll(this);"></th>
                        <th><a class="columnSort" id="u.name" data-order="desc" href="#">Name</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td> no countries yet </td></tr>
                </tbody>
                <input type="submit" name ="submit" value="Delete Selected" onclick="confirmDelete();">
            </table>
        </form>
        <div class="pagination-container">
            {if isset($pageNumber)}
                {if $pageNumber != 1}
                    <a href="countries.php?pageNum=1"> First </a>
                {/if}
                {for $num = $pageNumber-2 to $pageNumber + 2}
                    {if $num > 0 && $num <=$numberOfPages}
                        <a href="countries.php?pageNum={$num}"> {$num} </a>
                    {/if}
                {/for}
                {if $pageNumber != $numberOfPages}
                    <a href="countries.php?pageNum={$numberOfPages}" >Last</a>
                {/if}
                <input type="hidden" name='pageNumber' value="{$pageNumber}">
            {else}
                <input type="hidden" name='pageNumber' value="1">
                <a href="countries.php?pageNum=2">1</a>
                <a href="countries.php?pageNum=2">2</a>
                {if $numberOfPages>=3}
                    <a href="user.php?pageNum=3">3</a>
                {/if}
                <a href="countries.php?pageNum={$numberOfPages}" >Last</a>
            {/if}
        </div>
        <script>
            var pageNumber = <?php echo $_GET['pageNum'] ?? 1; ?>;
        </script>
        <script src="template/js/scriptCountry.js"></script>
    </body>
</html>