<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<?=stylesheet_include_tag(array('default'))?>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>creovel - A PHP Framework</title>

	<?=javascript_include_tag(array('prototype'))?>

</head>
<body>

<div id="wrapper">

	<div id="header">
		<p class="name"><strong>creo</strong><em>vel</em><br /></p>
		<p>A PHP Framework</p>
	</div>
	
	<div id="content">
	
	@@page_contents@@
	
	</div>
	
	<div id="footer">
		<p>Copyright &copy; 2005-<?=date(Y)?>, Creovel, creovel.org</p>
		<p>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:</p>
		<p>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.</p>
		<p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.</p>
		<p>Licensed under The MIT License (<a href="http://www.opensource.org/licenses/mit-license.php">http://www.opensource.org/licenses/mit-license.php</a> The MIT License). Redistributions of files must retain the above copyright notice.</p>
	</div>

</div>

</body>
</html>