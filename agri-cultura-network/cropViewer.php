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
        <title>Agri-Cultura Network - Crop Landscape Viewer</title>
    </head>

    <body>
        <div id="content">
            <?php include("includes/header.php"); ?>

            <div class="padding_10 margin_10">
                <h1>Crop Landscape Viewer</h1>
                <div class="float_right">IF Crop view: <a href="#" class="button">Switch to Grower View</a><br />
                    IF Grower view: <a href="#" class="button">Switch to Crop View</a></div>
                <div class="clear">&nbsp;</div>
                <hr />
                <table cellpadding="5" width="100%">
                    <thead>
                        <th>Grower</th>
                        <th class="odd">Week $variable</th>
                        <th>Week $variable</th>
                        <th class="odd">Week $variable</th>
                        <th>Week $variable</th>
                        <th class="odd">Week $variable</th>
                        <th>Week $variable</th>
                        <th class="odd">Week $variable</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Grower $variable</td>
                            <td class="odd">Crop $variable</td>
                            <td>Crop $variable</td>
                            <td class="odd">Crop $variable</td>
                            <td>Crop $variable</td>
                            <td class="odd">Crop $variable</td>
                            <td>Crop $variable</td>
                            <td class="odd">Crop $variable</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>