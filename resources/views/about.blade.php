@extends('template.main')
@section('title','About')
@section('content')
<div class="col-md-12">
    <div class="card">
    
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('template')}}/doc/profile.jpg" style="width: 250px; height:300px;">  
                </div>
                <div class="col-md-8">
                    <h1>Aplikasi ini dibuat oleh : </h1>
                   <h4>Nama     : Ananda Wahyu S</h4>
                   <h4>NIM      : 1931713017</h4>
                   <h4>Tanggal  : 23 November 2021</h4>
                </div>
            </div>
        </div>
 
    </div>
</div>
@endsection