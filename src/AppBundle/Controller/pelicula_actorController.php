<?php

namespace AppBundle\Controller;

use AppBundle\Entity\pelicula_actor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pelicula_actor controller.
 *
 * @Route("pelicula_actor")
 */
class pelicula_actorController extends Controller
{
    /**
     * Lists all pelicula_actor entities.
     *
     * @Route("/", name="pelicula_actor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pelicula_actors = $em->getRepository('AppBundle:pelicula_actor')->findAll();

        return $this->render('pelicula_actor/index.html.twig', array(
            'pelicula_actors' => $pelicula_actors,
        ));
    }

    /**
     * Creates a new pelicula_actor entity.
     *
     * @Route("/new", name="pelicula_actor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pelicula_actor = new Pelicula_actor();
        $form = $this->createForm('AppBundle\Form\pelicula_actorType', $pelicula_actor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pelicula_actor);
            $em->flush();

            return $this->redirectToRoute('pelicula_actor_show', array('id' => $pelicula_actor->getId()));
        }

        return $this->render('pelicula_actor/new.html.twig', array(
            'pelicula_actor' => $pelicula_actor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pelicula_actor entity.
     *
     * @Route("/{id}", name="pelicula_actor_show")
     * @Method("GET")
     */
    public function showAction(pelicula_actor $pelicula_actor)
    {
        $deleteForm = $this->createDeleteForm($pelicula_actor);

        return $this->render('pelicula_actor/show.html.twig', array(
            'pelicula_actor' => $pelicula_actor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pelicula_actor entity.
     *
     * @Route("/{id}/edit", name="pelicula_actor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, pelicula_actor $pelicula_actor)
    {
        $deleteForm = $this->createDeleteForm($pelicula_actor);
        $editForm = $this->createForm('AppBundle\Form\pelicula_actorType', $pelicula_actor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pelicula_actor_edit', array('id' => $pelicula_actor->getId()));
        }

        return $this->render('pelicula_actor/edit.html.twig', array(
            'pelicula_actor' => $pelicula_actor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pelicula_actor entity.
     *
     * @Route("/{id}", name="pelicula_actor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, pelicula_actor $pelicula_actor)
    {
        $form = $this->createDeleteForm($pelicula_actor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pelicula_actor);
            $em->flush();
        }

        return $this->redirectToRoute('pelicula_actor_index');
    }

    /**
     * Creates a form to delete a pelicula_actor entity.
     *
     * @param pelicula_actor $pelicula_actor The pelicula_actor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(pelicula_actor $pelicula_actor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pelicula_actor_delete', array('id' => $pelicula_actor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
