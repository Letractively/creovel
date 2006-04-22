<?php
/*
 * HTML helpers here.
 */
 
/**
 * Redirects the page. **Note should only be used on the contrller.
 *
 * @params string $controller required
 * @params string $action required
 * @params int $id optional
 */
function redirect_to($controller = '', $action = '', $id = '')
{

	header('location: ' . url_for($controller, $action, $id));
	die;
	
}

/**
 * Returns a stylesheets include tag.
 *
 * @author Nesbert Hidalgo
 * @param string/array $url required
 * @mparam string $/array optional default set to "screen"
 */
function stylesheet_include_tag($url, $media = 'screen')
{
	if ( is_array($url) ) {
	
		foreach ( $url as $path ) {
		
			$str .= "<link rel=\"stylesheet\" type=\"text/css\" media=\"".$media."\" href=\"/stylesheets/".$path.".css\">\n";
		
		}
		
		return $str;
	
	} else {
	
		return sprintf('<link rel="stylesheet" type="text/css" media="'.$media.'" href="%s">', $url);
		
	}
	
}

/**
 * Returns a javascript script tag.
 *
 * @author Nesbert Hidalgo
 * @param string $script required
 */
function javascript_tag($script)
{
	return sprintf('<script language="javascript" type="text/javascript">%s</script>'."\n", $script);
}

/**
 * Returns a javascript include tag.
 *
 * @author Nesbert Hidalgo
 * @param string/array $url required
 */
function javascript_include_tag($url)
{
	if ( is_array($url) ) {
	
		foreach ( $url as $path ) {
		
			$str .= "<script language=\"javascript\" type=\"text/javascript\" src=\"/javascripts/".$path.".js\"></script>\n";
		
		}
		
		return $str;
	
	} else {
	
		return sprintf('<script language="javascript" type="text/javascript" src="%s"></script>', $url);
		
	}
}

/**
 * Creates a url path for lazy programmers. Example:
 *
 *	url_for('user', 'edit', 1234)
 *
 * @author Nesbert Hidalgo
 * @param string $controller required
 * @param string $action required
 * @param mixed $id optional
 */
function url_for($controller = '', $action = '', $id = '')
{

	if ( is_array($id) ){
	
		$params = '?';
		
		foreach ($id as $key => $value ) {
			if (is_array($value)) {
				$params .= http_build_query(array($key=>$value)) .'&';
			} else if ($key == '#') {
				$params	.= '#' . $value .'&';
			} else {
				$params	.= ( $key ? $key : '' ).( $key && ($value !== '') ? '='.$value : $value ).'&';
			}
		}
		
		$id = substr($params, 0, -1);
	
	}

	return DS.($controller?$controller.DS.($action?$action.DS:'').($action&&$id?$id:''):'');
	
}

/**
 * Creates a anchor link for lazy programmers. Example:
 *
 *	link_to('Edit', 'agent', 'edit', $this->agent->id, array( 'class' => 'classname', 'name' => 'top'))
 *
 * @author Nesbert Hidalgo
 * @param string $link_title optional defaults to "Goto"
 * @param string $controller required
 * @param string $action required
 * @param mixed $id optional
 * @param array $html_options optional
 */
function link_to($link_title = 'Goto', $controller = '', $action = '', $id = '', $html_options = null)
{
	return '<a href="'.url_for($controller, $action, $id).'"'.html_options_str($html_options).'>'.$link_title.'</a>';
}

/**
 * Creates a string of html tag attributes
 *
 * @author Nesbert Hidalgo
 * @param string $html_options required
 */
function html_options_str($html_options)
{

	if ( is_array($html_options)  && count($html_options) > 0){
	
		// lowercase all attributes
		foreach ( $html_options as $attribute => $value ) $temp_arr[strtolower($attribute)] = $value;
		$html_options = $temp_arr;

		// add confirm pop up
		if ( is_array($html_options) && in_array('confirm', array_keys($html_options)) ) {
			$msg = str_replace("'", "\'", htmlentities($html_options['confirm']));
			$html_options['onclick'] = "if ( !window.confirm('{$msg}') ) return false; ".$html_options['onclick'];		
		}
			
		$extra = '';
	
		foreach ($html_options as $attribute => $value ) {
		
			switch ($attribute) {
			
				case 'name':
				case 'id':
				case 'value':
				case 'method':
				case 'action':
				case 'confirm':
				case 'controller':
					continue;
				break;
				
				default:
					$extra	.= ' '.$attribute.( $value ? '="'.$value.'"' : '' );
				break;
				
			}
	
		}
		
	}
	
	return $extra;

}

/**
 * Creates an email link
 *
 * @author Nesbert Hidalgo
 * @param string $email required
 * @param string $link_title optional
 * @param array $html_options optional
 */
function email_to($email, $link_title = null, $html_options = null)
{
	return '<a href="mailto:'.$email.'"'.html_options_str($html_options).'>'.( $link_title ? $link_title : $email ) .'</a>';
}

?>