<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.css"> -->

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


<div class="form-container">
    <div class="form-layer">
        <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" id="phoneNumber" name="phoneNumber" class="form-input" />
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-input" />
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-input" />
        </div>
    </div>
    
    <div class="form-layer">
        <div class="form-group">
            <label for="domain">Domain:</label>
            <input type="text" id="domain" name="domain" class="form-input" />
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="checkbox" id="status" name="status" class="form-checkbox" />
        </div>
        <div class="form-group">
            <label for="provisioned">Provisioned:</label>
            <input type="checkbox" id="provisioned" name="provisioned" class="form-checkbox" />
        </div>
        <div class="form-group">
            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" class="form-input" />
        </div>
    </div>
</div>

<div class="form-container">
    <div class="form-layer">
        <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" id="phoneNumber" name="phoneNumber" class="form-input" />
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-input" />
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-input" />
        </div>
    </div>
    
    <div class="form-layer">
        <div class="form-group">
            <label for="domain">Domain:</label>
            <input type="text" id="domain" name="domain" class="form-input" />
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="checkbox" id="status" name="status" class="form-checkbox" />
        </div>
        <div class="form-group">
            <label for="provisioned">Provisioned:</label>
            <input type="checkbox" id="provisioned" name="provisioned" class="form-checkbox" />
        </div>
        <div class="form-group">
            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" class="form-input" />
        </div>
    </div>
</div>


 
</body>
</html>
