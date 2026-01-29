<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>429 - Too Many Requests</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --orange: #F97316;
            --dark-orange: #EA580C;
            --dark: #18181B;
            --gray: #27272A;
            --light-gray: #3F3F46;
            --text: #FAFAFA;
            --muted: #A1A1AA;
        }

        body {
            font-family: 'Inter', sans-serif;
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

        .icons-container {
            margin-bottom: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
        }

        .traffic-light {
            font-size: 70px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .speed-icon {
            font-size: 60px;
        }

        .error-code {
            font-family: 'Inter', sans-serif;
            font-size: clamp(110px, 22vw, 200px);
            font-weight: 700;
            color: var(--orange);
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(249, 115, 22, 0.3);
        }

        h1 {
            font-family: 'Inter', sans-serif;
            font-size: clamp(32px, 6vw, 48px);
            color: var(--text);
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .error-message {
            font-size: clamp(18px, 3vw, 22px);
            color: var(--orange);
            margin-bottom: 1rem;
            font-weight: 600;
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
            border: 2px solid;
        }

        .btn-home {
            background: var(--orange);
            border-color: var(--orange);
            color: white;
            box-shadow: 0 4px 20px rgba(249, 115, 22, 0.3);
        }

        .btn-back {
            background: transparent;
            border-color: var(--light-gray);
            color: var(--text);
        }

        .btn-home:hover {
            background: var(--dark-orange);
            border-color: var(--dark-orange);
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(249, 115, 22, 0.4);
        }

        .btn-back:hover {
            background: var(--light-gray);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .icons-container {
                gap: 1rem;
            }

            .traffic-light {
                font-size: 55px;
            }

            .speed-icon {
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
        <div class="error-code">429</div>
        <h1>Too Many Requests</h1>
        
        <div class="icons-container">
            <span class="traffic-light">🚦</span>
            <span class="speed-icon">💨</span>
        </div>
        
        <p class="error-message">
            Slow down! You're going too fast
        </p>
        
        <p class="suggestion">
            You've sent too many requests in a short time.<br>
            Please wait a moment before trying again.
        </p>

        <div class="actions">
            <a href="/" class="btn-home">🏠 Return Home</a>
            <a href="#" onclick="history.back(); return false;" class="btn-back">← Go Back</a>
        </div>
    </div>
</body>
</html>