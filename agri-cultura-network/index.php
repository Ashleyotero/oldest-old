<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="includes/screen.css" rel="stylesheet" type="text/css" />
        <title>Agri-Cultura Network - Home</title>
    </head>

    <body>
        <div id="content">
            <?php include("includes/header.php"); ?>

            <div class="padding_10 margin_10">
                <h1>Login</h1>
                <form action="/login/" method="post">
                    <table>
                        <tbody>
                            <tr>
                                <td class="form_header">Username: </td>
                                <td><input type="text" name="uname" /></td>
                            </tr>
                            <tr>
                                <td class="form_header">Password:</td>
                                <td><input type="password" name="password" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right">
                                    <input type="hidden" name="cmd" value="doAdminLogin" />
                                    <input type="submit" value="Sign-in" name="auth" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>