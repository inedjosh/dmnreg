<?php


include('db_conn.php');

include('mail.php');

$error = array();

$data = array();

if(isset($_POST['submit'])){
    $f_name = mysqli_real_escape_string($conn, $_POST['f-name']);
    $l_name = mysqli_real_escape_string($conn, $_POST['l-name']);
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $address =  mysqli_real_escape_string($conn, $_POST['address']);
    $tel =  mysqli_real_escape_string($conn, $_POST['tel']);
    $church =  mysqli_real_escape_string($conn, $_POST['church']);
    $give =  mysqli_real_escape_string($conn, $_POST['give']);
    $serve =  mysqli_real_escape_string($conn, $_POST['serve']); 

    // '/^[a-z0-9]+$/i';

    if(empty($f_name) || !preg_match( '/^[a-z0-9]+$/i', $f_name)){
        $error['f_name'] = 'invalid or empty first name';
    } else{
        $data['f_name'] = $f_name; 
    }

    if(empty($l_name) || !preg_match( '/^[a-z0-9]+$/i', $l_name)){
        $error['l_name'] = 'invalid or empty last name';
    }else{
        $data['l_name'] = $l_name;
        echo '<br>'; 
        
    }

    if(empty($email)){
        $error['email'] = 'email field cannot be empty';
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'enter a valid email please';
    }else{
        $data['email'] = $email; 
    }

    if(empty($address)){
        $error['address'] = 'address field cannot be empty';
    }else{
        $data['address'] = $address; 
    }

    if(empty($tel)){
        $error['tel'] = 'please enter a valid phone number';
    }else{
        $data['tel'] = $tel; 
    }

    if(empty($church)){
        $error['church'] = 'please enter the name of the church you fellowship with';
    }else{
        $data['church'] = $church; 
    }

    if(!empty($give)){
        $giving = 'yes';
    } else{
        $giving = 'no';
    }

    if(empty($serve)){
        $service = false;
    } else{
        $service = $serve;
    }


    if(count($error) === 0){
        $sql = "INSERT INTO userinfo(f_name, l_name, email, phone, church, address, give, serve ) VALUES('$f_name', '$l_name', '$email', '$tel', '$church', '$address', '$giving', '$service')";
        if(mysqli_query($conn, $sql)){
            $f_name = strtoupper($f_name);
            $l_name = strtoupper($l_name);
            $subject = 'Hello '. $f_name.' '.$l_name;
            $msg = '<p " style=" font-size:1.2rem;">It is with gladness and great joy that we write to you in anticipation of this year\'s soteria camp meeting. we are confident and definite that God will do a lot of things in your life and take you to greater levels indeed! <br>
            The theme for this year\'s camp meeting is "PROOF PRODUCERS"(Custodians of Dunamis).<br> After ths meeting you\'ll see the power of god flow through you and in you in unusual ways.<br><br>
            some important details to note are:
            <strong>Date: 20TH - 23RD.</strong><br>
            <strong>Venue: The Ambassadors Church, Opposite 2\'1 Garden, Kubwa, Abuja.</strong> 
            The venue and some other necessary information will be commuinicated as well soonest to you.<br>
            keep anticipating and pray aong with us.<br>
            Best Regards<br>
            Dominion Ekwueme<br>
            </p>
            ';
         if(sendMail('inedujoshua@gmail.com', $email, $subject, $msg)){
             header('location:registered.php?reg=sent');
         } else{
            header('location:registered.php?reg=notsent');
         }
        } else{
           die('something went wrong!');
           echo '<a href="index.php">go back</a>';
        }
    } else{
        $_SESSION['error'] = $error;

        $_SESSION['value'] = $data;
        header('location:index.php');
    }
}

if(isset($_POST['submit_login'])){
    $pass = mysqli_real_escape_string($conn, $_POST['admin']);
    $correct = 'dmn123';

    if($pass === $correct){
       header('location:registered.php?reg=data');
    }else{
        $_SESSION['pass'] = 'password is not correct!';
        header('location:registered.php?reg=login');
    }
}