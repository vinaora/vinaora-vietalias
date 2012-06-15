<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Filter
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * JFilterOutput
 *
 * @package     Joomla.Platform
 * @subpackage  Filter
 * @since       11.1
 */
class JFilterOutput
{
	/**
	* Makes an object safe to display in forms
	*
	* Object parameters that are non-string, array, object or start with underscore
	* will be converted
	*
	* @param   object An object to be parsed
	* @param   integer The optional quote style for the htmlspecialchars function
	* @param   string|array An optional single field name or array of field names not
	*					to be parsed (eg, for a textarea)
	* @since   11.1
	*/
	public static function objectHTMLSafe(&$mixed, $quote_style=ENT_QUOTES, $exclude_keys='')
	{
		if (is_object($mixed))
		{
			foreach (get_object_vars($mixed) as $k => $v)
			{
				if (is_array($v) || is_object($v) || $v == NULL || substr($k, 1, 1) == '_') {
					continue;
				}

				if (is_string($exclude_keys) && $k == $exclude_keys) {
					continue;
				} else if (is_array($exclude_keys) && in_array($k, $exclude_keys)) {
					continue;
				}

				$mixed->$k = htmlspecialchars($v, $quote_style, 'UTF-8');
			}
		}
	}

	/**
	 * This method processes a string and replaces all instances of & with &amp; in links only.
	 *
	 * @param   string  $input	String to process
	 *
	 * @return  string  Processed string
	 * @since   11.1
	 */
	public static function linkXHTMLSafe($input)
	{
		$regex = 'href="([^"]*(&(amp;){0})[^"]*)*?"';
		return preg_replace_callback("#$regex#i", array('JFilterOutput', '_ampReplaceCallback'), $input);
	}

	/**
	 * This method processes a string and replaces all accented UTF-8 characters by unaccented
	 * ASCII-7 "equivalents", whitespaces are replaced by hyphens and the string is lowercased.
	 *
	 * @param   string  $input	String to process
	 * @return  string  Processed string
	 * @since   11.1
	 */
	public static function stringURLSafe($string)
	{
		//remove any '-' from the string since they will be used as concatenaters
		$str = str_replace('-', ' ', $string);

		$lang = JFactory::getLanguage();
		$str = $lang->transliterate($str);

		// Convert certain symbols to letter representation
		$str = str_replace(array('&', '"', '<', '>'), array('a', 'q', 'l', 'g'), $str);

		// Lowercase and trim
		$str = trim(strtolower($str));

		// Remove any duplicate whitespace, and ensure all characters are alphanumeric
		$str = preg_replace(array('/\s+/','/[^A-Za-z0-9\-]/'), array('-',''), $str);

		return "xx".$str;
	}

	/**
	 * This method implements unicode slugs instead of transliteration.
	 *
	 * @param   string  $input	String to process
	 * @return  string  Processed string
	 * @since   11.1
	*/
	public static function stringURLUnicodeSlug($string)
	{
		// Replace double byte whitespaces by single byte (East Asian languages)
		$str = preg_replace('/\xE3\x80\x80/', ' ', $string);


		// Remove any '-' from the string as they will be used as concatenator.
		// Would be great to let the spaces in but only Firefox is friendly with this

		$str = str_replace('-', ' ', $str);

		// Replace forbidden characters by whitespaces
		$str = preg_replace( '#[:\#\*"@+=;!&\.%()\]\/\'\\\\|\[]#',"\x20", $str );

		// Delete all '?'
		$str = str_replace('?', '', $str);

		// Trim white spaces at beginning and end of alias and make lowercase
		$str = trim(JString::strtolower($str));
		
		/****************************************************************************************************************************/
		// BEGIN: Overrided by Vinaora
		
		// Replace vietnamese characters
		$str = preg_replace("/[\x{00C0}-\x{00C3}\x{00E0}-\x{00E3}\x{0102}\x{0103}\x{1EA0}-\x{1EB7}]/u", "a", $str);
		$str = preg_replace("/[\x{00C8}-\x{00CA}\x{00E8}-\x{00EA}\x{1EB8}-\x{1EC7}]/u", "e", $str);
		$str = preg_replace("/[\x{00CC}\x{00CD}\x{00EC}\x{00ED}\x{0128}\x{0129}\x{1EC8}-\x{1ECB}]/u", "i", $str);
		$str = preg_replace("/[\x{00D2}-\x{00D5}\x{00F2}-\x{00F5}\x{01A0}\x{01A1}\x{1ECC}-\x{1EE3}]/u", "o", $str);
		$str = preg_replace("/[\x{00D9}-\x{00DA}\x{00F9}-\x{00FA}\x{0168}\x{0169}\x{01AF}\x{01B0}\x{1EE4}-\x{1EF1}]/u", "u", $str);
		$str = preg_replace("/[\x{00DD}\x{00FD}\x{1EF2}-\x{1EF9}]/u", "y", $str);
		$str = preg_replace("/[\x{0110}\x{0111}]/u", "d", $str);
		
		// Replace special symbols by spaces
		$str = preg_replace("/[\x{0021}-\x{002F}\x{003A}-\x{0040}\x{005B}-\x{0060}\x{007B}-\x{007E}]/u", "\x20", $str);

		// Replace spaces
		$str = preg_replace("/\s+/", "-", $str);
		// Replace two or more minus sign (--) by one (-)
		$str = preg_replace("/\-+/", "-", $str);
		// Remove the minus sign at the begining or the end
		$str = preg_replace("/^\-|\-$/", "", $str);
		
		// END: Overrided by Vinaora
		/****************************************************************************************************************************/

		// Remove any duplicate whitespace and replace whitespaces by hyphens
		$str = preg_replace('#\x20+#','-', $str);

		return $str;
	}

	/**
	* Replaces &amp; with & for XHTML compliance
	*
	* @todo There must be a better way???
	*
	* @since   11.1
	*/
	public static function ampReplace($text)
	{
		$text = str_replace('&&', '*--*', $text);
		$text = str_replace('&#', '*-*', $text);
		$text = str_replace('&amp;', '&', $text);
		$text = preg_replace('|&(?![\w]+;)|', '&amp;', $text);
		$text = str_replace('*-*', '&#', $text);
		$text = str_replace('*--*', '&&', $text);

		return $text;
	}

	/**
	 * Callback method for replacing & with &amp; in a string
	 *
	 * @param   string  $m	String to process
	 *
	 * @return  string  Replaced string
	 * @since   11.1
	 */
	public static function _ampReplaceCallback($m)
	{
		$rx = '&(?!amp;)';

		return preg_replace('#'.$rx.'#', '&amp;', $m[0]);
	}

	/**
	* Cleans text of all formating and scripting code
	*/
	public static function cleanText (&$text)
	{
		$text = preg_replace("'<script[^>]*>.*?</script>'si", '', $text);
		$text = preg_replace('/<a\s+.*?href="([^"]+)"[^>]*>([^<]+)<\/a>/is', '\2 (\1)', $text);
		$text = preg_replace('/<!--.+?-->/', '', $text);
		$text = preg_replace('/{.+?}/', '', $text);
		$text = preg_replace('/&nbsp;/', ' ', $text);
		$text = preg_replace('/&amp;/', ' ', $text);
		$text = preg_replace('/&quot;/', ' ', $text);
		$text = strip_tags($text);
		$text = htmlspecialchars($text, ENT_COMPAT, 'UTF-8');

		return $text;
	}

	/**
	 * Strip img-tags from string
	 */
	public static function stripImages($string)
	{
		return  preg_replace('#(<[/]?img.*>)#U', '', $string);
	}
}
