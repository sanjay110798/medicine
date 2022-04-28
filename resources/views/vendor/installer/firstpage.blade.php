@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.welcome.templateTitle') }}
@endsection

@section('title')
    {{ trans('installer_messages.welcome.title') }}
@endsection

@section('container')
    <p class="text-center">
      {{ trans('installer_messages.welcome.message') }}
    </p>
    @php
     $ipaddress = '';
       if (isset($_SERVER['HTTP_CLIENT_IP']))
           $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
       else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
           $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
       else if(isset($_SERVER['HTTP_X_FORWARDED']))
           $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
       else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
           $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
       else if(isset($_SERVER['HTTP_FORWARDED']))
           $ipaddress = $_SERVER['HTTP_FORWARDED'];
       else if(isset($_SERVER['REMOTE_ADDR']))
           $ipaddress = $_SERVER['REMOTE_ADDR'];
       else
           $ipaddress = 'UNKNOWN'; 
      @endphp
    <form method="post" action="{{ route('LaravelInstaller::next') }}">
      @csrf
    <p class="text-center">
      <input type="text" name="purchase_key" class="form-control" placeholder="Enter Purchase Key" required>
      <input type="hidden" name="domain" value="{{request()->getHost()}}">
      <input type="hidden" name="ip_address" value="{{$ipaddress}}">
    </p>
    <p class="text-center">
      <button type="submit" class="button btn-sm" style="padding: 5px 10px;font-size: 13px;">
        Process
        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
      </button>
    </p>
    </form>
@endsection
