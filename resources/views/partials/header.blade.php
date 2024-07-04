<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Accueil</title>
    <script>
        function redirectToLogin(role) {
        switch(role) {
            case 'admin':
                window.location.href = "{{ route('admin.login') }}";
                break;
            case 'respo':
                window.location.href = "{{ route('respo.login') }}";
                break;
            case 'client':
                window.location.href = "{{ route('client.login') }}";
                break;
            default:
                console.error('Role not recognized.');
        }
    }
    function redirectToRegister(role) {
        window.location.href = "{{ route('register') }}";
    }
    </script>

</head>
<header>
    <div class="logo">
        <a href="{{ route('accueil') }}">Voyage<span> KCS</span></a>
    </div>
    <nav>
        <button class="btn" onclick="redirectToRegister('client')"><i class="fa fa-user-plus"></i> S'inscrire</button>
        <div class="dropdown">
            <button class="dropbtn"><i class="fa fa-sign-in"></i> Se connecter</button>
            <div class="dropdown-content">
                <a href="javascript:void(0)" onclick="redirectToLogin('admin')">Admin</a>
                <a href="javascript:void(0)" onclick="redirectToLogin('respo')">Responsable</a>
                <a href="javascript:void(0)" onclick="redirectToLogin('client')">Client</a>
            </div>
        </div>
        <button class="btn about" onclick="location.href='{{ route('about') }}'"><i class="fa fa-info-circle"></i> A propos de nous</button>
    </nav>
    <img src="{{asset('images/logo.png')}}" alt="logo" class="logoImage">
</header>
<style>
    body{
        background-color: #658faf;
        min-height: 100vh;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        margin: 0;
    }
    header{
        grid-area: header;
        height: 80px; width: 100%;
        text-align: center;
        padding: 10px;
        background-color: #2c2c2c;
    }
    .logoImage{
        position: absolute;
        top: 10px;
        right: 10px;
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }
    .btn {
        background-color: transparent;
        border: none;
        color: white;
        padding: 20px 20px;
        font-size: 16px;
        cursor: pointer;
        display:inline-block;
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropbtn {
        background-color: transparent;
        color: white;
        padding: 20px 20px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropbtn:hover,.btn:hover {
        background-color: #658faf;
    }

    /* Conteneur du menu déroulant */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    /* Liens dans le menu déroulant */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Montrer le menu déroulant au survol */
    .dropdown:hover .dropdown-content {
        display: block;
    }
    .logo a {
        color: #fff;
        padding: 4px 20px;
        border: 3px solid #fff;
        position: absolute;
        top: 13px;
        left: 13px;
        text-transform: uppercase;
        text-decoration: none;
        font-weight: 900;
        text-shadow: rgba(0, 0, 0, 0, 7);
        font-size: large;
    }

    .logo span {
        color:  #658faf;
        font-weight: bold;
        font-size: xx-large;
    }

    h1{
        font-weight: bold;
        font-size: xx-large;
        color: black;
        padding-top: 8px;
        text-align: center;
    }

    a:hover{
        color:  #658faf;
    }
    
</style>