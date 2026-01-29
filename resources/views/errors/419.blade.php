<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Page Expired</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #3B82F6;
            --secondary: #60A5FA;
            --dark: #1E293B;
            --gray: #334155;
            --light-gray: #475569;
            --text: #E2E8F0;
            --muted: #94A3B8;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, var(--dark) 0%, var(--gray) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: var(--text);
        }

        .container {
            text-align: center;
            z-index: 10;
            padding: 3rem 2rem;
            max-width: 700px;
        }

        .clock-container {
            margin-bottom: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
        }

        .clock {
            font-size: 80px;
            opacity: 0.9;
        }

        .hourglass {
            font-size: 60px;
            animation: flip 3s ease-in-out infinite;
        }

        @keyframes flip {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(180deg); }
        }

        .error-code {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(110px, 22vw, 200px);
            font-weight: 700;
            color: var(--primary);
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 0 0 40px rgba(59, 130, 246, 0.3);
        }

        h1 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(32px, 6vw, 48px);
            color: var(--text);
            margin-bottom: 1rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .error-message {
            font-size: clamp(18px, 3vw, 22px);
            color: var(--secondary);
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .suggestion {
            font-size: clamp(15px, 2.2vw, 17px);
            color: var(--muted);
            margin-bottom: 2.5rem;
            line-height: 1.8;
            max-width: 550px;
            margin-left: auto;
            margin-right: auto;
        }

        .actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn-home, .btn-back {
            display: inline-block;
            padding: 15px 32px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            border: 2px solid;
        }

        .btn-home {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
        }

        .btn-back {
            background: transparent;
            border-color: var(--light-gray);
            color: var(--text);
        }

        .btn-home:hover {
            background: var(--secondary);
            border-color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(59, 130, 246, 0.4);
        }

        .btn-back:hover {
            background: var(--light-gray);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .clock-container {
                gap: 1rem;
            }

            .clock {
                font-size: 60px;
            }

            .hourglass {
                font-size: 45px;
            }

            .container {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">419</div>
        <h1>Page Expired</h1>
        
        <div class="clock-container">
            <span class="clock">🕐</span>
            <span class="hourglass">⏳</span>
        </div>
        
        <p class="error-message">
            Your session has timed out
        </p>
        
        <p class="suggestion">
            This page expired due to inactivity.<br>
            Please refresh and try again.
        </p>

        <div class="actions">
            <a href="/" class="btn-home">🏠 Return Home</a>
            <a href="#" onclick="location.reload(); return false;" class="btn-back">🔄 Refresh Page</a>
        </div>
    </div>
</body>
</html>