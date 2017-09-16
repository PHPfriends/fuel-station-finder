<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="refuel")
 */
class Refuel
{
    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Car")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id", nullable=false)
     */
    private $car;

    /**
     * @ORM\ManyToOne(targetEntity="Price")
     * @ORM\JoinColumn(name="price_id", referencedColumnName="id", nullable=false)
     */
    private $price;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    private $qty;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    private $amount;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    private $round;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param mixed $car
     */
    public function setCar($car)
    {
        $this->car = $car;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param mixed $qty
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * @param mixed $round
     */
    public function setRound($round)
    {
        $this->round = $round;
    }


}