<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .navbar a:not(:first-child) {
                display: none;
            }

            .navbar a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .navbar.responsive {
                position: relative;
            }

            .navbar.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .navbar.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
</head>

<body>

    <div class="navbar" id="myNavbar">
        <?php
        function is_user_logged_in(): bool  //problème d'affichage de connexion
        {
            return isset($_SESSION['user_id']);
        }


        $menu_items = array(
            'Home' => '/',
            'cv' => '/cv',
            'projects' => '/projects',
            'Contact' => '/contact',
            'profile' => '/profile',

        );


        if (is_user_logged_in()) {
            $menu_items['Profile'] = '/profile';
            $menu_items['Logout'] = '/logout';
        } else {
            $menu_items['Login'] = '/login';
        }

        foreach ($menu_items as $title => $link) {
            echo "<a href=\"$link\">$title</a>";
        }
        ?>
        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">&#9776;</a>
    </div>

    <script>
        function toggleMenu() {
            var x = document.getElementById("myNavbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>

</body>

</html>