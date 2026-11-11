<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #eae8e3, #d9d5ce);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #333333;
        }

        .container {
            width: 100%;
            max-width: 500px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }

        h1 {
            font-size: 27px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #777777;
            font-size: 14px;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 9px;
            font-size: 14px;
            font-weight: bold;
            color: #514a42;
        }

        input {
            width: 100%;
            padding: 13px 15px;
            margin-bottom: 8px;
            border: 1px solid #dcd9d2;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.65);
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #a69b8c;
            box-shadow: 0 0 0 3px rgba(166, 155, 140, 0.15);
        }

        .error {
            color: #a94442;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .btn {
            width: 100%;
            padding: 14px;
            margin-top: 15px;
            background: #a69b8c;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: #8e8273;
            transform: translateY(-2px);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #786c5d;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 500px) {
            .container {
                padding: 25px;
            }

            h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Add New Customer</h1>
        <p class="subtitle">Enter the customer's information below.</p>

        <form action="{{ route('customers.store') }}" method="POST">
            @csrf

            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name') }}"
                placeholder="Enter full name"
            >

            @error('full_name')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter email address"
            >

            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn">Save Customer</button>
        </form>

        <a href="{{ route('customers.index') }}" class="back-link">
            ← Back to Customers List
        </a>

    </div>

</body>
</html>