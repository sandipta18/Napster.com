<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Entity\Test;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Query;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Validate;

class MainController extends AbstractController
{


  /**
   * LoginController
   *
   * @Route("",name="login")
   *
   */
  public function loginController(Request $rq): Response
  {
    if ($rq->get('error_message') != NULL) {
      $error = base64_decode($rq->get('error_message'));

      return $this->render("home/index.html.twig", [
        'error_message' => $error
      ]);
    }
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
  public function resetController(): Response
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
  public function registrationController(Request $rq, EntityManagerInterface $entityManager): Response
  {
    $objectValidate = new Validate;
    $email = $rq->get("email");
    if ($email) {
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
        if (
          $objectValidate->validateEmail($email) and $objectValidate->validatePassword($password)
        ) {
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
          $errorDetails = $objectValidate->errorMessage;
          return $this->render("home/signup.html.twig", [
            'error_message' => "$errorDetails"
          ]);
        }
      } else {
        return $this->render("home/signup.html.twig", [
          'error_message' => "Account already exists"
        ]);
      }
    } else {
      return $this->render('home/signup.html.twig', []);
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

  public function loginValidate(Request $rq, EntityManagerInterface $entityManager): Response
  {

    if ($rq->get('submit_login')) {
      $userData = $entityManager->getRepository(Test::class)->findOneBy([
        'Email' => $rq->get('username'),
        'Password' => $rq->get('password')
      ]);

      if ($userData != NULL) {
        $encodedValue = base64_encode($userData->getEmail());
        setcookie("userinfo", $encodedValue, time() + (86400 * 30), "/");
        return $this->redirectToRoute("redirect", [
          'userValue' => $userData
        ]);
      }
      return $this->redirectToRoute("login", [
        'error_message' => base64_encode("Invalid Credentials")
      ]);
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
  public function profileController(Request $rq, EntityManagerInterface $entityManager): Response
  {
    $userData = $_COOKIE['userinfo'];
    $userData = base64_decode($userData);
    $userInfo = $entityManager->getRepository(Test::class)->findOneBy([
      'Email' => $userData
    ]);
    return $this->render('home/profile.html.twig', [
      'userValue' => $userInfo,
    ]);
  }

  /**
   * Signs out User
   *
   * @param Request $rq
   * @param EntityManagerInterface $entityManager
   *
   * @Route("/signout",name="signout")
   *
   */
  public function signoutController(Request $rq, EntityManagerInterface $entityManager)
  {
    return $this->redirectToRoute("login");
  }

  /**
   * Used to redirect the user
   *
   * @Route("homepage",name="redirect")
   *
   */
  public function redirectiUser(Request $rq, EntityManagerInterface $entityManager)
  {
    $cookieData = base64_decode($_COOKIE['userinfo']);
    $userData = $entityManager->getRepository(Test::class)->findOneBy([
      'Email' => $cookieData
    ]);
    $post = new Posts;
    $allPosts = $entityManager->getRepository(Posts::class)->findAll();
    return $this->render("home/welcome.html.twig", [
      'userValue' => $userData,
      'postData' => $allPosts,
    ]);
  }

  /**
   * This function is used to allow the user to make a post
   *
   * @param Request $rq
   * @param EntityManagerInterface $entityManager
   *
   * @Route("makepost",name="post")
   *
   */
  public function makePost(Request $rq, EntityManagerInterface $entityManager)
  {
    $post = new Posts;
    $user = new Test;
    $user = $entityManager->getRepository(Test::class)->findOneBy([
      'Email' => base64_decode($_COOKIE['userinfo'])
    ]);
    $text = $rq->get("post-text");
    if ($rq->files->get('post-img') != NULL) {
      $image = $rq->files->get("post-img");
      $imageExtension = $image->guessExtension();
      $imageFileName = time() . $imageExtension;
      $image->move(
        $this->getParameter('kernel.project_dir') . '/public/images/',
        $imageFileName
      );
      $post->setDisplay('/images/' . $imageFileName);
    }
    $post->setEmail($user);
    $post->setUsername($user->getUsername());
    $post->setPostTime(time());
    $post->setContent($text);
    $entityManager->persist($post);
    $entityManager->persist($user);
    $entityManager->flush();
    return $this->redirectToRoute("redirect");
  }

  /**
   * [Description for selfProfilePage]
   *
   * @param Request $rq
   * @param EntityManagerInterface $entityManager
   *
   * @Route("self","self")
   *
   */
  public function selfProfilePage(Request $rq, EntityManagerInterface $entityManager) {
    // $url = $_SERVER['REQUEST_URI'];
    // $item = explode("/",$url);
    // $email = explode("?",$item[1]);
    // dd($email[1]);
    dd($rq->query->get("user"));
  }
}
