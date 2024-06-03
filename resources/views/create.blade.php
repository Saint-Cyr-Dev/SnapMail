<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        .error, .status {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }

        .status {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        ul {
            padding-left: 20px;
            color: #721c24;
        }
    </style>
</head>
<body>
    @if (session('status'))
        <div class="status">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="email">Email du destinataire:</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required>{{ old('message') }}</textarea>
        </div>
        <div>
            <label for="photo">Photo (optionnel):</label>
            <input type="file" id="photo" name="photo">
        </div>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
