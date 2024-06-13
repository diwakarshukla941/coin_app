<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="css/search.css">
    <style>
        .crypto-card {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            min-width:360px;
        }

        .crypto-details h3 {
            color: #333;
        }

        .crypto-details {
            flex: 1;
        }

        .crypto-stats {
            flex: 1;
            text-align: right;
        }

        .crypto-details h3 {
            margin-top: 0;
            margin-bottom: 5px;
        }

        .crypto-details p,
        .crypto-stats p {
            margin: 0;
        }

        .error-message {
            color: red;
        }

        #resultsContainer {
            display: flex;
            flex-wrap: wrap;
        }

        .crypto-card {
            width: calc(50% - 30px); 
            margin: 20px 15px; 
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="images/logo.png" alt="logo">
        </div>
        <div class="user-info">
            <p>User Name</p>
            <a href="auth.php">logout</a>
        </div>
    </div>

    <div class="container">
        <h1>Search</h1>

        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Enter coin symbols">
            <button id="searchButton">Search</button>
        </div>

            <div id="resultsContainer">
            
            </div>
    </div>

    <script src="search.js"></script>
</body>
</html>
