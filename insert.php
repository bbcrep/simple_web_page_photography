<?php
/*$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];

if(!empty($email) || !empty($name)|| !empty($password)||!empty($repeatPassword))
    {
            $host = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "moa_photography";

            //create connection
            $conn = new mysqli($host,$dbUsername,$dbPassword,$dbName);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            else
            {
                echo "Connected successfully";
                $sql = "INSERT INTO users (email, name, password)
                VALUES ('$email', '$name', '$password')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
                $conn->close();
            }
    }
*/
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];

    if(!empty($email) || !empty($name)|| !empty($password)||!empty($repeatPassword))
    {
            $host = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "moa_photography";

            //create connection
            $conn = new mysqli($host,$dbUsername,$dbPassword,$dbName);
            if(mysqli_connect_error())
            {
                die('Connection Error('.mysqli_connect_errorno().')'.mysqli_connect_error());
            }
            else
            {
                $SELECT = "SELECT email FROM users WHERE email = ? Limit 1";
                $INSERT = "INSERT Into users (name, email, password) VALUES (?,?,?)";

                //Prepare statement
                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("s",$email);
                $stmt->execute();
                $stmt->bind_result($email);
                $stmt->store_result();
                $rnum = $stmt->num_rows;
                if($rnum == 0)
                {
                    $stmt->close();

                    $stmt = $conn->prepare($INSERT);
                    $stmt->bind_param("sss",$name,$email,$password);
                    $stmt->execute();
                    echo "New record inserted sucessfully";

                }
                else
                {
                    echo "Someone already register using this email";
                }
                $stmt->close();
                $conn->close();
                
            }
    }
    else
    {
        echo "All fields are required";
        die();
    }
?>