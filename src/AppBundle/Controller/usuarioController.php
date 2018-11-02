<?php
namespace AppBundle\Controller;

use AppBundle\Form\usuarioType;
use AppBundle\Entity\usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class usuarioController extends Controller
{
    /**
     * @Route("/registro", name="registro_usuario")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // contruyendo el formulario
        $usuario = new usuario();
        $form = $this->createForm('AppBundle\Form\usuarioType', $usuario);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($usuario, $usuario->getPlainPassword());
            $usuario->setPassword($password);

            // 4) Guardando el usuario
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuario);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('replace_with_some_route');
        }

        return $this->render(
            'usuario/registro.html.twig',
            array('form' => $form->createView())
        );
    }
}
