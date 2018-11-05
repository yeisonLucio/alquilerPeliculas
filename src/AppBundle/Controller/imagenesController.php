<?php

namespace AppBundle\Controller;

use AppBundle\Entity\imagenes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * imagenes controller.
 *
 * @Route("imagenes")
 */
class imagenesController extends Controller
{
    /**
     * Lists all imagenes entities.
     *
     * @Route("/", name="imagenes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $imagenes = $em->getRepository('AppBundle:imagenes')->findAll();

        return $this->render('imagenes/index.html.twig', array(
            'imagenes' => $imagenes,
        ));
    }

    /**
     * Creates a new imagenes entity.
     *
     * @Route("/new", name="imagenes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $imagenes = new imagenes();
        $form = $this->createForm('AppBundle\Form\imagenesType', $imagenes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imagenes);
            $em->flush();

            return $this->redirectToRoute('imagenes_show', array('id' => $imagenes->getId()));
        }

        return $this->render('imagenes/new.html.twig', array(
            'imagenes' => $imagenes,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a imagenes entity.
     *
     * @Route("/{id}", name="imagenes_show")
     * @Method("GET")
     */
    public function showAction(imagenes $imagenes)
    {
        $deleteForm = $this->createDeleteForm($imagenes);

        return $this->render('imagenes/show.html.twig', array(
            'imagenes' => $imagenes,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing imagenes entity.
     *
     * @Route("/{id}/edit", name="imagenes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, imagenes $imagenes)
    {
        $deleteForm = $this->createDeleteForm($imagenes);
        $editForm = $this->createForm('AppBundle\Form\imagenesType', $imagenes);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('imagenes_edit', array('id' => $imagenes->getId()));
        }

        return $this->render('imagenes/edit.html.twig', array(
            'imagenes' => $imagenes,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a imagenes entity.
     *
     * @Route("imagenes/{id}", name="imagenes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, imagenes $imagenes)
    {
        $form = $this->createDeleteForm($imagenes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imagenes);
            $em->flush();
            $this->addFlash(
                'success',
                'imagen eliminada!'
            );
        }

        return $this->redirectToRoute('imagenes_index');
    }

    /**
     * Creates a form to delete a imagenes entity.
     *
     * @param imagenes $imagenes The imagenes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(imagenes $imagenes)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('imagenes_delete', array('id' => $imagenes->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
