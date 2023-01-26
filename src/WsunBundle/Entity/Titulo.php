<?php

namespace WsunBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titulo
 *
 * @ORM\Table(name="titulo", indexes={@ORM\Index(name="IDX_40E497EB664AF320", columns={"id_empleado"})})
 * @ORM\Entity
 */
class Titulo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="titulo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="instucion", type="string", length=250, nullable=false)
     */
    private $instucion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombretitulo", type="string", length=250, nullable=true)
     */
    private $nombretitulo;

     /**
     * @var datetime $fechaIngreso
     *
     * @ORM\Column(name="fecha_ingreso", type="datetime")
     */

    private $fechaaprobacion;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=255, nullable=true)
     */
    private $observacion;
   

    /**
     * @var \Titulo
     *
     * @ORM\ManyToOne(targetEntity="Empleado", inversedBy="titulo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_empleado", referencedColumnName="id")
     * })
     */
    private $idEmpleado;
    


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
     * Set instucion
     *
     * @param string $instucion
     *
     * @return Titulo
     */
    public function setInstucion($instucion)
    {
        $this->instucion = $instucion;

        return $this;
    }

    /**
     * Get instucion
     *
     * @return string
     */
    public function getInstucion()
    {
        return $this->instucion;
    }

    /**
     * Set nombretitulo
     *
     * @param string $nombretitulo
     *
     * @return Titulo
     */
    public function setNombretitulo($nombretitulo)
    {
        $this->nombretitulo = $nombretitulo;

        return $this;
    }

    /**
     * Get nombretitulo
     *
     * @return string
     */
    public function getNombretitulo()
    {
        return $this->nombretitulo;
    }
    
     /**
     * Set fechaaprobacion
     *
     * @param string $fechaaprobacion
     *
     * @return Titulo
     */
    public function setFechaaprobacion($fechaaprobacion)
    {
        $this->fechaaprobacion = $fechaaprobacion;

        return $this;
    }

    /**
     * Get fechaaprobacion
     *
     * @return string
     */
    public function getFechaaprobacion()
    {
        return $this->fechaaprobacion;
    }

    
    /**
     * Set observacion	
     *
     * @param string $observacion	
     *
     * @return Titulo
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion	
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set idEmpleado
     *
     * @param \WsunBundle\Entity\Empleado $idEmpleado
     *
     * @return Titulo
     */
    public function setIdEmpleado(\WsunBundle\Entity\Empleado $idEmpleado = null)
    {
        $this->idEmpleado = $idEmpleado;

        return $this;
    }

    /**
     * Get idEmpleado
     *
     * @return \WsunBundle\Entity\Empleado
     */
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }
}
