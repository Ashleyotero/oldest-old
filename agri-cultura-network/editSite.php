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
                <h1>Add IF new, else Edit Site</h1>
                <form action="/editSite/" method="post">
                    <table>
                        <tbody>
                            <tr>
                                <td class="form_header">Site Name:</td>
                                <td><input type="text" name="siteName" /></td>
                            </tr>
                            <tr>
                                <td class="form_header">Site Code:</td>
                                <td><input type="text" name="siteCode" /></td>
                            </tr>
                            <tr>
                                <td class="form_header">Street Address:</td>
                                <td><input type="text" name="address" /></td>
                            </tr>
                            <tr>
                                <td class="form_header">City/State:</td>
                                <td><input type="text" name="cityState" /></td>
                            </tr>
                            <tr>
                                <td class="form_header">Certified Organic:</td>
                                <td><input type="radio" name="certifiedOrganic" value="Yes" /> Yes 
                                    <input type="radio" name="certifiedOrganic" value="No" /> No</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="left">
                                    <input type="hidden" name="cmd" value="doEditSite" />
                                    <input type="submit" value="Edit Site" name="auth" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>