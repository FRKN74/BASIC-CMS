<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="content">
        <h1>Login</h1>
        <form action="{{ route('loginPost') }}" method="POST">
            @csrf
        <div class="input-text login">
            <i id="icon" class="fas fa-user"></i>
            <input type="text" name="email" class="input" name="" placeholder="E-mail">
        </div>
        <div class="input-text password">
            <i id="icon" class="fas fa-lock"></i>
            <input type="password" name="pass" class="input" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-outline-primary">Giriş yap</button>

    </form>
    </div>
</body>
</html>