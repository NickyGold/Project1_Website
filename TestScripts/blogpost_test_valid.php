<?php
// $blogpost = "<h2>Article Title: Test Blog</h2>This is a test blog post with <b>bold text</b> and <i>italic text</i>";
$blogpost = $_POST['blogpost'];
$sanitisedPost = htmlentities(string: $blogpost);

echo %$sanitisedPost;