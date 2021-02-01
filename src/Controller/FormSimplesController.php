<?php
/**
 * Class FormSimplesController
 */
namespace Drupal\form_simples\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 * Mantém o Formulário simples.
 */
class FormSimplesController extends ControllerBase {
	/**
	 * Página inicial
	 *
	 * @return 	void
	 */
	public function content()
	{
		$retorno = 
		[
			'#type' 	=> 'markup',
			'#markup' 	=> t('Página inicial do controller do formulário')
		];

		return $retorno;
	}
}