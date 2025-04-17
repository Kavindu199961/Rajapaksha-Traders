<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transport Booking Invoice</title>
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 700px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }

        .content {
            padding: 30px;
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
            border-bottom: 2px solid #007BFF;
            display: inline-block;
            padding-bottom: 4px;
        }

        .detail {
            margin: 15px 0;
        }

        .label {
            display: inline-block;
            min-width: 160px;
            font-weight: 600;
            color: #555;
        }

        .value {
            color: #333;
        }

        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #666;
        }

        @media (max-width: 600px) {
            .label {
                display: block;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Transport Booking Confirmation</h1>
            <p style="margin: 10px 0 0;">Thank you for choosing our service!</p>
        </div>
        <div class="content">
            <div class="section-title">Booking Details</div>

            <div class="detail">
                <span class="label">Customer Name:</span>
                <span class="value">{{ $data['name'] }}</span>
            </div>

            <div class="detail">
                <span class="label">Phone Number:</span>
                <span class="value">{{ $data['phone'] }}</span>
            </div>

            <div class="detail">
                <span class="label">Required Date:</span>
                <span class="value">{{ \Carbon\Carbon::parse($data['date'])->format('d M Y') }}</span>
            </div>

            <div class="detail">
                <span class="label">Duration:</span>
                <span class="value">{{ $data['duration'] }} day(s)</span>
            </div>

            <div class="detail">
                <span class="label">Type of Goods:</span>
                <span class="value">{{ $data['goods'] }}</span>
            </div>

            <div class="detail">
                <span class="label">Additional Details:</span>
                <span class="value">{{ $data['details'] ?? 'N/A' }}</span>
            </div>

            <div class="detail">
                <span class="label">Submitted At:</span>
                <span class="value">{{ \Carbon\Carbon::parse($data['created_at'])->format('d M Y H:i') }}</span>
            </div>
        </div>

        <div class="footer">
            If you have any questions, feel free to contact our support team.<br>
            &copy; {{ date('Y') }} Your Company Name. All rights reserved.
        </div>
    </div>
</body>
</html>
