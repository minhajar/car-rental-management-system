<html>

    <head>
    <title>PITRENTALS Admin Inventory </title>
        

     

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/style.css">
     

        
       
    </head>
    <script type="text/javascript">
        function validate(){
            return confirm("are you sure ?¿");
        }
    </script>
   
    <body>
        <h1>Vehicle Inventory</h1>
        <table border='0' align="center">
        <tr>
        <?php
        
        require '../DBconnexion.php';

        require '../helpingFuncs_Data.php';
        $query="SELECT * from vehicle where 1";
        $exec= mysqli_query($connect, $query);
       
            echo "<th>ID</th>";
            echo "<th>registration number</th>";
            echo "<th>model serial</th>";
            echo "<th>model name</th>";
            echo "<th>availability</th>"; 
            echo "<th>display picture</th>";
            echo "<th>rent price per day</th>";
            
        
        ?>
        </tr>
            <?php
             while ($vehi = mysqli_fetch_row($exec)){
                echo "<tr><td>$vehi[0]</td>";
                echo "<td>$vehi[1]</td>";
                echo "<td>$vehi[2]</td>";
                echo "<td>$vehi[3]</td>";
                echo "<td>$vehi[4]</td>";
                echo "<td><img border='0'  width='100' height='75' src='display_pics/$vehi[5] ' ></td>";
                echo "<td>$vehi[6]</td>";

                echo "<td> <a href = 'editForm.php?vehiID=$vehi[0]'> <img border='0'  src='display_pics/edit.png' width='30' height='30'> </a> </td>";
                echo "<td> <a id= 'delete' href = 'delete.php?vehiID=$vehi[0]'> <img border='0'  src='display_pics/delete.png' width='30' height='30' onclick='return validate();' > </a> </td></tr>";

             }
             
            ?>
          
        </table>
    <div> <a id='add' href='insertForm.php' class='btn' > add  </a></div>
    <div> <a  href='../adminInterface/admin.php' class='btn'  > Go Back to Admin Interface  </a> </div>

        
        
    </body>
    
</html>