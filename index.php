<?php

include('db_conn.php');

if(isset($_SESSION['error'])){
  $error = $_SESSION['error'];
} 

if(isset($_SESSION['value'])){
  $value = $_SESSION['value'];
}


?>

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
       <div class="container">
                <form action="process.php" method="POST">
                    <div class="row">
                        <div class="input-field col s6">
                          <p class="grey-text">First Name<span class="red-text">*</span></p>
                          <input  type="text" class="validate input" value="<?php echo isset($value['f_name']) ? $value['f_name'] : '' ?>" name="f-name" placeholder="First Name">
                          <span class="red-text"><?php echo isset($error['f_name']) ? $error['f_name'] : '' ?></span>
                        </div>
                     
                            <div class="input-field col s6">
                              <p class="grey-text">Last Name<span class="red-text">*</span></p>
                              <input  type="text" class="validate input" name="l-name"placeholder="Last Name" value="<?php echo isset($value['l_name']) ? $value['l_name'] : '' ?>">
                              <span class="red-text"><?php echo isset($error['l_name']) ? $error['l_name'] : '' ?></span>
                            </div>
                            
                                <div class="input-field col s12">
                                  <p class="grey-text">Email<span class="red-text">*</span></p>
                                  <input type="email" class="validate input" name="email"placeholder="E-mail" value="<?php echo isset($value['email']) ? $value['email'] : '' ?>">
                                  <span class="red-text"><?php echo isset($error['email']) ? $error['email'] : '' ?></span>
                                </div>

                                <div class="input-field col s12">
                                  <p class="grey-text">Phone Number<span class="red-text">*</span></p>
                                  <input type="tel" class="validate input" name="tel"placeholder="Phone Number" value="<?php echo isset($value['tel']) ? $value['tel'] : '' ?>">
                                  <span class="red-text"><?php echo isset($error['tel']) ? $error['tel'] : '' ?></span>
                                </div>

                                <div class="input-field col s12">
                                  <p class="grey-text">Where are you attending from?<span class="red-text">*</span></p>
                                    <input type="text" class="validate input" name="address"placeholder="Address" value="<?php echo isset($value['address']) ? $value['address'] : '' ?>">
                                    <span class="red-text"><?php echo isset($error['address']) ? $error['address'] : '' ?></span>
                                  </div>

                                  <div class="input-field col s12">
                                    <p class="grey-text">What church do you attend?<span class="red-text">*</span></p>
                                    <input type="text" class="validate input" name="church"placeholder="Church Name" value="<?php echo isset($value['church']) ? $value['church'] : '' ?>">
                                    <span class="red-text"><?php echo isset($error['church']) ? $error['church'] : '' ?></span>
                                  </div>

                                <div class="input-field col s12">
                                  <p class="grey-text">would you love to be a part of any service team?, if yes, state which team?<small>(optional)</small></p>
                                  <textarea  type="text" name="serve" class="validate" style="height: 5rem; padding: .5rem;"></textarea>
                                </div>
                                
                                <p class="col s12">
                                  <span class="grey-text">Would you love to give towards the meeting?<small>(optional)</small></span><br>
                                  <label>
                                    <input type="checkbox"  name="give" />
                                    <span class="grey-text">yes
                                    </span>
                                  </label>
                                </p>

                                
                        <div class="input-field col s12">
                          <input style="height: 3.5rem; width: 100%;" type="submit" name="submit" class="btn green darken-2 white-text">
                        </div>
                           
                      </div>
                </form>
       </div>
   </section>
   <footer class="grey lighten-3" style="border-top: 1px solid #ccc; padding: 1rem 0;">
      <p class="grey-text center-align">2020 &copy;Dominion Mandate Network</p>
   </footer>

    <script src="materialize\js\jquery-3.5.0.min.js"></script>
    <script src="materialize\js\materialize.min.js"></script>
</body>
</html>