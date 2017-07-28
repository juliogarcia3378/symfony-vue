<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request )
    {
      return $this->redirectToRoute('filtered', array(
          'category' => 'hot'));
    }

    /**
     * @Route("/category/{category}/{count}", name="filtered")
     */
    public function filteredAction(Request $request, $category,$count = 0 )
    {
      //Some validation for grant that the category is valid. 
      if ($count < 0){
        $count = 0;
      }
      $json = "https://www.reddit.com/".$category.".json?count=".$count;
      $jsonfile = file_get_contents($json);

      //Validation for grant that jsonfile is valid 
      return $this->render('default/index.html.twig', [
            'category' => json_encode(array('category' =>$category)),
            'feeds' => $jsonfile,
        ]);
    }

    /**
     * @Route("/feeds", name="loadFeeds")
     */
    public function loadFeedsAction(Request $request)
    {
      $category = $request->query->get('category') ? $request->query->get('category') : "hot";
      $count = $request->query->get('count') ? $request->query->get('count') : 25;
      $after = $request->query->get('after') ? $request->query->get('after') : null;
      $before = $request->query->get('before') ? $request->query->get('before') : null;

      //Some validation for grant that the category is valid. 
      if ($count < 0){
        $count = 25;
      }

      $json = "https://www.reddit.com/".$category.".json?count=".$count;
      if($after != null){
        $json .= "&after=".$after;
      } 
      else if ($before != null){
        $json .="&before=".$before;
      }

      $jsonfile = file_get_contents($json);
      $response = new JsonResponse();
      $arrayJson = [
        'category' => array('category' =>$category),
        'feeds' => json_decode($jsonfile),
      ];
      $response->setContent(json_encode($arrayJson));
      return $response;
    }

    /**
     * @Route("/search", name="search")
     */
    public function searchAction(Request $request)
    {
      $query = $request->query->get('q') ? $request->query->get('q') : "";
      $restrict_sr = $request->query->get('restrict_sr') ? $request->query->get('restrict_sr') : "";
      $sort = $request->query->get('sort') ? $request->query->get('sort') : "relevance";
      $t = $request->query->get('t') ? $request->query->get('t') : "all";

      $json = "https://www.reddit.com/search.json?q=".$query."&restrict_sr=".$restrict_sr."&sort=".$sort."&t=".$t;
      $jsonfile = file_get_contents($json);
      $response = new JsonResponse();
      $arrayJson = [
        'category' => array('category' =>"hot"),
        'feeds' => json_decode($jsonfile),
      ];
      $response->setContent(json_encode($arrayJson));
        return $response;
    }
}
