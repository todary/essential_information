<html>
    <head>
        <title>title</title>
    </head>
    <body>

        <!-- to delete send in form  action="server.php/?id=7" and input = <input type="hidden" name="_method" value="delete" /> -->
        <!--server.php/?id=6-->
        <form action="server.php" method="POST">
            <input type="text" name="name" />
            <input type="number" name="type" />
            <input type="number" name="houres" />
            <!--<input type="hidden" name="_method" value="delete" />-->
            <!--<input type="hidden" name="_method" value="put" />-->
            <input type="submit" name="submit" />
        </form>
    </body>
</html>
