<?php

namespace WsunBundle\Controller;

use WsunBundle\Entity\Cursos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
/**
 * Curso controller.
 *
 */
class CursosController extends Controller
{
    /**
     * Lists all curso entities.
     *
     */
    private $session;
    public function __construct() {
    }
    public function indexAction(Request $request)
    {
        $id=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $cursos = $em->getRepository('WsunBundle:Cursos')->findBy(array('idEmpleado' => $id));
        
        $paginator = $this->get('knp_paginator');
        $limite = $this->container->getParameter('limitePaginacion');
        $pagination = $paginator->paginate(
                $cursos, 
                $request->query->getInt('page', 1),
                $limite
        );

        return $this->render('WsunBundle:cursos:index.html.twig',
                array('pagination' => $pagination,'id'=>$id));
       
    }

    /**
     * Creates a new curso entity.
     *
     */
    public function newAction(Request $request)
    {
        $id=$request->get('id');
        $curso = new Cursos();
        $form = $this->createForm('WsunBundle\Form\CursosType', $curso,array($id));
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($curso);
            $em->flush();

            return $this->redirectToRoute('cursos_show', array('id' => $curso->getId(),'idEmpleado'=>$id));
        }

        return $this->render('WsunBundle:cursos:new.html.twig', array(
            'curso' => $curso,'id'=>$id,
            'form' => $form->createView(),

        ));
    }

    /**
     * Finds and displays a curso entity.
     *
     */
    public function showAction(Cursos $curso, Request $request)
    {
        $id=$request->get('idEmpleado');
        
        $deleteForm = $this->createDeleteForm($curso);

        return $this->render('WsunBundle:cursos:show.html.twig', array(
            'curso' => $curso,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to edit an existing curso entity.
     *
     */
    public function editAction(Request $request, Cursos $curso)
    {
        $idEmpleado=$request->get('idEmpleado');
        $deleteForm = $this->createDeleteForm($curso);
        $editForm = $this->createForm('WsunBundle\Form\CursosType', $curso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cursos_edit', array('id' => $curso->getId(), 'idEmpleado'=>$idEmpleado));
        }
              return $this->render('WsunBundle:cursos:edit.html.twig', array(
            'curso' => $curso,
            'edit_form' => $editForm->createView(),
            'idEmpleado'=>$idEmpleado,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a curso entity.
     *
     */
    public function deleteAction(Request $request, Cursos $curso)
    {
        $form = $this->createDeleteForm($curso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($curso);
            $em->flush();
        }

        return $this->redirectToRoute('cursos_index');
    }

    /**
     * Creates a form to delete a curso entity.
     *
     * @param Cursos $curso The curso entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cursos $curso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cursos_delete', array('id' => $curso->getId())))
            ->setMethod('DELETE')
            ->getForm()

        ;
    }
}
