<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GameStat
 *
 * @ORM\Table(name="game_stat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameStatRepository")
 */
class GameStat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="game_name", type="string", length=255)
     */
    private $gameName;

    /**
     * @var int
     *
     * @ORM\Column(name="times_played", type="integer")
     */
    private $timesPlayed;

    /**
     * @var int
     *
     * @ORM\Column(name="top_score", type="integer")
     */
    private $topScore;

    /**
     * @var string
     *
     * @ORM\Column(name="top_player", type="string", length=255)
     */
    private $topPlayer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_updated", type="datetime")
     */
    private $lastUpdated;

    /**
     * @var string
     *
     * @ORM\Column(name="id_external_api", type="string", length=255)
     */
    private $idExternalApi;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gameName
     *
     * @param string $gameName
     *
     * @return GameStat
     */
    public function setGameName($gameName)
    {
        $this->gameName = $gameName;

        return $this;
    }

    /**
     * Get gameName
     *
     * @return string
     */
    public function getGameName()
    {
        return $this->gameName;
    }

    /**
     * Set timesPlayed
     *
     * @param integer $timesPlayed
     *
     * @return GameStat
     */
    public function setTimesPlayed($timesPlayed)
    {
        $this->timesPlayed = $timesPlayed;

        return $this;
    }

    /**
     * Get timesPlayed
     *
     * @return int
     */
    public function getTimesPlayed()
    {
        return $this->timesPlayed;
    }

    /**
     * Set topScore
     *
     * @param integer $topScore
     *
     * @return GameStat
     */
    public function setTopScore($topScore)
    {
        $this->topScore = $topScore;

        return $this;
    }

    /**
     * Get topScore
     *
     * @return int
     */
    public function getTopScore()
    {
        return $this->topScore;
    }

    /**
     * Set topPlayer
     *
     * @param string $topPlayer
     *
     * @return GameStat
     */
    public function setTopPlayer($topPlayer)
    {
        $this->topPlayer = $topPlayer;

        return $this;
    }

    /**
     * Get topPlayer
     *
     * @return string
     */
    public function getTopPlayer()
    {
        return $this->topPlayer;
    }

    /**
     * Set lastUpdated
     *
     * @param \DateTime $lastUpdated
     *
     * @return GameStat
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = new \DateTime();

        return $this;
    }

    /**
     * Get lastUpdated
     *
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Set idExternalApi
     *
     * @param string $idExternalApi
     *
     * @return GameStat
     */
    public function setIdExternalApi($idExternalApi)
    {
        $this->idExternalApi = $idExternalApi;

        return $this;
    }

    /**
     * Get idExternalApi
     *
     * @return string
     */
    public function getIdExternalApi()
    {
        return $this->idExternalApi;
    }
}

