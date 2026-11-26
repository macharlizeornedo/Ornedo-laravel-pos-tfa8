<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customers</title>
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
</head>

<body class="management-page">
    <nav class="management-nav" aria-label="Main navigation">
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="/users">Users</a>
        <a href="/customers">Customers</a>
    </nav>
    <main class="management-content">
        <header class="page-heading">
            <div>
                <h1>Customers</h1>
                <p class="page-subtitle">Manage your customer records.</p>
            </div>
            <a class="button-link" href="/customers/create">Add customer</a>
        </header>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Avatar</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer['id'] }}</td>
                        <td>
                            @if($customer['avatar'] && file_exists(public_path('storage/customers/'.$customer['avatar'])))
                            <img src="{{ asset('storage/customers/'.$customer['avatar']) }}"
                                alt="{{ $customer['full_name'] }} avatar">
                            @else
                            <span class="avatar-placeholder">
                                {{ strtoupper(substr($customer['full_name'], 0, 1)) }}
                            </span>
                            @endif
                        </td>
                        <td>{{ $customer['full_name'] }}</td>
                        <td>{{ $customer['email'] }}</td>
                        <td>{{ $customer['phone'] }}</td>
                        <td>
                            <div class="row-actions">
                                <a class="action-btn"
                                    href="{{ route('customers.show', $customer['id']) }}">
                                    View
                                </a>

                                <a class="action-btn action-edit"
                                    href="{{ route('customers.edit', $customer['id']) }}">
                                    Edit
                                </a>

                                <form action="{{ route('customers.destroy', $customer['id']) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this customer?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="action-btn action-delete">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>