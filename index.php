<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100">
  <?php
  require 'login_handler.php';
  $config = require 'config.php';
  
  

  if (!isset($config['database'])) { // Or 'db' depending on your preference
      die('Database configuration is missing.');
  }
  

  try {
      $loginHandler = new LoginHandler($config['database']);
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $username = $_POST['username'] ?? '';
          $password = $_POST['password'] ?? '';
          
          if ($loginHandler->login($username, $password)) {
              header('Location: dashboard.php');
              exit;
          } else {
              $error = "Invalid username or password";
          }
      }
  } catch (Exception $e) {
      $error = "System error. Please try again later.";
  }
  ?>

<div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" class="space-y-4">
                <div>
                    
                    <input id="username" type="text" name="username" required title="Enter your username" placeholder="Username"
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div>
                
                    <input type="password" name="password" required title="Enter your password" placeholder="Password"
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <button type="submit" 
                        class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition duration-200">
                    Login
                </button>
            </form>
            
            <div class="mt-4 text-center">
                <a href="register.php" class="text-blue-500 hover:text-blue-600">
                    Don't have an account? Register here
                </a>
            </div>
        </div>
    </div>



   

</body>
</html>