<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message temporaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .message-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h1>Message temporaire</h1>
        <p>{{ $message->message }}</p>
        @if ($message->photo)
            <img src="{{ asset('storage/' . $message->photo) }}" alt="Photo">
        @endif
    </div>
</body>
</html>
