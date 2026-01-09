<x-layout>
    <div class="signup-container">
        <div class="signup-header">
            <h1>Create Your Account</h1>
            <p class="subtitle">Join our community and start shopping today</p>
        </div>
        
        <form class="signup-form" method="POST" action="/signup">
            @csrf
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="name" placeholder="Enter your full name" required>

            </div>

            @error('name')
            <p class="text-red-700 font-semibold">
                {{ $message }}
            </p>
            @enderror
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required>
            </div>

            @error('email')
            <p class="text-red-700 font-semibold">
                {{ $message }}
            </p>
            @enderror
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a secure password" required>
                <div class="password-hint">
                    <span class="hint-icon">ℹ️</span>
                    <span>Must be at least 8 characters</span>
                </div>
            </div>

            @error('password')
            <p class="text-red-700 font-semibold">
                {{ $message}}
            </p>
            @enderror
            
            <div class="form-group">
                <label for="newsletter">
                    <input type="checkbox" id="newsletter" name="newsletter" checked>
                    <span>Receive updates about new products and special offers</span>
                </label>
            </div>
            
            <div class="form-group terms">
                <label for="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <span>I agree to the <a href="/terms">Terms of Service</a> and <a href="/privacy">Privacy Policy</a></span>
                </label>
            </div>
            
            <button type="submit" class="signup-button">Create Account</button>
        </form>
        
        <div class="signup-footer">
            <p>Already have an account? <a href="/login" class="login-link">Log in here</a></p>
            
            <div class="divider">
                <span>Or sign up with</span>
            </div>
            
            <div class="social-signup">
                <a href="/auth/google" class="social-button google">
                    <span class="social-icon"></span>
                    <span>Google</span>
                </a>
            </div>
        </div>
    </div>
    
    <style>
        .signup-container {
            max-width: 450px;
            margin: 40px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
        }
        
        .signup-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .signup-header h1 {
            color: #2d3748;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .subtitle {
            color: #718096;
            font-size: 15px;
            margin-top: 0;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            color: #4a5568;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
        }
        
        .form-group input[type="checkbox"] {
            margin-right: 10px;
        }
        
        .form-group label[for="newsletter"],
        .form-group label[for="terms"] {
            display: flex;
            align-items: flex-start;
            font-weight: normal;
            cursor: pointer;
        }
        
        .password-hint {
            display: flex;
            align-items: center;
            margin-top: 6px;
            font-size: 13px;
            color: #718096;
        }
        
        .hint-icon {
            margin-right: 6px;
            font-size: 12px;
        }
        
        .terms {
            background-color: #f7fafc;
            padding: 15px;
            border-radius: 8px;
            margin-top: 25px;
        }
        
        .terms a {
            color: #4299e1;
            text-decoration: none;
            font-weight: 500;
        }
        
        .terms a:hover {
            text-decoration: underline;
        }
        
        .signup-button {
            width: 100%;
            padding: 16px;
            background-color: #3182ce;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.2s;
        }
        
        .signup-button:hover {
            background-color: #2c6cb0;
        }
        
        .signup-footer {
            margin-top: 30px;
            text-align: center;
        }
        
        .signup-footer p {
            color: #718096;
            font-size: 15px;
        }
        
        .login-link {
            color: #3182ce;
            text-decoration: none;
            font-weight: 500;
        }
        
        .login-link:hover {
            text-decoration: underline;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: #a0aec0;
        }
        
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .divider span {
            padding: 0 15px;
            font-size: 14px;
        }
        
        .social-signup {
            display: flex;
            gap: 15px;
        }
        
        .social-button {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 14px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.2s, transform 0.1s;
        }
        
        .social-button:hover {
            transform: translateY(-2px);
        }
        
        .social-button.google {
            background-color: #f8f9fa;
            color: #3c4043;
            border: 1px solid #dadce0;
        }
        
        .social-button.google:hover {
            background-color: #f1f3f4;
        }
        
        .social-button.facebook {
            background-color: #1877f2;
            color: white;
            border: 1px solid #1877f2;
        }
        
        .social-button.facebook:hover {
            background-color: #166fe5;
        }
        
        .social-icon {
            font-weight: bold;
            margin-right: 10px;
        }
        
        @media (max-width: 480px) {
            .signup-container {
                margin: 20px;
                padding: 25px 20px;
            }
            
            .social-signup {
                flex-direction: column;
            }
        }
    </style>
</x-layout>