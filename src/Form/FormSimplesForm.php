<?php
/**
 * Class FormSimplesForm
 */
namespace Drupal\form_simples\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\InvokeCommand;
/**
 * Mantém o formulário simples.
 */
class FormSimplesForm extends FormBase {
	/**
	 */
	public function getFormId()
	{
		return 'form_simples';
	}

	/**
	 * Retorna o formulário
	 *
	 * @param
	 * @param
	 * @return
	 */
	public function buildForm( array $form, FormStateInterface $form_state )
	{
		$form['nome'] =
		[
			'#type' 	=> 'textfield',
			'#title' 	=> $this->t( 'Nome:'  ),
			'#value' 	=> 'José Raimundo Carlos Cunha'
		];

		$form['email'] =
		[
			'#type' 	=> 'textfield',
			'#title' 	=> $this->t( 'e-mail:'  ),
		];

		$form['actions'] =
		[
			'#type'		=> 'button',
			'#value' 	=> t('Enviar'),
			'#ajax' 	=> ['callback'=>'::setMessage']
		];

		$form['#attached']['library'][] = 'form_simples/librarie';

		return $form;
	}

	/**
	 * Retorna a resposta ajax
	 *
	 * @param 	array 	$form
	 * @param 	Drupal\Core\Form\FormStateInterface
	 * @return 	Drupal\Core\Ajax\AjaxResponse 	$response
	 */
	public function setMessage( array $form, FormStateInterface $form_state )
	{
		$response 		= new AjaxResponse();

		$postNome 		= @$form_state->getValue('nome');
		$postEmail 		= @$form_state->getValue('email');

		/*$htmlRetorno 	= "<div class='my_top_message'>nome: \"$postNome\", e-mail: \"$postEmail\"</div>";
		$comandoHtml 	= new HtmlCommand('.ajax_message', $htmlRetorno );
		$response->addCommand( $comandoHtml );*/

		$response->addCommand( new InvokeCommand(NULL, 'funcaoJsQuePegaRetornoAjax', [$postEmail, $postNome] ) );

		return $response;
	}

	/**
	 * Submete o formulário.
	 *
	 * @param
	 * @param
	 * @return 	void
	 */
	public function submitForm( array &$form, FormStateInterface $form_state )
	{

	}
}