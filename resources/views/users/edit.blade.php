<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #EAE8E3, #D9D5CE);
            color: #333333;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 35px;
            background: rgba(255, 255, 255, 0.65);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(12px);
        }

        h2 {
            margin-top: 0;
        }

        .subtitle {
            color: #777777;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #DCD9D2;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.8);
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #A69B8C;
        }

        input[type="file"] {
            padding: 10px;
        }

        .error {
            color: #B04A4A;
            font-size: 13px;
            margin-top: -12px;
            margin-bottom: 15px;
        }

        .current-avatar {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #DCD9D2;
            margin-bottom: 18px;
        }

        .help-text {
            color: #777777;
            font-size: 13px;
            margin-top: -10px;
            margin-bottom: 18px;
        }

        button {
            width: 100%;
            padding: 13px;
            background: #A69B8C;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background: #8E8273;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #777777;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Edit User Account</h2>
    <p class="subtitle">Update the user's account information and profile picture.</p>

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="username">Username</label>
        <input
            type="text"
            id="username"
            name="username"
            value="{{ old('username', $user->username) }}"
            required
        >

        @error('username')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="full_name">Full Name</label>
        <input
            type="text"
            id="full_name"
            name="full_name"
            value="{{ old('full_name', $user->full_name) }}"
            required
        >

        @error('full_name')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Current Profile Picture</label>

        @if($user->avatar)
            <br>
            <img
                src="{{ asset('storage/' . $user->avatar) }}"
                alt="Current Avatar"
                class="current-avatar"
            >
            <br>
        @else
            <p class="help-text">No profile picture uploaded.</p>
        @endif

        <label for="avatar">Upload New Profile Picture</label>
        <input
            type="file"
            id="avatar"
            name="avatar"
            accept="image/*"
        >

        <p class="help-text">Maximum file size: 2MB.</p>

        @error('avatar')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">Update User Profile</button>
    </form>

    <a href="{{ route('users.index') }}" class="back-link">
        ← Cancel and Go Back
    </a>

</div>

</body>
</html>