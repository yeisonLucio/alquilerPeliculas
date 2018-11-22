<?php
namespace AppBundle\Controller;

use AppBundle\Form\usuarioType;
use AppBundle\Entity\usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\FormInterface;


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
        $form = $this->createForm('AppBundle\Form\registrarUsuarioType', $usuario);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if($request->isXmlHttpRequest()){
            $status = "";
            
          if ($form->isSubmitted() && $form->isValid()) {
              // 3) Encode the password (you could also do this via Doctrine listener)
              $password = $passwordEncoder->encodePassword($usuario, $usuario->getPlainPassword());
              $usuario->setPassword($password);

              // 4) Guardando el usuario
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($usuario);
              $entityManager->flush();
              $status = 200;

              // ... do any other work - like sending them an email, etc
              // maybe set a "flash" success message for the user
               return new JsonResponse(array('status' => $status, 'usuarioRegistrado'=> $usuario->getId()));
              //return $this->redirectToRoute('replace_with_some_route');
          }else if ($form->isSubmitted() && !$form->isValid()){
            $errors = [];
            $status = 400;
            
            $validator = $this->get('validator');
            $errorsValidator = $validator->validate($usuario);

            foreach ($errorsValidator as $error) {
                $valor = $error->getPropertyPath();
                $errors += ["$valor" => $error->getMessage()];
                
            }

            return new JsonResponse($errors);    
         
          }
        }
        return $this->render(
            'usuario/registro.html.twig',
            array('form' => $form->createView())
        );
    }

    public function validarForm(FormInterface $form){
        
    }
}
