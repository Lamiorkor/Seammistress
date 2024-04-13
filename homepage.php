
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeamMistress - Homepage</title>
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <div class="container">
        <!--aside section start-->
        <aside>

            <div class="top">

                <div class="logo">
                    <img src="../images/SeamMistress.png" alt="Logo" style="width: 50px;"/>
                    <h2><span class="danger">SeamMistress</span><h2>
                </div>
                <div class="close">
                    <span class="material-symbols-sharp">close</span>                
                </div>
            </div>
            <!-- end top -->

            <div class="sidebar">
                <a href="dashboard.php" class="active">
                    <span class="material-symbols-sharp">grid_view</span>
                    <h3>Homepage</h3>
                </a>
                <a href="../login/logout.php">
                    <span class="material-symbols-sharp">login</span>
                    <h3>Register/Login (Admin)</h3>
                </a>

            </div>
        </aside>
        <!--aside section end-->

        <!--main section start-->
        <main>
            <img src="../images/seamstress1.jpeg" alt="Seamstress Image1">
            <img src="../images/seamstress2.jpeg" alt="Seamstress Image2">
            <img src="../images/seamstress3.jpeg" alt="Seamstress Image3">
            <img src="../images/seamstress4.jpeg" alt="Seamstress Image4">
        </main>
        <!--main section end-->

        <!--right section start-->
        <div class="right">
            <div class="top">
                <h2>Welcome</h2>
            </div>
        </div>
        <!--right section end-->
    </div>



    <script src="../js/dashboard.js"></script>
</body>
</html>
