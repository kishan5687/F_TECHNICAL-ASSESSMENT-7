<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Accounts</title>

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
            padding: 40px 20px;
            color: #333333;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 35px;
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777777;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background: #a69b8c;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #8e8273;
            transform: translateY(-2px);
        }

        .success {
            background: rgba(220, 235, 220, 0.8);
            color: #426344;
            padding: 13px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background: rgba(166, 155, 140, 0.18);
            color: #514a42;
            text-align: left;
            padding: 16px;
            font-size: 13px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.07);
            font-size: 14px;
        }

        tr:hover td {
            background: rgba(255, 255, 255, 0.35);
        }

        .edit-btn {
            color: #786c5d;
            text-decoration: none;
            font-weight: bold;
        }

        .edit-btn:hover {
            text-decoration: underline;
        }

        .empty {
            text-align: center;
            color: #888888;
            padding: 30px;
        }

        .footer {
            margin-top: 25px;
            text-align: center;
        }

        .footer a {
            color: #786c5d;
            text-decoration: none;
            font-size: 14px;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 10px;
            }

            .container {
                padding: 20px;
            }

            h1 {
                font-size: 23px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">
            <div>
                <h1>Customer Accounts</h1>
                <p class="subtitle">Manage and organize your customer information.</p>
            </div>

            <a href="{{ route('customers.create') }}" class="btn">
                + Create Customer
            </a>
        </div>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->full_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <a href="{{ route('customers.edit', $customer->id) }}" class="edit-btn">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty">
                                No customers found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="footer">
            <a href="{{ route('users.index') }}">
                Switch to User Accounts Listing →
            </a>
        </div>

    </div>

</body>
</html>
