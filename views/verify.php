<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .verify-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .verify-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            font-size: 1.2rem;
            text-align: center;
        }
        .verify-code {
            margin-top: 20px;
            color: #6c757d;
            text-align: center;
        }
        .btn-verify {
            width: 100%;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

    <div class="verify-container">
        <div class="verify-header">Enter Your Verification Code</div>
        
        <!-- Verification Form -->
        <form action="../auth/auth.php" method="POST">
            
            <input type="hidden" name="action" value="verify">
            <div class="form-group">
                <input type="text" name="code" class="form-control" placeholder="Enter code here" maxlength="32" required>
            </div>
            <button type="submit" class="btn btn-primary btn-verify">Verify</button>
        </form>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
