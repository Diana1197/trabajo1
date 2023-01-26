<?php

namespace WsunBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cursos
 *
 * @ORM\Table(name="cursos", indexes={@ORM\Index(name="IDX_40E497EB664AF320", columns={"id_empleado"})})
 * @ORM\Entity
 */
class Cursos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="cursos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=250, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_curso", type="string", length=250, nullable=true)
     */
    private $nombreCurso;

    /**
     * @var string
     *
     * @ORM\Column(name="institucion", type="string", length=255, nullable=true)
     */
    private $institucion;

    /**
     * @var datetime $fechaIngreso
     *
     * @ORM\Column(name="fecha_ingreso", type="datetime")
     */

    private $fechaIngreso;
    
    /**
     * @var datetime $fechaFin
     *
     * @ORM\Column(name="fecha_fin", type="datetime")
     */
    private $fechaFin;

     /**
     * @var string
     *
     * @ORM\Column(name="duracion", type="string", length=255, nullable=true)
     */
    private $duracion;


    /**
     * @var \Empleado
     *
     * @ORM\ManyToOne(targetEntity="Empleado", inversedBy="cursos")
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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Cursos
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set nombreCurso
     *
     * @param string $nombreCurso
     *
     * @return Cursos
     */
    public function setNombreCurso($nombreCurso)
    {
        $this->nombreCurso = $nombreCurso;

        return $this;
    }

    /**
     * Get nombreCurso
     *
     * @return string
     */
    public function getNombreCurso()
    {
        return $this->nombreCurso;
    }
    
    /**
     * Set institucion
     *
     * @param string $institucion
     *
     * @return Cursos
     */
    public function setInstitucion($institucion)
    {
        $this->institucion = $institucion;

        return $this;
    }

    /**
     * Get institucion
     *
     * @return string
     */
    public function getInstitucion()
    {
        return $this->institucion;
    }
    
    /**
     * Set fechaIngreso
     *
     * @param string $fechaIngreso
     *
     * @return Cursos
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return string
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set fechaFin 
     *
     * @param string $fechaFin 
     *
     * @return Cursos
     */
    public function setFechaFin ($fechaFin )
    {
        $this->fechaFin = $fechaFin ;

        return $this;
    }

    /**
     * Get fechaFin 
     *
     * @return string
     */
    public function getFechaFin ()
    {
        return $this->fechaFin ;
    }

    
    /**
     * Set duracion 
     *
     * @param string $duracion 
     *
     * @return Cursos
     */
    public function setDuracion ($duracion  )
    {
        $this->duracion  = $duracion  ;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return string
     */
    public function getDuracion ()
    {
        return $this->duracion ;
    }

    /**
     * Set idEmpleado
     *
     * @param \WsunBundle\Entity\Empleado $idEmpleado
     *
     * @return Cursos
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
