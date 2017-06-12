<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use AppBundle\Entity\Aftellijst;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;

class GeboortePlaatController extends Controller
{


  /**
   * @Route("/geboorteplaat/{id}/{years}", requirements={"id" = "\d+","years" = "\d+"}, defaults={"id" = 0,"years" = 0})
   */
  public function indexAction(Request $request, EntityManagerInterface $em, $id, $years)
  {
    $person = $em->find('AppBundle\Entity\Person', $id);

    $start = strtotime('january 1970');
    $birthday = $person->getBirthDate();

    if ($birthday->format(\DateTime::ATOM) < $start) {
      return $this->redirect('geboorteplaat/' . $person->getId().'/18?creator=true');
    }

    //If not Owner
    if(isset($_GET['creator'])) {
      $pageTitle = 'Jouw geboorteplaat';
    }else{
      $pageTitle = 'De geboorteplaat van ' . $person->getName();
    }


    $actualDate = $birthday;
    $aftellijst = new Aftellijst();
    $aftellijst->load($birthday->format('U'));
    var_dump($aftellijst);

    $renderedList = $this->render('default/aftellijst.html.twig', array(
      'list' => $aftellijst,
    ));

    return $this->render('default/geboorteplaat.html.twig', array(
      'person' => $person,
      'pageTitle' => $pageTitle,
      'songtitle' => 'songtitle',
      'artist' => 'artist',
      'youtube' => 'youtube',
      'dateUrlFormat' => $actualDate->format('Y/m/d'),
      'monthyear' =>$actualDate->format('M Y'),
      'actualDate' => $actualDate,
    ));

    //fetch hitlijst van


    die('geboorteplaat ' . $id . ' y=' . $years);

  }

}

