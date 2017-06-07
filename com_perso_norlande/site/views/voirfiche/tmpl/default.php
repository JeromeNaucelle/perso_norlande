<?php

include('components/com_perso_norlande/helpers/template.php');
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$doc = JFactory::getDocument();


$template = new Template('./');

  // modèle à utiliser auquel on adjoint un nom arbitraire

  $template->set_filenames(array(
    'body' => 'components/com_perso_norlande/views/voirfiche/tmpl/fichePerso.html'
  ));

  // Assignation des variables
/*
  $template->assign_vars(array(
    'PSEUDO' => "pseudo",
    'EMAIL'  => "mail"

  ));
  */

	foreach($this->competencesClassees as $classement) {
		$template->assign_vars(array(
    'comp_'.$classement->getFamille().'_lvl1' => $classement->getFromLevel(1),
    'comp_'.$classement->getFamille().'_lvl2' => $classement->getFromLevel(2),
	 'comp_'.$classement->getFamille().'_lvl3' => $classement->getFromLevel(3),
	 'comp_'.$classement->getFamille().'_lvl4' => $classement->getFromLevel(4)
  		));
	}
	
	$template->assign_vars(array(
    'mana' => 10,
    'coups' => 3
  		));
  		
  		
  	$pieges = $this->synthese->getPieges();
  	foreach($pieges as $piege) {
  		
	  	$template->assign_block_vars('technique', array(
	    'nom' => $piege->nom,
	    'cout' => $piege->cout,
	    'effet' => $piege->effet
	  		));
  	}
  	
  	$techniques = $this->synthese->getTechniques();
  	foreach($techniques as $technique) {
  		
	  	$template->assign_block_vars('technique', array(
	    'nom' => $technique->nom,
	    'cout' => $technique->cout,
	    'effet' => $technique->effet
	  		));
  	}
  	
  	$invocations = $this->synthese->getInvocations();
  	foreach($invocations as $invocation) {
  		
	  	$template->assign_block_vars('capa_occulte', array(
	    'nom' => $invocation->nom,
	    'cout' => $invocation->cout,
	    'effet' => $invocation->effet
	  		));
  	}
  	
  	$breuvages = $this->synthese->getBreuvages();
  	foreach($breuvages as $breuvage) {
  		
	  	$template->assign_block_vars('capa_occulte', array(
	    'nom' => $breuvage->nom,
	    'cout' => $breuvage->cout,
	    'effet' => $breuvage->effet
	  		));
  	}
  	
  	$parcelles = $this->synthese->getParcelles();
  	foreach($parcelles as $parcelle) {
  		
	  	$template->assign_block_vars('parcelle', array(
	    'nom' => $parcelle
	  		));
  	}
	
  // Affichage des données

  $template->pparse('body');
?>
