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
                <h1>Log Harvest</h1>
                <form action="/logHarvest/" method="post">
                    <table cellpadding="5" width="100%" class="ltGrnBg">
                        <tr>
                            <td><strong>Site Name:</strong> <br />
                                $siteName</td>
                            <td><strong>Site Code:</strong><br />
                                $siteCode</td>
                        </tr>
                    </table>
                    <table>
                        <tbody>
                            <tr>
                                <td class="form_header">Harvest Date:</td>
                                <td><input type="text" name="harvestDate" /> (autopop today's dateTime)</td>
                            </tr>
                            <tr>
                                <td class="form_header">Quantity:</td>
                                <td><input type="text" name="quantity" /></td>
                            </tr>
                            <tr>
                                <td class="form_header">Units:</td>
                                <td><input type="text" name="units" /></td>
                            </tr>
                            <tr>
                                <td class="form_header">Invoice #:</td>
                                <td><input type="text" name="invoiceNum" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="left">
                                    <input type="hidden" name="cmd" value="doLogHarvest" />
                                    <input type="submit" value="Add Site" name="auth" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>