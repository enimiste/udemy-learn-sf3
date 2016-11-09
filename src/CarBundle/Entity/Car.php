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
	 * @var Model
	 *
	 * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Model", inversedBy="cars")
	 */
	private $model;

	/**
	 * @var Make
	 *
	 * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Make", inversedBy="cars")
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
	 * @var bool
	 * @ORM\Column(name="promoted", type="boolean")
	 */
	private $promoted;

	/**
	 * @return boolean
	 */
	public function isPromoted() {
		return $this->promoted;
	}

	/**
	 * @param boolean $promoted
	 */
	public function setPromoted( $promoted ) {
		$this->promoted = $promoted;
	}

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
	 * Get navigation
	 *
	 * @return boolean
	 */
	public function getNavigation() {
		return $this->navigation;
	}

	/**
	 * Set model
	 *
	 * @param \CarBundle\Entity\Model $model
	 *
	 * @return Car
	 */
	public function setModel( \CarBundle\Entity\Model $model = null ) {
		$this->model = $model;

		return $this;
	}

	/**
	 * Get model
	 *
	 * @return \CarBundle\Entity\Model
	 */
	public function getModel() {
		return $this->model;
	}

	/**
	 * Set make
	 *
	 * @param \CarBundle\Entity\Make $make
	 *
	 * @return Car
	 */
	public function setMake( \CarBundle\Entity\Make $make = null ) {
		$this->make = $make;

		return $this;
	}

	/**
	 * Get make
	 *
	 * @return \CarBundle\Entity\Make
	 */
	public function getMake() {
		return $this->make;
	}
}
