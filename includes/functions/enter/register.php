<?php
// Include config file
include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
include($_SERVER['DOCUMENT_ROOT'] . "/includes/functions/PHPMailer/mails/register.php");
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = "";
$email = $_POST["email"];
$type = 'normal-user';
$privacy = 'public';
$lastip = $_SERVER['REMOTE_ADDR'];
$ipllog = getSomeIp($lastip);

if($ipllog > 0){
    $budgetzz = '0';
}else{
   $budgetzz = '1000'; 
}












    /* Other Inputs */
    if(isset($_GET['gourl'])) {$gourl = $_GET['gourl'];}else{$gourl = '';}
    if(isset($_GET['referral'])) {$gourl = $_GET['referral'];}else{$gourl = '';}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
       echo $username_err = '<div class="YNcdi">
                                <div class="INtAP">
                                    <p class="_1vwgT">Error</p>
                                    <div class="xVhXy">Please enter a username.</div>
                                    <div class="_3vunz">
                                        <button onclick="closeOtherOptChild()" class="">OK</button>
                                    </div>
                                </div>
                            </div>';
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                   echo $username_err = '<div class="YNcdi">
                                <div class="INtAP">
                                    <p class="_1vwgT">Error</p>
                                    <div class="xVhXy">This username is already taken.</div>
                                    <div class="_3vunz">
                                        <button onclick="closeOtherOptChild()" class="">OK</button>
                                    </div>
                                </div>
                            </div>';
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo '<div class="YNcdi">
                                <div class="INtAP">
                                    <p class="_1vwgT">Error</p>
                                    <div class="xVhXy">Something went wrong. Please try again later.</div>
                                    <div class="_3vunz">
                                        <button onclick="closeOtherOptChild()" class="">OK</button>
                                    </div>
                                </div>
                            </div>';
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
       echo $password_err = '<div class="YNcdi">
                                <div class="INtAP">
                                    <p class="_1vwgT">Error</p>
                                    <div class="xVhXy">Please enter a password.</div>
                                    <div class="_3vunz">
                                        <button onclick="closeOtherOptChild()" class="">OK</button>
                                    </div>
                                </div>
                            </div>';
        
    } elseif(strlen(trim($_POST["password"])) < 6){
        echo $password_err = '<div class="YNcdi">
                                <div class="INtAP">
                                    <p class="_1vwgT">Error</p>
                                    <div class="xVhXy">Password must have atleast 6 characters.</div>
                                    <div class="_3vunz">
                                        <button onclick="closeOtherOptChild()" class="">OK</button>
                                    </div>
                                </div>
                            </div>';
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
       echo $confirm_password_err = '<div class="YNcdi">
                                            <div class="INtAP">
                                                <p class="_1vwgT">Error</p>
                                                <div class="xVhXy">Please confirm password.</div>
                                                <div class="_3vunz">
                                                    <button onclick="closeOtherOptChild()" class="">OK</button>
                                                </div>
                                            </div>
                                        </div>';
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            echo $confirm_password_err =  '<div class="YNcdi">
                                            <div class="INtAP">
                                                <p class="_1vwgT">Error</p>
                                                <div class="xVhXy">Password did not match.</div>
                                                <div class="_3vunz">
                                                    <button onclick="closeOtherOptChild()" class="">OK</button>
                                                </div>
                                            </div>
                                        </div>';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password,email, type, lastip, privacy, coins) VALUES (?, ?, '$email', '$type', '$lastip', '$privacy', '$budgetzz')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){ 
                        // Prepare a select statement
                        $sql = "SELECT id, username, password FROM users WHERE username = ?";

                        if($stmt = mysqli_prepare($link, $sql)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "s", $param_username);

                            // Set parameters
                            $param_username = $username;

                            // Attempt to execute the prepared statement
                            if(mysqli_stmt_execute($stmt)){
                                // Store result
                                mysqli_stmt_store_result($stmt);

                                // Check if username exists, if yes then verify password
                                if(mysqli_stmt_num_rows($stmt) == 1){                    
                                    // Bind result variables
                                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                                    if(mysqli_stmt_fetch($stmt)){
                                        if(password_verify($password, $hashed_password)){
                                            // Password is correct, so start a new session
                                            session_start();

                                            // Store data in session variables
                                            $_SESSION["loggedin"] = true;
                                            $_SESSION["id"] = $id;
                                            $_SESSION["username"] = $username;                            
                                            
                                            //Sucsess Email registration
                                            getRegistrationMail($email,$username);
                                            // Redirect user to welcome page
                                            echo '<script>window.location.replace("/'.$gourl.'");</script>';
                                            echo '<div class="YNcdi">
                                                        <div class="INtAP">
                                                            <p class="_1vwgT">Sucsess</p>
                                                            <div class="xVhXy"><div class="_8In1k _2MCGl"><div></div><div></div><div></div><div>
                                                            </div></div>
                                                            <br></div>
                                                        </div>
                                                    </div>';
                                        }
                                    }
                                }
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
                        }
            } else{
                echo '<div class="YNcdi">
                                <div class="INtAP">
                                    <p class="_1vwgT">Error</p>
                                    <div class="xVhXy">Something went wrong. Please try again later.</div>
                                    <div class="_3vunz">
                                        <button onclick="closeOtherOptChild()" class="">OK</button>
                                    </div>
                                </div>
                            </div>';
                
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
