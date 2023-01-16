@extends('front.master')
@section('content')
@include('front.breadcrumb'); 
<center>
<h1>{{$page_title}}</h1>
<br>
<a style="background-color:#66139B;" href="{{url('/')}}" class="btn btn-large btn-primary">Back to Home</a>
<br> &nbsp; <br>
</center>
@endsection