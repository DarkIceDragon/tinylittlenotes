<?php

/**
 * person actions.
 *
 * @package    tinylittlenotes
 * @subpackage person
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class personActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->person_list = PersonPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->person = PersonPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->person);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PersonForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new PersonForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($person = PersonPeer::retrieveByPk($request->getParameter('id')), sprintf('Object person does not exist (%s).', $request->getParameter('id')));
    $this->form = new PersonForm($person);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($person = PersonPeer::retrieveByPk($request->getParameter('id')), sprintf('Object person does not exist (%s).', $request->getParameter('id')));
    $this->form = new PersonForm($person);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($person = PersonPeer::retrieveByPk($request->getParameter('id')), sprintf('Object person does not exist (%s).', $request->getParameter('id')));
    $person->delete();

    $this->redirect('person/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $person = $form->save();

      $this->redirect('person/edit?id='.$person->getId());
    }
  }
}
