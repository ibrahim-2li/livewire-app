<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحباً بك في منصة الفعاليات - {{ $admin->name }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            direction: rtl;
            text-align: right;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e9ecef;
        }

        .header h1 {
            color: #2c3e50;
            margin: 0;
            font-size: 28px;
        }

        .event-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .event-info h2 {
            color: #2c3e50;
            margin-top: 0;
            font-size: 22px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .info-label {
            font-weight: bold;
            color: #495057;
        }

        .info-value {
            color: #6c757d;
        }

        .qr-section {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .qr-code {
            margin: 20px 0;
        }

        .qr-code img {
            border: 3px solid #2c3e50;
            border-radius: 8px;
            padding: 10px;
            background-color: white;
        }

        .instructions {
            background-color: #e3f2fd;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #2196f3;
        }

        .instructions h3 {
            color: #1976d2;
            margin-top: 0;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            color: #6c757d;
            font-size: 14px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #28a745;
        }

        .yellow-message {
            background-color: #d6f5f6;
            color: #012021;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #00fbff;
        }
    </style>
</head>

<body dir="rtl">
    <div class="container">
        <div class="header">
            <h1>مرحباً بك في مجتمع البيانات العربي! 📊✨</h1>
        </div>

        <div class="success-message">
            <strong>مرحباً بك في مجتمع البيانات العربي! 📊✨ {{ $admin->name }}!</strong><br>
           سعداء بانضمامك إلى أكبر مجتمع عربي يهتم بعالم البيانات والذكاء الاصطناعي.
هنا ستجد فعاليات مميزة، لقاءات ملهمة، وورش عمل تساعدك على تطوير مهاراتك وتوسيع شبكة علاقاتك في هذا المجال المتنامي.

نهدف لأن تكون رحلتك معنا ممتعة وثرية بالمعرفة، وإذا احتجت أي مساعدة فنحن دائمًا هنا لخدمتك.

نتمنى لك تجربة رائعة مليئة بالتعلّم والاكتشاف! 🚀
        </div>


        <div class="footer">
            <p>هذا بريد إلكتروني تلقائي، يرجى عدم الرد عليه.</p>
        </div>
    </div>
</body>

</html>
