<html>
<head>
    <style>
        .alert {
            padding: 20px;
            background-color: #f44336; /* merah */
            color: white;
            margin-bottom: 15px;
            width:250px; 
            max-width:250px;
            }
        .alert2{
            padding: 20px;
            background-color: #86DC24; /* hijau */
            color: white;
            margin-bottom: 15px;
            width:250px; 
            max-width:250px;
        }
        

            /* The close button */
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }
    /* When moving the mouse over the close button */
        .closebtn:hover {
            color: black;
        }

    </style>
</head>
<body>
    <div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]);?>"> 
        <div>
            <div>
                <label for="username">username</label>
            </div>
            <div >
                <input type="text" id="username" name="username" placeholder="Username" value=
                "<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES) : ''; ?>">
            </div>
        </div>

        <div>
            <div >
                <label for="fname">password</label>
            </div>
            <div >
                <input type="text" id="password" name="password" placeholder="password" value=
                "<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES) : ''; ?>">
            </div>
        </div>
        <input type="submit">
    </div>

    <?php
        $username = $password =  "";
        $usernameERR = $passwordERR = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            if (empty($_POST["username"])) {
                giveAlert("Username masih kosong!!!");
                $usernameERR = 1;
            } 
            if (empty($_POST["password"])) {
                giveAlert("Password masih kosong!!!");
                $passwordERR = 1;
            }
            if (strlen($_POST["username"]) > 7){
                giveAlert("Username tidak boleh lebih dari tujuh karakter!!!");
                $usernameERR = 1;
            }

            if (strlen($_POST["password"]) < 10){
                giveAlert("password harus lebih dari 10 karakter!!!");
                $passwordERR = 1;
            }

            if (!preg_match('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])^', $_POST["password"]))
            {
                giveAlert("password yang dinputkan harus terdiri dari huruf kapital, huruf kecil dan angka!!");
                $passwordERR = 1;
            }

            //jika semua benar
            if($usernameERR == 0 && $passwordERR == 0) {
                ?>
                <div class="alert2">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    submit data berhasil
                </div>
            <?php
            }

            $username = $_POST["username"];
            $password = $_POST["password"];
        }

        function giveAlert($error){
            ?>
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <?php echo $error;?>
                </div>
            <?php
        }
       
    ?>

    

    
</body>
</html>