<?php

namespace AppBundle\Controller;

use AppBundle\Entity\pelicula;
use AppBundle\Entity\usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pelicula controller.
 *
 * @Route("pelicula")
 */
class peliculaController extends Controller
{
    /**
     * Lists all pelicula entities.
     *
     * @Route("/", name="pelicula_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $peliculas = $em->getRepository('AppBundle:pelicula')->findAll();

        

        return $this->render('pelicula/index.html.twig', array(
            'peliculas' => $peliculas,
        ));
    }

    /**
     * Creates a new pelicula entity.
     *
     * @Route("/new", name="pelicula_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {   
      
        $pelicula = new Pelicula();
        $form = $this->createForm('AppBundle\Form\peliculaType', $pelicula);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pelicula);
            $em->flush();

            return $this->redirectToRoute('pelicula_show', array('id' => $pelicula->getId()));
        }

        return $this->render('pelicula/new.html.twig', array(
            'pelicula' => $pelicula,
            'form' => $form->createView()
        ));
    }

    /**
     * Finds and displays a pelicula entity.
     *
     * @Route("/{id}", name="pelicula_show")
     * @Method("GET")
     */
    public function showAction(pelicula $pelicula)
    {
        $deleteForm = $this->createDeleteForm($pelicula);

        return $this->render('pelicula/show.html.twig', array(
            'pelicula' => $pelicula,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pelicula entity.
     *
     * @Route("/{id}/edit", name="pelicula_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, pelicula $pelicula)
    {
        $deleteForm = $this->createDeleteForm($pelicula);
        $editForm = $this->createForm('AppBundle\Form\peliculaType', $pelicula);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pelicula_edit', array('id' => $pelicula->getId()));
        }

        return $this->render('pelicula/edit.html.twig', array(
            'pelicula' => $pelicula,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pelicula entity.
     *
     * @Route("pelicula/{id}", name="pelicula_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, pelicula $pelicula)
    {
        $form = $this->createDeleteForm($pelicula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pelicula);
            $em->flush();
        }

        return $this->redirectToRoute('pelicula_index');
    }

    /**
     * Creates a form to delete a pelicula entity.
     *
     * @param pelicula $pelicula The pelicula entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(pelicula $pelicula)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pelicula_delete', array('id' => $pelicula->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
