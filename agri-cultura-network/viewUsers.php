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
        <title>Agri-Cultura Network - Growers - Home</title>
    </head>

    <body>
        <div id="content">
            <?php include("includes/header.php"); ?>

            <div class="padding_10 margin_10">
                <h1>View Users</h1>
                <a href="#" class="button">Add User</a>
                <div class="clear">&nbsp;</div>
                <table cellpadding="5" width="100%">
                    <thead>
                        <th>User Type</th>
                        <th>Username</th>
                        <th>Grower Code</th>
                        <th>Manager Name</th>
                        <th>Billing Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Type $variable</td>
                            <td>Username $variable</td>
                            <td>Grower Code $variable</td>
                            <td>Manager Name (managerFirst + managerLast) $variable</td>
                            <td>Billing Name (billingFirst + billingLast) $variable</td>
                            <td>Status $variable</td>
                            <td><a href="#">Update</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>