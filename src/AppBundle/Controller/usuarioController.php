<?php
namespace AppBundle\Controller;

use AppBundle\Form\usuarioType;
use AppBundle\Entity\usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * pelicula controller.
 *
 * @Route("usuario")
 */
class usuarioController extends Controller
{
   /**
     *
     * @Route("/usuarios", name="usuarios")
     * 
     */
    public function usuariosAction()
    {

        return $this->render('usuario/index.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('usuario/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }


    /**
     * @Route("/logout", name="logout")
     */

    public function logoutAction()
    {

    }
    

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
            var_dump($request); exit();
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($usuario, $usuario->getPlainPassword());
            $usuario->setPassword($password);

            // 4) Guardando el usuario
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuario);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            //return $this->redirectToRoute('replace_with_some_route');
        }

        return $this->render(
            'usuario/registro.html.twig',
            array('form' => $form->createView())
        );
    }
}
