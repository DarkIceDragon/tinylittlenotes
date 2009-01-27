<?php

/**
 * category actions.
 *
 * @package    tinylittlenotes
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class categoryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->category_list = CategoryPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->category = CategoryPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->category);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CategoryForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new CategoryForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($category = CategoryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoryForm($category);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($category = CategoryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoryForm($category);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($category = CategoryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
    $category->delete();

    $this->redirect('category/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $category = $form->save();

      $this->redirect('category/edit?id='.$category->getId());
    }
  }
}
