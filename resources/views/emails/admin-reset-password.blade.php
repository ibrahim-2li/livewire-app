<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>إعادة تعيين كلمة المرور - منصة الفعاليات</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            font-family: 'Cairo', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            direction: rtl;
            text-align: right;
        }

        .wrapper {
            width: 100%;
            background-color: #f9fafb;
            padding: 24px 0;
        }

        .container {
            max-width: 640px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        .header {
            background: linear-gradient(to left, #f97316, #ea580c);
            padding: 24px 32px;
            color: #fff;
        }

        .header-title {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
        }

        .header-subtitle {
            margin-top: 4px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
        }

        .logo-circle {
            width: 48px;
            height: 48px;
            border-radius: 9999px;
            background-color: rgba(255, 255, 255, 0.16);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }

        .content {
            padding: 24px 32px 8px;
            color: #111827;
        }

        .content h1 {
            font-size: 20px;
            margin: 0 0 8px;
        }

        .content p {
            font-size: 14px;
            line-height: 1.8;
            margin: 0 0 12px;
            color: #374151;
        }

        .button-wrapper {
            text-align: center;
            margin: 24px 0;
        }

        .btn-primary {
            display: inline-block;
            padding: 12px 32px;
            background-color: #f97316;
            color: #fff !important;
            text-decoration: none;
            border-radius: 9999px;
            font-size: 15px;
            font-weight: 700;
            box-shadow: 0 10px 15px rgba(249, 115, 22, 0.35);
        }

        .btn-primary:hover {
            background-color: #ea580c;
        }

        .subtle {
            font-size: 12px;
            color: #6b7280;
            margin-top: 4px;
        }

        .code-box {
            background-color: #f3f4f6;
            border-radius: 12px;
            padding: 12px 16px;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
            font-size: 12px;
            direction: ltr;
            text-align: left;
            color: #111827;
            margin-top: 8px;
            word-break: break-all;
        }

        .footer {
            padding: 16px 24px 24px;
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
        }

        .footer a {
            color: #6b7280;
            text-decoration: none;
        }

        @media (max-width: 640px) {
            .container {
                border-radius: 0;
            }

            .header,
            .content {
                padding: 20px 18px;
            }

            .button-wrapper {
                margin: 20px 0;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <div class="logo-circle">
                    🔐
                </div>
                <h1 class="header-title">إعادة تعيين كلمة المرور</h1>
                <p class="header-subtitle">منصة الأحداث - لوحة تحكم المسؤولين</p>
            </div>

            <div class="content">
                <h1>مرحباً {{ $admin->name ?? 'عزيزي المستخدم' }}،</h1>
                <p>
                    استلمنا طلباً لإعادة تعيين كلمة المرور لحسابك في
                    <strong>منصة الأحداث</strong>.
                </p>
                <p>
                    لإكمال العملية، يرجى الضغط على الزر أدناه لإنشاء كلمة مرور جديدة آمنة لحسابك.
                </p>

                <div class="button-wrapper">
                    <a href="{{ $url }}" class="btn-primary">
                        إعادة تعيين كلمة المرور
                    </a>
                </div>

                <p class="subtle">
                    إذا لم يعمل الزر أعلاه، يمكنك نسخ الرابط التالي ولصقه في متصفحك:
                </p>
                <div class="code-box">
                    {{ $url }}
                </div>

                <p class="subtle">
                    هذا الرابط صالح لفترة زمنية محدودة حفاظاً على أمان حسابك. إذا لم تطلب إعادة تعيين كلمة المرور، يمكنك
                    تجاهل هذه الرسالة وسيبقى حسابك كما هو.
                </p>
            </div>

            <div class="footer">
                <p>
                    © {{ date('Y') }} منصة الأحداث. جميع الحقوق محفوظة.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
