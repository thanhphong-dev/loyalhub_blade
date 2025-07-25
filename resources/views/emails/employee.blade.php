<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('mail.create.user.subject')}}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .body-container {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #916cff 0%, #3f126d 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: linear-gradient(135deg, #ffffff 0%, #f8faff 50%, #f0f4ff 100%);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            background: linear-gradient(135deg, #916cff 0%, #3f126d 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            50% {
                transform: translate(-20px, -20px) rotate(180deg);
            }
        }

        .header h1 {
            color: white;
            font-size: 28px;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            position: relative;
            z-index: 1;
        }

        .content {
            padding: 40px 30px;
        }

        .welcome-message {
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome-message h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .user-info {
            background: linear-gradient(135deg, #ffffff 0%, #f5f7ff 100%);
            border-radius: 15px;
            padding: 25px;
            margin: 30px 0;
            border-left: 5px solid #513da8;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.08);
        }

        .user-info h3 {
            color: #513da8;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
        }

        .info-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .info-label {
            font-weight: 600;
            color: #666;
        }

        .info-value {
            color: #333;
            font-weight: 800;
        }

        .cta-section {
            text-align: center;
            margin: 30px 0;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #916cff 0%, #3f126d 100%);
            color: white;
            padding: 15px 40px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(153, 80, 255, 0.4);
        }

        .footer-email {
            padding: 30px 30px 0;
            text-align: center;
            border-top: 1px solid rgba(102, 126, 234, 0.08);
            position: inherit;
            background: transparent;
        }

        .footer-email p {
            color: #666;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .text-white {
            color: #FFFFFF !important;
        }

        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 15px;
            }

            .header, .content, .footer-email {
                padding: 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .welcome-message h2 {
                font-size: 20px;
            }

            .info-row {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
<div class="body-container">
    <div class="email-container">
        <div class="header">
            <h1>{{__('mail.create.user.welcome')}}</h1>
            <p>{{__('mail.create.user.sub_welcome')}}</p>
        </div>

        <div class="content">
            <div class="welcome-message">
                <h2>{{__('mail.create.user.full_name', ['full_name' => $full_name])}}</h2>
                <p>{{__('mail.create.user.text_thanks', ['app_name' => $app_name])}}</p>
            </div>

            <div class="user-info">
                <h3>{{__('mail.create.user.info')}}</h3>
                <div class="info-row">
                    <span class="info-label">{{__('mail.create.user.email')}} </span>
                    <span class="info-value">{{$email}}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">{{__('mail.create.user.password')}}</span>
                    <span class="info-value">{{$plain_password}}</span>
                </div>
            </div>

            <div class="cta-section">
                <a href="{{$url}}" class="cta-button text-white">{{__('mail.create.user.start_now')}}</a>
            </div>
            @include('emails.partials.footer')
        </div>
    </div>
</div>
</body>
</html>
