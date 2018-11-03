<?php

namespace AppBundle\Controller;

use AppBundle\Entity\servidor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Servidor controller.
 *
 * @Route("servidor")
 */
class servidorController extends Controller
{
    /**
     * Lists all servidor entities.
     *
     * @Route("/", name="servidor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $servidors = $em->getRepository('AppBundle:servidor')->findAll();

        return $this->render('servidor/index.html.twig', array(
            'servidors' => $servidors,
        ));
    }

    /**
     * Creates a new servidor entity.
     *
     * @Route("/new", name="servidor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $servidor = new Servidor();
        $form = $this->createForm('AppBundle\Form\servidorType', $servidor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servidor);
            $em->flush();

            return $this->redirectToRoute('servidor_show', array('id' => $servidor->getId()));
        }

        return $this->render('servidor/new.html.twig', array(
            'servidor' => $servidor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a servidor entity.
     *
     * @Route("/{id}", name="servidor_show")
     * @Method("GET")
     */
    public function showAction(servidor $servidor)
    {
        $deleteForm = $this->createDeleteForm($servidor);

        return $this->render('servidor/show.html.twig', array(
            'servidor' => $servidor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing servidor entity.
     *
     * @Route("/{id}/edit", name="servidor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, servidor $servidor)
    {
        $deleteForm = $this->createDeleteForm($servidor);
        $editForm = $this->createForm('AppBundle\Form\servidorType', $servidor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('servidor_edit', array('id' => $servidor->getId()));
        }

        return $this->render('servidor/edit.html.twig', array(
            'servidor' => $servidor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a servidor entity.
     *
     * @Route("/{id}", name="servidor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, servidor $servidor)
    {
        $form = $this->createDeleteForm($servidor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($servidor);
            $em->flush();
        }

        return $this->redirectToRoute('servidor_index');
    }

    /**
     * Creates a form to delete a servidor entity.
     *
     * @param servidor $servidor The servidor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(servidor $servidor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('servidor_delete', array('id' => $servidor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
