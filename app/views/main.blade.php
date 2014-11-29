<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fantasy Language Builder</title>
	<style type = "text/css">
	
	body
{
	text-align: left;
}

h1 
{
	font-size: 32px;
	margin: 16px 0 0 0;
}

table
{
	width: 100%;
	border-collapse: collapse;
}

td, th
{
	border: 1px solid black;
	padding: 1em;
	vertical-align: top;
}

#navigation
{
	width: 24%;
	float: left;
}

#content
{
	width: 74%;
	float: right;
}

.columns
{    
	-webkit-column-count: 5; 
	-moz-column-count: 5;
	column-count: 5;
}     


.columns p
{
	margin-top: 0;
	padding-top: 0;
}

.alert
{
	font-weight: bold;
	color: red;
}
	
	</style>

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
