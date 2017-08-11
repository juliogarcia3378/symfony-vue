<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\GameStat;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request )
    {
      $json = "https://1b282yiqu3.execute-api.us-west-2.amazonaws.com/prod/game/all/stats";
      $jsonfile = file_get_contents($json);

      $context = stream_context_create(array(
      'http' => array(
        'method' => 'GET',
        'header' => "X-API-TOKEN:423kljf93falkj9")
      ));

      //doctrine entiry manager
      $em = $this->getDoctrine()->getEntityManager();
      $data = file_get_contents($json, false, $context);
      $JSONData = (array)json_decode($data);


      foreach ($JSONData["records"] as $key => $value) {
        $gameStatJSON = (array)$value;
        $exist = $em->getRepository("AppBundle:GameStat")->findBy(["idExternalApi" => $gameStatJSON['id']]);
        if ($exist == null){
          $gameStat = new GameStat();
          $gameStat->setIdExternalApi($gameStatJSON['id']);
          $gameStat->setTopPlayer($gameStatJSON['top_player']);
          $gameStat->setTopScore($gameStatJSON['top_score']);
          $gameStat->setTimesPlayed($gameStatJSON['times_played']);
          $gameStat->setGameName($gameStatJSON['game_name']);
          $gameStat->setLastUpdated($gameStatJSON['last_updated']);
        } else {
          $gameStat = $exist[0];
          $gameStat->setTopPlayer($gameStatJSON['top_player']);
          $gameStat->setTopScore($gameStatJSON['top_score']);
          $gameStat->setTimesPlayed($gameStatJSON['times_played']);
          $gameStat->setGameName($gameStatJSON['game_name']);
          $gameStat->setLastUpdated($gameStatJSON['last_updated']);

        }
        $em->persist($gameStat);
       
        # code...
      }
      $em->flush();



      //Validation for grant that jsonfile is valid 
      return $this->render('default/index.html.twig', [
            'gamestats' => json_encode(array('data' =>$JSONData['records'])),
        ]);
    }

        /**
     * @Route("/game/{game}", name="game_details")
     */
    public function viewAction(Request $request, $game )
    {
      $json = "https://1b282yiqu3.execute-api.us-west-2.amazonaws.com/prod/83nj74jnf9/game/$game/stats";
      $jsonfile = file_get_contents($json);
      $context = stream_context_create(array(
      'http' => array(
        'method' => 'GET',
        'header' => "X-API-TOKEN:423kljf93falkj9")
      ));
      $data = file_get_contents($json, false, $context);
      $JSONData = (array)json_decode($data);

      //doctrine entity manager
      $em = $this->getDoctrine()->getEntityManager();
   
      //Validation for grant that jsonfile is valid 
      return $this->render('default/view.html.twig', [
            'gamestats' => json_encode(array('data' =>$JSONData['records'])),
        ]);
    }

    /**
     * @Route("/loadDetails", name="loadDetails")
     */
    public function loadDetailsAction(Request $request)
    {
      $game = $request->query->get('game') ? $request->query->get('game') : "20";
      //Some validation for grant that the game is valid like is numeric, etc. 

      $json = "https://1b282yiqu3.execute-api.us-west-2.amazonaws.com/prod/83nj74jnf9/game/$game/stats";
      $context = stream_context_create(array(
      'http' => array(
        'method' => 'GET'
      ),
      ));
      $data = file_get_contents($json, false, $context);
      $JSONData = (array)json_decode($data);


      $jsonfile = file_get_contents($json);
      $response = new JsonResponse();
      $arrayJson = [
        'game' => ((array)json_decode($jsonfile))['records']['0'],
      ];
      $response->setContent(json_encode($arrayJson));
      return $response;
    }

}
