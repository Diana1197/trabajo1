<?php

namespace WsunBundle\Controller;

use WsunBundle\Entity\Roldepago;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Dompdf\Dompdf;
/**
 * Roldepago controller.
 *
 */
class RoldepagoController extends Controller
{
    /**
     * Lists all roldepago entities.
     *
     */
    private $session;
    public function __construct() {
    }
    public function indexAction(Request $request)
    {
        $id=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $roldepago = $em->getRepository('WsunBundle:Roldepago')->findBy(array('idEmpleado' => $id));
       
        $paginator = $this->get('knp_paginator');
        $limite = $this->container->getParameter('limitePaginacion');
        $pagination = $paginator->paginate(
                $roldepago, 
                $request->query->getInt('page', 1),
                $limite
        );
        return $this->render('WsunBundle:roldepago:index.html.twig',
                array('pagination' => $pagination,'id'=>$id));
       
    }

    /**
     * Creates a new roldepago entity.
     *
     */
    public function newAction(Request $request)
    {

        $id=$request->get('id');
        $roldepago = new Roldepago();
        $form = $this->createForm('WsunBundle\Form\RoldepagoType', $roldepago,array($id));
        $form->handleRequest($request);
  
        if ($form->isSubmitted() && $form->isValid()) {
         
            $em = $this->getDoctrine()->getManager();
            $empleado = $em->getRepository('WsunBundle:Empleado')
            ->find($id);
            $roldepago->setIdEmpleado($empleado);
            $em = $this->getDoctrine()->getManager();
            $em->persist($roldepago);
            $em->flush();
            
            return $this->redirectToRoute('roldepago_show', array('id' => $roldepago->getId(),'idEmpleado'=>$id));
        }
      
        return $this->render('WsunBundle:roldepago:new.html.twig', array(
            'roldepago' => $roldepago,'id'=>$id,
            'form' => $form->createView(),
        ));
       
    }

    /**
     * Finds and displays a roldepago entity.
     *
     */
    public function showAction(Roldepago $roldepago, Request $request)
    {
        $idEmpleado=$request->get('idEmpleado');
        
        $deleteForm = $this->createDeleteForm($roldepago);
        
        return $this->render('WsunBundle:roldepago:show.html.twig', array(
            'roldepago' => $roldepago, 'idEmpleado'=>$id,
            'delete_form' => $deleteForm->createView(),

        ));
    }


    /**
     * Displays a form to edit an existing roldepago entity.
     *
     */
    public function editAction(Request $request, Roldepago $roldepago)
    {
        $deleteForm = $this->createDeleteForm($roldepago);
        $editForm = $this->createForm('WsunBundle\Form\RoldepagoType', $roldepago);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('roldepago_edit', array('id' => $roldepago->getId()));
        }
        return $this->render('WsunBundle:roldepago:edit.html.twig', array(
            'roldepago' => $roldepago,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a titulo entity.
     *
     */
    public function deleteAction(Request $request, Roldepago $roldepago)
    {
        $form = $this->createDeleteForm($roldepago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($roldepago);
            $em->flush();
        }

        return $this->redirectToRoute('roldepago_index');
    }

    /**
     * Creates a form to delete a roldepago entity.
     *
     * @param Roldepago $roldepago The roldepago entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Roldepago $roldepago)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('roldepago_delete', array('id' => $roldepago->getId())))
            ->setMethod('DELETE')
            ->getForm()

        ;
    }

    public function exportarPdfAction(Request $request){
        $id=$request->get('id');
        
        /* @var $qb \Doctrine\ORM\QueryBuilder */
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->from('WsunBundle:Roldepago', 'rol');
        $qb->select('e.id,e.cedulaEmp,e.nombreEmp,e.apellidoEmp,e.telefonoEmp,e.direccion,e.email,e.cargoEmp,rol.fecha,rol.sueldoEmp,rol.aporteIess,rol.quirografarioIess,rol.anticipoTipoc,rol.retencionJud,rol.prestamoHipo,rol.otrosDes,rol.totalRecibir,rol.fechaPag,rol.fondosRes,rol.decimoTer,rol.decimoCuar');
        $qb->innerJoin('rol.idEmpleado', 'e');
        $qb->andWhere('rol.id = :id');
        $qb->setParameter('id', $id);
        $rol = $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
      
        $html = $this->renderView('WsunBundle:roldepago:rol.html.twig', array(
            'rol' => $rol
            )
        );
        
       $dompdf = new Dompdf();
       $dompdf->loadHtml($html);
       // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream();
        return new Response($dompdf->stream()
           /* $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="fichero.pdf"'
            )*/
        );


    }


}
