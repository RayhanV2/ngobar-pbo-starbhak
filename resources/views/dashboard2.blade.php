@extends('starter2')
@section('judul','Home')

@section('isi')
<h1>{{ Auth::user()->level }} Menu</h1>
<div class="container" style="display: flex; justify-content:center;gap:5rem;">
<div class="card" style="width: 18rem;border-radius:18px">
    <img src="{{asset('dist/img/addtransaction.png')}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h1>New Transaction</h1>
      <br>
      <a href="{{url('/table-guru')}}" class="btn btn-primary">Add</a>
    </div>
  </div>

  {{-- <div class="card" style="width: 18rem;border-radius:18px">
    <img src="{{asset('dist/img/logpegawai.png')}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h1>Log Pegawai</h1>
      <br>
      <a href="{{url('/kelas')}}" class="btn btn-primary">Launch</a>
    </div>
  </div> --}}

  {{-- <div class="card" style="width: 18rem;border-radius:18px">
    <img src="{{asset('dist/img/agenda.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h1>Agenda</h1>
      <br>
      <a href="{{url('/agenda')}}" class="btn btn-primary">Launch</a>
    </div>
  </div> --}}
</div>
<div class="container-fluid mt-5">
    <div class="row justify-content-end">
        <div class="col-1">
            <a href="{{ url('logout') }}" class="btn btn-danger">Log Out</a>
        </div>
    </div>
</div>
@endsection