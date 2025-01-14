<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }
        .ticket-info {
            background-color: #f9f9f9;
            border-left: 4px solid #007bff;
            padding: 15px;
            margin: 15px 0;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 20px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="greeting">Dear Admin,</div>

    <div class="ticket-info">
        <p><span class="label">Subject:</span> {{ $ticket->subject }}</p>
        <p><span class="label">Category:</span> {{ $ticket->category->name }}</p>
        <p><span class="label">Description:</span> {{ $ticket->description }}</p>
        <p><span class="label">Submitted By:</span> {{ $ticket->user->name }}</p>
        <p><span class="label">Created At:</span> {{ $ticket->created_at }}</p>
    </div>

    <div class="footer">Thanks</div>
</body>
</html>