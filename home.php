<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
?>

<html>
<head>
    <title>PHP-Quiz</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Main Container */
        .main-container {
            background-color: #f7f7f7;
            padding: 20px;
            color: #333;
        }

        /* Header Styles */
        .header-container {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
        }

        /* Content Container */
        .content-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
        }

        /* List of Quiz Details */
        .quiz-details {
            list-style: none;
            margin-top: 20px;
            font-size: 16px;
        }

        .quiz-details li {
            margin-bottom: 10px;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 15px 25px;
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .start-btn {
            background-color: #4CAF50;
            color: white;
        }

        .start-btn:hover {
            background-color: #45a049;
        }

        .exit-btn {
            background-color: #f44336;
            color: white;
            margin-left: 10px;
        }

        .exit-btn:hover {
            background-color: #e53935;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
            border-radius: 8px;
        }

        footer .footer-container {
            font-size: 14px;
        }

        /* Media Queries for Mobile Devices */
        @media (max-width: 768px) {
            .content-container {
                padding: 20px;
            }

            h1 {
                font-size: 30px;
            }

            .quiz-details {
                font-size: 14px;
            }

            .btn {
                padding: 12px 20px;
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="main-container">
        <header>
            <div class="header-container">
                <h1>PHP Quiz</h1>
            </div>
        </header>

        <main>
            <div class="content-container">
                <h2>Welcome to PHP Quiz!</h2>
                <p>This is a simple quiz game to test your knowledge!</p>
                <ul class="quiz-details">
                    <li><strong>Number of questions:</strong> <?php echo $total; ?></li>
                    <li><strong>Type:</strong> Multiple Choice</li>
                    <li><strong>Estimated time for each question:</strong> <?php echo $total * 0.05 * 60; ?> seconds</li>
                    <li><strong>Score:</strong> +1 point for each correct answer</li>
                </ul>
                <a href="question.php?n=1" class="btn start-btn">Start Quiz</a>
                <a href="exit.php" class="btn exit-btn">Exit</a>
            </div>
        </main>

        <footer>
            <div class="footer-container">
                Copyright &copy; PHP Quiz
            </div>
        </footer>
    </div>
</body>
</html>

<?php unset($_SESSION['score']); ?>
<?php } else { header("location: index.php"); } ?>
