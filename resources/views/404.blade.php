<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - Virtual Collaboration Hub</title>
    <link rel="icon" href="/images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .error-container {
            max-width: 500px;
            text-align: center;
        }
        
        .error-code {
            font-size: 8rem;
            font-weight: 800;
            line-height: 1;
            background: linear-gradient(to right, #6366f1, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }
        
        .error-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1e293b;
        }
        
        .error-message {
            font-size: 1.125rem;
            color: #64748b;
            margin-bottom: 2rem;
        }
        
        .error-image {
            max-width: 300px;
            margin: 0 auto 2rem;
        }
        
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s;
            font-size: 0.875rem;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
        }
        
        .btn-primary {
            background: linear-gradient(to right, #6366f1, #ec4899);
            color: white !important;
            border: none;
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.25);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(99, 102, 241, 0.3);
        }
        
        .btn-icon {
            margin-right: 0.5rem;
        }
        
        /* Animation */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code floating">404</div>
        <h1 class="error-title">Page Not Found</h1>
        <p class="error-message">Oops! The page you're looking for doesn't exist or has been moved.</p>
        
        <svg class="error-image" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
            <path d="M250,392.9c-79.5,0-144.1-64.5-144.1-144.1S170.5,104.8,250,104.8s144.1,64.5,144.1,144.1S329.5,392.9,250,392.9z" fill="#f1f5f9"/>
            <path d="M250,106.8c78.4,0,142.1,63.7,142.1,142.1S328.4,390.9,250,390.9s-142.1-63.7-142.1-142.1S171.6,106.8,250,106.8 M250,102.8c-80.6,0-146.1,65.4-146.1,146.1S169.4,394.9,250,394.9s146.1-65.4,146.1-146.1S330.6,102.8,250,102.8L250,102.8z" fill="#e2e8f0"/>
            <path d="M258.9,248.8l-53.2-92.1c-1.8-3.1-0.7-7.1,2.4-8.9c3.1-1.8,7.1-0.7,8.9,2.4l53.2,92.1c1.8,3.1,0.7,7.1-2.4,8.9 C264.7,253,260.7,251.9,258.9,248.8z" fill="#6366f1"/>
            <path d="M258.9,248.8l53.2-92.1c1.8-3.1,5.8-4.2,8.9-2.4c3.1,1.8,4.2,5.8,2.4,8.9l-53.2,92.1c-1.8,3.1-5.8,4.2-8.9,2.4 C258.2,255.9,257.1,251.9,258.9,248.8z" fill="#ec4899"/>
            <circle cx="250" cy="270" r="15" fill="#1e293b"/>
            <path d="M250,330c-33.1,0-60-26.9-60-60h10c0,27.6,22.4,50,50,50s50-22.4,50-50h10C310,303.1,283.1,330,250,330z" fill="#64748b"/>
        </svg>
        
        <a href="/" class="btn btn-primary">
            <i class="fas fa-home btn-icon"></i> Back to Home
        </a>
    </div>
</body>
</html>

