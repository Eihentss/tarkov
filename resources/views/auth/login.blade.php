<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tarkov</title>
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
            background-color: #007bff; /* Tarkov blue */
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
            background-color: #007bff; /* Tarkov blue */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
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
                    <h3>{{ __('Login to Tarkov') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit">{{ __('Login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
