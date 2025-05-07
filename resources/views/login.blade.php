<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - No Food Waste</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
        :root {
            --primary: #2C6B2F;
            --secondary: #FAF3E0;
            --accent: #FF7F50;
            --text-dark: #333;
            --text-light: #fff;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgba(44, 107, 47, 0.8), rgba(33, 84, 36, 0.9)), url('{{ asset('assets/images/food-waste-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }
        
        .card {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-radius: 16px;
            border: none;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.95);
        }
        
        .login-header {
            text-align: center;
            padding: 30px 20px;
            background: var(--primary);
            color: var(--text-light);
            position: relative;
        }
        
        .login-header h3 {
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .login-header p {
            opacity: 0.8;
            font-size: 0.9rem;
            margin-bottom: 0;
        }
        
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background: var(--secondary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .logo i {
            font-size: 2.5rem;
            color: var(--primary);
        }
        
        .card-body {
            padding: 40px 30px;
        }
        
        .form-label {
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--text-dark);
            margin-bottom: 8px;
        }
        
        .form-control {
            padding: 12px 15px;
            height: auto;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(44, 107, 47, 0.2);
        }
        
        .input-group-text {
            background: transparent;
            border-color: #e0e0e0;
            color: #777;
        }
        
        .btn-login {
            padding: 12px;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 8px;
            background: var(--primary);
            border: none;
            transition: all 0.3s;
            position: relative;
        }
        
        .btn-login:hover {
            background: #1f5023;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(44, 107, 47, 0.3);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .demo-accounts {
            background: var(--secondary);
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--primary);
        }
        
        .demo-accounts h6 {
            color: var(--primary);
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        .demo-accounts p {
            margin-bottom: 0;
            font-size: 0.85rem;
            color: #555;
            line-height: 1.6;
        }
        
        .invalid-feedback {
            display: block;
            font-size: 0.8rem;
            margin-top: 8px;
        }
        
        .alert {
            border-radius: 8px;
            font-size: 0.9rem;
        }
        
        .input-group {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            cursor: pointer;
            color: #777;
        }
        
        /* Animation effects */
        .card {
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card-body {
                padding: 30px 20px;
            }
            
            .login-header {
                padding: 25px 15px;
            }
            
            .logo {
                width: 70px;
                height: 70px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card">
            <div class="login-header">
                <div class="logo-container">
                    <div class="logo">
                        <i class="fas fa-utensils"></i>
                    </div>
                </div>
                <h3>Welcome Back</h3>
                <p>No Food Waste Initiative</p>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   required 
                                   autofocus 
                                   placeholder="Enter your email">
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="fas fa-info-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   required 
                                   placeholder="Enter your password">
                            <span class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                <i class="fas fa-info-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100 btn-login mt-2">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>
                </form>
                
                <div class="demo-accounts mt-4">
                    <h6><i class="fas fa-info-circle me-1"></i> Demo Accounts</h6>
                    <p><strong>Admin:</strong> admin@gmail.com<br>
                    <strong>Donator:</strong> donator@gmail.com<br>
                    <strong>Recipient:</strong> penerima@gmail.com<br>
                    <strong>Password for all:</strong> 12345678</p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const icon = document.querySelector('.password-toggle i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
        
        // Add loading state to button when form is submitted
        document.querySelector('form').addEventListener('submit', function() {
            const button = document.querySelector('.btn-login');
            button.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Logging in...';
            button.disabled = true;
        });
    </script>
</body>
</html>
