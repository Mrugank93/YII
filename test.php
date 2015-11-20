<!doctype html>

<head>
<title> test</title>
</head>
<body>
<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
<input name='email' type='input'>
<input type='submit'>
</form>
<?php
$email = '';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (mail($email, "hello jimmy", "hi self"))
    {
        echo "<script>alert('message sent!');</script>";
    } else {
        echo "<script>alert('failed!');</script>";
    }
}
?>
</body>

</html>