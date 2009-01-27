<?php

/**
 * Person form base class.
 *
 * @package    tinylittlenotes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BasePersonForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'first'      => new sfWidgetFormInput(),
      'last'       => new sfWidgetFormInput(),
      'nickname'   => new sfWidgetFormInput(),
      'image_name' => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'first'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nickname'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image_name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('person[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Person';
  }


}
