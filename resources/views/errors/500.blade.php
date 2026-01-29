<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Internal Server Error</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --red: #DC2626;
            --dark-red: #B91C1C;
            --dark: #0F0F0F;
            --gray: #1F1F1F;
            --light-gray: #3A3A3A;
            --text: #F5F5F5;
            --muted: #A3A3A3;
        }

        body {
            font-family: 'Space Mono', monospace;
            background: var(--dark);
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
            gap: 1.5rem;
        }

        .explosion {
            font-size: 70px;
            animation: shake 0.5s ease-in-out infinite;
        }

        @keyframes shake {
            0%, 100% { transform: rotate(0deg) translateX(0); }
            25% { transform: rotate(-3deg) translateX(-2px); }
            75% { transform: rotate(3deg) translateX(2px); }
        }

        .gear {
            font-size: 60px;
            opacity: 0.7;
        }

        .error-code {
            font-family: 'Space Mono', monospace;
            font-size: clamp(110px, 22vw, 200px);
            font-weight: 700;
            color: var(--red);
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(220, 38, 38, 0.4);
        }

        h1 {
            font-family: 'Space Mono', monospace;
            font-size: clamp(28px, 5vw, 42px);
            color: var(--text);
            margin-bottom: 1rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .error-message {
            font-size: clamp(17px, 2.8vw, 20px);
            color: var(--red);
            margin-bottom: 1rem;
            font-weight: 400;
        }

        .suggestion {
            font-size: clamp(14px, 2vw, 16px);
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
            padding: 14px 30px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 700;
            font-size: 15px;
            transition: all 0.3s ease;
            border: 2px solid;
            font-family: 'Space Mono', monospace;
        }

        .btn-home {
            background: var(--red);
            border-color: var(--red);
            color: white;
            box-shadow: 0 4px 20px rgba(220, 38, 38, 0.3);
        }

        .btn-back {
            background: transparent;
            border-color: var(--light-gray);
            color: var(--text);
        }

        .btn-home:hover {
            background: var(--dark-red);
            border-color: var(--dark-red);
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(220, 38, 38, 0.4);
        }

        .btn-back:hover {
            background: var(--light-gray);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .icons-container {
                gap: 1rem;
            }

            .explosion {
                font-size: 55px;
            }

            .gear {
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
        <div class="error-code">500</div>
        <h1>Internal Server Error</h1>
        
        <div class="icons-container">
            <span class="explosion">💥</span>
            <span class="gear">⚙️</span>
        </div>
        
        <p class="error-message">
            Something went wrong on our end
        </p>
        
        <p class="suggestion">
            The server encountered an error and couldn't complete your request.<br>
            Please try again later.
        </p>

        <div class="actions">
            <a href="/" class="btn-home">🏠 Return Home</a>
            <a href="#" onclick="location.reload(); return false;" class="btn-back">🔄 Retry</a>
        </div>
    </div>
</body>
</html>