<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tính năm nhuận</title>
        <link rel="stylesheet" href="../bootstrap.min.css"/>
    </head>
    <body>
        <?php
            $currentYear = date("Y");
            //Hàm tính năm nhuận
            function nam_nhuan($nam){
                if((($nam%4==0)and($nam%100!=0)) or ($nam%400==0))
                    return true;
                return false;
            }
            //Hàm sinh mảng----------------------
            function generateYears($input){
                global $currentYear;
                if($input <= $currentYear) return range ($input, $currentYear);
                else return range ($currentYear, $input);
            }
            //-----------------------------------
            $oddyears = [];
            if(isset($_POST["Submit"])){
                $y = $_POST["year"];
                $oddyears = generateYears($y);
                foreach ($oddyears as $key=>$value) if(!nam_nhuan($value)) unset($oddyears[$key]);
            }
            
        ?>
        <form action="" method="POST">
            <table align="center" class="table-condensed">
                <tr class="bg-primary">
                    <th class="text-center" colspan="3" style="color: white;"><h3 style="font-family:'Comic Sans MS'">TÍNH NĂM NHUẬN</h3></th>
                </tr>
                <tr class="bg-info">
                    <th class="text-center"><label>Năm:</label></th>
                    <td><input class="form-control" name="year" type="number" value="<?php if(isset($_POST["year"])) echo $y ?>"/></td>
                </tr>
                <tr class="bg-info">
                    <td colspan="2">
                        <textarea class="form-control" rows="3" cols="80">
                            <?php 
                                if(count($oddyears)>0) echo implode(", ", $oddyears)." là năm nhuận";
                                else echo"Không có năm nhuận";
                            ?>
                        </textarea>
                    </td>
                </tr>
                <tr class="text-center bg-info">
                    <td colspan="3"><input class="btn btn-info" style="color: red" name='Submit' type="submit" value="Tìm năm nhuận"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>