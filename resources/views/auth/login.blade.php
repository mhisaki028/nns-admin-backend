
<head>

  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <style>
   body {
        background-color: #F3EBF6;
        font-family: 'Ubuntu', sans-serif;
    }
    
    .main {
        background-color: #FFFFFF;
        width: 400px;
        height: 400px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
    
    .sign {
        padding-top: 15px;
        color: #27A9A2;
        font-weight: bold;
       
    }
    
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form.form1 {
        padding-top: 40px;
    }
    
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #1D86A0, #2FC1A4);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    
    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #9A9A9A;
        padding-top: 15px;
        font-size: 13px;
    }
    
    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #27A9A2;
        font-weight: bold;
        text-decoration: none;
    }
    
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
            
        }
    </style>

  
</head>

<body>
  <div class="main">
    <img src="plugins/images/mdlablogo.png" style="width: 100px;height: 100px;display: block; margin-left: auto;margin-right: auto; padding-top: 20px;"/>
    <form class="form1" id="form-login" action="{{ route('login')}}" method="POST">
    @csrf
      <input class="un {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" align="center" value="{{ old('email') }}" name="email" placeholder="E-mail" required="">
      @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif

      <input class="pass{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" align="center" name="password" placeholder="Password" required="">

      @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif


      <button type="submit" class="submit" align="center">Sign in</button>
      <p class="forgot" align="center"><a href="{{ route('register') }}">Add Medical Laboratory</p>
    
    </form>
                
    </div>
     
</body>