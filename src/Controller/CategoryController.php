<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Category;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Job;
use Knp\Component\Pager\PaginatorInterface;

class CategoryController extends AbstractController
{
    /**
     * Finds and displays a category entity.
     *
     * @Route(
     *		"/category/{slug}/{page}", 
     *		name="category.show", 
     *		methods="GET",
     *		defaults={"page": 1},
     *      requirements={"page" = "\d+"})
     *
     * @param Category $category
     * @param PaginatorInterface $paginator
     * @param int $page
     *
     * @return Response
     */
    public function show(
    	Category $category,
    	int $page,
    	PaginatorInterface $paginator
    ) : Response {
    	$activeJobs = $paginator->paginate(
            $this->getDoctrine()->getRepository(Job::class)->getPaginatedActiveJobsByCategoryQuery($category),
            $page, // page
            $this->getParameter('max_jobs_on_category') // elements per page
        );

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'activeJobs' => $activeJobs,
        ]);
    }
}

