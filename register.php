<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php
    require_once 'login_handler.php';
    $config = require 'config.php';
    
    try {
        $loginHandler = new LoginHandler($config['database']);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $result = $loginHandler->register($username, $email, $password);
            
            if ($result === true) {
                header('Location: login.php?registered=1');
                exit;
            } else {
                $error = $result;
            }
        }
    } catch (Exception $e) {
        $error = "System error. Please try again later.";
    }
    ?>

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
            
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Username</label>
                    <input type="text" name="username" required
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div>
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" required
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div>
                    <label class="block text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" required
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <button type="submit" 
                        class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition duration-200">
                    Register
                </button>
            </form>
            
            <div class="mt-4 text-center">
                <a href="login.php" class="text-blue-500 hover:text-blue-600">
                    Already have an account? Login here
                </a>
            </div>
        </div>
    </div>
</body>
</html>