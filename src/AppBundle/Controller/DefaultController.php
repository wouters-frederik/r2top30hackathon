<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, EntityManagerInterface $em)
    {
        // replace this example code with whatever you need
        // Ingeven geboortedatum, en naam
        //Handle POST
        // If voor 1970 -> pak direct 18e verjaardag
        // if na 1970 > Toon geboorteplaat


//        return $this->render('default/index.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//        ]);


        // create a task and give it some dummy data for this example
        $person = new Person();
        $person->setName('Naam');
        $person->setEmail('emailadres');
        $person->setBirthDate(new \DateTime('now - 33 years'));

        $form = $this->createFormBuilder($person)
          ->add('name', TextType::class)
          ->add('birthDate', DateType::class,array(
            'format' => 'dd/MM/yyyy',
            'widget' => 'single_text',
          ))
          ->add('email', EmailType::class)
          ->add('save', SubmitType::class, array('label' => 'inzenden'))
          ->getForm();

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $person = $form->getData();
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em->persist($person);
            $em->flush();
            //$this->redirectToRoute('geboorteplaat/');
            return $this->redirect('geboorteplaat/' . $person->getId().'?creator=true');
        }
        //die('It was not valid');

        return $this->render('default/index.html.twig', array(
          'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        return new Response(
          '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}

