<h1>Fatal Error</h1>
<p><?=$this->message?></p>

<h1>Debug Trace</h1>
<ul class="debug">
<?
$trace_count = 0;
$traces = $this->exception->getTrace();
foreach ( $traces as $trace ) {
	?>
	<li>
		#<?=(count($traces) - $trace_count)?> <?=$trace['class'] . $trace['type'] . $trace['function'] . str_replace("('')", '()', ("('" . implode("', '", $trace['args'])) . "')") ?> in <strong><a href="javascript:void(0);" onclick="_Toggle('source_<?=$trace_count?>');"><?=$trace['file']?></a></strong> on line <strong><?=$trace['line']?></strong>
		<? include(dirname(__FILE__).DS.'_source_code.php') ?>
	</li>
	<?
	$trace_count++;
}
?>
</ul>

<p><a href="javascript:void(0);" onclick="var obj = document.getElementById('creoinfo'); if (obj.style.display='none') obj.style.display=''; this.style.display='none';">creoinfo()</a></p>

<div id="creoinfo" style="display:none;">
<? include(dirname(__FILE__).DS.'info.php') ?>
</div>

<p class="legal">&copy; 2005-<?=date(Y)?> <a href="http://creovel.org">creovel.org</a> - A PHP Framework</p>