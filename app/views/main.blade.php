<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fantasy Language Builder</title>
	<link rel="stylesheet" type="text/css" href="/css/styles.css" />

</head>
<body>

<div id="content_wrapper">
	<div id="navigation">
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/language">Manage Languages &amp; Phonemes</a></li>
			<li><a href="/generate">Generate Words</a></li>
		</ul>
	</div>
	
	<div id="content">
		<h1>Fantasy Language Builder{{ $title }}</h1>
		@yield('subnav')
		@yield('body')
	</div>
</div>

</body>
</html>
