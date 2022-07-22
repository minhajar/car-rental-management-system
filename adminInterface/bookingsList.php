<html>

    <head>
        <title>PITRENTALS Admin Inventory </title>
        <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/style.css">

        
       
    </head>
    <script type="text/javascript">
        function validate(){
            return confirm("are you sure ?¿");
        }
    </script>
    <style>
        
    </style>
   
    <body>
        <h1>Bookings Inventory</h1>
        <table border='0' class='bookingList' align='center'>
        <tr>
        <?php
        require '../DBconnexion.php';
        require '../helpingFuncs_Data.php';
        $query="SELECT * from booking where 1";
        $exec= mysqli_query($connect, $query);
       
            echo "<th>booking ID</th>";
            echo "<th>car ID</th>";
            echo "<th>client ID</th>";
            echo "<th>date of Vehicle Aquisition</th>";
            echo "<th>date of Vehicle Return</th>"; 
            echo "<th>driver Option</th>";
            echo "<th>advance Deposit </th>";
            echo "<th>amount</th>"; 
            echo "<th> dropping point</th>";
            
        
        ?>
        </tr>
            <?php
             while ($book = mysqli_fetch_row($exec)){
                echo "<tr><td>$book[0]</td>";
                echo "<td>$book[1]</td>";
                echo "<td>$book[2]</td>";
                echo "<td>$book[3]</td>";
                echo "<td>$book[4]</td>";
                echo "<td>$book[5]</td>";
                echo "<td>$book[6]</td>";
                echo "<td>$book[7]</td>";
                echo "<td>$book[8]</td>";

                echo "<td> <a href = 'editBookings.php?bookID=$book[0]'> <img border='0'  src='display_pics/edit.png' width='30' height='30'> </a> </td>";
                echo "<td> <a id= 'delete' href = 'cancelBooking.php?bookID=$book[0]'> <img border='0'  src='display_pics/delete.png' width='30' height='30' onclick='return validate();' > </a> </td></tr>";

             }
             
            ?>
          
        </table>
        <div> <a  href='../adminInterface/admin.php' class='section-btn btn btn-primary btn-block'  > Go Back to Admin Interface  </a> </div>

    
        
        
    </body>
    
</html>