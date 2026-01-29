<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Denied</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&family=Roboto+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #4A5568;
            --accent: #E53E3E;
            --dark: #1A202C;
            --gray: #2D3748;
            --light-gray: #4A5568;
            --text: #E2E8F0;
        }

        body {
            font-family: 'Roboto Mono', monospace;
            background: var(--dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            color: white;
        }

        .container {
            text-align: center;
            z-index: 10;
            padding: 2rem;
            max-width: 800px;
            background: rgba(45, 55, 72, 0.8);
            border: 1px solid var(--light-gray);
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        }

        .warning-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .warning-icon {
            font-size: 40px;
        }

        .warning-text {
            font-family: 'Orbitron', sans-serif;
            font-size: clamp(18px, 3vw, 24px);
            color: var(--accent);
            font-weight: 700;
            letter-spacing: 3px;
        }

        .error-code {
            font-family: 'Orbitron', sans-serif;
            font-size: clamp(100px, 20vw, 200px);
            font-weight: 900;
            color: var(--accent);
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 0 0 20px rgba(229, 62, 62, 0.3);
        }

        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: clamp(28px, 5vw, 48px);
            color: var(--text);
            margin-bottom: 1rem;
            letter-spacing: 2px;
        }

        .lock-icon {
            font-size: 80px;
            margin: 1.5rem 0;
            display: inline-block;
        }

        .error-message {
            font-size: clamp(16px, 2.5vw, 20px);
            color: var(--text);
            margin-bottom: 1rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .suggestion {
            font-size: clamp(14px, 2vw, 16px);
            color: rgba(226, 232, 240, 0.7);
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-home, .btn-back {
            display: inline-block;
            padding: 15px 35px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            font-size: 16px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 2px solid;
        }

        .btn-home {
            background: var(--accent);
            border-color: var(--accent);
            box-shadow: 0 5px 20px rgba(229, 62, 62, 0.2);
        }

        .btn-back {
            background: transparent;
            border-color: var(--light-gray);
        }

        .btn-home:hover {
            background: #C53030;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(229, 62, 62, 0.3);
        }

        .btn-back:hover {
            background: var(--gray);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="warning-header">
            <span class="warning-icon">⚠️</span>
            <span class="warning-text">ACCESS DENIED</span>
            <span class="warning-icon">⚠️</span>
        </div>
        
        <div class="error-code">403</div>
        <h1>FORBIDDEN</h1>
        
        <div class="lock-icon">🔒</div>
        
        <p class="error-message">
            You don't have permission to access this resource
        </p>
        
        <p class="suggestion">
            This area is restricted. You may have entered a protected zone<br>
            or your access credentials are insufficient.
        </p>

        <div class="actions">
            <a href="/" class="btn-home">🏠 Return Home</a>
            <a href="#" onclick="history.back(); return false;" class="btn-back">← Go Back</a>
        </div>
    </div>
</body>
</html>