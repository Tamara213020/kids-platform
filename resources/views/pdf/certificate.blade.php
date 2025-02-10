<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            border: 5px solid #ddd;
        }
        .header {
            margin-bottom: 20px;
        }
        .certificate-title {
            font-size: 36px;
            font-weight: bold;
            color: #2d3748;
        }
        .certificate-subtitle {
            font-size: 24px;
            margin-top: 10px;
            color: #4A5568;
        }
        .user-name {
            font-size: 28px;
            font-weight: bold;
            color: #1A202C;
            margin-top: 30px;
        }
        .course-name {
            font-size: 20px;
            font-weight: normal;
            color: #2d3748;
            margin-top: 10px;
        }
        .completion-date {
            font-size: 18px;
            color: #4A5568;
            margin-top: 20px;
        }
        .certificate-id {
            font-size: 16px;
            color: #718096;
            margin-top: 10px;
        }
        .signature-section {
            margin-top: 40px;
        }
        .signature {
            font-size: 20px;
            color: #2d3748;
        }
        .footer {
            margin-top: 50px;
            font-size: 14px;
            color: #718096;
        }
        .footer img {
            max-width: 80px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1 class="certificate-title">Certificate of Completion</h1>
        <p class="certificate-subtitle">This certifies that</p>
    </div>

    <p class="user-name">{{ $certificate->user->name }}</p>
    <p class="course-name">Has successfully completed the course</p>
    <h2 class="course-name">{{ $certificate->course->title }}</h2>

    <p class="completion-date">Date of Completion: {{ $certificate->created_at->format('F j, Y') }}</p>
    <p class="certificate-id">Certificate ID: {{ $certificate->id }}</p>

    <div class="signature-section">
        <p class="signature">Signed by:</p>
        <p class="signature">Instructor Name (or Signature Image)</p>
    </div>

    <div class="footer">
        <p>Thank you for completing this course with us!</p>
    </div>
</div>
</body>
</html>
