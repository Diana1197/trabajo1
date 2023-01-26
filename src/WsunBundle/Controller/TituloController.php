<?php

namespace WsunBundle\Controller;

use WsunBundle\Entity\Titulo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
/**
 * Titulo controller.
 *
 */
class TituloController extends Controller
{
    /**
     * Lists all titulo entities.
     *
     */
    private $session;
    public function __construct() {
    }
    public function indexAction(Request $request)
    {
        $id=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $titulo = $em->getRepository('WsunBundle:Titulo')->findBy(array('idEmpleado' => $id));
       
        $paginator = $this->get('knp_paginator');
        $limite = $this->container->getParameter('limitePaginacion');
        $pagination = $paginator->paginate(
                $titulo, 
                $request->query->getInt('page', 1),
                $limite
        );

        return $this->render('WsunBundle:titulo:index.html.twig',
                array('pagination' => $pagination,'id'=>$id));
       
    }

    /**
     * Creates a new titulo entity.
     *
     */
    public function newAction(Request $request)
    {

        $id=$request->get('id');
        $titulo = new Titulo();
        $form = $this->createForm('WsunBundle\Form\TituloType', $titulo,array($id));
        $form->handleRequest($request);
   
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($titulo);
            $em->flush();
            
            return $this->redirectToRoute('titulo_show', array('id' => $titulo->getId(),'idEmpleado'=>$id));
        }
        return $this->render('WsunBundle:titulo:new.html.twig', array(
            'titulo' => $titulo,'id'=>$id,
            'form' => $form->createView(),
        ));
       
    }

    /**
     * Finds and displays a titulo entity.
     *
     */
    public function showAction(Titulo $titulo, Request $request)
    {
        $idEmpleado=$request->get('idEmpleado');
        
        $deleteForm = $this->createDeleteForm($titulo);
        
        return $this->render('WsunBundle:titulo:show.html.twig', array(
            'titulo' => $titulo, 'idEmpleado'=>$id,
            'delete_form' => $deleteForm->createView(),

        ));
    }


    /**
     * Displays a form to edit an existing titulo entity.
     *
     */
    public function editAction(Request $request, Titulo $titulo)
    {
        $deleteForm = $this->createDeleteForm($titulo);
        $editForm = $this->createForm('WsunBundle\Form\TituloType', $titulo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('titulo_edit', array('id' => $titulo->getId()));
        }
        return $this->render('WsunBundle:titulo:edit.html.twig', array(
            'titulo' => $titulo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a titulo entity.
     *
     */
    public function deleteAction(Request $request, Titulo $titulo)
    {
        $form = $this->createDeleteForm($titulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($titulo);
            $em->flush();
        }

        return $this->redirectToRoute('titulo_index');
    }

    /**
     * Creates a form to delete a titulo entity.
     *
     * @param Cursos $titulo The titulo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Titulo $titulo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('titulo_delete', array('id' => $titulo->getId())))
            ->setMethod('DELETE')
            ->getForm()

        ;
    }
}
