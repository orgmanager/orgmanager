@inject('deployutils', 'M1guelpf\DeployingMode\Utils')
<!DOCTYPE html>
<html lang="en-us" class="no-js">
	<head>
		<meta charset="utf-8">
        <title>{{ config('app.name') }}</title>
        <link rel="shortcut icon" href="{{ url('favicon.ico') }}">
        <link rel="stylesheet" href="{{ url('css/503.min.css') }}" />
	@include('layouts.code.head')
	</head>
	<body>
		<div id="loading">
			<div id="preloader">
				<span></span>
				<span></span>
			</div>
		</div>
		<canvas id="dotty"></canvas>
		<section id="left-side">
			<img src="{{ url('img/orgmanagerIcon.png') }}" alt="OrgManager" class="brand-logo" />
			<div class="content">
				<h1 class="text-intro opacity-0">Hey Guys!<br>
					@if($deployutils->isDeploying())
						We're currently under deployment</h1>
					<h2 class="text-intro opacity-0">We enabled deployment mode {{ $exception->wentDownAgo }} for deploying <a href="{{ url('https://github.com/orgmanager/orgmanager/commit/'.$exception->commit) }}" target="_blank">{{ $exception->prettyCommit }}</a>.</h2>
					@else
					We're currently under manteniance</h1>
					<h2 class="text-intro opacity-0">We enabled manteniance mode {{ $exception->wentDownAt }} for {{ $exception->getMessage() }}</h2>
					@endif
					<nav>
					<ul>
						<li>
							<a href="https://status.miguelpiedrafita.com/components/58c0fca18c48eb4923fc46bf" target="_blank" id="status-page" class="light-btn text-intro opacity-0">OrgManager Status Page</a>
						</li>
						<li>
							<a href="https://github.com/orgmanager/orgmanager" target="_blank" class="action-btn trigger text-intro opacity-0">GitHub</a>
						</li>
					</ul>
				</nav>
			</div>
		</section>
	<script src="{{ url('https://code.jquery.com/jquery-1.11.3.min.js') }}"></script>
	<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js') }}"></script>
	<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.ui.min.js') }}"></script>
	<script src="{{ url('js/503.min.js') }}"></script>
	@include('layouts.code.footer')
	</body>
</html>
