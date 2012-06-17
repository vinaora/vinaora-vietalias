<?php
 /**
 * @version		$Id: helper.php 2012-06-17 vinaora $
 * @package		Vinaora Vietnamese Alias
 * @subpackage	plg_system_vinaora_vietalias
 * @copyright	Copyright (C) 2010-2012 VINAORA. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 *
 * @website		http://vinaora.com
 * @twitter		http://twitter.com/vinaora
 * @facebook	http://facebook.com/vinaora
 * @google+		https://plus.google.com/111142324019789502653
 *
 * @note		See more details >> http://en.wikipedia.org/wiki/Vietnamese_alphabet
 */
 
// no direct access
defined('_JEXEC') or die;

class plgSystemVinaora_VietAliasHelper{

	/*
	 * Convert to safe characters
	 */
	public static function vt_safe_vietnamese($str, $vietnamese=true, $special=true, $accent=true){
		
		// Remove Vietnamese accent or not
		$str = $accent ? self::vt_remove_vietnamese_accent($str) : $str;
		
		// Replace special symbols with spaces or not
		$str = $special ? self::vt_remove_special_characters($str) : $str;
		
		// Replace Vietnamese characters or not
		$str = $vietnamese ? self::vt_replace_vietnamese_characters($str) : $str;
		
		return $str;
	}
	
	/*
	 * Remove 5 Vietnamese accent / tone marks if has Combining Unicode characters
	 * Tone marks: Grave (`), Acute(´), Tilde (~), Hook Above (?), Dot Bellow(.)
	 */
	public static function vt_remove_vietnamese_accent($str){
		
		$str = preg_replace("/[\x{0300}\x{0301}\x{0303}\x{0309}\x{0323}]/u", "", $str);
		
		return $str;
	}
	
	/*
	 * Remove or Replace special symbols with spaces
	 */
	public static function vt_remove_special_characters($str, $remove=true){
		
		// Remove or replace with spaces
		$substitute = $remove ? "": " ";
		
		$str = preg_replace("/[\x{0021}-\x{002D}\x{002F}\x{003A}-\x{0040}\x{005B}-\x{0060}\x{007B}-\x{007E}\x{00A1}-\x{00BF}]/u", $substitute, $str);
		
		return $str;
	}
	
	/*
	 * Replace Vietnamese vowels with diacritic and Letter D with Stroke with corresponding English characters
	 */
	public static function vt_replace_vietnamese_characters($str){
	
		$str = preg_replace("/[\x{00C0}-\x{00C3}\x{00E0}-\x{00E3}\x{0102}\x{0103}\x{1EA0}-\x{1EB7}]/u", "a", $str);
		$str = preg_replace("/[\x{00C8}-\x{00CA}\x{00E8}-\x{00EA}\x{1EB8}-\x{1EC7}]/u", "e", $str);
		$str = preg_replace("/[\x{00CC}\x{00CD}\x{00EC}\x{00ED}\x{0128}\x{0129}\x{1EC8}-\x{1ECB}]/u", "i", $str);
		$str = preg_replace("/[\x{00D2}-\x{00D5}\x{00F2}-\x{00F5}\x{01A0}\x{01A1}\x{1ECC}-\x{1EE3}]/u", "o", $str);
		$str = preg_replace("/[\x{00D9}-\x{00DA}\x{00F9}-\x{00FA}\x{0168}\x{0169}\x{01AF}\x{01B0}\x{1EE4}-\x{1EF1}]/u", "u", $str);
		$str = preg_replace("/[\x{00DD}\x{00FD}\x{1EF2}-\x{1EF9}]/u", "y", $str);
		$str = preg_replace("/[\x{0110}\x{0111}]/u", "d", $str);
		
		return $str;
	}
}
