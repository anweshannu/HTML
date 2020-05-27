    <?php
        $servername = "165.22.14.77";
        $username = "Anwesh";
        $password = "Anwesh";
        $echo "entered";
        $conn = mysqli_connect($servername, $username, $password);

        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        
        echo 'Connected successfully';





        // mysql_select_db( 'TUTORIALS' );
        $query = "show databases";
        $result = mysqli_query($conn, $query);
        // sleep(1);
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            echo "Databases are " . $row["Database"] . ;
        } 
        else 
        {
          echo "No item found.";
        }

        mysqli_close($conn);
        $conn->close();





 ?>
