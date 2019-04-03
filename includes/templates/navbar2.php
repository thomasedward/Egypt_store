
        
            <form class="form-inline my-2 my-lg-0" >
            <input class="form-control mr-sm-2" id ="search" type="text" placeholder="Search" aria-label="Search" style="min-width:300px;">
            <button class="btn btn-outline-info my-2 my-sm-0" id="search-btn"> <i class="fa fa-search"></i> Search</button>
          </form>
         
          </ul>
        </div>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-globe"></i>  Cart <span class="badge badge-light ml-1">9</span>
            </a>
                          <!-- Drop Down -->

            <div class="dropdown-menu ml-auto" aria-labelledby="navbarDropdown" style="right:10px; width:600px;">
            <table class="table table-borderless">
              <thead class="bg-info">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product Image</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
             <div id="get_cart"></div>
                 
              </tbody>
            </table>
            </div>
            <!-- End drop down -->
         </li>


            <li class="nav-item dropdown  pr-2">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>  SignIn
            </a>

              <!-- Drop Down -->
              <div class="dropdown-menu bg-info ml-auto" aria-labelledby="navbarDropdown" style="right:10px; width:400px;">
              <h4 class="pl-4 text-white font-italic">Login</h4>
                <form class="px-4  py-3 text-secondary" method="POST">
                  <div class="form-group ">
                    <label for="exampleDropdownFormEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
               
                  <button type="submit" class="btn btn-success" id="signin">Sign in</button>
              </form>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Forget Password</a>
            </div>
            </li>

            <li class="nav-item pr-2">
              <a class="nav-link" href="customer-registerition.php"> <i class="fa fa-sign"></i> SignUp</a>
            </li>

          </ul>
        </div>




  </div>
</nav>