<?php
/**
 * Layout view used by Creovel to display application error information.
 *
 * @access      private
 * @package     Creovel
 * @subpackage  Views
 * @license     http://creovel.org/license MIT License
 * @since       Class available since Release 0.1.0 
 **/
?><h1 class="top">Application Error</h1>
<p class="top"><?=$this->message?></p>

<?php if ((is_object($this->exception)) && ($error_count = count($this->exception->getTrace()))) { ?>
<h1>Debug Trace</h1>
<ul class="debug">
<?php
$trace_count = 0;
$offset = 0;
?>
<?php foreach ($this->exception->getTrace() as $trace) {
        
    // skip traces with no file or line number or magic fucntion calls
    if (!isset($trace['file']) || in_string('__call', $trace['function']) ) {
        $offset++;
        continue;
    }
    
    $num = $error_count - $trace_count - $offset;
    ?>
    <li>
        <?php if (CREO('show_source') && CREO('mode') == 'development' ) { ?>
        #<?=$num?> <?=(isset($trace['class']) ? $trace['class'] : '') . (isset($trace['type']) ? $trace['type'] : '') . (isset($trace['function']) ? $trace['function'] : '')?> in <strong><a href="javascript:void(0);" onclick="toggle('source_<?=$trace_count?>');"><?=$trace['file']?></a></strong> on line <strong><?=$trace['line']?></strong>
        <?php include dirname(__FILE__).DS.'_source.php'; ?>
        <?php } else { ?>
        #<?=$num?> <?=(isset($trace['class']) ? $trace['class'] : '') . (isset($trace['type']) ? $trace['type'] : '') . (isset($trace['function']) ? $trace['function'] : '')?> in <strong><?=$trace['file']?></strong> on line <strong><?=$trace['line']?></strong>
        <?php } ?>
    </li>
    <?php $trace_count++; ?>
    <?php } ?>
</ul>
<?php } ?>

<?php if (CREO('mode') == 'development') { ?>
<p><a href="javascript:void(0);" onclick="$('creoinfo').style.display='block'; this.style.display='none';">More info...</a></p>
<div id="creoinfo" style="display:none;">
<?php include_once CREOVEL_PATH.'views'.DS.'debugger'.DS.'_info.php'; ?>
</div>
<?php } ?>