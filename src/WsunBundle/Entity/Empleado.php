<?php

namespace WsunBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empleado *
 * @ORM\Table(name="empleado")})
 * @ORM\Entity
 */
class Empleado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="empleado_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cedula_emp", type="string", length=50, nullable=true)
     */
    private $cedulaEmp;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_emp", type="string", length=255, nullable=true)
     */
    private $nombreEmp;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_emp", type="string", length=20, nullable=true)
     */
    private $apellidoEmp;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_emp", type="string", length=180, nullable=true)
     */
    private $telefonoEmp;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=180, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=180, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo_emp", type="string", length=180, nullable=true)
     */
    private $cargoEmp;


    /**
     * @var string
     *
     * @ORM\Column(name="grado", type="string",  length=220, nullable=true)
     */
    private $gradoEmp;

    /**
     * @var float
     *
     * @ORM\Column(name="sueldo", type="float", precision=10, scale=0, nullable=true)
     */
    private $sueldo;


      /**
     * @var float
     *
     * @ORM\Column(name="contacto", type="float", length=180, nullable=true)
     */
    private $contacto;

   

  

    public function __construct() {
   //     $this->empresaProducto = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cedulaEmp
     *
     * @param string $cedulaEmp
     *
     * @return Empleado
     */
    public function setCedulaEmp($cedulaEmp)
    {
        $this->cedulaEmp = $cedulaEmp;

        return $this;
    }

    /**
     * Get cedulaEmp
     *
     * @return string
     */
    public function getcedulaEmp()
    {
        return $this->cedulaEmp;
    }

    /**
     * Set nombreEmp
     *
     * @param string $nombreEmp
     *
     * @return Empleado
     */
    public function setNombreEmp($nombreEmp)
    {
        $this->nombreEmp = $nombreEmp;

        return $this;
    }

    /**
     * Get nombreEmp
     *
     * @return string
     */
    public function getNombreEmp()
    {
        return $this->nombreEmp;
    }

    /**
     * Set apellidoEmp
     *
     * @param string $apellidoEmp
     *
     * @return Empleado
     */
    public function setApellidoEmp($apellidoEmp)
    {
        $this->apellidoEmp = $apellidoEmp;

        return $this;
    }

    /**
     * Get apellidoEmp
     *
     * @return string
     */
    public function getApellidoEmp()
    {
        return $this->apellidoEmp;
    }

    /**
     * Set telefonoEmp
     *
     * @param string $telefonoEmp
     *
     * @return Empleado
     */
    public function setTelefonoEmp($telefonoEmp)
    {
        $this->telefonoEmp = $telefonoEmp;

        return $this;
    }

    /**
     * Get telefonoEmp
     *
     * @return string
     */
    public function getTelefonoEmp()
    {
        return $this->telefonoEmp;
    }



 /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Empleado
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }




    /**
     * Set email
     *
     * @param string $email
     *
     * @return Empleado
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set cargoEmp
     *
     * @param string $cargoEmp
     *
     * @return Empleado
     */
    public function setCargoEmp($cargoEmp)
    {
        $this->cargoEmp = $cargoEmp;

        return $this;
    }

    /**
     * Get cargoEmp
     *
     * @return string
     */
    public function getCargoEmp()
    {
        return $this->cargoEmp;
    }

   

    /**
     * Set gradoEmp
     *
     * @param boolean $gradoEmp
     *
     * @return Empleado
     */
    public function setGradoEmp($gradoEmp)
    {
        $this->gradoEmp = $gradoEmp;

        return $this;
    }

    /**
     * Get gradoEmp
     *
     * @return boolean
     */
    public function getGradoEmp()
    {
        return $this->gradoEmp;
    }

    /**
     * Set sueldo
     *
     * @param float $sueldo
     *
     * @return Empleado
     */
    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;

        return $this;
    }

    /**
     * Get sueldo
     *
     * @return float
     */
    public function getSueldo()
    {
        return $this->sueldo;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     *
     * @return Empleado
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;

        return $this;
    }

    /**
     * Get contacto
     *
     * @return string
     */
    public function getContacto()
    {
        return $this->contacto;
    }


    
    public function __toString() {
        return $this->nombreEmp;
    }




}
