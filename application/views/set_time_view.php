<html>
    <head>
        <title>Set Date and Time</title>
    </head>
    
    <body>
        <h1>Set Date and Time</h1>
        <a href="index">Back</a>
        <form action="load_time" method="POST">
            <table>
                <tr>
                    <td><input type="text" name="year" placeholder="year" size="4" required/><b>-</b></td>
                    <td><input type="text" name="month" placeholder="month" size="4" required/><b>-</b></td>
                    <td><input type="text" name="day" placeholder="day" size="4" required/>&nbsp&nbsp</td>
                    <td><input type="text" name="hour" placeholder="24 hour" size="4" required/><b>:</b></td>
                    <td><input type="text" name="minute" placeholder="minute" size="4" required/></td>
                    <td><input type="submit" name="submit" value=" Set " /></td>
                </tr>
            </table>
        </form>
    </body>
</html>