 /**
 * @version		$Id: vinaora_vietalias.js 2012-06-17 vinaora $
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

function vt_remove_vietnamese_accent(a){a=a.replace(/[\u0300\u0301\u0303\u0309\u0323]/g,"");return a};function vt_remove_special_characters(a){a=a.replace(/[\u0021-\u002D\u002F\u003A-\u0040\u005B-\u0060\u007B-\u007E\u00A1-\u00BF]/g," ");return a};function vt_replace_vietnamese_characters(a){a=a.replace(/[\u00C0-\u00C3\u00E0-\u00E3\u0102\u0103\u1EA0-\u1EB7]/g,"a");a=a.replace(/[\u00C8-\u00CA\u00E8-\u00EA\u1EB8-\u1EC7]/g,"e");a=a.replace(/[\u00CC\u00CD\u00EC\u00ED\u0128\u0129\u1EC8-\u1ECB]/g,"i");a=a.replace(/[\u00D2-\u00D5\u00F2-\u00F5\u01A0\u01A1\u1ECC-\u1EE3]/g,"o");a=a.replace(/[\u00D9-\u00DA\u00F9-\u00FA\u0168\u0169\u01AF\u01B0\u1EE4-\u1EF1]/g,"u");a=a.replace(/[\u00DD\u00FD\u1EF2-\u1EF9]/g,"y");a=a.replace(/[\u0110\u0111]/g,"d");return a};function vt_safe_vietnamese(a){a=vt_remove_vietnamese_accent(a);a=vt_remove_special_characters(a);a=vt_replace_vietnamese_characters(a);a=a.replace(/\s+/g,"-");a=a.replace(/[^A-Za-z0-9\-]/g,"");a=a.replace(/\-+/g,"-");a=a.replace(/^\-|\-$/g,"");a=a.toLowerCase();return a};window.addEvent('domready',function(){if($('jform_alias')==null)return;inputName='jform_title';if($(inputName)==null){inputName='jform_name';if($(inputName)==null)return}$(inputName).addEvent('keyup',function(e){current_value=$(inputName).value;current_length=current_value.length;if(current_length){$('jform_alias').value=vt_safe_vietnamese(current_value)}})});