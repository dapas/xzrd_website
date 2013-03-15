<?php
/**
 * FileName: 	function.php
 * Summary:		function
 * Author:		DingRen
 */

	/**
 	 * text filter
 	 *
 	 * @return string text after filter
 	 */
	function text_filter($text)
	{
		$text = htmlspecialchars($text);
		$text = nl2br($text);
		return $text;
	}

?>