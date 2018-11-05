<?php

namespace AppBundle\Controller;

use AppBundle\Entity\actor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Actor controller.
 *
 * @Route("actor")
 */
class actorController extends Controller
{
    /**
     * Lists all actor entities.
     *
     * @Route("/", name="actor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actors = $em->getRepository('AppBundle:actor')->findAll();

        return $this->render('actor/index.html.twig', array(
            'actors' => $actors,
        ));
    }

    /**
     * Creates a new actor entity.
     *
     * @Route("/new", name="actor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $actor = new Actor();
        $form = $this->createForm('AppBundle\Form\actorType', $actor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actor);
            $em->flush();

            return $this->redirectToRoute('actor_show', array('id' => $actor->getId()));
        }

        return $this->render('actor/new.html.twig', array(
            'actor' => $actor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a actor entity.
     *
     * @Route("/{id}", name="actor_show")
     * @Method("GET")
     */
    public function showAction(actor $actor)
    {
        $deleteForm = $this->createDeleteForm($actor);

        return $this->render('actor/show.html.twig', array(
            'actor' => $actor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing actor entity.
     *
     * @Route("/{id}/edit", name="actor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, actor $actor)
    {
        $deleteForm = $this->createDeleteForm($actor);
        $editForm = $this->createForm('AppBundle\Form\actorType', $actor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('actor_edit', array('id' => $actor->getId()));
        }

        return $this->render('actor/edit.html.twig', array(
            'actor' => $actor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a actor entity.
     *
     * @Route("actor/{id}", name="actor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, actor $actor)
    {
        $form = $this->createDeleteForm($actor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actor);
            $em->flush();
            $this->addFlash(
                'success',
                'Actor eliminado!'
            );
        }

        return $this->redirectToRoute('actor_index');
    }

    /**
     * Creates a form to delete a actor entity.
     *
     * @param actor $actor The actor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(actor $actor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actor_delete', array('id' => $actor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
