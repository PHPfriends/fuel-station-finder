<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="station")
 */
class Station
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    /**
     * @ORM\Column(type="intiger")
     */
    private $unique_id;

    /**
     * @ORM\Column(type="string", length=100 , nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=100 , nullable=false)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=100 , nullable=false)
     */
    private $province;

    /**
     * @ORM\Column(type="decimal", nullable=false)
     */
    private $latitude;

    /**
     * @ORM\Column(type="decimal", nullable=false)
     */
    private $longtitude;

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
    public function getUniqueId()
    {
        return $this->unique_id;
    }

    /**
     * @param mixed $unique_id
     * Will set this value with a event subscriber or listener
     */
    public function setUniqueId($unique_id)
    {
        $this->unique_id = $unique_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param mixed $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongtitude()
    {
        return $this->longtitude;
    }

    /**
     * @param mixed $longtitude
     */
    public function setLongtitude($longtitude)
    {
        $this->longtitude = $longtitude;
    }


}