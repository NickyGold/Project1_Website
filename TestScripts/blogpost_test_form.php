<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Example Form</title>
    </head>
    <body>
        <form action="blogpost_test_valid.php" method="post">
            <label for="title">Title:</label><br>
            <input type="text" name="title" id="title" size="34">
            <br>
            <label for="post_txt">Content:</label><br>
            <textarea name="post_txt" id="post_txt" cols="30" rows="10"></textarea>
            <br>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
