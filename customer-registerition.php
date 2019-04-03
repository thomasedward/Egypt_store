<?php
//session_start();

$title = 'Egypt Store';


include "init.php";
?>
 </ul>
 </div>
 </div>
 </nav>

<div class="container-fluid pt-5 pb-5">

    <div class="row">

        <div class="col-md-2"></div>
          <div class="col-md-8">
                                     
                                <div class="card  " >
                                 
                                <div class="card-header bg-gradient-info">
                                   Sign Up For Customer
                                </div>
                                 
                                <div class="card-body">

                                    <form method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="inputfirstname4">First Name</label>
                                        <input type="text" id="f-name" name="first" class="form-control" placeholder="First name">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="inputlastname4">Last Name</label>
                                        <input type="text" id="l-name" name="last" class="form-control" placeholder="Last name">
                                        </div>
                                    </div>
                                            
                                            <div class="form-group ">
                                            <label for="inputEmail4">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                                            </div>

                                            <div class="form-group ">
                                            <label for="inputPassword4">Password</label>
                                            <input type="password" id="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                            </small>
                                            </div>
                                            <div class="form-group ">
                                            <label for="inputPassword4">Re-enter Password</label>
                                            <input type="password" id="password2" name="password2" class="form-control" id="inputPassword4" placeholder="Password again">
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                            </small>
                                            </div>

                                            <div class="form-group ">
                                            <label for="inputmobile4">Mobile</label>
                                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter Your phone">
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="inputAddress">Address</label>
                                                <input type="text" id="address" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress2">Address 2</label>
                                                <input type="text" id="address2" name="address2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                            </div>

                                           
                                        <div class=" float-right">
                                            <button type="submit" class="btn btn-outline-success  "  id="signup" name="signup">Sign Up</button>
                                        </div>
                                    </form>

                                </div>
                           
                                <div class="card-footer text-center">

        <div id="signup-msg"></div>

                                </div>
                                </div>
                          
           </div>
        <div class="col-md-2"></div>

    </div>

</div>

<?php
include $tpl .  "footer.php";
?>
