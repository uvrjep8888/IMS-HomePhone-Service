<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
        <!-- Bootstrap core CSS-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Custom fonts for this template-->
        <link href="<?php echo $base_url ?>assets/font/all.min.css" rel="stylesheet" type="text/css">

            <link href="<?php echo $base_url ?>assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
            <link href="<?php echo $base_url ?>assets/fontawesome/css/all.min.css" rel="stylesheet">

            <script src="<?php echo $base_url ?>assets/js/jquery.js" type="text/javascript"></script>
            <script src="<?php echo $base_url ?>assets/js/jquery.min.js" type="text/javascript"></script>
            <script src="<?php echo $base_url ?>assets/js/ims.js" type="text/javascript"></script>

            <script>  
                var base_url  = "<?php echo base_url();?>";
            </script>

          

    <style>
        .navigation{
            color: #54595F;
            font-size: 17px;
            font-family: 'Arial';
            font-weight: 300; 
        }

        .jumbotron {
            background-color: #4B286D;
            color: #FFFFFF; 
            height: 190px;
            margin-top: 10px;
            font-family: 'Arial';
            justify-content: center;
            align-items: center;
            text-align: center;
            padding-top: 30px;
        }

        .search-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .search-input {
            width: 300px;
            height: 40px;
            padding: 5px;
            font-size: 18px;
            border-radius: 5px;
            border: none;
        }

        .search-button {
            height: 40px;
            padding: 0 20px;
            font-size: 18px;
            background-color: #FFFFFF;
            color: #4B286D;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px; /* Add some space between the input and button */
        }

        .search-button:hover {
            background-color: #D3C1E0;
        }


        .search-text {
            height: 50px;
            font-size: 40px;
            margin-bottom: 30px;

        }

        .form-container {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 20px; 
        }

.form-layer {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.form-input {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-checkbox {
    width: 20px;
    height: 20px;
    margin-top: 8px;
}

@media (min-width: 768px) {
    .form-container {
        flex-direction: row;
    }

    .form-layer {
        flex: 1;
    }

    .form-group {
        flex-direction: row;
        align-items: center;
    }

    .form-group label {
        flex: 1;
        margin-bottom: 0;
    }

    .form-input, .form-checkbox {
        flex: 2;
    }
}

@media (max-width: 767px) {
    .form-container {
        padding: 15px;
    }

    .form-group label {
        font-size: 14px;
    }

    .form-input {
        font-size: 14px;
        padding: 8px;
    }
}


    </style>
</head>
<body>

<div class=" navigation"> IMS Home Phone Subscriber Service </div>
<div class="jumbotron"> 
    <p class="search-text" >Search Phone Subscriber</p> 
    <div>
        <input type="text" name="phoneNumber" class="search-input" />
        <button class="search-button">Search</button>
    </div>
</div>


<div id="data"></div>
</body>
</html>
