<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 06/07/18
 * Time: 12:59
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Job;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Reposity\CategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;    #para cuando modifique la funcion 'show'

class JobController extends AbstractController
{
	/**
     * Lists all job entities.
     *
     * @Route("/", name="job.list", methods="GET")
     *
     * @return Response
     */
    public function list(EntityManagerInterface $em) : Response
    {
        
        $query = $em->createQuery(
            'SELECT j FROM App:Job j WHERE j.expiresAt > :date'
        )->setParameter('date', new \DateTime());
        
        $jobs = $this->getDoctrine()->getRepository(Job::class)->findAll();
        

       /* $jobs = $em->getRepository(Job::class)->findActiveJobs();*/

       /**$categories = $em->getRepository(Category::class)->findWithActiveJobs();
        */
        return $this->render('job/list.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * Finds and displays a job entity.
     *
     * @Route("job/{id}", 
     			name="job.show",
                methods="GET",
     			requirements={"id" = "\d+"})
     *
     * @Entity("job", expr="repository.findActiveJob(id)")
     *
     * @param Job $job
     *
     * @return Response
     */
    public function show(Job $job) : Response
    {
        return $this->render('job/show.html.twig', [
            'job' => $job,
        ]);
    }

}
