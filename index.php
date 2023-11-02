<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (!isset($_POST['makepages'])) {

    ?>

        <form action="index.php" method="POST">
            <button type="submit" name="makepages">Generate Pages</button>
        </form>

    <?php

    } else {
        $x = 1;

        while ($x <= 100) {
            $byitself = $x * $x;
            $next = $x + 1;
            $prev = $x - 1;
            $myfile = fopen("pages/" . $x . ".html", "w") or die("Unable to open file!");
            $txt = <<<HELLO
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>The number is $x </h1>
        $x X $x = $byitself
        <br><br>
        <a href="$prev.html">Prev</a> | <a href="../index.php">Home</a> | <a href="$next.html">Next</a>
    </body>
    </html>
    
    HELLO;

            fwrite($myfile, $txt);
            fclose($myfile);

            $x++; 
        }
        echo 'Pages created. Go to <a href="pages/1.html">first page</a>';
    }
    ?>

</body>

</html>