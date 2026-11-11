<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>

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
        max-width: 1000px;
        margin: 30px auto;
        padding: 35px;
        background: rgba(255, 255, 255, 0.65);
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        backdrop-filter: blur(12px);
    }

    h2 {
        margin-top: 0;
        font-size: 28px;
    }

    .subtitle {
        color: #777777;
        margin-bottom: 25px;
    }

    .button {
        display: inline-block;
        padding: 11px 18px;
        background: #A69B8C;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 25px;
    }

    .button:hover {
        background: #8E8273;
    }

    .success {
        padding: 12px;
        margin-bottom: 20px;
        background: #E4EDE3;
        color: #456344;
        border-radius: 8px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: rgba(255, 255, 255, 0.5);
    }

    th, td {
        padding: 16px;
        text-align: left;
        border-bottom: 1px solid #DCD9D2;
    }

    th {
        background: #EAE8E3;
        color: #555555;
    }

    tr:hover {
        background: rgba(234, 232, 227, 0.6);
    }

    .avatar {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #DCD9D2;
    }

    .placeholder {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: #D9D5CE;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #555555;
        font-weight: bold;
    }

    .edit-link {
        color: #8E8273;
        text-decoration: none;
        font-weight: bold;
    }

    .edit-link:hover {
        text-decoration: underline;
    }

    .empty {
        text-align: center;
        padding: 30px;
        color: #777777;
    }

    .back-link {
        display: inline-block;
        margin-top: 25px;
        color: #777777;
        text-decoration: none;
    }

    @media (max-width: 600px) {
        .container {
            padding: 20px;
        }

        h2 {
            font-size: 23px;
        }
    }
</style>

</head>

<body>

<div class="container">

<h2>User Accounts</h2>
<p class="subtitle">Manage and update registered user profiles.</p>

<a href="{{ route('users.create') }}" class="button">+ Create User</a>

@if(session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>
                        @if($user->avatar)
                            <img
                                src="{{ asset('storage/' . $user->avatar) }}"
                                alt="User Avatar"
                                class="avatar"
                            >
                        @else
                            <div class="placeholder">
                                {{ strtoupper(substr($user->username, 0, 1)) }}
                            </div>
                        @endif
                    </td>

                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>

                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="edit-link">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">
                        No user accounts found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<a href="{{ route('customers.index') }}" class="back-link">
    ← Back to Customer Accounts
</a>

</div>

</body>
</html>