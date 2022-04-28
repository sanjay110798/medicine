@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.final.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-flag-checkered fa-fw" aria-hidden="true"></i>
    {{ trans('installer_messages.final.title') }}
@endsection

@section('container')

	@if(session('message')['dbOutputLog'])
		<p><strong><small>{{ trans('installer_messages.final.migration') }}</small></strong></p>
		<pre><code>{{ session('message')['dbOutputLog'] }}</code></pre>
	@endif
    <p style="font-size: 16px;background: #316989;color: #fff;padding: 8px;">
		<strong>
			<span>Admin Crediential</span><br>
			<span>Username : adminmedicine@email.com</span><br>
			<span>Password : 12345678</span><br>
			<span>Admin Login Url <a href="{{route('admin.login')}}" style="    color: #2002c7;"> Click Here</a></span>
		</strong>
		<small>
			<p style="background: red;
    color: #fff;
    font-size: 15px;
    padding: 5px;">Please Change Username and Password After Login..</p>
		</small>
	</p>
	<p><strong><small>{{ trans('installer_messages.final.console') }}</small></strong></p>
	<pre><code>{{ $finalMessages }}</code></pre>

	<p><strong><small>{{ trans('installer_messages.final.log') }}</small></strong></p>
	<pre><code>{{ $finalStatusMessage }}</code></pre>

	<p><strong><small>{{ trans('installer_messages.final.env') }}</small></strong></p>
	<pre><code>{{ $finalEnvFile }}</code></pre>


    <div class="buttons">
        <a href="{{ url('/') }}" class="button">{{ trans('installer_messages.final.exit') }}</a>
    </div>

@endsection
