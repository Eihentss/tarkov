<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Tarkov</title>
    <!-- Include any CSS files or stylesheets -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #343a40; /* Dark background */
            color: #fff; /* Light text */
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 400px; /* Adjusted width */
            margin: 50px auto;
            padding: 20px;
            background-color: #212529; /* Dark card background */
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background-color: #dc3545; /* Tarkov red */
            color: #fff;
            padding: 10px;
            border-radius: 5px 5px 0 0;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #6c757d; /* Gray border */
            border-radius: 5px;
            background-color: #343a40; /* Dark input background */
            color: #fff; /* Light text */
        }

        button[type="submit"] {
            padding: 10px;
            background-color: #dc3545; /* Tarkov red */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #c82333; /* Darker red on hover */
        }

        .invalid-feedback {
            color: #dc3545; /* Red for error messages */
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d; /* Gray footer text */
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Register to Tarkov') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <!-- Add more form fields for registration as needed -->

                        <div class="form-group">
                            <button type="submit">{{ __('Register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Tarkov Website</p>
    </footer>
</body>
</html>
