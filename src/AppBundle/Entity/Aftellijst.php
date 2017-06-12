<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aftellijst
 *
 * @ORM\Table(name="aftellijst")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AftellijstRepository")
 */
class Aftellijst
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
     * @var array
     *
     * @ORM\Column(name="songs", type="array", nullable=true, unique=true)
     */
    private $songs;

    /**
     * @var int
     *
     * @ORM\Column(name="hitlijstId", type="integer", unique=true)
     */
    private $hitlijstId;


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
     * Set songs
     *
     * @param array $songs
     *
     * @return Aftellijst
     */
    public function setSongs($songs)
    {
        $this->songs = $songs;

        return $this;
    }

    /**
     * Get songs
     *
     * @return array
     */
    public function getSongs()
    {
        return $this->songs;
    }

    /**
     * Set hitlijstId
     *
     * @param integer $hitlijstId
     *
     * @return Aftellijst
     */
    public function setHitlijstId($hitlijstId)
    {
        $this->hitlijstId = $hitlijstId;

        return $this;
    }

    /**
     * Get hitlijstId
     *
     * @return int
     */
    public function getHitlijstId()
    {
        return $this->hitlijstId;
    }

    public function last_friday($date) {
        if (!is_numeric($date))
            $date = strtotime($date);
        if (date('w', $date) == 5)
            return $date;
        else
            return strtotime(
              'last friday',
              $date
            );
    }
    public function load($momentopname){
        //From vrijdag er voor
        // TO: vrijdag er na
        $from = $this->last_friday($momentopname);
        $krantdate = date('Y/m/d', $momentopname);
        $to = strtotime('+ 6 days', $from);
        $hitlijst = $this->getHitlijstData('lists?parent_lid=3288&air_date_from=' . $from . '&air_date_to=' . $to);
        $pos = 0;
        $aftellijst = $this->getHitlijstData('lists/' . $hitlijst->$pos->lid);
        return $aftellijst;
    }
    private function getHitlijstData($apicall){
        var_dump($apicall);
        //https://hitlijst.vrt.be/api/lists?parent_lid=840
        $url = 'https://hitlijst.conceptbox.be/api/' . $apicall;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //curl_setopt($ch, CURLOPT_POST, 1);
        //curl_setopt($ch, CURLOPT_PORT, $port);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($ch, CURLOPT_POSTFIELDS,     json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if( ! $result = curl_exec($ch))
        {
            echo 'error' . PHP_EOL;
            print_r(curl_error($ch));
            die();
        }
        curl_close($ch);
        return json_decode($result);
    }
}


