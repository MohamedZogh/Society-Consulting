<?php
    
namespace App\Controller;

use App\Repository\PropertyRepository;
use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    // Solution 1 pour autowiring :
    /**
     * @var PropertyRepository
     */
    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * @Route("/biens", name="property.index", utf8=true)
     * @return response
     */

    public function index(): Response
    {
        // Solution 2 pour autowiring :
        // $repository = $this->getDoctrine()->getRepository(Property::class);
        // dump($repository);

        // insert bdd :
        // $property = new Property();
        // $property->setTitle('Mon premier bien')
        //     ->setPrice(200000)
        //     ->setRooms(4)
        //     ->setBedrooms(3)
        //     ->setDescription('une petite description')
        //     ->setSurface(60)
        //     ->setFloor(4)
        //     ->setHeat(1)
        //     ->setCity('Montpellier')
        //     ->setAddress('15 Boulevard Gambetta')
        //     ->setPostalCode('34000');
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($property);
        // $em->flush();

        return $this->render('property/index.html.twig',
                ['current_menu' => 'properties'] 
        
        );

    } 

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", utf8=true, requirements={"slug": "[a-z0-9\-]*"})
     * @return response
     */

    public function show(Property $property, string $slug): Response
    {
        if($property->getSlug() !== $slug) {
            return $this->redirectToRoute('property.show', [
                'id'=> $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }

        return $this->render('property/show.html.twig', [
            'current_menu' => 'properties',
            'property' => $property
        ] 
        
        );
    }
} 
?>
