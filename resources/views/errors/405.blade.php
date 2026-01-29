<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>405 - Method Not Allowed</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --yellow: #FFC107;
            --dark-yellow: #F59E0B;
            --black: #0F0F0F;
            --gray: #2A2A2A;
            --light-gray: #404040;
            --text: #E5E5E5;
        }

        body {
            font-family: 'Work Sans', sans-serif;
            background: linear-gradient(135deg, var(--black) 0%, var(--gray) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            color: var(--text);
        }

        /* Subtle diagonal pattern */
        body::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 20px,
                rgba(255, 193, 7, 0.01) 20px,
                rgba(255, 193, 7, 0.01) 40px
            );
            pointer-events: none;
        }

        .container {
            text-align: center;
            z-index: 10;
            padding: 3rem 2rem;
            max-width: 900px;
        }

        .error-code {
            font-family: 'Anton', sans-serif;
            font-size: clamp(120px, 25vw, 220px);
            font-weight: 700;
            color: var(--yellow);
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 3px 3px 0px rgba(245, 158, 11, 0.5);
            position: relative;
        }

        h1 {
            font-family: 'Anton', sans-serif;
            font-size: clamp(32px, 6vw, 56px);
            color: var(--text);
            margin-bottom: 1.5rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .tools-container {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 2rem 0;
            font-size: 60px;
        }

        .tool {
            display: inline-block;
            animation: swing 2s ease-in-out infinite;
        }

        .tool:nth-child(1) {
            animation-delay: 0s;
        }

        .tool:nth-child(2) {
            animation-delay: 0.3s;
        }

        .tool:nth-child(3) {
            animation-delay: 0.6s;
        }

        @keyframes swing {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(-8deg); }
        }

        .error-message {
            font-size: clamp(18px, 3vw, 24px);
            color: var(--yellow);
            margin-bottom: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .suggestion {
            font-size: clamp(15px, 2.2vw, 18px);
            color: rgba(229, 229, 229, 0.8);
            margin-bottom: 2.5rem;
            line-height: 1.8;
            max-width: 600px;
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
            padding: 16px 36px;
            color: var(--black);
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 17px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 3px solid;
        }

        .btn-home {
            background: var(--yellow);
            border-color: var(--yellow);
            box-shadow: 0 5px 20px rgba(255, 193, 7, 0.3);
        }

        .btn-back {
            background: transparent;
            border-color: var(--light-gray);
            color: var(--text);
        }

        .btn-home:hover {
            background: var(--dark-yellow);
            border-color: var(--dark-yellow);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 193, 7, 0.5);
        }

        .btn-back:hover {
            background: var(--light-gray);
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .tools-container {
                gap: 1rem;
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
        <div class="error-code">405</div>
        <h1>Method Not Allowed</h1>
        
        <div class="tools-container">
            <span class="tool">🔧</span>
            <span class="tool">🔨</span>
            <span class="tool">⚙️</span>
        </div>
        
        <p class="error-message">
            You're using the wrong tool for this job
        </p>
        
        <p class="suggestion">
            The HTTP method you used isn't supported for this resource.<br>
            Check your request and try a different approach.
        </p>

        <div class="actions">
            <a href="/" class="btn-home">🏠 Return Home</a>
            <a href="#" onclick="history.back(); return false;" class="btn-back">← Go Back</a>
        </div>
    </div>
</body>
</html>