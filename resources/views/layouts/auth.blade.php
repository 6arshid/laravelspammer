<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name', 'Last.Today') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <link href="/style.css"  rel="stylesheet">
         

    <script>
    async function web3Login() {
        if (!window.ethereum) {
            alert('MetaMask not detected. Please install MetaMask first.');
            return;
        }

        const provider = new ethers.providers.Web3Provider(window.ethereum);

        let response = await fetch('/s/login/metamask');
        const message = await response.text();

        await provider.send("eth_requestAccounts", []);
        const address = await provider.getSigner().getAddress();
        const signature = await provider.getSigner().signMessage(message);

        response = await fetch('/s/login/metamask/verify', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'address': address,
                'signature': signature,
                '_token': '{{ csrf_token() }}'
            })

        });
        const data = await response.text();

        console.log(data);
        var a = address;
        var b = "/s/register/metamask/";
        var c = b + a;
        location.href = c;


    }
</script>



<script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"></script>

</head>
<body  style="background-color: transparent;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="logo d-flex justify-content-center mt-5">
                <a href="/" class="mt-5 mb-3">
                <img src="/assets/img/logo.png" width="200px" class="mt-5 zoom">
                </a>
            </div>
            <br><br>
            <div class="zoom">
            <a href="/s/login/google" class="login-with-google-btn">
                  <strong class="zoom">Connect with Google</strong>
                </a>
</div>
                            <br>

       <button class="login-with-metamask-btn mt-2 zoom" onclick="web3Login();"> <strong>Connect with MetaMask</strong></button>

        </div>
    </div>
</div>




<script src="/assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="/assets/js/theme.js"></script>
<script src="/assets/js/SwitchTheme.js"></script>
</body>
</html>