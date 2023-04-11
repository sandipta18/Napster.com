<?php
namespace App\Controller;
use App\Entity\Test;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
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
   * RegistrationController
   *
   * @Route("registration",name="registration")
   *
   * @param Request $rq
   * @param EntityManagerInterface $entityManager
   *
   * @return Response
   *
   */
  public function registration(Request $rq, EntityManagerInterface $entityManager): Response
  {
    $email = $rq->get("email");
    if($email) {
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
      $test->setImage("https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png");
      $entityManager->persist($test);
      $entityManager->flush();
      return $this->render("home/index.html.twig", [
        'success_message' => "Signed up succesfully",
      ]);
    } else {
      return $this->render("home/signup.html.twig", [
        'error_message' => "Account already exists"
      ]);
    }
  } else {
      return $this->render('home/signup.html.twig',[
      ]);
  }
  }
  /**
   *
   * This is used to faciliate login procedure for an user
   *
   * ValidateLogin Controller
   * @param Request $rq
   * @param EntityManagerInterface $entityManager
   *
   * @Route("home",name="validatelogin")
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
        $encodedValue = base64_encode($userData->getEmail());
        setcookie("userinfo", $encodedValue, time() + (86400 * 30), "/");
        return $this->render('home/welcome.html.twig',[
          'userValue' => $userData
        ]);
      } else {
        return $this->render("home/index.html.twig", [
          'error_message' => "Invalid Credentials"
        ]);
      }
    }
  }

  /**
   * This function is used to fetch the profile page
   *
   * @param Request $rq
   * @param EntityManagerInterface $entityManager
   *
   * @Route("profile",name="profile")
   *
   * @return Response
   *
   */
  public function profile(Request $rq,EntityManagerInterface $entityManager):Response
  {
    $userData = $_COOKIE['userinfo'];
    $userData = base64_decode($userData);
    $userInfo = $entityManager->getRepository(Test::class)->findOneBy([
    'Email'=>$userData
    ]);
    return $this->render('home/profile.html.twig',[
    'userValue' => $userInfo,
    ]);

  }
  /**
   * @Route("home",name="homepage")
   */
  public function redirecti()
  {
    return $this->redirectToRoute('homepage');
  }
  /**
   * [Description for signout]
   *
   * @param Request $rq
   * @param EntityManagerInterface $entityManager
   *
   * @Route("/signout",name="signout")
   *
   */
  public function signout(Request $rq,EntityManagerInterface $entityManager)
  {
     return $this->render('home/index.html.twig',[
     ]);
  }

}
