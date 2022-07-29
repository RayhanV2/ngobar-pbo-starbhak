<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>LOGIN NGOBAR</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #efefef">
        <section style="background-color: #efefef;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                  <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                      <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="{{asset('dist/img/gambarkopilogin.jpg')}}"
                          alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height:100%" />
                      </div>
                      <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                          <form action="{{url('proses_login')}}" method="POST" id="logForm">
                            {{ csrf_field() }}
          
                            <div class="d-flex align-items-center mb-3 pb-1">
                              {{-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> --}}
                              <span class="h1 fw-bold mb-0">Official Ngobar</span>
                            </div>
          
                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                            @error('login_gagal')
                                                    {{-- <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span> --}}
                                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                                                        <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    @enderror
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example17">Username</label>
                              <input
                                                    class="form-control form-control-lg"
                                                    id="inputEmailAddress"
                                                    name="username"
                                                    type="text"
                                                    placeholder="Enter Username"/>
                                                @if($errors->has('username'))
                                                <span class="error">{{ $errors->first('username') }}</span>
                                                @endif
                              
                            </div>
          
                            <div class="form-outline mb-4">
                              <label class="small mb-1" for="inputPassword">Password</label>
                                                <input
                                                    class="form-control form-control-lg"
                                                    id="inputPassword"
                                                    type="password"
                                                    name="password"
                                                    placeholder="Enter Password"/>
                                                @if($errors->has('password'))
                                                <span class="error">{{ $errors->first('password') }}</span>
                                                @endif
                            </div>
          
                            <div class="pt-1 mb-4">
                              <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                            </div>
          
                            <a class="small text-muted" href="#!">Forgot password?</a>
                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                                style="color: #393f81;">Register here</a></p>
                            <a href="#!" class="small text-muted">Terms of use.</a>
                            <a href="#!" class="small text-muted">Privacy policy</a>
                          </form>
          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="{{url('assets/js/scripts.js')}}"></script>
    </body>
</html>

