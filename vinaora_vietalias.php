<?php
 /**
 * @version		$Id: vinaora_vietalias.php 2012-07-01 vinaora $
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

jimport( 'joomla.plugin.plugin' );

class plgSystemVinaora_VietAlias extends JPlugin
{
	var $layout = '';
	var $option = '';

	function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
	}
	
	function onAfterRoute(){

		$this->layout = JRequest::getCmd('layout');
		$this->option = JRequest::getCmd('option');
		
		if ( $this->layout != 'edit') return;
		
		$active = (bool) $this->params->get('active_on');
		$pages	= $this->params->get('active_on_specific');
		
		if( $active || (strpos($pages, $this->option) !== false) )
		{
			require_once dirname(__FILE__).DS.'output.php';
		}
	}

	function onAfterDispatch(){
		
		if ( $this->layout != 'edit') return;
		
		$auto_complete	= (bool) $this->params->get('auto_complete');
		$pages			= $this->params->get('auto_complete_on_specific');
		
		if( $auto_complete || (strpos($pages, $this->option) !== false) )
		{
			$document = &JFactory::getDocument();
			$document->addScript( rtrim(JURI::root( true ), '/').'/media/plg_system_vinaora_vietalias/js/vinaora_vietalias.js' );
		}
		return true;
	}
	
	private function _fixOldAlias($tablename="content"){

		require_once dirname(__FILE__).DS.'output.php';
		
		$db =& JFactory::getDBO();
        $query = $db->getQuery(true);
		
		// $query = "SELECT id, title FROM #__$tablename;";
		$query->select('id, title');
		$query->from($db->quoteName("#__$tablename"));

		$db->setQuery($query);
		$rows = $db->loadAssocList();
		
		// If found any rows
		if( !empty($rows) && count($rows) ){
			foreach ($rows as $row){
				$id		= (int) $row["id"];
				$alias	= JFilterOutput::stringURLSafe($row["title"]);
				
				// $query	= "UPDATE #__$tablename SET alias='$alias' WHERE id=$id;";
				$query = $db->getQuery(true);
				$query->update($db->quoteName("#__$tablename"));
				$query->set('alias='.$db->quote($alias));
				$query->where('id='.$db->quote($id));
				
				$db->setQuery($query);
				$result = $db->query();
			}
		}
		
	}
}
