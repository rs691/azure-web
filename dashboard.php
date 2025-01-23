
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php
    require_once 'login_handler.php';
    $config = require 'config.php';
    
    try {
        $loginHandler = new LoginHandler($config['database']);
        
        if (!$loginHandler->isLoggedIn()) {
            header('Location: login.php');
            exit;
        }
        
        if (isset($_POST['logout'])) {
            $loginHandler->logout();
            header('Location: login.php');
            exit;
        }
    } catch (Exception $e) {
        die("System error. Please try again later.");
    }
    ?>

    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white shadow-lg">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <div class="text-xl font-semibold">
                        Welcome, <?php echo htmlspecialchars($loginHandler->session->get('username')); ?>!
                    </div>
                    <form method="POST">
                        <button type="submit" name="logout" 
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="max-w-6xl mx-auto mt-8 px-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
                <p>This is your protected dashboard page. Only logged-in users can see this content.</p>
            </div>
        </div>
    </div>
</body>
</html>