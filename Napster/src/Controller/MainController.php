<?php

namespace App\Controller;

use App\Entity\Test;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

  /**
   * LoginController
   *
   * @Route("",name="login")
   *
   */
  public function LoginController(): Response
  {

    return $this->render('home/index.html.twig', [
      'controller_name' => 'UserController',
      "success_message" => '',
      "error_message" => ''
    ]);
  }

  /**
   * SignUpController
   *
   * @Route("signup",name="signup")
   *
   */
  public function SignupController(): Response
  {
    return $this->render('home/signup.html.twig', [
      'controller_name' => 'UserController',
      'error_message' => '',
    ]);
  }

  /**
   * ResetController
   *
   * @Route("reset",name="reset");
   *
   */
  public function ResetController(): Response
  {

    return $this->render('home/reset.html.twig', [
      'controller_name' => 'UserController',
    ]);
  }

  /**
   * ValidateController
   *
   * @Route("registration",name="registration")
   *
   */
  public function registration(Request $rq, EntityManagerInterface $entityManager): Response
  {
    $email = $rq->get("email");
    $userData = $entityManager->getRepository(Test::class)->findOneBy(["Email" => $_POST['email']]);
    if ($userData == NULL) {
      $userName = $rq->get("username");
      $email = $rq->get("email");
      $password = $rq->get("password");
      $gender = $rq->get("gender");
      $bio = $rq->get("bio");
      if ($rq->get("cookie")) {
        $cookie = 1;
      } else {
        $cookie = 0;
      }
      $test = new Test();
      $test->setUsername($userName);
      $test->setEmail($email);
      $test->setBio($bio);
      $test->setPassword($password);
      $test->setGender($gender);
      $test->setCookie($cookie);
      $entityManager->persist($test);
      $entityManager->flush();
      return $this->render("home/index.html.twig", [
        'success_message' => "Signed up succesfully"
      ]);
    } else {
      return $this->render("home/signup.html.twig", [
        'error_message' => "Account already exists"
      ]);
    }
  }

  /**
   *
   * This is used to faciliate login procedure for an user
   * ValidateLogin Controller
   * @param Request $rq
   * @param EntityManagerInterface $entityManager
   *
   * @Route("/welcome",name="validatelogin")
   *
   */
  public function login(Request $rq, EntityManagerInterface $entityManager): Response
  {
    if ($rq->get('submit_login')) {
      $userData = $entityManager->getRepository(Test::class)->findOneBy([
        'Email' => $rq->get('username'),
        'Password' => $rq->get('password')
      ]);
      if ($userData != NULL) {
        return $this->render('home/welcome.html.twig');
      } else {
        return $this->render("home/index.html.twig", [
          'success_message' => '',
          'error_message' => "Invalid Credentials"
        ]);
      }
    }
  }
}
