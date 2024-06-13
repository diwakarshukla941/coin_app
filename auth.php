<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="images/logo.png" alt="logo">
        </div>
    </div>

    <div class="signup">
        <div class="container">
            <div class="heading">
                <h2>Sign Up</h2>
            </div>
            <form action="auth.php" method="post">
                <div class="name">
                    <label for="signup-name">Name</label>
                    <input type="text" id="signup-name" name="name" required>
                </div>
                <div class="email">
                    <label for="signup-email">Email</label>
                    <input type="email" id="signup-email" name="email" required>
                </div>
                <div class="password">
                    <label for="signup-password">Password</label>
                    <input type="password" id="signup-password" name="password" required>
                </div>
                <input type="submit" value="Sign Up">
            </form>
            <div class="switch-form">
                <p>Already have an account? <a href="javascript:void(0)" onclick="showForm('login')">Sign in</a></p>
            </div>
        </div>
    </div>

    <div class="login">
        <div class="container">
            <div class="heading">
                <h2>Login</h2>
            </div>
            <form action="auth.php" method="post">
                <div class="email">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="email" required>
                </div>
                <div class="password">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required>
                </div>
                <input type="submit" value="Login">
            </form>
            <div class="switch-form">
                <p>Don't have an account? <a href="javascript:void(0)" onclick="showForm('signup')">Sign up</a></p>
            </div>
        </div>
    </div>

    <script>
        function showForm(formType) {
            const signupForm = document.querySelector('.signup');
            const loginForm = document.querySelector('.login');
            
            if (formType === 'signup') {
                signupForm.style.display = 'flex';
                loginForm.style.display = 'none';
                localStorage.setItem('formType', 'signup');
            } else if (formType === 'login') {
                signupForm.style.display = 'none';
                loginForm.style.display = 'flex';
                localStorage.setItem('formType', 'login');
            }
        }

        const formType = localStorage.getItem('formType') || 'signup';
        showForm(formType);
    </script>
</body>
</html>
