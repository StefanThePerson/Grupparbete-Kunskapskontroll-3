<?php
// $user = fetchUserById($_GET['id']);
$currentUser = fetchUserById($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="sv"> 
<head>
  <meta charset="utf-8">
  <title><?php echo $pageTitle; ?></title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" type="text/css" href="css/admin_page.css"/>
  <link rel="stylesheet" type="text/css" href="css/products_page.css"/>
  <link rel="stylesheet" type="text/css" href="css/profile.css"/>
  <link rel="stylesheet" type="text/css" href="css/forms.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<!-- The body id helps with highlighting current menu choice -->
<body id="<?php echo $pageId ?>">

  <!-- Above header -->
  <header id="above">
    <nav class="login">
      <?php 
        if (isset($_SESSION['first_name'])) {
          $displayUsername = ucfirst($_SESSION['first_name']);
          
          $profileNav = '<div class="dropdown" id="navbar-list-4">
                          <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../' . $currentUser["img_url"] . '" width="40" height="40" class="rounded-circle top-nav-profile">
                              </a>
                              <div class="dropdown-menu profile-dropdown" aria-labelledby="navbarDropdownMenuLink">
                                <form action="../profile.php" method="get">
                                  <input type="hidden" name="id" value="' . $currentUser["id"] . '">
                                  <input type="submit" class="dropdown-item" id="my-profil" value="My Profile">
                                </form>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                              </div>
                            </li>   
                          </ul>
                        </div>';

          $aboveNav = "Welcome $displayUsername  $profileNav";
        } else {
          $aboveNav = "<a href='login.php'>Log In</a>";
        }

        echo $aboveNav;
      ?>
    </nav>
  </header>


  <!-- Header with logo and main navigation -->
  <header id="top">

    <!-- Main navigation menu -->
    <nav class="navbar navbar-dark bg-dark admin-navbar">
      <a id="home-link"     href="index.php">Users</a>
      <a id="products-link"   href="products.php">Products</a>
      <a id="orders-link" href="orders.php">Pending Orders</a>
      <a id="create_product-link"   href="create_products.php">Create Products</a>
      <a id="create_user-link"   href="register.php">Create Users</a>
    </nav>
  </header>