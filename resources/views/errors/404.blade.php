<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Lost in Space</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@700&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #6C5CE7;
            --secondary: #FF6B9D;
            --accent: #FFA502;
            --dark: #2D3436;
            --light: #F8F9FA;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #7e22ce 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* CSS-only stars pattern */
        body::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(2px 2px at 20% 30%, white, transparent),
                radial-gradient(2px 2px at 60% 70%, white, transparent),
                radial-gradient(1px 1px at 50% 50%, white, transparent),
                radial-gradient(1px 1px at 80% 10%, white, transparent),
                radial-gradient(2px 2px at 90% 60%, white, transparent),
                radial-gradient(1px 1px at 33% 80%, white, transparent),
                radial-gradient(2px 2px at 15% 90%, white, transparent),
                radial-gradient(1px 1px at 75% 25%, white, transparent),
                radial-gradient(2px 2px at 45% 15%, white, transparent),
                radial-gradient(1px 1px at 25% 60%, white, transparent);
            background-size: 200% 200%;
            background-position: 
                0% 0%, 40% 60%, 130% 50%, 70% 100%, 
                20% 30%, 90% 80%, 50% 0%, 100% 40%,
                30% 20%, 60% 90%;
            animation: twinkle 4s ease-in-out infinite alternate;
            opacity: 0.6;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.8; }
        }

        .container {
            text-align: center;
            z-index: 10;
            padding: 2rem;
            max-width: 800px;
        }

        .astronaut-wrapper {
            position: relative;
            margin: 2rem auto;
            display: inline-block;
        }

        .astronaut {
            font-size: 80px;
            animation: float 3s ease-in-out infinite;
            display: inline-block;
            filter: drop-shadow(0 10px 30px rgba(0,0,0,0.3));
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(-5deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        .planet {
            position: absolute;
            font-size: 60px;
            animation: orbit 8s linear infinite;
        }

        .planet-1 {
            top: -30px;
            right: 100px;
            animation-delay: 0s;
        }

        .planet-2 {
            bottom: -20px;
            left: 80px;
            animation-delay: -4s;
        }

        @keyframes orbit {
            0% { transform: rotate(0deg) translateX(80px) rotate(0deg); }
            100% { transform: rotate(360deg) translateX(80px) rotate(-360deg); }
        }

        .error-code {
            font-family: 'Fredoka', sans-serif;
            font-size: clamp(80px, 15vw, 180px);
            font-weight: 700;
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 1rem;
            animation: glitch 5s infinite;
            text-shadow: 0 0 40px rgba(255, 107, 157, 0.3);
        }

        @keyframes glitch {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-2px); }
            40% { transform: translateX(2px); }
            60% { transform: translateX(-2px); }
            80% { transform: translateX(2px); }
        }

        h1 {
            font-family: 'Fredoka', sans-serif;
            font-size: clamp(28px, 5vw, 48px);
            color: white;
            margin-bottom: 1rem;
            text-shadow: 0 2px 20px rgba(0,0,0,0.3);
        }

        p {
            font-size: clamp(16px, 2.5vw, 20px);
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.6;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .error-message {
            font-size: clamp(18px, 3vw, 24px);
            font-weight: 500;
            margin-bottom: 1rem;
            color: var(--accent);
        }

        .suggestion {
            margin-bottom: 2.5rem;
            font-size: clamp(15px, 2.2vw, 18px);
        }

        .actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-home, .btn-back {
            display: inline-block;
            padding: 18px 40px;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 500;
            font-size: 18px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-home {
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            box-shadow: 0 10px 30px rgba(255, 107, 157, 0.4);
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-home::before, .btn-back::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-home:hover::before, .btn-back:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 107, 157, 0.6);
        }

        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .btn-home span, .btn-back span {
            position: relative;
            z-index: 1;
        }

        /* Additional decorations */
        .rocket {
            position: absolute;
            bottom: 50px;
            right: 50px;
            font-size: 40px;
            animation: rocket-bounce 2s ease-in-out infinite;
            transform-origin: bottom;
        }

        @keyframes rocket-bounce {
            0%, 100% { transform: translateY(0) rotate(-45deg); }
            50% { transform: translateY(-15px) rotate(-40deg); }
        }

        @media (max-width: 768px) {
            .planet {
                font-size: 40px;
            }
            
            .planet-1 {
                right: 20px;
            }
            
            .planet-2 {
                left: 20px;
            }
            
            .rocket {
                bottom: 20px;
                right: 20px;
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">404</div>
        <h1>Page Not Found</h1>
        <div class="astronaut-wrapper">
            <div class="astronaut">🧑‍🚀</div>
            <div class="planet planet-1">🪐</div>
            <div class="planet planet-2">🌍</div>
        </div>
        <p class="error-message">
            This page got lost in infinite space!
        </p>
        <p class="suggestion">
            You probably followed a broken link or the page was removed.<br>
            Don't worry, we can get you back on track.
        </p>
        <div class="actions">
            <a href="/" class="btn-home">
                <span>🏠 Back to Home</span>
            </a>
            <a href="#" onclick="history.back(); return false;" class="btn-back">
                <span>← Go Back</span>
            </a>
        </div>
    </div>

    <div class="rocket">🚀</div>
</body>
</html>