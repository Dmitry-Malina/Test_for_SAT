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
		 
		 $form['fname'] = array(
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
		 
		 public function submitForm( array &$form, FormStateInterFace $form_state){
	 $email = $form_state->getValue('email');
    $firstname = $form_state->getValue('fname');
    $lastname = $form_state->getValue('lname');
	$message =  $form_state->getValue('message');
    $arr = array(
      'properties' => [
        [
          'property' => 'firstname',
          'value' => $firstname
        ],
        [
          'property' => 'lastname',
          'value' => $lastname 
        ],
		[
          'property' => 'message',
          'value' => $message 
        ],
		[
          'property' => 'email',
          'value' => $email 
        ]
      ]
    );
    $json = json_encode($arr)
$hapikey = readline("7a706f47-8d6a-42f9-b52e-5843a1cc5400");
 $endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey='.$hapikey;
   $response = \Drupal::httpClient()->post($endpoint.'&_format=hal_json', [
      'headers' => [
        'Content-Type' => 'application/json'
      ],
        'body' => $json
    ]);
 }
}
		 } 
	 }