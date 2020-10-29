
<?php

include('db_conn.php');

if(isset($_GET['reg'])){
    if($_GET['reg'] === 'sent'){
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Camp Meeting 2020 Registration</title>
            <link rel="stylesheet" href="materialize\css\materialize.min.css">
            <link rel="stylesheet" href="style.css">
            <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
        </head>
        <body>
           <header class="grey lighten-4" style="padding:.3rem; border-bottom: 1px solid #ccc;">
                <h6 class="grey-text center-align">
                    DOMINION MANDATE NETWORK 
                </h6>
                <P class="grey-text center-align">
                    2020 Camp Meeting Registration
                </P>
           </header>
        
        <div cass="row" style="margin:2rem 1rem 10rem;">
            <div class="col s12">
            <p class="grey-text">your entry have been succesfully registered, an email has been sent to you, check your mail for further details about the event!</p>
            </div>
            </div>
            <footer class="grey lighten-3" style="border-top: 1px solid #ccc; padding: 1rem 0; ">
            <p class="grey-text center-align">2020 &copy;Dominion Mandate Network</p>
         </footer>';
    } elseif($_GET['reg'] === 'notsent'){
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Camp Meeting 2020 Registration</title>
            <link rel="stylesheet" href="materialize\css\materialize.min.css">
            <link rel="stylesheet" href="style.css">
            <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
        </head>
        <body>
           <header class="grey lighten-4" style="padding:.3rem; border-bottom: 1px solid #ccc;">
                <h6 class="grey-text center-align">
                    DOMINION MANDATE NETWORK 
                </h6>
                <P class="grey-text center-align">
                    2020 Camp Meeting Registration
                </P>
           </header>
        
        <div cass="row" style="margin:2rem 1rem 10rem;">
        <div class="col s12">
        <p class="grey-text">your entry have been succesfully registered but we coud not send you a mail at the moment due to some issue, the mail will contain some important information about the meeting. if the email you entered is not corrrect ensure you register again with a correct email to get your mail, otherwise, we\'ll work on our system and ensure you get the mail.</p>
        </div>
        </div>
        <footer class="grey lighten-3" style="border-top: 1px solid #ccc; padding: 1rem 0; ">
        <p class="grey-text center-align">2020 &copy;Dominion Mandate Network</p>
     </footer>';
    } elseif($_GET['reg'] === 'data'){
        $sql = "SELECT * FROM userinfo";
        $query = mysqli_query($conn, $sql);
        $datas = mysqli_fetch_all($query, MYSQLI_ASSOC);
       
       
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Camp Meeting 2020 Registration</title>
            <link rel="stylesheet" href="materialize\css\materialize.min.css">
            <link rel="stylesheet" href="style.css">
            <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
        </head>
        <body>
           <header class="grey lighten-4" style="padding:.3rem; border-bottom: 1px solid #ccc;">
                <h6 class="grey-text center-align">
                    DOMINION MANDATE NETWORK 
                </h6>
                <P class="grey-text center-align">
                    2020 Camp Meeting Registration
                </P>
           </header>
        
        <h6 class="grey-text" style="text-transform:capitalize;"> total number registered: '.count($datas).'</h6>
           
      <table class="striped responsive-table" style="margin:2rem 0 7rem">
      <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Church</th>
            <th>Address</th>
            <th>Giving</th>
            <th>Serve</th>
        </tr>
      </thead>

      <tbody>
      ';

       
           foreach($datas as $data){
            echo '<tr>';
            echo '<td>'.$data['f_name'] ,' '. $data['l_name'].'</td>';
            echo '<td>'.$data['email'].'</td>';
            echo '<td>'.$data['phone'].'</td>';
            echo '<td>'.$data['church'].'</td>';
            echo '<td>'.$data['address'].'</td>';
            echo '<td>'.$data['give'].'</td>';
            echo '<td>'.$data['serve'].'</td>';
            echo '</tr>';
           }
        
       
     
          
        
        
      echo   '
              
            </tbody>
             </table>
      <footer class="grey lighten-3" style="border-top: 1px solid #ccc; padding: 1rem 0; ">
              <p class="grey-text center-align">2020 &copy;Dominion Mandate Network</p>
           </footer>
        ';
    } elseif($_GET['reg'] === 'login'){
        if(isset($_SESSION['pass'])){
            $pass = $_SESSION['pass'];
         } else{
             unset($_SESSION['pass']);
         }
         
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Camp Meeting 2020 Registration</title>
            <link rel="stylesheet" href="materialize\css\materialize.min.css">
            <link rel="stylesheet" href="style.css">
            <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
        </head>
        <body>
           <header class="grey lighten-4" style="padding:.3rem; border-bottom: 1px solid #ccc;">
                <h6 class="grey-text center-align">
                    DOMINION MANDATE NETWORK 
                </h6>
                <P class="grey-text center-align">
                    2020 Camp Meeting Registration
                </P>
           </header>
        
           <section>
            <form action="process.php" method="POST">
           <div class="row">
                <div class="container">
                <div class="input-field col offset-s3 s6 center">
                    <p class="grey-text">Admin Login</p>
                    <input  type="text" class="validate input" name="admin"placeholder="Password">
                    <span class="red-text">'.$pass.'</span>
                    
                </div>
                <div class="col s12 center">
                    <input type="submit" name="submit_login" class="green btn white-text" value="login">
                    
                </div>
                </div>
        
           </div>
            </form>
           </section>
        
        
        <footer class="grey lighten-3" style="border-top: 1px solid #ccc; padding: 1rem 0; ">
              <p class="grey-text center-align">2020 &copy;Dominion Mandate Network</p>
           </footer>';
    }
}




?>
