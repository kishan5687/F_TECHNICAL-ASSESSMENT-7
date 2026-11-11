<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Tasks</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            max-width: 850px; 
            margin: 40px auto; 
            padding: 0 20px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        th { 
            background: #11223e; 
            color: white; 
            font-weight: 500;
            text-align: left; 
            padding: 14px 16px;
        }
        td { 
            padding: 14px 16px; 
            color: #333;
            font-size: 14px;
        }
        tbody tr:nth-child(even) { 
            background: #f4f7fc; 
        }
        tbody tr:nth-child(odd) { 
            background: #ffffff; 
        }
    </style>
</head>
<body>

    <!-- Paste goes here -->
    <a href="{{ route('tasks.create') }}">+ Add New Task</a>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <!-- End of paste -->

    <table>
        <thead>
            <tr>
                <th style="width: 10%;">ID</th>
                <th style="width: 65%;">Task Title</th>
                <th style="width: 25%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ ucfirst($task->status) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align: center;">No tasks found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
