<?php

namespace WsunBundle\Controller;

use WsunBundle\Entity\Empleado;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

 /**
     * @Security("has_role('ROLE_ADMIN')")
     */
class EmpleadoController extends Controller
{
    private $session;
    public function __construct() {
        $this->session=new Session();
    }
    /**
     * Lists all empleado entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $empleados = $em->getRepository('WsunBundle:Empleado')->findAll();
        $paginator = $this->get('knp_paginator');
        $limite = $this->container->getParameter('limitePaginacion');
        $pagination = $paginator->paginate(
                $empleados, 
                $request->query->getInt('page', 1),
                $limite
        );
        return $this->render('WsunBundle:empleado:index.html.twig',
                array('pagination' => $pagination));
    }  

    /**
     * Creates a new empleado entity.
     *
     */
    public function newAction(Request $request)
    {
        $empleado = new Empleado();
        $form = $this->createForm('WsunBundle\Form\EmpleadoType', $empleado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empleado);
            $em->flush();

            return $this->redirectToRoute('empleado_show', array('id' => $empleado->getId()));
        }

        return $this->render('WsunBundle:empleado:new.html.twig', array(
            'empleado' => $empleado,
            'form' => $form->createView(),
        ));


    }

    /**
     * Finds and displays a empleado entity.
     *
     */
    public function showAction(Empleado $empleado)
    {
        $deleteForm = $this->createDeleteForm($empleado);

        return $this->render('WsunBundle:empleado:show.html.twig', array(
            'empleado' => $empleado,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing empleado entity.
     *
     */
    public function editAction(Request $request, Empleado $empleado)
    {
        $deleteForm = $this->createDeleteForm($empleado);
        $editForm = $this->createForm('WsunBundle\Form\EmpleadoType', $empleado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('empleado_edit', array('id' => $empleado->getId()));
        }

        return $this->render('WsunBundle:empleado:edit.html.twig', array(
            'empleado' => $empleado,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a empleado entity.
     *
     */
    public function deleteAction(Request $request, Empleado $empleado)
    {
        $repository = $doctrine->getRepository(Curso::class);

        
        // look for a single Product by name
        $product = $repository->findOneBy(['idEmpleado' => $empleado->getId()]);
        // or find by name and price
       /* $product = $repository->findOneBy([
            'name' => 'Keyboard',
            'price' => 1999,
        ]);*/
        var_dump($product);die;
        $form = $this->createDeleteForm($empleado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($empleado);
            $em->flush();
        }

        return $this->redirectToRoute('empleado_index');
    }

    /**
     * Creates a form to delete a empleado entity.
     *
     * @param Empleado $empleado The empleado entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Empleado $empleado)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('empleado_delete', array('id' => $empleado->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
