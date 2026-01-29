<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 - Service Unavailable</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --orange: #FB923C;
            --dark-orange: #F97316;
            --dark: #1C1917;
            --gray: #292524;
            --light-gray: #44403C;
            --text: #FAFAF9;
            --muted: #A8A29E;
        }

        body {
            font-family: 'Poppins', sans-serif;
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

        .cone {
            font-size: 65px;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .wrench {
            font-size: 60px;
            animation: rotate 3s ease-in-out infinite;
        }

        @keyframes rotate {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(20deg); }
        }

        .error-code {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(110px, 22vw, 200px);
            font-weight: 700;
            color: var(--orange);
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(251, 146, 60, 0.3);
        }

        h1 {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(30px, 5.5vw, 44px);
            color: var(--text);
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .error-message {
            font-size: clamp(17px, 2.8vw, 21px);
            color: var(--orange);
            margin-bottom: 1rem;
            font-weight: 500;
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
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            border: 2px solid;
        }

        .btn-home {
            background: var(--orange);
            border-color: var(--orange);
            color: var(--dark);
            box-shadow: 0 4px 20px rgba(251, 146, 60, 0.3);
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
            box-shadow: 0 6px 25px rgba(251, 146, 60, 0.4);
        }

        .btn-back:hover {
            background: var(--light-gray);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .icons-container {
                gap: 1.2rem;
            }

            .cone {
                font-size: 50px;
            }

            .wrench {
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
        <div class="error-code">503</div>
        <h1>Service Unavailable</h1>
        
        <div class="icons-container">
            <span class="cone">🚧</span>
            <span class="wrench">🔧</span>
        </div>
        
        <p class="error-message">
            We're currently under maintenance
        </p>
        
        <p class="suggestion">
            The service is temporarily unavailable.<br>
            We'll be back up and running shortly.
        </p>

        <div class="actions">
            <a href="/" class="btn-home">🏠 Return Home</a>
            <a href="#" onclick="location.reload(); return false;" class="btn-back">🔄 Retry</a>
        </div>
    </div>
</body>
</html>