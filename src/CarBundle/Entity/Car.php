<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\CarRepository")
 */
class Car {
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
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="make", type="string", length=255)
	 */
	private $make;

	/**
	 * @var string
	 * @ORM\Column(name="description", type="text", nullable=true)
	 */
	private $description;

	/**
	 * @var float
	 * @ORM\Column(name="price", type="decimal", scale=2)
	 */
	private $price;

	/**
	 * @var int
	 * @ORM\Column(name="year", type="smallint")
	 */
	private $year;

	/**
	 * @var bool
	 * @ORM\Column(name="navigation", type="boolean")
	 */
	private $navigation;

	/**
	 * @return mixed
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @param mixed $price
	 */
	public function setPrice( $price ) {
		$this->price = $price;
	}

	/**
	 * @return int
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * @param int $year
	 */
	public function setYear( $year ) {
		$this->year = $year;
	}

	/**
	 * @return boolean
	 */
	public function isNavigation() {
		return $this->navigation;
	}

	/**
	 * @param boolean $navigation
	 */
	public function setNavigation( $navigation ) {
		$this->navigation = $navigation;
	}
	
	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription( $description ) {
		$this->description = $description;
	}


	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 *
	 * @return Car
	 */
	public function setName( $name ) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set make
	 *
	 * @param string $make
	 *
	 * @return Car
	 */
	public function setMake( $make ) {
		$this->make = $make;

		return $this;
	}

	/**
	 * Get make
	 *
	 * @return string
	 */
	public function getMake() {
		return $this->make;
	}
}

