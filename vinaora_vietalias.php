<?php
/**
 * @version		$Id: vinaora_vietalias.php 2011-07-05 vinaora $
 * @package		Vinaora Vietnamese Alias
 * @subpackage	plg_system_vinaora_vietalias
 * @copyright	Copyright (C) 2010 - 2011 VINAORA. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @website		http://vinaora.com
 * @twitter		http://twitter.com/vinaora
 * @facebook	http://facebook.com/vinaora
 */

// no direct access
defined('_JEXEC') or die;

jimport( 'joomla.plugin.plugin' );

class plgSystemVinaora_VietAlias extends JPlugin
{
	function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);

		if ( JRequest::getCmd('layout') != 'edit') return;
		
		$active = $this->params->get('active_on_page');
		if( !empty($active) && in_array(JRequest::getCmd('option'), $active) ){
			require_once(dirname(__FILE__).DS."vinaora_vietalias_filteroutput.php");
		}

	}

	function onAfterInitialise()
	{
		return true;
	}

	function onAfterRoute()
	{
		return true;
	}
	function onAfterDispatch()
	{
		$option = JRequest::getCmd('option');
		
		if ( JRequest::getCmd('layout') != 'edit') return false;
		
		$enable_ajax = $this->params->get('enable_ajax');
		if( !empty($enable_ajax) && in_array(JRequest::getCmd('option'), $enable_ajax) ){
			$document = &JFactory::getDocument();
			$document->addScript( rtrim(JURI::base(true), 'administrator').'media/plg_system_vinaora_vietalias/js/vinaora_vietalias.js' );
		}
		return true;
	}

	function onBeforeRender()
	{
		return true;
	}

	function onAfterRender()
	{
		return true;
	}

	function onBeforeCompileHead()
	{
		return true;
	}

	function onContentSearch()
	{
		return true;
	}

	function onContentSearchAreas()
	{
		return true;
	}

	function onGetWebServices()
	{
		return true;
	}

}
