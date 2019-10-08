<?php 


namespace Drupal\Form;
 
 use Drupal\Core\Form\FormBase;
 use Drupal\Core\Form\FormStateInterFace
 
 class ExampleForm extends \Drupal\Core\Form\FormBase
 {
	 
	 public function getFormID( {
	 return 'example_form'
	 }
	 
	 public function buildForm(array $form,array &$form_state) {
		 
		 $form['fname] = array(
		 '#type'=> 'textfield',
		 '#title' =>$this ->t('Your first name.')
		 );
		 
		 $form['lname'] = array(
		 '#type'=> 'textfield'
		 '#title' => $this ->t('Your last name')
		 );
		 $form['sub'] = array(
		 '#type'=> 'textfield',
		 '#title' => $this ->t('Subject')
		 );
		 $form['email'] = array(
		 '#type'=> 'textfield',
		 '#title' => $this ->t('Your email')
		 );
		 $form['message'] = array(
		 '#type'=> 'TextArea',
		 '#title' => $this ->t('Message')
		 '#description' => $this->t('Note that the message must be at least 10 characters in length.'),
         '#required' => TRUE,
		 );
		 
	
		 $form['actions'] = [
      '#type' => 'actions',
    ];
		 $form['action']['submit'] =[
		 '#type' =>'submit',
		 '#value'=>$this->t('send'),
		 ];
		 
	 }
	 
	 public function validateForm(array &$form, FormStateInterFace $Form_state) {
		 parent:: validateForm($form, $form_state);
		 
		 $email = $form_state->getValue('email')
		 $needle = 'example@site.com'
		 $message = $form_state->getValue('message')
		 
		 
		 if(strripos($email,$needle) === false){
			 $form_state-> setErrorByName('email', $this ->('email is invalid'));
		 }
		 
		 if (strlen($message) < 10) {
      $form_state->setErrorByName('message', $this->t('message be at least 10 characters long.'));
	  
    }
	
		 
			 
		 }
		
		 
	 }