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
use Symfony\Component\HttpFoundation\Response;

class JobController extends AbstractController
{
	/**
     * Lists all job entities.
     *
     * @Route("/", name="job.list")
     *
     * @return Response
     */
    public function list() : Response
    {
        $jobs = $this->getDoctrine()->getRepository(Job::class)->findAll();

        return $this->render('job/list.html.twig', [
            'jobs' => $jobs,
        ]);
    }

    /**
     * Finds and displays a job entity.
     *
     * @Route("job/{id}", 
     			name="job.show",
     			requirements={"id" = "\d+"})
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
